<?php if(!defined('BASEPATH'))	exit('No direct script access allowd');
 
class Stock_adjust extends CI_Controller {
        private $limit=10;
	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
		$this->load->helper(array('url','form','browse_select'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('inventory_card_header_model');
        $this->load->library('sysvar');
        $this->load->library('javascript');
	}
	function index()
	{
                $this->browse();
	}
        function print_bukti($nomor){
            $this->load->helper('mylib');
            $this->load->model('inventory_moving_model');
            $amount=$this->inventory_moving_model->recalc($nomor);
            $do=$this->inventory_card_header_model->get_by_id($nomor)->row();
            $data['shipment_id']=$do->shipment_id;
            $data['date_received']=$do->date_received;
            $data['supplier_number']=$do->supplier_number;
            $data['package_no']=$do->package_no;
            $data['amount']=$amount;
            $caption='';
            $sql="select i.item_number,s.description,
                i.from_qty as qty,i.unit,i.cost,i.total_amount as amount 
                from inventory_moving i
                left join inventory s on s.item_number=i.item_number
                where transfer_id='".$nomor."'";
            $caption='';$class='';$field_key='';$offset='0';$limit=100;
            $order_column='';$order_type='asc';
            $item=browse_select($sql, $caption, $class, $field_key, $offset, $limit, 
                        $order_column, $order_type,false);
            $data['lineitems']=$item;
            $this->load->model('supplier_model');
            $data['supp_info']=$this->supplier_model->info($data['supplier_number']);
            $data['header']=company_header();
            
            $this->load->view('stock_adjust_print',$data);
            
        }
	function set_defaults($record=NULL){
		$data['mode']='';
		$data['message']='';
                $data['supplier_list']=$this->inventory_card_header_model->supplier_list();                 
		if($record==NULL){			 
			$data['supplier_number']='';
			$data['date_received']= date("Y-m-d");
			$data['package_no']='';
                        $data['receipt_type']='ADJ';
                        
			$data['shipment_id']=$this->sysvar
                                ->autonumber($this->access->cid." Adjust Numbering",0,
                                '!ADJ-'.$this->access->cid.'~$00001');
                        $data['receive_items']='';
		} else {
			$data['shipment_id']=$record->shipment_id;
			$data['supplier_number']=$record->supplier_number;
			$data['date_received']=$record->date_received;
                        $data['receipt_type']='ADJ';
                        $data['package_no']=$record->package_no;
                        $data['warehouse_code']=$record->warehouse_code; 
		} 
		
		return $data;
	}	
	function get_posts(){
		$data['shipment_id']=$this->input->post('shipment_id');
		$data['supplier_number']=$this->input->post('supplier_number');
		$data['date_received']=$this->input->post('date_received');
		$data['package_no']=$this->input->post('package_no');              
                $data['receipt_type']='ADJ';
                
		return $data;
	}
	function add()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();		 
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
                        $data['receipt_type']='ADJ';
                        $data['warehouse_code']=$this->access->cid;
			$id=$this->inventory_card_header_model->save($data);
                        $data['message']='update success';
			$id=$this->input->post('shipment_id');
                        $this->sysvar->autonumber_inc($this->access->cid." Adjust Numbering");
                        redirect('/stock_adjust/view/'.$id, 'refresh');
		} else {
			$data['mode']='add';
			$data['message']='';			 
			$this->template->display_form_input('stock_adjust',$data,'adjust_menu');			
		}
	}
	function update()
	{
		 $data=$this->set_defaults(); 
        	 $data=$this->get_posts();
                 var_dump($data);
		 $this->_set_rules();
 		 $id=$this->input->post('shipment_id');
             
		 if ($this->form_validation->run()=== TRUE){
			$this->inventory_card_header_model->update($id,$data);
		    $data['message']='update success';
		} else {
			$data['message']='Error Update';
		}
	  
 		$this->view($id);		
	}
	
	function view($id,$message=null){
		 $data['id']=$id;
		 $model=$this->inventory_card_header_model->get_by_id($id)->row();	
                 
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
                 $data['message']=$message;
                                  
                               
                 $this->load->model('inventory_model');
                 $data['select_items']=$this->inventory_model->lookup();   
                  
                 $data['pagination']='';
                 $data['receive_items']=$this->load_items($id);
                 
                 $this->load->model('supplier_model');
                 $data['supplier_info']=$this->supplier_model->info($data['supplier_number']);

		$this->template->display_form_input('stock_adjust',$data);

	
	}
         
        function load_items($id){
            $this->load->model('inventory_moving_model');
            $this->inventory_moving_model->recalc($id);
            $sql="select i.item_number,s.description,i.from_qty as qty,i.id
                from inventory_moving i
                left join inventory s on s.item_number=i.item_number
                where transfer_id='".$id."'";
             
            $data=browse_select(array('sql'=>$sql,'show_action'=>true,
                'action_button'=>'<input value="Del" type="button" onclick="del_row(#id);return false;"/>',
                'fields_input'=>array('sumber','tujuan'),
                'field_key'=>'id'
                ));
           // <input  value="Upd" type="button" onclick="upd_row(#id);return false;"/>''
            return $data; 
        }
        
         
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('shipment_id','Receive Number', 'required|trim');
		 $this->form_validation->set_rules('supplier_number','Supplier Number',	 'required');
		 $this->form_validation->set_rules('date_received','Tanggal', 'required|trim');
	}
	
	 // date_validation callback
	function valid_date($str)
	{
	 if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$/',$str))
	 {
		 $this->form_validation->set_message('valid_date',
		 'date format is not valid. yyyy-mm-dd');
		 return false;
	 } else {
	 	return true;
	 }
	}
         function browse($offset=0,$limit=50,$order_column='shipment_id',$order_type='asc'){
            //var_dump($_GET) 
            $caption="DAFTAR ADJUSTMENT STOCK";
            $data['_content']=browse("select shipment_id,date_received,warehouse_code,package_no as ref
                ,supplier_number as tujuan
                from inventory_card_header i
                where receipt_type='ADJ' and warehouse_code='".$this->access->cid."'
                ",$caption,'stock_adjust'
                ,$offset,$limit,$order_column,$order_type
                    
                );
            $this->template->display_browse('template_browse',$data);
        }
	 
	function delete($id){
	 	$this->inventory_card_header_model->delete($id);
	 	$this->browse();
	}	
	 
	function add_item($recv_id){          
            
            $this->load->model('inventory_moving_model');
                $data['transfer_id']=$recv_id;
                $data['from_qty']=$_GET['qty'];
                $data['to_qty']=$_GET['qty'];
                $data['item_number']=$_GET['item'];
                $data['trans_type']='ADJ';
                $data['from_location']=$this->access->cid;
                $this->inventory_moving_model->add_item($data);
                echo $this->load_items($recv_id);
	}
	function del_item($id,$recv_id){
                $this->db->where('id',$id);
		$this->db->delete('inventory_moving');
                echo $this->load_items($recv_id);
	}	
}

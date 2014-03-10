<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Workorder extends CI_Controller {

private $limit=10;

	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('workorder_model');
	}
	function set_defaults($record=NULL){
//		$data['mode']='';
		$data['message']='';
		if($record==NULL){
			$data['wo_number']='';
			$data['wo_date']='';
			$data['customer']='';
			$data['so_number']='';
			$data['warehouse']='';
			$data['amount']='';
			$data['status']='';
			$data['ordered_by']='';
			$data['worked_by']='';
			$data['comments']='';
		} else {
			$data['wo_number']=$record->wo_number;
			$data['wo_date']=$record->wo_date;
			$data['customer']=$record->customer;
			$data['so_number']=$record->so_number;
			$data['warehouse']=$record->warehouse;
			$data['amount']=$record->amount;
			$data['status']=$record->status;
			$data['ordered_by']=$record->ordered_by;
			$data['worked_by']=$record->worked_by;
			$data['comments']=$record->comments;
		}
		return $data;
	}
	function index()
	{	
		$this->view();			
	}
	function get_posts(){
		$data['wo_number']=$this->input->post('wo_number');
		$data['wo_date']=$this->input->post('wo_date');
		$data['so_number']=$this->input->post('so_number');
		$data['customer']=$this->input->post('customer');
		$data['warehouse']=$this->input->post('warehouse');
		$data['amount']=$this->input->post('amount');
		$data['status']=$this->input->post('status');
		$data['ordered_by']=$this->input->post('ordered_by');
		$data['worked_by']=$this->input->post('worked_by');
		$data['comments']=$this->input->post('comments');

		return $data;
	}
	function add()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$id=$this->workorder_model->save($data);
		    $data['message']='update success';
			$data['mode']='view';
		} else {
				
			$data['mode']='add';
			$data['message']='';
			$data['wo_number']=$this->input->post('wo_number');
			
		}
		$this->view($this->input->post('wo_number'),$data);

	}
	function update()
	{
	 
		 $data=$this->set_defaults(); 
		 $this->_set_rules();
 		 $id=$this->input->post('wo_number');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$this->workorder_model->update($id,$data);
		    $data['message']='update success';
		} else {
			$data['message']='Error Update';
		}
	  
		$this->view($data['wo_number'],$data);			
	}
	
	function view($id=null,$data=null){
		 if($id==null)	{
		 	///echo 'herer';
			 $data=$this->set_defaults();
			 $data['mode']='add';
			 $data['id']='';
			 $data['detail']='';
		 } else {
			 $model=$this->workorder_model->get_by_id($id)->row();
			 $data=$this->set_defaults($model);
			 $data['id']=$id;
			 $data['mode']='view';
			 $data['detail']=$this->load_detail($id);
		 }	
		 
		 $this->template->display_form_input('workorder',$data,'workorder_left_menu');
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('wo_number','Workorder Number', 'required|trim');
		 $this->form_validation->set_rules('customer','Supplier Name',	 'required');
		 $this->form_validation->set_rules('so_number','SO Number',	 'required');
	}
	
	 // date_validation callback
	function valid_date($str)
	{
	 if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$str))
	 {
		 $this->form_validation->set_message('valid_date',
		 'date format is not valid. yyyy-mm-dd');
		 return false;
	 } else {
	 	return true;
	 }
	}
	function browse($offset=0,$order_column='wo_number',$order_type='asc')
	{
		if(empty($offset))$offset=0;
		if(empty($order_column))$order_column='v';
		if(empty($order_type))$order_type='asc';
		$models=$this->workorder_model->get_paged_list($this->limit,$offset,$order_column,$order_type)->result();
		
		$this->load->library('pagination');
		$config['base_url']=site_url('workorder/browse');
		$config['total_rows']=$this->workorder_model->count_all();
		$config['per_page']=$this->limit;
		$config['uri_segment']=3;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();
		
		//generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$new_order=($order_type=='asc'?'desc':'asc');
		$this->table->set_heading('No',
		anchor('workorder/browse/'.$offset.'/wo_number/'.$new_order,'WO Number'),
		anchor('workorder/browse/'.$offset.'/customer/'.$new_order,'Customer'),
		'WO Date','Saler Order#','Actions'
		);
		$i=0+$offset;
		foreach($models as $model){
			$this->table->add_row(++$i,$model->wo_number,$model->customer,
			$model->wo_date,$model->so_number,
			anchor('workorder/view/'.$model->wo_number,'view',array('class'=>'view')).' '.
			anchor('workorder/delete/'.$model->wo_number,'delete',array('class'=>'delete','onclick'=>"return confirm(
			'Apakah Anda yakin ingin menghapus baris ini ?')"))
			);
		}
		$tmpl=$this->template->template_table();
		$this->table->set_template($tmpl);

		$data['table']=$this->table->generate();
		if($this->uri->segment(3)=='delete_success')
			$data['message']='Data berhasil dihapus';
		else if ($this->uri->segment(3)=='add_success')
			$data['message']='Data berhasil ditambah';
		else
			$data['message']='';
		//load view
	 
		$this->template->display_form_input('workorder_list',$data,'workorder_left_menu');

	}
	function delete($id){
	 	$this->workorder_model->delete($id);
	 	$this->browse();
	}
	
	function lookup(){
		$s='';
		$i=0;
		$query=$this->db->query("select wo_number,wo_date,so_number from workorder");
		 
  		foreach($query->result() as $row){
			$i++;
			$s=$s.'{"wo_number":"'.$row->wo_number.'","wo_date":"'.$row->wo_date.'"},
			"so_number":"'.$row->so_number.'"},"customer":"'.$row->customer.'"},			
			';
		}
		$s=substr($s,0,strlen($s)-1);
		$s='{"total":'.$i.',"rows":['.$s;	
		$s=$s.']}';
		echo $s;
		
 	}
	function load_detail($wo_number){
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No','Item Number','Description','Qty','Unit','Price','Total'
		,'Actions'
		);
		$query=$this->db->query("select * from workorder_detail where wo_number='".$wo_number."'");
		$i=0;
		foreach($query->result() as $row){
			$this->table->add_row(++$i,$row->item_number,$row->description,
			$row->quantity,$row->unit,$row->price,$row->total,
			'<a  href="javascript:void(0)"  
			onclick="del_item('.$row->id.');return false;">Delete</a>'
			);
		}
		$tmpl=$this->template->template_table();
		$this->table->set_template($tmpl);
		$ret= $this->table->generate();

		return $ret;
	}
 	function save_detail(){
		$wo_number=$this->input->post('wo_number');
		$item_number=$this->input->post('item_number');
		$description=$this->input->post('description');
		$qty=$this->input->post('qty');
		$unit=$this->input->post('unit');
		$price=$this->input->post('price');
		$disc=0;	//$this->input->post('disc');
		$amount=$this->input->post('amount');
		$s="insert into workorder_detail set wo_number='$wo_number',item_number='$item_number',
			description='$description',quantity='$qty',unit='$unit',price='$price',
			disc_prc='$disc',total='$amount'";
		 
		$this->db->query($s);
		$url=base_url().'index.php/workorder/view/'.$wo_number;
		echo $this->load_detail($wo_number);
	}
	function del_item(){
		$wo_number=$this->input->post('wo_number');
		$id=$this->input->post('rowid');
		$s='delete from workorder_detail where id='.$id;
		$this->db->query($s);
		echo $this->load_detail($wo_number);
	}
}
?>

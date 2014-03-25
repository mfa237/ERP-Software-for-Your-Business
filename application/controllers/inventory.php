<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Inventory extends CI_Controller {

    private $limit=10;
    private $table_name='inventory';
    private $sql="select item_number,description,unit_of_measure,
                retail,cost_from_mfg,i.supplier_number,s.supplier_name,i.class,i.category 
                from inventory i
                left join suppliers s on s.supplier_number=i.supplier_number
                ";
   private $file_view='inventory/inventory';
 	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
 		$this->load->helper(array('url','form','browse_select','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('inventory_model');
        $this->load->model('chart_of_accounts_model');
        $this->load->model('supplier_model');
	}
	function set_defaults($record=NULL){          
                $data=data_table('inventory',$record); 
		$data['mode']='';
		$data['message']='';
                $data['akun_list']=$this->chart_of_accounts_model->select_list();
		$data['supplier_list']=$this->supplier_model->select_list();
		$data['category_list']=$this->inventory_model->category_list();
		$data['class_list']=$this->inventory_model->class_list();
		$data['sub_category_list']=$this->inventory_model->category_list();               
	 
		return $data;
	}
	function index()
	{	
            $this->browse();
	}
	function get_posts(){
                $data=data_table_post('inventory');
		return $data;
	}
	function add()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$id=$this->inventory_model->save($data);
            $data['message']='update success';
            $data['mode']='view';
            $this->browse();
		} else {
			$data['mode']='add';
            $this->template->display_form_input($this->file_view,$data,'');
		}
        }        
	function delete($id){
	 	$this->inventory_model->delete($id);
	 	$this->browse();
	}

	function update()
	{   
		 $data=$this->set_defaults();
		 $this->_set_rules();
 		 $id=$this->input->post('item_number');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
            if($data['last_order_date']=='')$data['last_order_date']='1900-01-01';
            if($data['expected_delivery']=='')$data['expected_delivery']='1900-01-01';
			$this->inventory_model->update($id,$data);
            $message='Update Success';
            $this->browse();
		} else {
			$message='Error Update';
     		$this->view($id,$message);		
		}	  
	}
	
	function view($id,$message=null){
		 $inventory=$this->inventory_model->get_by_id($id)->row();
		 $data=$this->set_defaults($inventory);
		 $data['id']=$id;
		 $data['mode']='view';
         $data['message']=$message;
         $this->session->set_userdata('_right_menu', 'inventory/inventory_menu');
         $this->template->display_form_input($this->file_view,$data,'');
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('item_number','Item Number', 
                         'required|trim|callback_exist');
		 $this->form_validation->set_rules('description','Description',	 'required');
		 $this->form_validation->set_rules('class','Class', 'required');
		 $this->form_validation->set_rules('category','Category', 'required');
//		 $this->form_validation->set_rules('tanggal_lahir','Tanggal
///		 Lahir','required|callback_valid_date');
                 
	
	}
	
	 // date_validation callback
        function valid_exist($id){
          echo 'exist='.$this->inventory_model->exist($id);
           if($this->inventory_model->exist($id)>0) {
               $this->form_validation->set_message('invoice_number', 'Nomor sudah ada !');
               return false;
           } else {
               return true;
           }
        }
	function browse($offset=0,$limit=10,$order_column='company',$order_type='asc')
	{
        $data['caption']='DAFTAR BARANG DAN JASA';
		$data['controller']='inventory';		
		$data['fields_caption']=array('Kode','Nama Barang','Unit','Harga Jual','Harga Beli',
			'Kode Supplier','Nama Supplier','Kelas','Kelompok');
		$data['fields']=array('item_number','description','unit_of_measure',
                'retail','cost_from_mfg','supplier_number','supplier_name','class','category');
		$data['field_key']='item_number';
		$this->load->library('search_criteria');
		
		$faa[]=criteria("Kode","sid_kode");
		$faa[]=criteria("Nama","sid_nama");
		$faa[]=criteria("Supplier","sid_supp");
		$faa[]=criteria("Kelompok","sid_cat");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
		$sql=$this->sql." where 1=1";
		if($this->input->get('sid_kode')!=''){
			$sql.=" and item_number='".$this->input->get('sid_kode')."'";
		} else {
			if($this->input->get('sid_nama')!='')$sql.=" and description like '".$this->input->get('sid_nama')."%'";
			if($this->input->get('sid_supp')!='')$sql.=" and supplier='".$this->input->get('sid_supp')."'";
			if($this->input->get('sid_cat')!='')$sql.=" and category='".$this->input->get('sid_cat')."'";
		}
        echo datasource($sql);		
    }
	 
    function lookup($offset=0,$limit=20,$order_column='item_number',$order_type='asc'){           
        return $this->inventory_model->lookup($offset,$limit,
                $order_column,$order_type);
    }
	function lookup_json(){
            
		$query=$this->db->query("select item_number,description from inventory");
		$data =array();
		foreach($query->result_array() as $row){
			$data[] =  array($row['item_number'], $row['description']);
		}
		echo json_encode($data);
 	}
	function filter($nama='',$type='json'){
		$sql="select item_number,description
		 from inventory  where 1=1 and description like '".$nama."%' limit 100";
		$rs = mysql_query($sql);
		$result = array();
		while($row = mysql_fetch_object($rs)){
		    array_push($result, $row);
		}			 
		echo json_encode($result);
	}
	
	function find($item_number=''){
		$query=$this->db->query("select item_number,description,retail,
		unit_of_measure,cost from inventory where item_number='$item_number'");
		echo json_encode($query->row_array());
 	}
	function grafik_jual(){
/* create_graph($konfigurasi_grafik, $data, $tipe_grafik, $judul_pd_grafik, $nama_berkas) */		
		$phpgraph = $this->load->library('PhpGraph');		
		$cfg['width'] = 300;
		$cfg['height'] = 200;
		$cfg['compare'] = false;
		$cfg['disable-values']=1;
		$chart_type='vertical-simple-column-graph';
		$data=$this->inventory_model->paling_laku();
		$file="tmp/".$chart_type.".png";
		$this->phpgraph->create_graph($cfg, $data,$chart_type,'Grafik Penjualan',$file);
		echo '<img src="'.base_url().'/'.$file.'"/>';
		echo '*Display only top ten sales items';
	}
	function grafik_stock_min(){
/* create_graph($konfigurasi_grafik, $data, $tipe_grafik, $judul_pd_grafik, $nama_berkas) */		
		$phpgraph = $this->load->library('PhpGraph');		
		$cfg['width'] = 300;
		$cfg['height'] = 200;
		$cfg['compare'] = false;
		$cfg['disable-values']=1;
		$chart_type='vertical-simple-column-graph';
		$data=$this->inventory_model->minimum_stock();
		$file="tmp/".$chart_type.".png";
		$this->phpgraph->create_graph($cfg, $data,$chart_type,'Grafik Minimum Stock',$file);
		echo '<img src="'.base_url().'/'.$file.'"/>';
		echo '*Display only top ten stock minimum';
	}
	function daftar_po_receive(){
		$sql="select pol.item_number,pol.description,pol.quantity,pol.qty_recvd,
		p.purchase_order_number as faktur, p.po_date as tanggal,
		s.supplier_name
		from purchase_order_lineitems pol
		left join purchase_order  p on p.purchase_order_number=pol.purchase_order_number
		left join suppliers s on s.supplier_number=p.supplier_number
		where potype='P' and year(p.po_date)=".date('Y')."
		order by p.po_date asc";
		
		$query=$this->db->query($sql);
		$flds=$query->list_fields();
		$data=$query->result_array();
		echo browse_data($data,$flds);
	}
	function daftar_stock_sisa(){
		$sql="select i.item_number,i.description,i.quantity_in_stock
		from inventory i";		
		$query=$this->db->query($sql);
		$flds=$query->list_fields();
		$data=$query->result_array();
		echo browse_data($data,$flds);
	}
	function list_data($type='')
	{
		$sql="select item_number as productid,description as productname from inventory";
			$q=$this->db->query($sql)->result_array();
			$s=json_encode($q);		
			//$s='{"total":28,"rows":'.$s.'}';
		 echo  $s;
		
	}

}

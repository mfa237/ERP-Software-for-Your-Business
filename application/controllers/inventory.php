<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

Class Inventory extends CI_Controller {

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
		if(!allow_mod2('_80000'))return false;   
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
		$data['mode']='add';
        $this->template->display_form_input($this->file_view,$data,'');
   }        
	function delete($id){
	 	$this->inventory_model->delete($id);
	 	$this->browse();
	}

	function save()
	{   
		 $data=$this->set_defaults();
		 $this->_set_rules();
 		 $id=$this->input->post('item_number');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$mode=$this->input->post("mode");
			unset($data["mode"]);
			
			$data['sales_account']=$this->acc_id($data['sales_account']);
			$data['inventory_account']=$this->acc_id($data['inventory_account']);
			$data['cogs_account']=$this->acc_id($data['cogs_account']);
			$data['tax_account']=$this->acc_id($data['tax_account']);
			
			if($mode=="view"){
				$ok=$this->inventory_model->update($id,$data);			
			} else {
				$ok=$this->inventory_model->save($data);
			}
		} else {
			$ok=false;
		}	
		if ($ok){
			echo json_encode(array('success'=>true,'item_number'=>$id));
		} else {
			echo json_encode(array('msg'=>"Ada kesalahan input, cek kode barang atau satuan."));
		}
		  
	}
	function acc_id($account){
		$account=urldecode($account);
		$data=explode(" - ", $account);
		$coa=$this->chart_of_accounts_model->get_by_id($data[0])->row();
		if($coa){
			return $coa->id;
		} else {
			return 0;
		}
	}
	
	function view($id,$message=null){
		$id=urldecode($id);
		 $inventory=$this->inventory_model->get_by_id($id)->row();
		 $data=$this->set_defaults($inventory);
		 $data['id']=$id;
		 $data['mode']='view';
         $data['message']=$message;
		 $sql="select q.item_number,i.description,q.gudang,sum(q.qty_masuk)-sum(q.qty_keluar) as quantity 
   		from qry_kartustock_union q left join inventory i on i.item_number=q.item_number 
		where q.item_number='$id'   		
   		group by q.item_number,i.description,q.gudang ";
		 $data['qty_gudang']=browse_simple($sql);
		 $data['inventory_account']=account($data['inventory_account']);
		 $data['sales_account']=account($data['sales_account']);
		 $data['cogs_account']=account($data['cogs_account']);
		 $data['tax_account']=account($data['tax_account']);

		 $data['quantity_in_stock']=$this->inventory_model->quantity_in_stock($id);
		 
         $this->session->set_userdata('_right_menu', 'inventory/inventory_menu');
         $this->template->display_form_input($this->file_view,$data,'');
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('item_number','Item Number','required|trim|callback_exist');
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
		$data['list_info_visible']=true;
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
		$sql=$this->sql." where 1=1";
		if($this->input->get('sid_kode')!='')$sql.=" and item_number like '".$this->input->get('sid_kode')."%'";
		if($this->input->get('sid_nama')!='')$sql.=" and description like '".$this->input->get('sid_nama')."%'";
		if($this->input->get('sid_supp')!='')$sql.=" and supplier='".$this->input->get('sid_supp')."'";
		if($this->input->get('sid_cat')!='')$sql.=" and category='".$this->input->get('sid_cat')."'";
		$sql.=" limit $offset,$limit";
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
		$nama=urldecode($nama);
		$sql="select item_number,description,category
		 from inventory  where 1=1 and description like '".$nama."%' limit 100";
		$rs = mysql_query($sql);
		$result = array();
		while($row = mysql_fetch_object($rs)){
		    array_push($result, $row);
		}			 
		echo json_encode($result);
	}
	
	function find($item_number=''){
		$item_number=urldecode($item_number);
		$query=$this->db->query("select item_number,description,retail,
		unit_of_measure,cost from inventory where item_number='$item_number'");
		echo json_encode($query->row_array());
 	}
	function grafik_jual_old(){
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
	function grafik_jual(){
		header('Content-type: application/json');
		$data['label']="Top Ten Sales";
		$data['data']=$this->inventory_model->paling_laku();
		echo json_encode($data);
	}

	function grafik_stock_min_old(){
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
	function grafik_stock_min(){
		header('Content-type: application/json');
		$data['label']="Minimum Items";
		$data['data']=$this->inventory_model->minimum_stock();
		echo json_encode($data);
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
    function rpt($id){
		 $data['date_from']=date('Y-m-d 00:00:00');
		 $data['date_to']=date('Y-m-d 23:59:59');
		 $data['select_date']=true;		 
    	 switch ($id) {
			 case 'ar_dtl':
				 $data['criteria1']=true;
				 $data['label1']='Kode Pelanggan';
				 $data['text1']='';
				 break;			 
			 default:
				 break;
		 }
		 $rpt='inventory/rpt/'.$id;
		 $data['rpt_controller']=$rpt;
		 
		if(!$this->input->post('cmdPrint')){
			$this->template->display_form_input('criteria',$data,'');
		} else {
			$this->load->view($rpt);
		}
   }
   function unit_price($id){
		$id=urldecode($id);
		 $inventory=$this->inventory_model->get_by_id($id)->row();
		 $data['item_number']=$inventory->item_number;
		 $data['description']=$inventory->description;
         $this->template->display_form_input("inventory/unit_price",$data);
   }   
   function unit_price_add($id){
   		$id=urldecode($id);
		$this->load->model('inventory_prices_model');
		$data = $this->input->post(NULL, TRUE); //getallpost			
		if($data['date_from']==""){unset($data['date_from']);} else {$data['date_from']=date('Y-m-d H:i:s', strtotime($data['date_from']));}
		if($data['date_to']==""){unset($data['date_to']);} else {$data['date_to']=date('Y-m-d H:i:s', strtotime($data['date_to']));}
		$data['item_number']=$id;
		$ok=$this->inventory_prices_model->save($data);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
   function delete_price($item_number,$unit_price){
   		$item_number=htmlspecialchars_decode($item_number);
   		$unit_price=htmlspecialchars_decode($unit_price);
		$this->load->model('inventory_prices_model');
		$ok=$this->inventory_prices_model->delete($item_number,$unit_price);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
   function assembly($id){
   		$id=htmlspecialchars_decode($id);
		 $barang=$this->inventory_model->get_by_id($id)->row();
		 $data['item_number']=$barang->item_number;
		 $data['description']=$barang->description;
         $this->template->display_form_input("inventory/assembly",$data);
   }   
   function assembly_add($id){
   		$id=htmlspecialchars_decode($id);
		$this->load->model('inventory_assembly_model');
		$data = $this->input->post(NULL, TRUE); //getallpost			
		$data['item_number']=$id;
		$ok=$this->inventory_assembly_model->save($data);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
   function assembly_delete($item_number,$kode){
   		$item_number=htmlspecialchars_decode($item_number);
   		$kode=htmlspecialchars_decode($kode);
		$this->load->model('inventory_assembly_model');
		$ok=$this->inventory_assembly_model->delete($item_number,$kode);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
   function supplier($id){
   		$id=htmlspecialchars_decode($id);
		 $barang=$this->inventory_model->get_by_id($id)->row();
		 $data['item_number']=$barang->item_number;
		 $data['description']=$barang->description;
         $this->template->display_form_input("inventory/supplier",$data);
   }   
   function supplier_add($id){
   		$id=htmlspecialchars_decode($id);
		$this->load->model('inventory_suppliers_model');
		$data = $this->input->post(NULL, TRUE); //getallpost			
		$data['item_number']=$id;
		$ok=$this->inventory_suppliers_model->save($data);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
   function supplier_delete($item_number,$kode){
   		$item_number=htmlspecialchars_decode($item_number);
   		$kode=htmlspecialchars_decode($kode);
		$this->load->model('inventory_suppliers_model');
		$ok=$this->inventory_suppliers_model->delete($item_number,$kode);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
   function qty_gudang($item_number){
   		$item_number=htmlspecialchars_decode($item_number);
   		$sql="select q.item_number,i.description,q.gudang,sum(q.qty_masuk)-sum(q.qty_keluar) as quantity 
   		from qry_kartustock_union q left join inventory i on i.item_number=q.item_number 
		where q.item_number='$item_number'   		
   		group by q.item_number,i.description,q.gudang ";
		$this->template->browse_sql($sql);
   }
	function do_upload_picture()
	{
		//var_dump($_POST);
		//var_dump($_GET);
		//var_dump($_FILES);
		
		$config['upload_path'] = './tmp/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$userfile=$this->input->get('userfile');

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' =>'Error upload !! Maximum size gambar 100kb');
		    echo json_encode($error);
		}
		else
		{
			$data = array('success'=>'Sukses','upload_data' => $this->upload->data());
			echo json_encode($data);
		}
	}
	function reports(){
		$this->template->display('inventory/menu_reports');
	}
	function kartu_stock($item_number)
	{
		$item_number=urldecode($item_number);
		$date_from= $this->input->get('d1');
		$date_from=  date('Y-m-d H:i:s', strtotime($date_from));
		$date_to= $this->input->get('d2');
		$date_to = date('Y-m-d H:i:s', strtotime($date_to));
		$gudang= $this->input->get('gudang');
		
		$sql="select sum(qty_masuk)-sum(qty_keluar) as saldo from qry_kartustock_union 
			where item_number='$item_number' 
			and tanggal<'$date_from'";
		if($gudang!="")$sql.=" and gudang='$gudang'";

        $query=$this->db->query($sql);
		$awal=$query->row()->saldo;
		$rows[0]=array("no_sumber"=>"SALDO","tanggal"=>"SALDO","jenis"=>"SALDO","qty_masuk"=>0,"qty_keluar"=>0,
			"saldo"=>number_format($awal),"gudang"=>"");

		$sql="select no_sumber,tanggal,jenis,qty_masuk,qty_keluar,gudang
			from qry_kartustock_union
			where item_number='$item_number' 
			and tanggal between '$date_from' and '$date_to' order by tanggal";

        $query=$this->db->query($sql);
		 
        $i=1;
		if($query)foreach($query->result_array() as $row) {
			$awal=$awal+$row['qty_masuk']-$row['qty_keluar'];
			$row['qty_masuk']=number_format($row['qty_masuk']);
			$row['qty_keluar']=number_format($row['qty_keluar']);
			$row["saldo"]=number_format($awal);
			$rows[$i++]=$row;
		};	
        $data['total']=$i;
        $data['rows']=$rows;
                    
        echo json_encode($data);

	}
	function list_info($offset=0){
		if(isset($_GET['offset'])){
			$offset=$_GET['offset'];
		}
		$data['offset']=$offset;
		$this->load->library('search_criteria');

		$faa[]=criteria("Kode","sid_kode");
		$faa[]=criteria("Nama","sid_nama");
		$faa[]=criteria("Supplier","sid_supp");
		$faa[]=criteria("Kelompok","sid_cat");
	
		$data['criteria']=$faa;
		$data['criteria_text']=criteria_text($faa);
		$data['sid_kode']=$this->session->userdata('sid_kode');
		$data['sid_nama']=$this->session->userdata('sid_nama');
		$data['sid_supp']=$this->session->userdata('sid_supp');
		$data['sid_cat']=$this->session->userdata('sid_cat');
		
		$this->template->display_form_input('inventory/info_list',$data);	
	}
	function pos_items($category=""){
		$category=urldecode($category);
		$s="select item_number,description,retail,item_picture
			from inventory where 1=1";
		if($category!="")$s .= " and category='$category'";
		$s .= " limit 20";
		
		$ss = "";
		$ar=null;
		if($q=$this->db->query($s)){
		   foreach($q->result() as $r) {
			   $ss .= "<div class='item-cell' id='".$r->item_number."'>";
				$ss .= "<span class='badge' style='float:left'>Rp. ".number_format($r->retail)."</span>";
				$ss .= "<img src='".base_url()."/tmp/".$r->item_picture."'>
						<p>".$r->description."</p>";
				$ss .= "</div>";
				$ar[]=$r;
			}
		}
		if($ss=="")$ss="<h3>No Items with this category $category</h3>";
		$data['html']=$ss;
		$data['rec']=$ar;
		echo json_encode($data);
	}
	function pos_category($page=0){
		$s="";
		$page=$page*5;
		if($q=$this->db->query("select kode,category from inventory_categories  limit $page,5")){
		   foreach($q->result() as $r) {
				$s .="<div class='cat-cell' id='$r->kode' title='Product by this category'>";
				$s .="<img src=''><p>".$r->category."</p>";
				$s .= "</div>";
			}
		}
		echo $s;
	}
}
?>

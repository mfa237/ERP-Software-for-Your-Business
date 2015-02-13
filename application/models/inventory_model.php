<?php
class Inventory_model extends CI_Model {

private $primary_key='item_number';
private $table_name='inventory';

	function __construct(){
		parent::__construct();
	}
    function lookup($offset=0,$limit=20,$order_column='item_number',$order_type='asc'){
        $search='';
        if(isset($_GET['search']))$search=$_GET['search'];
        $sql="select item_number,description,retail,unit_of_measure as unit
           ,category 
            from inventory";
        if($search!=""){
           $sql=$sql." where (item_number like '%".$search."%' 
                or description like '%".$search."%')";
        }
        if(isset($_GET['search'])){
           echo browse_select($sql,'Search','inventory/lookup'
                   ,'item_number',$offset,$limit,$order_column,$order_type);
        } else {
           return browse_select($sql,'Search','inventory/lookup'
                   ,'item_number',$offset,$limit,$order_column,$order_type);
        }
    }

function select_items($limit=10,$offset=0,$order_column='',$order_type='asc'){
     $nama='';
    if(isset($_GET['nama'])) $nama=$_GET['nama'];
     
    $this->db->select('description,item_number,retail');
    $this->db->from('inventory i');
    if($nama!='') $this->db->where("description like '%$nama%'
        or item_number='$nama'");
    if (empty($order_column)||empty($order_type))
    { 
        $this->db->order_by($this->primary_key,'asc');
    } else {
        $this->db->order_by($order_column,$order_type);
    }
    return $this->db->get('',$limit,$offset);
}
function get_paged_list($limit=10,$offset=0,
$order_column='',$order_type='asc')
{
    $nama='';
    if(isset($_GET['nama'])){
        $nama=$_GET['nama'];
    }
    $this->db->select('item_number,description,category,s.supplier_name,retail,cost');
    $this->db->join('suppliers s','s.supplier_number=i.supplier_number','left');
    $this->db->from('inventory i');
    if($nama!='') $this->db->where("description like '%$nama%'");
    if (empty($order_column)||empty($order_type))
    { 
        $this->db->order_by($this->primary_key,'asc');
    } else {
        $this->db->order_by($order_column,$order_type);
    }
    return $this->db->get('',$limit,$offset);
}
function count_all(){
	return $this->db->count_all($this->table_name);
}
function get_by_id($id){
	$this->db->where($this->primary_key,$id);
	return $this->db->get($this->table_name);
}

function exist($id){
   
   return $this->db->count_all($this->table_name." where item_number='".$id."'")>0;
}
function save($data){
	if(isset($data['active']))$data['active']=='1'?$data['active']=true:$data['active']=false;
	if(isset($data['serialized']))$data['serialized']=='1'?$data['serialized']=true:$data['serialized']=false;
	if(isset($data['assembly']))$data['assembly']=='1'?$data['assembly']=true:$data['assembly']=false;
	if(isset($data['multiple_pricing']))$data['multiple_pricing']=='1'?$data['multiple_pricing']=true:$data['multiple_pricing']=false;
	if(isset($data['style']))$data['style']=='1'?$data['style']=true:$data['style']=false;
    if(isset($data['last_order_date']))if($data['last_order_date']=='')$data['last_order_date']='1900-01-01';
    if(isset($data['expected_delivery']))if($data['expected_delivery']=='')$data['expected_delivery']='1900-01-01';

	$ok=$this->db->insert($this->table_name,$data);
	$id=$data['item_number'];
	$this->load->model("inventory_assembly_model");
	$this->inventory_assembly_model->recalc_cost($id);

	return $ok;
}
function update($id,$data){
	if(isset($data['active']))$data['active']=='1'?$data['active']=true:$data['active']=false;
	if(isset($data['serialized']))$data['serialized']=='1'?$data['serialized']=true:$data['serialized']=false;
	if(isset($data['assembly']))$data['assembly']=='1'?$data['assembly']=true:$data['assembly']=false;
	if(isset($data['multiple_pricing']))$data['multiple_pricing']=='1'?$data['multiple_pricing']=true:$data['multiple_pricing']=false;
	if(isset($data['style']))$data['style']=='1'?$data['style']=true:$data['style']=false;
    if(isset($data['last_order_date']))if($data['last_order_date']=='')$data['last_order_date']='1900-01-01';
    if(isset($data['expected_delivery']))if($data['expected_delivery']=='')$data['expected_delivery']='1900-01-01';
	$this->db->where($this->primary_key,$id);
	$ok=$this->db->update($this->table_name,$data);

	$this->load->model("inventory_assembly_model");
	$this->inventory_assembly_model->recalc_cost($id);

	return $ok;
}
function delete($id){
	$this->db->where($this->primary_key,$id);
	$this->db->delete($this->table_name);
}
	function item_list(){
		$query=$this->db->query("select item_number,description
                     from inventory order by description");
		$ret=array();
		$ret['']='- Select -';
 		foreach ($query->result() as $row)
		{
			$ret[$row->item_number]=$row->description.' - '.$row->item_number;
		}		 
		return $ret;
	}
	function class_list(){
		$query=$this->db->query("select 0 as kode,class  as item_class from inventory_class");
		$ret=array();
		$ret['']='- Select Class -';
 		foreach ($query->result() as $row)
		{
			$ret[$row->item_class]=$row->item_class;
		}		 
		return $ret;
	}
 
	function category_list(){
		$query=$this->db->query("select kode,category from inventory_categories");
		$ret=array();
		$ret['']='- Select Category -';
 		foreach ($query->result() as $row)
		{
			$ret[$row->kode]=$row->category;
		}		 
		return $ret;
	}
	function brand_list_object(){
		$query=$this->db->query("select distinct manufacturer  as brand from inventory");
		$ret=array();
 		foreach ($query->result() as $row)
		{
			$ret[]=$row;
		}		 
		return $ret;
	}
	
	function category_list_object(){
		$query=$this->db->query("select kode,category from inventory_categories");
		$ret=array();
 		foreach ($query->result() as $row)
		{
			$ret[]=$row;
		}		 
		return $ret;
	}
	function item_list_object(){
		$query=$this->db->query("select item_number,description,special_features,item_picture,
		retail
		from inventory");
		$ret=array();
 		foreach ($query->result() as $row)
		{
			$ret[]=$row;
		}		 
		return $ret;
	}
	
	function paling_laku_old()
	{
		$sql="select il.item_number,il.description,sum(il.quantity) as sum_qty 
		from invoice_lineitems il left join invoice i on i.invoice_number=il.invoice_number
		where i.invoice_type='I' 
		group by il.item_number,il.description
		order by sum(il.quantity) desc
		limit 0,10";
		$query=$this->db->query($sql);
		foreach($query->result() as $row){
			$item=$row->item_number;		//. ' - '.$row->description;
			if($item=="")$item="Unknown";
			$qty=$row->sum_qty;
			if($qty==null)$qty=0;
			$data[$item]=$qty;
		}
		//var_dump($data);
		return $data;
	}
	function paling_laku()
	{
		$sql="select il.item_number,il.description,sum(il.quantity) as sum_qty 
		from invoice_lineitems il left join invoice i on i.invoice_number=il.invoice_number
		where i.invoice_type='I' 
		group by il.item_number,il.description
		order by sum(il.quantity) desc
		limit 0,10";
		$query=$this->db->query($sql);
		foreach($query->result() as $row){
			$item=$row->item_number;		//. ' - '.$row->description;
			if($item=="")$item="Unknown";
			$qty=$row->sum_qty;
			if($qty==null)$qty=0;
			$data[]=array(substr($item,0,10),$qty);
		}
		//var_dump($data);
		return $data;
	}

	function minimum_stock()
	{
		$sql="select i.item_number,i.description,i.reorder_quantity,i.quantity_in_stock 
		from inventory i
		limit 0,10";
		$query=$this->db->query($sql);
		foreach($query->result() as $row){
			$item=$row->item_number;	//. ' - '.$row->description;
			if($item=="")$item="Unknown";
			$qty=$row->quantity_in_stock;
			if($qty==null)$qty=0;
			$data[]=array(substr($item,0,10),$qty);
		}
		return $data;
	}
	function minimum_stock_old()
	{
		$sql="select i.item_number,i.description,i.reorder_quantity,i.quantity_in_stock 
		from inventory i
		limit 0,10";
		$query=$this->db->query($sql);
		foreach($query->result() as $row){
			$item=$row->item_number;	//. ' - '.$row->description;
			if($item=="")$item="Unknown";
			$qty=$row->quantity_in_stock;
			if($qty==null)$qty=0;
			$data[$item]=$qty;
		}
		return $data;
	}
	function po_not_received()
	{
		$sql="select pol.item_number,pol.descripton,pol.quantity,pol.qty_recvd 
		from purchase_lineitems pol
		limit 0,10";
		$query=$this->db->query($sql);
		foreach($query->result() as $row){
			$item=$row->item_number;	//. ' - '.$row->description;
			if($item=="")$item="Unknown";
			$qty=$row->quantity_in_stock;
			if($qty==null)$qty=0;
			$data[$item]=$qty;
		}
		return $data;
	}
	
	function sisa_stock()
	{
		$sql="select i.item_number,i.descripton,i.minimum,i.quantity_in_stock 
		from inventory i
		limit 0,10";
		$query=$this->db->query($sql);
		foreach($query->result() as $row){
			$item=$row->item_number;	//. ' - '.$row->description;
			if($item=="")$item="Unknown";
			$qty=$row->quantity_in_stock;
			if($qty==null)$qty=0;
			$data[$item]=$qty;
		}
		return $data;
	}
	function quantity_in_stock($item_number)
	{
		$sql="select sum(qty_masuk)-sum(qty_keluar) as qty from qry_kartustock_union 
		where item_number='$item_number'";
		$query=$this->db->query($sql);		
		return $query->row()->qty;
	}
	 


}

<?php
class Supplier_model extends CI_Model {

private $primary_key='supplier_number';
private $table_name='suppliers';

function __construct(){
	parent::__construct();
}
function select_list(){
    // dipakai untuk dropdown
        $query=$this->db->query("select supplier_number,supplier_name from suppliers");
        $ret=array();
        $ret['']='- Select Supplier -';
        foreach ($query->result() as $row)
        {
                $ret[$row->supplier_number]=$row->supplier_name;
        }		 
        return $ret;
}
    function lookup($offset=0,$limit=20,$order_column='supplier_number',$order_type='asc'){
        $search='';
        if(isset($_GET['search']))$search=$_GET['search'];
        $sql="select supplier_number,supplier_name,city  
            from suppliers";
        if($search!=""){
           $sql=$sql." where (supplier_number like '%".$search."%' 
                or supplier_name like '%".$search."%')";
        }
        if(isset($_GET['search'])){
           echo browse_select($sql,'Search','supplier/lookup'
                   ,'supplier_number',$offset,$limit,$order_column,$order_type);
        } else {
           return browse_select($sql,'Search','supplier/lookup'
                   ,'supplier_number',$offset,$limit,$order_column,$order_type);
        }
    }

	function get_paged_list($limit=10,$offset=0,
	$order_column='',$order_type='asc')
	{
		if (empty($order_column)||empty($order_type))
		$this->db->order_by($this->primary_key,'asc');
		else
		$this->db->order_by($order_column,$order_type);
		return $this->db->get($this->table_name,$limit,$offset);
	}
	function count_all(){
		return $this->db->count_all($this->table_name);
	}
	function get_by_id($id){
		$this->db->where($this->primary_key,$id);
		return $this->db->get($this->table_name);
	}
	function save($data){
		if($data['acc_biaya']=='')$data['acc_biaya']=0;
		return $this->db->insert($this->table_name,$data);
	}
	function update($id,$data){
		$this->db->where($this->primary_key,$id);
		return $this->db->update($this->table_name,$data);
	}
	function delete($id){
		$cnt=0;
		$sql="select supplier_number from qry_kartu_hutang 
			where supplier_number='$id' limit 1";
		 
		if($row=$this->db->query($sql)->row()){
			 
			$cnt=$row->supplier_number!=""?1:0;
		} 
		if($cnt==0){
			$this->db->where($this->primary_key,$id);
			$this->db->delete($this->table_name);
		} 
		return $cnt;
	}
    function info($id){
        $data=$this->get_by_id($id)->row();
        if(count($data)){    
            $ret='<strong>'.$id.' - '.$data->supplier_name.'</strong> - '
                    .$data->street.' '.$data->city;
        } else $ret='';
        return $ret;
    }
	function saldo_hutang_summary_old()
	{
		$sql="select s.supplier_number,sum(p.amount) as sum_amount 
		from purchase_order p
		left join suppliers s on s.supplier_number=p.supplier_number
		where potype='I' 
		group by p.supplier_number
		order by sum(p.amount) desc
		limit 0,10";
		$query=$this->db->query($sql);
		foreach($query->result() as $row){
			$supp=$row->supplier_number;
			if($supp=="")$supp="Unknown";
			$amount=$row->sum_amount;
			if($amount==null)$amount=0;
			if($amount>0)$amount=round($amount/1000);
			$data[$supp]=$amount;
		}
		//var_dump($data);
		return $data;
	}
	function saldo_hutang_summary()
	{
		$sql="select s.supplier_number,sum(p.amount) as sum_amount 
		from purchase_order p
		left join suppliers s on s.supplier_number=p.supplier_number
		where potype='I' 
		group by p.supplier_number
		order by sum(p.amount) desc
		limit 0,10";
		$query=$this->db->query($sql);
                $data=null;
		foreach($query->result() as $row){
			$supp=$row->supplier_number;
			if($supp=="")$supp="Unknown";
			$amount=$row->sum_amount;
			if($amount==null)$amount=0;
			if($amount>0)$amount=round($amount/1000);
			$data[]=array(substr($supp,0,10),$amount);
		}
		return $data;
	}
	function saldo($supplier_number){
		$sql="select sum(amount) as z_amt from qry_kartu_hutang where supplier_number='$supplier_number'";
		return $this->db->query($sql)->row()->z_amt;
	}
	function valueof($ret_field,$search){
		$retval='';
		if($query=$this->db->select($ret_field)->where('supplier_number',$search)->get($this->table_name)){
			if($row=$query->row_array()){
				$retval=$row[$ret_field];
			}
		}
		return $retval;
	}

}

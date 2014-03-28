<?php
class Jurnal_model extends CI_Model {

private $primary_key='transaction_id';
private $table_name='gl_transactions';

function __construct(){
	parent::__construct();
}
	function get_paged_list($limit=10,$offset=0,
	$order_column='',$order_type='asc')
	{
                $nama='';
                if(isset($_GET['gl_id'])){
                    $nama=$_GET['gl_id'];
                }
                if($nama!='')$this->db->where("gl_id like '%$nama%'");

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
		$data['date']= date('Y-m-d H:i:s', strtotime($data['date']));
		return $this->db->insert($this->table_name,$data);
	}
	function update($id,$data){
	$data['date']= date('Y-m-d H:i:s', strtotime($data['date']));
		return $this->db->where($this->primary_key,$id);
	}
	function delete($id){
		$this->db->where($this->primary_key,$id);
		$this->db->delete($this->table_name);
	}
	function delete_item($id){
		$this->db->where('transaction_id',$id);
		return $this->db->delete($this->table_name);
	}
	function add_jurnal($gl_id,$account_id,$date,$debit,$credit,$operation,$source,$cid){
		$data['date']= date('Y-m-d H:i:s', strtotime($date));
		$data['gl_id']=$gl_id;
		$data['account_id']=$account_id;
		$data['debit']=$debit;
		$data['credit']=$credit;
		$data['operation']=$operation;
		$data['source']=$source;
		$data['company_code']=$cid;
		return $this->save($data);
	}
	function del_jurnal($id){
		$this->db->where('gl_id',$id);
		return $this->db->delete($this->table_name);
	}

}

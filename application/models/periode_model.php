<?php
class Periode_model extends CI_Model {

private $primary_key='period';
private $table_name='financial_periods';

function __construct(){
	parent::__construct();
}
 
function count_all(){
	return $this->db->count_all($this->table_name);
}
function get_by_id($id){
	$this->db->where($this->primary_key,$id);
	return $this->db->get($this->table_name);
}

function exist($id){
   return $this->db->count_all($this->table_name." where period='".$id."'")>0;
}
function save($data){
	$this->db->insert($this->table_name,$data);
	return $this->db->insert_id();
}
function update($id,$data){
	$this->db->where($this->primary_key,$id);
	$this->db->update($this->table_name,$data);
}
function delete($id){
	$this->db->where($this->primary_key,$id);
	$this->db->delete($this->table_name);
}
function dropdown(){
        $query=$this->db->query("select period from ".$this->table_name);
        $ret=array();
        $ret['']='- Select -';
        foreach ($query->result() as $row) {
                $ret[$row->period]=$row->period;
        }		 
        return $ret;
}
}

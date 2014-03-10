<?php
class Modules_model extends CI_Model {

private $primary_key='module_id';
private $table_name='modules';

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
function build_menu(){
    $this->db->where('parentid','0');
    $this->db->where('visible',1);
    $this->db->order_by('sequence');
    $query=$this->db->get('modules');
    $menu="<nav><ul>";
    foreach($query->result() as $row){
        $menu.="<li><a href='#'>".$row->module_name."</a> ";

        $menu.="<ul>";
        $this->db->where('parentid',$row->module_id);
        $this->db->where('visible',1);
        $this->db->order_by('sequence');
        $q_child=$this->db->get('modules');
        foreach($q_child->result() as $r_child){
            $description=$r_child->description;
            if($description=='.' or $description=='Please entry this')
                $description=$r_child->module_name;
            $menu.="<li>".anchor($r_child->form_name,
                    $r_child->module_name,' title="'.$description.'"');
            $menu.="</li>";
        }
        $menu.="</ul>";

        $menu.="</li>";
    }
    $menu.="</ul></nav>";
    return $menu;
}
}

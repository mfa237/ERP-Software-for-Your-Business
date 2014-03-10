<?php
class Inventory_moving_model extends CI_Model {

private $primary_key='transfer_id';
private $table_name='inventory_moving';
public $amount=0;

function __construct(){
	parent::__construct();
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
                $this->transfer_id=$id;
                $this->recalc();
		$this->db->where($this->primary_key,$id);
		return $this->db->get($this->table_name);
	}
        function recalc($id=''){
        
            if($id!='')$this->transfer_id=$id;
            $this->db->where('shipment_id',$this->transfer_id);
            $query=$this->db->get('inventory_card_header');
            $stock_card=$query->result();
            $this->db->where($this->primary_key,$this->transfer_id);
            $query=$this->db->get('inventory_moving');
            $this->amount=0;
            foreach ($query->result() as $row)
            {
               if($row->cost==0){
                    $this->db->where('item_number',$row->item_number);
                    $q=$this->db->get('inventory');
                    $stock=$q->result();
                    if(count($stock)){
                        $row->cost=$stock[0]->cost;
                        if($row->cost==0)$row->cost=$stock[0]->cost_from_mfg;
                        $row->unit=$stock[0]->unit_of_measure;
                    };
               }
               $row->total_amount=$row->from_qty*$row->cost;
               $row->date_trans=$stock_card[0]->date_received;
               
                $this->db->where('id',$row->id);
                $this->db->update('inventory_moving',$row);
                $this->amount=$this->amount+$row->total_amount;
            };
            $this->db->query("update inventory_card_header set amount="
                    .$this->amount." where shipment_id='".$id."'"); 
            return $this->amount;
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
		$this->db->where('transfer_id',$id);
		$this->db->delete('inventory_moving');
	}
	function add_item($data){
            $this->db->insert('inventory_moving',$data);
            return $this->db->insert_id();
        } 		

}

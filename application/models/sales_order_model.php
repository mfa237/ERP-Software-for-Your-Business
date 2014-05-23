<?php
class Sales_order_model extends CI_Model 
{
	private $primary_key='sales_order_number';
	private $table_name='sales_order';
	public $amount_paid=0;
	public $saldo=0;
	public $amount=0;
	public $sub_total=0;
	private $sql="select s.sales_order_number,s.sales_date,s.sold_to_customer,
	c.company,s.amount 
	from sales_order_number";
	function __construct(){
		parent::__construct();
	}
	function amount(){return $this->amount;}  
	function recalc($nomor){
	     
	    $this->load->model('payment_model');
		$this->load->model('sales_order_lineitems_model');
	    $this->sub_total=$this->sales_order_lineitems_model->total_amount($nomor);

    	$so=$this->get_by_id($nomor)->row();
		$disc_amount=$so->discount*$this->sub_total;
	    $this->amount=$this->sub_total-$disc_amount;
		$tax_amount=$so->sales_tax_percent*$this->amount;
		$this->amount=$this->amount+$tax_amount;
		$this->amount=$this->amount+$so->freight;
		$this->amount=$this->amount+$so->other;


		$this->db->where($this->primary_key,$nomor);
		$this->db->update($this->table_name,array('amount'=>$this->amount,
		'subtotal'=>$this->sub_total));
		
	    $this->amount_paid=$this->payment_model->total_amount($nomor);
	    $this->saldo= $this->amount-$this->amount_paid;
		
	    return $this->saldo;
	}
	
	function get_paged_list($limit=10,$offset=0,$order_column='',$order_type='asc')
	{
	    $nama=$this->input->get('nama');
		$sql=$this->sql;
		if($nama!='')$sql.=" where c.company like '%$nama%'";
		if($order_column!=''){
			$sql.=" order_by $order_column";
			$sql.=" $order_type ";
		}
	    return $this->db->query($sql,$limit,$offset);
	}
	function count_all(){
		return $this->db->count_all($this->table_name);
	}
	function get_by_id($id){
		$this->db->where($this->primary_key,$id);
		return $this->db->get($this->table_name);
	}
	function save($data){
		$data['sales_date']= date( 'Y-m-d H:i:s', strtotime($data['sales_date']));
		$data['due_date']= date( 'Y-m-d H:i:s', strtotime($data['due_date']));
		return $this->db->insert($this->table_name,$data);
		//return $this->db->insert_id();
	}
	function update($id,$data){
		$data['sales_date']= date( 'Y-m-d H:i:s', strtotime($data['sales_date']));
		$data['due_date']= date( 'Y-m-d H:i:s', strtotime($data['due_date']));
		$this->db->where($this->primary_key,$id);
		return $this->db->update($this->table_name,$data);
	}
	function delete($id){
	  	$this->db->where($this->primary_key,$id);
		$this->db->delete('sales_order_lineitems');        
		$this->db->where($this->primary_key,$id);
		$this->db->delete($this->table_name);
	}
     function add_item($id,$item,$qty){
        $sql="select description,retail,cost,unit_of_measure
            from inventory where item_number='".$item."'";
        
        $query=$this->db->query($sql);
        $row = $query->row_array(); 
         
        $data = array('sales_order_number' => $id, 'item_number' => $item, 
            'quantity' => $qty,'description'=>$row['description'],
            'price' => $row['retail'],'amount'=>$row['retail']*$qty,
            'unit'=>$row['unit_of_measure']
            );
        $str = $this->db->insert_string('sales_order_lineitems', $data);
        $query=$this->db->query($str);
		$this->recalc($id);
    }
    function del_item($line){
        $query=$this->db->query("delete from sales_order_lineitems where line_number=".$line);
    }  	 
	function select_list_not_delivered(){
       	$query=$this->db->query("select sales_order_number from sales_order where (delivered=false or delivered is null)");
        $ret=array();$ret['']='- Select -';
        foreach ($query->result() as $row){$ret[$row->sales_order_number]=$row->sales_order_number;}		 
        return $ret;
	}
	function recalc_ship_qty($nomor_so) {
	
		$s="update  sales_order_lineitems 
			left join (

			select from_line_number,sum(quantity) as qty_do
			from invoice_lineitems il
			where from_line_doc='$nomor_so' 
			group by from_line_number

			) ip
			on ip.from_line_number=sales_order_lineitems.line_number 

			set ship_qty=qty_do 

			where sales_order_lineitems.sales_order_number='$nomor_so'";
			
		$this->db->query($s);
		
		
		$s="update sales_order_lineitems set shipped=true where quantity=ship_qty 
		and sales_order_number='$nomor_so'";
		$this->db->query($s);

		$s="update sales_order_lineitems set shipped=false where quantity=ship_qty 
		and sales_order_number='$nomor_so'";
		$this->db->query($s);


		$s="update sales_order 
		
		left join (select sales_order_number,sum(quantity) as z_qty,
		sum(ship_qty) as z_ship_qty 
		from sales_order_lineitems
		where sales_order_number='$nomor_so'
		group by sales_order_number) il
		on il.sales_order_number=sales_order.sales_order_number
		
		set delivered=true 
		
		where z_qty=z_ship_qty 
		and sales_order.sales_order_number='$nomor_so'";
		
		$this->db->query($s);

		$s="update sales_order 
		
		left join (select sales_order_number,sum(quantity) as z_qty,
		sum(ship_qty) as z_ship_qty 
		from sales_order_lineitems
		where sales_order_number='$nomor_so'
		group by sales_order_number) il
		on il.sales_order_number=sales_order.sales_order_number
		
		set delivered=false
		
		where z_qty>z_ship_qty 
		and sales_order.sales_order_number='$nomor_so'";

		$this->db->query($s);

		
	}
}

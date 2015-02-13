<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Item extends CI_Controller {
	private $success=false;
	private	$message="";

	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form'));
		$this->load->library('template');
	}
	function index() {	
		$data['message']='';
		$data['active_tab']=1;
		$this->template->display_eshop('eshop/item',$data);
	}
	function view($item_id) {	
		$id=urldecode($id);
		$data['message']='';
		$data['item_id']=$item_id;
		$this->template->display_eshop('eshop/item',$data);
	}	
	function beli($item_id,$qty=1) {
		$data['caption']='Kantong Belanja';
		if(! $cart=$this->session->userdata('cart')){
			$cart=array();
			$this->session->set_userdata("rowid",0);
		}
		$rowid=$this->session->userdata("rowid");
		$new=array("item_number"=>$item_id,"qty"=>$qty,'rowid'=>$rowid);
		array_push($cart,$new);
		$this->session->set_userdata("rowid",$rowid+1);
		$this->session->set_userdata('cart',$cart);
		$url=base_url()."index.php/eshop/item/view_cart";
		header("location: ".$url);
	}
	function del_cart($rowid) {
		$cart=$this->session->userdata('cart');
		$this->session->unset_userdata('cart');
		$new_cart=array();
		for($i=0;$i<count($cart);$i++){
			if($cart[$i]['rowid']!=$rowid){
				array_push($new_cart,$cart[$i]);
			}
		}
		$this->session->set_userdata('cart',$new_cart);
		var_dump($new_cart);
	}
	function view_cart(){
		$cart=$this->session->userdata('cart');	
		$data['cart']=$cart;
		$this->template->display_eshop("eshop/cart",$data);
	}
	function view_edit($id) {
		$id=urldecode($id);
		$data['caption']="Manage Item";
		$data['item_id']=$id;
		$this->template->display_eshop("eshop/item_mas_form",$data);
	}
	function load_json($id){
		$id=urldecode($id);
		$ok=false;	$message="";	$data['success']=false;
		if($q=$this->db->select("item_number,description,category,sub_category,
			retail,cost,item_picture,unit_of_measure")->where("item_number",$id)
			->get("inventory"))
		{
			$item=$q->row();
			$data['item_number']=$item->item_number;	
			$data['description']=$item->description;	
			$data['category']=$item->category;	
			$data['sub_category']=$item->sub_category;	
			$data['retail']=$item->retail;	
			$data['cost']=$item->cost;	
			$data['item_picture']=$item->item_picture;	
			$data['unit_of_measure']=$item->unit_of_measure;
			$data['success']=true;
		}
		echo json_encode($data);
	}
	function save($mode="add"){
		if($mode=="view"){
			$data=$this->input->post();
			$item_no=$data['item_number'];
			unset($data['item_number']);
			$ok=$this->db->where("item_number",$item_no)
				->update("inventory",$data);
			$data['success']=$ok;
			if($ok){
				$data['message']="Berhasil.";
			} else {
				$data['message']="Gagal.";
			}
			echo json_encode($data);
		}
	}
}
<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Maxon_Inbox extends CI_Controller {
	
	private $table_name="maxon_inbox";
	
	function __construct() {
		parent::__construct();

		if(!$this->access->is_login())redirect(base_url());
		
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model("maxon_inbox_model");
		
	}
	function index() {}
	
	function send($from,$to,$subject,$message){
		$data['rcp_from']=$from;
		$data['rcp_to']=$to;
		$data['subject']=$subject;
		$data['message']=$message;
		$data['msg_date']=date('Y-m-d H:i:s');
		return $this->maxon_inbox_model->save($data);
	}
	function delete_msg($id){
		$this->db->where("id",$id);
		return $this->db->delete("maxon_inbox");
	}
	function view_msg($id){
		$this->db->where("id",$id);
		if($q=$this->db->get("maxon_inbox")){
			$row=$q->row();
			$tbl="<table style='width:100%'>";
			$tbl.="<tr><td>From</td><td>".$row->rcp_from."</td></tr>";
			$tbl.="<tr><td>To</td><td>".$row->rcp_to."</td></tr>";
			$tbl.="<tr><td>Subject</td><td>".$row->subject."</td></tr>";
			$tbl.="<tr><td>Date</td><td>".$row->msg_date."</td></tr>";
			$tbl.="<tr><td>Message</td><td>".$row->message."</td></tr>";
			$tbl.="</table>";
			$data['list_msg']=$tbl;
			
			$this->db->query("update maxon_inbox set is_read=1 where id=$id");
			
			$this->template->display("maxon_inbox/list_msg",$data);
		}
	}
	function list_msg_json() {
		$msg=""; $last_id=0;$data=null;
		$s="select rcp_from,subject,message,id,msg_date from maxon_inbox
		where rcp_to='".$this->access->user_id."' order by id desc limit 50";
		if($q=$this->db->query($s)){
			foreach($q->result() as $row){
				$data[]=$row;
			}
		}
		echo json_encode($data);
	}
	function list_msg() {
		$msg=""; $last_id=0;$data="";
		$s="select rcp_from,subject,message,id,msg_date,is_read from maxon_inbox";
		$s.=" where rcp_to='".$this->access->user_id."' order by id desc limit 50";
		
		$tbl="<table style='width:100%'>
		<thead><tr><th>From</th><th>Subject</th><th>Date</th><th>Read</th></tr></thead>
		<tbody>";
		if($q=$this->db->query($s)){
			foreach($q->result() as $row){
				$tbl.="<tr>";
				$tbl.="<td>".$row->rcp_from."</td><td>".anchor("maxon_inbox/view_msg/".$row->id,$row->subject)."</td>
				<td>".$row->msg_date."</td><td>".$row->is_read."</td>";
				$tbl.="</tr>";
			}
		}
		$tbl.="</tbody></table>";
		$data['list_msg']=$tbl;
        $this->template->display("maxon_inbox/list_msg",$data);
	}
	function notify(){
		$user_id=$this->input->get("user_id");
		$s="select count(1) as cnt from maxon_inbox where rcp_to='$user_id' and (is_read is null or is_read=0)";
		$cnt=$this->db->query($s)->row()->cnt;
		echo "<div class='info_link' href='".base_url()."index.php/maxon_inbox/list_msg'>Inbox <span class='box-badge'>$cnt</span> unread.</div>";	
	}
}

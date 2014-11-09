<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Aktiva_proses extends CI_Controller {
	
	private $periode;
	private $asset_id;
	
	function __construct()
	{
		parent::__construct();
		
		$this->periode=date("Y-m");
		$this->asset_id="";
		
		if(!$this->access->is_login())redirect(base_url());
		
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('aktiva_model');
	}
	function index()
	{	
		$this->load->model("periode_model");
		$data['message']='';
		$data['asset_list']=$this->aktiva_model->loadlist();
		$data['periode_list']=$this->periode_model->loadlist();
		$this->template->display_form_input('aktiva/proses',$data);
	}
	function exist($asset_id) {
		 $asset_id=urldecode($asset_id);
	
	}
	function save($asset_id) {
		 $asset_id=urldecode($asset_id);
	
	}
	function straight_line($asset_id,$period="") {
		$asset_id=urldecode($asset_id);
		$period=urldecode($period);
		$data['amount']=0;
		$data['book']=0;
		$s = "select * from fa_asset_depreciation_schedule
            where depn_year='".$this->periode."' 
            and asset_id='$asset_id'";
		if($q=$this->db->query($s)){
            $data_ads['accum_depn'] = oDepn.Akum_Value
            $data_ads['book_value'] = oDepn.Book_value
			
			if($ads=$q->row()) {
				//exist
				$data_ads['depn_year'] = sPrd
				//$data_ads['depn_id'] = !depn_year
				//$data_ads['acquisition_cost'] = oDepn.Acquisition_Cost
				//$data_ads['depn_exp'] = oDepn.Expenses_value
				$this->db->where("asset_id='$asset_id' and depn_year='".$this->periode."'");
				$this->db->update($data_ads);
			} else {
				// calculate depn
				$data_proc=$this->straight_line_process();
				$data_ads['accum_depn']=$data_proc['akum_value'];
				$data_ads['book_value']=$data_proc['book_value'];
				$this->db->save($data_ads);
			}
			
		return $data;
	}
	function straight_line_process() {
		//'--- hitung berapa persen dari masa pakai
		$nPrc=0;
		if($this->item->useful_lives==0)$this->item->useful_lives=12; //-- default 12 bulan
		$nPrc = 100 / $this->item->useful_lives;
		 
		$nDepn=0;
		$expenses_value = ($nPrc / 100) * ($this->item->acquisition_cost - $this->item->salvage_value)
		//'--- buat table
		$m_xItem=null;
		$this->book_value = $this->item->acquisition_cost
		for($i = 0;$this->item->useful_lives;$i++){
			$akum_value = $akum_value + $expenses_value;
			$book_value = $book_value - $expenses_value;
			if($book_value>$this->item->salvage_value){
				if($i == 0) {
				   $m_xItem[$i]->acquisition_date = $this->item->acquisition_date;
				} else {
					$m_xItem[$i]->acquisition_date = $this->add_date($this->item->acquisition_date,$i);
				}
				if(date("Y-m",$m_xItem[$i])==$this->periode} {	
					//found period
					$data_reval=$m_xItem[$i];
					$i=$this->useful_lives;
				} else {
					$m_xItem[$i]->expenses_value = $expenses_value;
					$m_xItem[$i]->acquisition_cost = $this->item->acquisition_cost;
					$m_xItem[$i]->akum_value = akum_value;
					$m_xItem[$i]->book_value = $book_value;
				}
			}
        }
		return $data_retval;
	}
	function add_date($orgDate,$mth){ 
	  $cd = strtotime($orgDate); 
	  $retDAY = date('Y-m-d', mktime(0,0,0,date('m',$cd)+$mth,date('d',$cd),date('Y',$cd))); 
	  return $retDAY; 
	} 	

	function sum_of_year($asset_id,$period="") {
		$asset_id=urldecode($asset_id);
		$period=urldecode($period);
		$data['amount']=0;
		$data['book']=0;
		$s = "select * from fa_asset_depreciation_schedule
            where depn_year='".$this->periode."' 
            and asset_id='$asset_id'";
		if($q=$this->db->query($s)){
            $data_ads['accum_depn'] = oDepn.Akum_Value
            $data_ads['book_value'] = oDepn.Book_value
			
			if($ads=$q->row()) {
				//exist
				$data_ads['depn_year'] = sPrd
				//$data_ads['depn_id'] = !depn_year
				//$data_ads['acquisition_cost'] = oDepn.Acquisition_Cost
				//$data_ads['depn_exp'] = oDepn.Expenses_value
				$this->db->where("asset_id='$asset_id' and depn_year='".$this->periode."'");
				$this->db->update($data_ads);
			} else {
				// calculate depn
				$data_proc=$this->sum_of_year_process();
				$data_ads['accum_depn']=$data_proc['akum_value'];
				$data_ads['book_value']=$data_proc['book_value'];
				$this->db->save($data_ads);
			}
			
		return $data;
	}
	function sum_of_year_process() {
		$m_xItem=null;
		For($i = 0;$i<$this->item->useful_lives;$i++) {
			$expenses_value = ($this->item->useful_lives - $i) / $this->iem->useful_live;
			$expenses_value = $expenses_value * ($this->item->acquisition_cost - $this->item->salvage_value;
			$akum_value = $akum_value + $expenses_value;
			$book_value = $book_value - $expenses_value
			
			If($i == 0) {
			   $m_xItem[$i]->acquisition_date=$this->item->acquisition_date;
			} else {
				$m_xItem[$i]->acquisition_date = $this->add_date($this->item->acquisition_date,$i);
			}
			if(date("Y-m",$m_xItem[$i])==$this->periode) {	
				//found period
				$data_reval=$m_xItem[$i];
				$i=$this->useful_lives;
			} else {
				$m_xItem[$i]->expenses_value = $expenses_value;
				$m_xItem[$i]->acquisition_cost = $this->item->acquisition_cost;
				$m_xItem[$i]->akum_value = akum_value;
				$m_xItem[$i]->book_value = $book_value;
			}
		}
	}
	function declining_balance($asset_id,$period="") {
		$asset_id=urldecode($asset_id);
		$period=urldecode($period);
		$data['amount']=0;
		$data['book']=0;
		$s = "select * from fa_asset_depreciation_schedule
            where depn_year='".$this->periode."' 
            and asset_id='$asset_id'";
		if($q=$this->db->query($s)){
            $data_ads['accum_depn'] = oDepn.Akum_Value
            $data_ads['book_value'] = oDepn.Book_value
			
			if($ads=$q->row()) {
				//exist
				$data_ads['depn_year'] = sPrd
				//$data_ads['depn_id'] = !depn_year
				//$data_ads['acquisition_cost'] = oDepn.Acquisition_Cost
				//$data_ads['depn_exp'] = oDepn.Expenses_value
				$this->db->where("asset_id='$asset_id' and depn_year='".$this->periode."'");
				$this->db->update($data_ads);
			} else {
				// calculate depn
				$data_proc=$this->sum_of_year_process();
				$data_ads['accum_depn']=$data_proc['akum_value'];
				$data_ads['book_value']=$data_proc['book_value'];
				$this->db->save($data_ads);
			}
			
		return $data;
	}
	function declining_balance_process() {
		//'--- hitung berapa persen dari masa pakai
		$nPrc = 100 / $this->item->useful_lives;
		//'-- dalam metode ini biasanya 2 kali methode straight line
		$nPrc = $nPrc * 2
		$book_value = $this->item-->acquisition_cost;
		for($i = 0;$i<$this->item->useful_lives;$i++) {
			if($i == 0) { 
				//'---- periode pertama adalah sama dengan perolehan
				$expenses_value = ((($nPrc / 100) * ($this->item->acquisition_cost - 0)));
				$book_value = $book_value - $expenses_value;
				$akum_value = $expenses_value;
			} else {
				$xpenses_value = (($nPrc / 100) * ($book_value));
				$nTmp = $book_value - $expenses_value;
				if($nTmp < $this->item->salvage_value) {
					$expenses_value = $book_value - $this->item->salvage_value;
				}
				$akum_value = $akum_value + $expenses_value;
				$book_value = $book_value - $xpenses_value;
			}	
			//'--- periode terakhir lebih dari nilai salvage

			if(i == 0) {
			   $m_xItem[$i]->acquisition_date = $this->item->acquisition_date;
			Else
				$m_xItem[$i]->acquisition_date = $this->add_date($this->item->acquisition_date,$i);
			}
			if(date("Y-m",$m_xItem[$i])==$this->periode) {	
				//found period
				$data_reval=$m_xItem[$i];
				$i=$this->useful_lives;
			} else {
				$m_xItem[$i]->expenses_value = $expenses_value;
				$m_xItem[$i]->acquisition_cost = $this->item->acquisition_cost;
				$m_xItem[$i]->akum_value = akum_value;
				$m_xItem[$i]->book_value = $book_value;
			}
		}
		return $data;
	}
	function no_method($asset_id,$period="") {
		$asset_id=urldecode($asset_id);
		$period=urldecode($period);
		$data['amount']=0;
		$data['book']=0;
		return $data;
	}
	
	function load($periode) {
		$period=urldecode($period);
		$aktiva=$this->aktiva_model->load_all();
		$rows=null;
		foreach($aktiva->result() as $row_aktiva) {
			
			$this->asset_id=$row_aktiva->id;
			if($this->item->useful_lives==0)$this->item->useful_lives=12; //-- default 12 bulan
			
			if($row_aktiva->depn_method=="1") {
				$depn=$this->straight_line($row_aktiva->id);
			} else if ($row_aktiva->depn_method=="2") {
				$depn=$this->sum_of_year($row_aktiva->id);
			} else if ($row_aktiva->depn_method=="3") {
				$depn=$this->declining_balance->process($row_aktiva->id);
			} else {
				$depn=$this->no_method($row_aktiva->id);
			}
			if($depn!=null) {
				$row_data['id']=$row_aktiva->id;
				$row_data['description']=$row_aktiva->description;
				$row_data['depr_amount']=$depn['amount'];
				$row_data['book_amount']=$depn['book'];
				$rows[]=$row_data;
			}
		}
			
        $data['total']=count($rows);
        $data['rows']=$rows;
                    
        echo json_encode($data);
	}
 
}

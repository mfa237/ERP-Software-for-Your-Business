<?
         $CI =& get_instance();
         $CI->load->model('company_model');
         $model=$CI->company_model->get_by_id($CI->access->cid)->row();
		$alamat=$model->street.' '.$model->suite.' '
			.$model->city_state_zip_code.' Phone: '.$model->phone_number; 	

		 
			tcpdf();
			$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			$obj_pdf->SetCreator(PDF_CREATOR);
			 
///			$obj_pdf->SetTitle("");
			$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_STRING,$alamat);
			$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			$obj_pdf->SetDefaultMonospacedFont('helvetica');
			$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT+10);
			$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			$obj_pdf->SetFont('helvetica', '', 9);
			$obj_pdf->setFontSubsetting(false);
			$obj_pdf->AddPage();
			
			ob_start();
			
			$CI->load->view('purchase/rpt/print_po_pdf.php');
			
			$content = ob_get_contents();
			ob_end_clean();
			//echo $content;
			$obj_pdf->writeHTML($content);
			$obj_pdf->Output('output.pdf', 'I');
			
?>

<?
/*
if($this->session->userdata('pos')==''){
	echo "<p>Belum ada session yang aktif untuk user anda, silahkan bikin terlebih dahulu.</p>";
	echo "<p><a href='".base_url()."index.php/pos/new_session'>Buat Session Baru</a></p>";
} else {
*/

///	header('Location: http://'.base_url().'index.php/pos');
//}
 
?>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/pos/style.css">
<script type="text/javascript" charset="utf-8" src="<?=base_url()?>assets/printThis-master/printThis.js"></script>

<div class='pos'>
	<div class='pos-content'>
		<div class='col-sm-4 thumbnail'>
			<div class='nota' id="divNota">
				<table id='tbl_nota' width='100%' cellpadding='5' class='nota-content'>
				</table>
			</div>
			<div class='nota-pay thumbnail'>
				<table>
				<tr><td><strong>Payment&nbsp</strong></td>
					<td><strong>Total</strong></td><td><span id='ttl_nota'>0</span></td>
				</tr>
				<tr>
					<td></td>
					<td><strong>Sisa/Kembali</strong></td><td><span id='ttl_sisa'>0</span></td>
				</tr>
				<tr><td>Cash</td><td><?=form_input('cash',"","id='cash' onblur='total_nota()'")?></td></tr>
				<tr><td>Credit Card</td><td><?=form_input('creditcard',"","id='creditcard'  onblur='total_nota()'")?></td></tr>
				<tr><td>&nbsp</td><td><?=link_button('Submit','submit_payment()','save','false')?></td>
				</tr>
				</table>
			</div>
			 
			<div class='thumbnail col-sm-12'> 
				<? include_once "numpad.php" ?>
			</div>
			<div class='col-md-12 thumbnail'>
				<?=link_button('New','tambah()','add','false')?>
				<?=link_button('Open','open_nota()','add','false')?>
				<?=link_button('Void','void_nota()','add','false')?>			
			</div>
		</div>
		<div class='col-sm-8 thumbnail'>
			 <div class='search'>
				<ol class='breadcrumb'></ol>
			 </div>
			 <div class='category'>
				<div class="cat-prev" onclick="cat_prev()">
					BEFORE
				</div>
				<div class="cat-next"  onclick="cat_next()">
					AFTER
				</div>
				<div class='clearfix'></div>
				<div class='cat-content' id="cat-content">
				</div>
			 </div>
			 <div class='product' id='product'></div>
		</div>
	</div>
</div>

<div id='dlgNotaPrint'  class="easyui-dialog"  closed="true"  buttons="#btnPrint"
	 style="width:300px;height:500px;padding:5px 5px">
	<div id='divNotaPrint' style="padding:10px; font-family: 'Courier New';"></div>
</div>
<div id="btnPrint">
	<?=link_button("Cetak","print_nota()","print","false");?>
</div>
<script>
	var next_row=0;
	var tableData=null;
	var selected_row=0;
	var button_mode="btn_qty";
	var xqty='';
	var xprice='';
	var baris="";
	var focus_text="cash";
	var total = 0;
	var sisa=0;
	var idx_cat_page=0;
	var max_cat_page=4;
	var arBarang = null;
	var arItem=[];
	
	$(document).ready(function(){
		void cat_home('');
		void refresh_cat();
	});
	
	function cat_prev(){
		idx_cat_page--;
		if(idx_cat_page<0)idx_cat_page=0;
		refresh_cat();
	}
	function cat_next(){
		idx_cat_page++;
		if(idx_cat_page>max_cat_page)idx_cat_page=0;
		refresh_cat()
	}
	function refresh_cat(){
		var url='<?=base_url()?>index.php/inventory/pos_category/'+idx_cat_page;
		$.ajax({type: "GET",url: url,data:'',
			success: function(msg){	$("#cat-content").html(msg);},
			error: function(msg){console.log(msg);}
		});			
	}	
	function list_barang(cat) {
		var url='<?=base_url()?>index.php/inventory/pos_items/'+cat;
		$.ajax({
			type: "GET",
			url: url,
			data:'',
			success: function(msg){
				var result = eval('('+msg+')');
				arBarang=result.rec;
				$("#product").html(result.html);				
				$(".breadcrumb").html("<li><a class='first-cat glyphicon glyphicon-home'"
				+"href='#' onclick='cat_home();return false'> Home</a></li>"
				+"<li><a href='#'>"+cat+"</a></li>");
			},
			error: function(msg){console.log(msg);}
		});			
	}
	function cat_home() { 
		$(".breadcrumb").html("<li> Home</li>");
		list_barang('');
	};
	$("#cash").click(function(){
		focus_text="cash";
	});
	$("#creditcard").click(function(){
		focus_text="creditcard";
	});
	
	$(document).on("click",".cat-cell",function() {
		var cat = $(this).attr("id");
		list_barang(cat);
	});
	$(document).on('click', '.item-cell', function(){
			next_row=next_row+1;
			var kode=this.id;
			var i = arBarang.inArray(kode, "item_number");
			var sDesc=arBarang[i].description;
			var sPrice=arBarang[i].retail;
			var nAmount=parseInt(sPrice);
			$(".nota-content").append("  "
			+"<tr class='line-order '  > "
			+"<td colspan='2' style='display:none'>"+next_row+"</td>"
			+"<td colspan='2'>"+kode+"</td>"
			+"<td colspan='2'>"+sDesc+"</td>"
			+"</tr><tr> "
			+"<td><span id='q_"+next_row+"'>1</span></td><td> x </td>"
			+"<td><span id='p_"+next_row+"'>"+sPrice+"</span></td>"
			+"<td><span class='t_amount' id='t_"+next_row+"'>"+formatNumber(nAmount)+"</span></td>"
			+"</tr>");
			total_nota();
			
	});
	
	$(document).on('click','.line-order',function() {	
		tableData = $(this).children("td").map(function() {
				return $(this).text();
			}).get();
		$("tr").eq(selected_row).removeClass("row-selected");
		selected_row= $(this).index();
		xqty='';xprice='';
		$(this).addClass("row-selected");
	});
	$(document).on('click','.number-char',function() {
		if(button_mode=="btn_pay") {
			$("#"+focus_text).val($("#"+focus_text).val()+$(this).html());
			total_nota();
			return false;
		}
		if(!tableData){	
			alert("Pilih salah satu baris.");
			return false;
		}
		baris=tableData[0];
		price=parseInt($("#p_"+baris).html());
		qty=parseInt($("#q_"+baris).html());
		if(button_mode=="btn_qty"){
			xqty=xqty+$(this).html();
			qty=parseInt(xqty);
			tableData[3]=qty;
		}
		if(button_mode=="btn_price")		{
			xprice=xprice+$(this).html();
			price=parseInt(xprice);
			tableData[5]=price;		
			$("#p_"+baris).html(price);
		}
		var amount=qty*price;
		$("#q_"+baris).html(qty);
		$("#t_"+baris).html(formatNumber(amount));
		total_nota();
	});
	
	$(document).on('click','.numpad-backspace',function() {
		if(button_mode=="btn_pay"){
			var cash=$("#"+focus_text).val();
			$("#"+focus_text).val(cash.substr(0,cash.length-1));
			total_nota();
			return false;
		}
		if(button_mode=="btn_qty"){
			xqty=xqty.toString().substr(0,qty.toString().length-1);
			if(xqty=='')xqty="0";
			$("#q_"+baris).html(qty);
		}
		if(button_mode=="btn_price"){
			xprice=xprice.toString().substr(0,xprice.toString().length-1);
			if(xprice=='')xprice="0";
			$("#p_"+baris).html(xprice);
			price=xprice;
		}
		price=parseInt($("#p_"+baris).html());
		qty=parseInt($("#q_"+baris).html());
		var amount=qty*price;
		$("#t_"+baris).html(formatNumber(amount));
		total_nota();
	});
	$(document).on('click','.mode-button',function() {	
		xprice='';
		$("#"+button_mode).removeClass("selected-mode");
		$("#"+this.id).addClass("selected-mode");
		button_mode=this.id;
	});
	function total_nota(){
		arItem=[];
		var total=0;
		var i=0;
		$(".line-order").each(function(){
			td = $(this).children("td").map(function() {
				return $(this).text();
			}).get();
			i++;
			q=$("#q_"+i).html();
			p=$("#p_"+i).html();
			t=$("#t_"+i).html();
			t=t.replace(",","");
			t=t.replace(",","");
			total += (+t);
			arItem.push([td[0],td[1],td[2],q,p,t]);	
		});
		///console.log(arItem);
		var cash=$("#cash").val();
		var card=$("#creditcard").val();
		if(cash=="")cash=0;
		if(card=="")card=0;
		sisa=total-cash-card;
		$("#ttl_nota").html(formatNumber(total));
		$("#ttl_sisa").html(formatNumber(sisa));
		
	}
	function submit_payment() {
		void total_nota();
		var total=$("#ttl_nota").html();
		var sisa=$("#ttl_sisa").html();
		var cash=$("#cash").val();
		var card=$("#creditcard").val();
		var s="<table><tr><td colspan='5'>TOKO MYPOS</td></tr>";
		s += "<tr><td colspan='5'>JL. RAYA PURWAKARTA</td></tr>";
		s += "<tr><td colspan='5'>TELP: 082112829192</td></tr>";
		s += "<tr><td colspan='5'>PURWAKARTA</td></tr>";
		s += "<tr><td colspan='5'>=============================</td></tr>";
		for(i=0;i<arItem.length;i++){
			s += "<tr>";
			s += "<td colspan='5'>"+arItem[i][2]+"</td></tr>";
			s += "<tr><td>"+arItem[i][3]+"</td><td>x</td><td align='right'>"+formatNumber(arItem[i][4])+"</td><td>=</td><td align='right'>"+formatNumber(arItem[i][5])+"</td>";
			s += "</tr>";
		}
		s += "<tr><td colspan='5'>=============================</td></tr>";
		s += "<tr><td colspan='4'>TOTAL</td><td align='right'>Rp. "+(total)+"</td></tr>";
		s += "<tr><td colspan='4'>BAYAR CASH</td><td align='right'>Rp. "+formatNumber(cash)+"</td></tr>";
		s += "<tr><td colspan='4'>BAYAR CARD</td><td align='right'>Rp. "+formatNumber(card)+"</td></tr>";
		sisa=sisa.replace(",","");
		sisa=sisa.replace(",","");		
		if((+sisa)<0) {
			s += "<tr><td colspan='4'>KEMBALI</td><td align='right'>Rp. "+formatNumber(Math.abs(sisa))+"</td></tr>";
		}
		s += "</table>";
		$("#divNotaPrint").html(s);
		$('#dlgNotaPrint').dialog({modal: true}).dialog('open').dialog('setTitle','Print Dialog');
	}
	function print_nota(){
		$("#divNotaPrint").printThis();
	}
	
var STR_PAD_LEFT = 1;
var STR_PAD_RIGHT = 2;
var STR_PAD_BOTH = 3;

function pad(str, len, pad, dir) {
    if (typeof(len) == "undefined") { var len = 0; }
    if (typeof(pad) == "undefined") { var pad = ' '; }
    if (typeof(dir) == "undefined") { var dir = STR_PAD_RIGHT; }

    if (len + 1 >= str.length) {

        switch (dir){

            case STR_PAD_LEFT:
                str = Array(len + 1 - str.length).join(pad) + str;
            break;

            case STR_PAD_BOTH:
                var right = Math.ceil((padlen = len - str.length) / 2);
                var left = padlen - right;
                str = Array(left+1).join(pad) + str + Array(right+1).join(pad);
            break;

            default:
                str = str + Array(len + 1 - str.length).join(pad);
            break;

        } // switch

    }
	return str;
}
	
</script>

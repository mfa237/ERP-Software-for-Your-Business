<form  id="frmLink" method='post' >
	<table>
		<tr>
			<td colspan="2"><h2>PEMBELIAN</h2></td>
		</tr>
		<tr>
			<td>Hutang (Account Payable)</td><td><?
			echo form_input('accounts_payable',$accounts_payable,'id="accounts_payable" style="width:250px"');
			echo link_button('','lookup_coa(\'accounts_payable\')','search');
			?></td>
		</tr>
		<tr>
			<td>Ongkos Angkut</td><td><?
			echo form_input('po_freight',$po_freight,'id="po_freight" style="width:250px"');
			echo link_button('','lookup_coa(\'po_freight\')','search');
			?></td>
		</tr>
		<tr>
			<td>Biaya Lainnya</td><td><?
			echo form_input('po_other',$po_other,'id="po_other" style="width:250px"');
			echo link_button('','lookup_coa(\'po_other\')','search');
			?></td>
		</tr>
		<tr>
			<td>Pajak Pembelian</td><td><?
			echo form_input('po_tax',$po_tax,'id="po_tax" style="width:250px"');
			echo link_button('','lookup_coa(\'po_tax\')','search');
			?></td>
		</tr>
		<tr>
			<td>Potongan Pembelian</td><td><?
			echo form_input('po_discounts_taken',$po_discounts_taken,'id="po_discounts_taken" style="width:250px"');
			echo link_button('','lookup_coa(\'po_discounts_taken\')','search');
			?></td>
		</tr>
		<tr>
			<td>Kredit/Debit Memo</td><td><?
			echo form_input('supplier_credit_account_number',$supplier_credit_account_number,'id="supplier_credit_account_number" style="width:250px"');
			echo link_button('','lookup_coa(\'supplier_credit_account_number\')','search');
			?></td>
		</tr>
		<tr>
			<td>Uang Muka Pembelian</td><td><?
			echo form_input('txtUangMukaBeli',$txtUangMukaBeli,'id="txtUangMukaBeli" style="width:250px"');
			echo link_button('','lookup_coa(\'txtUangMukaBeli\')','search');
			?></td>
		</tr>


		<tr>
			<td colspan="2"><h2>PERSEDIAAN</h2></td>
		</tr>
		<tr>
			<td>Penjualan Barang</td><td><?
			echo form_input('inventory_sales',$inventory_sales,'id="inventory_sales" style="width:250px"');
			echo link_button('','lookup_coa(\'inventory_sales\')','search');
			?></td>
		</tr>
		<tr>
			<td>Persediaan</td><td><?
			echo form_input('inventory',$inventory,'id="inventory" style="width:250px"');
			echo link_button('','lookup_coa(\'inventory\')','search');
			?></td>
		</tr>
		<tr>
			<td>Harga Pokok Persediaan</td><td><?
			echo form_input('inventory_cogs',$inventory_cogs,'id="inventory_cogs" style="width:250px"');
			echo link_button('','lookup_coa(\'inventory_cogs\')','search');
			?></td>
		</tr>
		<tr>
			<td>Retur Penjualan</td><td><?
			echo form_input('txtReturJual',$txtReturJual,'id="txtReturJual" style="width:250px"');
			echo link_button('','lookup_coa(\'txtReturJual\')','search');
			?></td>
		</tr>
		<tr>
			<td>Pengeluaran Barang Lainnya</td><td><?
			echo form_input('txtCoaItemOut',$txtCoaItemOut,'id="txtCoaItemOut" style="width:250px"');
			echo link_button('','lookup_coa(\'txtCoaItemOut\')','search');
			?></td>
		</tr>
		<tr>
			<td>Penerimaan Barang Lainnya</td><td><?
			echo form_input('txtCoaItemIn',$txtCoaItemIn,'id="txtCoaItemIn" style="width:250px"');
			echo link_button('','lookup_coa(\'txtCoaItemIn\')','search');
			?></td>
		</tr>
		<tr>
			<td>Penyesuaian Stock (Stock Adjust)</td><td><?
			echo form_input('txtCoaItemAdj',$txtCoaItemAdj,'id="txtCoaItemAdj" style="width:250px"');
			echo link_button('','lookup_coa(\'txtCoaItemAdj\')','search');
			?></td>
		</tr>

		<tr>
			<td colspan="2"><h2>PENJUALAN</h2></td>
		</tr>
		<tr>
			<td>Piutang (Account Receivable)</td><td><?
			echo form_input('accounts_receivable',$accounts_receivable,'id="accounts_receivable" style="width:250px"');
			echo link_button('','lookup_coa(\'accounts_receivable\')','search');
			?></td>
		</tr>
		<tr>
			<td>Ongkos Angkut Penjualan</td><td><?
			echo form_input('so_freight',$so_freight,'id="so_freight" style="width:250px"');
			echo link_button('','lookup_coa(\'so_freight\')','search');
			?></td>
		</tr>
		<tr>
			<td>Biaya Lainnya</td><td><?
			echo form_input('so_other',$so_other,'id="so_other" style="width:250px"');
			echo link_button('','lookup_coa(\'so_other\')','search');
			?></td>
		</tr>
		<tr>
			<td>Pajak Penjualan</td><td><?
			echo form_input('so_tax',$so_tax,'id="so_tax" style="width:250px"');
			echo link_button('','lookup_coa(\'so_tax\')','search');
			?></td>
		</tr>
		<tr>
			<td>Potongan Penjualan</td><td><?
			echo form_input('so_discounts_given',$so_discounts_given,'id="so_discounts_given" style="width:250px"');
			echo link_button('','lookup_coa(\'so_discounts_given\')','search');
			?></td>
		</tr>
		<tr>
			<td>Debit/Kredit Memo Piutang</td><td><?
			echo form_input('customer_credit_account_number',$customer_credit_account_number,'id="customer_credit_account_number" style="width:250px"');
			echo link_button('','lookup_coa(\'customer_credit_account_number\')','search');
			?></td>
		</tr>
		<tr>
			<td>Uang Muka Penjualan</td><td><?
			echo form_input('txtUangMukaJual',$txtUangMukaJual,'id="txtUangMukaJual" style="width:250px"');
			echo link_button('','lookup_coa(\'txtUangMukaJual\')','search');
			?></td>
		</tr>
		<tr>
			<td>Charge Kartu Kredit</td><td><?
			echo form_input('txtChargeCC',$txtChargeCC,'id="txtChargeCC" style="width:250px"');
			echo link_button('','lookup_coa(\'txtChargeCC\')','search');
			?></td>
		</tr>
		<tr>
			<td>Biaya Promosi</td><td><?
			echo form_input('txtPromo',$txtPromo,'id="txtPromo" style="width:250px"');
			echo link_button('','lookup_coa(\'txtPromo\')','search');
			?></td>
		</tr>
		<tr>
			<td>Biaya Bonus / Hadiah</td><td><?
			echo form_input('txtGift',$txtGift,'id="txtGift" style="width:250px"');
			echo link_button('','lookup_coa(\'txtGift\')','search');
			?></td>
		</tr>

		<tr>
			<td colspan="2"><h2>KAS / BANK</h2></td>
		</tr>
		<tr>
			<td>Perkiraan Transaksi Kas</td><td><?
			echo form_input('default_cash_payment_account',$default_cash_payment_account,'id="default_cash_payment_account" style="width:250px"');
			echo link_button('','lookup_coa(\'default_cash_payment_account\')','search');
			?></td>
		</tr>
		<tr>
			<td>Perkiraan Transaksi Bank</td><td><?
			echo form_input('default_bank_account_number',$default_bank_account_number,'id="default_bank_account_number" style="width:250px"');
			echo link_button('','lookup_coa(\'default_bank_account_number\')','search');
			?></td>
		</tr>
		<tr>
			<td>Nomor Kartu Kredit</td><td><?
			echo form_input('default_credit_card_account',$default_credit_card_account,'id="default_credit_card_account" style="width:250px"');
			echo link_button('','lookup_coa(\'default_credit_card_account\')','search');
			?></td>
		</tr>

		<tr>
			<td colspan="2"><h2>AKUNTANSI</h2></td>
		</tr>
		<tr>
			<td>Laba/Rugi Periode Berjalan</td><td><?
			echo form_input('earning_account',$earning_account,'id="earning_account" style="width:250px"');
			echo link_button('','lookup_coa(\'earning_account\')','search');
			?></td>
		</tr>
		<tr>
			<td>Laba/Rugi Ditahan</td><td><?
			echo form_input('year_earning_account',$year_earning_account,'id="year_earning_account" style="width:250px"');
			echo link_button('','lookup_coa(\'year_earning_account\')','search');
			?></td>
		</tr>
		<tr>
			<td>Historical Balance</td><td><?
			echo form_input('historical_balance_account',$historical_balance_account,'id="historical_balance_account" style="width:250px"');
			echo link_button('','lookup_coa(\'historical_balance_account\')','search');
			?></td>
		</tr>

	</table>
	
	<input type='submit' name='cmdSave'>
</form>

   
<?=load_view('gl/select_coa_link')?>   	
   

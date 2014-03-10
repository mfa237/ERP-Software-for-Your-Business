/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50041
Source Host           : localhost:3306
Source Database       : simak

Target Server Type    : MYSQL
Target Server Version : 50041
File Encoding         : 65001

Date: 2013-09-08 10:18:03
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `articles`
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) default NULL,
  `date_post` datetime default NULL,
  `view_count` int(11) default NULL,
  `author` varchar(50) default NULL,
  `category` varchar(50) default NULL,
  `content` varchar(10000) default NULL,
  `show_on_top` int(11) default NULL,
  `icon_file` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('8', 'EPIP -(Export Import Data)', '2012-06-06 00:00:00', null, 'Andri', 'clients', '<h1>EPIP (Export Import)</h1>\r\n</br>--------------------------\r\n</br>Download: <a href=\"http://f.intanhotel.com/epip.rar\">Klik disini</a>\r\n</br></br>Adalah sebuah tool yang dibuat bagi anda untuk tarik data-data tansaksi antar database.\r\n</br>EPIP bisa gunakan untuk jenis data Ms Access ke Ms SQL Server, Ms Access ke Ms Access atau sebaliknya.\r\n</br>Data yang ditarik meliputi data transaksi penjualan, sales order, surat jalan.\r\n</br><img src=\"http://f.intanhotel.com/img/epip.jpg\">\r\n</br></br><strong>Cara Penggunaan</strong></br>\r\n</br>1. Double klik shortcut EPIP\r\n</br>2. Isi tanggal awal dan tanggal akhir\r\n</br>3. Contreng jenis transaksi yang ingin anda export\r\n</br>4. Klik tombol transfer data transaksi dan tunggulah sampai selesai.\r\n</br></br>Sebelum anda menjalankan proses di atas anda diharuskan untuk membuat setting database sumber dan database target seperti tampk dibawah ini\r\n</br><img src=\"http://f.intanhotel.com/img/epip_set.jpg\">\r\n</br><img src=\"http://f.intanhotel.com/img/epip_set2.jpg\">\r\n', '0', null);
INSERT INTO `articles` VALUES ('20', 'MdbExecute', '2012-06-06 00:00:00', null, 'Andri', 'clients', '<h1>MDBEXECUTE</h1>\r\n<p>Download: <a href=\"http://f.intanhotel.com/mdb.rar\">Klik disini</a></p>\r\n<p>MdbExecute adalah tool command dos untuk membuat exsekusi perintah-perintah sql yang disertakan dalam file sql yang anda buat, bisa juga anda gunakan untuk compact dan backup file Ms Access yang anda miliki.</p>\r\n<p><strong>Parameter: </strong></br>\r\n- /mdb : untuk menentukan file mdb yang akan di proses</br>\r\n- /sql : untuk menentukan file sql command yang akan di eksekusi</br>\r\n- /user: untuk user bagi file mdb yang di protect</br>\r\n- /pwd : untuk password bagi file mdb yang di protect</br>\r\n- /nomove: agar tool ini memindahkan dan menghapus file mdb diatas</br>\r\n- /compact: agar melakukan proses compact database</br>\r\n</br><strong>Contoh penggunaan:</strong></br>\r\nmdb.exe /mdb:data.mdb /sql:kosong.sql /user:admin /pwd:nita /nomove:true</br>\r\nmdb.exe /mdb:data.mdb /compact /user:admin /pwd:nita</br>\r\n\r\n</p>', '0', null);
INSERT INTO `articles` VALUES ('21', 'Depo Gemilang Supermarket', '2012-06-23 00:00:00', null, 'Andri', 'clients', '<div align=\"center\">\r\n<p><img src=\"clients/images/depo2.gif\" alt=\"\" width=\"213\" height=\"144\" /></p>\r\n<p>Jl. Mayjen. Sutoyo S No.94/202, Banjarmasin. Kalimantan. Indonesia</p>\r\n<p><strong>Moto</strong></p>\r\n<p>\"Lebih Lengkap. Lebih Luas. Lebih Hemat.\"</p>\r\n<p><strong>Visi</strong></p>\r\n<p>Menjadi Supermarket bahan bangunan terkemuka yang dikenal masyarakat luas serta mampu bersaing secara global</p>\r\n<p><strong>Webiste</strong></p>\r\n<p><a href=\"http://putragemilangprima.com/\">http://putragemilangprima.com/</a></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</div>', '0', 'clients/images/konex2.gif');
INSERT INTO `articles` VALUES ('52', 'Membuat Saldo Awal Hutang', '2013-04-26 00:00:00', null, 'Andri', 'triks', '<p>Untuk perusahaan yang sudah berjalan tentu sudah mempunyai saldo awal hutang supplier, anda tidak usah memasukkan semua transaksi faktur-faktur pembelian untuk menciptakan saldo awal hutangnya.</p>\r\n<p>Cara termudah adalah dengan memangkas input faktur-faktur yang lama adalah dengan mencatat saldo akhir hutang masing-masing supplier, dari daftar hutang supplier tersebut silahkan diinput lewat program SIMAK, ikutilah cara-cara dibawah ini:</p>\r\n<ul>\r\n<li>Buatlah master barang dengan kode SALDO kemudian isi deskripsinya SALDO kemudian simpan (Menu-&gt;Inventory-&gt;Barang dan Jasa-&gt;Tambah</li>\r\n<li>Langkah selanjutnya bukan (Menu-&gt;Pembelian-&gt;Faktur Pembelian Kredit-&gt;Tambah)</li>\r\n<li>Isi tanggal saldo awal (misal: 1-Jan-2012) karena kita memulai sistim pada tanggal tersebut</li>\r\n<li>Pilih supplier dari pilihan master supplier yang telah kita buat sebelumnya</li>\r\n<li>Pilih termin (misal:30 Hari)</li>\r\n<li>Selanjutnya pada bagian item detailnya pilih nama barang SALDO</li>\r\n<li>Isi Qty=1 dan Harga diisi sejumlah saldo awal hutang supplier yang bersangkutan</li>\r\n<li>Isi keterangan saldo awal</li>\r\n<li>Terakhir tekan tombol Simpan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>* Untuk melihat saldo hutang buka menu-&gt;laporan-&gt;pembelian-&gt;supplier-&gt;daftar sisa faktur</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '0', '');
INSERT INTO `articles` VALUES ('22', 'aaaa', '2012-06-06 00:00:00', null, 'aaa', 'clients', 'lkdjfalsfdjkfas', '0', 'clients/images/23.jpg');
INSERT INTO `articles` VALUES ('23', 'Multi Home Supermarket Bangunan', '2012-08-29 00:00:00', null, 'andri', 'clients', '<h1>HOME MULTI - SUPERMARKET BANGUNAN</h1>\r\n<p>===========================</p>\r\n<p>Jl. Siliwangi - Depok</p>\r\n\r\n<p>Home Multi mempercayakan MyPOS software untuk transaksi kasir yang dapat di pakai secara cepat dan otomatis, juga pencatatan surat jalan, sales order.</p>\r\n\r\n<p>Menggunakan SIMAK Accounting sebagai sarana untuk mencatat purchase order kepada supplier dan partial receive untuk stock management.</p>\r\n\r\nimg src=\"clients/images/multihome.jpg\"/>', '0', '');
INSERT INTO `articles` VALUES ('24', 'Matahari Jaya Supermarket', '2012-11-02 00:00:00', null, 'andri', 'news', '<img src=\"clients/images/matjaya.jpg\"/>\r\nGrandopening Matahari Jaya Supermarket Bangunan - Jogjakarta', '0', 'matjaya_icon.jpg');
INSERT INTO `articles` VALUES ('25', 'Multi Home Supermarket Bangunan', '2012-08-29 00:00:00', null, 'andri', 'clients', 'Grandopening Matahari Jaya Supermarket Bangunan - Jogjakarta', '0', '');
INSERT INTO `articles` VALUES ('26', 'test', '2012-11-02 00:00:00', null, 'test', 'says', 'test1', '0', '');
INSERT INTO `articles` VALUES ('27', 'test2', '2012-11-02 00:00:00', null, 'test', 'says', 'test 2', '0', '');
INSERT INTO `articles` VALUES ('28', 'Patch SIMAK Accounting 1', '2013-04-23 00:00:00', null, 'Andri', 'soft_patch', 'Patch kali ini d adlkjfads fkldsjaflsdakf jdsklajfdsaf\r\ndlfkjasdlfkj lkdfjadskf\r\nkldfajsdl fksjjkdfalskfjsadf\r\nldkfajsdflsadfkj \r\nkdlfajdsfl sajflksjflkasfdj as\r\nldkfjasdklfj aslfdk\r\ndklfajsdlfkj \r\nkldjfasdf\r\nkldjfas d\r\ndfassd\r\n', '0', 'ddddd');
INSERT INTO `articles` VALUES ('29', 'Patch SIMAK Accounting 2', '2013-04-23 00:00:00', null, 'Andri', 'soft_patch', 'Patch kali ini d adlkjfads fkldsjaflsdakf jdsklajfdsaf\r\ndlfkjasdlfkj lkdfjadskf\r\nkldfajsdl fksjjkdfalskfjsadf\r\nldkfajsdflsadfkj \r\nkdlfajdsfl sajflksjflkasfdj as\r\nldkfjasdklfj aslfdk\r\ndklfajsdlfkj \r\nkldjfasdf\r\nkldjfas d\r\ndfassd\r\n', '0', 'ddddd');
INSERT INTO `articles` VALUES ('30', 'Patch SIMAK Accounting 3', '2013-04-23 00:00:00', null, 'Andri', 'soft_patch', 'Patch kali ini d adlkjfads fkldsjaflsdakf jdsklajfdsaf\r\ndlfkjasdlfkj lkdfjadskf\r\nkldfajsdl fksjjkdfalskfjsadf\r\nldkfajsdflsadfkj \r\nkdlfajdsfl sajflksjflkasfdj as\r\nldkfjasdklfj aslfdk\r\ndklfajsdlfkj \r\nkldjfasdf\r\nkldjfas d\r\ndfassd\r\n', '0', 'ddddd');
INSERT INTO `articles` VALUES ('31', 'Patch SIMAK Accounting 4', '2013-04-23 00:00:00', null, 'Andri', 'soft_patch', 'Patch kali ini d adlkjfads fkldsjaflsdakf jdsklajfdsaf\r\ndlfkjasdlfkj lkdfjadskf\r\nkldfajsdl fksjjkdfalskfjsadf\r\nldkfajsdflsadfkj \r\nkdlfajdsfl sajflksjflkasfdj as\r\nldkfjasdklfj aslfdk\r\ndklfajsdlfkj \r\nkldjfasdf\r\nkldjfas d\r\ndfassd\r\n', '0', 'ddddd');
INSERT INTO `articles` VALUES ('32', 'Patch SIMAK Accounting 4 bjld kd fkalsdj dflkajdsf sdlkafjslad fkjsdlakfj dskafjdsklafjdslak fjdslafkj', '2013-04-23 00:00:00', null, 'Andri', 'soft_patch', 'Patch kali ini d adlkjfads fkldsjaflsdakf jdsklajfdsaf\r\ndlfkjasdlfkj lkdfjadskf\r\nkldfajsdl fksjjkdfalskfjsadf\r\nldkfajsdflsadfkj \r\nkdlfajdsfl sajflksjflkasfdj as\r\nldkfjasdklfj aslfdk\r\ndklfajsdlfkj \r\nkldjfasdf\r\nkldjfas d\r\ndfassd\r\n', '0', 'ddddd');
INSERT INTO `articles` VALUES ('33', 'Patch SIMAK Accounting 5 bjld kd fkalsdj dflkajdsf sdlkafjslad fkjsdlakfj dskafjdsklafjdslak fjdslafkj', '2013-04-23 00:00:00', null, 'Andri', 'soft_patch', 'Patch kali ini d adlkjfads fkldsjaflsdakf jdsklajfdsaf\r\ndlfkjasdlfkj lkdfjadskf\r\nkldfajsdl fksjjkdfalskfjsadf\r\nldkfajsdflsadfkj \r\nkdlfajdsfl sajflksjflkasfdj as\r\nldkfjasdklfj aslfdk\r\ndklfajsdlfkj \r\nkldjfasdf\r\nkldjfas d\r\ndfassd\r\n', '0', 'ddddd');
INSERT INTO `articles` VALUES ('34', 'Patch SIMAK Accounting 6', '2013-04-23 00:00:00', null, 'Andri', 'soft_patch', 'Patch kali ini d adlkjfads fkldsjaflsdakf jdsklajfdsaf\r\ndlfkjasdlfkj lkdfjadskf\r\nkldfajsdl fksjjkdfalskfjsadf\r\nldkfajsdflsadfkj \r\nkdlfajdsfl sajflksjflkasfdj as\r\nldkfjasdklfj aslfdk\r\ndklfajsdlfkj \r\nkldjfasdf\r\nkldjfas d\r\ndfassd\r\n', '0', 'ddddd');
INSERT INTO `articles` VALUES ('35', 'Patch SIMAK Accounting 7', '2013-04-23 00:00:00', null, 'Andri', 'soft_patch', 'Patch kali ini d adlkjfads fkldsjaflsdakf jdsklajfdsaf\r\ndlfkjasdlfkj lkdfjadskf\r\nkldfajsdl fksjjkdfalskfjsadf\r\nldkfajsdflsadfkj \r\nkdlfajdsfl sajflksjflkasfdj as\r\nldkfjasdklfj aslfdk\r\ndklfajsdlfkj \r\nkldjfasdf\r\nkldjfas d\r\ndfassd\r\n', '0', 'ddddd');
INSERT INTO `articles` VALUES ('36', 'Patch SIMAK Accounting 8', '2013-04-23 00:00:00', null, 'Andri', 'soft_patch', 'Patch kali ini d adlkjfads fkldsjaflsdakf jdsklajfdsaf\r\ndlfkjasdlfkj lkdfjadskf\r\nkldfajsdl fksjjkdfalskfjsadf\r\nldkfajsdflsadfkj \r\nkdlfajdsfl sajflksjflkasfdj as\r\nldkfjasdklfj aslfdk\r\ndklfajsdlfkj \r\nkldjfasdf\r\nkldjfas d\r\ndfassd\r\n', '0', 'ddddd');
INSERT INTO `articles` VALUES ('37', 'Promo 1', '2013-04-23 00:00:00', null, 'Andri', 'promo', 'Patch kali ini d adlkjfads fkldsjaflsdakf jdsklajfdsaf\r\ndlfkjasdlfkj lkdfjadskf\r\nkldfajsdl fksjjkdfalskfjsadf\r\nldkfajsdflsadfkj \r\nkdlfajdsfl sajflksjflkasfdj as\r\nldkfjasdklfj aslfdk\r\ndklfajsdlfkj \r\nkldjfasdf\r\nkldjfas d\r\ndfassd\r\n', '0', 'ddddd');
INSERT INTO `articles` VALUES ('38', 'Triks 1', '2013-04-23 00:00:00', null, 'Andri', 'triks', 'Patch kali ini d adlkjfads fkldsjaflsdakf jdsklajfdsaf\r\ndlfkjasdlfkj lkdfjadskf\r\nkldfajsdl fksjjkdfalskfjsadf\r\nldkfajsdflsadfkj \r\nkdlfajdsfl sajflksjflkasfdj as\r\nldkfjasdklfj aslfdk\r\ndklfajsdlfkj \r\nkldjfasdf\r\nkldjfas d\r\ndfassd\r\n', '0', 'ddddd');
INSERT INTO `articles` VALUES ('39', 'guestbook', null, null, 'guest', 'says', 'dasdfasd', null, 'x');
INSERT INTO `articles` VALUES ('40', 'guestbook', null, null, 'guest', 'says', 'tesatestetastest', null, 'x');
INSERT INTO `articles` VALUES ('41', 'guestbook', null, null, 'guest', 'says', 'testestsatest', null, 'x');
INSERT INTO `articles` VALUES ('42', 'guestbook', '2013-04-25 12:31:29', null, 'guest', 'says', 'etst', null, 'x');
INSERT INTO `articles` VALUES ('43', 'guestbook', '2013-04-25 12:33:18', null, 'guest', 'says', ' testtestet test', null, 'x');
INSERT INTO `articles` VALUES ('44', 'guestbook', '2013-04-25 12:33:36', null, 'guest', 'says', ' halooohaloo2', null, 'x');
INSERT INTO `articles` VALUES ('45', 'guestbook', '2013-04-25 12:39:14', null, 'andri', 'says', 'halo 2', null, 'x');
INSERT INTO `articles` VALUES ('46', 'guestbook', '2013-04-25 12:39:50', null, 'ucok', 'says', 'kamana aja???', null, 'x');
INSERT INTO `articles` VALUES ('47', 'guestbook', '2013-04-25 12:42:17', null, 'aaaa', 'says', 'bbbb', null, 'x');
INSERT INTO `articles` VALUES ('48', 'guestbook', '2013-04-25 12:42:26', null, 'aaa', 'says', 'aa,bb', null, 'x');
INSERT INTO `articles` VALUES ('49', 'guestbook', '2013-04-25 12:42:32', null, 'aaa', 'says', 'bb\'bb', null, 'x');
INSERT INTO `articles` VALUES ('50', 'guestbook', '2013-04-25 12:42:49', null, 'aaaa', 'says', 'aaa\' where', null, 'x');
INSERT INTO `articles` VALUES ('51', 'test tinimce', '2013-04-23 00:00:00', null, 'Andri', 'triks', '<h1><strong>Halo apa kabar</strong></h1>\r\n<p>&nbsp;</p>\r\n<p>penjelasanan dkfsalfjd slafjkds fjkadsf</p>\r\n<p><em>dfkasjdfl jsaflksja</em></p>\r\n<p><em>dfkjlasjdf sajkfadfs</em></p>\r\n<p>&nbsp;</p>\r\n<p>terimakasih andri</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '0', '');
INSERT INTO `articles` VALUES ('56', 'Software Kasir', null, null, null, 'email_promo', 'MyPOS adalah software kasir  digunakan untuk mencatat nota-nota penjualan secara cepat baik penjualan tunai ataupun kartu kredit. Software ini bisa anda gunakan di toko retail, toko buku, toko komputer, toko kelontong, sembako,salon, restaurant dan lain-lain. Software MyPos telah disesuaikan dengan operasional di kasir yang menuntut kecepatan input transaksi, otomatis dan interface yang menarik dan mudah digunakan. Kunjungi http://www.talagasoft.com', null, null);
INSERT INTO `articles` VALUES ('55', 'MyPOS Versi Retail', null, null, null, 'email_promo', 'MyPOS adalah software kasir  digunakan untuk mencatat nota-nota penjualan secara cepat baik penjualan tunai ataupun kartu kredit.  Software ini bisa anda gunakan di toko retail, toko buku, toko komputer, toko kelontong, sembako,salon, restaurant dan lain-lain. Software MyPos telah disesuaikan dengan operasional di kasir yang menuntut kecepatan input transaksi, otomatis dan interface yang menarik dan mudah digunakan. Kunjungi http://www.talagasoft.com', null, null);
INSERT INTO `articles` VALUES ('57', 'Software Untuk Usaha Car Wash', '2013-04-23 01:00:00', null, 'Andri', 'Produk', '<p><img src=\"img/mypos/menu_utama_salon_mobil.gif\" alt=\"MyPOS CarWash\" longdesc=\"MyPOS CarWash\" /></p>\r\n<h1>MyPOS - Car Wash</h1>\r\n<p><span style=\"direction: ltr;\">Software MyPOS Car Wash biasanya dipakai untuk jenis &nbsp;usaha pencucian mobil atau motor dan usaha lain yang sejenis. &nbsp;Dengan bantuan software ini dimudahkan untuk mencatat data-data transaksi penjualan melalui nota penjualan, pencatatan dan history kendaraan yang pernah transaksi sehingga memudahkan bagian marketing untuk menggunakan informasi ini, selain itu dengan bantuan software ini perhitungan komisi untuk yang mengerjakan pencucian atau perawat dapat dihasilkan secara lengkap melalui laporan komisinya.</span></p>\r\n<p><span style=\"direction: ltr;\">Fitur lainnya adalah anda bisa secara langsung mengatur pemakaian bahan-bahan atau material pendukung berupa shampo, obat dan lain-laninya lewat seting paket, sehingga program secara otomatis mengurangi stok pemakaian bahannya.</span></p>\r\n<p><span style=\"direction: ltr;\"> &nbsp;</span></p>\r\n<h2><span style=\"direction: ltr;\">Fitur-fitur Umum</span></h2>\r\n<p>&nbsp;</p>\r\n<p>- Cocok untuk jasa salon mobil, pencucian, bengkel dan lain sebagainya</p>\r\n<p>- Skin tampilan menarik dan dapat diubah-ubah sesuai selera.</p>\r\n<p>- Cara pembayaran disediakan 10 macam (Cash, Credit Card, Voucher, OnAccount, Discount,Pembulatan, Debit Card dll)</p>\r\n<p>- Pembayaran dapat dilakukan penggabungan (split payments antara cash atau kartu kredit dan lainnya).</p>\r\n<p>- Support printer kasir (Epson TM,Customer Display, Barcode Scanner, Cash Drawer)</p>\r\n<p>- Hapus item yang telah di order menggunakan password supervisor.</p>\r\n<p>- Ada setting agar Kasir tidak dapat mengubah harga atau discount ketika jualan.</p>\r\n<p>- Laporan-laporan tertentu ada password supervisor atau tidak ditampilkan di menu kasir.</p>\r\n<p>- Seting perangkat flexible, cash drawer, slip printer, customer display, barcode scannder, dll.</p>\r\n<p>- Penomoran untuk nomor bukti fleksible, nomor urut bisa di depan, tengah, di ujung ataupun menggunakan bulan romawi sesuai keinginan user</p>\r\n<p>- Pengelolaan harga jual dan price manager yang dapat mengubah harga secara masalah.</p>\r\n<p>- Program promosi yang flexible dan disediakan 4 macam program promosi. yaitu discount percent, nominal, buy 2 get one, one price, quantity price, dll.</p>\r\n<p>- Ada seting user level yang mengijinkan kasir atau user mengakses menu tertentu.</p>\r\n<p>- Rangkuman penjualan harian kasir atau seluruh kasir.</p>\r\n<p>- Laporan penjualan berdasarkan item barang, service perawatan, kelompok, history service pelanggan atau per kasir.</p>\r\n<p>- Laporan berdasarkan jenis pembayaran tunai, kartu kredit, voucher</p>\r\n<p>- Ada warning apabila input harga jual dibawah harga beli.</p>\r\n<p>- Prose pengeluaran dan pemasukan barang secara langsung ke toko</p>\r\n<p>- Proses backup data secara otomatis harian atau ditentukan oleh user</p>\r\n<p>- Mencetak ulang nota terakhir, misal karena kertas struk di printer habis.</p>\r\n<p>- Kartu stock yang detail diperlukan untuk audit transaksi yang mempengaruhi quantity barang.</p>\r\n<p>- Skin dan tampilan tidak monoton dan dapat diubah oleh user.</p>\r\n<p>- Penyusunan dan formula untuk jasa service yang dapat secara otomatis memotong quantity bahan atau barang tersebut</p>\r\n<p>- Penerimaan dan pengeluan bahan atau barang</p>\r\n<p>- Catatan history data kendaraan dan nomor polisi kendaraan</p>\r\n<p><img src=\"img/download.png\" alt=\"\" /><strong><a href=\"download.php?f=mypos_carwash_down.php\">Download</a></strong></p>\r\n<p>&nbsp;</p>\r\n<h2><strong>Harga Promo Rp. 1,000,000,- (sampai 30-Mei-2014)</strong></h2>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '0', '');
INSERT INTO `articles` VALUES ('58', 'Video Tutorial SIMAK Accounting Software', '2013-05-12 00:00:00', null, 'Andri', 'soft_patch', '<h1>Video Tutorial SIMAK Accounting Software</h1>\r\n<p>Berikut ini adalah daftar tutorial pada penggunaan software SIMAK Accounting, yang terdiri dari modul-module penjualan, pembelian, hutang, piutang, stock, buku kas dan akuntansi.</p>\r\n<div class=\"info3\">\r\n<h2>Alur Kerja Untuk Penjualan</h2>\r\n<img src=\"img/pic_1_2.jpg\" alt=\"\" />Tutorial ini akan menunjukkan anda untuk berlatih alur kerja penjualan yang dimulai dari pembuatan so, kemudian pembuatan surat jalan sampai pada akhirnya adalah membuatkan jurnal secara otomatis kedalam modul General Ledger. <br />Alur kerja penjualan ini terbagi menjadi : <br />- Pembuatan Sales Order<a style=\"direction: ltr;\" href=\"http://youtu.be/jTo7YCjHZpI\" target=\"_blank\"> Lihat Video</a>&nbsp; <br />- Modifkasi Format Sales Order dan Export ke XLS<a style=\"direction: ltr;\" href=\"http://youtu.be/wJs5FJSDWyE\" target=\"_blank\"> Lihat Video</a> <br />- Pembayaran DP So dan pembuatan Surat Jalan dan Kartu Stock<a style=\"direction: ltr;\" href=\"http://youtu.be/DCyfSsGtfCU\" target=\"_blank\"> Lihat Video</a>&nbsp;<br />- Pembuatan Faktur atas SO dan Saldo Piutang Faktur<a style=\"direction: ltr;\" href=\"http://youtu.be/0I1Mkla_cBM\" target=\"_blank\"> Lihat Video</a> <br />- Penerimaan Pelunasan atas Piutang Faktur Pelanggan<a style=\"direction: ltr;\" href=\"http://youtu.be/ByGMfba_1RE\" target=\"_blank\"> Lihat Video</a>&nbsp;</div>\r\n<div class=\"info3\">\r\n<h2>Alur Kerja Untuk Pembelian</h2>\r\n<img src=\"img/pic_1_2.jpg\" alt=\"\" />Tutorial ini akan menunjukkan anda untuk berlatih alur kerja pembelian yang dimulai dari pembuatan purchase order, penerimaan barang, pembuatan faktur, pelunasan hutang sampai membuatkan jurnal secara otomatis kedalam modul General Ledger.&nbsp;<br />Alur kerja pembelian ini terbagi menjadi :&nbsp;<br />- Penjelasan Singkat<a style=\"direction: ltr;\" href=\"http://youtu.be/VCxHlXy9Rxk\" target=\"_blank\"> Lihat Video</a>&nbsp;&nbsp;<br />- Pembuatan Master Supplier, Barang, Kategory<a style=\"direction: ltr;\" href=\"http://youtu.be/0SLP8HgFVTY\" target=\"_blank\"> Lihat Video</a>&nbsp;<br />- Termin Pembayaran<a style=\"direction: ltr;\" href=\"http://youtu.be/U0IHTc5VCfY\" target=\"_blank\"> Lihat Video</a><br />- Pembuatan Rekening Bank atau Kas<a style=\"direction: ltr;\" href=\"http://youtu.be/T48Z4rUp5XU\" target=\"_blank\"> Lihat Video</a><br />- Pembuatan Purchase Order dan Design<a style=\"direction: ltr;\" href=\"http://youtu.be/Olzt-sMqwt0\" target=\"_blank\"> Lihat Video</a><br />- Penerimaan Barang dan Kartu Stock<a style=\"direction: ltr;\" href=\"http://youtu.be/SgeG-InFimk\" target=\"_blank\"> Lihat Video</a><br />- Pembuatan Faktur Hutang<a style=\"direction: ltr;\" href=\"http://youtu.be/OdltZV4gWdg\" target=\"_blank\"> Lihat Video</a><br />- Pelunasan Hutang dan Bukti Kas Keluar<a style=\"direction: ltr;\" href=\"http://youtu.be/SoJOar6wzqo\" target=\"_blank\"> Lihat Video</a><br />- Retur Barang dan Debit Memo<a style=\"direction: ltr;\" href=\"http://youtu.be/MqjVaxEexfE\" target=\"_blank\"> Lihat Video</a></div>\r\n<div class=\"info3\">\r\n<h2>Membuat data perusahaan baru</h2>\r\n<img src=\"img/pic_1_2.jpg\" alt=\"\" />Tutorial untuk membuat data perusahaan baru sehingga anda bisa memisah-memisah data untuk masing-masing&nbsp;perusahaan (multi company)\r\n<p align=\"justify\"><a style=\"direction: ltr;\" href=\"http://youtu.be/ojaSP50RADQ\" target=\"_blank\">Lihat Video</a></p>\r\n</div>\r\n<div class=\"info3\">\r\n<h2>Seting Nama Perusahaan</h2>\r\n<img src=\"img/pic_1_2.jpg\" alt=\"\" />Setting untuk nama perusahaan anda sehingga tampil di semua cetakan sebagai header laporan, seting ini meliputi nama, alamat, nomor telp dan lainnya.\r\n<p align=\"justify\"><a style=\"direction: ltr;\" href=\"http://youtu.be/W0WDMRgoi-g\" target=\"_blank\">Lihat Video</a></p>\r\n</div>\r\n<div class=\"info3\">\r\n<h2>Membat Kode Perkiraan / Kode Akun</h2>\r\n<img src=\"img/pic_1_2.jpg\" alt=\"\" />Kode perkiraan adalah seting yang harus pertama kali mendapatkan perhatian sebagai pengguna software SIMAK karena seting ini terintegrasi dengan modul-modul yang lainnya.\r\n<p align=\"justify\"><a style=\"direction: ltr;\" href=\"http://youtu.be/XlgIhA8EZ9g\" target=\"_blank\">Lihat Video</a></p>\r\n</div>\r\n<div class=\"info3\">\r\n<h2>Seting GL Link</h2>\r\n<img src=\"img/pic_1_2.jpg\" alt=\"\" />Seting GL Link adalah akun-akunt penting bagi sistim integerasi SIMAK yang bersangkutan kepada modul-modul pembelian, penjualan, inventory, buku kas.&nbsp;&nbsp; &nbsp;Sehingga semua transaksi tersebut bisa &nbsp;dilakukan posting secara otomatis guna menghasilkan jurnal-jurnal untuk keperluan laporan neraca dan rugi laba.\r\n<p align=\"justify\"><a style=\"direction: ltr;\" href=\"http://youtu.be/C77IwWXgev0\" target=\"_blank\">Lihat Video</a></p>\r\n</div>', '0', '');
INSERT INTO `articles` VALUES ('59', 'guestbook', '2013-08-16 12:26:39', null, '', 'says', '', null, 'x');
INSERT INTO `articles` VALUES ('60', 'guestbook', '2013-08-16 12:39:19', null, 'aa', 'says', 'bbb', null, 'x');
INSERT INTO `articles` VALUES ('61', 'guestbook', '2013-08-16 12:40:16', null, 'test', 'says', 'test', null, 'x');
INSERT INTO `articles` VALUES ('62', 'guestbook', '2013-08-16 12:40:22', null, 'etestest', 'says', 'testest', null, 'x');
INSERT INTO `articles` VALUES ('63', 'Company 2', '2012-11-02 00:00:00', null, 'andri', 'news', '<img src=\"clients/images/matjaya.jpg\"/>', '0', 'matjaya_icon.jpg');

-- ----------------------------
-- Table structure for `bank_accounts`
-- ----------------------------
DROP TABLE IF EXISTS `bank_accounts`;
CREATE TABLE `bank_accounts` (
  `bank_account_number` varchar(50) character set utf8 NOT NULL default '',
  `type_bank` varchar(50) character set utf8 default NULL,
  `bank_name` varchar(50) character set utf8 default NULL,
  `aba_number` varchar(50) character set utf8 default NULL,
  `routing_code` varchar(15) character set utf8 default NULL,
  `street` varchar(50) character set utf8 default NULL,
  `suite` varchar(50) character set utf8 default NULL,
  `city` varchar(50) character set utf8 default NULL,
  `state_province` varchar(50) character set utf8 default NULL,
  `zip_postal_code` varchar(50) character set utf8 default NULL,
  `country` varchar(50) character set utf8 default NULL,
  `contact_name` varchar(50) character set utf8 default NULL,
  `phone_number` varchar(50) character set utf8 default NULL,
  `fax_number` varchar(50) character set utf8 default NULL,
  `starting_check_number` varchar(50) character set utf8 default NULL,
  `last_bank_statement_date` datetime default NULL,
  `last_bank_statement_balance` double default NULL,
  `account_id` int(50) default NULL,
  `micr_line` varchar(40) character set utf8 default NULL,
  `no_bukti_in` varchar(50) character set utf8 default NULL,
  `no_bukti_out` varchar(50) character set utf8 default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`bank_account_number`),
  KEY `x1` (`bank_account_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bank_accounts
-- ----------------------------
INSERT INTO `bank_accounts` VALUES ('BCA', 'D', 'BCA', '', '', 'JL. RAYA PURWAKARTA NO. 38 a', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0', '0', '', 'A', 'B', '', '');
INSERT INTO `bank_accounts` VALUES ('BNI', 'Bank', 'BNI', '', '', 'JL. RAYA PURWAKARTA NO. 38', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0', '1374', '', 'A', 'B', '', '');
INSERT INTO `bank_accounts` VALUES ('BRi', 'Bank', 'BRI', '', '', 'JL. RAYA PURWAKARTA NO. 38', '', '', '', '', '', '', '', '', '', '2013-08-12 00:00:00', '0', '0', '', '', '', '', '');
INSERT INTO `bank_accounts` VALUES ('LIPPO-9890', 'Simpanan', 'LIPO BANK', '', '', '', '', '', '', '', '', '', '', '', '', '2013-08-14 00:00:00', '0', '0', '', '', '', '', '');
INSERT INTO `bank_accounts` VALUES ('cde', 'aaaaa', 'de', '', '', 'aaaaaa', '', '', '', '', '', '', '', '', '', '2013-08-14 00:00:00', '0', '0', '', '', '', '', '');

-- ----------------------------
-- Table structure for `bill_detail`
-- ----------------------------
DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL auto_increment,
  `bill_id` varchar(50) character set utf8 default NULL,
  `no` varchar(50) character set utf8 default NULL,
  `tanggal` datetime default NULL,
  `invoice_number` varchar(50) character set utf8 default NULL,
  `keterangan` varchar(100) character set utf8 default NULL,
  `amount` double default NULL,
  `tgl_jatuh_tempo` datetime default NULL,
  `curr_code` varchar(50) character set utf8 default NULL,
  `curr_rate` double default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bill_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `bill_header`
-- ----------------------------
DROP TABLE IF EXISTS `bill_header`;
CREATE TABLE `bill_header` (
  `bill_id` varchar(50) character set utf8 NOT NULL default '',
  `customer_number` varchar(50) character set utf8 default NULL,
  `bill_date` datetime default NULL,
  `amount` double default NULL,
  `date_to` datetime default NULL,
  `comments` varchar(255) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`bill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bill_header
-- ----------------------------

-- ----------------------------
-- Table structure for `budget`
-- ----------------------------
DROP TABLE IF EXISTS `budget`;
CREATE TABLE `budget` (
  `account_id` int(11) default NULL,
  `budget_year` int(11) default NULL,
  `january` double default NULL,
  `february` double default NULL,
  `march` double default NULL,
  `april` double default NULL,
  `may` double default NULL,
  `june` double default NULL,
  `july` double default NULL,
  `august` double default NULL,
  `september` double default NULL,
  `october` double default NULL,
  `november` double default NULL,
  `december` double default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  KEY `x1` (`account_id`,`budget_year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of budget
-- ----------------------------

-- ----------------------------
-- Table structure for `cargo_type`
-- ----------------------------
DROP TABLE IF EXISTS `cargo_type`;
CREATE TABLE `cargo_type` (
  `cargo_type` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`cargo_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cargo_type
-- ----------------------------
INSERT INTO `cargo_type` VALUES ('cargo 1');
INSERT INTO `cargo_type` VALUES ('cargo 2');

-- ----------------------------
-- Table structure for `chart_account_link`
-- ----------------------------
DROP TABLE IF EXISTS `chart_account_link`;
CREATE TABLE `chart_account_link` (
  `company_code` varchar(50) character set utf8 NOT NULL default '',
  `hutang` int(11) default NULL,
  `penerimaan` int(11) default NULL,
  `piutang` int(11) default NULL,
  `pembayaran` int(11) default NULL,
  `laba_periode` int(11) default NULL,
  `laba_ditahan` int(11) default NULL,
  `historical_balancing` int(11) default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`company_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of chart_account_link
-- ----------------------------

-- ----------------------------
-- Table structure for `chart_of_account_types`
-- ----------------------------
DROP TABLE IF EXISTS `chart_of_account_types`;
CREATE TABLE `chart_of_account_types` (
  `account_type_num` double NOT NULL default '0',
  `account_type` varchar(30) character set utf8 default NULL,
  `income_statement_num` int(11) default NULL,
  `sub_acc_income` int(11) default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`account_type_num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of chart_of_account_types
-- ----------------------------
INSERT INTO `chart_of_account_types` VALUES ('1', 'Aktiva', null, null, null, null, null);
INSERT INTO `chart_of_account_types` VALUES ('2', 'Hutang', null, null, null, null, null);
INSERT INTO `chart_of_account_types` VALUES ('3', 'Modal', null, null, null, null, null);
INSERT INTO `chart_of_account_types` VALUES ('4', 'Pendapatan', null, null, null, null, null);
INSERT INTO `chart_of_account_types` VALUES ('5', 'Harga Pokok', null, null, null, null, null);
INSERT INTO `chart_of_account_types` VALUES ('6', 'Biaya', null, null, null, null, null);
INSERT INTO `chart_of_account_types` VALUES ('7', 'Pendapatan Lain', null, null, null, null, null);
INSERT INTO `chart_of_account_types` VALUES ('8', 'Baya Lain', null, null, null, null, null);

-- ----------------------------
-- Table structure for `chart_of_accounts`
-- ----------------------------
DROP TABLE IF EXISTS `chart_of_accounts`;
CREATE TABLE `chart_of_accounts` (
  `id` int(11) NOT NULL auto_increment,
  `company_code` varchar(15) character set utf8 default NULL,
  `account_type` double default NULL,
  `group_type` varchar(10) character set utf8 default NULL,
  `group_sequence` double default NULL,
  `account` varchar(20) character set utf8 default NULL,
  `account_description` varchar(50) character set utf8 default NULL,
  `sub_account` varchar(8) character set utf8 default NULL,
  `sub_account_description` varchar(50) character set utf8 default NULL,
  `beginning_balance` double default NULL,
  `notes` double default NULL,
  `db_or_cr` int(11) default NULL,
  `flag_archive` bit(1) default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`id`),
  KEY `x1` (`account`),
  KEY `x2` (`account_description`)
) ENGINE=MyISAM AUTO_INCREMENT=1498 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of chart_of_accounts
-- ----------------------------
INSERT INTO `chart_of_accounts` VALUES ('1370', 'MYPOS', '1', '10000', '0', '11001', 'Cash', '', '', '0', '0', '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1373', 'MYPOS', '1', '10000', '0', '13200', 'Piutang Dagang', '', '', '0', null, '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1374', 'MYPOS', '1', '11', '0', '13700', 'Persediaan', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1375', 'MYPOS', '1', '11', '5', '13800', 'Biaya dibayar dimuka', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1376', 'MYPOS', '1', '12', '0', '15100', 'Tanah', '', '', '0', '0', '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1377', 'MYPOS', '1', '12', '0', '15150', 'Gedung', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1378', 'MYPOS', '1', '12', '0', '15151', 'Akumulasi Depr. Gedung', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1379', 'MYPOS', '1', '12', '0', '15200', 'Peralatan', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1380', 'MYPOS', '1', '12', '0', '15201', 'Akumulasi Depr. Peralatan', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1381', 'MYPOS', '1', '12', '0', '15230', 'Komputer', '', '', '0', '0', '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1382', 'MYPOS', '1', '12', '0', '15231', 'Akumulasi Depr. Komputer', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1383', 'MYPOS', '1', '12', '8', '15480', 'Furnitur dan Mebel', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1384', 'MYPOS', '1', '12', '0', '15481', 'Akumulasi Depr.Meubel', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1385', 'MYPOS', '1', '12', '0', '16610', 'Kendaraan dan Truk', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1386', 'MYPOS', '1', '12', '0', '16611', 'Akumulasi Depr. Kendaraan', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1393', 'MYPOS', '2', '20000', '0', '21000', 'Hutang Dagang', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1394', 'MYPOS', '2', '21', '2', '21200', 'Hutang (Cicilan)', '', '', '0', null, '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1396', 'MYPOS', '2', '21', '4', '21700', 'PPN', '', '', '0', null, '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1408', 'MYPOS', '3', '33', '0', '30200', 'Laba (Rugi) ditahan', '', '', '0', null, '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1410', 'MYPOS', '3', '33', '0', '30400', 'Modal', '', '', '0', null, '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1411', 'MYPOS', '3', '33', '0', '30500', 'Prive', '', '', '0', null, '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1415', 'MYPOS', '4', '41', '0', '40005', 'Penjualan', '', '', '0', null, '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1416', 'MYPOS', '4', '41', '0', '44000', 'Potongan Penjualan', '', '', '0', null, '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1417', 'MYPOS', '4', '41', '0', '45000', 'Ongkos Angkut', '', '', '0', null, '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1419', 'MYPOS', '5', '51', '0', '50001', 'Harga Pokok Penjualan', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1420', 'MYPOS', '5', '51', '3', '50002', 'Ongkos Angkut Pembelian', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1421', 'MYPOS', '5', '51', '4', '50003', 'Potongan Pembelian', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1423', 'MYPOS', '6', '61', '1', '60100', 'Biaya Administrasi', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1424', 'MYPOS', '6', '61', '0', '60110', 'Biaya Iklan', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1427', 'MYPOS', '6', '61', '0', '60350', 'Biaya Bank', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1429', 'MYPOS', '6', '61', '7', '60500', 'Biaya Komisi', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1430', 'MYPOS', '6', '61', '0', '60600', 'Biaya Konsultasi', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1433', 'MYPOS', '6', '61', '11', '60700', 'Biaya Kirim', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1434', 'MYPOS', '6', '61', '0', '60720', 'Biaya Penyusutan', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1437', 'MYPOS', '6', '61', '15', '62160', 'Biaya Marketing', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1438', 'MYPOS', '6', '61', '16', '62190', 'Biaya Sewa Perlengkapan', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1447', 'MYPOS', '6', '61', '25', '64900', 'Biaya Maintenance dan Perbaikan', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1448', 'MYPOS', '6', '61', '0', '64950', 'Biaya Peralatan Kantor', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1449', 'MYPOS', '6', '61', '0', '65250', 'Biaya Gaji', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1450', 'MYPOS', '6', '61', '0', '65400', 'Biaya Promosi', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1452', 'MYPOS', '6', '61', '0', '65600', 'Biaya Sewa', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1453', 'MYPOS', '6', '61', '31', '66000', 'Biaya Gaji Bag. Administrasi', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1454', 'MYPOS', '6', '61', '32', '66100', 'Biaya Gaji Bag. Sales', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1455', 'MYPOS', '6', '61', '0', '66200', 'Biaya Keamanan', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1456', 'MYPOS', '6', '61', '34', '66300', 'Biaya Software', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1457', 'MYPOS', '6', '61', '35', '66350', 'Biaya Perlengkapan Kantor', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1458', 'MYPOS', '7', '71', '0', '66351', 'Biaya Pajak', '', '', '0', null, '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1464', 'MYPOS', '6', '61', '0', '66352', 'Biaya Telphone', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1465', 'MYPOS', '6', '61', '43', '66353', 'Biaya Perjalanan Dinas', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1473', 'MYPOS', '1', '10000', '0', '11006', 'BCA Cab. Jakarta', '', '', '0', '0', '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1477', 'MYPOS', '1', '11', '0', '14000', 'Uang muka penjualan', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1481', 'MYPOS', '5', '51', '0', '51002', 'Harga Pokok Penjualan Konsinyasi', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1482', 'MYPOS', '4', '41', '0', '46000', 'Lain-lain', '', '', '0', null, '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1483', 'MYPOS', '3', '33', '0', '30100', 'Laba (Rugi) berjalan', '', '', '0', null, '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1484', 'MYPOS', '8', '81', '0', '81001', 'PPH', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1485', 'MYPOS', '1', '10000', '0', '11002', 'BCA Cab. Bandung', '', '', '0', '0', '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1489', 'MYPOS', '6', '61', '0', '66354', 'Biaya Kirim Barang', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1490', 'MYPOS', '1', '10000', '0', '11003', 'Bank Mandiri', '', '', '0', null, '1', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1491', 'MYPOS', '1', '11', '0', '19001', 'Ayat Silang', '', '', '0', null, '0', '', '3', null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1492', null, '1', '10000', null, '11004', 'Bank LIPO', null, null, '1000000', null, '1', null, null, null, null, null, null, null, null);
INSERT INTO `chart_of_accounts` VALUES ('1495', null, '1', '10000', null, '11005', 'Bank BRI', null, null, '100000', null, '1', null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `check_writer`
-- ----------------------------
DROP TABLE IF EXISTS `check_writer`;
CREATE TABLE `check_writer` (
  `trans_id` int(11) NOT NULL auto_increment,
  `trans_type` varchar(50) character set utf8 default NULL,
  `account_number` varchar(50) character set utf8 default NULL,
  `check_number` varchar(50) character set utf8 default NULL,
  `check_date` datetime default NULL,
  `payee` varchar(50) character set utf8 default NULL,
  `supplier_number` varchar(50) character set utf8 default NULL,
  `payment_amount` double default NULL,
  `deposit_amount` double default NULL,
  `memo` varchar(150) character set utf8 default NULL,
  `cleared` int(1) default NULL,
  `cleared_date` datetime default NULL,
  `void` int(1) default NULL,
  `print` int(1) default NULL,
  `voucher` varchar(50) character set utf8 default NULL,
  `adjustment_dr_account_id` int(11) default NULL,
  `adjustment_cr_account_id` int(11) default NULL,
  `bill_payment` int(1) default NULL,
  `posting_gl_id` varchar(20) character set utf8 default NULL,
  `posted` int(1) default NULL,
  `printed` datetime default NULL,
  `batch_post` int(1) default NULL,
  `invoice_number` varchar(50) character set utf8 default NULL,
  `paymentlineid` int(11) default NULL,
  `from_bank` varchar(50) character set utf8 default NULL,
  `bank_tran_id` varchar(50) character set utf8 default NULL,
  `curr_code` varchar(50) character set utf8 default NULL,
  `curr_rate` double default NULL,
  `curr_rate_exc` double default NULL,
  `curr_code_org` varchar(50) character set utf8 default NULL,
  `curr_rate_org` double default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `jenisuangmuka` varchar(50) character set utf8 default NULL,
  `sisauangmuka` double default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `update_date` datetime default NULL,
  PRIMARY KEY  (`trans_id`),
  KEY `x1` (`payee`),
  KEY `x2` (`voucher`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of check_writer
-- ----------------------------
INSERT INTO `check_writer` VALUES ('1', 'CASH OUT', 'BCA', '', '2013-01-04 00:00:00', null, 'ALFAMART', '6000', null, '', '0', '2013-01-04 00:00:00', '0', null, 'APP00039', null, null, null, null, null, null, null, null, null, '', '', 'IDR', '1', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `check_writer` VALUES ('19', 'cash trx', 'BCA', '', '2013-08-12 00:00:00', 'a', 'BNI', '120000', '120000', 'test', '0', '2013-08-12 00:00:00', '0', '0', 'dfasfasf', '0', '0', '0', '', '0', '2013-08-12 00:00:00', '0', '', '0', '', '', '', '0', '0', '', '0', '', '0', '', '0', '', '', '2013-08-12 00:00:00');
INSERT INTO `check_writer` VALUES ('44', 'cash in', 'BNI', null, '2013-09-07 00:00:00', 'Dedy Mizwar', 'C102', '0', '8000', 'Pelunasan piutang pelangan Dedy Mizwar', null, null, null, null, 'ARP00069', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `check_writer` VALUES ('43', 'cash in', 'BCA', null, '2013-08-30 00:00:00', 'Dedy Mizwar', 'C102', '0', '119000', 'Pelunasan piutang pelangan Dedy Mizwar', null, null, null, null, 'ARP00068', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `check_writer` VALUES ('18', 'cash out', 'BCA', '', '2013-08-12 00:00:00', 'aaa', '', '1222', '0', 'test', '0', '2013-08-12 00:00:00', '0', '0', 'acdedd', '0', '0', '0', '', '0', '2013-08-12 00:00:00', '0', '', '0', '', '', '', '0', '0', '', '0', '', '0', '', '0', '', '', '2013-08-12 00:00:00');

-- ----------------------------
-- Table structure for `check_writer_deposit_detail`
-- ----------------------------
DROP TABLE IF EXISTS `check_writer_deposit_detail`;
CREATE TABLE `check_writer_deposit_detail` (
  `trans_id` int(11) default NULL,
  `line_number` int(11) NOT NULL auto_increment,
  `account_number` varchar(50) character set utf8 default NULL,
  `routing_code` varchar(20) character set utf8 default NULL,
  `check_number` varchar(50) character set utf8 default NULL,
  `customer` varchar(50) character set utf8 default NULL,
  `invoice_number` varchar(50) character set utf8 default NULL,
  `amount` double default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`line_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of check_writer_deposit_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `check_writer_items`
-- ----------------------------
DROP TABLE IF EXISTS `check_writer_items`;
CREATE TABLE `check_writer_items` (
  `trans_id` int(11) default NULL,
  `trans_type` varchar(200) character set utf8 default NULL,
  `line_number` int(11) NOT NULL auto_increment,
  `account_id` int(11) default NULL,
  `amount` double default NULL,
  `comments` varchar(200) character set utf8 default NULL,
  `account` varchar(50) character set utf8 default NULL,
  `description` varchar(200) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `invoice_number` varchar(50) default NULL,
  `ref1` varchar(50) default NULL,
  PRIMARY KEY  (`line_number`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of check_writer_items
-- ----------------------------
INSERT INTO `check_writer_items` VALUES ('1', '', '1', '0', '6000', '', '', '', null, null, null, null, 'PBL00115', '');

-- ----------------------------
-- Table structure for `check_writer_print_settings`
-- ----------------------------
DROP TABLE IF EXISTS `check_writer_print_settings`;
CREATE TABLE `check_writer_print_settings` (
  `id` int(11) NOT NULL auto_increment,
  `check_position` double default NULL,
  `check_type` double default NULL,
  `paper_type` double default NULL,
  `print_all_info` bit(1) default NULL,
  `print_check_num` bit(1) default NULL,
  `print_check_stub` bit(1) default NULL,
  `print_company_info` bit(1) default NULL,
  `print_bank_info` bit(1) default NULL,
  `print_payee_address` bit(1) default NULL,
  `print_micr` bit(1) default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of check_writer_print_settings
-- ----------------------------

-- ----------------------------
-- Table structure for `check_writer_recurring_payment_items`
-- ----------------------------
DROP TABLE IF EXISTS `check_writer_recurring_payment_items`;
CREATE TABLE `check_writer_recurring_payment_items` (
  `payment_number` int(11) default NULL,
  `line_number` int(11) NOT NULL auto_increment,
  `account_id` int(11) default NULL,
  `amount` double default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`line_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of check_writer_recurring_payment_items
-- ----------------------------

-- ----------------------------
-- Table structure for `check_writer_recurring_payments`
-- ----------------------------
DROP TABLE IF EXISTS `check_writer_recurring_payments`;
CREATE TABLE `check_writer_recurring_payments` (
  `payment_number` int(11) default NULL,
  `bank_account_number` varchar(50) character set utf8 default NULL,
  `payee` varchar(50) character set utf8 default NULL,
  `supplier_number` varchar(50) character set utf8 default NULL,
  `payment_amount` double default NULL,
  `memo` varchar(150) character set utf8 default NULL,
  `voucher` double default NULL,
  `frequency` varchar(20) character set utf8 default NULL,
  `selected` bit(1) default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of check_writer_recurring_payments
-- ----------------------------

-- ----------------------------
-- Table structure for `check_writer_undeposited_checks`
-- ----------------------------
DROP TABLE IF EXISTS `check_writer_undeposited_checks`;
CREATE TABLE `check_writer_undeposited_checks` (
  `payment_date` datetime default NULL,
  `line_number` int(11) NOT NULL auto_increment,
  `check_number` varchar(50) character set utf8 default NULL,
  `customer` varchar(50) character set utf8 default NULL,
  `invoice_number` varchar(50) character set utf8 default NULL,
  `amount` double default NULL,
  `selected` bit(1) default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `update_date` datetime default NULL,
  PRIMARY KEY  (`line_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of check_writer_undeposited_checks
-- ----------------------------

-- ----------------------------
-- Table structure for `city`
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `city_id` varchar(50) character set utf8 NOT NULL default '',
  `city_name` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`city_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of city
-- ----------------------------

-- ----------------------------
-- Table structure for `crdb_memo`
-- ----------------------------
DROP TABLE IF EXISTS `crdb_memo`;
CREATE TABLE `crdb_memo` (
  `linenumber` int(11) NOT NULL auto_increment,
  `transtype` varchar(50) character set utf8 default NULL,
  `tanggal` datetime default NULL,
  `docnumber` varchar(50) character set utf8 NOT NULL default '',
  `amount` double default NULL,
  `keterangan` varchar(255) character set utf8 default NULL,
  `kodecrdb` varchar(15) character set utf8 default NULL,
  `posted` int(1) default NULL,
  `accountid` int(11) default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `update_date` datetime default NULL,
  PRIMARY KEY  (`linenumber`,`docnumber`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of crdb_memo
-- ----------------------------
INSERT INTO `crdb_memo` VALUES ('1', null, '2013-08-26 00:00:00', 'P-C0100005', '12000', 'yrdy', 'CRDB00001', null, null, null, null, null, null, null);
INSERT INTO `crdb_memo` VALUES ('2', null, '2013-08-26 00:00:00', 'P-C0100005', '-12000', 'Test', 'CRDB00002', null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `crdb_memo_dtl`
-- ----------------------------
DROP TABLE IF EXISTS `crdb_memo_dtl`;
CREATE TABLE `crdb_memo_dtl` (
  `lineid` int(11) NOT NULL auto_increment,
  `kodecrdb` varchar(15) character set utf8 default NULL,
  `accountid` int(11) default NULL,
  `amount` double default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `update_date` datetime default NULL,
  PRIMARY KEY  (`lineid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of crdb_memo_dtl
-- ----------------------------

-- ----------------------------
-- Table structure for `credit_card_type`
-- ----------------------------
DROP TABLE IF EXISTS `credit_card_type`;
CREATE TABLE `credit_card_type` (
  `id` int(11) NOT NULL auto_increment,
  `card_type` varchar(255) character set utf8 NOT NULL default '',
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `card_name` varchar(255) character set utf8 default NULL,
  `to_date` datetime default NULL,
  `from_date` datetime default NULL,
  `disc_percent` int(11) default NULL,
  PRIMARY KEY  (`id`,`card_type`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of credit_card_type
-- ----------------------------
INSERT INTO `credit_card_type` VALUES ('1', 'Citibank', null, null, null, null, null, null, null);
INSERT INTO `credit_card_type` VALUES ('2', 'Mandiri Visa', null, null, null, null, null, null, null);
INSERT INTO `credit_card_type` VALUES ('3', 'Mandiri Master', null, null, null, null, null, null, null);
INSERT INTO `credit_card_type` VALUES ('8', 'Amex', null, null, null, 'Amex Card', '2010-02-11 00:00:00', '2009-07-24 00:00:00', '10');

-- ----------------------------
-- Table structure for `ctrl_id`
-- ----------------------------
DROP TABLE IF EXISTS `ctrl_id`;
CREATE TABLE `ctrl_id` (
  `ctrl_id` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`ctrl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ctrl_id
-- ----------------------------
INSERT INTO `ctrl_id` VALUES ('control 1');
INSERT INTO `ctrl_id` VALUES ('control 2');
INSERT INTO `ctrl_id` VALUES ('control 3');

-- ----------------------------
-- Table structure for `currencies`
-- ----------------------------
DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies` (
  `currency_code` varchar(50) character set utf8 NOT NULL,
  `description` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`currency_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of currencies
-- ----------------------------
INSERT INTO `currencies` VALUES ('IDR', 'Rupiah', null);
INSERT INTO `currencies` VALUES ('USD', 'Dollar', null);

-- ----------------------------
-- Table structure for `customer_beginning_balance`
-- ----------------------------
DROP TABLE IF EXISTS `customer_beginning_balance`;
CREATE TABLE `customer_beginning_balance` (
  `tanggal` datetime NOT NULL default '0000-00-00 00:00:00',
  `customer_number` varchar(50) character set utf8 NOT NULL default '',
  `piutang_awal` double default NULL,
  `piutang` double default NULL,
  `piutang_akhir` double default NULL,
  `amountin` double default NULL,
  `amountout` double default NULL,
  `flagawal` bit(1) default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`tanggal`,`customer_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer_beginning_balance
-- ----------------------------

-- ----------------------------
-- Table structure for `customer_shipto`
-- ----------------------------
DROP TABLE IF EXISTS `customer_shipto`;
CREATE TABLE `customer_shipto` (
  `customer_code` varchar(50) character set utf8 default NULL,
  `location_code` varchar(50) character set utf8 default NULL,
  `alamat` varchar(255) character set utf8 default NULL,
  `kota` varchar(50) character set utf8 default NULL,
  `kode_pos` varchar(50) character set utf8 default NULL,
  `telp` varchar(50) character set utf8 default NULL,
  `fax` varchar(50) character set utf8 default NULL,
  `contact` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer_shipto
-- ----------------------------

-- ----------------------------
-- Table structure for `customer_statement_defaults`
-- ----------------------------
DROP TABLE IF EXISTS `customer_statement_defaults`;
CREATE TABLE `customer_statement_defaults` (
  `id` int(11) NOT NULL auto_increment,
  `aging_date` datetime default NULL,
  `from_date` datetime default NULL,
  `to_date` varchar(50) character set utf8 default NULL,
  `customer` varchar(50) character set utf8 default NULL,
  `print_type` int(11) default NULL,
  `number_of_copies` int(11) default NULL,
  `statement_type` int(11) default NULL,
  `customer_range` int(11) default NULL,
  `print_dunning_messages` bit(1) default NULL,
  `minimum_past_due_amount` double default NULL,
  `minimum_invoice_age` double default NULL,
  `minimum_customer_balance` double default NULL,
  `print_zero_balances` bit(1) default NULL,
  `print_credit_balances` bit(1) default NULL,
  `current_message` varchar(200) character set utf8 default NULL,
  `over_30_message` varchar(200) character set utf8 default NULL,
  `over_60_message` varchar(200) character set utf8 default NULL,
  `over_90_message` varchar(200) character set utf8 default NULL,
  `over_120_message` varchar(200) character set utf8 default NULL,
  `paymentdisplay` int(11) default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer_statement_defaults
-- ----------------------------

-- ----------------------------
-- Table structure for `customers`
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_number` varchar(50) character set utf8 NOT NULL,
  `active` int(1) default NULL,
  `customer_record_type` varchar(50) character set utf8 default NULL,
  `type_of_customer` varchar(50) character set utf8 default NULL,
  `region` varchar(20) character set utf8 default NULL,
  `salutation` varchar(50) character set utf8 default NULL,
  `first_name` varchar(50) character set utf8 default NULL,
  `middle_initial` varchar(5) character set utf8 default NULL,
  `last_name` varchar(50) character set utf8 default NULL,
  `company` varchar(50) character set utf8 default NULL,
  `street` varchar(255) character set utf8 default NULL,
  `suite` varchar(50) character set utf8 default NULL,
  `city` varchar(50) character set utf8 default NULL,
  `state` varchar(50) character set utf8 default NULL,
  `zip_postal_code` varchar(10) character set utf8 default NULL,
  `country` varchar(20) character set utf8 default NULL,
  `phone` varchar(20) character set utf8 default NULL,
  `fax` varchar(20) character set utf8 default NULL,
  `other_phone` varchar(20) character set utf8 default NULL,
  `email` varchar(50) character set utf8 default NULL,
  `tax_exempt` int(1) default NULL,
  `sales_tax_code` varchar(10) character set utf8 default NULL,
  `sales_tax2_code` varchar(10) character set utf8 default NULL,
  `credit_limit` double default NULL,
  `discount_percent` double(11,0) default NULL,
  `markup_percent` double(11,0) default NULL,
  `credit_balance` double default NULL,
  `pricing_type` varchar(10) character set utf8 default NULL,
  `code` varchar(10) character set utf8 default NULL,
  `comments` double default NULL,
  `payment_terms` varchar(20) character set utf8 default NULL,
  `credithold` int(1) default NULL,
  `salesman` varchar(50) character set utf8 default NULL,
  `shipped_via` varchar(50) character set utf8 default NULL,
  `route_delivery_code` varchar(15) character set utf8 default NULL,
  `route_delivery_sequence` int(11) default NULL,
  `route_delivery_day` varchar(15) character set utf8 default NULL,
  `finance_charges` bit(1) default NULL,
  `last_finance_charge_date` datetime default NULL,
  `finance_charge_acct` int(11) default NULL,
  `finance_charge_pct` double default NULL,
  `bill_to_customer_number` varchar(15) character set utf8 default NULL,
  `current_balance` double default NULL,
  `npwp` varchar(50) character set utf8 default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `nppkp` varchar(50) character set utf8 default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  `password` varchar(50) default NULL,
  `limi_date` datetime default NULL,
  PRIMARY KEY  (`customer_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('C102', '1', '', '', '', '', '', '', '', 'Dedy Mizwar', 'JL. RAYA SADANG NO. 29', '', 'Purwakarta', '', '', '', '', '', '', '', '0', '', '', '0', '0', '0', '0', '', '', '0', 'Kredit 30 Hari', '0', '', '', '', '0', '', '\0', '2013-08-31 00:00:00', '1373', '0', '', '0', '', '', '0', '', '2013-08-31 00:00:00', '', '2013-08-31 00:00:00', '', '', '2013-08-31 00:00:00');
INSERT INTO `customers` VALUES ('12019', '0', '', '', '', '', '', '', '', 'Ida Royani', 'JL. RAYA SUBANG NO. 20 PURWAKARTA', '', 'Purwakarta', '', '', '', '', '', '', '', '0', '', '', '0', '0', '0', '0', '', '', '0', '', '0', '', '', '', '0', '', '\0', '2013-08-31 00:00:00', '0', '0', '', '0', '', '', '0', '', '2013-08-31 00:00:00', '', '2013-08-31 00:00:00', '', '', '2013-08-31 00:00:00');
INSERT INTO `customers` VALUES ('NUR A', '1', '', '', '', '', '', '', '', 'NUR AZIZAH SOLIHATI', 'JL. BAITURAHMAN', 'LHOKSEUMAWE', 'Aceh', '', '', '', '', '', '', 'nur_a@yahoo.co.id', '0', '', '', '0', '0', '0', '0', '', '', '0', '60 Hari', '0', '', '', '', '0', '', '\0', '2013-08-31 00:00:00', '1373', '0', '', '0', '', '', '0', '', '2013-08-31 00:00:00', '', '2013-08-31 00:00:00', '', '', '2013-08-31 00:00:00');
INSERT INTO `customers` VALUES ('Irfan', '1', '', '', '', '', '', '', '', 'Irfan Hakim', 'Jl. Raya Serang Km. 200', 'Gedung Artha Guna', 'Jakarta', '', '', '', '', '', '', 'irfan@yahoo.com', '0', '', '', '0', '0', '0', '0', '', '', '0', '', '0', '', '', '', '0', '', '\0', '2013-09-02 00:00:00', '0', '0', '', '0', '', '', '0', '', '2013-09-02 00:00:00', '', '2013-09-02 00:00:00', '', '', '2013-09-02 00:00:00');
INSERT INTO `customers` VALUES ('ANDRI', '1', '', '', '', '', '', '', '', 'ANDRI', 'JL. RAYA PURWAKARTA NO. 38', 'Gedung Indofood lantai 20', '', '', '', 'Indonesia', '62212002992', '0299200111', '', 'zadr50@yahoo.com', '0', '', '', '0', '0', '0', '0', '', '', '0', 'Kredit 30 Hari', '0', '', '', '', '0', '', '', '2013-07-19 00:00:00', '1373', '1396', '', '0', '', '', '0', '', '2013-07-19 00:00:00', '', '2013-07-19 00:00:00', '', '', null);
INSERT INTO `customers` VALUES ('CASH', null, null, null, null, null, null, null, null, 'CASH', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `customers_other_info`
-- ----------------------------
DROP TABLE IF EXISTS `customers_other_info`;
CREATE TABLE `customers_other_info` (
  `cust_code` varchar(50) character set utf8 NOT NULL,
  `disc_percent` int(11) default NULL,
  `disc_from_date` datetime default NULL,
  `disc_to_date` datetime default NULL,
  `join_date` datetime default NULL,
  `expire_date` datetime default NULL,
  `disc_amount` double default NULL,
  `min_sales` double default NULL,
  `birth_date` datetime default NULL,
  PRIMARY KEY  (`cust_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customers_other_info
-- ----------------------------

-- ----------------------------
-- Table structure for `daftar_email`
-- ----------------------------
DROP TABLE IF EXISTS `daftar_email`;
CREATE TABLE `daftar_email` (
  `email` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of daftar_email
-- ----------------------------
INSERT INTO `daftar_email` VALUES ('dfadsf');
INSERT INTO `daftar_email` VALUES ('undefined');

-- ----------------------------
-- Table structure for `departments`
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL auto_increment,
  `dept_code` varchar(50) character set utf8 default NULL,
  `dept_name` varchar(50) character set utf8 default NULL,
  `company_code` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x1` (`dept_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of departments
-- ----------------------------

-- ----------------------------
-- Table structure for `employee`
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `nip` varchar(50) character set utf8 NOT NULL,
  `nama` varchar(50) character set utf8 default NULL,
  `tgllahir` datetime default NULL,
  `agama` varchar(12) character set utf8 default NULL,
  `kelamin` varchar(1) character set utf8 default NULL,
  `status` varchar(12) character set utf8 default NULL,
  `idktpno` varchar(20) character set utf8 default NULL,
  `hireddate` datetime default NULL,
  `dept` varchar(50) character set utf8 default NULL,
  `divisi` varchar(50) character set utf8 default NULL,
  `level` varchar(50) character set utf8 default NULL,
  `position` varchar(50) character set utf8 default NULL,
  `supervisor` varchar(50) character set utf8 default NULL,
  `payperiod` varchar(50) character set utf8 default NULL,
  `alamat` varchar(100) character set utf8 default NULL,
  `kodepos` varchar(50) character set utf8 default NULL,
  `telpon` varchar(12) character set utf8 default NULL,
  `hp` varchar(25) character set utf8 default NULL,
  `gp` double default NULL,
  `tjabatan` double default NULL,
  `ttransport` double default NULL,
  `tmakan` double default NULL,
  `incentive` double default NULL,
  `sc` double(11,0) default NULL,
  `rateot` double default NULL,
  `tkesehatan` double default NULL,
  `tlain` double default NULL,
  `bjabatang` double default NULL,
  `iurantht` double default NULL,
  `blain` double default NULL,
  `emptype` varchar(20) character set utf8 default NULL,
  `emplevel` varchar(20) character set utf8 default NULL,
  `pathimage` varchar(200) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee
-- ----------------------------

-- ----------------------------
-- Table structure for `employee_level`
-- ----------------------------
DROP TABLE IF EXISTS `employee_level`;
CREATE TABLE `employee_level` (
  `levelkode` varchar(50) character set utf8 NOT NULL,
  `levelname` varchar(50) character set utf8 default NULL,
  `creationdate` datetime default NULL,
  `keterangan` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`levelkode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee_level
-- ----------------------------

-- ----------------------------
-- Table structure for `employee_type`
-- ----------------------------
DROP TABLE IF EXISTS `employee_type`;
CREATE TABLE `employee_type` (
  `kode` varchar(50) character set utf8 NOT NULL,
  `description` varchar(10) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee_type
-- ----------------------------

-- ----------------------------
-- Table structure for `employeeeducations`
-- ----------------------------
DROP TABLE IF EXISTS `employeeeducations`;
CREATE TABLE `employeeeducations` (
  `id` int(11) NOT NULL auto_increment,
  `employeeid` varchar(255) character set utf8 default NULL,
  `educationlevel` varchar(255) character set utf8 default NULL,
  `school` varchar(255) character set utf8 default NULL,
  `place` varchar(255) character set utf8 default NULL,
  `major` varchar(255) character set utf8 default NULL,
  `enteryear` int(11) default NULL,
  `graduationyear` int(11) default NULL,
  `yearofattend` varchar(255) character set utf8 default NULL,
  `graduate` bit(1) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employeeeducations
-- ----------------------------

-- ----------------------------
-- Table structure for `employeeexperience`
-- ----------------------------
DROP TABLE IF EXISTS `employeeexperience`;
CREATE TABLE `employeeexperience` (
  `id` int(11) NOT NULL auto_increment,
  `employeeid` varchar(255) character set utf8 default NULL,
  `company` varchar(255) character set utf8 default NULL,
  `startdate` varchar(255) character set utf8 default NULL,
  `finishdate` varchar(255) character set utf8 default NULL,
  `firstposition` varchar(255) character set utf8 default NULL,
  `endposition` varchar(255) character set utf8 default NULL,
  `place` varchar(255) character set utf8 default NULL,
  `lastsalary` varchar(255) character set utf8 default NULL,
  `supervisor` varchar(255) character set utf8 default NULL,
  `referencename` varchar(255) character set utf8 default NULL,
  `referencephone` varchar(255) character set utf8 default NULL,
  `reasontoleave` varchar(255) character set utf8 default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employeeexperience
-- ----------------------------

-- ----------------------------
-- Table structure for `employeefamily`
-- ----------------------------
DROP TABLE IF EXISTS `employeefamily`;
CREATE TABLE `employeefamily` (
  `id` int(11) NOT NULL auto_increment,
  `employeeid` varchar(255) character set utf8 default NULL,
  `familyname` varchar(255) character set utf8 default NULL,
  `relationship` varchar(255) character set utf8 default NULL,
  `age` datetime default NULL,
  `education` varchar(255) character set utf8 default NULL,
  `job` varchar(255) character set utf8 default NULL,
  `mariagestatus` varchar(255) character set utf8 default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employeefamily
-- ----------------------------

-- ----------------------------
-- Table structure for `employeelicense`
-- ----------------------------
DROP TABLE IF EXISTS `employeelicense`;
CREATE TABLE `employeelicense` (
  `id` int(11) NOT NULL auto_increment,
  `employeeid` varchar(255) character set utf8 default NULL,
  `licensenumber` varchar(255) character set utf8 default NULL,
  `lincensetype` varchar(255) character set utf8 default NULL,
  `startdate` datetime default NULL,
  `finishdate` datetime default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employeelicense
-- ----------------------------

-- ----------------------------
-- Table structure for `employeemedical`
-- ----------------------------
DROP TABLE IF EXISTS `employeemedical`;
CREATE TABLE `employeemedical` (
  `id` int(11) NOT NULL auto_increment,
  `employeeid` varchar(255) character set utf8 default NULL,
  `medicaldate` datetime default NULL,
  `description` varchar(255) character set utf8 default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employeemedical
-- ----------------------------

-- ----------------------------
-- Table structure for `employeerewardpunish`
-- ----------------------------
DROP TABLE IF EXISTS `employeerewardpunish`;
CREATE TABLE `employeerewardpunish` (
  `id` int(11) NOT NULL auto_increment,
  `employeeid` varchar(255) character set utf8 default NULL,
  `daterp` datetime default NULL,
  `description` varchar(255) character set utf8 default NULL,
  `rankinglevel` varchar(255) character set utf8 default NULL,
  `typerp` varchar(255) character set utf8 default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employeerewardpunish
-- ----------------------------

-- ----------------------------
-- Table structure for `employees`
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `employeeNumber` int(11) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `officeCode` varchar(10) NOT NULL,
  `reportsTo` int(11) default NULL,
  `jobTitle` varchar(50) NOT NULL,
  PRIMARY KEY  (`employeeNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES ('1002', 'Murphy', 'Diane', 'x5800', 'dmurphy@classicmodelcars.com', '1', null, 'President');
INSERT INTO `employees` VALUES ('1056', 'Patterson', 'Mary', 'x4611', 'mpatterso@classicmodelcars.com', '1', '1002', 'VP Sales');
INSERT INTO `employees` VALUES ('1076', 'Firrelli', 'Jeff', 'x9273', 'jfirrelli@classicmodelcars.com', '1', '1002', 'VP Marketing');
INSERT INTO `employees` VALUES ('1088', 'Patterson', 'William', 'x4871', 'wpatterson@classicmodelcars.com', '6', '1056', 'Sales Manager (APAC)');
INSERT INTO `employees` VALUES ('1102', 'Bondur', 'Gerard', 'x5408', 'gbondur@classicmodelcars.com', '4', '1056', 'Sale Manager (EMEA)');
INSERT INTO `employees` VALUES ('1143', 'Bow', 'Anthony', 'x5428', 'abow@classicmodelcars.com', '1', '1056', 'Sales Manager (NA)');
INSERT INTO `employees` VALUES ('1165', 'Jennings', 'Leslie', 'x3291', 'ljennings@classicmodelcars.com', '1', '1143', 'Sales Rep');
INSERT INTO `employees` VALUES ('1166', 'Thompson', 'Leslie', 'x4065', 'lthompson@classicmodelcars.com', '1', '1143', 'Sales Rep');
INSERT INTO `employees` VALUES ('1188', 'Firrelli', 'Julie', 'x2173', 'jfirrelli@classicmodelcars.com', '2', '1143', 'Sales Rep');
INSERT INTO `employees` VALUES ('1216', 'Patterson', 'Steve', 'x4334', 'spatterson@classicmodelcars.com', '2', '1143', 'Sales Rep');
INSERT INTO `employees` VALUES ('1286', 'Tseng', 'Foon Yue', 'x2248', 'ftseng@classicmodelcars.com', '3', '1143', 'Sales Rep');
INSERT INTO `employees` VALUES ('1323', 'Vanauf', 'George', 'x4102', 'gvanauf@classicmodelcars.com', '3', '1143', 'Sales Rep');
INSERT INTO `employees` VALUES ('1337', 'Bondur', 'Loui', 'x6493', 'lbondur@classicmodelcars.com', '4', '1102', 'Sales Rep');
INSERT INTO `employees` VALUES ('1370', 'Hernandez', 'Gerard', 'x2028', 'ghernande@classicmodelcars.com', '4', '1102', 'Sales Rep');
INSERT INTO `employees` VALUES ('1401', 'Castillo', 'Pamela', 'x2759', 'pcastillo@classicmodelcars.com', '4', '1102', 'Sales Rep');
INSERT INTO `employees` VALUES ('1501', 'Bott', 'Larry', 'x2311', 'lbott@classicmodelcars.com', '7', '1102', 'Sales Rep');
INSERT INTO `employees` VALUES ('1504', 'Jones', 'Barry', 'x102', 'bjones@classicmodelcars.com', '7', '1102', 'Sales Rep');
INSERT INTO `employees` VALUES ('1611', 'Fixter', 'Andy', 'x101', 'afixter@classicmodelcars.com', '6', '1088', 'Sales Rep');
INSERT INTO `employees` VALUES ('1612', 'Marsh', 'Peter', 'x102', 'pmarsh@classicmodelcars.com', '6', '1088', 'Sales Rep');
INSERT INTO `employees` VALUES ('1619', 'King', 'Tom', 'x103', 'tking@classicmodelcars.com', '6', '1088', 'Sales Rep');
INSERT INTO `employees` VALUES ('1621', 'Nishi', 'Mami', 'x101', 'mnishi@classicmodelcars.com', '5', '1056', 'Sales Rep');
INSERT INTO `employees` VALUES ('1625', 'Kato', 'Yoshimi', 'x102', 'ykato@classicmodelcars.com', '5', '1621', 'Sales Rep');
INSERT INTO `employees` VALUES ('1702', 'Gerard', 'Martin', 'x2312', 'mgerard@classicmodelcars.com', '4', '1102', 'Sales Rep');

-- ----------------------------
-- Table structure for `employeeskill`
-- ----------------------------
DROP TABLE IF EXISTS `employeeskill`;
CREATE TABLE `employeeskill` (
  `id` int(11) NOT NULL auto_increment,
  `employeeid` varchar(255) character set utf8 default NULL,
  `skillname` varchar(255) character set utf8 default NULL,
  `skilllevel` varchar(255) character set utf8 default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employeeskill
-- ----------------------------

-- ----------------------------
-- Table structure for `employeetraining`
-- ----------------------------
DROP TABLE IF EXISTS `employeetraining`;
CREATE TABLE `employeetraining` (
  `id` int(11) NOT NULL auto_increment,
  `employeeid` varchar(255) character set utf8 default NULL,
  `trainingname` varchar(255) character set utf8 default NULL,
  `traningdate` varchar(255) character set utf8 default NULL,
  `place` varchar(255) character set utf8 default NULL,
  `topic` varchar(255) character set utf8 default NULL,
  `certificate` varchar(255) character set utf8 default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employeetraining
-- ----------------------------

-- ----------------------------
-- Table structure for `exchange_rate`
-- ----------------------------
DROP TABLE IF EXISTS `exchange_rate`;
CREATE TABLE `exchange_rate` (
  `er_code` varchar(50) character set utf8 default NULL,
  `sourcecurrency` varchar(50) character set utf8 default NULL,
  `targetcurrency` varchar(50) character set utf8 default NULL,
  `currency_rate` double default NULL,
  `last_update` datetime default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of exchange_rate
-- ----------------------------

-- ----------------------------
-- Table structure for `fa_asset`
-- ----------------------------
DROP TABLE IF EXISTS `fa_asset`;
CREATE TABLE `fa_asset` (
  `id` varchar(10) character set utf8 NOT NULL,
  `description` varchar(50) character set utf8 default NULL,
  `group_id` varchar(50) character set utf8 default NULL,
  `location_id` varchar(50) character set utf8 default NULL,
  `cost_centre_id` varchar(50) character set utf8 default NULL,
  `custodian_id` varchar(50) character set utf8 default NULL,
  `vendor_id` varchar(50) character set utf8 default NULL,
  `sn` varchar(50) character set utf8 default NULL,
  `acquisition_date` varchar(50) character set utf8 default NULL,
  `acquisition_cost` double default NULL,
  `warranty_date` varchar(8) character set utf8 default NULL,
  `depn_method` int(11) default NULL,
  `useful_lives` int(11) default NULL,
  `salvage_value` int(11) default NULL,
  `private_use` int(11) default NULL,
  `journal_id` int(11) default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fa_asset
-- ----------------------------

-- ----------------------------
-- Table structure for `fa_asset_depreciation`
-- ----------------------------
DROP TABLE IF EXISTS `fa_asset_depreciation`;
CREATE TABLE `fa_asset_depreciation` (
  `asset_id` varchar(10) character set utf8 default NULL,
  `depn_year` int(11) default NULL,
  `depn_month` int(11) default NULL,
  `depn_id` int(11) default NULL,
  `acquisition_cost` double default NULL,
  `depn_exp` double default NULL,
  `accum_depn` double default NULL,
  `book_value` double default NULL,
  `journal_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fa_asset_depreciation
-- ----------------------------

-- ----------------------------
-- Table structure for `fa_asset_depreciation_schedule`
-- ----------------------------
DROP TABLE IF EXISTS `fa_asset_depreciation_schedule`;
CREATE TABLE `fa_asset_depreciation_schedule` (
  `asset_id` varchar(10) character set utf8 default NULL,
  `depn_year` int(11) default NULL,
  `depn_id` int(11) default NULL,
  `acquisition_cost` double default NULL,
  `depn_exp` double default NULL,
  `accum_depn` double default NULL,
  `book_value` double default NULL,
  `posted` bit(1) default NULL,
  `glid` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fa_asset_depreciation_schedule
-- ----------------------------

-- ----------------------------
-- Table structure for `fa_asset_group`
-- ----------------------------
DROP TABLE IF EXISTS `fa_asset_group`;
CREATE TABLE `fa_asset_group` (
  `id` varchar(50) character set utf8 NOT NULL,
  `name` varchar(50) character set utf8 default NULL,
  `at_cost` int(11) default NULL,
  `accum_depn` int(11) default NULL,
  `profit_on_sale` int(11) default NULL,
  `loss_on_sale` int(11) default NULL,
  `cash_bank` int(11) default NULL,
  `depn_method` int(11) default NULL,
  `useful_lives` int(11) default NULL,
  `salvage_value` int(11) default NULL,
  `expenses_depn` int(11) default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fa_asset_group
-- ----------------------------

-- ----------------------------
-- Table structure for `fa_asset_service_log`
-- ----------------------------
DROP TABLE IF EXISTS `fa_asset_service_log`;
CREATE TABLE `fa_asset_service_log` (
  `id` int(50) NOT NULL auto_increment,
  `asset_id` varchar(10) character set utf8 default NULL,
  `service_date` datetime default NULL,
  `service_provider_id` double default NULL,
  `service_contract` varchar(20) character set utf8 default NULL,
  `service_cost` double default NULL,
  `notes` varchar(200) character set utf8 default NULL,
  `next_service_due` varchar(8) character set utf8 default NULL,
  `journal_id` varchar(50) character set utf8 default NULL,
  `posted` bit(1) default NULL,
  `debit_account_id` double default NULL,
  `credit_account_id` double default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fa_asset_service_log
-- ----------------------------

-- ----------------------------
-- Table structure for `fa_asset_transaction`
-- ----------------------------
DROP TABLE IF EXISTS `fa_asset_transaction`;
CREATE TABLE `fa_asset_transaction` (
  `id` int(50) NOT NULL auto_increment,
  `asset_id` varchar(10) character set utf8 default NULL,
  `trans_type` int(11) default NULL,
  `trans_date` varchar(8) character set utf8 default NULL,
  `notes` varchar(200) character set utf8 default NULL,
  `trade_in_allowance` double default NULL,
  `trans_value` double default NULL,
  `vendor_id` double default NULL,
  `cash_bank_ap` int(11) default NULL,
  `journal_id` varchar(50) character set utf8 default NULL,
  `posted` bit(1) default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fa_asset_transaction
-- ----------------------------

-- ----------------------------
-- Table structure for `fa_cards`
-- ----------------------------
DROP TABLE IF EXISTS `fa_cards`;
CREATE TABLE `fa_cards` (
  `id` varchar(50) character set utf8 NOT NULL default '',
  `type` varchar(16) character set utf8 default NULL,
  `name` varchar(50) character set utf8 default NULL,
  `street_add` varchar(50) character set utf8 default NULL,
  `city` varchar(30) character set utf8 default NULL,
  `state` varchar(30) character set utf8 default NULL,
  `postcode` varchar(10) character set utf8 default NULL,
  `phone` varchar(20) character set utf8 default NULL,
  `mobile` varchar(20) character set utf8 default NULL,
  `fax` varchar(20) character set utf8 default NULL,
  `email` varchar(50) character set utf8 default NULL,
  `contact` varchar(50) character set utf8 default NULL,
  `notes` varchar(100) character set utf8 default NULL,
  `account_no1` int(11) default NULL,
  `account_no2` int(11) default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fa_cards
-- ----------------------------

-- ----------------------------
-- Table structure for `fa_setting`
-- ----------------------------
DROP TABLE IF EXISTS `fa_setting`;
CREATE TABLE `fa_setting` (
  `type` varchar(50) character set utf8 default NULL,
  `id` int(11) NOT NULL auto_increment,
  `description` varchar(50) character set utf8 default NULL,
  `enable` bit(1) default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fa_setting
-- ----------------------------

-- ----------------------------
-- Table structure for `fb_room`
-- ----------------------------
DROP TABLE IF EXISTS `fb_room`;
CREATE TABLE `fb_room` (
  `room_code` varchar(50) NOT NULL default '',
  `room_name` varchar(50) default NULL,
  `regular_hour` double default NULL,
  `happy_hour` double default NULL,
  `status` int(11) default NULL,
  `nota` varchar(50) default NULL,
  `dept` varchar(50) default NULL,
  `RType` varchar(50) default NULL,
  `capacity` varchar(50) default NULL,
  `desciption` varchar(100) default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`room_code`),
  KEY `room_code` (`room_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fb_room
-- ----------------------------
INSERT INTO `fb_room` VALUES ('Meja 1', 'Meja 1', '0', '0', '1', '', '', '', '', '', null);
INSERT INTO `fb_room` VALUES ('Meja 2', 'Meja 2', '0', '0', '1', '', '', '', '', '', null);
INSERT INTO `fb_room` VALUES ('Meja 3', 'Meja 3', '0', '0', '1', '', '', '', '', '', null);

-- ----------------------------
-- Table structure for `fb_room_reservation`
-- ----------------------------
DROP TABLE IF EXISTS `fb_room_reservation`;
CREATE TABLE `fb_room_reservation` (
  `Invoice Number` varchar(50) default NULL,
  `Customer Code` varchar(50) default NULL,
  `Waiter` varchar(50) default NULL,
  `Start Time` datetime default NULL,
  `End Time` datetime default NULL,
  `Total Hours` int(10) default NULL,
  `Price` double default NULL,
  `Amount` double default NULL,
  `Room Number` varchar(50) default NULL,
  `Status` int(10) default NULL,
  `Total Person` int(10) default NULL,
  `Session` varchar(50) default NULL,
  `Cewek` varchar(50) default NULL,
  `Mamih` varchar(50) default NULL,
  `Jenis Bayar` int(10) default NULL,
  `Jumlah Bayar` double default NULL,
  `Resv Status` int(10) default NULL,
  `Dept` varchar(50) default NULL,
  `Fixed Hours` tinyint(1) NOT NULL default '0',
  `Date Trn` datetime default NULL,
  `update_status` int(10) default NULL,
  UNIQUE KEY `Invoice Number` (`Invoice Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fb_room_reservation
-- ----------------------------

-- ----------------------------
-- Table structure for `finance_charge_defaults`
-- ----------------------------
DROP TABLE IF EXISTS `finance_charge_defaults`;
CREATE TABLE `finance_charge_defaults` (
  `minimum_days_past_due` int(11) default NULL,
  `minimum_customer_balance` double default NULL,
  `minimum_finance_charge` double default NULL,
  `number_days_between_charges` int(11) default NULL,
  `use_one_month_or_actual_days` varchar(15) character set utf8 default NULL,
  `annual_finance_charge_pct` double default NULL,
  `daily_finance_charge_pct` double default NULL,
  `include_fin_chg_in_past_due_amt` bit(1) default NULL,
  `finance_charge_acct` int(11) default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of finance_charge_defaults
-- ----------------------------

-- ----------------------------
-- Table structure for `financial_periods`
-- ----------------------------
DROP TABLE IF EXISTS `financial_periods`;
CREATE TABLE `financial_periods` (
  `year_id` int(11) default NULL,
  `sequence` double default NULL,
  `period` varchar(50) character set utf8 default NULL,
  `startdate` datetime default NULL,
  `enddate` datetime default NULL,
  `closed` tinyint(1) default NULL,
  `update_status` int(11) default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of financial_periods
-- ----------------------------
INSERT INTO `financial_periods` VALUES ('2013', '1', '2013-01', '2013-01-01 00:00:00', '2013-01-31 00:00:00', '0', '0', '0');
INSERT INTO `financial_periods` VALUES ('2013', '7', '2013-07', '2013-07-01 00:00:00', '2013-07-30 00:00:00', '0', '0', '14');
INSERT INTO `financial_periods` VALUES ('2013', '6', '2013-06', '2013-06-01 00:00:00', '2013-06-30 00:00:00', '0', '0', '20');
INSERT INTO `financial_periods` VALUES ('2013', '5', '2013-05', '2013-05-01 00:00:00', '2013-05-31 00:00:00', '0', '0', '12');
INSERT INTO `financial_periods` VALUES ('2013', '4', '2013-04', '2013-04-01 00:00:00', '2013-04-30 00:00:00', '0', '0', '11');
INSERT INTO `financial_periods` VALUES ('2013', '3', '2013-03', '2013-03-01 00:00:00', '2013-03-31 00:00:00', '0', '0', '10');
INSERT INTO `financial_periods` VALUES ('2013', '2', '2013-02', '2013-02-01 00:00:00', '2013-02-28 00:00:00', '0', '0', '9');
INSERT INTO `financial_periods` VALUES ('2013', '8', '2013-08', '2013-08-01 00:00:00', '2013-08-31 00:00:00', '0', '0', '21');

-- ----------------------------
-- Table structure for `gl_begbalarc_year`
-- ----------------------------
DROP TABLE IF EXISTS `gl_begbalarc_year`;
CREATE TABLE `gl_begbalarc_year` (
  `account_id` int(11) default NULL,
  `company_code` varchar(15) character set utf8 default NULL,
  `year` datetime default NULL,
  `beginning_balance` double default NULL,
  `debit_base` double default NULL,
  `credit_base` double default NULL,
  `ending_balance` double default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gl_begbalarc_year
-- ----------------------------

-- ----------------------------
-- Table structure for `gl_beginning_balance_archive`
-- ----------------------------
DROP TABLE IF EXISTS `gl_beginning_balance_archive`;
CREATE TABLE `gl_beginning_balance_archive` (
  `account_id` int(11) default NULL,
  `company_code` varchar(15) character set utf8 default NULL,
  `year` datetime default NULL,
  `beginning_balance` double default NULL,
  `debit_base` double default NULL,
  `credit_base` double default NULL,
  `ending_balance` double default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gl_beginning_balance_archive
-- ----------------------------

-- ----------------------------
-- Table structure for `gl_projects`
-- ----------------------------
DROP TABLE IF EXISTS `gl_projects`;
CREATE TABLE `gl_projects` (
  `kode` varchar(255) character set utf8 default NULL,
  `keterangan` varchar(255) character set utf8 default NULL,
  `client` varchar(255) character set utf8 default NULL,
  `tgl_mulai` datetime default NULL,
  `tgl_selesai` datetime default NULL,
  `budget_amount` double default NULL,
  `project_amount` double default NULL,
  `lokasi` varchar(255) character set utf8 default NULL,
  `person_in_charge` varchar(255) character set utf8 default NULL,
  `id` int(11) NOT NULL auto_increment,
  `date_created` datetime default NULL,
  `last_update` datetime default NULL,
  `updated_by` varchar(255) character set utf8 default NULL,
  `status_project` varchar(255) character set utf8 default NULL,
  `category_project` varchar(255) character set utf8 default NULL,
  `sales` double default NULL,
  `cost` double default NULL,
  `expense` double default NULL,
  `labarugi` double default NULL,
  `finish_prc` double default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `invoice_number` double default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x1` (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gl_projects
-- ----------------------------

-- ----------------------------
-- Table structure for `gl_projects_budget`
-- ----------------------------
DROP TABLE IF EXISTS `gl_projects_budget`;
CREATE TABLE `gl_projects_budget` (
  `id` int(11) NOT NULL auto_increment,
  `project_code` varchar(50) character set utf8 default NULL,
  `tahun` int(11) default NULL,
  `account_id` int(11) default NULL,
  `bulan_1` double default NULL,
  `bulan_2` double default NULL,
  `bulan_3` double default NULL,
  `bulan_4` double default NULL,
  `bulan_5` double default NULL,
  `bulan_6` double default NULL,
  `bulan_7` double default NULL,
  `bulan_8` double default NULL,
  `bulan_9` double default NULL,
  `bulan_10` double default NULL,
  `bulan_11` double default NULL,
  `bulan_12` double default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gl_projects_budget
-- ----------------------------

-- ----------------------------
-- Table structure for `gl_projects_saldo`
-- ----------------------------
DROP TABLE IF EXISTS `gl_projects_saldo`;
CREATE TABLE `gl_projects_saldo` (
  `id` int(11) NOT NULL auto_increment,
  `project_code` varchar(50) character set utf8 default NULL,
  `start_date` datetime default NULL,
  `account_id` int(11) default NULL,
  `amount` double default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gl_projects_saldo
-- ----------------------------

-- ----------------------------
-- Table structure for `gl_report_groups`
-- ----------------------------
DROP TABLE IF EXISTS `gl_report_groups`;
CREATE TABLE `gl_report_groups` (
  `id` int(11) NOT NULL auto_increment,
  `company_code` varchar(50) character set utf8 default NULL,
  `account_type` double default NULL,
  `group_type` varchar(10) character set utf8 default NULL,
  `group_name` varchar(50) character set utf8 default NULL,
  `parent_group_type` varchar(10) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x1` (`group_type`)
) ENGINE=MyISAM AUTO_INCREMENT=270 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gl_report_groups
-- ----------------------------
INSERT INTO `gl_report_groups` VALUES ('216', 'MYPOS', '1', '10000', 'Aktiva Lancar', '0', '3', null, null, null, null, null, null);
INSERT INTO `gl_report_groups` VALUES ('219', 'MYPOS', '2', '20000', 'Hutang Lancar', '0', '3', null, null, null, null, null, null);
INSERT INTO `gl_report_groups` VALUES ('223', 'MYPOS', '3', '33000', 'Modal', '0', '3', null, null, null, null, null, null);
INSERT INTO `gl_report_groups` VALUES ('224', 'MYPOS', '4', '40000', 'Pendapatan', '0', '3', null, null, null, null, null, null);
INSERT INTO `gl_report_groups` VALUES ('225', 'MYPOS', '5', '50000', 'Harga Pokok Penjualan', '0', '3', null, null, null, null, null, null);
INSERT INTO `gl_report_groups` VALUES ('226', 'MYPOS', '6', '60000', 'Biaya', '0', '3', null, null, null, null, null, null);
INSERT INTO `gl_report_groups` VALUES ('227', 'MYPOS', '7', '70000', 'Pendapatan Lain-lain', '0', '3', null, null, null, null, null, null);
INSERT INTO `gl_report_groups` VALUES ('228', 'MYPOS', '8', '80000', 'Biaya Lain-lain', '0', '3', null, null, null, null, null, null);
INSERT INTO `gl_report_groups` VALUES ('268', null, '1', '12000', 'Aktiva Tetap', '0', null, null, null, null, null, null, null);
INSERT INTO `gl_report_groups` VALUES ('267', null, '1', '11010', 'Kas Kecil', '10000', null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `gl_transactions`
-- ----------------------------
DROP TABLE IF EXISTS `gl_transactions`;
CREATE TABLE `gl_transactions` (
  `transaction_id` int(11) NOT NULL auto_increment,
  `company_code` varchar(15) character set utf8 default NULL,
  `gl_id` varchar(100) character set utf8 default NULL,
  `date_time_stamp` datetime default NULL,
  `account_id` int(11) default NULL,
  `date` datetime default NULL,
  `debit` double default NULL,
  `credit` double default NULL,
  `source` varchar(150) character set utf8 default NULL,
  `operation` varchar(150) character set utf8 default NULL,
  `custsuppbank` varchar(20) character set utf8 default NULL,
  `jurnaltype` int(11) default NULL,
  `project_code` varchar(50) character set utf8 default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `id_name` varchar(250) character set utf8 default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`transaction_id`),
  KEY `x1` (`gl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gl_transactions
-- ----------------------------
INSERT INTO `gl_transactions` VALUES ('6', null, 'a', null, '1394', '2013-08-11 00:00:00', '20000', '0', 'a', 'a', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gl_transactions` VALUES ('10', null, 'a', null, '1378', '2013-08-11 00:00:00', '90000', '0', 'a', 'a', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gl_transactions` VALUES ('11', null, 'a', null, '1375', '2013-08-11 00:00:00', '9000', '0', 'a', 'a', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gl_transactions` VALUES ('14', null, 'a', null, '1373', '2013-08-11 00:00:00', '120000', '0', 'a', 'a', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gl_transactions` VALUES ('31', null, 'a', null, '1396', '2013-08-11 00:00:00', '900', '0', 'a', 'a', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gl_transactions` VALUES ('30', null, 'b', null, '1375', '2013-08-14 00:00:00', '90000', '0', 'b', 'b', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gl_transactions` VALUES ('29', null, 'b', null, '1385', '2013-08-12 00:00:00', '0', '20000', 'c', 'b', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gl_transactions` VALUES ('32', null, 'test', null, '1373', '2013-08-15 00:00:00', '9000', '0', 'tes', 'test', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gl_transactions` VALUES ('26', null, 'b', null, '1373', '2013-08-12 00:00:00', '12000', '0', 'c', 'b', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gl_transactions` VALUES ('23', null, 'a', null, '1375', '2013-08-11 00:00:00', '0', '20000', 'a', 'a', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gl_transactions` VALUES ('24', null, 'a', null, '1373', '2013-08-11 00:00:00', '0', '20000', 'a', 'a', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gl_transactions` VALUES ('27', null, 'b', null, '1380', '2013-08-12 00:00:00', '2220000', '0', 'b', 'b', null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `gl_transactions_archive`
-- ----------------------------
DROP TABLE IF EXISTS `gl_transactions_archive`;
CREATE TABLE `gl_transactions_archive` (
  `transaction_id` int(11) default NULL,
  `company_code` varchar(15) character set utf8 default NULL,
  `gl_id` varchar(22) character set utf8 default NULL,
  `date_time_stamp` datetime default NULL,
  `account_id` int(11) default NULL,
  `date` datetime default NULL,
  `debit` double default NULL,
  `credit` double default NULL,
  `source` varchar(150) character set utf8 default NULL,
  `operation` varchar(150) character set utf8 default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gl_transactions_archive
-- ----------------------------

-- ----------------------------
-- Table structure for `inventory`
-- ----------------------------
DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory` (
  `item_number` varchar(50) character set utf8 NOT NULL,
  `active` bit(1) default NULL,
  `class` varchar(50) character set utf8 default NULL,
  `category` varchar(50) character set utf8 default NULL,
  `sub_category` varchar(50) character set utf8 default NULL,
  `picking_order` int(11) default NULL,
  `supplier_number` varchar(50) character set utf8 default NULL,
  `description` varchar(50) character set utf8 default NULL,
  `manufacturer` varchar(50) character set utf8 default NULL,
  `model` varchar(50) character set utf8 default NULL,
  `last_inventory_date` datetime default NULL,
  `cost` double default NULL,
  `cost_from_mfg` double default NULL,
  `retail` double default NULL,
  `special_features` varchar(255) default NULL,
  `item_picture` varchar(255) character set utf8 default NULL,
  `last_order_date` datetime default NULL,
  `expected_delivery` datetime default NULL,
  `lead_time` varchar(20) character set utf8 default NULL,
  `case_pack` double default NULL,
  `unit_of_measure` varchar(15) character set utf8 default NULL,
  `location` varchar(50) character set utf8 default NULL,
  `bin` varchar(50) character set utf8 default NULL,
  `weight` double default NULL,
  `weight_unit` varchar(15) character set utf8 default NULL,
  `manufacturer_item_number` varchar(50) character set utf8 default NULL,
  `upc_code` varchar(30) character set utf8 default NULL,
  `serialized` bit(1) default NULL,
  `assembly` bit(1) default NULL,
  `multiple_pricing` bit(1) default NULL,
  `multiple_warehouse` bit(1) default NULL,
  `style` bit(1) default NULL,
  `inventory_account` int(11) default NULL,
  `sales_account` int(11) default NULL,
  `cogs_account` int(11) default NULL,
  `amount_ordered` int(11) default NULL,
  `quantity_in_stock` int(11) default NULL,
  `quantity_on_back_order` int(11) default NULL,
  `quantity_on_order` int(11) default NULL,
  `reorder_point` int(11) default NULL,
  `reorder_quantity` int(11) default NULL,
  `taxable` bit(1) default NULL,
  `recordstate` int(11) default NULL,
  `gudang_1` double(11,0) default NULL,
  `gudang_2` double(11,0) default NULL,
  `gudang_3` double(11,0) default NULL,
  `gudang_4` double(11,0) default NULL,
  `gudang_5` double(11,0) default NULL,
  `gudang_6` double(11,0) default NULL,
  `gudang_7` double(11,0) default NULL,
  `gudang_8` double(11,0) default NULL,
  `gudang_9` double(11,0) default NULL,
  `gudang_10` double(11,0) default NULL,
  `total_amount` double default NULL,
  `upd_qty_asm_method` int(11) default NULL,
  `iskitchenitem` bit(1) default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `custom_field_1` varchar(50) character set utf8 default NULL,
  `custom_label_1` varchar(50) character set utf8 default NULL,
  `custom_field_2` varchar(50) character set utf8 default NULL,
  `custom_label_2` varchar(50) character set utf8 default NULL,
  `custom_field_3` varchar(50) character set utf8 default NULL,
  `custom_label_3` varchar(50) character set utf8 default NULL,
  `custom_field_4` varchar(50) character set utf8 default NULL,
  `custom_label_4` varchar(50) character set utf8 default NULL,
  `custom_field_5` varchar(50) character set utf8 default NULL,
  `custom_label_5` varchar(50) character set utf8 default NULL,
  `custom_field_6` varchar(50) character set utf8 default NULL,
  `custom_label_6` varchar(50) character set utf8 default NULL,
  `custom_field_7` varchar(50) character set utf8 default NULL,
  `custom_label_7` varchar(50) character set utf8 default NULL,
  `custom_field_8` varchar(50) character set utf8 default NULL,
  `custom_label_8` varchar(50) character set utf8 default NULL,
  `custom_field_9` varchar(50) character set utf8 default NULL,
  `custom_label_9` varchar(50) character set utf8 default NULL,
  `custom_field_10` varchar(50) character set utf8 default NULL,
  `custom_label_10` varchar(50) character set utf8 default NULL,
  `qstep1` double(11,0) default NULL,
  `qstep2` double(11,0) default NULL,
  `qstep3` double(11,0) default NULL,
  `qty_awal` double default NULL,
  `discount_percent` double default NULL,
  `allowchangeprice` bit(1) default NULL,
  `allowchangedisc` bit(1) default NULL,
  `setuptime` int(11) default NULL,
  `processtime` int(11) default NULL,
  `finishtime` int(11) default NULL,
  `linkto_product1` double default NULL,
  `linkto_product2` double default NULL,
  `linkto_product3` double default NULL,
  `komisi` double default NULL,
  `isservice` bit(1) default NULL,
  `isneedprocesstime` bit(1) default NULL,
  `pricestep1` double default NULL,
  `pricestep2` double default NULL,
  `pricestep3` double default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  `tax_account` int(11) default NULL,
  PRIMARY KEY  (`item_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory
-- ----------------------------
INSERT INTO `inventory` VALUES ('ABC', '', 'Stock Item', 'MAKANAN', '\'', '0', 'ALFAMART', 'Kopi Susu Abc', '01', '01', '2013-08-14 00:00:00', '900', '1', '1000', '1', '11', '2013-08-14 00:00:00', '2013-08-14 00:00:00', '', '1', 'PCS', '', '', '1', '1', '1', '', '', '', '', '\0', '', '1374', '1373', '0', '0', '0', '0', '0', '0', '0', '\0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '\0', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '2013-08-14 00:00:00', '', '2013-08-14 00:00:00', '', '1375');
INSERT INTO `inventory` VALUES ('SLNC', '', 'Stock Item', 'CAT', 'OBAT', '0', 'ALFAMART', 'Salonpas Cair', '0', '0', '2013-08-14 00:00:00', '4000', '0', '5000', '', '', '2013-08-14 00:00:00', '2013-08-14 00:00:00', '', '0', 'Pcs', '', '', '0', '', '', '', '\0', '\0', '\0', '\0', '\0', '1376', '1373', '0', '0', '0', '0', '0', '0', '0', '\0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '\0', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '2013-08-14 00:00:00', '', '2013-08-14 00:00:00', '', '1396');
INSERT INTO `inventory` VALUES ('DJISAMSU', '\0', 'Stock Item', 'MAKANAN', '', '0', 'ALFAMART', 'Djisamsu Kretek', '0', '0', '2013-08-15 00:00:00', '10000', '0', '12000', '', '', '2013-08-15 00:00:00', '2013-08-15 00:00:00', '', '0', 'Bks', '', '', '0', '', '', '', '\0', '\0', '\0', '\0', '\0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '\0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '\0', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '2013-08-15 00:00:00', '', '2013-08-15 00:00:00', '', '0');
INSERT INTO `inventory` VALUES ('SAMP', '', 'Stock Item', 'MAKANAN', '', '0', 'ALFAMART', 'Sampoerna Hijau', '0', '0', '2013-08-12 00:00:00', '7000', '0', '8000', '', '', '2013-08-12 00:00:00', '2013-08-12 00:00:00', '', '0', 'Bks', '', '', '0', '', '', '', '\0', '\0', '\0', '\0', '\0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '\0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '\0', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '2013-08-12 00:00:00', '', '2013-08-12 00:00:00', '', '0');
INSERT INTO `inventory` VALUES ('KOREK', '', 'Stock Item', 'MAKANAN', '', '0', 'ALFAMART', 'Korek Gas', '0', '0', '2013-08-15 00:00:00', '2000', '0', '3000', '', '', '2013-08-15 00:00:00', '2013-08-15 00:00:00', '', '0', 'Pcs', '', '', '0', '', '', '', '\0', '\0', '\0', '\0', '\0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '\0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '\0', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '2013-08-15 00:00:00', '', '2013-08-15 00:00:00', '', '0');
INSERT INTO `inventory` VALUES ('Palu', '', 'Stock Item', 'TOOLS', '0', null, 'ALFAMART', 'Palu', '0', '0', '0000-00-00 00:00:00', '20000', '0', '25000', null, null, null, null, null, null, 'Pcs', '0', '0', null, null, null, null, null, null, '\0', '\0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory` VALUES ('CD', '', 'Stock Item', 'TOOLS', '', '0', 'ALFAMART', 'CD Blank Maxel', '0', '0', '2013-07-09 00:00:00', '1000', '0', '2000', '', '', '1900-01-01 00:00:00', '1900-01-01 00:00:00', '', '0', 'Pcs', '', '', '0', '', '', '', '\0', '\0', '\0', '\0', '\0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '\0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '\0', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '2013-07-09 00:00:00', '', '2013-07-09 00:00:00', '', '0');
INSERT INTO `inventory` VALUES ('AQ001', '', 'Stock Item', 'MINUMAN', '0', null, 'ALFAMART', 'Aqua Gelas', '0', '0', null, '900', '0', '1000', null, null, null, null, null, null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory` VALUES ('TEHKO', '', 'Stock Item', 'MINUMAN', '', '0', 'ALFAMART', 'Teh Kotak', '', '', '2013-09-07 00:00:00', '0', '900', '1000', '', '', '2013-09-07 00:00:00', '2013-09-07 00:00:00', '', '0', 'Pcs', '', '', '0', '', '', '', '', '', '', '\0', '', '1419', '1415', '0', '0', '0', '0', '0', '0', '0', '\0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '\0', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '0', '0', '0', '0', '\0', '\0', '0', '0', '0', '2013-09-07 00:00:00', '', '2013-09-07 00:00:00', '', '1396');

-- ----------------------------
-- Table structure for `inventory_assembly`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_assembly`;
CREATE TABLE `inventory_assembly` (
  `item_number` varchar(50) character set utf8 default NULL,
  `assembly_item_number` varchar(50) character set utf8 default NULL,
  `comment` double default NULL,
  `quantity` int(11) default NULL,
  `update_status` int(11) default NULL,
  `default_cost` double default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  UNIQUE KEY `x1` (`item_number`,`assembly_item_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_assembly
-- ----------------------------

-- ----------------------------
-- Table structure for `inventory_beginning_balance`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_beginning_balance`;
CREATE TABLE `inventory_beginning_balance` (
  `item_number` varchar(50) character set utf8 default NULL,
  `tanggal` datetime default NULL,
  `amount_awal` double default NULL,
  `amount_trans` double default NULL,
  `amount_akhir` double default NULL,
  `qty_awal_gd1` int(11) default NULL,
  `qty_trans_gd1` int(11) default NULL,
  `qty_akhir_gd1` int(11) default NULL,
  `qty_awal_gd2` int(11) default NULL,
  `qty_trans_gd2` int(11) default NULL,
  `qty_akhir_gd2` int(11) default NULL,
  `qty_awal_gd3` int(11) default NULL,
  `qty_trans_gd3` int(11) default NULL,
  `qty_akhir_gd3` int(11) default NULL,
  `qty_awal_gd4` int(11) default NULL,
  `qty_trans_gd4` int(11) default NULL,
  `qty_akhir_gd4` int(11) default NULL,
  `qty_awal_gd5` int(11) default NULL,
  `qty_trans_gd5` int(11) default NULL,
  `qty_akhir_gd5` int(11) default NULL,
  `qty_awal_gd6` int(11) default NULL,
  `qty_trans_gd6` int(11) default NULL,
  `qty_akhir_gd6` int(11) default NULL,
  `qty_awal_gd7` int(11) default NULL,
  `qty_trans_gd7` int(11) default NULL,
  `qty_akhir_gd7` int(11) default NULL,
  `qty_awal_gd8` int(11) default NULL,
  `qty_trans_gd8` int(11) default NULL,
  `qty_akhir_gd8` int(11) default NULL,
  `qty_awal_gd9` int(11) default NULL,
  `qty_trans_gd9` int(11) default NULL,
  `qty_akhir_gd9` int(11) default NULL,
  `qty_awal_gd10` int(11) default NULL,
  `qty_trans_gd10` int(11) default NULL,
  `qty_akhir_gd10` int(11) default NULL,
  `ttlqty_awal` int(11) default NULL,
  `ttlqty_trans` int(11) default NULL,
  `ttlqty_akhir` int(11) default NULL,
  `qtyin` int(11) default NULL,
  `qtyout` int(11) default NULL,
  `amountin` double default NULL,
  `amountout` double default NULL,
  `flagawal` bit(1) default NULL,
  `hpp_awal` double default NULL,
  `hpp_akhir` double default NULL,
  `harga` double default NULL,
  `qty` double default NULL,
  `update_status` int(11) default NULL,
  UNIQUE KEY `x1` (`item_number`,`tanggal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_beginning_balance
-- ----------------------------

-- ----------------------------
-- Table structure for `inventory_card_header`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_card_header`;
CREATE TABLE `inventory_card_header` (
  `shipment_id` varchar(50) character set utf8 NOT NULL default '',
  `date_received` datetime default NULL,
  `supplier_number` varchar(50) character set utf8 default NULL,
  `warehouse_code` varchar(15) character set utf8 default NULL,
  `customer_number` varchar(50) default NULL,
  `package_no` varchar(50) default NULL,
  `cargo_type` varchar(50) default NULL,
  `container_40` varchar(50) default NULL,
  `container_20` varchar(50) default NULL,
  `total_qty` double default NULL,
  `package_style` varchar(50) default NULL,
  `ctrl_id` varchar(50) default NULL,
  `ship_to_floor` int(11) default NULL,
  `posted` int(11) default NULL,
  `comments` varchar(250) default NULL,
  `no_faktur_jual` varchar(50) character set utf8 default NULL,
  `no_do_jual` varchar(50) character set utf8 default NULL,
  `approved` int(11) default NULL,
  `putaway` int(11) default NULL,
  `receipt_type` varchar(50) default NULL,
  `amount` double default NULL,
  PRIMARY KEY  (`shipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_card_header
-- ----------------------------
INSERT INTO `inventory_card_header` VALUES ('ADJ-C0100001', '2013-05-13 00:00:00', 'andri', 'C01', null, 'stock adjustment', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ADJ', null);
INSERT INTO `inventory_card_header` VALUES ('ADJ-C0100002', '2013-05-13 00:00:00', 'Andri', 'C01', null, 'abcde', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ADJ', null);
INSERT INTO `inventory_card_header` VALUES ('ADJ-C0100003', '2013-05-13 00:00:00', 'dasfd', 'C01', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ADJ', '54900');
INSERT INTO `inventory_card_header` VALUES ('D-C0100001', '2013-05-11 00:00:00', 'ALFAMART', 'C01', null, 'dfsfa', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_card_header` VALUES ('D-C0100002', '2013-05-11 00:00:00', 'ALFAMART', 'C01', null, 'adedfasfdfsdfdsf', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_OUT', null);
INSERT INTO `inventory_card_header` VALUES ('D-C0100003', '2013-05-11 00:00:00', 'ALFAMART', 'C01', null, 'dfasdfadsf', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_OUT', null);
INSERT INTO `inventory_card_header` VALUES ('D-C0100004', '2013-05-11 00:00:00', 'Udinm', 'C01', null, 'dfasfd', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_OUT', null);
INSERT INTO `inventory_card_header` VALUES ('D-C0100005', '2013-05-13 00:00:00', 'ALFAMART', 'C01', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_OUT', null);
INSERT INTO `inventory_card_header` VALUES ('D-C0100006', '2013-05-13 00:00:00', 'dfasd', 'C01', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_OUT', null);
INSERT INTO `inventory_card_header` VALUES ('D-C0100007', '2013-05-13 00:00:00', 'GIANT', 'C01', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_OUT', null);
INSERT INTO `inventory_card_header` VALUES ('D-C0100008', '2013-05-13 00:00:00', 'GIANT', 'C01', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_OUT', null);
INSERT INTO `inventory_card_header` VALUES ('R-C0100001', '2013-05-11 00:00:00', 'ALFAMART', 'C01', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_IN', null);
INSERT INTO `inventory_card_header` VALUES ('R-C0100002', '2013-05-11 00:00:00', 'ALFAMART', 'C01', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_IN', null);
INSERT INTO `inventory_card_header` VALUES ('R-C0100003', '2013-05-11 00:00:00', 'ALFAMART', 'C01', null, 'abd', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_IN', null);
INSERT INTO `inventory_card_header` VALUES ('R-C0100004', '2013-05-11 00:00:00', 'GIANT', 'C01', null, 'dafdfasdf', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_IN', null);
INSERT INTO `inventory_card_header` VALUES ('R-C0100005', '2013-05-11 00:00:00', 'GIANT', 'C01', null, 'PKG.001', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_IN', null);
INSERT INTO `inventory_card_header` VALUES ('R-C0100006', '2013-05-13 00:00:00', 'ALFAMART', 'C01', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_IN', null);
INSERT INTO `inventory_card_header` VALUES ('R-C0100007', '2013-05-13 00:00:00', 'dd', 'C01', null, 'def', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_IN', null);
INSERT INTO `inventory_card_header` VALUES ('R-C0100008', '2013-05-13 00:00:00', 'ALFAMART', 'C01', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_IN', null);
INSERT INTO `inventory_card_header` VALUES ('R-C0100009', '2013-05-13 00:00:00', 'GIANT', 'C01', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, 'ETC_IN', null);
INSERT INTO `inventory_card_header` VALUES ('R-T0100008', '2013-05-10 00:00:00', 'ALFAMART', 'T01', null, 'a', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_card_header` VALUES ('R-T0100009', '2013-05-10 00:00:00', 'ALFAMART', 'T01', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `inventory_categories`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_categories`;
CREATE TABLE `inventory_categories` (
  `kode` varchar(50) character set utf8 NOT NULL,
  `category` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `custom_label_1` varchar(50) character set utf8 default NULL,
  `custom_label_2` varchar(50) character set utf8 default NULL,
  `custom_label_3` varchar(50) character set utf8 default NULL,
  `custom_label_4` varchar(50) character set utf8 default NULL,
  `custom_label_5` varchar(50) character set utf8 default NULL,
  `custom_label_6` varchar(50) character set utf8 default NULL,
  `custom_label_7` varchar(50) character set utf8 default NULL,
  `custom_label_8` varchar(50) character set utf8 default NULL,
  `custom_label_9` varchar(50) character set utf8 default NULL,
  `custom_label_10` varchar(50) character set utf8 default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `parent_id` varchar(50) character set utf8 default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_categories
-- ----------------------------
INSERT INTO `inventory_categories` VALUES ('MAKANAN', 'MAKANAN', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '2013-08-12 00:00:00', '', '2013-08-12 00:00:00', '');
INSERT INTO `inventory_categories` VALUES ('MINUMAN', 'MINUMAN', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '2013-08-14 00:00:00', '', '2013-08-14 00:00:00', '');
INSERT INTO `inventory_categories` VALUES ('CAT', 'CAT', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '2013-08-14 00:00:00', '', '2013-08-14 00:00:00', '');
INSERT INTO `inventory_categories` VALUES ('TOOLS', 'TOOLS', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_categories` VALUES ('MAINAN', 'MAINAN', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_categories` VALUES ('OBAT', 'OBAT', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_categories` VALUES ('PAKAIAN', 'PAKAIAN', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_categories` VALUES ('HANDPHONE', 'HANDPHONE', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '2013-09-07 00:00:00', '', '2013-09-07 00:00:00', '');
INSERT INTO `inventory_categories` VALUES ('MOBIL', 'MOBIL', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `inventory_class`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_class`;
CREATE TABLE `inventory_class` (
  `kode` varchar(50) character set utf8 default NULL,
  `class` varchar(50) character set utf8 default NULL,
  `id` int(11) NOT NULL auto_increment,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x1` (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_class
-- ----------------------------
INSERT INTO `inventory_class` VALUES ('Stock Item', 'Stock Item', '6', null, null, null);
INSERT INTO `inventory_class` VALUES ('Service', 'Service', '7', null, null, null);
INSERT INTO `inventory_class` VALUES ('Employee', 'Employee', '8', null, null, null);
INSERT INTO `inventory_class` VALUES ('Labour', 'Labour', '9', null, null, null);
INSERT INTO `inventory_class` VALUES ('Material', 'Material', '14', null, null, null);

-- ----------------------------
-- Table structure for `inventory_moving`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_moving`;
CREATE TABLE `inventory_moving` (
  `transfer_id` varchar(50) character set utf8 default NULL,
  `item_number` varchar(50) character set utf8 default NULL,
  `date_trans` datetime default NULL,
  `from_location` varchar(50) character set utf8 default NULL,
  `from_qty` int(11) default NULL,
  `to_location` varchar(50) character set utf8 default NULL,
  `to_qty` int(11) default NULL,
  `trans_by` varchar(50) character set utf8 default NULL,
  `cost` double default NULL,
  `update_status` int(11) default NULL,
  `id` int(11) NOT NULL auto_increment,
  `comments` varchar(250) character set utf8 default NULL,
  `trans_type` varchar(10) default NULL,
  `total_amount` double default NULL,
  `unit` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x1` (`transfer_id`,`item_number`,`date_trans`,`from_location`,`to_location`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_moving
-- ----------------------------
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100001', '012249832069', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '8000', null, '10', null, 'ADJ', '8000', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100001', '012249555289', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '8000', null, '9', null, 'ADJ', '8000', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100001', '012249100205', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '6500', null, '8', null, 'ADJ', '6500', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100001', '012249832069', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '8000', null, '7', null, 'ADJ', '8000', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100001', '012249832571', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '7400', null, '11', null, 'ADJ', '7400', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100001', '012249101134', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '4900', null, '15', null, 'ADJ', '4900', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100001', '012249555289', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '8000', null, '14', null, 'ADJ', '8000', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100001', ' 05021101', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '25000', null, '16', null, 'ADJ', '25000', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100003', '012249100205', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '6500', null, '17', null, 'ADJ', '6500', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100003', '012249101134', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '4900', null, '18', null, 'ADJ', '4900', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100003', '3061101', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '35500', null, '19', null, 'ADJ', '35500', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100003', '100905', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '10000', null, '20', null, 'ADJ', '10000', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100003', '012249100205', '2013-05-13 00:00:00', 'C01', '-10', null, '-10', null, '6500', null, '21', null, 'ADJ', '-65000', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100003', '11061212', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '4500', null, '22', null, 'ADJ', '4500', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100003', '11061212', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '4500', null, '23', null, 'ADJ', '4500', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100003', '11061212', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '4500', null, '24', null, 'ADJ', '4500', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100003', '11061212', '2013-05-13 00:00:00', 'C01', '1', null, '1', null, '4500', null, '25', null, 'ADJ', '4500', null);
INSERT INTO `inventory_moving` VALUES ('ADJ-C0100003', '11061212', '2013-05-13 00:00:00', 'C01', '10', null, '10', null, '4500', null, '26', null, 'ADJ', '45000', null);

-- ----------------------------
-- Table structure for `inventory_price_history`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_price_history`;
CREATE TABLE `inventory_price_history` (
  `item_number` varchar(50) character set utf8 default NULL,
  `date_changed` datetime default NULL,
  `po_or_so` varchar(50) character set utf8 default NULL,
  `sales_price` double default NULL,
  `order_price` double default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_price_history
-- ----------------------------

-- ----------------------------
-- Table structure for `inventory_prices`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_prices`;
CREATE TABLE `inventory_prices` (
  `item_number` varchar(50) character set utf8 default NULL,
  `customer_pricing_code` varchar(10) character set utf8 default NULL,
  `retail` double default NULL,
  `quantity_high` int(11) default NULL,
  `quantity_low` int(11) default NULL,
  `date_from` datetime default NULL,
  `date_to` datetime default NULL,
  `update_status` int(11) default NULL,
  UNIQUE KEY `x1` (`item_number`,`customer_pricing_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_prices
-- ----------------------------

-- ----------------------------
-- Table structure for `inventory_products`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_products`;
CREATE TABLE `inventory_products` (
  `id` int(11) NOT NULL auto_increment,
  `item_number` varchar(50) character set utf8 default NULL,
  `shipment_id` varchar(50) character set utf8 default NULL,
  `date_received` datetime default NULL,
  `cost` double default NULL,
  `supplier_number` varchar(50) character set utf8 default NULL,
  `warehouse_code` varchar(15) character set utf8 default NULL,
  `color` varchar(20) character set utf8 default NULL,
  `size` varchar(10) character set utf8 default NULL,
  `purchase_order_number` varchar(50) character set utf8 default NULL,
  `quantity_in_stock` int(11) default NULL,
  `quantity_received` int(11) default NULL,
  `total_amount` double default NULL,
  `selected` tinyint(1) default NULL,
  `other_doc_number` varchar(50) character set utf8 default NULL,
  `receipt_type` varchar(50) character set utf8 default NULL,
  `receipt_by` varchar(50) character set utf8 default NULL,
  `comments` varchar(250) default NULL,
  `production_code` varchar(50) character set utf8 default NULL,
  `unit` varchar(50) character set utf8 default NULL,
  `multi_unit` varchar(50) character set utf8 default NULL,
  `mu_qty` int(11) default NULL,
  `mu_price` double default NULL,
  `new_cost` double default NULL,
  `from_line_number` int(11) default NULL,
  `tanggal_jual` datetime default NULL,
  `no_faktur_beli` varchar(50) character set utf8 default NULL,
  `no_faktur_jual` varchar(50) character set utf8 default NULL,
  `no_do_jual` varchar(50) character set utf8 default NULL,
  `tanggal_beli` datetime default NULL,
  `no_retur_jual` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `serial_number` varchar(255) character set utf8 default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  `retail` double default NULL,
  PRIMARY KEY  (`id`),
  KEY `x1` (`item_number`,`shipment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=348 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_products
-- ----------------------------
INSERT INTO `inventory_products` VALUES ('334', 'ABC', 'EIN00001', '2013-09-07 14:03:00', '900', 'test', null, null, null, null, null, '1', null, null, null, 'etc_in', null, 'test', null, 'pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('332', 'Palu', 'EIN00001', '2013-09-07 14:01:38', '20000', 'ANDRI', null, null, null, null, null, '2', null, null, null, 'etc_in', null, 'TEST', null, 'pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('335', 'CD', 'EIN00002', '2013-09-07 14:06:34', '1000', 'test', null, null, null, null, null, '1', null, null, null, 'etc_in', null, 'test', null, 'pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('310', 'SAMP', 'TRM00207', '2013-08-16 00:00:00', '7000', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '100', '700000', null, null, 'PO', '', '', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('309', 'DJISAMSU', 'TRM00207', '2013-08-16 00:00:00', '10000', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '100', '1000000', null, null, 'PO', '', '', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('308', 'DJISAMSU', 'TRM00207', '2013-08-16 00:00:00', '10000', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '1', '10000', null, null, 'PO', '', '', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('307', 'AQ001', 'TRM00207', '2013-08-16 00:00:00', '900', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '1', '900', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('319', 'SAMP', 'TRM00208', '2013-08-17 00:00:00', '7000', 'ALFAMART', 'Medan', null, null, 'PO00108', null, '100', '700000', null, null, 'PO', '', '', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('317', 'DJISAMSU', 'TRM00208', '2013-08-17 00:00:00', '10000', 'ALFAMART', 'Medan', null, null, 'PO00108', null, '1', '10000', null, null, 'PO', '', '', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('313', 'KOREK', 'TRM00208', '2013-08-17 00:00:00', '2000', 'ALFAMART', 'Medan', null, null, 'PO00108', null, '100', '200000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('347', 'SAMP', 'TRM00212', '2013-09-07 07:00:00', '7000', 'ALFAMART', 'Ambon', null, null, 'PO00108', null, '100', '700000', null, null, 'PO', 'test', 'Test', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('346', 'DJISAMSU', 'TRM00212', '2013-09-07 07:00:00', '10000', 'ALFAMART', 'Ambon', null, null, 'PO00108', null, '100', '1000000', null, null, 'PO', 'test', 'Test', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('341', 'KOREK', 'TRM00212', '2013-09-07 07:00:00', '2000', 'ALFAMART', 'Ambon', null, null, 'PO00108', null, '100', '200000', null, null, 'PO', 'test', 'Test', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('342', 'Palu', 'TRM00212', '2013-09-07 07:00:00', '20000', 'ALFAMART', 'Ambon', null, null, 'PO00108', null, '10', '200000', null, null, 'PO', 'test', 'Test', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('107', ' 05021101', 'ADJ-C0100001', '2013-05-13 00:00:00', '25000', 'andri', 'C01', null, null, null, null, '1', '25000', null, null, 'ADJ', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('108', ' 05021101', 'ADJ-C0100001', '2013-05-13 00:00:00', '25000', 'andri', 'C01', null, null, null, null, '1', '25000', null, null, 'ADJ', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('109', ' 05021101', 'ADJ-C0100001', '2013-05-13 00:00:00', '25000', 'andri', 'C01', null, null, null, null, '1', '25000', null, null, 'ADJ', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('318', 'DJISAMSU', 'TRM00208', '2013-08-17 00:00:00', '10000', 'ALFAMART', 'Medan', null, null, 'PO00108', null, '100', '1000000', null, null, 'PO', '', '', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('316', 'AQ001', 'TRM00208', '2013-08-17 00:00:00', '900', 'ALFAMART', 'Medan', null, null, 'PO00108', null, '1', '900', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('315', 'AQ001', 'TRM00208', '2013-08-17 00:00:00', '900', 'ALFAMART', 'Medan', null, null, 'PO00108', null, '1', '900', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('314', 'Palu', 'TRM00208', '2013-08-17 00:00:00', '20000', 'ALFAMART', 'Medan', null, null, 'PO00108', null, '10', '200000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('345', 'DJISAMSU', 'TRM00212', '2013-09-07 07:00:00', '10000', 'ALFAMART', 'Ambon', null, null, 'PO00108', null, '1', '10000', null, null, 'PO', 'test', 'Test', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('344', 'AQ001', 'TRM00212', '2013-09-07 07:00:00', '900', 'ALFAMART', 'Ambon', null, null, 'PO00108', null, '1', '900', null, null, 'PO', 'test', 'Test', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('343', 'AQ001', 'TRM00212', '2013-09-07 07:00:00', '900', 'ALFAMART', 'Ambon', null, null, 'PO00108', null, '1', '900', null, null, 'PO', 'test', 'Test', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('324', 'AQ001', 'TRM00209', '2013-08-17 00:00:00', '900', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '1', '900', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('325', 'AQ001', 'TRM00209', '2013-08-17 00:00:00', '900', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '1', '900', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('323', 'Palu', 'TRM00209', '2013-08-17 00:00:00', '20000', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '10', '200000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('339', 'SLNC', 'TRM00212', '2013-09-07 07:00:00', '4000', 'ALFAMART', 'Ambon', null, null, 'PO00108', null, '100', '400000', null, null, 'PO', 'test', 'Test', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('338', 'ABC', 'EIN00003', '2013-09-07 14:13:53', '900', 'dda', null, null, null, null, null, '0', null, null, null, 'etc_in', null, 'dd', null, 'pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('322', 'KOREK', 'TRM00209', '2013-08-17 00:00:00', '2000', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '100', '200000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('321', 'AQ001', 'TRM00209', '2013-08-17 00:00:00', '900', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '100', '90000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('104', '       8999099918278', 'ADJ-C0100001', '2013-05-13 00:00:00', '47500', 'andri', 'C01', null, null, null, null, '1', '47500', null, null, 'ADJ', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('105', '  05021103', 'ADJ-C0100001', '2013-05-13 00:00:00', '8500', 'andri', 'C01', null, null, null, null, '1', '8500', null, null, 'ADJ', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('106', '  05021103', 'ADJ-C0100001', '2013-05-13 00:00:00', '8500', 'andri', 'C01', null, null, null, null, '1', '8500', null, null, 'ADJ', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('192', 'SAMP', 'TRM00191', '2013-08-16 00:00:00', '7000', 'ALFAMART', 'Jakarta', null, null, 'PO00097', null, '2', '14000', null, null, 'PO', '', '', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('110', ' 05021101', 'ADJ-C0100001', '2013-05-13 00:00:00', '25000', 'andri', 'C01', null, null, null, null, '1', '25000', null, null, 'ADJ', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('340', 'AQ001', 'TRM00212', '2013-09-07 07:00:00', '900', 'ALFAMART', 'Ambon', null, null, 'PO00108', null, '100', '90000', null, null, 'PO', 'test', 'Test', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('311', 'SLNC', 'TRM00208', '2013-08-17 00:00:00', '4000', 'ALFAMART', 'Medan', null, null, 'PO00108', null, '100', '400000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('312', 'AQ001', 'TRM00208', '2013-08-17 00:00:00', '900', 'ALFAMART', 'Medan', null, null, 'PO00108', null, '100', '90000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('337', 'ABC', 'DOX00007', '2013-09-07 14:12:49', '900', 'aa', null, null, null, null, null, '1', null, null, null, 'etc_out', null, 'aaa', null, 'PCS', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('336', 'CD', 'DOX00007', '2013-09-07 14:12:49', '1000', 'aa', null, null, null, null, null, '1', null, null, null, 'etc_out', null, 'aaa', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('111', '       8999099918278', 'ADJ-C0100001', '2013-05-13 00:00:00', '47500', 'andri', 'C01', null, null, null, null, '1', '47500', null, null, 'ADJ', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('327', 'DJISAMSU', 'TRM00209', '2013-08-17 00:00:00', '10000', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '100', '1000000', null, null, 'PO', '', '', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('328', 'SAMP', 'TRM00209', '2013-08-17 00:00:00', '7000', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '100', '700000', null, null, 'PO', '', '', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('326', 'DJISAMSU', 'TRM00209', '2013-08-17 00:00:00', '10000', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '1', '10000', null, null, 'PO', '', '', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('333', 'DJISAMSU', 'EIN00001', '2013-09-07 14:02:40', '10000', 'ANDRI', null, null, null, null, null, '1', null, null, null, 'etc_in', null, 'TEST', null, 'pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('320', 'SLNC', 'TRM00209', '2013-08-17 00:00:00', '4000', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '100', '400000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('306', 'AQ001', 'TRM00207', '2013-08-16 00:00:00', '900', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '1', '900', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('305', 'Palu', 'TRM00207', '2013-08-16 00:00:00', '20000', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '10', '200000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('303', 'AQ001', 'TRM00207', '2013-08-16 00:00:00', '900', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '100', '90000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('304', 'KOREK', 'TRM00207', '2013-08-16 00:00:00', '2000', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '100', '200000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('302', 'SLNC', 'TRM00207', '2013-08-16 00:00:00', '4000', 'ALFAMART', 'Purwakarta', null, null, 'PO00108', null, '100', '400000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('191', 'SLNC', 'TRM00191', '2013-08-16 00:00:00', '4000', 'ALFAMART', 'Jakarta', null, null, 'PO00097', null, '12', '48000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('190', 'DJISAMSU', 'TRM00191', '2013-08-16 00:00:00', '10000', 'ALFAMART', 'Jakarta', null, null, 'PO00097', null, '2', '20000', null, null, 'PO', '', '', null, 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('188', 'AQ001', 'TRM00191', '2013-08-16 00:00:00', '900', 'ALFAMART', 'Jakarta', null, null, 'PO00097', null, '1', '900', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `inventory_products` VALUES ('189', 'CD', 'TRM00191', '2013-08-16 00:00:00', '1000', 'ALFAMART', 'Jakarta', null, null, 'PO00097', null, '1', '1000', null, null, 'PO', '', '', null, 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `inventory_promotion`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_promotion`;
CREATE TABLE `inventory_promotion` (
  `kode` varchar(20) character set utf8 NOT NULL,
  `datefrom` datetime default NULL,
  `dateto` datetime default NULL,
  `discpercent` int(11) default NULL,
  `nominal` double default NULL,
  `keterangan` varchar(200) character set utf8 default NULL,
  `promotype` varchar(10) character set utf8 default NULL,
  `sundayprc` double(11,0) default NULL,
  `mondayprc` double(11,0) default NULL,
  `tuesdayprc` double(11,0) default NULL,
  `wednesdayprc` double(11,0) default NULL,
  `thursdayprc` double(11,0) default NULL,
  `fridayprc` double(11,0) default NULL,
  `saturdayprc` double(11,0) default NULL,
  `active` bit(1) default NULL,
  `update_status` double(11,0) default NULL,
  PRIMARY KEY  (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_promotion
-- ----------------------------

-- ----------------------------
-- Table structure for `inventory_sales_disc`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_sales_disc`;
CREATE TABLE `inventory_sales_disc` (
  `item_number` varchar(50) character set utf8 default NULL,
  `category` varchar(50) character set utf8 default NULL,
  `datefrom` datetime default NULL,
  `timefrom` datetime default NULL,
  `sunday` double(11,0) default NULL,
  `monday` double(11,0) default NULL,
  `tuesday` double(11,0) default NULL,
  `wednesday` double(11,0) default NULL,
  `thursday` double(11,0) default NULL,
  `friday` double(11,0) default NULL,
  `saturday` double(11,0) default NULL,
  `update_status` double(11,0) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_sales_disc
-- ----------------------------

-- ----------------------------
-- Table structure for `inventory_serialized_items`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_serialized_items`;
CREATE TABLE `inventory_serialized_items` (
  `item_number` varchar(50) character set utf8 default NULL,
  `shipment_id` varchar(50) character set utf8 default NULL,
  `serial_number` varchar(50) character set utf8 default NULL,
  `date_received` datetime default NULL,
  `comment` varchar(50) character set utf8 default NULL,
  `date_activated` datetime default NULL,
  `date_expired` datetime default NULL,
  `status` int(11) default NULL,
  `month_guaranted` int(11) default NULL,
  `tanggal_jual` datetime default NULL,
  `no_faktur_beli` varchar(50) character set utf8 default NULL,
  `no_faktur_jual` varchar(50) character set utf8 default NULL,
  `no_do_jual` varchar(50) character set utf8 default NULL,
  `tanggal_beli` datetime default NULL,
  `no_retur_beli` varchar(50) character set utf8 default NULL,
  `no_retur_jual` varchar(50) character set utf8 default NULL,
  `id` int(11) NOT NULL auto_increment,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x1` (`item_number`,`serial_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_serialized_items
-- ----------------------------

-- ----------------------------
-- Table structure for `inventory_suppliers`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_suppliers`;
CREATE TABLE `inventory_suppliers` (
  `item_number` varchar(50) character set utf8 default NULL,
  `supplier_number` varchar(50) character set utf8 default NULL,
  `supplier_item_number` varchar(50) character set utf8 default NULL,
  `lead_time` varchar(20) character set utf8 default NULL,
  `cost` double default NULL,
  `update_status` int(11) default NULL,
  UNIQUE KEY `x1` (`item_number`,`supplier_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_suppliers
-- ----------------------------

-- ----------------------------
-- Table structure for `inventory_warehouse`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_warehouse`;
CREATE TABLE `inventory_warehouse` (
  `item_number` varchar(50) character set utf8 default NULL,
  `warehouse_code` varchar(50) character set utf8 default NULL,
  `quantity` int(11) default NULL,
  `reorderlevel` int(11) default NULL,
  `lastorderdate` datetime default NULL,
  `lastorderqty` int(11) default NULL,
  `whtype` int(11) default NULL,
  `update_status` int(11) default NULL,
  `unit` varchar(50) character set utf8 default NULL,
  `max_qty` int(11) default NULL,
  `opening_qty` int(11) default NULL,
  `trx_qty` int(11) default NULL,
  `ending_qty` int(11) default NULL,
  `price` double default NULL,
  `discount` int(11) default NULL,
  `topten` int(11) default NULL,
  `id` int(11) NOT NULL auto_increment,
  `sc_able` bit(1) default NULL,
  `tax_abcle` bit(1) default NULL,
  `ignore_qty_check` bit(1) default NULL,
  `sales_commision_percent` bit(1) default NULL,
  `cost` double default NULL,
  `manufacturer` varchar(50) character set utf8 default NULL,
  `model` varchar(50) character set utf8 default NULL,
  `qstep1` int(11) default NULL,
  `pricestep1` double default NULL,
  `qstep2` int(11) default NULL,
  `pricestep2` double default NULL,
  `qstep3` int(11) default NULL,
  `pricestep3` double default NULL,
  `minprice` double default NULL,
  `matrix` int(11) default NULL,
  `description` varchar(250) character set utf8 default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x1` (`item_number`,`warehouse_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_warehouse
-- ----------------------------

-- ----------------------------
-- Table structure for `inventorysource`
-- ----------------------------
DROP TABLE IF EXISTS `inventorysource`;
CREATE TABLE `inventorysource` (
  `item_number` varchar(50) character set utf8 default NULL,
  `description` varchar(100) character set utf8 default NULL,
  `unit_of_measure` varchar(15) character set utf8 default NULL,
  `quantity_in_stock` int(11) default NULL,
  `cost` double default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventorysource
-- ----------------------------

-- ----------------------------
-- Table structure for `invoice`
-- ----------------------------
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `invoice_number` varchar(20) character set utf8 NOT NULL,
  `invoice_type` varchar(1) character set utf8 default NULL,
  `sales_order_number` varchar(22) character set utf8 default NULL,
  `type_of_invoice` varchar(50) character set utf8 default NULL,
  `account_id` int(11) default NULL,
  `sold_to_customer` varchar(50) character set utf8 default NULL,
  `ship_to_customer` varchar(50) character set utf8 default NULL,
  `invoice_date` datetime default NULL,
  `your_order__` varchar(20) character set utf8 default NULL,
  `source_of_order` varchar(50) character set utf8 default NULL,
  `payment_terms` varchar(20) character set utf8 default NULL,
  `salesman` varchar(30) character set utf8 default NULL,
  `fob` varchar(20) character set utf8 default NULL,
  `shipped_via` varchar(20) character set utf8 default NULL,
  `tax` double default NULL,
  `tax_2` double default NULL,
  `freight` double default NULL,
  `discount` double default NULL,
  `other` double default NULL,
  `paid` int(1) default NULL,
  `comments` varchar(250) default NULL,
  `sales_tax_code` varchar(10) character set utf8 default NULL,
  `sales_tax_percent` double(11,0) default NULL,
  `sales_tax2_code` varchar(10) character set utf8 default NULL,
  `sales_tax_percent_2` double(11,0) default NULL,
  `posted` int(1) default NULL,
  `posting_gl_id` varchar(20) character set utf8 default NULL,
  `batch_post` int(1) default NULL,
  `finance_charge` int(1) default NULL,
  `department` varchar(50) character set utf8 default NULL,
  `truck` varchar(50) character set utf8 default NULL,
  `capacity` varchar(50) character set utf8 default NULL,
  `printed` int(1) default NULL,
  `payment` varchar(50) character set utf8 default NULL,
  `insurance` varchar(50) character set utf8 default NULL,
  `packing` varchar(50) character set utf8 default NULL,
  `discount_2` double(11,0) default NULL,
  `discount_3` double(11,0) default NULL,
  `print_counter` int(11) default NULL,
  `uang_muka` double default NULL,
  `saldo_invoice` double default NULL,
  `amount` double default NULL,
  `disc_amount_1` double default NULL,
  `disc_amount_2` double default NULL,
  `disc_amount_3` double default NULL,
  `total_amount` double default NULL,
  `audit_status` varchar(50) character set utf8 default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `ppn_amount` double default NULL,
  `do_invoiced` int(1) default NULL,
  `your_order_date` datetime default NULL,
  `disc_amount` double default NULL,
  `sales_name` varchar(50) character set utf8 default NULL,
  `promosi_code` varchar(50) character set utf8 default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  `no_so_text` varchar(200) character set utf8 default NULL,
  `no_po_text` varchar(200) character set utf8 default NULL,
  `currency_code` varchar(50) default NULL,
  `currency_rate` double default NULL,
  `warehouse_code` varchar(50) default NULL,
  `subtotal` double default NULL,
  `due_date` datetime default NULL,
  PRIMARY KEY  (`invoice_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of invoice
-- ----------------------------
INSERT INTO `invoice` VALUES ('PJL00101', 'I', '', '', '0', 'C102', '', '2013-08-28 00:00:00', '', '', 'Kredit 30 Hari', 'Andri', '', '', '0', '0', '0', '0', '0', '1', '', '', '0', '', '0', '0', '', '0', '0', '', '', '', '0', '', '', '', '0', '0', '0', '0', '0', '109000', '0', '0', '0', '0', '', '', '0', '0', '0', '2013-08-28 00:00:00', '0', '', '', '2013-08-28 00:00:00', '', '2013-08-28 00:00:00', '', '', '', '', '0', '', '0', '2013-08-28 00:00:00');
INSERT INTO `invoice` VALUES ('SJ00003', 'D', '', '', '0', 'C102', '', '2013-08-21 00:00:00', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', '0', '', '0', '0', '', '', '', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '2013-08-21 00:00:00', '0', '', '', '2013-08-21 00:00:00', '', '2013-08-21 00:00:00', '', '', '', '', '0', '', '0', '2013-08-21 00:00:00');
INSERT INTO `invoice` VALUES ('SJ00005', 'D', 'SO00065', '', '0', 'C102', '', '2013-09-02 23:26:43', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', '0', '', '0', '0', '', '', '', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '2013-09-03 00:00:00', '0', '', '', '2013-09-03 00:00:00', '', '2013-09-03 00:00:00', '', '', '', '', '0', '', '0', '2013-09-02 07:00:00');
INSERT INTO `invoice` VALUES ('PJL00100', 'I', '', '', '0', 'C102', '', '2013-08-21 00:00:00', '', '', 'Kredit 30 Hari', 'Ucok', '', '', '0', '0', '0', '0', '0', '1', '', '', '0', '', '0', '0', '', '0', '0', '', '', '', '0', '', '', '', '0', '0', '0', '0', '0', '16000', '0', '0', '0', '0', '', '', '0', '0', '0', '2013-08-21 00:00:00', '0', '', '', '2013-08-21 00:00:00', '', '2013-08-21 00:00:00', '', '', '', '', '0', '', '0', '2013-08-21 00:00:00');
INSERT INTO `invoice` VALUES ('JRE00016', 'R', 'P-C0100005', null, null, null, null, '2013-08-25 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '10000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice` VALUES ('PJL00096', 'I', null, null, null, '12019', null, '2013-05-10 00:00:00', null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '7000', '7000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'C01', null, null);
INSERT INTO `invoice` VALUES ('PJL00102', 'I', '', '', '0', 'C102', '', '2013-08-29 00:00:00', '', '', 'Kredit 30 Hari', 'Andri', '', '', '0', '0', '0', '0', '0', '1', '', '', '0', '', '0', '0', '', '0', '0', '', '', '', '0', '', '', '', '0', '0', '0', '0', '0', '2000', '0', '0', '0', '0', '', '', '0', '0', '0', '2013-08-29 00:00:00', '0', '', '', '2013-08-29 00:00:00', '', '2013-08-29 00:00:00', '', '', '', '', '0', '', '0', '2013-08-29 00:00:00');
INSERT INTO `invoice` VALUES ('SJ00001', 'D', '', '', '0', 'C102', '', '2013-08-21 00:00:00', '', '', 'Kredit15 hari', 'Dian', '', '', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', '0', '', '0', '0', '', '', '', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '2013-08-21 00:00:00', '0', '', '', '2013-08-21 00:00:00', '', '2013-08-21 00:00:00', '', '', '', '', '0', '', '0', '2013-08-21 00:00:00');
INSERT INTO `invoice` VALUES ('PJL00089', 'I', null, null, null, '12019', null, '2013-05-09 00:00:00', null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '82000', '82000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice` VALUES ('PJL00090', 'I', null, null, null, '12019', null, '2013-05-09 00:00:00', null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '86000', '86000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice` VALUES ('PJL00088', 'I', null, null, null, '12019', null, '2013-05-09 00:00:00', null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '85000', '85000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice` VALUES ('SJ00004', 'D', 'SO00062', '', '0', '12019', '', '2013-09-02 23:22:56', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', '0', '', '0', '0', '', '', '', '0', '', '', '', '0', '0', '0', '0', '0', '12000', '0', '0', '0', '0', '', '', '0', '0', '0', '2013-09-02 00:00:00', '0', '', '', '2013-09-02 00:00:00', '', '2013-09-02 00:00:00', '', '', '', '', '0', '', '0', '2013-09-02 07:00:00');
INSERT INTO `invoice` VALUES ('PJL00087', 'I', null, null, null, '12019', null, '2013-05-09 00:00:00', null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '18000', '18000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice` VALUES ('PJL00086', 'I', null, null, null, '12019', null, '2013-05-09 00:00:00', null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '28000', '28000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice` VALUES ('SJ00002', 'D', '', '', '0', 'C102', '', '2013-08-21 00:00:00', '', '', 'Kredit 30 Hari', 'Dian', '', '', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', '0', '', '0', '0', '', '', '', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '2013-08-21 00:00:00', '0', '', '', '2013-08-21 00:00:00', '', '2013-08-21 00:00:00', '', '', '', '', '0', '', '0', '2013-08-21 00:00:00');

-- ----------------------------
-- Table structure for `invoice_delivery_order_info`
-- ----------------------------
DROP TABLE IF EXISTS `invoice_delivery_order_info`;
CREATE TABLE `invoice_delivery_order_info` (
  `id` int(11) NOT NULL auto_increment,
  `do_number` varchar(50) character set utf8 default NULL,
  `reason_type` varchar(50) character set utf8 default NULL,
  `reason_date` datetime default NULL,
  `comments` varchar(250) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of invoice_delivery_order_info
-- ----------------------------

-- ----------------------------
-- Table structure for `invoice_lineitems`
-- ----------------------------
DROP TABLE IF EXISTS `invoice_lineitems`;
CREATE TABLE `invoice_lineitems` (
  `invoice_number` varchar(50) character set utf8 default NULL,
  `line_number` int(11) NOT NULL auto_increment,
  `item_number` varchar(50) character set utf8 default NULL,
  `quantity` double(11,0) default NULL,
  `unit` varchar(15) character set utf8 default NULL,
  `description` varchar(255) character set utf8 default NULL,
  `price` double(11,2) default NULL,
  `discount` double(11,2) default NULL,
  `taxable` bit(1) default NULL,
  `shipped` bit(1) default NULL,
  `ship_date` datetime default NULL,
  `ship_qty` double(11,0) default NULL,
  `bo_qty` double(11,0) default NULL,
  `serial_number` varchar(255) character set utf8 default NULL,
  `job_reference` varchar(50) character set utf8 default NULL,
  `comments` double default NULL,
  `cost` double default NULL,
  `color` varchar(20) character set utf8 default NULL,
  `size` varchar(10) character set utf8 default NULL,
  `warehouse_code` varchar(15) character set utf8 default NULL,
  `revenue_acct_id` int(11) default NULL,
  `amount` double default NULL,
  `currency_code` varchar(50) character set utf8 default NULL,
  `currency_rate` double default NULL,
  `discount_amount` double default NULL,
  `quality` varchar(50) character set utf8 default NULL,
  `packing_material` varchar(50) character set utf8 default NULL,
  `multi_unit` varchar(25) character set utf8 default NULL,
  `mu_qty` double(11,0) default NULL,
  `mu_harga` double default NULL,
  `forex_price` double default NULL,
  `base_curr_amount` double default NULL,
  `disc_2` double(11,0) default NULL,
  `disc_amount_2` double default NULL,
  `disc_3` double(11,0) default NULL,
  `disc_amount_3` double default NULL,
  `update_status` int(11) default NULL,
  `ppn_amount` double default NULL,
  `nett_amount` double default NULL,
  `from_line_number` double default NULL,
  `from_line_type` varchar(50) character set utf8 default NULL,
  `from_line_doc` varchar(50) character set utf8 default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `discount_addition` int(11) default NULL,
  `printcount` int(11) default NULL,
  `tax_amount` double default NULL,
  `sales_comm_percent` int(11) default NULL,
  `sales_comm_amount` double default NULL,
  `employee_id` varchar(50) character set utf8 default NULL,
  `line_order_type` varchar(50) character set utf8 default NULL,
  `start_time` datetime default NULL,
  `duration_minute` int(11) default NULL,
  `promo` varchar(50) character set utf8 default NULL,
  `coa1` int(11) default NULL,
  `coa2` int(11) default NULL,
  `coa3` int(11) default NULL,
  `coa4` int(11) default NULL,
  `coa5` int(11) default NULL,
  `coa1amt` double default NULL,
  `coa2amt` double default NULL,
  `coa3amt` double default NULL,
  `coa4amt` double default NULL,
  `coa5amt` double default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  `sc_amount` double default NULL,
  PRIMARY KEY  (`line_number`)
) ENGINE=MyISAM AUTO_INCREMENT=435 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of invoice_lineitems
-- ----------------------------
INSERT INTO `invoice_lineitems` VALUES ('PJL00086', '181', 'ABC', '1', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00086', '182', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00086', '183', 'SAMP', '1', 'Bks', 'Sampoerna Hijau', '8000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00086', '184', 'SLNC', '1', 'Pcs', 'SALON PAS CAIR', '5000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '5000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00086', '185', 'ABC', '2', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00087', '186', 'KOREK', '1', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00087', '187', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00087', '188', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00087', '189', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00088', '190', 'SAMP', '1', 'Bks', 'Sampoerna Hijau', '8000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00088', '191', 'Palu', '1', 'Pcs', 'Palu', '25000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '25000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00088', '192', 'KOREK', '1', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00088', '193', 'SAMP', '1', 'Bks', 'Sampoerna Hijau', '8000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00088', '194', 'Palu', '1', 'Pcs', 'Palu', '25000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '25000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00088', '195', 'KOREK', '1', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00088', '196', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00088', '197', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00089', '198', 'SLNC', '1', 'Pcs', 'SALON PAS CAIR', '5000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '5000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00089', '199', 'Palu', '1', 'Pcs', 'Palu', '25000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '25000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00089', '200', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00089', '201', 'CD', '20', 'Pcs', 'CD Blank Maxel', '2000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '40000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00090', '202', 'DJISAMSU', '5', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '60000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00090', '203', 'Palu', '1', 'Pcs', 'Palu', '25000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '25000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00090', '204', 'ABC', '1', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('JRE00016', '426', 'SLNC', '1', 'Pcs', 'Salonpas Cair', '5000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '5000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('JRE00016', '425', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00096', '224', 'SLNC', '1', 'Pcs', 'SALON PAS CAIR', '5000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '5000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00096', '225', 'ABC', '1', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00096', '226', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00100', '412', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00102', '428', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00102', '429', 'ABC', '1', 'PCS', 'Kopi Susu Abc', '1000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00101', '430', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00101', '431', 'KOREK', '1', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00101', '432', 'SLNC', '1', 'Pcs', 'Salonpas Cair', '5000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '5000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('SJ00004', '433', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('JRE00016', '423', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('JRE00016', '424', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('SJ00005', '434', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES (null, '306', 'ABC', '1', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES (null, '307', 'KOREK', '1', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800003', '317', 'ABC', '12', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800003', '318', 'KOREK', '12', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '36000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800003', '319', 'SAMP', '12', 'Bks', 'Sampoerna Hijau', '8000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '96000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800004', '320', 'ABC', '12', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800004', '321', 'KOREK', '12', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '36000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800004', '322', 'SAMP', '12', 'Bks', 'Sampoerna Hijau', '8000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '96000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800005', '323', 'ABC', '12', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800005', '324', 'KOREK', '12', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '36000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800005', '325', 'SAMP', '12', 'Bks', 'Sampoerna Hijau', '8000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '96000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800006', '326', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%201', '327', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%201', '328', 'dfasdfdsf', '2', '', 'dfsadfsdaf', '0.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%201', '329', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%201', '330', 'dfasdfdsf', '2', '', 'dfsadfsdaf', '0.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%201', '331', 'AQ001', '12', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%201', '332', 'DJISAMSU', '13', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '156000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%201', '333', 'AQ001', '15', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%201', '334', 'DJISAMSU', '14', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '168000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%201', '335', 'KOREK', '14', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '42000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%201', '336', 'SAMP', '12', 'Bks', 'Sampoerna Hijau', '8000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '96000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%203', '337', 'DJISAMSU', '4', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '48000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%203', '338', 'ABC', '6', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '6000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%203', '339', 'KOREK', '2', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '6000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%203', '340', 'AQ001', '9', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '9000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%203', '341', 'DJISAMSU', '12', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '144000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%203', '342', 'DJISAMSU', '12', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '144000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%203', '343', 'ABC', '2', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%203', '344', 'AQ001', '5', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '5000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%203', '345', 'ABC', '5', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '5000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%202', '346', 'ABC', '2', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%202', '347', 'KOREK', '5', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%202', '348', 'ABC', '2', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%203', '349', 'DJISAMSU', '5', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '60000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%203', '350', 'KOREK', '5', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%201', '351', 'ABC', '13', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '13000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%201', '352', 'ABC', '1', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%201', '353', 'ABC', '2', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%203', '354', 'ABC', '2', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%202', '355', 'ABC', '2', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('Meja%202', '356', 'ABC', '2', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800013', '357', 'ABC', '1', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800013', '358', 'KOREK', '2', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '6000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800011', '359', 'ABC', '3', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800011', '360', 'KOREK', '2', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '6000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800013', '361', 'KOREK', '3', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '9000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800011', '362', 'SAMP', '3', 'Bks', 'Sampoerna Hijau', '8000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '24000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800013', '363', 'ABC', '2', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800013', '364', 'ABC', '2', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800011', '365', 'KOREK', '2', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '6000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800012', '366', 'ABC', '2', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800012', '367', 'DJISAMSU', '2', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '24000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800012', '368', 'KOREK', '2', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '6000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800012', '369', 'SAMP', '2', 'Bks', 'Sampoerna Hijau', '8000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '16000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800013', '370', 'ABC', '2', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00100', '411', 'ABC', '1', 'PCS', 'Kopi Susu Abc', '1000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00100', '410', 'KOREK', '1', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00100', '409', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800013', '376', 'KOREK', '1', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00100', '408', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800017', '377', 'ABC', '3', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800017', '378', 'KOREK', '24', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '72000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800017', '379', 'SAMP', '1', 'Bks', 'Sampoerna Hijau', '8000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800016', '380', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800016', '381', 'ABC', '2', 'PCS', 'KOPI SUSU ABC', '1000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800016', '382', 'KOREK', '2', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '6000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('T800016', '383', 'SAMP', '2', 'Bks', 'Sampoerna Hijau', '8000.00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '16000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('SJ00003', '407', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('SJ00003', '406', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('SJ00002', '405', 'KOREK', '1', 'Pcs', 'Korek Gas', '3000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('SJ00002', '404', 'ABC', '1', 'PCS', 'Kopi Susu Abc', '1000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES (null, '388', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('SJ00002', '403', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('SJ00001', '402', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('SJ00001', '401', 'ABC', '1', 'PCS', 'Kopi Susu Abc', '1000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00100', '400', 'SLNC', '1', 'Pcs', 'Salonpas Cair', '5000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '5000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00100', '399', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `invoice_lineitems` VALUES ('PJL00101', '427', 'AQ001', '100', 'Pcs', 'Aqua Gelas', '1000.00', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '100000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `invoice_serialized_items`
-- ----------------------------
DROP TABLE IF EXISTS `invoice_serialized_items`;
CREATE TABLE `invoice_serialized_items` (
  `id` int(11) NOT NULL auto_increment,
  `invoice_number` varchar(50) character set utf8 default NULL,
  `item_number` varchar(50) character set utf8 default NULL,
  `serial_number` varchar(50) character set utf8 default NULL,
  `month_guaranted` int(11) default NULL,
  `date_activated` datetime default NULL,
  `date_expired` datetime default NULL,
  `comments` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of invoice_serialized_items
-- ----------------------------

-- ----------------------------
-- Table structure for `invoice_shipment`
-- ----------------------------
DROP TABLE IF EXISTS `invoice_shipment`;
CREATE TABLE `invoice_shipment` (
  `id` int(11) NOT NULL auto_increment,
  `invoice_number` varchar(50) character set utf8 default NULL,
  `expeditur` varchar(50) character set utf8 default NULL,
  `jenis_kendaraan` varchar(50) character set utf8 default NULL,
  `nomor_polisi` varchar(50) character set utf8 default NULL,
  `nama_sopir` varchar(50) character set utf8 default NULL,
  `tujuan` varchar(50) character set utf8 default NULL,
  `jumlah_do_induk` int(11) default NULL,
  `qty_do_before` double(11,0) default NULL,
  `qty_do_current` double(11,0) default NULL,
  `qty_do_after` double(11,0) default NULL,
  `tanggal_do_induk` datetime default NULL,
  `nomor_do_induk` varchar(50) character set utf8 default NULL,
  `custkirim_nama` varchar(255) character set utf8 default NULL,
  `custkirim_address1` varchar(255) character set utf8 default NULL,
  `custkirim_address2` varchar(255) character set utf8 default NULL,
  `custkirim_address3` varchar(255) character set utf8 default NULL,
  `custkirim_address4` varchar(255) character set utf8 default NULL,
  `custkirim_address5` varchar(255) character set utf8 default NULL,
  `custterima_nama` varchar(255) character set utf8 default NULL,
  `custterima_address1` varchar(255) character set utf8 default NULL,
  `custterima_address2` varchar(255) character set utf8 default NULL,
  `custterima_address3` varchar(255) character set utf8 default NULL,
  `custterima_address4` varchar(255) character set utf8 default NULL,
  `custterima_address5` varchar(255) character set utf8 default NULL,
  `kota_asal` varchar(50) character set utf8 default NULL,
  `kota_tujuan` varchar(50) character set utf8 default NULL,
  `customer_pengirim` varchar(50) character set utf8 default NULL,
  `customer_penerima` varchar(50) character set utf8 default NULL,
  `kode_rute` varchar(50) character set utf8 default NULL,
  `tagihan_untuk` int(11) default NULL,
  `biaya_dokumen` double default NULL,
  `biaya_pengepakan` double default NULL,
  `biaya_lain` double default NULL,
  `nomor_surat_jalan` double default NULL,
  `nomor_voucher_kas` double default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of invoice_shipment
-- ----------------------------

-- ----------------------------
-- Table structure for `invoice_shipment_export`
-- ----------------------------
DROP TABLE IF EXISTS `invoice_shipment_export`;
CREATE TABLE `invoice_shipment_export` (
  `invoice_number` varchar(50) character set utf8 default NULL,
  `lc_no` varchar(50) character set utf8 default NULL,
  `issuing_bank` varchar(50) character set utf8 default NULL,
  `feeder_vessel` varchar(50) character set utf8 default NULL,
  `mother_vessel` varchar(50) character set utf8 default NULL,
  `port_of_loading` varchar(50) character set utf8 default NULL,
  `destination` varchar(50) character set utf8 default NULL,
  `flight` varchar(50) character set utf8 default NULL,
  `carrier_by` varchar(50) character set utf8 default NULL,
  `shipping_marks` varchar(50) character set utf8 default NULL,
  `notes` varchar(100) character set utf8 default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of invoice_shipment_export
-- ----------------------------

-- ----------------------------
-- Table structure for `invoice_tax_serial`
-- ----------------------------
DROP TABLE IF EXISTS `invoice_tax_serial`;
CREATE TABLE `invoice_tax_serial` (
  `id` int(11) NOT NULL auto_increment,
  `nofaktur` varchar(50) character set utf8 default NULL,
  `noseripajak` varchar(50) character set utf8 default NULL,
  `tanggalpajak` datetime default NULL,
  `customernumber` varchar(50) character set utf8 default NULL,
  `customernpwp` varchar(50) character set utf8 default NULL,
  `customernppkp` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `ship_to` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of invoice_tax_serial
-- ----------------------------

-- ----------------------------
-- Table structure for `kas_kasir`
-- ----------------------------
DROP TABLE IF EXISTS `kas_kasir`;
CREATE TABLE `kas_kasir` (
  `comno` varchar(10) character set utf8 default NULL,
  `tanggal` datetime default NULL,
  `jumlah` double default NULL,
  `supervisor` varchar(50) character set utf8 default NULL,
  `jmlakhir` double default NULL,
  `update_status` int(11) default NULL,
  `kasir` varchar(50) character set utf8 default NULL,
  `shift` varchar(50) character set utf8 default NULL,
  `catatan` varchar(255) character set utf8 default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kas_kasir
-- ----------------------------

-- ----------------------------
-- Table structure for `kendaraan`
-- ----------------------------
DROP TABLE IF EXISTS `kendaraan`;
CREATE TABLE `kendaraan` (
  `kode` varchar(50) character set utf8 NOT NULL,
  `nomor_plat` varchar(50) character set utf8 default NULL,
  `nama_supir` varchar(50) character set utf8 default NULL,
  `kapasitas` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `merk` varchar(50) character set utf8 default NULL,
  `bpkb_no` varchar(50) character set utf8 default NULL,
  `bpkb_name` varchar(50) character set utf8 default NULL,
  `model` varchar(50) character set utf8 default NULL,
  `colour` varchar(50) character set utf8 default NULL,
  `bpkb_address` varchar(250) character set utf8 default NULL,
  `stnk_date` datetime default NULL,
  PRIMARY KEY  (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kendaraan
-- ----------------------------

-- ----------------------------
-- Table structure for `modules`
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `module_id` varchar(50) character set utf8 NOT NULL,
  `module_name` varchar(200) character set utf8 default NULL,
  `type` varchar(50) character set utf8 default NULL,
  `form_name` varchar(50) character set utf8 default NULL,
  `description` varchar(225) character set utf8 default NULL,
  `parentid` varchar(255) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sequence` int(5) default NULL,
  `visible` bit(1) default NULL,
  `controller` varchar(50) default NULL,
  PRIMARY KEY  (`module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES ('frmCustomers.cmdSaveShipTo', 'frmCustomers.cmdSaveShipTo', 'Form', 'frmCustomers.cmdSaveShipTo', 'frmCustomers.cmdSaveShipTo', '_30010', '0', null, null, null);
INSERT INTO `modules` VALUES ('frmMain.Addnew', 'frmMain.Addnew', 'Form', 'frmMain.Addnew', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('frmRptCriteria', 'frmRptCriteria', 'Form', 'frmRptCriteria', 'Please entry this', '_90000', '0', null, null, null);
INSERT INTO `modules` VALUES ('ID_ExportImport', 'ID_ExportImport', 'Form', 'ID_ExportImport', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('ID_ItemPrices', 'Item Prices', 'Form', 'ID_ItemPrices', '', 'ID_ItemPrices', '0', '0', '\0', '');
INSERT INTO `modules` VALUES ('ID_JasaKiriman', 'ID_JasaKiriman', 'Form', 'ID_JasaKiriman', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\CEK\\BANKCEK2.RPT', '004. Cek keluar - Status Belum Cair / Gantung', 'Form', '\\CEK\\BANKCEK2.RPT', '004. Cek Keluar - Status Belum Cair', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\CEK\\BANKCEKGL.RPT', '011. Laporan Cek Keluar (Dengan Kode Perkiraan)', 'Form', '\\CEK\\BANKCEKGL.RPT', 'Please entry this', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\CEK\\BANKCEKM2.RPT', '005. Cek Masuk - Status Belum Cair / Gantung', 'Form', '\\CEK\\BANKCEKM2.RPT', 'A005. Cek Masuk - Status Belum Cair', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\cek\\BANKCODE.rpt', '001. Daftar Bank', 'Form', '\\cek\\BANKCODE.rpt', 'A004. Cek Keluar - Status Cair', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Cek\\BankMutasiBank.rpt', '012. Laporan Mutasi Transaksi Bank', 'Form', '\\Cek\\BankMutasiBank.rpt', 'Please entry this', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\CEK\\ChInSum.Rpt', '006. Daftar Penerimaan Cek/Giro', 'Form', '\\CEK\\ChInSum.Rpt', 'Please entry this', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\CEK\\ChOutSum.Rpt', '007. Daftar Pengeluran Cek/Giro', 'Form', '\\CEK\\ChOutSum.Rpt', 'Please entry this', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\CEK\\KasInSum.Rpt', '002. Daftar Penerimaan Kas', 'Form', '\\CEK\\KasInSum.Rpt', 'Daftar Penerimaan Kas', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\CEK\\KasOutSum.Rpt', '003. Daftar Pengeluran Kas', 'Form', '\\CEK\\KasOutSum.Rpt', 'Daftar Pengeluaran Kas', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Cek\\MutasiKas_Saldo.rpt', '008. Laporan Mutasi Kas/Bank', 'Form', '\\Cek\\MutasiKas_Saldo.rpt', 'Please entry this', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\CEK\\transfer_in.rpt', '009. Daftar Penerimaan transfer', 'Form', '\\CEK\\transfer_in.rpt', 'Please entry this', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\CEK\\transfer_out.rpt', '010. Daftar Pengeluaran transfer', 'Form', '\\CEK\\transfer_out.rpt', 'Please entry this', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\gl\\balancesheet2.rpt', '009. Laporan Neraca', 'Form', '\\gl\\balancesheet2.rpt', '009. Laporan Neraca', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\gl\\neracaT.rpt', 'Laporan Neraca T-Form', 'Form', '\\gl\\neracaT.rpt', 'Laporan Neraca T-Form', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\gl\\RLCompare.rpt', 'Laporan Rugi Laba Comparison', 'Form', '\\gl\\RLCompare.rpt', 'Laporan Rugi Laba Comparison', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\AsmItem.Rpt', 'Laporan Assembly item', 'Form', '\\Inv\\AsmItem.Rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\AsmItem17.Rpt', '022. Laporan Assembly item - Summary', 'Form', '\\Inv\\AsmItem17.Rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\DaftarBarang.Rpt', 'Laporan Daftar  Barang', 'Form', '\\Inv\\DaftarBarang.Rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\FisikInventory.rpt', 'Laporan Fisik Inventory', 'Form', '\\Inv\\FisikInventory.rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\HargaBeli.Rpt', 'Laporan Daftar Harga Beli', 'Form', '\\Inv\\HargaBeli.Rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\HargaJual.Rpt', 'Laporan Daftar Harga Jual', 'Form', '\\Inv\\HargaJual.Rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\InventoryMoving.rpt', 'Laporan Keluar Masuk Barang', 'Form', '\\Inv\\InventoryMoving.rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\InvPriceHistory.rpt', 'Laporan History Harga', 'Form', '\\Inv\\InvPriceHistory.rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\InvTranCategory.Rpt', '023. Inventory Transaction by Category', 'Form', '\\Inv\\InvTranCategory.Rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\InvTranItem.Rpt', '024. Inventory Transaction by Item Number', 'Form', '\\Inv\\InvTranItem.Rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\inv\\invvalue.rpt', 'Laporan Nilai Persediaan Inventory', 'Form', '\\inv\\invvalue.rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\inv\\KeluarReturPembelian.rpt', 'Pengeluaran Barang Retur Pembelian', 'Form', '\\inv\\KeluarReturPembelian.rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\MutasiGudang.rpt', 'Mutasi Per Barang Per Gudang', 'Form', '\\Inv\\MutasiGudang.rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\StokMgmtLow.rpt', 'Stock Mgmt - Inventory Low Stock', 'Form', '\\Inv\\StokMgmtLow.rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\StokMgMtOnBOrder.rpt', 'Stock MgMt - Inventory on Back Order', 'Form', '\\Inv\\StokMgMtOnBOrder.rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\StokMgMtOut.rpt', 'Stock MgMt - Inventory Out Of Stock', 'Form', '\\Inv\\StokMgMtOut.rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Inv\\StokMgMtRecon.Rpt', 'Stock MgMt - Inventory Reconsiliation', 'Form', '\\Inv\\StokMgMtRecon.Rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Po\\DaftarHutang.rpt', 'A0041. Hutang Supplier dan Pembayaran', 'Form', '\\Po\\DaftarHutang.rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\po\\DaftarSupplier.rpt', 'A002. Daftar Supplier Urut Nama', 'Form', '\\po\\DaftarSupplier.rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\po\\DaftarSupplierUtama.rpt', 'Daftar Hutang per Supplier', 'Form', '\\po\\DaftarSupplierUtama.rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Po\\HistoryHargaItemSupplier.rpt', '020. History Harga Item Per Supplier', 'Form', '\\Po\\HistoryHargaItemSupplier.rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\Keluar.rpt', 'Laporan Pengeluaran Barang', 'Form', '\\PO\\Keluar.rpt', 'Please entry this', '_90070', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\KeluarPerPO.rpt', 'Laporan Pengeluaran Barang/Retur - Per PO', 'Form', '\\PO\\KeluarPerPO.rpt', 'Please entry this', '_90070', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\OpenPO.rpt', 'Open Purchase Order by PO Number', 'Form', '\\PO\\OpenPO.rpt', 'Please entry this', '_90070', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Po\\OrderPembelian.rpt', 'Order Pembelian / PO', 'Form', '\\Po\\OrderPembelian.rpt', 'Please entry this', '_90070', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Po\\OrderPembelianItemSupplierDetail.rpt', 'A008. Pembelian  per Item, Supplier - Detail ', 'Form', '\\Po\\OrderPembelianItemSupplierDetail.rpt', 'Please entry this', '_90070', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\PayAnaSupplier.Rpt', 'A016. Total Pembayaran per Supplier - Detail', 'Form', '\\PO\\PayAnaSupplier.Rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\PayDetailDaily.Rpt', 'A014. Total Pembayaran Harian', 'Form', '\\PO\\PayDetailDaily.Rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\PayDetailMonthly.Rpt', 'A015. Total Pembayaran Bulanan', 'Form', '\\PO\\PayDetailMonthly.Rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\PODaily.rpt', 'A009. Total Faktur Pembelian dibuat - Harian - Summary', 'Form', '\\PO\\PODaily.rpt', 'Please entry this', '_90070', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\PODetailDaily.rpt', 'A010. Total Faktur Pembelian dibuat - Harian - Detail', 'Form', '\\PO\\PODetailDaily.rpt', 'Please entry this', '_90070', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\POItemNoRecvItem.rpt', 'Purchase Order Items Not Received- by Item', 'Form', '\\PO\\POItemNoRecvItem.rpt', 'Please entry this', '_90070', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\POItemNoRecvSupplier.rpt', 'Purchase Order Items Not Received- by Supplier', 'Form', '\\PO\\POItemNoRecvSupplier.rpt', 'Please entry this', '_90070', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\POItemOverItem.rpt', 'Purchase Order Items Overdue - by Item', 'Form', '\\PO\\POItemOverItem.rpt', 'Please entry this', '_90070', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\POItemOverSupplier.rpt', 'Purchase Order Items Overdue - by Supplier', 'Form', '\\PO\\POItemOverSupplier.rpt', 'Please entry this', '_90070', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\POMonthly.rpt', 'A011. Total Faktur Pembelian dibuat - Bulanan - Summary', 'Form', '\\PO\\POMonthly.rpt', 'Please entry this', '_90070', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Po\\SaldoHutang.rpt', 'A005. Daftar Saldo Hutang Supplier', 'Form', '\\Po\\SaldoHutang.rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\po\\SelisihKursHutang1.Rpt', '015. Selisih Kurs Pembelian', 'Form', '\\po\\SelisihKursHutang1.Rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\po\\sisa_hutang.rpt', '011. Daftar Sisa Hutang - Per Invoice', 'Form', '\\po\\sisa_hutang.rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\po\\sisa_hutang_bulan.rpt', '012. Daftar Sisa Hutang - Per Bulan', 'Form', '\\po\\sisa_hutang_bulan.rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\po\\supplierEnvelop.rpt', 'Supplier Envelope', 'Form', '\\po\\supplierEnvelop.rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Po\\SupplierLstFinancial.rpt', 'Supplier Financial Listing', 'Form', '\\Po\\SupplierLstFinancial.rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Po\\SupplierLstNumber.Rpt', 'Supplier List by Supplier Number', 'Form', '\\Po\\SupplierLstNumber.Rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\Po\\SupplierPayables.rpt', 'Supplier Total Period Payables', 'Form', '\\Po\\SupplierPayables.rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\Terima.Rpt', '021. Penerimaan Barang - Detail', 'Form', '\\PO\\Terima.Rpt', 'Please entry this', '_90040', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\PO\\TotalPayableSupplier.rpt', 'Total Period Payable Paid by Supplier', 'Form', '\\PO\\TotalPayableSupplier.rpt', 'Please entry this', '_90120', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\AnalisaPenjualanPerCustomerPerbulan.rpt', 'A003. Penjualan per Customer - Summary', 'Form', '\\So\\AnalisaPenjualanPerCustomerPerbulan.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\AnalisaPenjualanPerJenisPembayaranDetail.rpt', 'A012. Penjualan per Jenis Pembayaran - Detail', 'Form', '\\So\\AnalisaPenjualanPerJenisPembayaranDetail.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\AnalisaPenjualanPerJenisPembayaranPerbulan.rpt', 'A011. Penjualan per Jenis Pembayaran - Summary', 'Form', '\\So\\AnalisaPenjualanPerJenisPembayaranPerbulan.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\AnalisaPenjualanPerKategoryCustomer.rpt', 'Laporan analisa penjualan per kategory customer', 'Form', '\\So\\AnalisaPenjualanPerKategoryCustomer.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\AnalisaPenjualanPerSalesmanPerbulan.rpt', 'Laporan analisa penjualan per salesman - perbulan', 'Form', '\\So\\AnalisaPenjualanPerSalesmanPerbulan.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\AnalisaPenjualanPerSourcePerbulan.rpt', 'Laporan analisa penjualan per source of order - perbulan', 'Form', '\\So\\AnalisaPenjualanPerSourcePerbulan.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\AnalisaPenjualanPerWilayah.rpt', 'Laporan analisa penjualan per wilayah', 'Form', '\\So\\AnalisaPenjualanPerWilayah.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\CustCredit.rpt', 'Customer on Credit Hold', 'Form', '\\so\\CustCredit.rpt', 'Please entry this', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\CustCreditAll.rpt', 'Customer on Credit Hold - Columns Style', 'Form', '\\so\\CustCreditAll.rpt', 'Please entry this', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\CustHighest.Rpt', 'Customer Sales by Highest Total', 'Form', '\\So\\CustHighest.Rpt', 'Please entry this', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\CustListCompany.rpt', 'Customer Listing by Company', 'Form', '\\so\\CustListCompany.rpt', 'Please entry this', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\CustListCustomer.rpt', 'Customer Listing by Customer Number', 'Form', '\\so\\CustListCustomer.rpt', 'Please entry this', '_90010', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\customerEnvelop.rpt', 'Customer Envelope/Label', 'Form', '\\so\\customerEnvelop.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\CustPayHistory2.rpt', 'A0061. Piutang Customer dan Pembayaran', 'Form', '\\so\\CustPayHistory2.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\CustPayHistoryByCust.rpt', 'A003. Daftar pembayaran piutang - group by customer', 'Form', '\\So\\CustPayHistoryByCust.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\CustSalesHistory.rpt', 'Customer Sales History', 'Form', '\\So\\CustSalesHistory.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\CustSalesHistoryLast.rpt', 'Customer Sales History - Last Order', 'Form', '\\So\\CustSalesHistoryLast.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\daftarcustomer.rpt', 'A001. Daftar Customer urut Nama', 'Form', '\\so\\daftarcustomer.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\DaftarPiutang.rpt', 'A006. Piutang Customer dan Pembayaran', 'Form', '\\so\\DaftarPiutang.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\DaftarTagihan.rpt', 'Daftar Tagihan dan Pembayaran', 'Form', '\\So\\DaftarTagihan.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\DODetail100.Rpt', 'Laporan Pengiriman Barang / DO', 'Form', '\\So\\DODetail100.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FakturPelunasanPiutang.Rpt', 'A009. Pelunasan Piutang - per Invoice (All)', 'Form', '\\So\\FakturPelunasanPiutang.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FakturPenjualanDetailTanggal.Rpt', 'A2.Faktur Penjualan - Summary', 'Form', '\\So\\FakturPenjualanDetailTanggal.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FakturPenjualanDetailtem.Rpt', 'A006. Penjualan per Item - Detail', 'Form', '\\So\\FakturPenjualanDetailtem.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FakturPenjualanSummary.Rpt', 'Faktur Penjualan - Summary - Jenis Pembayaran', 'Form', '\\So\\FakturPenjualanSummary.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FakturPenjualanSummaryBayar.Rpt', 'Faktur Penjualan - Summary - Per Status Pembayaran', 'Form', '\\So\\FakturPenjualanSummaryBayar.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FakturPenjualanSummaryItemCust.Rpt', 'A012. Penjualan per Customer per Item - Detail', 'Form', '\\So\\FakturPenjualanSummaryItemCust.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FakturPenjualanSummarySupplier.Rpt', 'Faktur Penjualan - Summary - Per Supplier', 'Form', '\\So\\FakturPenjualanSummarySupplier.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FakturPenjualanSummaryTanggal.Rpt', 'Faktur Penjualan - Summary -  per tanggal', 'Form', '\\So\\FakturPenjualanSummaryTanggal.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FakturPenjualanSummaryWilayah.Rpt', 'Faktur Penjualan - Summary - Per Wilayah', 'Form', '\\So\\FakturPenjualanSummaryWilayah.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FB_RoomResv.rpt', 'F&B Room Reservation - Daily', 'Form', '\\So\\FB_RoomResv.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FB_RoomResv2.rpt', 'F&B Room Reservation - Daily - By Waiter', 'Form', '\\So\\FB_RoomResv2.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FB_RoomResv3.rpt', 'F&B Room Reservation - Daily - By Room', 'Form', '\\So\\FB_RoomResv3.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FB_RoomResvSumDay.rpt', 'F&B Room Reservation Summary - Daily', 'Form', '\\So\\FB_RoomResvSumDay.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\FB_TableResv.rpt', 'F&B Table Reservation - Daily', 'Form', '\\So\\FB_TableResv.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\SO\\HargaHistoryMonthly.rpt', 'Laporan History Harga Monthly', 'Form', '\\SO\\HargaHistoryMonthly.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\HistoryHargaItemCustomer.rpt', '019. History Harga Item Per Customer', 'Form', '\\So\\HistoryHargaItemCustomer.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\InvoiceAllTypePerCustomer.rpt', 'Invoice - All Type - per Customers', 'Form', '\\So\\InvoiceAllTypePerCustomer.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\InvoicePerTypePerCustomer.rpt', 'Invoice - InvoiceType - per Customers', 'Form', '\\So\\InvoicePerTypePerCustomer.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\Jual100.Rpt', 'Laporan Penjualan Detail', 'Form', '\\So\\Jual100.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\JualCustSum.Rpt', 'Penjualan per Customer', 'Form', '\\so\\JualCustSum.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\SO\\JualKasirDateTime.Rpt', 'Laporan penjualan kasir with Date, Time', 'Form', '\\SO\\JualKasirDateTime.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\SO\\JualKonsinyasiTglMonthly.Rpt', 'Laporan Penjualan Konsinyasi Bulanan', 'Form', '\\SO\\JualKonsinyasiTglMonthly.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\SO\\JualReturTglMonthly.Rpt', 'Laporan Retur Penjualan Bulanan', 'Form', '\\SO\\JualReturTglMonthly.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\SO\\JualTglMonthly.Rpt', 'Laporan Penjualan Bulanan', 'Form', '\\SO\\JualTglMonthly.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\SO\\JualTglMonthlyDept.Rpt', 'Laporan Penjualan per Department', 'Form', '\\SO\\JualTglMonthlyDept.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\SO\\JualTglMonthlySales.Rpt', 'Laporan Penjualan Bulanan per Salesman', 'Form', '\\SO\\JualTglMonthlySales.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\KomisiSalesmanMonthly.rpt', 'Laporan Komisi Salesman - per Bulan', 'Form', '\\So\\KomisiSalesmanMonthly.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\KomisiSalesmanSummary.rpt', 'Laporan Komisi Salesman - Total Periode', 'Form', '\\So\\KomisiSalesmanSummary.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\KreditMemoSummary.rpt', 'Kredit Memo Summary', 'Form', '\\So\\KreditMemoSummary.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\SO\\MutasiStock.Rpt', 'Laporan Mutasi Stock Bulanan', 'Form', '\\SO\\MutasiStock.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\SO\\MutasiStockPrice.Rpt', 'Laporan Mutasi Stock, Price Bulanan ', 'Form', '\\SO\\MutasiStockPrice.Rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\PenjualanCustomer.rpt', 'Penjualan per Customer - Detail', 'Form', '\\So\\PenjualanCustomer.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\PenjualanCustomerDetail.rpt', 'A002. Penjualan per Customer - Detail', 'Form', '\\So\\PenjualanCustomerDetail.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\PenjualanPerbulanDetail.rpt', 'A002. Penjualan perbulan - Detail', 'Form', '\\So\\PenjualanPerbulanDetail.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\So\\SaldoPiutang.rpt', 'A007. Daftar Saldo Piutang Customer', 'Form', '\\So\\SaldoPiutang.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\SO\\SalesKomisi.exe', 'Query Komisi Salesman', 'Form', '\\SO\\SalesKomisi.exe', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\SO\\SalesOrder.rpt', 'Sales Order Summary', 'Form', '\\SO\\SalesOrder.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\SalesOrderDetail.rpt', 'Sales Order Detail', 'Form', '\\so\\SalesOrderDetail.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\salesorder_do.rpt', 'Sales Order - Delivery Order - Summary', 'Form', '\\so\\salesorder_do.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\salesorder_do_item.rpt', 'Sales Order - Delivery Order - Item - Detail', 'Form', '\\so\\salesorder_do_item.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\sisa_piutang.rpt', '011. Daftar Sisa Piutang - Per Invoice', 'Form', '\\so\\sisa_piutang.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\so\\sisa_piutang_bulan.rpt', '012. Daftar Sisa Piutang - Per Bulan', 'Form', '\\so\\sisa_piutang_bulan.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\SO\\SOOpenItem.rpt', 'Open Sales Order - by Item', 'Form', '\\SO\\SOOpenItem.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('\\SO\\SOOpenTanggal.rpt', 'Open Sales Order - by Tanggal', 'Form', '\\SO\\SOOpenTanggal.rpt', 'Please entry this', '_90090', '0', null, null, null);
INSERT INTO `modules` VALUES ('_00000', 'Setting', 'Form', '_00000', 'Setup data perusahaan atau aturan-aturan umum lainnya.', '0', '0', '7', '\0', '');
INSERT INTO `modules` VALUES ('_00010', 'Job Responsibility', 'Form', 'jobs', 'Job Responsibility', '_00000', '1', '3', '', null);
INSERT INTO `modules` VALUES ('_00011', 'Create', 'Form', '_00011', '.', '_00010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_00012', 'Edit', 'Form', '_00012', '.', '_00010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_00013', 'Delete', 'Form', '_00013', '.', '_00010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_00020', 'User Access', 'Form', 'user', 'User Access', '_00000', '1', '2', '', null);
INSERT INTO `modules` VALUES ('_00021', 'Create', 'Form', '_00021', '.', '_00020', '1', null, null, null);
INSERT INTO `modules` VALUES ('_00022', 'Edit', 'Form', '_00022', '.', '_00020', '1', null, null, null);
INSERT INTO `modules` VALUES ('_00023', 'Delete', 'Form', '_00023', '.', '_00020', '1', null, null, null);
INSERT INTO `modules` VALUES ('_00030', 'Global Setting', 'Form', 'seting', 'Global Setting', '_00000', '1', '1', '', null);
INSERT INTO `modules` VALUES ('_00031', 'Save', 'Form', '_00031', '.', '_00030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_00032', 'Remove All Database', 'Form', '_00032', 'Remove All Database', '_00030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_00040', 'Report List System', 'Form', 'report_list', 'Report List System', '_00000', '1', '4', '', null);
INSERT INTO `modules` VALUES ('_00041', 'Add', 'Form', 'frmReportList.cmdAdd', '.', '_00040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_00042', 'Edit', 'Form', 'frmReportList.cmdEdit', '.', '_00040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_00043', 'Delete', 'Form', 'frmReportList.cmdDelete', '.', '_00040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_00050', 'List Modules System', 'Form', 'modules', 'List Modules System', '_00000', '1', '5', '', null);
INSERT INTO `modules` VALUES ('_10000', 'General Ledger', 'Form', '_10000', 'Modul General Ledger atau Akuntansi.', '0', '1', '6', '', null);
INSERT INTO `modules` VALUES ('_10010', 'Perkiraan (COA)', 'Form', '_10010', '.', '_10000', '1', null, '\0', null);
INSERT INTO `modules` VALUES ('_10011', 'Create', 'Form', '_10011', '.', '_10010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10012', 'Edit', 'Form', '_10012', '.', '_10010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10013', 'Delete', 'Form', '_10013', '.', '_10010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10015', 'Create New COA Group', 'Form', '_10015', 'Create New COA Group', '_10010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10016', 'Remove COA Group', 'Form', '_10016', 'Remove COA Group', '_10010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10020', 'Budgeting ', 'Form', 'budget', 'Budgeting Cost', '_10000', '1', '5', '', null);
INSERT INTO `modules` VALUES ('_10021', 'Save', 'Form', '_10021', '.', '_10020', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10030', 'Periode Akuntansi', 'Form', 'periode', 'Periode Akuntansi', '_10000', '1', '4', '', null);
INSERT INTO `modules` VALUES ('_10031', 'Save', 'Form', '_10031', '.', '_10030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10032', 'Copy To New Periode', 'Form', '_10032', '.', '_10030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10035', 'Closing Periode', 'Form', '_10035', '.', '_10030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10036', 'Re-Opening Periode', 'Form', '_10036', '.', '_10030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10060', 'Jurnal Entry', 'Form', 'jurnal', 'Jurnal Umum', '_10000', '1', '3', '', null);
INSERT INTO `modules` VALUES ('_10060A', '_10060A', 'Form', '_10060A', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('_10061', 'Create', 'Form', '_10061', '.', '_10060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10062', 'Edit', 'Form', '_10062', '.', '_10060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10063', 'Delete', 'Form', '_10063', '.', '_10060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10064', 'Jenis Perkiraan / COA', 'Form', 'coa', 'Jenis Perkiraan / COA', '_10000', '1', '1', '', null);
INSERT INTO `modules` VALUES ('_10065', 'Kelompok Perkiraan', 'Form', 'coa_group', 'Kelompok Perkiraan', '_10000', '1', '2', '', null);
INSERT INTO `modules` VALUES ('_10066', 'View Arsip Saldo Perkiraan', 'Form', 'gl_arsip', 'View Arsip Saldo Perkiraan', '_10000', '1', '6', '', null);
INSERT INTO `modules` VALUES ('_10067', 'Setting Autonumber Jurnal Entry', 'Form', '_10067', 'Setting Autonumber Jurnal Entry', '_10000', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10068', 'Setting Hotkey Jurnal Entry', 'Form', '_10068', 'Setting Hotkey Jurnal Entry', '_10000', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10069', 'Neraca Design Report', 'Form', '_10069', 'Neraca Design Report', '_10000', '1', null, null, null);
INSERT INTO `modules` VALUES ('_10070', 'Rugi Laba Design Report', 'Form', '_10070', 'Rugi Laba Design Report', '_10000', '1', null, null, null);
INSERT INTO `modules` VALUES ('_11000', '_11000', 'Form', '_11000', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('_12000', 'Fixed Asset', 'Form', '_12000', 'Fixed Asset Module', '0', '0', '5', '', null);
INSERT INTO `modules` VALUES ('_13000', '_13000', 'Form', '_13000', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000', 'Penjualan', 'Form', '_30000', 'Modul Penjualan, A/R, Pelanggan dan Pembayaran.', '0', '1', '1', '', null);
INSERT INTO `modules` VALUES ('_30000.0', 'Point Of Sales - MyPOS', 'Form', '_30000', 'Point Of Sales - MyPOS', '_30000', '0', null, '\0', null);
INSERT INTO `modules` VALUES ('_30000.001', 'Buat nota baru', 'Form', '_30000.001', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.002', 'Void atau pembatalan nota', 'Form', '_30000.002', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.003', 'Input discount nota', 'Form', '_30000.003', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.004', 'Input PPN nota', 'Form', '_30000.004', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.005', 'Input service charge', 'Form', '_30000.005', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.006', 'Laporan penjualan harian kasir', 'Form', '_30000.006', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.007', 'Input penerimaan barang ', 'Form', '_30000.007', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.008', 'Lihat daftar penerimaan barang', 'Form', '_30000.008', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.009', 'Input pengeluran barang ', 'Form', '_30000.009', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.010', 'Lihat daftar penerimaan barang', 'Form', '_30000.010', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.011', 'Cetak label / barcode barang  ', 'Form', '_30000.011', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.012', 'Buka cash drawer  ', 'Form', '_30000.012', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.013', 'Input master barang dan kelompok  ', 'Form', '_30000.013', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.014', 'Input master pelanggan', 'Form', '_30000.014', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.015', 'Input master waiter ', 'Form', '_30000.015', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.016', 'Input master table / meja / room  ', 'Form', '_30000.016', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.017', 'Input master salesman ', 'Form', '_30000.017', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.018', 'Input price manager ', 'Form', '_30000.018', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.019', 'Input barang promosi  ', 'Form', '_30000.019', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.020', 'Backup database', 'Form', '_30000.020', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.021', 'Seting nota dan perangkat keras', 'Form', '_30000.021', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.022', 'Seting pemakai dan user level ', 'Form', '_30000.022', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.023', 'Hapus semua data transaksi penjualan  ', 'Form', '_30000.023', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.024', 'Hapus semua data master barang', 'Form', '_30000.024', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.025', 'Export / Import data barang ', 'Form', '_30000.025', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.026', 'Reset nomor nota  ', 'Form', '_30000.026', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.027', 'Seting nomor nota ', 'Form', '_30000.027', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.028', 'Input kas awal, pengambilan kas ', 'Form', '_30000.028', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.029', 'Laporan: penjualan per nota ', 'Form', '_30000.029', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.030', 'Laporan: penjualan per kasir  ', 'Form', '_30000.030', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.031', 'Laporan: penjualan per item ', 'Form', '_30000.031', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.032', 'Laporan: penjualan per kategory ', 'Form', '_30000.032', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.033', 'Laporan: penjualan per waiter ', 'Form', '_30000.033', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.034', 'Laporan: penjualan per customer ', 'Form', '_30000.034', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.035', 'Laporan: Daftar nota  ', 'Form', '_30000.035', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.036', 'Laporan: Daftar pembayaran', 'Form', '_30000.036', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.037', 'Laporan: Kartu stock  ', 'Form', '_30000.037', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.038', 'Laporan: Item Paling laku ', 'Form', '_30000.038', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.039', 'Laporan: Item paling tidak laku ', 'Form', '_30000.039', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.040', 'Laporan: Rugi / laba penjualan', 'Form', '_30000.040', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.041', 'Laporan: Daftar barang', 'Form', '_30000.041', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.050', 'Penyesuaian Stock (Adjustment)', 'Form', '_30000.050', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.051', 'Proses Produksi Jadi (Assembly)', 'Form', '_30000.051', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.052', 'Laporan Proses Produksi Jadi (Assembly)', 'Form', '_30000.052', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.053', 'Laporan Penyesuaian Stock (Adjustment)', 'Form', '_30000.053', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.054', 'Daftar piutang customer', 'Form', '_30000.054', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.055', 'Formulir Stock Opname', 'Form', '_30000.055', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.056', 'Proses retur barang', 'Form', '_30000.056', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.057', 'Proses import master barang file MDB', 'Form', '_30000.057', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.058', 'Laporan penjualan item minus', 'Form', '_30000.058', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.059', 'Laporan kartu stock', 'Form', '_30000.059', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.060', 'Input discount bertingkat', 'Form', '_30000.060', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.061', 'Input ppn percent', 'Form', '_30000.061', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.062', 'Input discount percent nota', 'Form', '_30000.062', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.063', 'Daftar user level/job', 'Form', '_30000.063', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.064', 'Export master barang to excel', 'Form', '_30000.064', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.065', 'Import master barang dari excel', 'Form', '_30000.065', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.066', 'Daftar Kategori Barang', 'Form', '_30000.066', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.067', 'Laporan Penjualan per Customer, Item', 'Form', '_30000.067', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.068', 'Laporan Penjualan per Nota, Pembayaran', 'Form', '_30000.068', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30000.100', 'Proses Pelunasan ONACCOUNT', 'Form', '_30000.100', '.', '_30000.0', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30010', 'Master Data Customer', 'Form', 'customer/browse', '.', '_30000', '1', '1', '', 'customer');
INSERT INTO `modules` VALUES ('_30011', 'Create', 'Form', '_30011', '.', '_30010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30012', 'Edit', 'Form', '_30012', '.', '_30010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30013', 'Delete', 'Form', '_30013', '.', '_30010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30020', 'Master Salesman', 'Form', 'salesman', '.', '_30000', '1', '2', '', 'salesman');
INSERT INTO `modules` VALUES ('_30030', 'Setting Saldo Awal Piutang Customer', 'Form', 'customer/saldo_awal', '.', '_30000', '1', '3', '', null);
INSERT INTO `modules` VALUES ('_30031', 'Proses', 'Form', '_30031', '.', '_30030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30033', 'Delete', 'Form', '_30033', '.', '_30030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30040', 'Arsip Bulanan Piutang Customer', 'Form', 'customer/proses_bulanan', '.', '_30000', '1', '4', '', null);
INSERT INTO `modules` VALUES ('_30041', 'Proses', 'Form', '_30041', '.', '_30040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30042', 'Delete', 'Form', '_30042', '.', '_30040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30050', 'Pembuatan SO', 'Form', 'sales_order', '.', '_30000', '1', '5', '', null);
INSERT INTO `modules` VALUES ('_30051', 'Create', 'Form', '_30051', '.', '_30050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30052', 'Edit', 'Form', '_30052', '.', '_30050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30053', 'Delete', 'Form', '_30053', '.', '_30050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30054', 'Buat Invoice', 'Form', '_30054', '.', '_30050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30055', 'Buat Do', 'Form', '_30055', 'Buat Do', '_30000', '1', null, '\0', null);
INSERT INTO `modules` VALUES ('_30060', 'Pembuatan DO', 'Form', 'delivery_order', '.', '_30000', '1', '6', '', null);
INSERT INTO `modules` VALUES ('_30061', 'Create', 'Form', '_30061', '.', '_30060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30062', 'Edit', 'Form', '_30062', '.', '_30060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30063', 'Delete', 'Form', '_30063', '.', '_30060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30064', 'Print', 'Form', '_30064', '.', '_30060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30070', 'Pembuatan Invoice Kontan', 'Form', 'invoice/kontan', '.', '_30000', '1', '8', '', null);
INSERT INTO `modules` VALUES ('_30071', 'Create', 'Form', '_30071', '.', '_30070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30072', 'Edit', 'Form', '_30072', '.', '_30070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30073', 'Delete', 'Form', '_30073', '.', '_30070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30074', 'Print', 'Form', '_30074', '.', '_30070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30075', 'Posting', 'Form', '_30075', 'Posting', '_30070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30080', 'Pembuatan Invoice dari DO', 'Form', 'invoice/do', '.', '_30000', '1', '7', '', null);
INSERT INTO `modules` VALUES ('_30081', 'Save', 'Form', '_30081', '.', '_30080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30090', 'Pembuatan Retur Penjualan', 'Form', 'invoice/retur', '.', '_30000', '1', '11', '', null);
INSERT INTO `modules` VALUES ('_300900', '_300900', 'Form', '_300900', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('_300901', '_300901', 'Form', '_300901', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('_30091', 'Create', 'Form', '_30091', '.', '_30090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30092', 'Edit', 'Form', '_30092', '.', '_30090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30093', 'Delete', 'Form', '_30093', '.', '_30090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30094', 'Print', 'Form', '_30094', '.', '_30090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30095', 'Posting', 'Form', '_30095', '.', '_30090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30100', 'Batch Posting', 'Form', 'so_batch_posting', '.', '_30000', '1', '14', '', null);
INSERT INTO `modules` VALUES ('_30110', 'Pelunasan Piutang', 'Form', 'payments', '.', '_30000', '1', '10', '', null);
INSERT INTO `modules` VALUES ('_30112', 'Proses', 'Form', '_30112', '.', '_30110', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30120', 'Kredit Nota', 'Form', 'so_credit_memo', '.', '_30000', '1', '12', '', null);
INSERT INTO `modules` VALUES ('_30121', 'Create', 'Form', '_30121', '.', '_30100', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30122', 'Edit', 'Form', '_30122', '.', '_30120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30123', 'Delete', 'Form', '_30123', '.', '_30120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30124', 'Print', 'Form', '_30124', '.', '_30120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30125', 'Posting', 'Form', '_30125', '.', '_30120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30130', 'Debit Nota', 'Form', 'so_debit_memo', '.', '_30000', '1', '13', '', null);
INSERT INTO `modules` VALUES ('_30131', 'Create', 'Form', '_30131', '.', '_30100', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30132', 'Edit', 'Form', '_30132', '.', '_30130', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30133', 'Delete', 'Form', '_30133', '.', '_30130', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30134', 'Print', 'Form', '_30134', '.', '_30130', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30135', 'Posting', 'Form', '_30135', '.', '_30130', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30140', 'Daftar Pelunasan Giro', 'Form', 'payments/giro', '.', '_30000', '1', '15', '', null);
INSERT INTO `modules` VALUES ('_30141', 'Cairkan', 'Form', '_30141', '.', '_30100', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30142', 'Tolak', 'Form', '_30142', '.', '_30140', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30143', 'Hapus', 'Form', '_30143', '.', '_30140', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30150', 'Daftar Pelunasan Cash', 'Form', 'payments/cash', '.', '_30000', '1', '16', '', null);
INSERT INTO `modules` VALUES ('_30151', 'Delete', 'Form', '_30151', '.', '_30150', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30160', 'Pembuatan Invoice Kredit', 'Form', 'invoice', '.', '_30000', '1', '8', '', null);
INSERT INTO `modules` VALUES ('_30161', 'Create', 'Form', '_30161', '.', '_30160', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30162', 'Edit', 'Form', '_30162', '.', '_30160', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30163', 'Delete', 'Form', '_30163', '.', '_30160', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30164', 'Print', 'Form', '_30164', '.', '_30160', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30165', 'Posting', 'Form', '_30165', 'Posting', '_30160', '1', null, null, null);
INSERT INTO `modules` VALUES ('_30170', '_30170', 'Form', '_30170', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('_40000', 'Pembelian', 'Form', '_40000', 'Modul Hutang, A/P, Hutang, Pembayaran, Supplier dan Pembayaran.', '0', '1', '2', '', null);
INSERT INTO `modules` VALUES ('_40010', 'Master Data Supplier', 'Form', 'supplier/browse', '.', '_40000', '1', '1', '', null);
INSERT INTO `modules` VALUES ('_40011', 'Create', 'Form', '_40011', '.', '_40010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40012', 'Edit', 'Form', '_40012', '.', '_40010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40013', 'Delete', 'Form', '_40013', '.', '_40010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40020', 'Setting Saldo Awal Hutang Supplier', 'Form', 'supplier/saldo_awal', '.', '_40000', '1', '2', '', null);
INSERT INTO `modules` VALUES ('_40021', 'Proses', 'Form', '_40021', '.', '_40020', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40023', 'Delete', 'Form', '_40023', '.', '_40020', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40030', 'Arsip Bulanan Hutang Supplier', 'Form', 'supplier/proses_bulanan', '.', '_40000', '1', '13', '', null);
INSERT INTO `modules` VALUES ('_40031', 'Proses', 'Form', '_40031', '.', '_40030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40033', 'Delete', 'Form', '_40033', '.', '_40030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40040', 'Pembuatan PO', 'Form', 'purchase_order', '.', '_40000', '1', '3', '', null);
INSERT INTO `modules` VALUES ('_40041', 'Create', 'Form', '_40041', '.', '_40040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40042', 'Edit', 'Form', '_40042', '.', '_40040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40043', 'Delete', 'Form', '_40043', '.', '_40040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40044', 'Print', 'Form', '_40044', '.', '_40040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40045', 'Close PO Manual', 'Form', '_40045', 'Close PO Manual', '_40040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40046', 'Buat Faktur', 'Form', '_40046', 'Buat Faktur', '_40040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40047', 'Create Duplikat PO', 'Form', '_40047', 'Create Duplikat PO', '_40040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40048', 'Daftar Penerimaan PO', 'Form', '_40048', 'Daftar Penerimaan PO', '_40040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40049', 'Buat Faktur dari daftar penerimaan', 'Form', '_40049', 'Buat Faktur Dari daftar penerimaan', '_40040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40050', 'Faktur Pembelian Kontan', 'Form', 'beli/kontan', '.', '_40000', '1', '5', '', null);
INSERT INTO `modules` VALUES ('_40051', 'Create', 'Form', '_40051', '.', '_40050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40052', 'Edit', 'Form', '_40052', '.', '_40050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40053', 'Delete', 'Form', '_40053', '.', '_40050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40054', 'Print', 'Form', '_40054', '.', '_40050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40055', 'Posting', 'Form', '_40055', '.', '_40050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40060', 'Pembuatan Retur Pembelian', 'Form', 'po_retur', '.', '_40000', '1', '7', '', null);
INSERT INTO `modules` VALUES ('_40061', 'Create', 'Form', '_40061', '.', '_40060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40062', 'Edit', 'Form', '_40062', '.', '_40060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40063', 'Delete', 'Form', '_40063', '.', '_40060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40064', 'Print', 'Form', '_40064', '.', '_40060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40065', 'Posting', 'Form', '_40065', '.', '_40060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40070', 'Pembayaran Hutang', 'Form', 'payables_payments', '.', '_40000', '1', '6', '', null);
INSERT INTO `modules` VALUES ('_40071', 'Proses', 'Form', '_40071', '.', '_40070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40080', 'Hutang Manager', 'Form', 'payables', '.', '_40000', '1', '8', '', null);
INSERT INTO `modules` VALUES ('_40081', 'Create', 'Form', '_40081', '.', '_40080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40082', 'Edit', 'Form', '_40082', '.', '_40080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40083', 'Delete', 'Form', '_40083', '.', '_40080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40084', 'Bayar Hutang', 'Form', '_40084', '.', '_40080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40085', 'Posting', 'Form', '_40085', '.', '_40080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40090', 'Kredit Memo', 'Form', 'po_credit_memo', '.', '_40000', '1', '9', '', null);
INSERT INTO `modules` VALUES ('_40091', 'Create', 'Form', '_40091', '.', '_40090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40092', 'Edit', 'Form', '_40092', '.', '_40090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40093', 'Delete', 'Form', '_40093', '.', '_40090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40094', 'Print', 'Form', '_40094', '.', '_40090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40095', 'Posting', 'Form', '_40095', 'Posting', '_40090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40100', 'Debit Memo', 'Form', 'po_debit_memo', '.', '_40000', '1', '10', '', null);
INSERT INTO `modules` VALUES ('_40101', 'Create', 'Form', '_40101', '.', '_40100', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40102', 'Edit', 'Form', '_40102', '.', '_40100', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40103', 'Delete', 'Form', '_40103', '.', '_40100', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40104', 'Print', 'Form', '_40104', '.', '_40100', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40105', 'Posting', 'Form', '_40105', 'Posting', '_40100', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40110', 'Daftar Pembayaran Giro', 'Form', 'payables_payments/giro', '.', '_40000', '1', '11', '', null);
INSERT INTO `modules` VALUES ('_40113', 'Cair', 'Form', '_40113', '.', '_40110', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40114', 'Tolak', 'Form', '_40114', '.', '_40110', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40115', 'Delete', 'Form', '_40115', '.', '_40110', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40120', 'Daftar Pembayaran Cash', 'Form', 'payables_payments/cash', '.', '_40000', '1', '12', '', null);
INSERT INTO `modules` VALUES ('_40123', 'Delete', 'Form', '_40123', '.', '_40120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40130', 'Faktur Pembelian Kredit', 'Form', 'beli', '.', '_40000', '1', '4', '', null);
INSERT INTO `modules` VALUES ('_40131', 'Create', 'Form', '_40131', '.', '_40050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40132', 'Edit', 'Form', '_40132', '.', '_40050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40134', 'Delete', 'Form', '_40134', '.', '_40050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40135', 'Print', 'Form', '_40135', '.', '_40050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_40136', 'Posting', 'Form', '_40136', '.', '_40050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60000', 'Cash & Bank', 'Form', '_60000', 'Modul untuk pencatatan semua aktifitas kas atau bank.', '0', '1', '3', '', null);
INSERT INTO `modules` VALUES ('_60010', 'Pembuatan Account Bank', 'Form', 'bank', '.', '_60000', '1', '1', '', null);
INSERT INTO `modules` VALUES ('_60011', 'Create', 'Form', '_60011', '.', '_60010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60012', 'Edit', 'Form', '_60012', '.', '_60010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60013', 'Delete', 'Form', '_60013', '.', '_60010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60020', 'Cash Masuk', 'Form', 'bank_cash/in', '.', '_60000', '1', '2', '', null);
INSERT INTO `modules` VALUES ('_60021', 'Create', 'Form', '_60021', '.', '_60020', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60022', 'Edit', 'Form', '_60022', '.', '_60020', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60023', 'Delete', 'Form', '_60023', '.', '_60020', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60024', 'Print', 'Form', '_60024', '.', '_60020', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60025', 'Posting', 'Form', '_60025', '.', '_60020', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60030', 'Cash Keluar', 'Form', 'bank_cash/out', '.', '_60000', '1', '3', '', null);
INSERT INTO `modules` VALUES ('_60031', 'Create', 'Form', '_60031', '.', '_60030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60032', 'Edit', 'Form', '_60032', '.', '_60030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60033', 'Delete', 'Form', '_60033', '.', '_60030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60034', 'Print', 'Form', '_60034', '.', '_60030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60035', 'Posting', 'Form', '_60035', '.', '_60030', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60040', 'Giro Masuk', 'Form', 'bank_giro/in', '.', '_60000', '1', '4', '', null);
INSERT INTO `modules` VALUES ('_60041', 'Create', 'Form', '_60041', '.', '_60040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60042', 'Edit', 'Form', '_60042', '.', '_60040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60043', 'Delete', 'Form', '_60043', '.', '_60040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60044', 'Print', 'Form', '_60044', '.', '_60040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60045', 'Posting', 'Form', '_60045', '.', '_60040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60050', 'Giro Keluar', 'Form', 'bank_giro/out', '.', '_60000', '1', '5', '', null);
INSERT INTO `modules` VALUES ('_60051', 'Create', 'Form', '_60051', '.', '_60050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60052', 'Edit', 'Form', '_60052', '.', '_60050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60053', 'Delete', 'Form', '_60053', '.', '_60050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60054', 'Print', 'Form', '_60054', '.', '_60050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60055', 'Posting', 'Form', '_60055', '.', '_60050', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60060', 'Transfer Masuk', 'Form', 'bank_transfer/in', '.', '_60000', '1', '6', '', null);
INSERT INTO `modules` VALUES ('_60061', 'Create', 'Form', '_60061', '.', '_60060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60062', 'Edit', 'Form', '_60062', '.', '_60060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60063', 'Delete', 'Form', '_60063', '.', '_60060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60064', 'Print', 'Form', '_60064', '.', '_60060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60065', 'Posting', 'Form', '_60065', '.', '_60060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60070', 'Transfer Keluar', 'Form', 'bank_transfer/out', '.', '_60000', '1', '7', '', null);
INSERT INTO `modules` VALUES ('_60071', 'Create', 'Form', '_60071', '.', '_60070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60072', 'Edit', 'Form', '_60072', '.', '_60070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60073', 'Delete', 'Form', '_60073', '.', '_60070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60074', 'Print', 'Form', '_60074', '.', '_60070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60075', 'Posting', 'Form', '_60075', '.', '_60070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60080', 'Adjusment', 'Form', 'bank_adjust', '.', '_60000', '1', '8', '', null);
INSERT INTO `modules` VALUES ('_60081', 'Create', 'Form', '_60081', '.', '_60080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60082', 'Edit', 'Form', '_60082', '.', '_60080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60083', 'Delete', 'Form', '_60083', '.', '_60080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60085', 'Posting', 'Form', '_60085', '.', '_60080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80000', 'Inventory', 'Form', '_80000', 'Modul Pengelolaan dan transaksi barang dagangan.', '0', '1', '4', '', null);
INSERT INTO `modules` VALUES ('_80010', 'Master Data Stock', 'Form', 'inventory', '.', '_80000', '1', '1', '', null);
INSERT INTO `modules` VALUES ('_80010.01', '_80010.01', 'Form', '_80010.01', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80010.02', '_80010.02', 'Form', '_80010.02', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80010.03', '_80010.03', 'Form', '_80010.03', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80010.04', '_80010.04', 'Form', '_80010.04', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80010.05', '_80010.05', 'Form', '_80010.05', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80010.06', '_80010.06', 'Form', '_80010.06', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80010.07', '_80010.07', 'Form', '_80010.07', 'Please entry this', '_00000', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80011', 'Create', 'Form', '_80011', '.', '_80010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80012', 'Edit', 'Form', '_80012', '.', '_80010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80013', 'Delete', 'Form', '_80013', '.', '_80010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80014', 'Serial Number', 'Form', '_80014', '.', '_80010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80015', 'Ubah Kode', 'Form', '_80015', 'Ubah kode barang atau jasa', '_80010', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80020', 'Master Kategory', 'Form', 'category', '.', '_80000', '1', '2', '', null);
INSERT INTO `modules` VALUES ('_80021', 'Create', 'Form', '_80021', '.', '_80020', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80022', 'Edit', 'Form', '_80022', '.', '_80020', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80023', 'Delete', 'Form', '_80023', '.', '_80020', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80024', 'Print', 'Form', '_80024', '.', '_80020', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80030', 'Master Gudang', 'Form', 'gudang', '.', '_80000', '1', '3', '', null);
INSERT INTO `modules` VALUES ('_80031', 'Create', 'Form', '_80031', '.', '_80030', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80032', 'Edit', 'Form', '_80032', '.', '_80030', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80033', 'Delete', 'Form', '_80033', '.', '_80030', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80034', 'Print', 'Form', '_80034', '.', '_80030', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80040', 'Transfer Stock', 'Form', 'transfer', '.', '_80000', '1', '4', '', null);
INSERT INTO `modules` VALUES ('_80041', 'Create', 'Form', '_80041', '.', '_80040', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80042', 'Edit', 'Form', '_80042', '.', '_80040', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80043', 'Delete', 'Form', '_80043', '.', '_80040', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80044', 'Print', 'Form', '_80044', '.', '_80040', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80050', 'Penerimaan dari PO', 'Form', 'receive', '.', '_80000', '1', '6', '', null);
INSERT INTO `modules` VALUES ('_80051', 'Create', null, '_80051', null, '_80050', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80052', 'Edit', null, '_80052', null, '_80050', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80053', 'Delete', null, '_80053', null, '_80050', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80054', 'Print', null, '_80054', null, '_80050', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80060', 'Penerimaan Lain-lain', null, 'stock_recv_etc', null, '_80000', '1', '7', '', null);
INSERT INTO `modules` VALUES ('_80061', 'Create', null, '_80061', null, '_80060', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80062', 'Edit', null, '_80062', null, '_80060', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80063', 'Delete', null, '_80063', null, '_80060', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80064', 'Print', 'Form', '_80064', '.', '_80060', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80070', 'Pengeluaran Lain-Lain', null, 'stock_send_etc', null, '_80000', '1', '8', '', null);
INSERT INTO `modules` VALUES ('_80071', 'Create', null, '_80071', null, '_80070', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80072', 'Edit', null, '_80072', null, '_80070', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80073', 'Delete', null, '_80073', null, '_80070', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80074', 'Print', null, '_80074', null, '_80070', '0', null, null, null);
INSERT INTO `modules` VALUES ('_80080', 'Pengeluaran ke WIP', null, '_80080', null, '_80000', '1', null, '\0', null);
INSERT INTO `modules` VALUES ('_80081', 'Create', null, '_80081', null, '_80080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80082', 'Edit', null, '_80082', null, '_80080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80083', 'Delete', null, '_80083', null, '_80080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80084', 'Print', null, '_80084', null, '_80080', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80090', 'Penerimaan dari WIP', null, '_80090', null, '_80000', '1', null, '\0', null);
INSERT INTO `modules` VALUES ('_80091', 'Create', null, '_80091', null, '_80090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80092', 'Edit', null, '_80092', null, '_80090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80093', 'Delete', null, '_80093', null, '_80090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80094', 'Print', null, '_80094', null, '_80090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80100', 'Proses Assembly', null, 'assembly', null, '_80000', '1', '9', '', null);
INSERT INTO `modules` VALUES ('_80101', 'Proses', null, '_80101', null, '_80100', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80110', 'Proses DisAssembly', null, 'disassembly', null, '_80000', '1', '10', '', null);
INSERT INTO `modules` VALUES ('_80111', 'Proses', null, '_80111', null, '_80110', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80120', 'Adjusment Stock', null, 'stock_adjust', null, '_80000', '1', '5', '', null);
INSERT INTO `modules` VALUES ('_80121', 'Proses', null, '_80121', null, '_80120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80130', 'Arsip Bulanan Stock', null, 'stock_proses_bulanan', null, '_80000', '1', '11', '', null);
INSERT INTO `modules` VALUES ('_80131', 'Proses', null, '_80131', null, '_80130', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80132', 'Delete', null, '_80132', null, '_80130', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80140', 'Setting Saldo Awal', null, 'stock_saldo_awal', null, '_80000', '1', '12', '', null);
INSERT INTO `modules` VALUES ('_80141', 'Proses', null, '_80141', null, '_80140', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80200', 'Penerimaan barang non PO', null, '_80200', null, '_80000', '1', null, '\0', null);
INSERT INTO `modules` VALUES ('_80201', 'Save', null, '_80201', null, '_80200', '1', null, null, null);
INSERT INTO `modules` VALUES ('_80202', 'Print', null, '_80202', null, '_80200', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90000', 'Laporan', null, '_90000', 'Modul Daftar Laporan', '0', '1', '8', '', null);
INSERT INTO `modules` VALUES ('_90010', 'General Ledger', 'Group', 'laporan/gl', 'Laporan General Ledger', '_90000', '1', '3', '', null);
INSERT INTO `modules` VALUES ('_90011', '001. Daftar Perkiraan / Chart Of Accounts', 'Report', '\\Gl\\chartofaccount1.rpt', 'Daftar Perkiraan', '_90010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90012', '002. Jurnal Transaksi - Sort by Kode Jurnal', null, '\\gl\\gltransactions1.rpt', null, '_90010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90013', '003. Jurnal Transaksi - Sort by Tanggal', null, '\\gl\\gltransactions2.rpt', null, '_90010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90014', '004. Kartu General Ledger', null, '\\Gl\\glCards.rpt', null, '_90010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90015', '005. Kartu General Ledger - All Date', null, '\\Gl\\glCards2.rpt', null, '_90010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90016', '006. Kartu General Ledger - All Date, Account', null, '\\Gl\\glCards3.rpt', null, '_90010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90017', '007. Neraca Percobaan', null, '\\gl\\trialbalances.rpt', null, '_90010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90018', '008. Laporan Rugi Laba', null, '\\gl\\incomestatement1.rpt', null, '_90010', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90040', 'Inventory', null, 'laporan/stock', 'Laporan Inventory', '_90000', '1', '4', '', null);
INSERT INTO `modules` VALUES ('_90041', '001. Daftar Stock Item Number', null, '\\Inv\\InvListing.rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90042', '002. Daftar Stock per Gudang', null, '\\Inv\\PosisiStockGudang.rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90043', '003. Daftar Stock - With Financial', null, '\\Inv\\DaftarBarang12.rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90044', '004. Daftar Stock - With to Order', null, '\\Inv\\DaftarBarang11.rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90045', '005. Formulir Stock Opname', null, '\\Inv\\FStockOpname.rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90046', '006. Price List', null, '\\Inv\\PriceList.rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90047', '007. Kartu Stock', null, '\\Inv\\KartuStock.rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90048', '008. Kartu Stock Summary', null, '\\Inv\\KartuStockSum.rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90049', '009. Penerimaan Barang - Detail by No PO', null, '\\PO\\TerimaByPO.Rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90050', '010. Penerimaan Barang - Detail by No Bukti', null, '\\PO\\TerimaByRecvId.Rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90051', '011. Penerimaan Barang - Detail by Item', null, '\\PO\\TerimaByItem.Rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90052', '012. Penerimaan Barang dari WIP', null, '\\PO\\TerimaFG.Rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90053', '013. Pengeluaran Barang ke WIP', null, '\\Po\\KeluarWO.Rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90054', '014. Retur Barang Penjualan', null, '\\inv\\TerimaReturPenjualan.rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90055', '015. Retur Barang Pembelian ', null, '\\Po\\ReturBarangPembelian.rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90056', '016. Transfer Stok Antar Gudang ', null, '\\inv\\Transfer001.rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90057', '017. Laporan Assembly & Disassembly', null, '\\Inv\\AsmItem18.Rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90058', '018. Daftar Transaksi Stock - per Gudang', null, '\\Inv\\TransaksiInventory.rpt', null, '_90040', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90070', 'Pembelian', null, 'laporan/pembelian', 'Laporan Pembelian', '_90000', '1', '2', '', null);
INSERT INTO `modules` VALUES ('_90071', '001. Pembelian - Summary', null, '\\Po\\OrderPembelianSummary.rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90072', '002. Pembelian  Per Supplier - Summary ', null, '\\Po\\OrderPembelianDetail.rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90073', '003. Pembelian  Per Supplier  - Detail ', null, '\\Po\\BeliSuppSum.rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90074', '004. Pembelian  Per Item Summary', null, '\\Po\\OrderPembelianSupplierDetail.rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90075', '005. Pembelian  Per Item - Detail ', null, '\\Po\\PembelianItemSummary.rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90076', '006. Pembelian  Per Katagori - Summary', null, '\\Po\\OrderPembelianItemDetail.rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90077', '007. Pembelian  Per Kategori - Detail ', null, '\\Po\\OrderPembelianItemKategoriSum.rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90078', '009. Pembelian per Mata Uang', null, '\\Po\\OrderPembelianItemKategoriDetail.rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90079', '010. Laporan Pajak Masukan', null, '\\po\\BeliCurrency.Rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90080', '011. Daftar PO', null, '\\Po\\PajakMasukan.Rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90081', '012. Daftar PO - Detail', null, '\\PO\\DaftarPO.rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90082', '013. Faktur Pembelian - Detail', null, '\\PO\\PODetailMonthly.rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90083', '014. History Harga Per Supplier', null, '\\po\\PembelianDetail.Rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90084', '015. Selisih Kurs Pembelian', null, '\\Po\\HistoryHargaPerSupplier.rpt', null, '_90070', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90090', 'Penjualan', null, 'laporan/penjualan', 'Laporan Penjualan', '_90000', '1', '1', '', null);
INSERT INTO `modules` VALUES ('_90091', '001. Penjualan - Summary ', null, '\\So\\AnalisaPenjualanPerJenisFakturPerbulan.rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90092', '002. Penjualan By Customer - Summary ', null, '\\So\\PenjualanCustomerSum.rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90093', '003. Penjualan by Customer - Detail ', null, '\\So\\SumJualByCust.Rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90094', '004. Penjualan per Item - Summary', null, '\\So\\FakturPenjualanSummaryTrading.Rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90095', '005. Penjualan per Item - Detail', null, '\\So\\PenjualanPeritemDetailTrading.rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90096', '006. Penjualan per kategori Item - Summary', null, '\\So\\AnalisaPenjualanPerkategoriSummary.rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90097', '007. Penjualan Per Kategori - Detail', null, '\\So\\AnalisaPenjualanPerkategori.rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90098', '008. Penjualan per Salesman - Summary', null, '\\So\\FakturPenjualanMonthSales.Rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90099', '009. Penjualan per Salesman - Detail', null, '\\So\\FakturPenjualanSummarySales.Rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90100', '010. Penjualan per wilayah - Summary', null, '\\So\\AnalisaPenjualanPerWilayahPerbulan.rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90101', '011. Penjualan per Mata Uang', null, '\\so\\JualCurrency.Rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90102', '012. Faktur Penjualan - Detail', null, '\\So\\FakturPenjualan.Rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90103', '013. Retur Penjualan', null, '\\So\\ReturPenjualan.rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90104', '014. Komisi Salesman', null, '\\So\\KomisiSalesman.rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90105', '015. Laporan Pajak Keluaran', null, '\\So\\PajakKeluaran.Rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90106', '017. Daftar DO Customer', null, '\\SO\\DODetail300.rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90107', '018. Daftar DO - Detail', null, '\\SO\\DODetail200.rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90108', '019. History Harga Per Customer', null, '\\So\\HistoryHargaPerCustomer.rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90109', '020. Selisih Kurs Penjualan', null, '\\so\\SelisihKursPiutang1.Rpt', null, '_90090', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90120', 'Supplier / Hutang', null, 'laporan/supplier', 'Laporan Supplier atau Hutang', '_90000', '1', '5', '', null);
INSERT INTO `modules` VALUES ('_90121', '001. Daftar Supplier Urut Kode', null, '\\po\\DaftarSupplier2.rpt', null, '_90120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90122', '002. History Pembayaran Hutang Supplier', null, '\\po\\SuppPayHistory01.rpt', null, '_90120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90123', '003. Daftar Pembayaran Hutang', null, '\\po\\SuppPayHistory.rpt', null, '_90120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90124', '004. Kartu Hutang Supplier Summary', null, '\\po\\KartuHutangSum.rpt', null, '_90120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90125', '005. Kartu Hutang Supplier Detail', null, '\\Po\\KartuHutang.rpt', null, '_90120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90126', '006. Laporan Umur Hutang - Summary', null, '\\Po\\UmurHutang.Rpt', null, '_90120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90127', '007. Laporan Umur Hutang Supplier - Summary', null, '\\Po\\UmurHutang_Supplier.Rpt', null, '_90120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90128', '008. Laporan Umur Hutang Supplier - Detail', null, '\\Po\\UmurHutang_SupplierDetail.Rpt', null, '_90120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90129', '009. Daftar Pembayaran Hutang - Currency', null, '\\PO\\BayarHutang0011.rpt', null, '_90120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90130', '010. Daftar Pembayaran Hutang per Supplier - Currency', null, '\\PO\\BayarHutang0012.rpt', null, '_90120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90131', '011. Daftar Hutang - Currency', null, '\\po\\DaftarHutang009.rpt', null, '_90120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90132', '012. Daftar Hutang per Supplier - Currency', null, '\\po\\DaftarHutang010.rpt', null, '_90120', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90150', 'Customer / Piutang', null, 'laporan/customer', 'Laporan Customer atau Piutang', '_90000', '1', '6', '', null);
INSERT INTO `modules` VALUES ('_90151', '001. Daftar Customer urut Kode', null, '\\so\\daftarcustomerkode.rpt', null, '_90150', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90152', '002. History Pembayaran Piutang Customer', null, '\\So\\CustPayHistory01.rpt', null, '_90150', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90153', '003. Daftar Pembayaran Piutang', null, '\\So\\CustPayHistory.rpt', null, '_90150', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90154', '004. Kartu Piutang Customer - Summary', null, '\\so\\KartuPiutangSum.rpt', null, '_90150', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90155', '005. Kartu Piutang Customer - Detail', null, '\\so\\KartuPiutang.rpt', null, '_90150', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90156', '006. Laporan Umur Piutang - Summary', null, '\\So\\UmurPiutang.Rpt', null, '_90150', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90157', '007. Laporan Umur Piutang Pelanggan - Summary', null, '\\So\\UmurPiutang_Customer.Rpt', null, '_90150', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90158', '008. Laporan Umur Piutang Pelanggan - Detail', null, '\\So\\UmurPiutang_CustomerDetail.Rpt', null, '_90150', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90159', '009. Daftar Pembayaran Piutang - Currency', null, '\\SO\\BayarPiutang0010.rpt', null, '_90150', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90160', '010. Daftar Pembayaran Piutang per Customer - Currency', null, '\\SO\\BayarPiutang0011.rpt', null, '_90150', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90161', '011. Daftar Piutang - Currency', null, '\\so\\DaftarPiutang0011.rpt', null, '_90150', '1', null, null, null);
INSERT INTO `modules` VALUES ('_90162', '012. Daftar Piutang per Customer - Currency', null, '\\so\\DaftarPiutang0012.rpt', null, '_90150', '1', null, null, null);
INSERT INTO `modules` VALUES ('_60084', 'Mutasi Antar Rekening', 'Form', 'bank_mutasi', null, '_60000', null, '9', '', null);

-- ----------------------------
-- Table structure for `modules_groups`
-- ----------------------------
DROP TABLE IF EXISTS `modules_groups`;
CREATE TABLE `modules_groups` (
  `user_group_id` varchar(50) character set utf8 NOT NULL default '',
  `user_group_name` varchar(50) character set utf8 default NULL,
  `creation_date` datetime default NULL,
  `description` varchar(255) default NULL,
  `path_image` varchar(255) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`user_group_id`),
  UNIQUE KEY `x1` (`user_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modules_groups
-- ----------------------------
INSERT INTO `modules_groups` VALUES ('Administrator', 'Administrator', '2013-09-01 00:00:00', 'Administrator', '', '0', '', '');
INSERT INTO `modules_groups` VALUES ('ANDRI', 'Khusus job untuk andri', '2013-09-07 00:00:00', 'Khusus Job untuk andri', '', '0', '', '');
INSERT INTO `modules_groups` VALUES ('BYR', 'Buyer', '2013-08-31 00:00:00', 'Buyer', '', '0', '', '');
INSERT INTO `modules_groups` VALUES ('FIN', 'Financial', '2013-08-31 00:00:00', 'Kelompok finansial bertugas untuk mencatat data keuangan', '', '0', '', '');
INSERT INTO `modules_groups` VALUES ('Gudang', 'Gudang', '2009-12-25 16:55:55', 'Bagian gudang', 'D:daftar.ico', null, null, null);
INSERT INTO `modules_groups` VALUES ('INV', 'Inventory', '2001-10-09 15:11:08', null, null, '1', null, null);
INSERT INTO `modules_groups` VALUES ('KSR', 'Kasir', '2003-11-14 20:41:59', null, null, '1', null, null);
INSERT INTO `modules_groups` VALUES ('PUR', 'Purchasing', '2001-10-09 15:10:52', '', 'a1.ico', '1', null, null);
INSERT INTO `modules_groups` VALUES ('SLS', 'Sales', '2001-10-09 15:11:00', null, null, '1', null, null);
INSERT INTO `modules_groups` VALUES ('SPV', 'Supervisor', '2003-11-18 12:31:45', '', '', '1', null, null);
INSERT INTO `modules_groups` VALUES ('SYSMENU', 'SYSMENU', '2006-09-23 20:59:05', 'aaaa', 'a1.ico', '1', null, null);
INSERT INTO `modules_groups` VALUES ('ADM', 'Admin', null, 'Admin', null, null, null, null);
INSERT INTO `modules_groups` VALUES ('DRV', 'Driver', null, 'Driver', null, null, null, null);
INSERT INTO `modules_groups` VALUES ('COL', 'Collector', null, 'Collector', null, null, null, null);
INSERT INTO `modules_groups` VALUES ('aaaa', 'aaaa', '2013-08-31 00:00:00', 'Kopi Susu Abc', '', '0', '', '');
INSERT INTO `modules_groups` VALUES ('ddd', 'ddd', '2013-08-31 00:00:00', 'dd', '', '0', '', '');
INSERT INTO `modules_groups` VALUES ('a', 'abbb', '2013-08-31 00:00:00', 'abbb', '', '0', '', '');

-- ----------------------------
-- Table structure for `org_struct`
-- ----------------------------
DROP TABLE IF EXISTS `org_struct`;
CREATE TABLE `org_struct` (
  `org_id` varchar(50) character set utf8 NOT NULL,
  `org_name` varchar(50) character set utf8 default NULL,
  `address` varchar(250) character set utf8 default NULL,
  `phone` varchar(50) character set utf8 default NULL,
  `fax` varchar(50) character set utf8 default NULL,
  `contact_person` varchar(50) character set utf8 default NULL,
  `org_type` varchar(50) character set utf8 default NULL,
  `org_parent` varchar(50) character set utf8 default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  `source_id` varchar(50) character set utf8 default NULL,
  `is_head_office` bit(1) default NULL,
  PRIMARY KEY  (`org_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of org_struct
-- ----------------------------

-- ----------------------------
-- Table structure for `other_vendors`
-- ----------------------------
DROP TABLE IF EXISTS `other_vendors`;
CREATE TABLE `other_vendors` (
  `vendor_id` int(11) default NULL,
  `vendor_name` varchar(50) character set utf8 default NULL,
  `type_of_vendor` varchar(20) character set utf8 default NULL,
  `salutation` varchar(50) character set utf8 default NULL,
  `first_name` varchar(50) character set utf8 default NULL,
  `middle_initial` varchar(50) character set utf8 default NULL,
  `last_name` varchar(50) character set utf8 default NULL,
  `street` varchar(255) character set utf8 default NULL,
  `suite` varchar(50) character set utf8 default NULL,
  `city` varchar(50) character set utf8 default NULL,
  `state` varchar(10) character set utf8 default NULL,
  `zip_postal_code` varchar(20) character set utf8 default NULL,
  `country` varchar(50) character set utf8 default NULL,
  `phone` varchar(30) character set utf8 default NULL,
  `fax` varchar(30) character set utf8 default NULL,
  `payment_terms` varchar(255) character set utf8 default NULL,
  `credit_limit` double default NULL,
  `fed_tax_id` varchar(10) character set utf8 default NULL,
  `comments` double default NULL,
  `credit_balance` double default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of other_vendors
-- ----------------------------

-- ----------------------------
-- Table structure for `package_style`
-- ----------------------------
DROP TABLE IF EXISTS `package_style`;
CREATE TABLE `package_style` (
  `package_style` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`package_style`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of package_style
-- ----------------------------
INSERT INTO `package_style` VALUES ('package style 1');
INSERT INTO `package_style` VALUES ('package style 2');

-- ----------------------------
-- Table structure for `payables`
-- ----------------------------
DROP TABLE IF EXISTS `payables`;
CREATE TABLE `payables` (
  `bill_id` int(11) NOT NULL auto_increment,
  `vendor_type` int(11) default NULL,
  `supplier_number` varchar(20) character set utf8 default NULL,
  `other_number` int(11) default NULL,
  `purchase_order` tinyint(1) default NULL,
  `purchase_order_number` varchar(50) character set utf8 default NULL,
  `expense_type` varchar(50) character set utf8 default NULL,
  `account_id` int(11) default NULL,
  `invoice_number` varchar(20) character set utf8 default NULL,
  `invoice_date` datetime default NULL,
  `amount` double default NULL,
  `due_date` datetime default NULL,
  `terms` varchar(20) character set utf8 default NULL,
  `discount_taken` double default NULL,
  `purpose_of_expense` varchar(255) character set utf8 default NULL,
  `tax_deductible` tinyint(1) default NULL,
  `comments` varchar(255) default NULL,
  `paid` tinyint(1) default NULL,
  `posted` tinyint(1) default NULL,
  `posting_gl_id` varchar(50) character set utf8 default NULL,
  `batch_post` tinyint(1) default NULL,
  `X1099` tinyint(1) default NULL,
  `invoice_received` tinyint(1) default NULL,
  `items_received` tinyint(1) default NULL,
  `many_po` tinyint(1) default NULL,
  `curr_code` varchar(50) character set utf8 default NULL,
  `curr_rate` double default NULL,
  `curr_code_org` varchar(50) character set utf8 default NULL,
  `curr_rate_org` double default NULL,
  `curr_selisih` double default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `saldo_invoice` double default NULL,
  PRIMARY KEY  (`bill_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payables
-- ----------------------------
INSERT INTO `payables` VALUES ('1', null, 'ALFAMART', null, '1', 'PBL00115', 'Purchase Order', '0', 'PBL00115', '2013-01-04 00:00:00', '6000', '2013-01-04 00:00:00', 'Kredit', '0', 'Purchase Order', '0', '', '1', null, null, null, null, null, null, null, '', '0', null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `payables_items`
-- ----------------------------
DROP TABLE IF EXISTS `payables_items`;
CREATE TABLE `payables_items` (
  `bill_id` int(11) default NULL,
  `line_number` int(11) NOT NULL auto_increment,
  `account_id` int(11) default NULL,
  `amount` double default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `update_date` datetime default NULL,
  PRIMARY KEY  (`line_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payables_items
-- ----------------------------

-- ----------------------------
-- Table structure for `payables_many_po`
-- ----------------------------
DROP TABLE IF EXISTS `payables_many_po`;
CREATE TABLE `payables_many_po` (
  `bill_id` int(11) default NULL,
  `purchase_order_number` varchar(50) character set utf8 default NULL,
  `payment_amount` double default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payables_many_po
-- ----------------------------

-- ----------------------------
-- Table structure for `payables_payments`
-- ----------------------------
DROP TABLE IF EXISTS `payables_payments`;
CREATE TABLE `payables_payments` (
  `bill_id` int(11) default NULL,
  `line_number` int(11) NOT NULL auto_increment,
  `date_paid` datetime default NULL,
  `how_paid` varchar(50) character set utf8 default NULL,
  `how_paid_account_id` int(11) default NULL,
  `check_number` varchar(50) character set utf8 default NULL,
  `amount_paid` double default NULL,
  `amount_alloc` double default NULL,
  `trans_id` int(11) default NULL,
  `curr_code` varchar(50) character set utf8 default NULL,
  `curr_rate` double default NULL,
  `curr_code_org` varchar(50) character set utf8 default NULL,
  `curr_rate_org` double default NULL,
  `curr_selisih` double default NULL,
  `purchase_order_number` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `no_bukti` varchar(50) default NULL,
  `paid_by` varchar(50) default NULL,
  PRIMARY KEY  (`line_number`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payables_payments
-- ----------------------------
INSERT INTO `payables_payments` VALUES ('1', '1', '2013-01-04 00:00:00', 'CASH OUT', '0', '', '6000', '0', '1', 'IDR', '1', null, null, null, 'PBL00115', null, null, null, null, 'APP00039', '');
INSERT INTO `payables_payments` VALUES ('0', '17', '2013-08-18 00:00:00', 'Cash', null, null, '190000', null, null, null, null, null, null, null, 'FBC0100004', null, null, null, null, 'APP00050', null);
INSERT INTO `payables_payments` VALUES ('1', '12', '2013-08-17 00:00:00', 'Cash', null, null, '100000', null, null, null, null, null, null, null, 'PBL00115', null, null, null, null, 'APP00045', null);
INSERT INTO `payables_payments` VALUES ('0', '16', '2013-08-17 00:00:00', 'Giro', null, null, '12000', null, null, null, null, null, null, null, 'PI00002', null, null, null, null, 'APP00049', null);
INSERT INTO `payables_payments` VALUES ('1', '14', '2013-08-17 00:00:00', 'Cash', null, null, '12000', null, null, null, null, null, null, null, 'PBL00115', null, null, null, null, 'APP00047', null);

-- ----------------------------
-- Table structure for `payments`
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `invoice_number` varchar(50) character set utf8 default NULL,
  `line_number` int(11) NOT NULL auto_increment,
  `date_paid` datetime default NULL,
  `how_paid` varchar(50) character set utf8 default NULL,
  `how_paid_acct_id` int(11) default NULL,
  `credit_card_number` varchar(50) character set utf8 default NULL,
  `expiration_date` varchar(50) character set utf8 default NULL,
  `authorization` varchar(50) character set utf8 default NULL,
  `amount_paid` double default NULL,
  `amount_alloc` double default NULL,
  `comments` double default NULL,
  `check_type` int(11) default NULL,
  `curr_code` varchar(50) character set utf8 default NULL,
  `curr_rate` double default NULL,
  `curr_rate_exc` double default NULL,
  `curr_code_org` varchar(50) character set utf8 default NULL,
  `curr_rate_org` double default NULL,
  `curr_selisih` double default NULL,
  `no_bukti` varchar(50) character set utf8 default NULL,
  `trans_id` int(11) default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `receipt_by` varchar(50) character set utf8 default NULL,
  `credit_card_type` varchar(50) character set utf8 default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `jenisuangmuka` int(11) default NULL,
  `angsur_no_dari` int(11) default NULL,
  `angsur_no_sampai` int(11) default NULL,
  `angsur_sisa` double default NULL,
  `angsur_lunas` double default NULL,
  `angsur_lunas_bunga` int(11) default NULL,
  `from_bank` varchar(50) default NULL,
  `from_account` varchar(50) default NULL,
  PRIMARY KEY  (`line_number`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payments
-- ----------------------------
INSERT INTO `payments` VALUES ('SO00055', '1', '2012-09-04 00:00:00', 'TRANS IN', null, null, null, 'dfasfda', '2000000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'abadfas', 'dasdf');
INSERT INTO `payments` VALUES ('PJL00101', '133', '2013-08-30 00:00:00', '0', '0', null, null, null, '101000', null, null, null, null, null, null, null, null, null, 'ARP00068', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `payments` VALUES ('PJL00100', '134', '2013-08-30 00:00:00', '0', '0', null, null, null, '16000', null, null, null, null, null, null, null, null, null, 'ARP00068', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `payments` VALUES ('PJL00102', '135', '2013-08-30 00:00:00', '0', '0', null, null, null, '2000', null, null, null, null, null, null, null, null, null, 'ARP00068', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `payments` VALUES ('PJL00101', '136', '2013-09-07 00:00:00', '0', '1374', null, null, null, '8000', null, null, null, null, null, null, null, null, null, 'ARP00069', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `payroll_link`
-- ----------------------------
DROP TABLE IF EXISTS `payroll_link`;
CREATE TABLE `payroll_link` (
  `last_check_file` varchar(255) character set utf8 default NULL,
  `last_gl_file` varchar(255) character set utf8 default NULL,
  `last_bank_account` varchar(50) character set utf8 default NULL,
  `last_source` int(11) default NULL,
  `last_selchecks` bit(1) default NULL,
  `last_selgl` bit(1) default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payroll_link
-- ----------------------------

-- ----------------------------
-- Table structure for `pending_stock_opname`
-- ----------------------------
DROP TABLE IF EXISTS `pending_stock_opname`;
CREATE TABLE `pending_stock_opname` (
  `id` int(11) NOT NULL auto_increment,
  `barcode` varchar(50) character set utf8 default NULL,
  `qty` int(11) default NULL,
  `trans` varchar(50) character set utf8 default NULL,
  `shipment` varchar(50) character set utf8 default NULL,
  `artikel` varchar(50) character set utf8 default NULL,
  `price` int(11) default NULL,
  `size1` int(11) default NULL,
  `size2` int(11) default NULL,
  `size3` int(11) default NULL,
  `size4` int(11) default NULL,
  `size5` int(11) default NULL,
  `size6` int(11) default NULL,
  `size7` int(11) default NULL,
  `size8` int(11) default NULL,
  `size9` int(11) default NULL,
  `size10` int(11) default NULL,
  `total` int(11) default NULL,
  `current_price` int(11) default NULL,
  `current_total` int(11) default NULL,
  `process_count` int(11) default NULL,
  `qty_stock` int(11) default NULL,
  `qty_adjust` int(11) default NULL,
  `color` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pending_stock_opname
-- ----------------------------

-- ----------------------------
-- Table structure for `pending_stock_opname_tmp`
-- ----------------------------
DROP TABLE IF EXISTS `pending_stock_opname_tmp`;
CREATE TABLE `pending_stock_opname_tmp` (
  `id` int(11) NOT NULL auto_increment,
  `barcode` varchar(50) character set utf8 default NULL,
  `qty` int(11) default NULL,
  `trans` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pending_stock_opname_tmp
-- ----------------------------

-- ----------------------------
-- Table structure for `preferences`
-- ----------------------------
DROP TABLE IF EXISTS `preferences`;
CREATE TABLE `preferences` (
  `company_code` varchar(15) character set utf8 NOT NULL,
  `company_name` varchar(50) character set utf8 default NULL,
  `slogan` varchar(50) character set utf8 default NULL,
  `invoice_contact` varchar(50) character set utf8 default NULL,
  `purchase_order_contact` varchar(50) character set utf8 default NULL,
  `street` varchar(50) character set utf8 default NULL,
  `suite` varchar(50) character set utf8 default NULL,
  `city_state_zip_code` varchar(50) character set utf8 default NULL,
  `phone_number` varchar(50) character set utf8 default NULL,
  `fax_number` varchar(50) character set utf8 default NULL,
  `email` varchar(50) character set utf8 default NULL,
  `fed_tax_id` varchar(50) character set utf8 default NULL,
  `perpetual_inventory` tinyint(1) default NULL,
  `out_of_stock_checking` tinyint(1) default NULL,
  `purchase_order_restocking` tinyint(1) default NULL,
  `item_categories` tinyint(1) default NULL,
  `supplier_numbering` double default NULL,
  `default_invoice_type` double default NULL,
  `default_bank_account_number` varchar(50) character set utf8 default NULL,
  `default_credit_card_account` varchar(50) character set utf8 default NULL,
  `invoice_numbering` double default NULL,
  `use_sales_order_number` tinyint(1) default NULL,
  `customer_credit_account_number` int(11) default NULL,
  `supplier_credit_account_number` int(11) default NULL,
  `po_numbering` double default NULL,
  `invoice_message_copy__1` varchar(75) character set utf8 default NULL,
  `invoice_message_copy__2` varchar(75) character set utf8 default NULL,
  `invoice_message_copy__3` varchar(75) character set utf8 default NULL,
  `invoice_message_copy__4` varchar(75) character set utf8 default NULL,
  `invoice_message_copy__5` varchar(75) character set utf8 default NULL,
  `po_message_copy__1` varchar(75) character set utf8 default NULL,
  `po_message_copy__2` varchar(75) character set utf8 default NULL,
  `po_message_copy__3` varchar(75) character set utf8 default NULL,
  `po_message_copy__4` varchar(75) character set utf8 default NULL,
  `po_message_copy__5` varchar(75) character set utf8 default NULL,
  `bol_message_copy__1` varchar(75) character set utf8 default NULL,
  `bol_message_copy__2` varchar(75) character set utf8 default NULL,
  `bol_message_copy__3` varchar(75) character set utf8 default NULL,
  `bol_message_copy__4` varchar(75) character set utf8 default NULL,
  `inventory_tracking` double default NULL,
  `inventory_costing` double default NULL,
  `customer_order` double default NULL,
  `customer_numbering` double default NULL,
  `general_ledger` tinyint(1) default NULL,
  `freight_taxable` tinyint(1) default NULL,
  `other_taxable` tinyint(1) default NULL,
  `accounts_receivable` int(11) default NULL,
  `so_freight` int(11) default NULL,
  `so_other` int(11) default NULL,
  `so_tax` int(11) default NULL,
  `so_tax_2` int(11) default NULL,
  `so_discounts_given` int(11) default NULL,
  `accounts_payable` int(11) default NULL,
  `po_freight` int(11) default NULL,
  `po_other` int(11) default NULL,
  `po_tax` int(11) default NULL,
  `po_tax_2` int(11) default NULL,
  `po_discounts_taken` int(11) default NULL,
  `inventory` int(11) default NULL,
  `inventory_sales` int(11) default NULL,
  `inventory_cogs` int(11) default NULL,
  `maximize_on_640` tinyint(1) default NULL,
  `invoice_number` varchar(20) character set utf8 default NULL,
  `po_number` varchar(50) character set utf8 default NULL,
  `quote_number` varchar(22) character set utf8 default NULL,
  `sales_order_number` varchar(22) character set utf8 default NULL,
  `gl_post_date` int(11) default NULL,
  `security` tinyint(1) default NULL,
  `sales_selection` int(11) default NULL,
  `printed_check_password` varchar(50) character set utf8 default NULL,
  `unpost_password` varchar(50) character set utf8 default NULL,
  `undeposited_checks` tinyint(1) default NULL,
  `autostub` tinyint(1) default NULL,
  `startup_company_schedule` tinyint(1) default NULL,
  `po_show_items` double default NULL,
  `acctproglocation` varchar(100) character set utf8 default NULL,
  `payrollproglocation` varchar(100) character set utf8 default NULL,
  `payrolldatalocation` varchar(100) character set utf8 default NULL,
  `custbalupdated` datetime default NULL,
  `display_shiptos` double default NULL,
  `version` varchar(4) character set utf8 default NULL,
  `inventorysearch` int(11) default NULL,
  `barcodeinventorystandard` tinyint(1) default NULL,
  `barcodeinventorywarehouse` tinyint(1) default NULL,
  `barcodepo` tinyint(1) default NULL,
  `barcodesales` tinyint(1) default NULL,
  `invpridec` int(11) default NULL,
  `invqtydec` int(11) default NULL,
  `payrollsystem` double default NULL,
  `poitemdisplay` int(11) default NULL,
  `salesitemdisplay` int(11) default NULL,
  `salpridec` int(11) default NULL,
  `salqtydec` int(11) default NULL,
  `state_tax_id` varchar(15) character set utf8 default NULL,
  `gl_post_date_2` int(11) default NULL,
  `earning_account` int(11) default NULL,
  `year_earning_account` int(11) default NULL,
  `historical_balance_account` int(11) default NULL,
  `default_cash_payment_account` int(11) default NULL,
  `invamtdec` int(11) default NULL,
  `salamtdec` int(11) default NULL,
  `purpridec` int(11) default NULL,
  `purqtydec` int(11) default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`company_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of preferences
-- ----------------------------
INSERT INTO `preferences` VALUES ('MYPOS', 'Sample Company', 'Software Development Company x', 'Bagian Penjualan', 'Bagian Pembelian', 'MyPOS Retail System', 'Baghdad Square - Royal Park', 'Ph. 021-200022x', '021-393939x', '021-939399x', '021-939399x', '002.299.1999.7.000', '1', '1', '1', '1', '0', '0', 'BCA', '100.1000.10000', '0', '1', '1373', '1421', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', '0', '1', '1', '1', '1', '1373', '1417', '1482', '1482', '1219', '1416', '1393', '1420', '1484', '1458', '1219', '1421', '1374', '1415', '1419', '1', '1006', null, null, '0', '443', '1', '0', null, 'Admin', '1', '1', '1', '1', null, null, null, null, '1', null, '1', '1', '1', '1', '1', '2', '2', '0', '1', '1', '2', '2', null, '1', '1483', '1408', '1410', '1370', null, null, '2', '2', '1');
INSERT INTO `preferences` VALUES ('T01', 'TOKO ALAM JAYA', null, null, null, 'JL. RAYA SUBANG NO. 20 PURWAKARTA', '0', 'PURWAKARTA', '0264-2929929', '0264-29292929', 'andri@talagasoft.com', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `preferences` VALUES ('T02', 'Toko Sabar Indah', null, null, null, 'Jl. Pinangsia No, 39', '0', 'Jakarta Kota', '021693883', '', '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `preferences` VALUES ('C01', 'Head Office', '', '', '', 'Jl. Raya Kalibata No. 29', '', 'Jakarta', '021-2020022', '', '', '', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '0', '0', '0', '', '', '0', '0', '0', '0', '', '', '', '2013-09-08 00:00:00', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `preferences` VALUES ('C02', 'Budidaya Lele', '', '', '', 'JL. RAYA SADANG NO. 29', '', 'Purwakarta', '08219292', '02192828', 'budi@localhost.com', '', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '0', '0', '0', '', '', '0', '0', '0', '0', '', '', '', '2013-09-08 00:00:00', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `promosi_disc`
-- ----------------------------
DROP TABLE IF EXISTS `promosi_disc`;
CREATE TABLE `promosi_disc` (
  `promosi_code` varchar(50) character set utf8 NOT NULL,
  `description` varchar(50) character set utf8 default NULL,
  `date_from` datetime default NULL,
  `category` int(11) default NULL,
  `date_to` datetime default NULL,
  `tipe` int(11) default NULL,
  `qty` double default NULL,
  `nilai` double default NULL,
  `issameitem` int(11) default NULL,
  `update_status` int(11) default NULL,
  `outlet` varchar(50) character set utf8 default NULL,
  `disc_base` varchar(50) character set utf8 default NULL,
  `total_sales` double default NULL,
  `method` int(11) default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  `flag1` bit(1) default NULL,
  `flag2` bit(1) default NULL,
  `flag3` bit(1) default NULL,
  `flag4` bit(1) default NULL,
  `flag5` bit(1) default NULL,
  PRIMARY KEY  (`promosi_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of promosi_disc
-- ----------------------------

-- ----------------------------
-- Table structure for `promosi_extra_item`
-- ----------------------------
DROP TABLE IF EXISTS `promosi_extra_item`;
CREATE TABLE `promosi_extra_item` (
  `id` int(11) NOT NULL auto_increment,
  `promosi_code` varchar(50) character set utf8 default NULL,
  `item_number` varchar(50) character set utf8 default NULL,
  `description` varchar(50) character set utf8 default NULL,
  `table_name` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  `field1` varchar(50) character set utf8 default NULL,
  `field2` varchar(50) character set utf8 default NULL,
  `field3` varchar(50) character set utf8 default NULL,
  `field4` varchar(50) character set utf8 default NULL,
  `field5` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`id`),
  KEY `x1` (`promosi_code`,`item_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of promosi_extra_item
-- ----------------------------

-- ----------------------------
-- Table structure for `promosi_item`
-- ----------------------------
DROP TABLE IF EXISTS `promosi_item`;
CREATE TABLE `promosi_item` (
  `promosi_code` varchar(50) character set utf8 default NULL,
  `item_number` varchar(50) character set utf8 default NULL,
  `description` varchar(50) character set utf8 default NULL,
  `table_name` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x1` (`promosi_code`,`item_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of promosi_item
-- ----------------------------

-- ----------------------------
-- Table structure for `promosi_item_category`
-- ----------------------------
DROP TABLE IF EXISTS `promosi_item_category`;
CREATE TABLE `promosi_item_category` (
  `id` int(11) NOT NULL auto_increment,
  `promosi_code` varchar(50) character set utf8 default NULL,
  `kode_category` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of promosi_item_category
-- ----------------------------

-- ----------------------------
-- Table structure for `promosi_item_customer`
-- ----------------------------
DROP TABLE IF EXISTS `promosi_item_customer`;
CREATE TABLE `promosi_item_customer` (
  `id` int(11) NOT NULL auto_increment,
  `promosi_code` varchar(50) character set utf8 default NULL,
  `cust_code` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of promosi_item_customer
-- ----------------------------

-- ----------------------------
-- Table structure for `promosi_outlet`
-- ----------------------------
DROP TABLE IF EXISTS `promosi_outlet`;
CREATE TABLE `promosi_outlet` (
  `outlet` varchar(50) character set utf8 default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of promosi_outlet
-- ----------------------------

-- ----------------------------
-- Table structure for `promosi_point_transactions`
-- ----------------------------
DROP TABLE IF EXISTS `promosi_point_transactions`;
CREATE TABLE `promosi_point_transactions` (
  `id` int(11) NOT NULL auto_increment,
  `cust_code` varchar(50) character set utf8 default NULL,
  `tanggal` datetime default NULL,
  `jenis_transaksi` varchar(50) character set utf8 default NULL,
  `point` int(11) default NULL,
  `amount` int(11) default NULL,
  `ref1` varchar(50) character set utf8 default NULL,
  `ref2` varchar(50) character set utf8 default NULL,
  `ref3` varchar(50) character set utf8 default NULL,
  `ref4` varchar(50) character set utf8 default NULL,
  `ref5` varchar(50) character set utf8 default NULL,
  `nilai` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of promosi_point_transactions
-- ----------------------------

-- ----------------------------
-- Table structure for `promosi_time`
-- ----------------------------
DROP TABLE IF EXISTS `promosi_time`;
CREATE TABLE `promosi_time` (
  `time_value` varchar(50) character set utf8 default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of promosi_time
-- ----------------------------

-- ----------------------------
-- Table structure for `purchase_order`
-- ----------------------------
DROP TABLE IF EXISTS `purchase_order`;
CREATE TABLE `purchase_order` (
  `purchase_order_number` varchar(50) character set utf8 NOT NULL,
  `supplier_number` varchar(50) character set utf8 default NULL,
  `po_date` datetime default NULL,
  `due_date` datetime default NULL,
  `inv_date` datetime default NULL,
  `ship_to_contact` varchar(15) character set utf8 default NULL,
  `bill_to_contact` varchar(15) character set utf8 default NULL,
  `ordered_by` varchar(50) character set utf8 default NULL,
  `terms` varchar(50) character set utf8 default NULL,
  `fob` varchar(50) character set utf8 default NULL,
  `shipped_via` varchar(50) character set utf8 default NULL,
  `ship_date` varchar(50) character set utf8 default NULL,
  `approved_by` varchar(50) character set utf8 default NULL,
  `approved_date` datetime default NULL,
  `freight` double default NULL,
  `tax` double default NULL,
  `tax_2` double default NULL,
  `other` double default NULL,
  `received` tinyint(1) default NULL,
  `paid` tinyint(1) default NULL,
  `ship_customer_display` varchar(50) character set utf8 default NULL,
  `bill_customer_display` varchar(50) character set utf8 default NULL,
  `posted` tinyint(1) default NULL,
  `posting_gl_id` varchar(50) character set utf8 default NULL,
  `discount` double default NULL,
  `potype` varchar(5) character set utf8 default NULL,
  `po_ref` varchar(50) character set utf8 default NULL,
  `uang_muka` double default NULL,
  `saldo_invoice` double default NULL,
  `comments` varchar(250) default NULL,
  `account_id` int(11) default NULL,
  `disc_amount_1` double default NULL,
  `disc_2` double(11,0) default NULL,
  `disc_amount_2` double default NULL,
  `disc_3` double(11,0) default NULL,
  `disc_amount_3` double default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `amount` double default NULL,
  `type_of_invoice` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `tax_amount` double default NULL,
  `warehouse_code` varchar(50) default NULL,
  `currency_code` varchar(50) default NULL,
  `currency_rate` double default NULL,
  `subtotal` double default NULL,
  PRIMARY KEY  (`purchase_order_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase_order
-- ----------------------------
INSERT INTO `purchase_order` VALUES ('PO00091', 'ALFAMART', '2012-11-25 00:00:00', '2012-11-25 00:00:00', null, null, null, '', 'Kredit', null, '', '', '', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null, null, null, null, null, '0', 'P', '', null, null, '', '0', '0', '0', '0', '0', '0', null, null, '0', 'Simple', null, '0', 'Purwakarta', 'IDR', '1', '9000');
INSERT INTO `purchase_order` VALUES ('PO00092', 'PO00092', '2013-01-04 00:00:00', '2013-01-04 00:00:00', null, null, null, '', 'Kredit', null, '', '', '', '0000-00-00 00:00:00', '0', '0', '0', '0', '1', null, null, null, null, null, '0', 'P', '', '0', null, '', '0', '0', '0', '0', '0', '0', null, null, '0', 'Simple', null, '0', 'Jakarta', 'IDR', '1', '6');
INSERT INTO `purchase_order` VALUES ('PBL00115', 'ALFAMART', '2013-01-04 00:00:00', '2013-01-04 00:00:00', '0000-00-00 00:00:00', '', '', '', 'Kredit', '', '', '', '', '0000-00-00 00:00:00', '0', '0', '0', '0', '1', '1', '', '', '0', '', '0', 'I', 'PO00092', '0', '0', '', '0', '0', '0', '0', '0', '0', '', '0', '15000', 'Simple', '0000-00-00 00:00:00', '0', 'Jakarta', 'IDR', '1', '6000');
INSERT INTO `purchase_order` VALUES ('PO00093', 'PO00094', '2013-04-18 00:00:00', '2013-04-18 00:00:00', null, null, null, null, 'Kredit', null, null, null, null, null, '0', '0', null, '0', null, null, null, null, null, null, '0', 'P', '', '0', null, '', '0', '0', null, null, null, null, null, null, '0', null, null, null, 'Jakarta', 'IDR', '1', '0');
INSERT INTO `purchase_order` VALUES ('PO00094', 'PO00094', '2013-04-18 00:00:00', '2013-04-18 00:00:00', null, null, null, null, 'Kredit', null, null, null, null, null, '0', '0', null, '0', null, null, null, null, null, null, '0', 'P', '', '0', null, '', '0', '0', null, null, null, null, null, null, '0', null, null, null, 'Jakarta', 'IDR', '1', '0');
INSERT INTO `purchase_order` VALUES ('PO00095', 'PO00095', '2013-05-05 00:00:00', '2013-05-05 00:00:00', null, null, null, null, 'Kredit', null, null, null, null, null, '0', '0', null, '0', null, null, null, null, null, null, '0', 'P', '', '0', null, '', '0', '0', null, null, null, null, null, null, '0', null, null, null, 'Jakarta', 'IDR', '1', '0');
INSERT INTO `purchase_order` VALUES ('FBC0100001', 'ALFAMART', '2013-05-13 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'C01', null, null, null);
INSERT INTO `purchase_order` VALUES ('FBC0100002', 'ALFAMART', '2013-05-13 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'C01', null, null, null);
INSERT INTO `purchase_order` VALUES ('FBC0100003', 'ALFAMART', '2013-05-17 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'C01', null, null, null);
INSERT INTO `purchase_order` VALUES ('FBC0100004', 'ALFAMART', '2013-05-17 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'I', null, null, null, null, null, null, null, null, null, null, null, null, '190000', null, null, null, 'C01', null, null, null);
INSERT INTO `purchase_order` VALUES ('FBC0100005', 'ALFAMART', '2013-05-17 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'I', null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'C01', null, null, null);
INSERT INTO `purchase_order` VALUES ('FBC0100006', 'ALFAMART', '2013-05-17 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'I', null, null, null, null, null, null, null, null, null, null, null, null, '29900', null, null, null, 'C01', null, null, null);
INSERT INTO `purchase_order` VALUES ('FBC0100007', 'ALFAMART', '2013-05-17 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'I', null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'C01', null, null, null);
INSERT INTO `purchase_order` VALUES ('FBC0100008', 'ALFAMART', '2013-05-18 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'I', null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'C01', null, null, null);
INSERT INTO `purchase_order` VALUES ('FBC0100009', 'ALFAMART', '2013-05-25 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'I', null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'C01', null, null, null);
INSERT INTO `purchase_order` VALUES ('PR00001', 'ALFAMART', '2013-08-17 00:00:00', '2013-08-17 00:00:00', '2013-08-17 00:00:00', '', '', '', '', '', '', '', '', '2013-08-17 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PI00002', '0', '0', '', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-17 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PO00096', 'ALFAMART', '2013-08-14 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'C01', null, null, null);
INSERT INTO `purchase_order` VALUES ('PO00096a', 'ALFAMART', '2013-08-14 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'C01', null, null, null);
INSERT INTO `purchase_order` VALUES ('PR00002', 'ALFAMART', '2013-08-17 00:00:00', '2013-08-17 00:00:00', '2013-08-17 00:00:00', '', '', '', '', '', '', '', '', '2013-08-17 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PI00002', '0', '0', '', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-17 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PO00108', 'ALFAMART', '2013-08-16 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'O', null, null, null, '', null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null);
INSERT INTO `purchase_order` VALUES ('PI00001', 'ALFAMART', '2013-08-17 00:00:00', null, null, null, null, null, 'Kredit 30 Hari', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'I', null, null, null, 'test', null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null);
INSERT INTO `purchase_order` VALUES ('PI00002', 'ALFAMART', '2013-08-17 00:00:00', null, null, null, null, null, 'Kredit 30 Hari', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'I', null, null, null, '', null, null, null, null, null, null, null, null, '11900', null, null, null, null, null, null, null);
INSERT INTO `purchase_order` VALUES ('PR00003', 'ALFAMART', '2013-08-17 00:00:00', '2013-08-17 00:00:00', '2013-08-17 00:00:00', '', '', '', '', '', '', '', '', '2013-08-17 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PI00002', '0', '0', '', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-17 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00004', 'ALFAMART', '2013-08-17 00:00:00', '2013-08-17 00:00:00', '2013-08-17 00:00:00', '', '', '', '', '', '', '', '', '2013-08-17 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', '', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-17 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00005', 'ALFAMART', '2013-08-17 00:00:00', '2013-08-17 00:00:00', '2013-08-17 00:00:00', '', '', '', '', '', '', '', '', '2013-08-17 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', '', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-17 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00006', 'ALFAMART', '2013-08-17 00:00:00', '2013-08-17 00:00:00', '2013-08-17 00:00:00', '', '', '', '', '', '', '', '', '2013-08-17 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', '', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-17 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00007', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', '', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00008', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Barang rusak', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00009', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00010', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00011', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00012', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00013', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00014', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00015', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00016', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00017', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00018', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00019', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00020', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00021', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00022', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00023', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '6000', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00024', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'Test', '0', '0', '0', '0', '0', '0', '', '0', '6000', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00025', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'abc', '0', '0', '0', '0', '0', '0', '', '0', '6000', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00026', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', 'test', '0', '0', '0', '0', '0', '0', '', '0', '6000', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PR00027', 'ALFAMART', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '2013-08-18 00:00:00', '', '', '', '', '', '', '', '', '2013-08-18 00:00:00', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', 'R', 'PBL00115', '0', '0', '', '0', '0', '0', '0', '0', '0', '', '0', '0', '', '2013-08-18 00:00:00', '0', '', '', '0', '0');
INSERT INTO `purchase_order` VALUES ('PO00109', 'KS', '2013-08-18 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'O', null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order` VALUES ('PI00003', 'KS', '2013-08-18 00:00:00', null, null, null, null, null, 'Kredit 30 Hari', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'I', null, null, null, '', null, null, null, null, null, null, null, null, '90000', null, null, null, null, null, null, null);
INSERT INTO `purchase_order` VALUES ('PO00110', 'ALFAMART', '2013-09-07 00:00:00', '1970-01-01 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'O', null, null, null, 'test', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order` VALUES ('PO00110A', 'ALFAMART', '2013-09-07 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'O', null, null, null, 'test', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order` VALUES ('PI00004', 'ALFAMART', '1970-01-01 00:00:00', null, null, null, null, null, '60 Hari', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'I', null, null, null, 'TEST', null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `purchase_order_lineitems`
-- ----------------------------
DROP TABLE IF EXISTS `purchase_order_lineitems`;
CREATE TABLE `purchase_order_lineitems` (
  `purchase_order_number` varchar(50) character set utf8 default NULL,
  `line_number` int(11) NOT NULL auto_increment,
  `item_number` varchar(50) character set utf8 default NULL,
  `stock_item_number` varchar(50) character set utf8 default NULL,
  `date_expec` datetime default NULL,
  `date_recvd` datetime default NULL,
  `description` varchar(255) character set utf8 default NULL,
  `price` double default NULL,
  `received` tinyint(1) default NULL,
  `comment` double default NULL,
  `serial_number` varchar(255) character set utf8 default NULL,
  `color` varchar(20) character set utf8 default NULL,
  `size` varchar(10) character set utf8 default NULL,
  `qty_recvd` double(11,0) default NULL,
  `quantity` double(11,0) default NULL,
  `discount` double(11,2) default NULL,
  `total_price` double default NULL,
  `unit` varchar(50) character set utf8 default NULL,
  `currency_code` varchar(50) character set utf8 default NULL,
  `currency_rate` double default NULL,
  `multi_unit` varchar(50) character set utf8 default NULL,
  `mu_qty` double(11,0) default NULL,
  `mu_harga` double default NULL,
  `forex_price` double default NULL,
  `base_curr_amount` double default NULL,
  `inventory_account` int(11) default NULL,
  `disc_amount_1` double default NULL,
  `disc_2` double(11,0) default NULL,
  `disc_amount_2` double default NULL,
  `disc_3` double(11,0) default NULL,
  `disc_amount_3` double default NULL,
  `update_status` int(11) default NULL,
  `from_line_number` int(11) default NULL,
  `from_line_type` varchar(50) character set utf8 default NULL,
  `from_line_doc` varchar(50) character set utf8 default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  `retail` double default NULL,
  `dept` varchar(50) character set utf8 default NULL,
  `dept_sub` varchar(50) character set utf8 default NULL,
  `price_margin` int(11) default NULL,
  `warehouse_code` varchar(50) default NULL,
  PRIMARY KEY  (`line_number`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase_order_lineitems
-- ----------------------------
INSERT INTO `purchase_order_lineitems` VALUES ('PO00091', '1', 'ABC', null, null, null, 'KOPI SUSU ABC', null, null, null, null, null, null, null, null, '0.00', '9000', null, null, null, 'PCS', '10', '900', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00092', '2', 'ABC', null, null, null, 'KOPI SUSU ABC', null, null, null, null, null, null, '1', null, '0.00', '1000', null, null, null, 'PCS', '1', '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00092', '3', 'SLNC', null, null, null, 'SALON PAS CAIR', null, null, null, null, null, null, '10', null, '0.00', '5000', null, null, null, '', '10', '500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PBL00115', '11', 'SLNC', null, null, null, 'SALON PAS CAIR', '500', null, null, null, null, null, null, '10', '0.00', '5000', '', null, null, '', '10', '500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PBL00115', '10', 'ABC', null, null, null, 'KOPI SUSU ABC', '1000', null, null, null, null, null, null, '1', '0.00', '1000', 'PCS', null, null, 'PCS', '1', '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100001', '12', '       8999099918278', null, null, null, 'SGM  prst 3 Madu 900g', '50500', null, null, null, null, null, null, '1', null, '50500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100001', '13', '01061101', null, null, null, 'ANANDAWRAP', '145000', null, null, null, null, null, null, '1', null, '145000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100001', '14', '012249100205', null, null, null, 'MAINAN KUNCI', '15000', null, null, null, null, null, null, '1', null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100001', '15', '012249555289', null, null, null, 'Gigitan IQ BBGBR KURA2', '16000', null, null, null, null, null, null, '1', null, '16000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100001', '16', ' 05021101', null, null, null, 'stelan puss kcg depan', '35000', null, null, null, null, null, null, '1', null, '35000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100002', '17', '       8999099918278', null, null, null, 'SGM  prst 3 Madu 900g', '50500', null, null, null, null, null, null, '5', null, '252500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100002', '18', '05021104', null, null, null, 'celana dalam kensini uk  L', '16000', null, null, null, null, null, null, '5', null, '80000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100002', '19', '100504', null, null, null, 'Celana Pendek warna-warni', '6500', null, null, null, null, null, null, '1', null, '6500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100003', '20', '01061101', null, null, null, 'ANANDAWRAP', '145000', null, null, null, null, null, null, '1', null, '145000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100003', '21', '01061102', null, null, null, 'ANANDAPERS REGULER', '70000', null, null, null, null, null, null, '1', null, '70000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100003', '22', '012249100205', null, null, null, 'MAINAN KUNCI', '15000', null, null, null, null, null, null, '1', null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100004', '23', ' 05021101', null, null, null, 'stelan puss kcg depan', '35000', null, null, null, null, null, null, '1', null, '35000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100004', '24', '012249088800', null, null, null, 'MAINAN KRINCING BEBEK', '17500', null, null, null, null, null, null, '1', null, '17500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100004', '25', '012249100472', null, null, null, 'MAINAN IKAN IQ BABY', '15000', null, null, null, null, null, null, '1', null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100004', '26', '012249101134', null, null, null, 'GIGITAN MOBIL IQ BABY', '10000', null, null, null, null, null, null, '1', null, '10000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100004', '27', '012249555289', null, null, null, 'Gigitan IQ BBGBR KURA2', '16000', null, null, null, null, null, null, '1', null, '16000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100004', '28', '012249100472', null, null, null, 'MAINAN IKAN IQ BABY', '15000', null, null, null, null, null, null, '1', null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100004', '31', '012249100205', null, null, null, 'MAINAN KUNCI', '15000', null, null, null, null, null, null, '1', null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100004', '32', '012249555289', null, null, null, 'Gigitan IQ BBGBR KURA2', '16000', null, null, null, null, null, null, '1', null, '16000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100004', '33', '       8999099918278', null, null, null, 'SGM  prst 3 Madu 900g', '50500', null, null, null, null, null, null, '1', null, '50500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100005', '34', '012249088800', null, null, null, 'MAINAN KRINCING BEBEK', '17500', null, null, null, null, null, null, '1', null, '17500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100005', '35', '012249100205', null, null, null, 'MAINAN KUNCI', '15000', null, null, null, null, null, null, '1', null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100005', '36', '012249101134', null, null, null, 'GIGITAN MOBIL IQ BABY', '10000', null, null, null, null, null, null, '1', null, '10000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100005', '37', '012249831925', null, null, null, 'GIGITAN BABY IQ BB BINTANG', '16000', null, null, null, null, null, null, '1', null, '16000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100005', '38', '012249832069', null, null, null, 'GIGITAN IQ BABY GBRKUCING', '16000', null, null, null, null, null, null, '1', null, '16000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100005', '39', '  05021103', null, null, null, 'Celana dlam cowok kensini uk M', '15000', null, null, null, null, null, null, '1', null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PR00024', '113', 'SLNC', null, null, null, 'SALON PAS CAIR', '500', null, null, null, null, null, null, '10', '0.00', '5000', '', null, null, '', '10', '500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PR00023', '111', 'SLNC', null, null, null, 'SALON PAS CAIR', '500', null, null, null, null, null, null, '10', '0.00', '5000', '', null, null, '', '10', '500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100006        ', '107', 'DJISAMSU', null, null, null, 'Djisamsu Kretek', '10000', null, null, null, null, null, null, '1', null, '10000', 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100006        ', '109', 'KOREK', null, null, null, 'Korek Gas', '2000', null, null, null, null, null, null, '1', null, '2000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100007', '44', '012249100205', null, null, null, 'MAINAN KUNCI', '15000', null, null, null, null, null, null, '1', null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100007', '45', '012249100472', null, null, null, 'MAINAN IKAN IQ BABY', '15000', null, null, null, null, null, null, '1', null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100007', '46', '012249101134', null, null, null, 'GIGITAN MOBIL IQ BABY', '10000', null, null, null, null, null, null, '1', null, '10000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100007', '47', '012249831925', null, null, null, 'GIGITAN BABY IQ BB BINTANG', '16000', null, null, null, null, null, null, '1', null, '16000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100007', '54', '01061101', null, null, null, 'ANANDAWRAP', '145000', null, null, null, null, null, null, '10', null, '1450000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100007', '49', '01061102', null, null, null, 'ANANDAPERS REGULER', '70000', null, null, null, null, null, null, '1', null, '70000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100007', '50', '012249088800', null, null, null, 'MAINAN KRINCING BEBEK', '17500', null, null, null, null, null, null, '1', null, '17500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100007', '51', '012249831925', null, null, null, 'GIGITAN BABY IQ BB BINTANG', '16000', null, null, null, null, null, null, '1', null, '16000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100007', '52', '012249555289', null, null, null, 'Gigitan IQ BBGBR KURA2', '16000', null, null, null, null, null, null, '1', null, '16000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100007', '53', '012249100205', null, null, null, 'MAINAN KUNCI', '15000', null, null, null, null, null, null, '1', null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100008', '55', '012249055390', null, null, null, 'MAINAN KRINCING SAPI', '17500', null, null, null, null, null, null, '1', null, '17500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100008', '56', '01061102', null, null, null, 'ANANDAPERS REGULER', '70000', null, null, null, null, null, null, '1', null, '70000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100008', '57', '012249100472', null, null, null, 'MAINAN IKAN IQ BABY', '15000', null, null, null, null, null, null, '1', null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100009', '58', '00520860101', null, null, null, 'BANDANA TREND LOVE', '20000', null, null, null, null, null, null, '1', null, '20000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100009', '59', '01061102', null, null, null, 'ANANDAPERS REGULER', '70000', null, null, null, null, null, null, '1', null, '70000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100009', '60', '012249100205', null, null, null, 'MAINAN KUNCI', '15000', null, null, null, null, null, null, '1', null, '15000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100009', '61', '012249555289', null, null, null, 'Gigitan IQ BBGBR KURA2', '16000', null, null, null, null, null, null, '1', null, '16000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100009', '62', '012249831925', null, null, null, 'GIGITAN BABY IQ BB BINTANG', '16000', null, null, null, null, null, null, '1', null, '16000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100006        ', '110', 'SAMP', null, null, null, 'Sampoerna Hijau', '7000', null, null, null, null, null, null, '1', null, '7000', 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100006        ', '105', 'ABC', null, null, null, 'Kopi Susu Abc', '900', null, null, null, null, null, null, '1', null, '900', 'PCS', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PR00023', '112', 'ABC', null, null, null, 'KOPI SUSU ABC', '1000', null, null, null, null, null, null, '1', '0.00', '1000', 'PCS', null, null, 'PCS', '1', '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('0', '67', '0', null, null, null, null, '0', null, null, null, null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00099                ', '72', 'AQ001', null, null, null, null, '100000', null, null, null, null, null, null, '1', null, '100000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00108                ', '96', 'SLNC', null, null, null, 'Salonpas Cair', '1000', null, null, null, null, null, null, '100', null, '100000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00108                ', '95', 'AQ001', null, null, null, 'Aqua Gelas', '1000', null, null, null, null, null, null, '100', null, '100000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00108                ', '93', 'KOREK', null, null, null, 'Korek Gas', '1000', null, null, null, null, null, null, '100', null, '100000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00108                ', '94', 'Palu', null, null, null, 'Palu', '1000', null, null, null, null, null, null, '10', null, '10000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00108                ', '89', 'AQ001', null, null, null, 'Aqua Gelas', '1000', null, null, null, null, null, null, '1', null, '1000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00108                ', '90', 'AQ001', null, null, null, 'Aqua Gelas', '1000', null, null, null, null, null, null, '1', null, '1000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00108                ', '91', 'DJISAMSU', null, null, null, 'Djisamsu Kretek', '1000', null, null, null, null, null, null, '1', null, '1000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00108                ', '92', 'DJISAMSU', null, null, null, 'Djisamsu Kretek', '1000', null, null, null, null, null, null, '100', null, '100000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PI00002        ', '100', 'DJISAMSU', null, null, null, 'Djisamsu Kretek', '10000', null, null, null, null, null, null, '1', null, '10000', 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PBL00115        ', '101', 'SLNC', null, null, null, 'Salonpas Cair', '4000', null, null, null, null, null, null, '1', null, '4000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PI00002        ', '99', 'CD', null, null, null, 'CD Blank Maxel', '1000', null, null, null, null, null, null, '1', null, '1000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PI00002        ', '98', 'AQ001', null, null, null, 'Aqua Gelas', '900', null, null, null, null, null, null, '1', null, '900', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00108                ', '97', 'SAMP', null, null, null, 'Sampoerna Hijau', '1000', null, null, null, null, null, null, '100', null, '100000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('FBC0100006        ', '102', 'DJISAMSU', null, null, null, 'Djisamsu Kretek', '10000', null, null, null, null, null, null, '1', null, '10000', 'Bks', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PR00024', '114', 'ABC', null, null, null, 'KOPI SUSU ABC', '1000', null, null, null, null, null, null, '1', '0.00', '1000', 'PCS', null, null, 'PCS', '1', '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PR00025', '115', 'SLNC', null, null, null, 'SALON PAS CAIR', '500', null, null, null, null, null, null, '10', '0.00', '5000', '', null, null, '', '10', '500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PR00025', '116', 'ABC', null, null, null, 'KOPI SUSU ABC', '1000', null, null, null, null, null, null, '1', '0.00', '1000', 'PCS', null, null, 'PCS', '1', '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PR00026', '117', 'SLNC', null, null, null, 'SALON PAS CAIR', '500', null, null, null, null, null, null, '10', '0.00', '5000', '', null, null, '', '10', '500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PR00026', '118', 'ABC', null, null, null, 'KOPI SUSU ABC', '1000', null, null, null, null, null, null, '1', '0.00', '1000', 'PCS', null, null, 'PCS', '1', '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PBL00115', '119', 'SLNC', null, null, null, 'SALON PAS CAIR', '500', null, null, null, null, null, null, '10', '0.00', '5000', '', null, null, '', '10', '500', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00109                ', '120', 'AQ001', null, null, null, 'Aqua Gelas', '900', null, null, null, null, null, null, '100', null, '90000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PI00003        ', '121', 'AQ001', null, null, null, 'Aqua Gelas', '900', null, null, null, null, null, null, '100', null, '90000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00109                ', '122', 'Palu', null, null, null, 'Palu', '20000', null, null, null, null, null, null, '1', null, '20000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00109                ', '123', 'AQ001', null, null, null, 'Aqua Gelas', '900', null, null, null, null, null, null, '1', null, '900', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00110A                ', '124', 'CD', null, null, null, 'CD Blank Maxel', '1000', null, null, null, null, null, null, '1', null, '1000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00110A                ', '125', 'Palu', null, null, null, 'Palu', '20000', null, null, null, null, null, null, '1', null, '20000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PO00110                ', '126', 'AQ001', null, null, null, 'Aqua Gelas', '900', null, null, null, null, null, null, '1', null, '900', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PI00004        ', '127', 'CD', null, null, null, 'CD Blank Maxel', '1000', null, null, null, null, null, null, '1', null, '1000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `purchase_order_lineitems` VALUES ('PI00004        ', '128', 'CD', null, null, null, 'CD Blank Maxel', '1000', null, null, null, null, null, null, '1', null, '1000', 'Pcs', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `quotation`
-- ----------------------------
DROP TABLE IF EXISTS `quotation`;
CREATE TABLE `quotation` (
  `sales_order_number` varchar(22) character set utf8 NOT NULL,
  `invoice_number` varchar(20) character set utf8 default NULL,
  `type_of_invoice` varchar(50) character set utf8 default NULL,
  `sold_to_customer` varchar(15) character set utf8 default NULL,
  `ship_to_customer` varchar(15) character set utf8 default NULL,
  `sales_date` datetime default NULL,
  `your_order__` varchar(20) character set utf8 default NULL,
  `source_of_order` varchar(50) character set utf8 default NULL,
  `payment_terms` varchar(20) character set utf8 default NULL,
  `salesman` varchar(30) character set utf8 default NULL,
  `shipped_via` varchar(20) character set utf8 default NULL,
  `tax` double default NULL,
  `tax_2` double default NULL,
  `other` double default NULL,
  `freight` double default NULL,
  `discount` double default NULL,
  `comments` double default NULL,
  `sales_tax_code` varchar(10) character set utf8 default NULL,
  `sales_tax_percent` double(11,0) default NULL,
  `sales_tax2_code` varchar(10) character set utf8 default NULL,
  `sales_tax_percent_2` double(11,0) default NULL,
  `disc_amount_1` double default NULL,
  `disc_2` double(11,0) default NULL,
  `disc_amount_2` double default NULL,
  `disc_3` double(11,0) default NULL,
  `disc_amount_3` double default NULL,
  `create_invoice` bit(1) default NULL,
  `delivered` bit(1) default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`sales_order_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of quotation
-- ----------------------------

-- ----------------------------
-- Table structure for `quotation_lineitems`
-- ----------------------------
DROP TABLE IF EXISTS `quotation_lineitems`;
CREATE TABLE `quotation_lineitems` (
  `sales_order_number` varchar(50) character set utf8 default NULL,
  `line_number` int(11) NOT NULL auto_increment,
  `item_number` varchar(50) character set utf8 default NULL,
  `quantity` double(11,0) default NULL,
  `unit` varchar(15) character set utf8 default NULL,
  `description` varchar(255) character set utf8 default NULL,
  `price` double default NULL,
  `discount` int(11) default NULL,
  `taxable` bit(1) default NULL,
  `ship_date` datetime default NULL,
  `ship_qty` double(11,0) default NULL,
  `serial_number` varchar(50) character set utf8 default NULL,
  `job_reference` varchar(50) character set utf8 default NULL,
  `comments` double default NULL,
  `color` varchar(20) character set utf8 default NULL,
  `size` varchar(10) character set utf8 default NULL,
  `warehouse_code` varchar(15) character set utf8 default NULL,
  `amount` double default NULL,
  `forex_price` double default NULL,
  `base_curr_amount` double default NULL,
  `cost` double default NULL,
  `revenue_acct_id` int(11) default NULL,
  `currency_code` varchar(255) character set utf8 default NULL,
  `currency_rate` int(11) default NULL,
  `multi_unit` varchar(255) character set utf8 default NULL,
  `mu_qty` double(255,0) default NULL,
  `mu_harga` double default NULL,
  `discount_amount` double default NULL,
  `disc_2` double(11,0) default NULL,
  `disc_amount_2` double default NULL,
  `disc_3` double(11,0) default NULL,
  `disc_amount_3` double default NULL,
  `disc_amount_1` double default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`line_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of quotation_lineitems
-- ----------------------------

-- ----------------------------
-- Table structure for `report_list`
-- ----------------------------
DROP TABLE IF EXISTS `report_list`;
CREATE TABLE `report_list` (
  `report_code` varchar(75) character set utf8 NOT NULL,
  `report_name` varchar(255) character set utf8 default NULL,
  `report_category` double default NULL,
  `query_name` double default NULL,
  `description` double default NULL,
  `date_selectors` bit(1) default NULL,
  `category_selectors` bit(1) default NULL,
  `category_query` varchar(255) default NULL,
  `category_text` varchar(255) default NULL,
  `category_2_selectors` bit(1) default NULL,
  `category_2_query` varchar(255) default NULL,
  `category_2_text` varchar(255) default NULL,
  `image` double default NULL,
  `criteriatype` varchar(50) character set utf8 default NULL,
  `criteria2type` varchar(50) character set utf8 default NULL,
  `report_filename` varchar(50) character set utf8 default NULL,
  `field_selection` varchar(255) default NULL,
  `date_field_selection` varchar(255) default NULL,
  `field_2_selection` varchar(255) default NULL,
  `visible` bit(1) default NULL,
  `created_date` datetime default NULL,
  `update_status` int(11) default NULL,
  `criteria3type` varchar(50) character set utf8 default NULL,
  `category_3_selectors` bit(1) default NULL,
  `category_3_query` varchar(250) character set utf8 default NULL,
  `category_3_text` varchar(250) character set utf8 default NULL,
  `field_3_selection` varchar(250) character set utf8 default NULL,
  `criteria4type` varchar(50) character set utf8 default NULL,
  `category_4_selectors` bit(1) default NULL,
  `category_4_query` varchar(250) character set utf8 default NULL,
  `field_4_selection` varchar(250) character set utf8 default NULL,
  `category_4_text` varchar(250) character set utf8 default NULL,
  `criteria5type` varchar(50) character set utf8 default NULL,
  `category_5_selectors` bit(1) default NULL,
  `category_5_query` varchar(250) character set utf8 default NULL,
  `field_5_selection` varchar(250) character set utf8 default NULL,
  `category_5_text` varchar(250) character set utf8 default NULL,
  PRIMARY KEY  (`report_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of report_list
-- ----------------------------

-- ----------------------------
-- Table structure for `rpt_open_to_buy`
-- ----------------------------
DROP TABLE IF EXISTS `rpt_open_to_buy`;
CREATE TABLE `rpt_open_to_buy` (
  `item_number` varchar(50) character set utf8 default NULL,
  `period_mm` int(11) default NULL,
  `opening_stock` double default NULL,
  `forecast_sales` double default NULL,
  `period_forward_cover` double default NULL,
  `closing_stock_required` double default NULL,
  `intake_required` double default NULL,
  `on_order` double default NULL,
  `otb_remaining` double default NULL,
  `closing_stock` double default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rpt_open_to_buy
-- ----------------------------

-- ----------------------------
-- Table structure for `sales_order`
-- ----------------------------
DROP TABLE IF EXISTS `sales_order`;
CREATE TABLE `sales_order` (
  `sales_order_number` varchar(22) character set utf8 NOT NULL,
  `invoice_number` varchar(20) character set utf8 default NULL,
  `type_of_invoice` varchar(50) character set utf8 default NULL,
  `sold_to_customer` varchar(15) character set utf8 default NULL,
  `ship_to_customer` varchar(15) character set utf8 default NULL,
  `sales_date` datetime default NULL,
  `your_order__` varchar(20) character set utf8 default NULL,
  `source_of_order` varchar(50) character set utf8 default NULL,
  `payment_terms` varchar(20) character set utf8 default NULL,
  `salesman` varchar(30) character set utf8 default NULL,
  `shipped_via` varchar(20) character set utf8 default NULL,
  `tax` double default NULL,
  `tax_2` double default NULL,
  `freight` double default NULL,
  `discount` double default NULL,
  `other` double default NULL,
  `back_order` bit(1) default NULL,
  `comments` varchar(255) default NULL,
  `sales_tax_code` varchar(10) character set utf8 default NULL,
  `sales_tax_percent` double(11,0) default NULL,
  `sales_tax2_code` varchar(10) character set utf8 default NULL,
  `sales_tax_percent_2` double(11,0) default NULL,
  `create_invoice` bit(1) default NULL,
  `disc_amount_1` double default NULL,
  `disc_2` int(11) default NULL,
  `disc_amount_2` double default NULL,
  `disc_3` int(11) default NULL,
  `disc_amount_3` double default NULL,
  `delivered` int(1) default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `uang_muka` double default NULL,
  `amount` double default NULL,
  `saldo` double default NULL,
  `close_by` varchar(50) character set utf8 default NULL,
  `close_date` datetime default NULL,
  `close_memo` varchar(200) character set utf8 default NULL,
  `approved` bit(1) default NULL,
  `appr_by` varchar(50) character set utf8 default NULL,
  `appr_date` varchar(50) character set utf8 default NULL,
  `appr_memo` varchar(200) character set utf8 default NULL,
  `status` int(11) default NULL,
  `cancel_by` varchar(50) character set utf8 default NULL,
  `cancel_date` datetime default NULL,
  `cancel_memo` varchar(200) character set utf8 default NULL,
  `pending_by` varchar(50) character set utf8 default NULL,
  `pending_date` datetime default NULL,
  `pending_memo` varchar(200) character set utf8 default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  `due_date` datetime default NULL,
  `currency_code` varchar(50) default NULL,
  `currency_rate` double default NULL,
  `subtotal` double default NULL,
  `ship_date` datetime default NULL,
  `warehouse_code` varchar(50) default NULL,
  `account_id` int(11) default NULL,
  `paid` int(1) default NULL,
  PRIMARY KEY  (`sales_order_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sales_order
-- ----------------------------
INSERT INTO `sales_order` VALUES ('SO00075', null, null, 'Irfan', null, '1970-01-01 00:00:00', null, null, '60 Hari', 'Andri', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '45000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1970-01-01 00:00:00', null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00074', null, null, 'Irfan', null, '2013-09-02 07:00:00', null, null, '60 Hari', 'Andri', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '25000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1970-01-01 00:00:00', null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00058', null, null, 'A-BGR-0001', null, '2013-08-19 00:00:00', null, null, 'Kredit 30 Hari', 'Andri', null, null, null, null, null, null, null, 'Test', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00059', null, null, 'A-BGR-0001', null, '2013-08-19 00:00:00', null, null, 'Kredit 30 Hari', 'Andri', null, null, null, null, null, null, null, 'Test', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00060', null, null, 'A-BGR-0001', null, '2013-08-19 00:00:00', null, null, 'Kredit 30 Hari', 'Andri', null, null, null, null, null, null, null, 'Test', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00061', null, null, 'A-BGR-0001', null, '2013-08-19 00:00:00', null, null, 'Kredit 30 Hari', 'Andri', null, null, null, null, null, null, null, 'Test', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00062', null, null, 'C102', null, '2013-08-19 00:00:00', null, null, 'Kredit 30 Hari', 'Dian', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00063', null, null, 'C102', null, '2013-08-19 00:00:00', null, null, 'Kredit 30 Hari', 'Dian', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00064', null, null, 'C102', null, '2013-08-19 00:00:00', null, null, 'Kredit 30 Hari', 'Dian', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00065', null, null, 'C102', null, '2013-08-19 00:00:00', null, null, 'Kredit 30 Hari', 'Dian', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00066', null, null, 'C102', null, '2013-08-19 00:00:00', null, null, 'Kredit 30 Hari', 'Dian', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00067', null, null, 'A-BKS-0002', null, '2013-08-19 00:00:00', null, null, 'Kredit 30 Hari', 'Andri', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00068', null, null, '12019', null, '2013-08-19 00:00:00', null, null, 'Kredit 30 Hari', 'Andri', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00069', null, null, 'A-BKS-0002', null, '2013-08-20 00:00:00', null, null, 'Kredit 30 Hari', 'Andri', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00070', null, null, 'C102', null, '2013-08-21 00:00:00', null, null, 'Kredit 30 Hari', 'Andri', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00071', null, null, 'Irfan', null, '2013-09-02 07:00:00', null, null, '60 Hari', 'Andri', null, null, null, null, null, null, null, 'test', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00072', null, null, 'Irfan', null, '2013-09-01 07:00:00', null, null, '60 Hari', 'Andri', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00073', null, null, '12019', null, '2013-09-30 07:00:00', null, null, '60 Hari', 'Andri', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00076', null, null, 'ANDRI', null, '2013-09-02 07:00:00', null, null, '60 Hari', 'Andri', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1970-01-01 00:00:00', null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00077', null, null, '0', null, '1970-01-01 00:00:00', null, null, '0', '0', null, null, null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1970-01-01 00:00:00', null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00078', null, null, '12019', null, '2013-09-02 07:00:00', null, null, '60 Hari', 'Dian', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2013-09-02 07:00:00', null, null, null, null, null, null, null);
INSERT INTO `sales_order` VALUES ('SO00079', null, null, 'C102', null, '2013-09-07 07:00:00', null, null, '60 Hari', 'Andri', null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2013-09-06 07:00:00', null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `sales_order_lineitems`
-- ----------------------------
DROP TABLE IF EXISTS `sales_order_lineitems`;
CREATE TABLE `sales_order_lineitems` (
  `sales_order_number` varchar(22) character set utf8 default NULL,
  `line_number` int(11) NOT NULL auto_increment,
  `item_number` varchar(50) character set utf8 default NULL,
  `quantity` double(11,0) default NULL,
  `unit` varchar(15) character set utf8 default NULL,
  `description` varchar(255) character set utf8 default NULL,
  `price` double default NULL,
  `discount` double(11,2) default NULL,
  `taxable` int(1) default NULL,
  `shipped` int(1) default NULL,
  `ship_date` datetime default NULL,
  `ship_qty` double(11,0) default NULL,
  `bo_qty` double(11,0) default NULL,
  `prev_ship_qty` double(11,0) default NULL,
  `serial_number` varchar(50) character set utf8 default NULL,
  `job_reference` varchar(50) character set utf8 default NULL,
  `comments` varchar(255) default NULL,
  `cost` double default NULL,
  `color` varchar(20) character set utf8 default NULL,
  `size` varchar(10) character set utf8 default NULL,
  `warehouse_code` varchar(15) character set utf8 default NULL,
  `revenue_acct_id` int(11) default NULL,
  `amount` double default NULL,
  `currency_code` varchar(50) character set utf8 default NULL,
  `currency_rate` double default NULL,
  `multi_unit` varchar(50) character set utf8 default NULL,
  `mu_qty` double(11,0) default NULL,
  `mu_harga` double default NULL,
  `discount_amount` double default NULL,
  `forex_price` double default NULL,
  `base_curr_amount` double default NULL,
  `disc_2` double(11,0) default NULL,
  `disc_amount_2` double default NULL,
  `disc_3` double(11,0) default NULL,
  `disc_amount_3` double default NULL,
  `disc_amount_1` double default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`line_number`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sales_order_lineitems
-- ----------------------------
INSERT INTO `sales_order_lineitems` VALUES ('SO00078', '47', 'Palu', '1', 'Pcs', 'Palu', '25000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '25000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00077', '44', 'KOREK', '1', 'Pcs', 'Korek Gas', '3000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00074', '42', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00058', '4', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00066', '10', 'ABC', '1', 'PCS', 'Kopi Susu Abc', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00066', '9', 'DJISAMSU', '10', 'Bks', 'Djisamsu Kretek', '12000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '120000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00066', '8', 'CD', '10', 'Pcs', 'CD Blank Maxel', '2000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '20000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00060', '11', 'Palu', '1', 'Pcs', 'Palu', '25000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '25000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00060', '12', 'Palu', '1', 'Pcs', 'Palu', '25000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '25000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00060', '13', 'SLNC', '1', 'Pcs', 'Salonpas Cair', '5000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '5000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00067', '14', 'KOREK', '1', 'Pcs', 'Korek Gas', '3000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00067', '15', 'KOREK', '1', 'Pcs', 'Korek Gas', '3000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00067', '16', 'ABC', '1', 'PCS', 'Kopi Susu Abc', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00067', '17', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00067', '18', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00067', '19', 'DJISAMSU', '1', '', 'Djisamsu Kretek', '0', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00067', '20', 'ABC', '1', 'PCS', 'Kopi Susu Abc', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00067', '21', 'Palu', '1', 'Pcs', 'Palu', '25000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '25000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00067', '22', 'SAMP', '1', 'Bks', 'Sampoerna Hijau', '8000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '8000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00062', '23', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00062', '24', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00062', '25', 'SLNC', '1', 'Pcs', 'Salonpas Cair', '5000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '5000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00068', '26', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00069', '27', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00069', '28', 'ABC', '1', 'PCS', 'Kopi Susu Abc', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00078', '46', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00074', '43', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00070', '31', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00077', '45', 'Palu', '1', 'Pcs', 'Palu', '25000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '25000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00071', '34', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00071', '35', 'SLNC', '1', 'Pcs', 'Salonpas Cair', '5000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '5000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00071', '36', 'KOREK', '1', 'Pcs', 'Korek Gas', '3000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00072', '37', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00073', '38', 'KOREK', '1', 'Pcs', 'Korek Gas', '3000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '3000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00073', '39', 'Palu', '1', 'Pcs', 'Palu', '25000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '25000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00073', '40', 'SLNC', '1', 'Pcs', 'Salonpas Cair', '5000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '5000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00073', '41', 'ABC', '1', 'PCS', 'Kopi Susu Abc', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00078', '48', 'ABC', '1', 'PCS', 'Kopi Susu Abc', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00075', '49', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00075', '50', 'ABC', '1', 'PCS', 'Kopi Susu Abc', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00075', '51', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00075', '52', 'CD', '1', 'Pcs', 'CD Blank Maxel', '2000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00075', '53', 'Palu', '1', 'Pcs', 'Palu', '25000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '25000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00075', '54', 'ABC', '1', 'PCS', 'Kopi Susu Abc', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00075', '55', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00074', '56', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00058', '57', 'DJISAMSU', '1', 'Bks', 'Djisamsu Kretek', '12000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '12000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00079', '58', 'AQ001', '1', 'Pcs', 'Aqua Gelas', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `sales_order_lineitems` VALUES ('SO00079', '59', 'ABC', '1', 'PCS', 'Kopi Susu Abc', '1000', null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '1000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `sales_tax_rates`
-- ----------------------------
DROP TABLE IF EXISTS `sales_tax_rates`;
CREATE TABLE `sales_tax_rates` (
  `code` varchar(10) character set utf8 NOT NULL,
  `tax_rate` int(11) default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sales_tax_rates
-- ----------------------------

-- ----------------------------
-- Table structure for `salesman`
-- ----------------------------
DROP TABLE IF EXISTS `salesman`;
CREATE TABLE `salesman` (
  `salesman` varchar(50) character set utf8 NOT NULL,
  `commission_rate_1` int(11) default NULL,
  `commission_rate_2` int(11) default NULL,
  `salestype` varchar(10) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`salesman`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salesman
-- ----------------------------
INSERT INTO `salesman` VALUES ('Andri', '10', '0', 'SalesToko', null, null, null, null, null);
INSERT INTO `salesman` VALUES ('Dian', '10', '20', 'Pengajian', null, null, null, null, null);
INSERT INTO `salesman` VALUES ('Ucok', '10', '0', 'Group 1', null, null, null, null, null);

-- ----------------------------
-- Table structure for `salesman_group`
-- ----------------------------
DROP TABLE IF EXISTS `salesman_group`;
CREATE TABLE `salesman_group` (
  `groupid` varchar(20) character set utf8 NOT NULL,
  `salesman` varchar(50) character set utf8 default NULL,
  `komisiprc` double(11,0) default NULL,
  `remarks` varchar(100) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salesman_group
-- ----------------------------

-- ----------------------------
-- Table structure for `salesman_group_komisi`
-- ----------------------------
DROP TABLE IF EXISTS `salesman_group_komisi`;
CREATE TABLE `salesman_group_komisi` (
  `created_date` datetime default NULL,
  `groupid` varchar(50) character set utf8 NOT NULL,
  `salesman` varchar(50) character set utf8 default NULL,
  `invoice_number` varchar(50) character set utf8 default NULL,
  `invoice_amount` double default NULL,
  `komisi_prc` double(11,0) default NULL,
  `komisi_amount` double default NULL,
  `keterangan` varchar(100) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salesman_group_komisi
-- ----------------------------

-- ----------------------------
-- Table structure for `salesman_komisi`
-- ----------------------------
DROP TABLE IF EXISTS `salesman_komisi`;
CREATE TABLE `salesman_komisi` (
  `low_amount` double default NULL,
  `high_amount` double default NULL,
  `persen_komisi` double(11,0) default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salesman_komisi
-- ----------------------------

-- ----------------------------
-- Table structure for `service_job_sparepart`
-- ----------------------------
DROP TABLE IF EXISTS `service_job_sparepart`;
CREATE TABLE `service_job_sparepart` (
  `job_id` varchar(50) character set utf8 default NULL,
  `qty` int(11) default NULL,
  `item_number` varchar(50) character set utf8 default NULL,
  `description` varchar(200) character set utf8 default NULL,
  `harga` double default NULL,
  `total` double default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service_job_sparepart
-- ----------------------------

-- ----------------------------
-- Table structure for `service_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `service_jobs`;
CREATE TABLE `service_jobs` (
  `job_id` varchar(50) character set utf8 NOT NULL,
  `service_number` varchar(50) character set utf8 default NULL,
  `teknisi` varchar(50) character set utf8 default NULL,
  `garansi` bit(1) default NULL,
  `job_finish` bit(1) default NULL,
  `ongkos_kerja` double default NULL,
  `masalah` varchar(50) character set utf8 default NULL,
  `pekerjaan` varchar(50) character set utf8 default NULL,
  `biaya_lain` double default NULL,
  `total_amt_part` double default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x1` (`job_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `service_order`
-- ----------------------------
DROP TABLE IF EXISTS `service_order`;
CREATE TABLE `service_order` (
  `no_bukti` varchar(50) character set utf8 NOT NULL,
  `customer` varchar(50) character set utf8 default NULL,
  `alt_phone` varchar(50) character set utf8 default NULL,
  `cust_po` varchar(50) character set utf8 default NULL,
  `serv_rep` varchar(50) character set utf8 default NULL,
  `manufacture` varchar(50) character set utf8 default NULL,
  `model` varchar(50) character set utf8 default NULL,
  `serial` varchar(50) character set utf8 default NULL,
  `alt_id` varchar(50) character set utf8 default NULL,
  `service_amt` double default NULL,
  `ongkos_amt` double default NULL,
  `kirim_amt` double default NULL,
  `lain_amt` double default NULL,
  `ppn_prc` double(11,0) default NULL,
  `ppn_amt` double default NULL,
  `disc_prc` double(11,0) default NULL,
  `disc_amt` double default NULL,
  `comments` double default NULL,
  `tanggal` datetime default NULL,
  `tanggal_selesai` datetime default NULL,
  `tanggal_beli` datetime default NULL,
  `selesai` bit(1) default NULL,
  `part_amt` double default NULL,
  `tanggal_akhir_garansi` datetime default NULL,
  `source_invoice_no` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`no_bukti`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service_order
-- ----------------------------

-- ----------------------------
-- Table structure for `shipped_via`
-- ----------------------------
DROP TABLE IF EXISTS `shipped_via`;
CREATE TABLE `shipped_via` (
  `shipped_via` varchar(50) character set utf8 NOT NULL,
  `address_1` varchar(255) character set utf8 default NULL,
  `customer` varchar(50) character set utf8 default NULL,
  `contact_name` varchar(50) character set utf8 default NULL,
  `address_2` varchar(50) character set utf8 default NULL,
  `telp_1` varchar(50) character set utf8 default NULL,
  `telp_2` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`shipped_via`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shipped_via
-- ----------------------------

-- ----------------------------
-- Table structure for `shipping_locations`
-- ----------------------------
DROP TABLE IF EXISTS `shipping_locations`;
CREATE TABLE `shipping_locations` (
  `location_number` varchar(15) character set utf8 NOT NULL,
  `address_type` varchar(15) character set utf8 default NULL,
  `attention_name` varchar(50) character set utf8 default NULL,
  `company_name` varchar(50) character set utf8 default NULL,
  `street` varchar(250) character set utf8 default NULL,
  `suite` varchar(250) character set utf8 default NULL,
  `city` varchar(50) character set utf8 default NULL,
  `state` varchar(50) character set utf8 default NULL,
  `zip` varchar(50) character set utf8 default NULL,
  `country` varchar(50) character set utf8 default NULL,
  `phone` varchar(50) character set utf8 default NULL,
  `fax` varchar(20) character set utf8 default NULL,
  `other_phone` varchar(20) character set utf8 default NULL,
  `comments` double default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`location_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shipping_locations
-- ----------------------------
INSERT INTO `shipping_locations` VALUES ('Jakarta', 'Gudang', null, null, 'Jl. Raya Sadang', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `shipping_locations` VALUES ('Jogja', 'Penyimpanan', '', '', 'JL. GARUDA KEMAYORAN', '', '', '', '', '', '', '', '', '0', '0');
INSERT INTO `shipping_locations` VALUES ('Bekasi', 'Penyimpanan', '', null, '', null, '', null, null, null, null, null, null, null, null);
INSERT INTO `shipping_locations` VALUES ('Medan', 'Penyimpanan', '', '', 'Jl. Sunter 80', '', '', '', '', '', '', '', '', '0', '0');
INSERT INTO `shipping_locations` VALUES ('Purwakarta', 'Penyimpanan', '', null, '', null, '', null, null, null, null, null, null, null, null);
INSERT INTO `shipping_locations` VALUES ('Surabaya', 'Penyimpanan', '', '', 'Jl. Raya pejaten timur no. 28', '', '', '', '', '', '', '', '', '0', '0');
INSERT INTO `shipping_locations` VALUES ('Ambon', 'Penyimpanan', '', null, '', null, '', null, null, null, null, null, null, null, null);
INSERT INTO `shipping_locations` VALUES ('Bali', 'Penyimpanan', 'Husni', null, 'Jl. Raya Sabrang', null, 'Bali', null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `source_of_order`
-- ----------------------------
DROP TABLE IF EXISTS `source_of_order`;
CREATE TABLE `source_of_order` (
  `source_of_order` varchar(50) character set utf8 NOT NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`source_of_order`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of source_of_order
-- ----------------------------
INSERT INTO `source_of_order` VALUES ('', '0', '', '');
INSERT INTO `source_of_order` VALUES ('By Invite', null, null, null);
INSERT INTO `source_of_order` VALUES ('By Phone', null, null, null);

-- ----------------------------
-- Table structure for `supplier_beginning_balance`
-- ----------------------------
DROP TABLE IF EXISTS `supplier_beginning_balance`;
CREATE TABLE `supplier_beginning_balance` (
  `tanggal` datetime default NULL,
  `supplier_number` varchar(50) character set utf8 default NULL,
  `hutang_awal` double default NULL,
  `hutang` double default NULL,
  `hutang_akhir` double default NULL,
  `amountin` double default NULL,
  `amountout` double default NULL,
  `flagawal` bit(1) default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  UNIQUE KEY `x1` (`tanggal`,`supplier_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of supplier_beginning_balance
-- ----------------------------

-- ----------------------------
-- Table structure for `suppliers`
-- ----------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `supplier_number` varchar(50) character set utf8 NOT NULL,
  `active` int(1) default NULL,
  `supplier_other_vendor` varchar(50) character set utf8 default NULL,
  `supplier_account_number` varchar(50) character set utf8 default NULL,
  `type_of_vendor` varchar(20) character set utf8 default NULL,
  `supplier_name` varchar(50) character set utf8 default NULL,
  `salutation` varchar(50) character set utf8 default NULL,
  `first_name` varchar(50) character set utf8 default NULL,
  `middle_initial` varchar(50) character set utf8 default NULL,
  `last_name` varchar(50) character set utf8 default NULL,
  `street` varchar(255) character set utf8 default NULL,
  `suite` varchar(50) character set utf8 default NULL,
  `city` varchar(50) character set utf8 default NULL,
  `state` varchar(50) character set utf8 default NULL,
  `zip_postal_code` varchar(20) character set utf8 default NULL,
  `country` varchar(50) character set utf8 default NULL,
  `phone` varchar(30) character set utf8 default NULL,
  `fax` varchar(30) character set utf8 default NULL,
  `email` varchar(50) character set utf8 default NULL,
  `payment_terms` varchar(255) character set utf8 default NULL,
  `credit_limit` double default NULL,
  `fed_tax_id` varchar(50) character set utf8 default NULL,
  `comments` varchar(255) default NULL,
  `credit_balance` double default NULL,
  `default_account` int(11) default NULL,
  `x1099` bit(1) default NULL,
  `x1099fedwithheld` double default NULL,
  `x1099line` int(11) default NULL,
  `x1099statewithheld` double default NULL,
  `print1099` bit(1) default NULL,
  `state_tax_id` varchar(20) character set utf8 default NULL,
  `plafon_hutang` double default NULL,
  `org_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `create_date` datetime default NULL,
  `create_by` varchar(50) character set utf8 default NULL,
  `update_date` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  `acc_biaya` int(11) default NULL,
  PRIMARY KEY  (`supplier_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of suppliers
-- ----------------------------
INSERT INTO `suppliers` VALUES ('ALFAMART', '1', '', '1393', 'Toko', 'ALFAMART', '', '', '', '', 'JL. RAYA PURWAKARTA NO. 38', 'Gedung Indofood lantai 20', 'Jakarta', '', '', '', '62212002992', '0299200111', 'andri@talagasoft.com', 'Kredit 30 Hari', '0', '', '', '0', '0', '\0', '0', '0', '0', '\0', '', '0', '', '0', '2013-08-15 00:00:00', '', '2013-08-15 00:00:00', '', '1452');
INSERT INTO `suppliers` VALUES ('KS', '1', '', '1393', '', 'Krakatau Steel, PT', '', '', '', '', 'Jl. Raya Serang Km. 200', 'Banten', 'Banten', '', '', '', '029100000', '', '', '', '0', '', '', '0', '0', '\0', '0', '0', '0', '\0', '', '0', '', '0', '2013-08-18 00:00:00', '', '2013-08-18 00:00:00', '', '0');
INSERT INTO `suppliers` VALUES ('INDOMART', '1', '', '1393', '', 'INDOMART', '', '', '', '', 'Purwakarta', '', '', '', '', '', '', '', '', '', '0', '', '', '0', '0', '\0', '0', '0', '0', '\0', '', '0', '', '0', '2013-08-14 00:00:00', '', '2013-08-14 00:00:00', '', '1423');
INSERT INTO `suppliers` VALUES ('YOGYA', '1', '', '1393', '', 'YOGYA Dept Store', '', '', '', '', 'Jl. Jend. Sudirman', 'Purwakarta', '', '', '', '', '', '', 'yogya@localhost', '60 Hari', '0', '', '', '0', '0', '\0', '0', '0', '0', '\0', '', '0', '', '0', '2013-09-07 00:00:00', '', '2013-09-07 00:00:00', '', '1423');

-- ----------------------------
-- Table structure for `sys_grid`
-- ----------------------------
DROP TABLE IF EXISTS `sys_grid`;
CREATE TABLE `sys_grid` (
  `selectionindex` int(11) NOT NULL auto_increment,
  `id` varchar(50) character set utf8 default NULL,
  `date_time` varchar(50) character set utf8 default NULL,
  `colstr1` varchar(250) character set utf8 default NULL,
  `colstr2` varchar(250) character set utf8 default NULL,
  `colstr3` varchar(250) character set utf8 default NULL,
  `colstr4` varchar(250) character set utf8 default NULL,
  `colstr5` varchar(250) character set utf8 default NULL,
  `colnum1` double default NULL,
  `colnum2` double default NULL,
  `colnum3` double default NULL,
  `colnum4` double default NULL,
  `colnum5` double default NULL,
  `colnum6` double default NULL,
  `colnum7` double default NULL,
  `colnum8` double default NULL,
  `colnum9` double default NULL,
  `colnum10` double default NULL,
  `colnum11` double default NULL,
  `colnum12` double default NULL,
  `colnum13` double default NULL,
  `colnum14` double default NULL,
  `colnum15` double default NULL,
  `colnum16` double default NULL,
  `colnum17` double default NULL,
  `colnum18` double default NULL,
  `colnum19` double default NULL,
  `colnum20` double default NULL,
  `coldate1` datetime default NULL,
  `coldate2` datetime default NULL,
  `coldate3` datetime default NULL,
  `coldate4` datetime default NULL,
  `coldate5` datetime default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`selectionindex`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sys_grid
-- ----------------------------

-- ----------------------------
-- Table structure for `sys_objects`
-- ----------------------------
DROP TABLE IF EXISTS `sys_objects`;
CREATE TABLE `sys_objects` (
  `id` int(11) NOT NULL auto_increment,
  `obj_form` varchar(50) character set utf8 default NULL,
  `user_id` varchar(50) character set utf8 default NULL,
  `obj_name` varchar(50) character set utf8 default NULL,
  `obj_index` int(11) default NULL,
  `prop_name` varchar(50) character set utf8 default NULL,
  `prop_value` varchar(50) character set utf8 default NULL,
  `obj_child` varchar(50) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sys_objects
-- ----------------------------

-- ----------------------------
-- Table structure for `sys_tooltip`
-- ----------------------------
DROP TABLE IF EXISTS `sys_tooltip`;
CREATE TABLE `sys_tooltip` (
  `id` int(11) NOT NULL auto_increment,
  `date_created` datetime default NULL,
  `created_by` varchar(50) character set utf8 default NULL,
  `date_updated` datetime default NULL,
  `update_by` varchar(50) character set utf8 default NULL,
  `help_key` varchar(50) character set utf8 default NULL,
  `help_desc` varchar(250) character set utf8 default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sys_tooltip
-- ----------------------------

-- ----------------------------
-- Table structure for `syslog`
-- ----------------------------
DROP TABLE IF EXISTS `syslog`;
CREATE TABLE `syslog` (
  `tgljam` datetime default NULL,
  `computer` varchar(50) character set utf8 default NULL,
  `userid` varchar(50) character set utf8 default NULL,
  `logtext` varchar(250) character set utf8 default NULL,
  `update_status` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of syslog
-- ----------------------------

-- ----------------------------
-- Table structure for `sysreportdesign`
-- ----------------------------
DROP TABLE IF EXISTS `sysreportdesign`;
CREATE TABLE `sysreportdesign` (
  `report_group` varchar(50) character set utf8 default NULL,
  `sequence` int(11) default NULL,
  `description` varchar(255) character set utf8 default NULL,
  `formulas` varchar(255) character set utf8 default NULL,
  `debitorcredit` varchar(50) character set utf8 default NULL,
  `plusorminus` varchar(50) character set utf8 default NULL,
  `fonttype` varchar(50) character set utf8 default NULL,
  `colvalue1` double default NULL,
  `colvalue2` double default NULL,
  `colvalue3` double default NULL,
  `colvalue4` double default NULL,
  `id` int(11) NOT NULL auto_increment,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sysreportdesign
-- ----------------------------

-- ----------------------------
-- Table structure for `sysreportdesignfiles`
-- ----------------------------
DROP TABLE IF EXISTS `sysreportdesignfiles`;
CREATE TABLE `sysreportdesignfiles` (
  `filename` varchar(50) character set utf8 NOT NULL,
  `report_group` varchar(50) character set utf8 default NULL,
  `sequence` int(11) default NULL,
  `description` varchar(255) character set utf8 default NULL,
  `formulas` varchar(255) character set utf8 default NULL,
  `debitorcredit` varchar(50) character set utf8 default NULL,
  `plusorminus` varchar(50) character set utf8 default NULL,
  `fonttype` varchar(50) character set utf8 default NULL,
  `colvalue1` double default NULL,
  `colvalue2` double default NULL,
  `colvalue3` double default NULL,
  `colvalue4` double default NULL,
  `id` int(11) NOT NULL auto_increment,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x1` (`filename`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sysreportdesignfiles
-- ----------------------------

-- ----------------------------
-- Table structure for `system_variables`
-- ----------------------------
DROP TABLE IF EXISTS `system_variables`;
CREATE TABLE `system_variables` (
  `varname` varchar(50) character set utf8 default NULL,
  `varlen` int(11) default NULL,
  `varvalue` varchar(50) character set utf8 default NULL,
  `keterangan` varchar(200) character set utf8 default NULL,
  `id` int(11) NOT NULL auto_increment,
  `update_status` int(11) default NULL,
  `section` varchar(50) character set utf8 default NULL,
  `category` varchar(50) character set utf8 default NULL,
  `vartype` varchar(50) character set utf8 default NULL,
  `varlist` varchar(250) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=551 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of system_variables
-- ----------------------------
INSERT INTO `system_variables` VALUES ('A/R Payment Numbering', '14', '!ARP~@-~$00001', '', '1', '1', 'Purchase', 'Auto Numbering', 'String', '');
INSERT INTO `system_variables` VALUES ('A/R Payment Numbering - AutoNumber', '7', '1', '', '2', '1', 'Purchase', '', '', '');
INSERT INTO `system_variables` VALUES ('Admin Password', '3', 'bos', '', '5', '1', 'Inventory', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('Allow Qty Stock Minus', '4', 'True', '', '6', '1', 'System', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('AP Numbering', '14', '!ARP~@-~#MM~#DD~#YY~$00009', '', '7', '1', 'Purchase', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('AP Numbering - AutoNumber', '7', '1', '', '8', '1', 'Purchase', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('AP Payment Numbering', '14', '!APP~$00051', '', '9', '1', 'Sales', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('AR Payment Numbering', '14', '!ARP~$00070', '', '10', '1', 'Sales', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('AskAdminPassForExit', '5', 'False', 'NIL', '11', '1', 'Inventory', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('Assembly Numbering', '14', '!ASM~@-~$00010', '', '12', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Assembly Numbering - AutoNumber', '7', '1', '', '13', '1', 'System', '', '', '');
INSERT INTO `system_variables` VALUES ('AutoComplete', '5', 'True', null, '14', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('AutoLogon', '1', '1', null, '15', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('AutoLookUp', '4', 'True', null, '16', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Bersihkan Input', '1', 'True', '', '17', '1', 'Accounting', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('Cetak_CreditCard', '1', '1', null, '18', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Cetak_LainLain', '1', '1', null, '19', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Cetak_PPN', '1', '1', null, '20', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('COA Uang Muka', '4', '1209', '', '21', '1', 'Inventory', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('COA Uang Muka Pembelian', '4', '1370', '', '22', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('COA Uang Muka Penjualan', '4', '1370', '', '23', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('CRDB SO Numbering', '15', '!CRDB~@-~$00107', '', '24', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('current_org_id', '3', '000', 'struktur organisasi aktif', '25', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('DisAssembly Numbering', '15', '!DASM~$00001', null, '26', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('DisAssembly Numbering - AutoNumber', '7', '0', null, '27', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Display Supplier/Customer', '4', 'True', null, '28', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('DisplayError', '1', 'True', '', '29', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Bank Accounts] add no_bukti_in, no_bukti_out', '1', '1', 'NIL', '31', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Customers] add NPPKP.', '1', '1', 'NIL', '32', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [GL Transaction] +project_code', '1', '1', 'NIL', '33', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [gl_projects] add sales, cost, expense', '1', '1', 'NIL', '34', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [gl_projects] add sales, cost, expense, labar', '1', '1', 'NIL', '35', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory Beginning Balance] hpp_awal,akhir', '1', '1', 'NIL', '36', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory Moving] add cost', '1', '1', 'NIL', '37', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory] add custom fields', '1', '1', 'NIL', '38', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice Lineitems] koreksi qty dan mu qty', '1', '1', 'NIL', '39', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice Tax Serial] create.', '1', '1', 'NIL', '40', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice] add audit_status', '1', '1', 'NIL', '41', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [org_struct] add table', '1', '1', 'NIL', '42', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [sys_tooltip] add table', '1', '1', 'NIL', '43', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Check Writer 100', '1', '1', null, '44', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Check Writer 101', '1', '1', null, '45', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Check Writer 102', '1', '1', 'add curr_code, curr_rate', '46', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag DB Integrated GL', '1', '1', null, '47', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Inventory 100', '1', '1', 'NIL', '48', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Inventory Balance 100', '1', '1', 'NIL', '49', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Inventory Beginning Balance 100', '1', '1', 'NIL', '50', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Inventory Ordering Info', '1', '1', 'NIL', '51', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Inventory Products 100', '1', '1', 'NIL', '52', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Inventory Products 101', '1', '1', 'NIL', '53', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Inventory Products 102', '1', '1', 'NIL', '54', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Inventory Products 103', '1', '1', 'NIL', '55', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Inventory Serialized Items 100', '1', '1', 'NIL', '56', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Invoice 200', '1', '1', 'NIL', '57', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Invoice 201', '1', '1', 'NIL', '58', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Invoice Correction', '1', '1', null, '59', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag KIS Group Modules 100', '1', '1', 'NIL', '60', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag KIS Modules 100', '1', '1', 'NIL', '61', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Multi Unit', '1', '1', null, '62', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Payables 100', '1', '1', null, '63', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Payment 100', '1', '1', null, '64', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Payments 102', '1', '1', 'add no_bukti', '65', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Payments 103', '1', '1', 'NIL', '66', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag PO Info Correction', '1', '1', null, '67', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Purchase Order 100', '1', '1', 'NIL', '68', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Purchase Order 102', '1', '1', 'NIL', '69', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Purchase Order Lineitems 100', '1', '1', 'NIL', '70', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Quotation add Disc, MultiUnit', '1', '1', 'NIL', '71', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag System Variabel 100', '1', '1', 'add keterangan di system variabel', '72', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag TMP_KARTU_STOCK add harga, hpp_awal,hpp_akhir', '1', '1', 'NIL', '73', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag tmp_seri 100', '1', '1', 'NIL', '74', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag User 101', '1', '1', 'NIL', '75', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Footer1', '11', 'Terimakasih', null, '76', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Footer2', '7', 'Footer2', null, '77', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Footer3', '7', 'Footer3', null, '78', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('FormatNumeric', '14', '###,###,##0.00', null, '79', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('GL Journal Numbering', '25', '!JU~$00004', '', '80', '1', 'Accounting', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('GL Journal Numbering - AutoNumber', '1', '1', '', '81', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('gstrTahunAktif', '0', '2001', null, '82', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Header1', '7', 'Header1', null, '83', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Header2', '7', 'Header2', null, '84', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Header3', '7', 'Header3', null, '85', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('height', '0', '11190', null, '86', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('HKGL112', '16', 'GetAccount(1098)', null, '87', '1', 'Accounting', null, null, null);
INSERT INTO `system_variables` VALUES ('HKGL113', '16', 'GetAccount(1099)', null, '88', '1', 'Accounting', null, null, null);
INSERT INTO `system_variables` VALUES ('HKGL114', '16', 'GetAccount(1204)', null, '89', '1', 'Accounting', null, null, null);
INSERT INTO `system_variables` VALUES ('HKGL115', '16', 'GetAccount(1210)', null, '90', '1', 'Accounting', null, null, null);
INSERT INTO `system_variables` VALUES ('HKGL116', '16', 'GetAccount(1104)', null, '91', '1', 'Accounting', null, null, null);
INSERT INTO `system_variables` VALUES ('HKGL117', '16', 'GetAccount(1111)', null, '92', '1', 'Accounting', null, null, null);
INSERT INTO `system_variables` VALUES ('HKGL118', '16', 'GetAccount(1206)', null, '93', '1', 'Accounting', null, null, null);
INSERT INTO `system_variables` VALUES ('HKGL119', '16', 'GetAccount(1102)', null, '94', '1', 'Accounting', null, null, null);
INSERT INTO `system_variables` VALUES ('HKGL120', '16', 'GetAccount(1110)', null, '95', '1', 'Accounting', null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice DO Numbering', '14', '!JDO~$0045', '', '96', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice DO Numbering - AutoNumber', '7', '1', '', '97', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice Konsinyasi Numbering', '14', '!JKO~$00001', '', '98', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice Konsinyasi Numbering - AutoNumber', '7', '1', '', '99', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice Numbering', '14', '!PJL~$00103', '', '100', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice Numbering - AutoNumber', '7', '1', '', '101', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice Retur Numbering', '14', '!JRE~$00017', '', '102', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice Retur Numbering - AutoNumber', '7', '1', '', '103', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Jenis_Usaha', '1', '1', 'NIL', '104', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('JenisFaktur', '0', 'Invoice', null, '105', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Jumlah Discount', '1', '1', '', '106', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Konfirmasi Simpan Stock', '1', '0', null, '107', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Konsinyasi Numbering', '14', '!BKO~$00001', '', '108', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Konsinyasi Numbering - AutoNumber', '7', '1', '', '109', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Lady Resv Numbering', '0', '!RLD~@-~$00001', null, '110', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('left', '0', '1650', null, '111', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Multi DO', '7', '0', '', '113', '1', 'Purchase', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('no', '0', 'False', null, '114', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Pakai Discount Rupiah', '5', 'False', '', '115', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Pembelian Numbering', '14', '!PBL~$00116', '', '116', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Pembelian Numbering - AutoNumber', '7', '1', '', '117', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('POS Numbering', '14', '!T8~$00019', null, '118', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('POS Room Numbering', '14', '!POS~@-~$00016', null, '119', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Purchase Order Numbering', '13', '!PO~$00112', '', '120', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Purchase Order Numbering - AutoNumber', '7', '1', '', '121', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('PurchaseUpdQtyWhen', '21', '1', '', '122', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Quotation Numbering', '14', '!QUT~$00001', '', '123', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Quotation Numbering - AutoNumber', '7', '1', '', '124', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Receivement Numbering', '14', '!TRM~$00213', '', '125', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Receivement Numbering - AutoNumber', '7', '1', '', '126', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Recv Finish Good Numbering', '14', '!RFG~@-~$00026', '', '127', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Reservation Numbering', '14', '!RPO~@-~$00034', null, '128', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Retur Beli Numbering', '14', '!BRE~$00020', '', '129', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Retur Numbering', '14', '!BRE~@-~$00018', null, '130', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Retur Numbering - AutoNumber', '7', '1', null, '131', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Room Resv Numbering', '14', '!RRN~@-~$00022', null, '132', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('rpt_criteria_split_char_1', '1', '/', 'rpt_criteria_split_char_1', '133', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('rpt_criteria_split_char_2', '1', '\\', 'rpt_criteria_split_char_2', '134', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Sales Order Numbering', '13', '!SO~$00080', '', '135', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Sales Order Numbering - AutoNumber', '7', '1', '', '136', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('SaleUpdQtyWhen', '21', '1 - Pengiriman Barang', '', '137', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Serial', '16', '0387F9FF00000686', 'NIL', '138', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('SetCekStatusRoom', '5', 'False', 'NIL', '139', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('SetCreditCard', '1', '0', 'NIL', '140', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('SetDiscPrc', '3', '0.1', 'NIL', '141', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('SetPB', '1', '0', 'NIL', '142', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('SetRoundMinute', '1', '0', 'NIL', '143', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('SetServiceCharge', '1', '0', 'NIL', '144', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('SetShowKonsinyasi', '4', 'True', null, '145', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('status_project', '4', 'Open', 'Status Project', '146', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('status_project_1', '6', 'Closed', 'Status Project', '147', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Stock Receive Numbering', '14', '!RCV~@-~$00024', null, '148', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('strCompany', '0', 'ATL', null, '149', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('strCurrentModule', '0', 'frmMain', null, '150', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Tampil Harga Beli', '1', '0', '', '151', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Tampil History Harga', '1', '', '', '152', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Tampil Multi Pricing', '1', '', '', '153', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('top', '0', '165', null, '154', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('TRX OE Numbering', '0', '!TRX~$00004', null, '155', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('txtPassword', '0', 'ADMIN', null, '156', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('txtUsername', '0', 'administrator', null, '157', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Ubah Qty Assembly DisAssembly', '4', 'True', '', '158', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Update AR/AP Balance in Bank Module', '5', 'False', null, '159', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Use Stock Receipt', '1', '0', 'NIL', '160', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('width', '0', '15480', null, '161', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('WindowState', '1', '2', null, '162', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Work Order Numbering', '13', '!WO~@-~$00013', null, '163', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('yes', '0', 'True', null, '164', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Kas Kasir] add kasir', '1', '1', 'nil', '165', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Payments] add pos fields', '1', '1', 'NIL', '166', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory] add qstep1', '1', '1', 'nil', '167', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory] add qty_awal', '1', '1', 'nil', '168', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Sales Tax Numbering', '22', '!010.000.07.~$00000005', 'Nomor urut faktur pajak', '169', '1', 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Trans_Type] new table', '1', '1', 'NIL', '173', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [qry_KartuStock_Union] Add query', '1', '1', 'NIL', '174', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('DefaultCurrency', '3', 'IDR', '', '175', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('BeginDate', '10', '2012-01-01 00:00', '', '176', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('FiscalYear', '10', '2012', '', '177', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('AllowInputDateFrom', '10', '2012-01-01 00:00', '', '178', '1', 'System', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('AllowInputDateTo', '10', '2012-12-31 00:00', '', '179', '1', 'Purchase', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('ShowReminder', '4', 'True', '', '180', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('ShowTips', '4', 'FALSE', 'Show Tips', '181', '1', 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory] add AllowChangePrice', '1', '1', 'nil', '182', '1', 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Sales Order] add uang_muka', '1', '1', 'NIL', '183', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Preferences] add PurPriDec, PurQtyDec', '1', '1', 'NIL', '188', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice Lineitems] add from_line_type', '1', '1', 'NIL', '190', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Sales Order] add uang_muka 2', '1', '1', 'NIL', '191', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Purchase Order Lineitems] add from_line_numb', '1', '1', 'NIL', '201', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Purchase Order Lineitems] add from_line_numb', '1', '1', 'NIL', '205', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('PO Jumlah Discount', '1', '1', '', '206', null, 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice] do_invoiced', '1', '1', 'NIL', '207', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [so_do_inv_pay] add', '1', '1', 'NIL', '208', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Purchase Order] add amount', '1', '1', 'NIL', '209', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag add [Invoice Shipment]', '1', '1', 'NIL', '210', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('TypeOfInvoice', '0', 'Simple', 'Jenis faktur', '211', null, 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('TypeOfInvoice', '0', 'Profesional', 'Jenis faktur', '212', null, 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('TypeOfInvoice', '0', 'Product Detail', 'Jenis faktur', '213', null, 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('TypeOfInvoice', '0', 'Service', 'Jenis faktur', '214', null, 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('TypeOfInvoice', '0', 'Konsinyasi', 'Jenis faktur', '215', null, 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('TypeOfInvoice', '0', 'Faktur Eceran', 'Jenis faktur', '216', null, 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('TypeOfInvoice', '0', 'Faktur Grosir', 'Jenis faktur', '217', null, 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag add key type of invoice', '1', '1', 'NIL', '218', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('AppSecureLevel', '1', '0', 'NIL', '219', null, 'Sales', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('HargaBeliPoItem', '1', '0', '', '220', null, 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag add [Check Writer] JenisUangMuka, SisaUangMuk', '1', '1', 'NIL', '221', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('TypeOfInvoice', '0', 'Faktur Pangan', 'Jenis faktur', '222', null, 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('TypeOfInvoice', '0', 'Faktur Kebun', 'Jenis faktur', '223', null, 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag add [sqlListDo]', '1', '1', 'NIL', '224', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('PO Request Numbering', '14', '!POR~@-~$00001', 'NIL', '225', null, 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Import] Build Source Autonumber', '0', '1', null, '226', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Preferences] change Fed Tax ID', '1', '1', 'NIL', '227', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [CW Items] add org_id', '1', '1', 'NIL', '228', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag change [tmp_kartu_hutang] amount', '1', '1', 'NIL', '229', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag change [tmp_kartu_piutang] amount', '1', '1', 'NIL', '230', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [gl_projects] add invoice_number', '1', '1', 'NIL', '231', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('AR Payment Numbering - AutoNumber', '1', '1', '', '232', null, 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Acc In KAS Numbering', '15', '!KM.KAS.~$00072', '', '233', null, 'Banking', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('Acc Out KAS Numbering', '15', '!KK.KAS.~$00056', '', '234', null, 'Sales', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('Flag [Fa_Asset] change acquisition_date', '1', '1', 'NIL', '235', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Retur Beli Numbering - AutoNumber', '1', '1', '', '236', null, 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('AP Payment Numbering - AutoNumber', '1', '1', '', '237', null, 'Purchase', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('Inventory Numbering - AutoNumber', '1', '1', '', '238', null, 'Inventory', null, null, null);
INSERT INTO `system_variables` VALUES ('Inventory Numbering', '6', '$00013', '', '239', null, 'Inventory', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Ubah symbol kode barang', '1', '1', 'NIL', '244', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [tmp_stock_card_1] add table', '1', '1', 'NIL', '245', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag add qry_daftar_piutang', '1', '1', 'NIL', '255', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice] your_order_date', '1', '1', 'NIL', '256', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('TerbilangInvoice', '1', '0', '', '257', null, 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [SysVar] set terbilang bahasa', '1', '1', 'NIL', '258', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('SelectRecWhenPrintInvoice', '1', '0', '', '259', null, 'Sales', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [SysVar] set pilih rekening', '1', '1', 'NIL', '260', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [SysVar] add Section,Category,VarType', '1', '1', 'NIL', '261', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory] add SetupTime~ ProcessTime', '1', '1', 'None', '262', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory] add Komisi~ IsService', '1', '1', 'None', '263', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [SysVar] add [Discount Addition]', '1', '1', 'nil', '264', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory Serial] add function', '1', '1', 'NIL', '265', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [user_modules] add', '1', '1', 'nil', '266', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [user_modules] add', '1', '1', 'nil', '267', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('FingerprintKey', '1', 'UAA2ARPPEAEJEEE66', 'FingerprintKey', '268', null, 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('LicenceKey', '37', 'HI42T2GP7EIMN3A2AAA13AE7IEE68IIA2EIAA', 'NIL', '269', null, 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('LicenceCount', '1', '2', 'NIL', '270', null, 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('LicenseKey', '1', 'HAA2A2BPE4EJ6EE66', 'LicenseKey', '271', null, 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('LicenseCount', '1', '2', 'LicenseCount', '272', null, 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('AppLicenseStatus', '1', '1', 'NIL', '273', null, 'Sales', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('Flag add patch v.630', '1', '1', 'NIL', '274', null, 'Upgrade', null, null, null);
INSERT INTO `system_variables` VALUES ('Acc In BCA Numbering', '15', '!BCA.KM.~$00035', '', '275', null, 'Banking', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('Acc Out BCA Numbering', '15', '!BCA.KK.~$00015', '', '276', null, 'Banking', 'Auto Numbering', '', '');
INSERT INTO `system_variables` VALUES ('MultiCurrency', '1', '1', 'NIL', '277', null, 'System', '', '', '');
INSERT INTO `system_variables` VALUES ('MultiWarehouse', '1', '1', 'NIL', '278', null, 'System', '', '', '');
INSERT INTO `system_variables` VALUES ('MultiBranch', '1', '1', 'NIL', '279', null, 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('MyPosFile', '18', 'C:\\MyPos\\MyPos.exe', 'NIL', '280', null, 'System', null, null, null);
INSERT INTO `system_variables` VALUES ('MultiCustomerBranch', '1', '1', 'NIL', '281', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('DefaultGudang', '6', 'Gudang', 'NIL', '282', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('DefaultCurrencyRate', '1', '1', 'Default Currency Rate', '283', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice Angkutan Numbering', '7', '$000016', 'NIL', '284', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Biaya Angkutan Numbering', '11', '@BA~$000032', 'NIL', '285', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('ReCalcHppBeforeJournal', '1', '0', 'NIL', '286', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [credit_card_type] add card_type', '1', '1', 'nil', '287', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Kas kasir] add catatan', '1', '1', 'nil', '288', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice Lineitems] add [Tax_Amount]', '1', '1', 'nil', '289', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [PR_Card] addnew table', '1', '1', 'nil', '290', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [090613].[qry_KartuPiutang]', '1', '1', 'NIL', '291', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [090615].[Report List] visible', '1', '1', 'NIL', '293', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [GL_BegBalArc_Year] add table', '1', '1', 'NIL', '294', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('AutoCreateSupplierWhenOrder', '1', 'True', '', '295', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('AllowMoveToNextControlWhenEmpty', '1', '', '', '296', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Multi Currency', '1', 'True', '', '297', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('AutoCreateCustomerWhenOrder', '1', '1', '', '298', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('GridAutoCompletion', '1', '1', '', '299', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('GridAutoDropdown', '1', '1', '', '300', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('GridMoveColWithTab', '1', '0', '', '301', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice Lineitems] add sales_comm_amount', '1', '1', 'NIL', '302', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [090701].[qry_KartuPiutang]', '1', '1', 'NIL', '303', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [KIS Modules] add onaccount payment', '1', '1', 'nil', '305', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice Lineitems] change employee_id', '1', '1', 'nil', '306', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice Lineitems] add forex price', '1', '1', 'nil', '307', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice Lineitems] add PrintCount', '1', '1', 'None', '308', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice Lineitems] add employee_id~ line_ord', '1', '1', 'None', '309', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory] add [qstep1]', '1', '1', 'nil', '310', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Report List] Add more field', '1', '1', 'NIL', '311', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Set QtyStockUpdateWhen', '1', '999', 'NIL', '312', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Service Order Numbering', '14', '!SRV~@-~$00003', 'service job numbering', '313', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Service job numbering', '15', '!SJOB~@-~$00005', 'service job numbering', '314', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('NilaiPembulatan', '3', '0', 'nil', '315', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [credit_card_type] add [card_name]', '1', '1', 'nil', '316', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [user_modules] add menu adj', '1', '1', 'nil', '317', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory Categories] add field parent_id', '1', '1', 'nil', '318', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [customers_other_info] add table', '1', '1', 'nil', '319', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [tmp_kartu_stock] add [comments]', '1', '1', 'nil', '320', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [user_modules] add menu assembly', '1', '1', 'nil', '321', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('adjust_raw_material', '5', 'True', 'nil', '322', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice Shipment] add addr1, addr2 etc', '1', '1', 'NIL', '323', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice Shipment] add kota asal', '1', '1', 'NIL', '324', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('recalc_discount_when_report', '5', 'False', 'nil', '325', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [qry_pos_nota] add new query', '1', '1', 'nil', '326', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Customer ShipTo Numbering', '6', '$00008', 'nil', '327', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory Warehouse] add price', '1', '1', 'NIL', '328', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice Numbering - Locked', '1', '1', '', '329', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('GabungKodeJurnal', '1', '1', '', '330', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('LoadSelectItem', '1', '', '', '331', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('ar_payment_date_locked', '1', '', '', '332', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('allow_reprint_do', '1', '', '', '333', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('allow_reprint_invoice', '1', '0', '', '334', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('allow_reprint_so', '1', '1', 'NIL', '335', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('allow_reprint_retur_jual', '1', '1', 'NIL', '336', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('allow_reprint_po', '1', '1', 'NIL', '337', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('allow_reprint_po_invoice', '1', '1', 'NIL', '338', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('allow_reprint_retur_beli', '1', '1', 'NIL', '339', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag Allow Reprint Document', '1', '1', 'NIL', '340', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [user_modules] add menu form stock opname', '1', '1', 'nil', '341', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [user_modules] add menu retur opname', '1', '1', 'nil', '342', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('lock_change_item', '5', 'True', 'nil', '343', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [user_modules] add menu lap minus', '1', '1', 'nil', '344', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Adjustment Numbering', '11', '!ADJ~$00020', '', '345', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory Warehouse] add qstep', '1', '1', 'NIL', '346', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory Moving] add id', '1', '1', 'NIL', '347', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Transfer Stock Numbering', '14', 'TRX~$00001', '', '348', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Adjustment Numbering - AutoNumber', '1', '1', '', '349', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Transfer Stock Numbering - AutoNumber', '1', '0', 'NIL', '350', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory Moving] add catatan', '1', '1', 'NIL', '351', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory Warehouse] add desc', '1', '1', 'NIL', '352', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('col_width_kode', '4', '3110', 'nil', '353', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('col_width_qty', '3', '555', 'nil', '354', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('col_width_unit', '3', '450', 'nil', '355', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('col_width_harga', '4', '1005', 'nil', '356', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('col_width_disc_prc', '3', '615', 'nil', '357', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('col_width_disc_amt', '3', '700', 'nil', '358', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('col_width_jumlah', '4', '1500', 'nil', '359', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [user_modules] add menu print kartu', '1', '1', 'nil', '360', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [user_modules] add menu cust detil', '1', '1', 'nil', '361', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [invoice_angkutan] add sektor', '1', '1', 'NIL', '362', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [add field update_status]', '1', '1', 'NIL', '363', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [credit_card_type] add vales', '1', '1', 'nil', '364', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Acc In LIPO 234 Numbering', '11', '!KML~$00001', 'NIL', '365', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Acc OutLIPO 234 Numbering', '11', '!KKL~$00002', 'NIL', '366', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory Warehouse] add description', '1', '1', 'NIL', '367', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [org_struct] add table 2', '1', '1', 'NIL', '368', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Kendaraan] add merk,bpkb', '1', '1', 'NIL', '369', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Wilayah] add kode', '1', '1', 'NIL', '370', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('NextShipToId', '12', '!SHT1~$00008', 'Penomoran untuk kode pengiriman customer', '371', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('AllowChangePrice', '0', 'true', null, '372', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('AllowChangeDiscItem', '0', 'true', null, '373', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [payments] change cc charge', '1', '1', 'nil', '374', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Recalc Inv Amount]', '1', '1', 'nil', '375', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('allow_cashier_report', '4', 'True', 'nil', '376', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('LockSO_Freight', '0', 'true', null, '377', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('LockSO_Tax', '0', 'true', null, '378', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('DisplayConfirmWhenPayment', '0', 'false', null, '379', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice] add sales_name', '1', '1', 'nil', '380', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Promosi_Disc] add outlet', '1', '1', 'nil', '381', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag change [sys_Grid] colstr1', '1', '1', 'NIL', '382', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag change [GL Transactions] ID_Name', '1', '1', 'NIL', '383', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Payments] add JenisUangMuka', '1', '1', 'NIL', '384', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory Assembly] add default_cost', '1', '1', 'NIL', '385', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice] add Coa1 s.d Coa5', '1', '1', 'NIL', '386', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('ItemReturBased', '1', '2', 'NIL', '387', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Promosi_Disc] add disc_base', '1', '1', 'nil', '388', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [User] add discount', '1', '1', 'nil', '389', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice] add promosi_code', '1', '1', 'nil', '390', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [add field update_by]', '1', '1', 'NIL', '391', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('AskGLIDPosting', '5', 'False', 'NIL', '394', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Acc In Mandiri Numbering', '12', '!BMM.~$00002', 'NIL', '395', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Acc OutMandiri Numbering', '12', '!BKM.~$00002', 'NIL', '396', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice DO Other Numbering - AutoNumber', '1', '1', '', '397', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice DO Other Numbering', '11', '!JDL~$00017', '', '398', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice DO Other Numbering - Locked', '1', '1', '', '399', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('tmp_no_po', '7', 'JDO0037', '', '400', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('tmp_no_so', '7', 'JDO0037', 'SO00033', '401', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice] add ref do so po', '1', '1', 'NIL', '402', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice Lineitems] add line_order_type', '1', '1', 'nil', '403', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory Categories] add parent_id', '1', '1', 'NIL', '404', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Purchase Order Lineitems] add harga jual', '1', '1', 'NIL', '405', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Inventory Products] add harga jual', '1', '1', 'NIL', '406', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Purchase Order Lineitems] add dept', '1', '1', 'NIL', '407', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Purchase Order] add type invoice', '1', '1', 'NIL', '411', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Purchase Order Lineitems] add price_margin', '1', '1', 'NIL', '412', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice Lineitems] add disc add', '1', '1', 'nil', '413', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [customers_other_info] add disc amount', '1', '1', 'nil', '414', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('HideAccountEarningAccount', '5', 'True', '', '415', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('AllowVoucherNonMember', '5', 'True', 'nil', '416', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [voucher_master] addnew', '1', '1', 'nil', '417', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('MoveToNextCol', '5', 'False', 'NIL', '418', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('InvalidAcc_Jurnal', '0', '1483', 'InvalidAcc_Jurnal', '419', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('InvalidAcc_Jurnal', '0', '1408', 'InvalidAcc_Jurnal', '420', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('IncPoAutoNumWhenEdit', '0', 'true', null, '421', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('UnlockChangePriceInvoice', '5', '', '', '422', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('ProtectChangePrice', '5', '', '', '423', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('ProtectChangeDisc', '5', '', '', '424', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Payments] add angsur_no_dari', '1', '1', 'NIL', '425', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '426', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '427', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '428', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '429', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '430', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '431', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '432', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '433', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '434', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '435', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '436', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '437', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '438', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '439', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '440', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag CloseDB 2009', '1', '1', null, '441', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Purchase Order Number', '21', '', 'No Comment', '445', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Retur Jual Numbering', '20', '', 'No Comment', '446', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Adjustmnet Numbering', '20', '', 'No Comment', '447', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Other Delivery Numbering', '24', '!DOX~$00008', 'No Comment', '448', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Retur Pembelian Numbering', '25', '!PR~$00028', 'No Comment', '449', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Delivery Order Numbering', '24', '!SJ~$00006', 'No Comment', '450', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Retur Invoice Numbering', '23', '', 'No Comment', '452', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('CRDB PO Numbering', '17', '!CRDB.PO.~@-~$00001', 'No Comment', '453', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Voucher in Numbering', '20', '', 'No Comment', '454', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Acc In  Numbering', '17', '', 'No Comment', '455', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Acc In BCW Numbering', '20', '', 'No Comment', '456', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Voucher  Numbering', '18', '', 'No Comment', '457', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Voucher out Numbering', '21', '', 'No Comment', '458', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Acc Out  Numbering', '18', '', 'No Comment', '460', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Invoice Kontan Numbering', '24', '!FK~$00003', 'Faktur Jual Kontan', '475', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('', '0', '!TRP~$00001', 'Penerimaan PO', '489', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('PO Receive Numbering', '20', '!TRP~$00038', 'Penerimaan PO', '490', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('SalQtyDec', '9', '2', 'No Comment', '491', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('SalPriDec', '9', '0', 'No Comment', '492', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('InvQtyDec', '9', '2', 'No Comment', '493', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('InvPriDec', '9', '0', 'No Comment', '494', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('PurQtyDec', '9', '2', 'No Comment', '495', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('PurPriDec', '9', '0', 'No Comment', '496', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('DiscRupiah', '10', 'True', 'No Comment', '497', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('UseGiroGantung', '14', '1', 'No Comment', '498', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('AllowPayMinus', '13', '1', 'No Comment', '499', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('CR Debit Numbering', null, '!DBSO~@-~$00001', null, '500', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('ContactOnSales', null, 'Purchasing', null, '501', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Default Invoice Type', null, 'Simple', null, '502', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Freight Taxable', null, 'True', null, '503', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Other Taxable', null, 'True', null, '504', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Undeposited Checks', null, 'True', null, '505', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('show_kas', null, 'True', null, '506', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('so_number', '9', '!SO~$00052', 'No Comment', '507', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('faktur_number', '13', '!PJL~$00074', 'No Comment', '508', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('do_number', '9', '!JDO~$0044', 'No Comment', '509', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('konsinyasi_number', '17', '!JKO~$00001', 'No Comment', '510', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('retur_number', '12', '!JRE~$00015', 'No Comment', '511', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('payment_number', '14', '!ARP~$00030', 'No Comment', '512', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('quot_number', '11', '!QUT~$00001', 'No Comment', '513', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('stock_send_number', '17', '!DOX~$00007', 'No Comment', '514', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('credit_memo_number', '18', '!CRDB~@-~$00107', 'No Comment', '515', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('debit_memo_number', '17', '!DBSO~@-~$00001', 'No Comment', '516', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('fakur_pajak_number', '18', '', 'No Comment', '517', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('discount_bertingkat', '19', '1', 'No Comment', '518', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('nama_di_faktur', '14', 'Andri', 'No Comment', '519', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('CR PO Numbering', '15', 'CRPO~$00001', 'No Comment', '520', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('DB PO Numbering', '15', '!DBPO~$00001', 'No Comment', '521', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Purchase Order Contact', '22', 'Purchasing', 'No Comment', '522', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('POItemDisplay', '13', '0', 'No Comment', '523', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('PO Show Items', '13', '0', 'No Comment', '524', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Inventory Costing', '17', '0', 'No Comment', '525', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Perpetual Inventory', '19', '0', 'No Comment', '526', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Display ShipTos', '15', '0', 'No Comment', '527', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('customer order', '14', '0', 'No Comment', '528', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('InventorySearch', '15', '0', 'No Comment', '529', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('customer numbering', '18', '0', 'No Comment', '530', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Supplier Numbering', '18', '0', 'No Comment', '531', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('button_position', '15', '0', 'No Comment', '532', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('C01 Invoice Numbering', null, '!P-C01~$00006', 'Numbering', '533', null, null, null, null, null);
INSERT INTO `system_variables` VALUES (' Invoice Numbering', null, '!P-~$00001', 'Numbering', '534', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('T01 Invoice Numbering', null, '!P-T01~$00006', 'Numbering', '535', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('T01 Receive Numbering', null, '!R-T01~$00010', 'Numbering', '536', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('C01 Receive Numbering', null, '!R-C01~$00010', 'Numbering', '537', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('C01 Delivery Numbering', null, '!D-C01~$00009', 'Numbering', '538', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('C01 AR Payment Numbering', null, '!ARP-C01~$00006', 'Numbering', '539', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('C01 Adjust Numbering', null, '!ADJ-C01~$00004', 'Numbering', '540', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('C01 Pembelian Numbering', null, '!FBC01~$00011', 'Numbering', '541', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('C01 AP Payment Numbering', null, '!APP-C01~$00006', 'Numbering', '542', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Customers] add sc exempt', '1', '1', 'nil', '543', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Flag [Invoice lineitems] change field type', '1', '1', 'nil', '544', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Purchase Invoice Numbering', null, '!PI~$00005', 'Numbering', '545', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Retur Pembelian Numbering', null, '!PR~$00028', 'Numbering', '546', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Delivery Order Numbering', null, '!SJ~$00006', 'Numbering', '547', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('CrDB Numbering', null, '!CRDB~$00003', 'Numbering', '548', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Other Recievement Numbering', null, '!EIN~$00003', 'Numbering', '549', null, null, null, null, null);
INSERT INTO `system_variables` VALUES ('Other Receivement Numbering', null, '!EIN~$00004', 'Numbering', '550', null, null, null, null, null);

-- ----------------------------
-- Table structure for `tb_imageview`
-- ----------------------------
DROP TABLE IF EXISTS `tb_imageview`;
CREATE TABLE `tb_imageview` (
  `ID` int(11) NOT NULL,
  `Small_Image` varchar(30) NOT NULL,
  `Big_Image` varchar(30) NOT NULL,
  `Description` varchar(200) default NULL,
  KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_imageview
-- ----------------------------
INSERT INTO `tb_imageview` VALUES ('1', 'small_image1.jpg', 'big_image1.jpg', 'Color of Autumn');
INSERT INTO `tb_imageview` VALUES ('2', 'small_image2.jpg', 'big_image2.jpg', 'Back to Nature');
INSERT INTO `tb_imageview` VALUES ('3', 'small_image3.jpg', 'big_image3.jpg', 'Beauty of Hawaii ');
INSERT INTO `tb_imageview` VALUES ('4', 'small_image4.jpg', 'big_image4.jpg', 'Pure');
INSERT INTO `tb_imageview` VALUES ('5', 'small_image5.jpg', 'big_image5.jpg', 'Dream Home');
INSERT INTO `tb_imageview` VALUES ('6', 'small_image6.jpg', 'big_image6.jpg', 'Imazing Nature');

-- ----------------------------
-- Table structure for `tb_slidemenu`
-- ----------------------------
DROP TABLE IF EXISTS `tb_slidemenu`;
CREATE TABLE `tb_slidemenu` (
  `ID` varchar(15) NOT NULL,
  `ParentID` varchar(15) NOT NULL,
  `IsChild` tinyint(1) NOT NULL,
  `Text` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_slidemenu
-- ----------------------------
INSERT INTO `tb_slidemenu` VALUES ('companyhome', 'root', '0', 'Company Home');
INSERT INTO `tb_slidemenu` VALUES ('systemtasks', 'root', '0', 'System Tasks');
INSERT INTO `tb_slidemenu` VALUES ('otherplaces', 'root', '0', 'Other Places');
INSERT INTO `tb_slidemenu` VALUES ('exploresite', 'root', '0', 'Explore Site');
INSERT INTO `tb_slidemenu` VALUES ('resources', 'root', '0', 'Resources');
INSERT INTO `tb_slidemenu` VALUES ('entertainment', 'companyhome', '1', 'Entertainment');
INSERT INTO `tb_slidemenu` VALUES ('games', 'companyhome', '1', 'Games');
INSERT INTO `tb_slidemenu` VALUES ('greetingcards', 'companyhome', '1', 'Greeting Cards');
INSERT INTO `tb_slidemenu` VALUES ('downloads', 'companyhome', '1', 'Downloads');
INSERT INTO `tb_slidemenu` VALUES ('newcars', 'companyhome', '1', 'New cars');
INSERT INTO `tb_slidemenu` VALUES ('smartstuff', 'companyhome', '1', 'Smart Stuff');
INSERT INTO `tb_slidemenu` VALUES ('viewsysteminfo', 'systemtasks', '1', 'View System info');
INSERT INTO `tb_slidemenu` VALUES ('addprograms', 'systemtasks', '1', 'Add programs');
INSERT INTO `tb_slidemenu` VALUES ('changesettings', 'systemtasks', '1', 'Change settings');
INSERT INTO `tb_slidemenu` VALUES ('addusers', 'systemtasks', '1', 'Add Users');
INSERT INTO `tb_slidemenu` VALUES ('MyNetworkPlaces', 'otherplaces', '1', 'My Network Places');
INSERT INTO `tb_slidemenu` VALUES ('MyDocuments', 'otherplaces', '1', 'My Documents');
INSERT INTO `tb_slidemenu` VALUES ('SharedDocuments', 'otherplaces', '1', 'Shared Documents');
INSERT INTO `tb_slidemenu` VALUES ('ControlPanel', 'otherplaces', '1', 'Control Panel');
INSERT INTO `tb_slidemenu` VALUES ('careers', 'exploresite', '1', 'Careers');
INSERT INTO `tb_slidemenu` VALUES ('buytickets', 'exploresite', '1', 'Buy Tickets');
INSERT INTO `tb_slidemenu` VALUES ('Business', 'exploresite', '1', 'Business');
INSERT INTO `tb_slidemenu` VALUES ('Enewsletters ', 'resources', '1', 'E-Newsletters ');
INSERT INTO `tb_slidemenu` VALUES ('DiscussionCent', 'resources', '1', 'Discussion Center ');
INSERT INTO `tb_slidemenu` VALUES ('WhitePapers ', 'resources', '1', 'White Papers ');
INSERT INTO `tb_slidemenu` VALUES ('OnlineCourses ', 'resources', '1', 'Online Courses ');
INSERT INTO `tb_slidemenu` VALUES ('OnlineBookLib', 'resources', '1', 'Online Book Library');

-- ----------------------------
-- Table structure for `tbtreeviewdata`
-- ----------------------------
DROP TABLE IF EXISTS `tbtreeviewdata`;
CREATE TABLE `tbtreeviewdata` (
  `id` varchar(20) collate latin1_general_ci NOT NULL,
  `parentid` varchar(20) collate latin1_general_ci NOT NULL,
  `text` varchar(200) collate latin1_general_ci default NULL,
  `image` varchar(30) collate latin1_general_ci default NULL,
  `expand` tinyint(1) default NULL,
  `rank` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tbtreeviewdata
-- ----------------------------
INSERT INTO `tbtreeviewdata` VALUES ('hardware', 'root', 'Hardware', 'Folder.gif', '1', '1');
INSERT INTO `tbtreeviewdata` VALUES ('software', 'root', 'Software', 'Folder.gif', '1', '2');
INSERT INTO `tbtreeviewdata` VALUES ('ebook', 'root', 'E-books', 'Folder.gif', '1', '4');
INSERT INTO `tbtreeviewdata` VALUES ('intel', 'hardware', 'Intel.doc', 'doc.gif', '0', '2');
INSERT INTO `tbtreeviewdata` VALUES ('recycle', 'root', 'Recycle', 'xpRecycle.gif', '1', '5');
INSERT INTO `tbtreeviewdata` VALUES ('amd', 'software', 'AMD.doc', 'doc.gif', '0', '2');
INSERT INTO `tbtreeviewdata` VALUES ('asus', 'hardware', 'Asus.doc', 'doc.gif', '0', '1');
INSERT INTO `tbtreeviewdata` VALUES ('windowxp', 'hardware', 'WindowXP.doc', 'doc.gif', '0', '3');
INSERT INTO `tbtreeviewdata` VALUES ('linux', 'software', 'Linux.doc', 'doc.gif', '0', '1');
INSERT INTO `tbtreeviewdata` VALUES ('macos', '', 'MacOs.doc', 'doc.gif', '0', '1');

-- ----------------------------
-- Table structure for `trans_type`
-- ----------------------------
DROP TABLE IF EXISTS `trans_type`;
CREATE TABLE `trans_type` (
  `type_id` varchar(50) character set utf8 NOT NULL,
  `type_inout` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trans_type
-- ----------------------------

-- ----------------------------
-- Table structure for `type_of_account`
-- ----------------------------
DROP TABLE IF EXISTS `type_of_account`;
CREATE TABLE `type_of_account` (
  `type_of_account` varchar(20) character set utf8 NOT NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`type_of_account`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of type_of_account
-- ----------------------------

-- ----------------------------
-- Table structure for `type_of_payment`
-- ----------------------------
DROP TABLE IF EXISTS `type_of_payment`;
CREATE TABLE `type_of_payment` (
  `type_of_payment` varchar(50) character set utf8 NOT NULL,
  `discount_percent` double default NULL,
  `discount_days` int(11) default NULL,
  `days` int(11) default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`type_of_payment`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of type_of_payment
-- ----------------------------
INSERT INTO `type_of_payment` VALUES ('Kredit 30 Hari', '0.12', '30', '30', '0', '', '');
INSERT INTO `type_of_payment` VALUES ('Kredit15 hari', '0.15', '0', '15', '0', '', '');
INSERT INTO `type_of_payment` VALUES ('60 Hari', '0', '30', '60', '0', '', '');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` varchar(50) character set utf8 NOT NULL,
  `username` varchar(50) character set utf8 default NULL,
  `password` varchar(50) character set utf8 default NULL,
  `path_image` varchar(255) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `disc_prc_max` double(11,0) default NULL,
  `disc_amt_max` double default NULL,
  `email` varchar(50) default NULL,
  `NIP` varchar(50) default NULL,
  `userlevel` varchar(50) default NULL,
  `active` int(11) default '0',
  `cid` varchar(10) default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('admin', 'admin', 'admin', '', '0', '0', '0', '', '', '', '0', 'C01');
INSERT INTO `user` VALUES ('Administrator', 'Administrator', 'admin', 'admin.gif', null, null, null, null, null, null, '0', null);
INSERT INTO `user` VALUES ('andri', 'andri', '1', '', null, null, null, null, null, 'GUEST', '1', 'C01');
INSERT INTO `user` VALUES ('buyer', 'buyer', '1', '', '0', '0', '0', '', '', '', '0', 'T01');
INSERT INTO `user` VALUES ('Kasir', 'kasir', '1', 'kasir.gif', null, null, null, null, null, null, '0', null);
INSERT INTO `user` VALUES ('sales', 'sales', '*sales', null, null, null, null, null, null, 'GUEST', '0', null);
INSERT INTO `user` VALUES ('Spv', 'Supervisor', '1', '', null, null, null, null, null, 'SUPER', '0', null);
INSERT INTO `user` VALUES ('usman', 'usman', '1', 'usman.jpg', null, null, null, null, null, null, '0', 'T01');
INSERT INTO `user` VALUES ('ujang', 'ujang', 'ujang', null, null, null, null, null, null, null, '0', 'T01');
INSERT INTO `user` VALUES ('acong', 'acong', 'acong', '', '0', '0', '0', '', '', '', '0', 'T01');

-- ----------------------------
-- Table structure for `user_group_modules`
-- ----------------------------
DROP TABLE IF EXISTS `user_group_modules`;
CREATE TABLE `user_group_modules` (
  `id` int(11) NOT NULL auto_increment,
  `group_id` varchar(50) character set utf8 default NULL,
  `module_id` varchar(50) character set utf8 default NULL,
  `permission` int(11) default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x1` (`group_id`,`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1655 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_group_modules
-- ----------------------------
INSERT INTO `user_group_modules` VALUES ('97', 'BYR', '_40110', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('98', 'BYR', '_40120', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('99', 'BYR', '_80010', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('100', 'BYR', '_80020', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('101', 'BYR', '_80030', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('102', 'BYR', '_90070', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('103', 'BYR', '_90071', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('104', 'BYR', '_90072', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('105', 'BYR', '_90073', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('106', 'BYR', '_90075', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('107', 'BYR', '_90076', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('165', 'Administrator', '_00000', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('192', 'SYSMENU', '_10000', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('193', 'SYSMENU', '_11000', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('194', 'SYSMENU', '_10060', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('195', 'SYSMENU', '_30010', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('196', 'SYSMENU', '_30011', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('197', 'SYSMENU', '_30012', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('265', 'Administrator', '_30000', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('307', 'BYR', '_40010', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('308', 'BYR', '_40040', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('309', 'BYR', '_40041', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('310', 'BYR', '_40042', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('311', 'BYR', '_40043', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('312', 'BYR', '_40044', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('313', 'BYR', '_40050', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('314', 'BYR', '_40051', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('315', 'BYR', '_40052', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('316', 'BYR', '_40053', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('372', 'BYR', '_90074', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('373', 'BYR', '_90077', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('374', 'BYR', '_90078', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('375', 'BYR', '_90079', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('376', 'BYR', '_90080', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('377', 'BYR', '_90081', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('378', 'BYR', '_90082', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('379', 'BYR', '_90083', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('380', 'BYR', '_90084', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('381', 'BYR', '_90120', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('382', 'BYR', '_90121', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('383', 'BYR', '_90122', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('384', 'BYR', '_90123', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('385', 'BYR', '_90124', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('386', 'BYR', '_90125', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('387', 'BYR', '_90126', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('388', 'BYR', '_90127', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('389', 'BYR', '_90128', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('390', 'BYR', '_90129', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('391', 'BYR', '_90131', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('392', 'BYR', '_90130', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('393', 'BYR', '_90132', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('398', 'FIN', '_10014', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('401', 'FIN', '_10022', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('402', 'FIN', '_10023', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('403', 'FIN', '_10024', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('407', 'FIN', '_10033', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('408', 'FIN', '_10034', '0', '1', null, null);
INSERT INTO `user_group_modules` VALUES ('727', 'SPV', '_30000.018', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('728', 'SPV', '_30000.019', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('729', 'SPV', '_30000.020', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('730', 'SPV', '_30000.021', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('731', 'SPV', '_30000.022', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('732', 'SPV', '_30000.023', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('733', 'SPV', '_30000.024', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('734', 'SPV', '_30000.025', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('735', 'SPV', '_30000.026', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('736', 'SPV', '_30000.027', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('737', 'SPV', '_30000.028', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('738', 'SPV', '_30000.029', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('739', 'SPV', '_30000.030', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('740', 'SPV', '_30000.031', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('741', 'SPV', '_30000.032', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('742', 'SPV', '_30000.034', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('743', 'SPV', '_30000.035', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('744', 'SPV', '_30000.036', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('745', 'SPV', '_30000.037', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('746', 'SPV', '_30000.038', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('747', 'SPV', '_30000.039', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('748', 'SPV', '_30000.040', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('749', 'SPV', '_30000.041', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('750', 'SPV', '_30000.054', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('751', 'SPV', '_30000.056', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('752', 'SPV', '_30000.057', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('753', 'SPV', '_30000.059', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('754', 'SPV', '_30000.063', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('755', 'SPV', '_30000.066', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('756', 'SPV', '_30000.100', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('757', 'ADM', '_30000.0', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('758', 'ADM', '_30000.001', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('759', 'ADM', '_30000.002', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('760', 'ADM', '_30000.003', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('761', 'ADM', '_30000.004', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('762', 'ADM', '_30000.005', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('763', 'ADM', '_30000.006', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('764', 'ADM', '_30000.007', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('765', 'ADM', '_30000.009', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('766', 'ADM', '_30000.012', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('767', 'ADM', '_30000.013', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('768', 'ADM', '_30000.014', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('769', 'ADM', '_30000.015', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('770', 'ADM', '_30000.016', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('771', 'ADM', '_30000.017', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('772', 'ADM', '_30000.018', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('773', 'ADM', '_30000.019', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('774', 'ADM', '_30000.020', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('775', 'ADM', '_30000.021', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('776', 'ADM', '_30000.022', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('777', 'ADM', '_30000.023', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('778', 'ADM', '_30000.024', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('779', 'ADM', '_30000.025', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('780', 'ADM', '_30000.026', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('781', 'ADM', '_30000.027', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('782', 'ADM', '_30000.028', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('783', 'ADM', '_30000.029', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('784', 'ADM', '_30000.030', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('785', 'ADM', '_30000.031', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('786', 'ADM', '_30000.032', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('787', 'ADM', '_30000.034', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('788', 'ADM', '_30000.035', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('789', 'ADM', '_30000.036', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('790', 'ADM', '_30000.037', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('791', 'ADM', '_30000.038', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('792', 'ADM', '_30000.039', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('793', 'ADM', '_30000.040', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('794', 'ADM', '_30000.041', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('795', 'ADM', '_30000.054', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('796', 'ADM', '_30000.056', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('797', 'ADM', '_30000.057', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('798', 'ADM', '_30000.059', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('799', 'ADM', '_30000.060', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('800', 'ADM', '_30000.061', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('801', 'ADM', '_30000.062', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('802', 'ADM', '_30000.063', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('803', 'ADM', '_30000.064', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('804', 'ADM', '_30000.065', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('805', 'ADM', '_30000.066', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('806', 'ADM', '_30000.100', '100', null, null, null);
INSERT INTO `user_group_modules` VALUES ('807', 'PUR', '_40000', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('808', 'PUR', '_40010', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('809', 'PUR', '_40011', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('810', 'PUR', '_40012', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('811', 'PUR', '_40040', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('812', 'PUR', '_40041', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('813', 'PUR', '_40042', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('814', 'PUR', '_40044', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('815', 'PUR', '_80000', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('816', 'PUR', '_80010', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('817', 'PUR', '_80011', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('818', 'PUR', '_80012', '0', null, null, null);
INSERT INTO `user_group_modules` VALUES ('819', 'BYR', 'socustomerEnvelop.rpt', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('820', 'BYR', '_10010', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('821', 'BYR', '_10020', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('822', 'BYR', '_10030', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('823', 'BYR', '_10060', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('824', 'BYR', '_10064', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('825', 'BYR', '_30000.0', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('826', 'BYR', '_30010', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('827', 'BYR', '_30020', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('828', 'BYR', '_30030', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('829', 'INV', '_80010', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('830', 'INV', '_80020', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('831', 'INV', '_80030', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1065', 'FIN', 'ID_ExportImport', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1066', 'FIN', 'ID_JasaKiriman', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1067', 'FIN', '_00000', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1068', 'FIN', '_00010', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1069', 'FIN', '_00011', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1070', 'FIN', '_00012', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1071', 'FIN', '_00013', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1072', 'FIN', 'frmMain.Addnew', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1073', 'FIN', '_80010.01', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1074', 'FIN', '_80010.02', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1075', 'FIN', '_80010.03', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1076', 'FIN', '_80010.04', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1077', 'FIN', '_80010.05', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1078', 'FIN', '_80010.06', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1079', 'FIN', '_80010.07', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1634', 'ANDRI', '_00010', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1635', 'ANDRI', '_00020', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1636', 'ANDRI', '_00030', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1637', 'ANDRI', '_00040', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1638', 'ANDRI', '_00050', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1639', 'ANDRI', '_10010', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1640', 'ANDRI', '_10020', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1641', 'ANDRI', '_10030', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1642', 'ANDRI', '_10060A', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1643', 'ANDRI', '_11000', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1644', 'ANDRI', '_13000', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1645', 'ANDRI', '_300900', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1646', 'ANDRI', '_300901', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1647', 'ANDRI', '_30170', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1648', 'ANDRI', '_80010.01', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1649', 'ANDRI', '_80010.02', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1650', 'ANDRI', '_80010.03', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1651', 'ANDRI', '_80010.04', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1652', 'ANDRI', '_80010.05', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1653', 'ANDRI', '_80010.06', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1654', 'ANDRI', '_80010.07', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1113', 'Administrator', '_40000', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1114', 'BYR', '_40000', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1115', 'BYR', '_80000', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1116', 'BYR', '_30000', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1117', 'BYR', '_60000', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1118', 'Administrator', '_60000', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1119', 'Administrator', '_80000', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1120', 'Administrator', '_90000', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1632', 'ANDRI', 'ID_ExportImport', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1633', 'ANDRI', 'ID_JasaKiriman', null, null, null, null);
INSERT INTO `user_group_modules` VALUES ('1631', 'ANDRI', 'frmMain.Addnew', null, null, null, null);

-- ----------------------------
-- Table structure for `user_job`
-- ----------------------------
DROP TABLE IF EXISTS `user_job`;
CREATE TABLE `user_job` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` varchar(50) character set utf8 default NULL,
  `group_id` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x1` (`user_id`,`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_job
-- ----------------------------
INSERT INTO `user_job` VALUES ('10', 'Spv', 'ADM', null, null, null);
INSERT INTO `user_job` VALUES ('11', 'Spv', 'BYR', null, null, null);
INSERT INTO `user_job` VALUES ('16', 'Kasir', 'INV', null, null, null);
INSERT INTO `user_job` VALUES ('17', 'Kasir', 'PUR', null, null, null);
INSERT INTO `user_job` VALUES ('18', 'Kasir', 'BYR', null, null, null);
INSERT INTO `user_job` VALUES ('19', 'usman', 'PUR', null, null, null);
INSERT INTO `user_job` VALUES ('20', 'usman', 'FIN', null, null, null);
INSERT INTO `user_job` VALUES ('45', 'Administrator', 'ADM', null, null, null);
INSERT INTO `user_job` VALUES ('115', 'andri', 'SYSMENU', null, null, null);
INSERT INTO `user_job` VALUES ('202', 'admin', 'Administrator', null, null, null);
INSERT INTO `user_job` VALUES ('50', 'sales', 'Administrator', null, null, null);
INSERT INTO `user_job` VALUES ('57', 'Spv', 'FIN', null, null, null);
INSERT INTO `user_job` VALUES ('59', 'sales', 'FIN', null, null, null);
INSERT INTO `user_job` VALUES ('60', 'Kasir', 'FIN', null, null, null);
INSERT INTO `user_job` VALUES ('61', 'Administrator', 'ANDRI', null, null, null);
INSERT INTO `user_job` VALUES ('200', 'bbb', 'DRV', null, null, null);
INSERT INTO `user_job` VALUES ('199', 'bbb', 'COL', null, null, null);
INSERT INTO `user_job` VALUES ('68', 'buyer', 'BYR', null, null, null);
INSERT INTO `user_job` VALUES ('111', 'andri', 'Gudang', null, null, null);
INSERT INTO `user_job` VALUES ('112', 'andri', 'INV', null, null, null);
INSERT INTO `user_job` VALUES ('113', 'andri', 'KSR', null, null, null);
INSERT INTO `user_job` VALUES ('114', 'andri', 'SPV', null, null, null);
INSERT INTO `user_job` VALUES ('116', 'andri', 'test', null, null, null);
INSERT INTO `user_job` VALUES ('201', 'admin', 'ADM', null, null, null);

-- ----------------------------
-- Table structure for `voucher_master`
-- ----------------------------
DROP TABLE IF EXISTS `voucher_master`;
CREATE TABLE `voucher_master` (
  `voucher_no` varchar(50) character set utf8 NOT NULL,
  `tanggal_dibuat` datetime default NULL,
  `tanggal_aktif` datetime default NULL,
  `tanggal_expire` datetime default NULL,
  `customer_number` varchar(50) character set utf8 default NULL,
  `invoice_number` varchar(50) character set utf8 default NULL,
  `voucher_amt` double default NULL,
  `voucher_amt_terpakai` double default NULL,
  `voucher_amt_sisa` double default NULL,
  `voucher_point` int(11) default NULL,
  `voucher_point_terpakai` int(11) default NULL,
  `voucher_point_sisa` int(11) default NULL,
  `comments` varchar(255) character set utf8 default NULL,
  `status` int(11) default NULL,
  PRIMARY KEY  (`voucher_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of voucher_master
-- ----------------------------

-- ----------------------------
-- Table structure for `wilayah`
-- ----------------------------
DROP TABLE IF EXISTS `wilayah`;
CREATE TABLE `wilayah` (
  `wilayah` varchar(50) character set utf8 default NULL,
  `update_status` int(11) default NULL,
  `kode` varchar(50) character set utf8 NOT NULL,
  `ongkos_kirim` double default NULL,
  PRIMARY KEY  (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wilayah
-- ----------------------------

-- ----------------------------
-- Table structure for `workorder`
-- ----------------------------
DROP TABLE IF EXISTS `workorder`;
CREATE TABLE `workorder` (
  `wo_number` varchar(50) NOT NULL default '',
  `wo_date` datetime default NULL,
  `so_number` varchar(50) default NULL,
  `customer` varchar(50) default NULL,
  `warehouse` varchar(50) default NULL,
  `org_id` varchar(50) default NULL,
  `amount` double default NULL,
  `comments` varchar(250) default NULL,
  `status` varchar(50) default NULL,
  `ordered_by` varchar(50) default NULL,
  `worked_by` varchar(50) default NULL,
  `picking` int(11) default NULL,
  `checking` int(11) default NULL,
  PRIMARY KEY  (`wo_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of workorder
-- ----------------------------
INSERT INTO `workorder` VALUES ('WO.001', '2013-01-02 00:00:00', 'SO.002', 'UDIN', 'Jakarta', null, '1000000', 'test', 'Open', 'Andri', 'Uin', '1', '1');
INSERT INTO `workorder` VALUES ('WO.0010', '2013-01-02 00:00:00', 'SO.002', 'UDIN', 'Jakarta', null, '1000000', 'test', 'Open', 'Andri', 'Uin', '1', '1');
INSERT INTO `workorder` VALUES ('WO.0010w', '2013-01-02 00:00:00', 'SO.002', 'UDIN', 'Jakarta', null, '0', '', '', '', '', '1', '1');
INSERT INTO `workorder` VALUES ('WO.0011', '2013-02-02 00:00:00', 'SO.002`', 'UDIN', 'Jakarta', null, '1000000', '', '', '', '', '1', '1');
INSERT INTO `workorder` VALUES ('WO.0012', '2013-01-02 00:00:00', 'SO.002', 'UDIN', 'Jakarta', null, '0', '', 'Open', '', '', '1', null);
INSERT INTO `workorder` VALUES ('WO.002', '2013-01-02 00:00:00', 'SO.002', 'UDIN', 'Jakarta', null, '1000000', 'test', 'Open', 'Andri', 'Uin', null, null);
INSERT INTO `workorder` VALUES ('WO.003', '2013-01-02 00:00:00', 'SO.002', 'UDIN', 'Jakarta', null, '1000000', 'test', 'Open', 'Andri', 'Uin', null, null);
INSERT INTO `workorder` VALUES ('WO.004', '2013-01-02 00:00:00', 'SO.002', 'UDIN', 'Jakarta', null, '1000000', 'test', 'Open', 'Andri', 'Uin', null, null);
INSERT INTO `workorder` VALUES ('WO.005', '2013-01-02 00:00:00', 'SO.002', 'UDIN', 'Jakarta', null, '1000000', 'test', 'Open', 'Andri', 'Uin', null, null);
INSERT INTO `workorder` VALUES ('WO.007', '2013-01-02 00:00:00', 'SO.002', 'UDIN', 'Jakarta', null, '1000000', 'test', 'Open', 'Andri', 'Uin', '1', null);
INSERT INTO `workorder` VALUES ('WO.008', '2013-01-02 00:00:00', 'SO.002', 'UDIN', 'Jakarta', null, '1000000', 'test', 'Open', 'Andri', 'Uin', '1', null);

-- ----------------------------
-- Table structure for `workorder_detail`
-- ----------------------------
DROP TABLE IF EXISTS `workorder_detail`;
CREATE TABLE `workorder_detail` (
  `wo_number` varchar(50) default NULL,
  `item_number` varchar(50) default NULL,
  `description` varchar(220) default NULL,
  `comments` varchar(500) default NULL,
  `quantity` double default NULL,
  `unit` varchar(50) default NULL,
  `mu_qty` double default NULL,
  `mu_unit` varchar(50) default NULL,
  `price` double default NULL,
  `disc_prc` double default NULL,
  `disc_amt` double default NULL,
  `total` double default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of workorder_detail
-- ----------------------------
INSERT INTO `workorder_detail` VALUES ('WO.002', 'ABC', 'KOPI SUSU ABC', null, '1', '1', null, null, '1', '1', null, '1', '19');
INSERT INTO `workorder_detail` VALUES ('WO.002', 'ABC', 'KOPI SUSU ABC', null, '1', '1', null, null, '1', '1', null, '1', '20');
INSERT INTO `workorder_detail` VALUES ('WO.004', 'ABC', 'KOPI SUSU ABC', null, '1', '1', null, null, '1', '0', null, '1', '31');
INSERT INTO `workorder_detail` VALUES ('WO.004', 'ABC', '1', null, '11', '1', null, null, '1', '0', null, '1', '32');
INSERT INTO `workorder_detail` VALUES ('WO.004', 'ABC', 'KOPI SUSU ABC', null, '1', '1', null, null, '1', '0', null, '1', '33');
INSERT INTO `workorder_detail` VALUES ('WO.004', 'Nokia', 'Handphone Nokia', null, '1', '1', null, null, '1', '0', null, '1', '34');
INSERT INTO `workorder_detail` VALUES ('WO.005', 'Nokia', 'Handphone Nokia', null, '1', 'Pcs', null, null, '1000000', '0', null, '1000000', '37');
INSERT INTO `workorder_detail` VALUES ('WO.0011', 'ABC', 'KOPI SUSU ABC', null, '1', 'Pcs', null, null, '10000', '0', null, '10000', '38');
INSERT INTO `workorder_detail` VALUES ('WO.0010', 'ABC', 'KOPI SUSU ABC', null, '1', 'PCS', null, null, '1000', '0', null, '1000', '60');
INSERT INTO `workorder_detail` VALUES ('WO.0010', 'CQ43', 'Compaq Presario', null, '1', 'Pcs', null, null, '3000000', '0', null, '3000000', '62');
INSERT INTO `workorder_detail` VALUES ('WO.0010', 'DJISAMSU', 'KOPI SUSU ABC', null, '1', 'Pcs', null, null, '0', '0', null, '0', '63');
INSERT INTO `workorder_detail` VALUES ('WO.0010', 'CQ43', 'Compaq Presario', null, '1', 'Pcs', null, null, '3000000', '0', null, '3000000', '64');
INSERT INTO `workorder_detail` VALUES ('WO.0010', 'ABC', 'KOPI SUSU ABC', null, '1', 'PCS', null, null, '1000', '0', null, '1000', '65');
INSERT INTO `workorder_detail` VALUES ('WO.001', 'Nokia', 'Handphone Nokia', null, '1', 'PCS', null, null, '1000000', '0', null, '1000000', '68');
INSERT INTO `workorder_detail` VALUES ('WO.001', 'Nokia', 'Handphone Nokia', null, '1', 'PCS', null, null, '1000000', '0', null, '1000000', '69');
INSERT INTO `workorder_detail` VALUES ('WO.001', 'Nokia', 'Handphone Nokia', null, '1', 'PCS', null, null, '1000000', '0', null, '1000000', '82');
INSERT INTO `workorder_detail` VALUES ('WO.008', 'ABC', 'KOPI SUSU ABC', null, '1', 'PCS', null, null, '1000', '0', null, '1000', '83');
INSERT INTO `workorder_detail` VALUES ('WO.008', 'CQ43', 'Compaq Presario', null, '1', 'Pcs', null, null, '3000000', '0', null, '3000000', '85');
INSERT INTO `workorder_detail` VALUES ('WO.0010w', 'CQ43', 'Compaq Presario', null, '1', 'Pcs', null, null, '3000000', '0', null, '3000000', '86');
INSERT INTO `workorder_detail` VALUES ('WO.0010w', 'ABC', 'KOPI SUSU ABC', null, '1', 'PCS', null, null, '1000', '0', null, '1000', '87');
INSERT INTO `workorder_detail` VALUES ('WO.0010w', 'DJISAMSU', 'KOPI SUSU ABC', null, '1', 'Pcs', null, null, '0', '0', null, '0', '88');
INSERT INTO `workorder_detail` VALUES ('WO.008', 'SLNC', 'SALON PAS CAIR', null, '1', 'Pcs', null, null, '0', '0', null, '0', '89');
INSERT INTO `workorder_detail` VALUES ('WO.0010w', 'DJISAMSU', 'KOPI SUSU ABC', null, '1', 'Pcs', null, null, '0', '0', null, '0', '90');
INSERT INTO `workorder_detail` VALUES ('WO.001', 'DJISAMSU', 'KOPI SUSU ABC', null, '2', 'Pcs', null, null, '1000', '0', null, '1000', '91');
INSERT INTO `workorder_detail` VALUES ('WO.001', 'SLNC', '', null, '1', 'Pcs', null, null, '9000', '0', null, '0', '92');

-- ----------------------------
-- Table structure for `yes_smartsearchdefinition`
-- ----------------------------
DROP TABLE IF EXISTS `yes_smartsearchdefinition`;
CREATE TABLE `yes_smartsearchdefinition` (
  `searchid` varchar(50) character set utf8 default NULL,
  `sequence` int(11) default NULL,
  `optionlabel` varchar(50) character set utf8 default NULL,
  `listlabel` varchar(50) character set utf8 default NULL,
  `rowsource` double default NULL,
  `columncount` int(11) default NULL,
  `columnwidths` varchar(40) character set utf8 default NULL,
  `boundcolumn` int(11) default NULL,
  `textsearchlabel` varchar(22) character set utf8 default NULL,
  `textsearchfield` varchar(25) character set utf8 default NULL,
  `lastselectedoption` int(11) default NULL,
  `source_table` varchar(50) character set utf8 default NULL,
  `line_number` int(11) NOT NULL auto_increment,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`line_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of yes_smartsearchdefinition
-- ----------------------------

-- ----------------------------
-- Table structure for `yescalendaricons`
-- ----------------------------
DROP TABLE IF EXISTS `yescalendaricons`;
CREATE TABLE `yescalendaricons` (
  `noteiconname` varchar(50) character set utf8 default NULL,
  `noteiconcategory` varchar(50) character set utf8 default NULL,
  `noteicon` double default NULL,
  `update_status` int(11) default NULL,
  `sourceautonumber` varchar(50) character set utf8 default NULL,
  `sourcefile` varchar(255) character set utf8 default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of yescalendaricons
-- ----------------------------

-- ----------------------------
-- View structure for `qry_coa`
-- ----------------------------
DROP VIEW IF EXISTS `qry_coa`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qry_coa` AS select `chart_of_accounts`.`account` AS `account`,`chart_of_accounts`.`account_description` AS `account_description`,_utf8'D' AS `jenis`,`chart_of_accounts`.`db_or_cr` AS `db_or_cr`,`chart_of_accounts`.`beginning_balance` AS `saldo_awal`,`chart_of_accounts`.`group_type` AS `parent` from `chart_of_accounts` union all select `gl_report_groups`.`group_type` AS `group_type`,`gl_report_groups`.`group_name` AS `group_name`,_utf8'H' AS `jenis`,_utf8'' AS ``,NULL AS `0`,`gl_report_groups`.`parent_group_type` AS `parent_group_type` from `gl_report_groups`;

<?
 
$table="payroll";
$sql=" 
CREATE TABLE ".$cid."jenis_tunjangan (
	kode varchar (50) character set utf8 NOT NULL ,
	keterangan varchar (50) character set utf8 NULL ,
	sifat varchar (50) character set utf8 NULL ,
	is_variable bit(1) default 0,
	ref_column varchar (50) character set utf8 NULL ,
	update_status int NULL ,
	PRIMARY KEY  (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
if($link->query($sql))echo mysqli_error($link);
$sql=" 
CREATE TABLE ".$cid."jenis_potongan (
	kode varchar (50) character set utf8 NOT NULL ,
	keterangan varchar (50) character set utf8 NULL ,
	sifat varchar (50) character set utf8 NULL ,
	is_variable bit(1) default 0,
	ref_column varchar (50) character set utf8 NULL ,
	update_status int NULL ,
	PRIMARY KEY  (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
if($link->query($sql))echo mysqli_error($link);
$sql=" 

CREATE TABLE ".$cid."employee_type (
	kode varchar (50) character set utf8 NOT NULL ,
	keterangan varchar (50) character set utf8 NULL ,
	update_status int NULL ,
	PRIMARY KEY  (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
if($link->query($sql))echo mysqli_error($link);
$sql=" 

CREATE TABLE ".$cid."employee_group (
	kode varchar (50) character set utf8 NOT NULL ,
	keterangan varchar (50) character set utf8 NULL ,
	update_status int NULL ,
	PRIMARY KEY  (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
if($link->query($sql))echo mysqli_error($link);
$sql=" 

CREATE TABLE ".$cid."employee_status (
	status varchar (50) character set utf8 NOT NULL ,
	keterangan varchar (50) character set utf8 NULL ,
	update_status int NULL ,
	PRIMARY KEY  (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
if($link->query($sql))echo mysqli_error($link);
$sql=" 

CREATE TABLE ".$cid."employee_level (
	kode varchar (50) character set utf8 NOT NULL ,
	keterangan varchar (50) character set utf8 NULL ,
	PRIMARY KEY  (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
if($link->query($sql))echo mysqli_error($link);
$sql=" 

CREATE TABLE ".$cid."divisions (
	div_code varchar (50) character set utf8 NOT NULL ,
	div_name varchar (50) character set utf8 NULL ,
	PRIMARY KEY  (div_code)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
if($link->query($sql))echo mysqli_error($link);
?>
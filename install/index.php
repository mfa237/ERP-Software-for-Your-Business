<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MaxOn Installation Wizard</title>
    <link rel="stylesheet" type="text/css" href="installer.css" />
</head>
<body>
	
<div id="CanvasDiv">
	<h1>SELAMAT DATANG</h1>
	<H2>PROSES INSTALASI MAXON ERP</H2>
	<P>Silahkan input seting database dan server MySQL dibawah ini:</P>
	<form id="database" action="create_db.php"  method="POST" >
		<ul><li>
			<fieldset>
				<label for="server">Nama Server atau alamat IP MySQL Server.</label>
					<input type="text" name="server" value="localhost">	
			</fieldset>
			</li>
			<li>
			<fieldset>
				<label for="database">Nama Database untuk MaxOn, gunakan awalan max_ bila perlu.
				</label>
					<input type="text" name="database" value="maxon">	
			</li>
			<li>
			<fieldset>
				<label for="user_id">
					UserID untuk login ke database MySQL.
				</label>
					<input type="text" name="user_id" value="root">
			</fieldset>
			</li>
			<li>
			<fieldset>
				<label for="user_pass">
					Password untuk login ke database MySQL.
				</label>
					<input type="text" name="user_pass" value="">
			</fieldset>
			</li>
			<li>
			<fieldset>
				<button type="submit">Submit</button>		
				
			</fieldset>
			</li>
		</ul>		
	</form>
</div>
</body>

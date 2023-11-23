<?php 

 
require 'functions.php';
session_start ();

if ( ! isset($_SESSION['login'])){
    echo "<script> document.location.href = 'login2.php'; </script>";
    exit;
}

if (isset($_POST['daftar'])){
	if (kondisi($_POST) > 0 ){
		echo "<script> alert ('User baru telah berhasil disimpan') ;</script>";
	}

} else {
	echo mysqli_error($conn);

}



 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrasi</title>
	<link rel="stylesheet" type="text/css" href="desainedit.css">
</head>
<body><center>
<div class="form">
<table>

	<tr>
	<form action="" method="post">
		<p class="headeredit">TAMBAH AKUN ADMIN</p>
		<label>
			<td><label for="username">Username</label></td></tr>
			<td><input type="text" name="username" id="username" size="45"></td> <tr>
			<td><label for="password">Password</label></td> </tr>
			<td><input type="password" name="password" id="password" size="45"></label></td><tr>
			<td><label for="password2">Konfirmasi password</label></td></tr>
			<td><input type="password" name="password2" id="password2" size="45"></label></td>

			<tr>

				<td><button type="submit" name="daftar" class="edit">Registrasi!</button></td>
			</tr>
			
	
	
	</form>


</table>
 <a href="index.php"><button class="back2">Kembali</button></a>
</div> </center>
</body>
</html>
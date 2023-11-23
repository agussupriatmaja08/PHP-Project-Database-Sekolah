<?php

//sambungkan ke functions
session_start();

if (!isset($_SESSION['login'])) {
	echo "<script> document.location.href = 'login2.php'; </script>";
	exit;
}


require 'functions.php';

if (isset($_POST["submit"])) {
	//ambil data dari tiap elemen form 

	//cek apakah data berhasil disimpan atau tidak 
	$a = addsiswa($_POST);
	if ($a == 1) {
		echo "<script> 
			alert ('Data berhasil disimpan!');
			document.location.href = 'datasiswa.php';

			</script> 

		";
	} else if ($a == 2) {
		echo "<script> 
			alert ('Nis Duplikat!');

			</script>";
	} else{
		echo "<script> 
			alert ('Gagal tersimpan!');

			</script>";

	}

}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add</title>
	<link rel="stylesheet" type="text/css" href="desainedit.css">
</head>
<body>
	<center>
	<div class="form">
		<p class="headeredit">TAMBAH DATA SISWA</p>
	<form action="" method="post" enctype="multipart/form-data">  
		
		<table>
			<tr>
				<td><label for="nama">Nama </label> </td> 
				<td><input type="text" name="nama" id="nama" required></td>


			</tr>
			<tr>
				<td><label for="nis">Nis </label></td>
				<td><input type="text" name="nis" id="nis" required></td>
				

			</tr>
			<tr>
				<td><label for="alamat">Alamat </label></td>
				<td><input type="text" name="alamat" id="alamat" required></td>
				

			</tr>
			<tr>
				<td><label for="jurusan">Jurusan </label></td>
				<td><input type="text" name="jurusan" id="jurusan" required></td>
				

			</tr>
			<tr>
				<td><label for="img">	Gambar </label></td>
				<td><input type="file" name="img" id="img"></td>
				

			</tr>

		</table>
		<br><br>
		<button type="submit" name="submit" class="edit">Tambahkan data</button>
	</form>

<a href="datasiswa.php"> <button class="back">Kembali</button></a>
</div> </center>


	



</body>
</html>



<?php

session_start();

if (!isset($_SESSION['login'])) {
	echo "<script> document.location.href = 'login2.php'; </script>";
	exit;
}


require 'functions.php';


$id = $_GET["NIS"]; //ambil data di url


$siswa = perintah("SELECT	* FROM siswa WHERE NIS = $id")[0];


if (isset($_POST["submit"])) {

	$a = edit($_POST);

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
	} else {
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
	<title>Ubah</title>
	<link rel="stylesheet" type="text/css" href="desainedit.css">
</head>
<body>

	<center><div class="form">
		<p class="headeredit">EDIT SISWA</p>
	<form action="" method="post" enctype="multipart/form-data">  
		
		<table class="tabel2">
		<input type="text" name="id" id="id" hidden  
				 value="<?= $siswa["id"]; ?>" size="30">
				
		<tr>
			<td><div class="form_wrap">
			<div class="form_item">
				<label for="nama">Nama </label></td>
				<td><input type="text" name="nama" id="nama" required  
				 value="<?= $siswa["Nama"]; ?>" size="30">
				 </td>
			</div>
			</div>

			</tr>
			<tr>
			<td><div class="form_item">
				<label for="nis">Nis </label></td>
			<td><input type="text" name="nis" id="nis" required
				value="<?= $siswa["NIS"]; ?>" size="30"></td>
				

			</div>
			</tr>
			<tr>
			<td><div class="form_item">
				<label for="alamat">Alamat </label> </td>
			<td><input type="text" name="alamat" id="alamat" required
				value="<?= $siswa["alamat"]; ?>" size="30"></td>
				

			</div>
			</tr>
			<tr>
			<td><div class="form_item">
				<label for="jurusan">Jurusan </label></td>
			<td><input type="text" name="jurusan" id="jurusan" required
				value="<?= $siswa["jurusan"]; ?>" size="30"></td>
				

			</div>
			</tr>
			<tr>
			<td><div class="form_item" >
				<label for="img">	Gambar </label></td>
			<td><input type="file" name="img" id="img"
				value="<?= $siswa["gambar"]; ?>" size="30"></td>
				

			</div>
			</tr>
			
		
			</table>
			<br> <br>
			<button type="submit" name="submit" class="edit">Simpan data</button>
	</form>
<a href="datasiswa.php"> <button class="back">Kembali</button></a>
</div></center>

</body>
</html>



<?php 

session_start ();

if ( ! isset($_SESSION['login'])){
    echo "<script> document.location.href = 'login2.php'; </script>";
    exit;
}


require 'functions.php';


$id = $_GET["NIP"]; //ambil data di url


$guru = perintah("SELECT * FROM guru WHERE NIP = $id")[0];


if (isset($_POST["submit"])){

if( edit2($_POST) > 0){

	echo "<script> 
			alert ('Data berhasil diubah!');
			document.location.href = 'dataguru.php';

			</script> 

		";
}else {

	echo "<script> 
			alert ('Data gagal diubah!');

			</script>";
	}

}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Guru</title>
	<link rel="stylesheet" type="text/css" href="desainedit.css">
</head>
<body> <center> <div class="form">

	<form action="" method="post">  
		<p class="headeredit">EDIT DATA GURU</p>
		<table	>
			<tr>
				<td><label for="nama">Nama </label></td>
				<td><input type="text" name="nama" id="nama" required  
				 value="<?= $guru["Nama"]; ?>"></td>


			</tr>
			<tr>
				<td><label for="nip">NIP </label> </td>
				<td><input type="text" name="nip" id="nip" required
				value="<?= $guru["NIP"]; ?>"></td>
				

			</tr>
			<tr>
				<td><label for="alamat">Alamat </label></td>
				<td><input type="text" name="alamat" id="alamat" required
				value="<?= $guru["alamat"]; ?>"></td>
				

			</tr>

		</table	>
		<br><br>
		<button type="submit" name="submit" class="edit">Ubah data</button>
	</form>
<a href="dataguru.php"> <button class="back">Kembali</button></a> </div></center>



	



</body>
</html>



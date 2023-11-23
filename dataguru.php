<?php 
//koneksi ke database
// $db = mysqli_connect("localhost", "root", "", "sma");

// //ambil data dari tabel mahasiswa / query data guru
// $result2 = mysqli_query($db, "SELECT * FROM guru" );


require 'functions.php';
session_start ();

if ( ! isset($_SESSION['login'])){
    echo "<script> document.location.href = 'login2.php'; </script>";
    exit;
}

$guru = perintah("SELECT * FROM guru");

if (isset($_POST['cari'])){
	$guru = cari2($_POST['keyword']);
}

//ambil data (fetch) mahasiswa dari object result 
//mysqli_fetch_row() // mengembalikan array numerik
//mysqli_fetch_assoc() //mengambalikan array assciative 
//mysqli_fetch_object()


 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tampilan admin</title>


	<link rel="stylesheet" type="text/css" href="desain.css">
</head>
<body>
<nav>
	<h1 class="logo">DATA GURU SMAN 5 TOKYO</h1>

</nav>
<br>	<br><br>

<form method="post" action="" >
<input type="text" name="keyword" class="input">
<button  type="submit" name="cari" class="cari">Cari</button>
</form>

<a href="addguru.php" class="sun"> <button class="add">Tambahkan data guru</button></a>

<br><br>

<table border="1" cellpadding="10" cellspacing="0" class="table">

	<tr>
			<td class="lala1">No</td>
			<td class="lala">Pengaturan</td>
			<td class="lala">Nama</td>
			<td class="lala">NIP</td>
			<td class="lala2">Alamat</td>
			
			
	</tr>
<?php $j=1; ?>
<?php foreach( $guru as $row1) : ?>
	<tr>
		
		<td class="sun"> <?= $j ?> </td>
		<td class="sun">
			<a href="editguru.php?NIP=<?= $row1["NIP"]; ?>"> <button class="edit">Edit</button></a> 
			<a href="hapusguru.php?NIP=<?= $row1["NIP"]; ?>"  onclick ="return confirm('Apakah ingin dihapus?');"> <button class="hapus">hapus</button></a>
		</td>
		<td class="sun"><?= $row1["Nama"]; ?></td>
		<td class="sun"><?= $row1["NIP"]; ?></td>
		<td class="sun"><?= $row1["alamat"]; ?></td>
		



	</tr>
	<?php $j++ ;?>
<?php endforeach; ?>
</table>
<br> 

<a href="index.php" class="sun"> <button class="back">Kembali</button></a>
</body>
</html>


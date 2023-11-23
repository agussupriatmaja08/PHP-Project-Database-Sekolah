<?php 

//koneksi ke database
// $db = mysqli_connect("localhost", "root", "", "sma");

// //ambil data dari tabel mahasiswa / query data siswa
// $result = mysqli_query($db, "SELECT * FROM siswa" );

session_start ();

if ( ! isset($_SESSION['login'])){
    echo "<script> document.location.href = 'login2.php'; </script>";
    exit;
}

require 'functions.php'; //koneksi ke function


$siswa = perintah("SELECT * FROM siswa");

if (isset($_POST['cari'])){
	$siswa = cari($_POST["keyword"]);
}
// $siswa = query("SELECT * FROM siswa");
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
	<title>Data Siswa</title>


	<link rel="stylesheet" type="text/css" href="desain.css">
</head>
<body>


<nav>
	<h1 class="logo">DATA SISWA SMAN 5 TOKYO</h1>

</nav>

<br> <br><br><br> <br> <br>
<!-- fitur cari -->



<form action="" method="post">
<input type="text" name="keyword" placeholder="cari data siswa" size="30" class="input" id="input">
<button type="submit" name="cari" class="cari" id="cari"> Cari </button>
</form>


<div class="all">

	<a href="addsiswa.php" class="sun"> <button class="add">Tambahkan data siswa</button></a>

	<br> <br>


<div id="conatiner">
<table rules="cols" >
<center>

	<tr> 

			<td class="lala1">No</td>
			<td class="lala">Pengaturan</td>
			<td class="lala">Foto</td>
			<td class="lala">Nama</td>
			<td class="lala">NIS</td>
			<td class="lala">Alamat</td>
			<td class="lala2">Jurusan</td>

			
	</tr>
<?php $i=1; ?>
<?php foreach( $siswa as $row): ?>
	<tr>
		
		<td class="sun"> <?= $i ?> </td>
		<td class="sun">
			<a href="editsiswa.php?NIS=<?= $row["NIS"]; ?>"><button class="edit">Edit</button></a> 
			<a href="hapussiswa.php?NIS=<?= $row["NIS"]; ?>" onclick ="return confirm('Data ingin dihapus?');"><button class="hapus">Hapus</button></a>
		</td>
		<td> <img src="img/<?= $row["gambar"]; ?>"></td>
		<td class="sun"><?= $row["Nama"]; ?></td>
		<td class="sun"><?= $row["NIS"]; ?></td>
		<td class="sun"><?= $row["alamat"]; ?></td>
		<td class="sun"><?= $row["jurusan"]; ?></td>



	</tr>



	<?php $i++ ;?>
<?php endforeach; ?>
</table>
</div>

<a href="index.php" class="sun"> <button class="back">Kembali</button></a>


</div>

<script src="js/script.js"></script>
</body>
</html>


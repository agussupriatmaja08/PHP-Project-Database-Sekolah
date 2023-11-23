<?php 
require 'loginsiswa.php';

// $conn = mysqli_connect('localhost', 'root', '', 'sma');

 $nis = mysqli_query($conn, "SELECT NIS FROM enduser WHERE username =  $username");	

$a = mysqli_fetch_assoc($nis);

require 'funtions.php';
$siswa=  queryy("SELECT * FROM siswa WHERE NIS = $a ");



 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Siswa</title>
</head>
<body>
<?php foreach( $siswa as $row): ?>
	<table>
		
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?= $row["Nama"]; ?></td>
		</tr>
		<tr>
			<td>NIS </td>
			<td>:</td>
			<td><?= $row["NIS"]; ?></td>
		</tr>
		<tr>
			<td>Alamat </td>
			<td>:</td>
			<td><?= $row["alamat"]; ?></td>
		</tr>
		<tr>
			<td>Jurusan </td>
			<td>:</td>
			<td><?= $row["jurusan"]; ?></td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td>:</td>
			<td><?= $row["gambar"]; ?></td>
		</tr>


	</table>
<?php endforeach; ?>

</body>
</html>
<?php 

session_start ();
$conn = mysqli_connect("localhost", "root", "", "sma");


if ( ! isset($_SESSION['login'])){
    echo "<script> document.location.href = 'login2.php'; </script>";
    exit;


// sambungkan ke database 
}

if (isset($_POST["submit"])){
	//ambil data dari tiap elemen form 
	global $conn;
	$Nama = htmlspecialchars($_POST["Nama"]);
	$NIP = htmlspecialchars($_POST["NIP"]);
	$alamat = htmlspecialchars($_POST["alamat"]);
	


	//query insert data 
	$qry = "INSERT INTO guru values ('$Nama', '$NIP', '$alamat')";
	mysqli_query($conn, $qry);


	//cek apakah data berhasil disimpan atau tidak 
	if(mysqli_affected_rows($conn) > 0){
		echo "<script> 
			alert ('Data berhasil disimpan!');
			document.location.href = 'dataguru.php';

			</script> 

		";
	}else {
		echo "<script> 
			alert ('Data gagal disimpan!');

			</script>"; 	}

}







 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title class="sun">Tambahkan data guru!</title>
	<link rel="stylesheet" type="text/css" href="desainedit.css">
</head>
<body> <center> <div class="form">
	<form action="" method="post">  
		<p class="headeredit">TAMBAH DATA GURU</p>
		
		<table>
			<tr>
				<td><label for="Nama">Nama :</label></td>
				<td><input type="text" name="Nama" id="Nama" required></td>


			</tr>
			<tr>
				<td><label for="NIP">Nip :</label></td>
				<td><input type="text" name="NIP" id="NIP" required></td>
				

			</tr>
			<tr>
				<td><label for="alamat">Alamat :</label></td>
				<td><input type="text" name="alamat" id="alamat" required></td>
				

			</tr>
		
		</table>
		<br>
		<button type="submit" name="submit" class="edit">Tambahkan data</button>

	</form>

<a href="dataguru.php"><button  class="back">Kembali</button></a></div>
</center>



	



</body>
</html>



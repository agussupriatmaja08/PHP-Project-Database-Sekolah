<?php

$conn = mysqli_connect("localhost", "root", "", "sma");

function hapus($NIS)
{

	global $conn;
	mysqli_query($conn, "DELETE FROM siswa WHERE NIS = $NIS");
	return mysqli_affected_rows($conn);
}



?>


 <?php
 function hapusguru($NIP)
 {

	 global $conn;
	 mysqli_query($conn, "DELETE FROM guru WHERE NIP = $NIP");
	 return mysqli_affected_rows($conn);
 }


 ?>

<?php

function perintah($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function addsiswa($data)
{
	global $conn;

	$nama = htmlspecialchars($_POST["nama"]);
	$nis = htmlspecialchars($_POST["nis"]);
	$alamat = htmlspecialchars($_POST["alamat"]);
	$jurusan = htmlspecialchars($_POST["jurusan"]);

	$validNis = mysqli_query($conn, "SELECT NIS FROM siswa WHERE NIS = $nis");

	if ((mysqli_num_rows($validNis) > 0)) {
		return 2;
	} 
		//upload gambar

		$img = upload();
		if (!$img) {
			return false;
		}
		//query insert data 
		$qri = "INSERT INTO siswa values ('', '$nama', '$nis', '$alamat',  '$img', '$jurusan')";
		mysqli_query($conn, $qri);
		if (mysqli_affected_rows($conn) > 0) {
			return 1;
		} else {
			return 0;
		}
		// return mysqli_affected_rows($conn);

	
}
function edit($data)
{

	global $conn;
	//ambil data dari tiap elemen form 
	$id = htmlspecialchars($_POST["id"]);
	$nama = htmlspecialchars($_POST["nama"]);
	$nis = htmlspecialchars($_POST["nis"]);
	$alamat = htmlspecialchars($_POST["alamat"]);
	$jurusan = htmlspecialchars($_POST["jurusan"]);

	$validNis = mysqli_query($conn, "SELECT NIS FROM siswa WHERE NIS = $nis AND id != $id");


	if ((mysqli_num_rows($validNis) > 0)) {
		return 2;
	}
	//upload gambar

	$img = upload();
	if (!$img) {
		return false;
	}



	//query insert data 
	$qry = "UPDATE siswa SET  
	nama ='$nama', 
	NIS ='$nis', 
	alamat = '$alamat', 
	jurusan ='$jurusan', 
	gambar = '$img' WHERE NIS = $nis ";

	mysqli_query($conn, $qry);
	if (mysqli_affected_rows($conn) > 0) {
		return 1;
	} else {
		return 0;
	}
}

function upload()
{

	$namaFile = $_FILES['img']['name'];
	$ukuranFile = $_FILES['img']['size'];
	$error = $_FILES['img']['error'];
	$tmpName = $_FILES['img']['tmp_name'];


	//cek apakah tidak ada gambar yang diupload
	if ($error === 4) {

		echo "<script>	
					alert	('pilih gambar terlebih dahulu');
				 </script>";
		return false;
	}


	//cek apakah yang diupload gambar 
	$eksensiGambarValid = ['jpg', 'jpeg', 'png', 'jfif'];
	$eksensiGambar = explode('.', $namaFile);
	$eksensiGambar = strtolower((end($eksensiGambar)));

	if (!in_array($eksensiGambar, $eksensiGambarValid)) {

		echo "<script>	
					alert	('Yang anda upload bukan gambar !');
				 </script>";
		return false;
	}


	//cek ukuran gambar 

	if ($ukuranFile > 300000) {
		echo "<script>	
					alert	('Ukuran gambar terlalu besar!');
				 </script>";
		return false;
	}

	//mengubah nama gambar

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $eksensiGambar;
	//memindahkan foto ke tempat yang disediakan
	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}


function edit2($data)
{

	global $conn;
	//ambil data dari tiap elemen form 

	$nama = htmlspecialchars($_POST["nama"]);
	$nip = htmlspecialchars($_POST["nip"]);
	$alamat = htmlspecialchars($_POST["alamat"]);



	//query insert data 
	$qry = "UPDATE guru SET  
	nama ='$nama', 
	NIP ='$nip', 
	alamat = '$alamat' WHERE NIP= $nip ";

	mysqli_query($conn, $qry);
	return mysqli_affected_rows($conn);
}

function cari($keyword)
{

	$qry = "SELECT * FROM siswa WHERE 
					nama LIKE '%$keyword%' OR 
					NIS LIKE '%$keyword%' OR
					alamat LIKE '%$keyword%' OR
					jurusan	LIKE '%$keyword%' 
					";

	return perintah($qry);


}

function cari2($keyword)
{
	$qry = "SELECT * FROM guru WHERE 
					nama LIKE '%$keyword%' OR 
					NIP LIKE '%$keyword%' OR
					alamat LIKE '%$keyword%' 
					";

	return perintah($qry);


}

?>


   <?php
   function kondisi($data)
   {
	   global $conn;

	   $username = strtolower(stripcslashes($data["username"]));
	   $password = mysqli_real_escape_string($conn, $data["password"]);
	   $password2 = mysqli_real_escape_string($conn, $data["password2"]);

	   if ($password !== $password2) {
		   echo "<script> alert ('Konfirmasi password salah!'); </script>";
		   return false;
	   }

	   //cek username apakah sudah ada apa belum
   	$result = mysqli_query($conn, "SELECT username FROM users WHERE 	username = '$username'");

	   if (mysqli_fetch_assoc($result)) {
		   echo "<script> alert('Username telat tersedia, mohon masuk username yang lain'); </script>";
		   return false;
	   }



	   //endkripsi password 
   	$password = password_hash($password, PASSWORD_DEFAULT);


	   //tambahkan username ke database 
   	mysqli_query($conn, "INSERT INTO users VALUES (' ' ,'$username', '$password')");

	   return mysqli_affected_rows($conn);


   }

   ?>
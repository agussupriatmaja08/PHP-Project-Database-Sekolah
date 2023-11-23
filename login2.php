<?php 
session_start();
require 'functions.php';


//cek cookie 
if (isset($_COOKIE['kode']) && isset($_COOKIE['key'])){
	$kode = $_COOKIE['kode'];
	$key = $_COOKIE['key'];

	//ambil username berdasarkan id
	$a = mysqli_query($conn, "SELECT username FROM users WHERE id = $kode");
	$row = mysqli_fetch_assoc($a);
	//cek cookie dan username
	if ($key === hash('sha256', $row['username'])){
		$_SESSION[' login']	 = true ;
	}

}

	if(isset($_SESSION['login'])){
		echo "<script> 
				
					document.location.href = 'index.php';

			</script> ";

		exit;
	}


	if (isset($_POST['login'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			$qry = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");

			if (mysqli_num_rows($qry) == 1){

				//cek password 
				$row = mysqli_fetch_assoc ($qry);
				if (password_verify($password, $row["password"])){
					$_SESSION['login'] = true;

					// cek remember me 
					if (isset($_POST['remember'])){
						setcookie('kode', $row['id'], time() + 60 );
						setcookie('key', hash('sha256', $row['username']));
					}
					echo "<script> 
					
					document.location.href = 'index.php';

			</script> 

		";
					exit ;

				}

			
				 else {
					echo "<script> alert('Username atau password salah!'); 
							document.location.herf = 'login2.php';</script>";
						
					
				}
			}
			// 	$_SESSION['userweb'] = $username;
			// 	echo "<a href='tampilanmenu.php'>klik</a>";
			// 	exit;
			// }else {
			// 	echo "Username dan Password salah ";
			// }
		}
	 // $error = true;
 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login admin</title>
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
	
	<section class="login">
		<div class="login_box">
			<div class="left">
				<!-- <div class="top_link"><a href="#"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return home</a></div> -->
				<div class="contact">
					<form action="" method="post">
						<center><h1>LOGIN</h1></center>
						<br> <br> <br> <br>
						<label for="username">Username</label>
						<input  class="inputt" type="text" name="username" placeholder="masukan username" id="username">
						<label for="password">Password</label>
						<input class="inputt" type="password" name="password"placeholder="masukan password" id="password">
						<table> 
							<tr>
						<td><input  type="checkbox" name="remember" id="remember"></td>
						<td><label for="remember">Remember me</label></td>
							</tr>
						</table>
						

						<button type="submit" class="submit" name="login">LOGIN</button>
					</form>
				</div>
			</div>
			<div class="right">
				<div class="right-text">
					<h2>SELAMAT DATANG</h2>
					<br> <br>
					<h5>MANAJEMEN DATA SMAN 1</h5>
	
		</div>
	</section>

</body>
</html>

</body>
</html>


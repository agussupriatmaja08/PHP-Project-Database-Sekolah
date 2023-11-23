<?php 
session_start();
// require 'functions.php';
$conn = mysqli_connect('localhost', 'root', '', 'sma');
	

	if (isset($_POST['login'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			$qry = mysqli_query($conn, "SELECT * FROM enduser WHERE username = '$username' AND password = md5('$password')");

				//cek password 
				$rows = mysqli_num_rows ($qry);
				if ($rows == 1){
					// $_SESSION['login'] = true;
					echo "<script> 
					alert ('Selamat datang $username!');
					document.location.href = 'indexsiswa.php';


			</script> 

		";
					exit ;

				}

			
				 else {
					echo "<script> alert('Username atau password salah!'); 
							document.location.herf = 'loginsiswa.php';</script>";
						
					
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
	<title>Halaman Login user</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<br> <br> <br>
	<center>
	<div class="login">
	<form method="post">
	<table>
	<tr> 
	
		<label>
			<br>
			<h2>LOGIN SISWA</h2>
			<br>

			<td><label for="username">Username</label></td> </tr>
			<td><input type="text" name="username" id="username" placeholder="masukan username" size="30"> </td> <tr>
			<td><label for="password">Password</label> </td></tr>
			<td><input type="password" name="password" id="password" placeholder="masukan password" size="30"></td> <tr>
				<br>
				<tr><td> 
				</td></tr>
				<tr><td> 
				</td></tr>
				<tr><td> 
				</td></tr>
				<tr><td> 
				</td></tr>
				<tr><td> 
				</td></tr>
			<td> <a href="indexsiswa.php?username=<?= $username; ?>"></h1><button type="submit" name="login" class="login2">Login </button></a></td></tr> 
		

		</label>

	
	</tr>
	</table>
	</form>
	</div> </center>

</body>
</html>
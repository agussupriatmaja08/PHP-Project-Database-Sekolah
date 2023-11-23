<?php 
    session_start();
    date_default_timezone_set("Asia/Ujung_Pandang");
    date("H");
    if (date("H") < 9){
        $background = "wallpaperflare.com_wallpaper.jpg";

    }elseif (date("H") < 15) {
        $background = "546508.jpg";
        
    }elseif (date("H") < 19 ) {
        $background = "546673.jpg";
    }
    else{
        $background ="593197.jpg";
    }

if ( ! isset($_SESSION['login'])){
    echo "<script> document.location.href = 'login2.php'; </script>";
    exit;
}

 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tampilan Admin </title>
	<link rel="stylesheet" type="text/css" href="desaintampilan.css">
    <style type="text/css">
        

    .gambar {

    background-image: url('img/<?= $background; ?>');
    width: 100%;
    height: 602px;
    color: white;
/*  display: flex;*/
    align-items:center;
    justify-content: space-evenly;
    text-align: center;
    vertical-align: middle;
    font-size: 30px;

    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

}
    </style>
</head>
<body>
<nav>
	<h1 class="logo">DATABASE SMAN 1 </h1>

	<ul>
	<li><a href="dataguru.php">Data Guru</a></li>
	<li><a href="datasiswa.php">Data Siswa</a></li>
    <li> <a href="registrasi.php">Add akun admin</a></li>
    <li> <a href="logout.php">Logout</a></li>

	</ul>
</nav>




<div class="gambar">
<br> <br>
<p id="tgl"> <?= date("l, d M Y");;?></p>	
<br><br><br> 
<h1 class="jam"> <?php  date_default_timezone_set("Asia/Ujung_Pandang");
    echo date("H : i"); ?></h1>

<br>
<div class="date"><?php require 'date.php';

	echo jam();
	 ?></div>

</div>


<div class="services">
        <!--text-->
        <div class="services-text ">
            <p>Organisasi Sekolah</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
         
        <div class="box-container">
        <!--- 1 --->
            <div class="box-1">
                <span>1</span>
                <p class="heading">Pramuka</p>
                <p class="details">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                <button>Read More</button>
            </div>
        <!--- 2 --->
            <div class="box-2">
                <span>2</span>
                <p class="heading">Osis</p>
                <p class="details">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                <button>Read More</button>
            </div>
        <!--- 3 --->
            <div class="box-3">
                <span>3</span>
                <p class="heading">Palang Merah Indonesia</p>
                <p class="details">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                <button>Read More</button>
            </div>
       </div>
   </div>



   <footer>
    
         
        <!--copyright-->
        <p class="copyright"> &#169; Gede Agus Supriatmaja</p>
    </footer>
</body>
</html>
<?php 


require 'functions.php';

$NIP = $_GET["NIP"];
if( hapusguru($NIP) > 0){

	echo "<script> 
			alert ('Data berhasil dihapus!');
			document.location.href = 'dataguru.php';

			</script> 

		";
}else {

	echo "<script> 
			alert ('Data gagal dihapus!');

			</script>";
}




 ?>
<?php 

require 'functions.php';

$NIS = $_GET["NIS"];



if( hapus($NIS) > 0){

	echo "<script> 
			alert ('Data berhasil dihapus!');
			document.location.href = 'datasiswa.php';

			</script> 

		";
}else {

	echo "<script> 
			alert ('Data gagal dihapus!');

			</script>";
}






 ?>

 

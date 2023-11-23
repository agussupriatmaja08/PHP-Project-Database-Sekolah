<?php 
session_start();
$_SESSION = []; 
session_unset();
session_destroy();

setcookie('kode', '', time() -1);
setcookie('key', '', time() - 1);

echo "<script> document.location.href = 'login2.php' ;</script>" ;


 ?>
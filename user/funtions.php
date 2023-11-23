<?php 	

$conn = mysqli_connect('localhost', 'root', '', 'sma');
 mysqli_query($conn, "SELECT * FROM siswa ")

function queryy($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
 return $rows;
}


 ?>}

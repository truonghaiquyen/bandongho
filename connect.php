<?php
$servername = 'localhost';
$username = 'root'; 
$password = '260324'; 
$database = 'bandongho'; 

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn) {
    // echo("<script>alert('Kết nối thành công');</script>");
} else {
    echo("<script>alert('Kết nối thất bại');</script>");
}
?>

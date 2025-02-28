<?php
include '../../connect.php';
global $conn;
ob_start();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$sql = "DELETE FROM `user_admin` WHERE `user_admin`.`userName` = '$id'";
mysqli_query($conn, $sql);
header("location:../userAdmin.php");

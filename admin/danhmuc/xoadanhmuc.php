<?php
include '../../connect.php';
global $conn;
ob_start();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$sql = "DELETE FROM `categories` WHERE `categories`.`category_id` = '$id'";
mysqli_query($conn, $sql);
header("location:../danhmuc.php");

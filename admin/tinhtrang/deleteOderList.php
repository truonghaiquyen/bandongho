<?php
include '../../connect.php';
global $conn;
ob_start();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$sql = "DELETE FROM `list_orders` WHERE `list_orders`.`idList` = '$id'";
mysqli_query($conn, $sql);
$sql = "DELETE FROM `infor_orders` WHERE `infor_orders`.`id` = '$id'";
mysqli_query($conn, $sql);
header("location:../../trangGioHang/statusProduct.php");

<?php
include "../connect.php";
global $conn;
$product_id = null;
if (isset($_GET["id"])) {
    $product_id = $_GET["id"];
}
$delete = "DELETE FROM cart_product WHERE `cart_product`.`id` = '$product_id'";
$query = mysqli_query($conn, $delete);
header("location:../trangGioHang/trangGioHang.php");

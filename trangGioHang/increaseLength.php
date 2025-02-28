<?php
include "../connect.php";
global $conn;
$product_id = null;
if (isset($_GET["id"])) {
    $product_id = $_GET["id"];
}
$delete = "UPDATE `cart_product` SET `lengthBuy` = `lengthBuy`+ 1 WHERE `cart_product`.`id` = '$product_id';";
$query = mysqli_query($conn, $delete);
header("location:../trangGioHang/trangGioHang.php");

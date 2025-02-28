<?php
include "../connect.php";
global $conn;
$product_id = null;
if (isset($_GET["id"])) {
    $product_id = $_GET["id"];
}
$selectCart = "SELECT * FROM `cart_product` WHERE  `id` = '$product_id'";
$queryCart = mysqli_query($conn, $selectCart);
$row = mysqli_fetch_array($queryCart);
$num = $row["lengthBuy"];
echo $num;
if ($num == 1) {
    header("location:../trangGioHang/trangGioHang.php");
} else {
    $delete = "UPDATE `cart_product` SET `lengthBuy` = `lengthBuy`- 1 WHERE `cart_product`.`id` = '$product_id';";
    $query = mysqli_query($conn, $delete);
    header("location:../trangGioHang/trangGioHang.php");
}

<?php
include "../connect.php";
global $conn;
session_start();
$product_id = null;
if (isset($_GET["id"])) {
    $product_id = $_GET["id"];
}
$userName = null;
if (isset($_SESSION['loGin']["userName"])) {
    $userName =   $_SESSION['loGin']["userName"];
}
function truyXuatSanPham($con, $id, $user)
{
    $select = "SELECT * FROM `products` WHERE `product_id` LIKE '%$id%'";
    $queyrySelect = mysqli_query($con, $select);
    $row = mysqli_fetch_array($queyrySelect);
    $product_id =  $row["product_id"];
    $nameProduct =  $row["SKU_UPC_MPN"];
    $price =  $row["price"];
    $discount =  $row["discount"];
    $image_url =  $row["image_url"];
    $brand =  $row["brand"];
    $gender =  $row["gender"];
    $sizeHeadder =  $row["sizeHeadder"];
    $select = "SELECT * FROM `cart_product` WHERE `product_id` LIKE '%$product_id%'";
    $queyrySelect = mysqli_query($con, $select);
    $num = mysqli_num_rows($queyrySelect);
    if ($num == 0) {
        $randum = rand();
        $insertCart = "INSERT INTO `cart_product` (`id`,`product_id`, `SKU_UPC_MPN`, `price`, `discount`, `lengthBuy`, `image_url`, `brand`, `gender`, `sizeHeadder`, `userName`) VALUES ('$randum','$product_id', '$nameProduct', '$price', ' $discount', 1, '$image_url', '$brand', ' $gender', '$sizeHeadder', '$user')";
        $queyrySelect = mysqli_query($con, $insertCart);
        header("location:../trangGioHang/trangGioHang.php");
    } else {
        $delete = "UPDATE `cart_product` SET `lengthBuy` = `lengthBuy`+ 1 WHERE `cart_product`.`product_id` = '$product_id';";
        $query = mysqli_query($con, $delete);
        header("location:../trangGioHang/trangGioHang.php");
    }
}
if ($userName == null) {
    header("location:../login/LoGin/loGin.php");
} else {
    truyXuatSanPham($conn, $product_id, $userName);
}

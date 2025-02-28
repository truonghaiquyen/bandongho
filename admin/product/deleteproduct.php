<?php
include '../../connect.php';
global $conn;
ob_start();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$sql = "SELECT `image_url`  FROM `products` WHERE `product_id` LIKE '$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
echo $row["image_url"];
$duong_dan_tep_anh = '../../' . $row["image_url"];
if (file_exists($duong_dan_tep_anh)) {
    if (unlink($duong_dan_tep_anh)) {
        echo "Tệp ảnh đã bị xóa thành công.";
    } else {
        echo "Không thể xóa tệp ảnh.";
    }
} else {
    echo "Tệp ảnh không tồn tại.";
}
$sql = "DELETE FROM `products` WHERE `product_id` = '$id'";
mysqli_query($conn, $sql);
header("location:../product.php");

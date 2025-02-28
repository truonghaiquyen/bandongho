<?php
include "../../connect.php";
global $conn;
ob_start();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$select = "SELECT `userName` FROM `list_orders` WHERE `idList`= '$id'";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
$name =  $row["userName"];
$select = "SELECT `product_id`,`lengthBuy` FROM `cart_product` WHERE `userName` LIKE '$name'";
$result = mysqli_query($conn, $select);
while ($row = mysqli_fetch_assoc($result)) {
    $product_id =  $row['product_id'];
    $lengthBuy =  $row['lengthBuy'];
    $delete = "UPDATE `products` SET `length` = `length` - '$lengthBuy' WHERE `products`.`product_id` = '$product_id';";
    $query = mysqli_query($conn, $delete);
}
$update = "UPDATE `list_orders` SET `status`= 1 WHERE `idList`='$id'";
mysqli_query($conn, $update);
header("location:../listOrder.php");

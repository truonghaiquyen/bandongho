<?php
include "../../connect.php";
global $conn;
ob_start();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$update = "UPDATE `list_orders` SET `status`= 2 WHERE `idList`='$id'";
mysqli_query($conn, $update);
header("location:../listOrder.php");

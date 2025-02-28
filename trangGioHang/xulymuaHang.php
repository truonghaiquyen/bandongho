<?php
include "../connect.php";
global $conn;
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $giaTien = $_POST["giaTien"];
    $hoTen = $_POST["hoTen"];
    $soDienThoai = $_POST["soDienThoai"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $dateOder = $_POST["dateOder"];
    $note = $_POST["note"];
    $giaTien = $_POST["giaTien"];
    echo $giaTien . $dateOder;
    if (isset($_SESSION['loGin']["fullName"])) {
        $fullName  = $_SESSION['loGin']["fullName"];
        $userName =   $_SESSION['loGin']["userName"];
    }
    $randomNumber = rand();
    $insert = "INSERT INTO `list_orders`(`idList`,`namePeople`, `address`, `email`, `note`, `phoneNumbers`, `status`, `dateOder`,`price`, `userName`) VALUES ('$randomNumber','$hoTen','$address','$email','$note','$soDienThoai',0,'$dateOder','$giaTien','$userName')";
    $query = mysqli_query($conn, $insert);
    $select = "SELECT * FROM `cart_product` where `userName` like '$userName'";
    $querys = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_array($querys)) {
        $insert = "INSERT INTO `infor_orders`(`id`,`SKU_UPC_MPN`, `price`, `discount`, `lengthBuy`, `image_url`, `brand`, `gender`, `sizeHeadder`, `userName`) VALUES ('$randomNumber','" . $row["SKU_UPC_MPN"] . "','" . $row["price"] . "','" . $row["discount"] . "','" . $row["lengthBuy"] . "','" . $row["image_url"] . "','" . $row["brand"] . "','" . $row["gender"] . "','" . $row["sizeHeadder"] . "','" . $userName . "')";
        $query = mysqli_query($conn, $insert);
    }
    header("location:../trangGioHang/statusProduct.php");
}

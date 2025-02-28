<?php
include '../connect.php';
global $conn;
$product_id = null;
if (isset($_GET["id"])) {
    $product_id = $_GET["id"];
}
$fullName = null;
$userName = null;
$TongTien = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>ADMIN-quản trị sản phẩm</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <link href="../img/icon/icon-watch-home.svg" rel="icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <?php
        include 'sidebarStrat.php';
        ?>
        <div class="content">
            <?php
            include 'navbarStart.php';
            ?>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Thông tin các hóa đơn</h6>
                        <a href="javascript:history.back();">
                            <div class="cart__home ">
                                <i class="bi bi-caret-left"></i>
                                Về trang đơn hàng
                            </div>
                        </a>
                    </div>
                    <div class="cart--item__product align-items-stretch flex-wrap">
                        <?php
                        if ($fullName != null) { {
                                $select = "SELECT * FROM `infor_orders` WHERE `id` = '$product_id'";
                                $queyrySelect = mysqli_query($conn, $select);
                                $num = mysqli_num_rows($queyrySelect);
                                if ($num > 0) { ?>
                                    <div class="table-responsive ">
                                        <table class="table text-start align-middle table-bordered table-striped mb-0 " id="myTable">
                                            <thead>
                                                <tr class="text-dark text-center">
                                                    <th scope="col">Hãng sản xuất</th>
                                                    <th scope="col">Tên sản phẩm</th>
                                                    <th scope="col">Giá cả</th>
                                                    <th scope="col">Số lượng mua</th>
                                                    <th scope="col">Ảnh</th>
                                                    <th scope="col">Giới tính</th>
                                                    <th scope="col">Size mặt</th>
                                                    <th scope="col">Tổng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_array($queyrySelect)) {
                                                ?>
                                                    <tr class="text-dark text-center">
                                                        <td><?php echo $row["brand"] ?></td>
                                                        <td><?php echo $row["SKU_UPC_MPN"] ?></td>
                                                        <td><?php echo number_format(($row["price"] - ($row["price"] * ($row["discount"] / 100))), 3, '.', '.') ?>₫</td>
                                                        <td><?php echo $row["lengthBuy"] ?></td>
                                                        <td><img style="width: 100px;" src="../<?php echo $row["image_url"] ?>" alt=""></td>
                                                        <td><?php echo $row["gender"] ?></td>
                                                        <td><?php echo $row["sizeHeadder"] ?></td>
                                                        <td><?php echo number_format(($row["price"] - ($row["price"] * ($row["discount"] / 100))) * $row["lengthBuy"], 3, '.', '.') ?>₫</td>
                                                    </tr>
                                                <?php
                                                    $TongTien = $TongTien + ($row["price"] - ($row["price"] * ($row["discount"] / 100))) * $row["lengthBuy"];
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <br>
                                    </div>
                                    <?php
                                    echo 'Tổng tiền hóa đơn : ' .  number_format($TongTien, 3, '.', '.');
                                } ?>₫
                                <?php
                            }
                                ?>
                    </div>
                <?php
                        } else {
                            echo "Mời Đăng Nhập vào !!!";
                        }
                ?>
                </div>
            </div>
            <?php
            include 'footet.php';
            ?>
        </div>
    </div>
    </div>
    <script src="js/main.js"></script>
</body>

</html>
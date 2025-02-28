<?php
include "../connect.php";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang thông tin đơn hàng</title>
    <link rel="stylesheet" href="../trangChu/trangchu.css">
    <link rel="stylesheet" href="../trangGioHang/trangGioHang.css">
    <link rel="icon" href="../img/icon/icon-watch-home.svg">
    <link rel="stylesheet" href="../thư viện/bootstrap-icons-1.10.5/00font/bootstrap-icons.css">
    <link rel="stylesheet" href="../thư viện/swiper/cdn.jsdelivr.net_npm_swiper@10.3.1_swiper-bundle.min.css">
    <link rel="stylesheet" href="../thư viện/bootstrap/css/bootstrap.css">
</head>
<?php
session_start();
if (isset($_SESSION['loGin']["fullName"])) {
    $fullName  = $_SESSION['loGin']["fullName"];
    $userName =   $_SESSION['loGin']["userName"];
}
?>

<body>
    <div class="inThebodyAll">
        <div class="theheader">
            <div class="theheader__heading">
                <div class="theheader__heading--laypout d-flex flex-row justify-content-between align-items-center">
                    <div class="heading--layout__logo"><a href="../index.php" style="color: #d63031 !important;">Đồng hồ</a></div>
                    <!-- xong logo  -->
                    <div class="d-flex flex-row justify-content-between align-items-center heading--layout__flex">
                        <!-- xong giới thiệu -->
                        <div class="heading--layout__menu" style="cursor: pointer;">
                            Menu
                            <i class="bi bi-caret-down-fill"></i>
                            <ul class="heading--menu__item">
                                <li class="menu__item">
                                    <span class="menu__item--span">Phổ biến nhất</span>
                                    <ul>
                                        <?php
                                        $selectCategory0 = "SELECT * FROM `categories` WHERE `high_class` = 0";
                                        $queryCategory0 = mysqli_query($conn, $selectCategory0);
                                        while ($rowCategory = mysqli_fetch_array($queryCategory0)) {
                                        ?>
                                            <a href="">
                                                <li><?php echo $rowCategory["category_name"] ?></li>
                                            </a>
                                        <?php
                                        } ?>
                                    </ul>
                                </li>
                                <li class="menu__item">
                                    <span class="menu__item--span">Hàng cao cấp</span>
                                    <ul>
                                        <?php
                                        $selectCategory1 = "SELECT * FROM `categories` WHERE `high_class` = 1";
                                        $queryCategory1 = mysqli_query($conn, $selectCategory1);
                                        while ($rowCategory = mysqli_fetch_array($queryCategory1)) {
                                        ?>
                                            <a href="">
                                                <li><?php echo $rowCategory["category_name"] ?></li>
                                            </a>
                                        <?php
                                        } ?>
                                    </ul>
                                </li>
                                <li class="menu__item">
                                    <span class="menu__item--span">các hãng khác</span>
                                    <ul>
                                        <?php
                                        $selectCategory1 = "SELECT * FROM `categories` WHERE `high_class` = 2";
                                        $queryCategory1 = mysqli_query($conn, $selectCategory1);
                                        while ($rowCategory = mysqli_fetch_array($queryCategory1)) {
                                        ?>
                                            <a href="">
                                                <li><?php echo $rowCategory["category_name"] ?></li>
                                            </a>
                                        <?php
                                        } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <a href="../trangtim/trangBoy.php">
                            <div class="heading--layout__nam">Nam</div>
                        </a>
                        <a href="../trangtim/trangGirl.php">
                            <div class="heading--layout__nu">Nữ</div>
                        </a>
                    </div>
                    <!-- xong menu  -->
                    <div class="d-flex flex-row">
                        <a href="../trangGioHang/trangGioHang.php">
                            <div class="heading--layout__gioHang">
                                <i class="bi bi-cart4"></i>
                                <?php
                                if ($userName != null) {
                                    $cart__product = "SELECT * FROM `cart_product` WHERE `userName` LIKE '%$userName%'";
                                    $queryCart = mysqli_query($conn, $cart__product);
                                    $num = mysqli_num_rows($queryCart); ?>
                                    <p class="gioHang__soluong">(<?php echo $num ?>)</p>
                                <?php
                                }
                                ?>
                            </div>
                        </a>
                        <?php
                        if ($fullName == null) { ?>
                            <a href="../login/LoGin/loGin.php">
                                <div id="heading--layout__user" class="heading--layout__yeuThich">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </a>
                        <?php
                        } else { ?>
                            <div id="" class="heading--layout__logOut">
                                <?php echo ($fullName) ?>
                                <a href="../login/LoGin/logOut.php" onclick="return confirm('BẠN CÓ MUỐN ĐĂNG XUẤT TÀI KHOẢN NÀY KHÔNG ?');">
                                    <div class="layout__logOut"> Đăng xuất </div>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- xong Giỏ hàng yêu thích  và user-->
                </div>
            </div>
            <!-- xong hết  header  -->
            <!-- xong baner đầu trang  -->
        </div>
        <!-- xong  hết đầu trang web đầu trang -->
        <div class="theBody d-flex">
            <div class="cart__product" style="max-width: none; width: auto;">
                <div class="cart__barTop d-flex flex-row justify-content-between align-items-center">
                    <a href="javascript:history.back();">
                        <div class="cart__home ">
                            <i class="bi bi-caret-left"></i>
                            Về trang đơn hàng
                        </div>
                    </a>
                    <div class="cart__title">Tình trạng đơn hàng của bạn</div>
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
            <script defer src="../thư viện/bootstrap/js/bootstrap.js"></script>
            <script src="../thư viện/swiper/cdn.jsdelivr.net_npm_swiper@10.3.1_swiper-bundle.min.js"></script>
            <script src="trangchitieT.js"></script>
</body>

</html>
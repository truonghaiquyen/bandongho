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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
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
                            Hãng
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
                            Mua thêm sản phẩm khác
                        </div>
                    </a>
                    <div class="cart__title">Tình trạng đơn hàng của bạn</div>
                </div>
                <div class="cart--item__product align-items-stretch flex-wrap">
                    <?php
                    if ($fullName != null) { {
                            $select = "SELECT * FROM `list_orders` WHERE `userName` LIKE '$userName'";
                            $queyrySelect = mysqli_query($conn, $select);
                            $num = mysqli_num_rows($queyrySelect);
                            if ($num > 0) { ?>
                                <div class="table-responsive ">
                                    
                                    <table class="table text-start align-middle table-bordered table-striped mb-0 " id="myTable">
                                        <thead>
                                            <tr class="text-dark text-center">
                                                <th scope="col">Tên người mua</th>
                                                <th scope="col">Địa chỉ</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Chú ý</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Tình trạng</th>
                                                <th scope="col">Ngày mua</th>
                                                <th scope="col">Giá tiền</th>
                                                <th scope="col">Hóa đơn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_array($queyrySelect)) {
                                            ?>
                                                <tr class="text-dark">
                                                    <td class="text-capitalize"><?php echo $row["namePeople"] ?></td>
                                                    <td><?php echo $row["address"] ?></td>
                                                    <td><?php echo $row["email"] ?></td>
                                                    <td><?php echo $row["note"] ?></td>
                                                    <td><?php echo $row["phoneNumbers"] ?></td>
                                                    <td>
                                                        <?php if ($row["status"] == 0) {
                                                            echo '<button class="btn btn-sm btn-danger p-2" type="button">Chưa xác nhận</button>';
                                                        } else if ($row["status"] == 1) {
                                                            echo '<button class="btn btn-sm btn-primary p-2" type="button">Đã xác nhận</button>';
                                                        } else if ($row["status"] == 2) {
                                                            echo '<button class="btn btn-sm btn-warning p-2" type="button">Đang giao</button>';
                                                        } else if ($row["status"] == 3) {
                                                            echo '<button class="btn btn-sm btn-success p-2" type="button">Đã nhận</button>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row["dateOder"] ?></td>
                                                    <td><?php echo number_format($row["price"], 3, '.', '.'); ?>₫</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-secondary p-2 m-1" href="inforProduct.php?id=<?php echo $row["idList"] ?>">Chi tiết</a>
                                                        <a onclick="return confirm('Bạn có muốn xóa thông tin đơn hàng này không ?');" class="btn btn-sm btn-warning p-2 m-1" href="../admin/tinhtrang/deleteOderList.php?id=<?php echo $row["idList"] ?>">Xóa</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
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
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
            <script defer src="../thư viện/bootstrap/js/bootstrap.js"></script>
            <script src="../thư viện/swiper/cdn.jsdelivr.net_npm_swiper@10.3.1_swiper-bundle.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#myTable').DataTable();
                });
            </script>
            <script src="trangchitieT.js"></script>
</body>

</html>
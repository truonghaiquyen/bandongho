<?php
include "../connect.php";
global $conn;
$select = "SELECT * FROM `products` WHERE `gender` LIKE '%nam%'";
$queyrySelect = mysqli_query($conn, $select);
$num_rows = mysqli_num_rows($queyrySelect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <a href=""></a>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồng Hồ Đeo Tay Thời Trang Chính Hãng Giá Rẻ</title>
    <link rel="stylesheet" href="../trangChu/trangchu.css">
    <link rel="stylesheet" href="../trangtim/trangtim.css">
    <link rel="icon" href="../img/icon/icon-watch-home.svg">
    <link rel="stylesheet" href="../thư viện/bootstrap-icons-1.10.5/00font/bootstrap-icons.css">
    <link rel="stylesheet" href="../thư viện/swiper/cdn.jsdelivr.net_npm_swiper@10.3.1_swiper-bundle.min.css">
    <link rel="stylesheet" href="../thư viện/bootstrap/css/bootstrap.css">
</head>
<?php
$fullName = null;
$userName = null;
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
                                            <a href="../trangtim/trangtimdanhmuc.php?id=<?php echo $rowCategory["category_id"] ?>">
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
                                            <a href="../trangtim/trangtimdanhmuc.php?id=<?php echo $rowCategory["category_id"] ?>">
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
                                            <a href="../trangtim/trangtimdanhmuc.php?id=<?php echo $rowCategory["category_id"] ?>">
                                                <li><?php echo $rowCategory["category_name"] ?></li>
                                            </a>
                                        <?php
                                        } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <a href="trangBoy.php">
                            <div class="heading--layout__nam">Nam</div>
                        </a>
                        <a href="trangGirl.php">
                            <div class="heading--layout__nu">Nữ</div>
                        </a>
                    </div>
                    <!-- xong menu  -->
                    <div class="heading--layout__search">
                        <form class="input-group" action="trangtim.php" method="POST">
                            <input type="text" name="text_search" class="form-control txtTimKiem" placeholder="tìm theo hãng, tên ,....">
                            <button class="btn btn-secondary btnTimKiem" type="submit" id="button-addon1" name="buttom_search">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>
                    <!-- xong tìm kiếm  -->
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
                                    <div class=" layout__logOut"> Đăng xuất
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- xong Giỏ hàng yêu thích  và user-->
                </div>
            </div>
        </div>
        <!-- xong hết  header  -->
        <br>
        <br>
        <div class="theBody">
            <div class="containner__title">Đã tìm thấy <?php echo $num_rows ?> kết quả với giới tính nam</div>
            <div class="containner__layout justify-content-start d-flex flex-row align-self-start flex-wrap">
                <?php
                while ($row = mysqli_fetch_array($queyrySelect)) {
                ?>
                    <div class="theproduct swiper" style="text-align: left;">
                        <a href="../trangchitiet/trangchitiet.php?id=<?php echo $row['product_id']; ?>">
                            <div class="card overflow-hidden theproduct__card swiper-slide" style="transition: color 0.1s linear;">
                                <img src="../<?php echo $row["image_url"] ?>" class="card-img-top" alt="ảnh không tông tại">
                                <div class="card-body">
                                    <div class="theproduct__title">
                                        <h5><?php echo $row["brand"] . " " . $row["sizeHeadder"] . "mm " . $row["gender"] . " " . $row["SKU_UPC_MPN"] ?></h5>
                                    </div>
                                    <div class="theproduct__price card-text"><?php echo number_format(($row["price"] - ($row["price"] * ($row["discount"] / 100))), 3, '.', '.') ?>₫</div>
                                    <div class="theproduct__sale card-text">
                                        <span><?php echo number_format($row["price"], 3, '.', '.') ?>₫</span>
                                        <div class="theProduct__persentSale">-<span class="theProduct__persent"><?php echo $row["discount"] ?></span>%</div>
                                    </div>
                                    <div class="theproduct__star">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <?php
                                        if ($row["length"] <= 0) { ?>
                                            <span class="theProduct__lenght text-danger">Hết hàng</span>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="theProduct__lenght"><?php echo $row["length"] ?></span>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?> <!-- xong card product  -->
            </div>
        </div>
        <!-- xong body  -->
        <div class="Thefooter">
        <div class="Thefooter__layout">
            <div class="Thefooter__lienHe">
                <h4>Liên hệ</h4>
                <p>Địa chỉ: <a href="">Trường đại học công nghệ Đông Á</a></p>
                <p>Điện thoại: <a href="">012345678</a></p>
                <p>Email: <a href="">nhom7@gmail.com</a></p>
            </div>
            <div class="Thefooter__chinhSach">
                <h4>Chính sách</h4>
                <p><a href="">Chính sách đổi trả</a></p>
                <p><a href="">Chính sách bảo mật</a></p>
                <p><a href="">Chính sách vận chuyển</a></p>
                <p><a href="">Quy định sử dụng</a></p>
            </div>
            <div class="Thefooter__lienKet">
                <h4>Liên kết</h4>
                <p>Hãy liên kết với chúng tôi</p>
                <div class="Thefooter__lienKet--icon d-flex flex-row ">
                    <a href=""><i class="bi bi-facebook fs-3"></i></a>
                    <a href=""><i class="bi bi-youtube fs-3"></i></a>
                    <a href=""><i class="bi bi-google fs-3"></i></a>
                </div>
            </div>
            <div class="Thefooter__dichi">
            <h4>Địa Chỉ Cửa Hàng</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.156998997158!2d105.738654!3d21.0401983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135096b31fa7abb%3A0xff645782804911af!2zVHLGsOG7nW5nIMSQ4bqhaSBow6BjIEPhu5FuZyBuZ2jhu4cgxJDhu5NuZyBMw6A!5e0!3m2!1svi!2s!4v1696756690431!5m2!1svi!2s" 
                width="300" 
                height="150" 
                style="border-radius: 5px;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        </div>
        <?php
        $conn = null;
        ?>
    </div>
    <!-- xong chân trang -->
    <script defer src="thư viện/bootstrap/js/bootstrap.js"></script>
    <script src="thư viện/swiper/cdn.jsdelivr.net_npm_swiper@10.3.1_swiper-bundle.min.js"></script>
    <script src="trangChu/trangchu.js"></script>
</body>

</html>
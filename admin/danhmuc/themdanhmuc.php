<?php
include '../../connect.php';
global $conn;
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AMIN-quản trị danh mục</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <?php
        include 'sidebarStrat2.php';
        ?>
        <div class="content">
            <?php
            include 'navbarStart2.php';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['themdanhmuc'])) {
                    $idDanhmuc = $_POST["idDanhMuc"];
                    $hightClass = $_POST["LoaiSP"];
                    $tenDanhMuc = $_POST["tenDanhMuc"];
                    if ($tenDanhMuc == null && $idDanhmuc == null) {
                        echo '<script>confirm("Không được để trống thông tin"); </script>';
                    } else {
                        $query = "SELECT * FROM `categories` WHERE `category_id` LIKE '$idDanhmuc'";
                        $result = mysqli_query($conn, $query);
                        $num = mysqli_num_rows($result);
                        if ($num != 0) {
                            echo '<script>confirm("Không thêm được thông tin\nTồn tại mã danh mục này rồi"); </script>';
                        } else {
                            $insert = "INSERT INTO `categories` (`category_id`, `category_name`, `high_class`) VALUES ('$idDanhmuc', '$tenDanhMuc', '$hightClass')";
                            mysqli_query($conn, $insert);
                            header("location:../danhmuc.php");
                        }
                    }
                }
            }
            ?>
            <div class="container-fluid pt-4 px-4">
                <div class="">
                    <form action="" method="post">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Thêm Danh mục</h6>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Mã danh mục" name="idDanhMuc">
                                <label for="floatingInput">ID danh mục</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Tên danh mục" name="tenDanhMuc">
                                <label for="floatingPassword">Tên danh mục</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="LoaiSP">
                                    <option selected hidden value="0">Loại danh mục sản phẩm</option>
                                    <option value="1">Hàng cao cấp</option>
                                    <option value="0">Phổ biến</option>
                                    <option value="2">Hãng khác</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="themdanhmuc">Thêm danh mục </button>
                            <input type="hidden" name="confirmed" id="confirmed" value="false">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/mainn.js"></script>
</body>

</html>
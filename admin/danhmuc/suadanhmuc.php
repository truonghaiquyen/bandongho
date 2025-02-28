<?php
include '../../connect.php';
global $conn;
ob_start();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$select = "SELECT * FROM `categories` WHERE `category_id` LIKE '%$id%'";
$sql = mysqli_query($conn, $select);
$row = mysqli_fetch_array($sql)
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
                if (isset($_POST['confirmed']) && $_POST['confirmed'] === 'true') {
                    if (isset($_POST["udateDanhMuc"])) {
                        $hightClass = $_POST["LoaiSP"];
                        $tenDanhMuc = $_POST["tenDanhMuc"];
                        if ($tenDanhMuc == null) {
                            echo '<script>confirm("Không được để trống thông tin"); </script>';
                        } else {
                            $update = "UPDATE `categories` SET `category_name` = '$tenDanhMuc', `high_class` = '$hightClass' WHERE `categories`.`category_id` = '$id'";
                            mysqli_query($conn, $update);
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
                            <h6 class="mb-4">Sửa Danh mục</h6>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Mã danh mục" style="opacity: 0.5; pointer-events: none; " name="idDanhMuc" value="<?php echo $row["category_id"] ?>">
                                <label for="floatingInput">ID danh mục</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Tên danh mục" name="tenDanhMuc" value="<?php echo $row["category_name"] ?>">
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
                            <button type="submit" class="btn btn-primary" name="udateDanhMuc" onclick="return confirmUdate();">Sửa thông tin </button>
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
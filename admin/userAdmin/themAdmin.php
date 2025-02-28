<?php
include '../../connect.php';
global $conn;
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AMIN-quản trị User Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="../../img/icon/icon-watch-home.svg" rel="icon">
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
        include '../danhmuc/sidebarStrat2.php';
        ?>
        <div class="content">
            <?php
            include '../danhmuc/navbarStart2.php';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST["udateDanhMuc"])) {
                    $userName = $_POST["username"];
                    $password = $_POST["password"];
                    $tennguoidung = $_POST["tennguoidung"];
                    $LoaiRole = $_POST["LoaiRole"];
                    if ($password == null && $tennguoidung == null) {
                        echo '<script>confirm("Không được để trống thông tin"); </script>';
                    } else {
                        $query = "SELECT * FROM `user_admin` WHERE `userName` = '$userName'";
                        $result = mysqli_query($conn, $query);
                        $num = mysqli_num_rows($result);
                        if ($num != 0) {
                            echo '<script>confirm("Không thêm được thông tin\nTồn tại mã tài khoản này rồi"); </script>';
                        } else {
                            echo $LoaiRole;
                            $insert = "INSERT INTO `user_admin` (`userName`, `passWord`, `Name`, `role`) VALUES ('$userName', MD5('$password'), '$tennguoidung', '$LoaiRole');";
                            mysqli_query($conn, $insert);
                            header("location:../userAdmin.php");
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
                                <input type="text" class="form-control" id="floatingInput" placeholder="Mã danh mục" name="username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Tên danh mục" name="password">
                                <label for="floatingPassword">Pass Word</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control text-capitalize" id="floatingPassword" placeholder="Tên danh mục" name="tennguoidung">
                                <label for="floatingPassword">Tên người dùng</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="LoaiRole">
                                    <option selected hidden value="user">Loại tài khoản</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="udateDanhMuc">Thêm </button>
                            <input type="hidden" name="confirmed" id="confirmed" value="false">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
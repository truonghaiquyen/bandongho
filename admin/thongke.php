<?php
include '../connect.php';
session_start();

// Lấy thông tin admin đăng nhập
$fullName = $_SESSION['loGinAdmin']["fullName"] ?? "Admin";
?>
<!DOCTYPE html>
<html lang="vi">
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
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
   <link href="css/bootstrap.min.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="navbar bg-light navbar-light">
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="../img/user/testimonial-2.jpg" alt="" style="width: 45px; height: 45px;">
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">Xin Chào</h6>
                    <span class="text-capitalize"><?php echo htmlspecialchars($fullName); ?></span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="danhmuc.php" class="nav-item nav-link"><i class="fa fa-list me-2"></i>Danh mục</a>
                <a href="product.php" class="nav-item nav-link"><i class="fa fa-box me-2"></i>Sản phẩm</a>
                <a href="khosanpham.php" class="nav-item nav-link"><i class="fa fa-warehouse me-2"></i>Kho sản phẩm</a>
                <a href="listOrder.php" class="nav-item nav-link"><i class="fa fa-shopping-cart me-2"></i>Đơn hàng</a>
                <a href="thongke.php" class="nav-item nav-link active"><i class="fa fa-chart-line me-2"></i>Thống kê</a>
                <a href="userAdmin.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>User/Admin</a>
                <a onclick="return confirm('BẠN CÓ MUỐN ĐĂNG XUẤT TÀI KHOẢN NÀY KHÔNG ?');" href="../login/LoGin/logOutadmin.php" class="nav-link">
                    <i class="fa fa-sign-out-alt me-2"></i>Logout
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="text-center mb-0">Thống kê</h4>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="thongke/thongke_tonkho.php" class="list-group-item list-group-item-action">
                        <i class="fa fa-warehouse me-2"></i> Thống kê sản phẩm tồn kho
                    </a>
                    <a href="thongke/thongke_doanhthu.php" class="list-group-item list-group-item-action">
                        <i class="fa fa-dollar-sign me-2"></i> Thống kê doanh thu
                    </a>
                    <a href="thongke/thongke_sanpham_ban.php" class="list-group-item list-group-item-action">
                        <i class="fa fa-shopping-cart me-2"></i> Thống kê sản phẩm đã bán
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

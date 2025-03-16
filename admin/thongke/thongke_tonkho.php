<?php
session_start();
include '../../connect.php';
global $conn;
$fullName = $_SESSION['loGinAdmin']["fullName"] ?? null;
$userName = $_SESSION['loGinAdmin']["userName"] ?? null;
$passWord = $_SESSION['loGinAdmin']["passWord"] ?? null;
if ($userName == null &&  $passWord == null) {
    header("location:../login/LoGin/loGin.php");
    exit();
}

// Lấy danh sách sản phẩm tồn kho
$sql_tonkho = "SELECT product_id, SKU_UPC_MPN, brand, price AS price, length AS tonkho FROM products";
$result_tonkho = mysqli_query($conn, $sql_tonkho);
$tonkho_data = [];
while ($row = mysqli_fetch_assoc($result_tonkho)) {
    $tonkho_data[] = $row;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê sản phẩm tồn kho</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="navbar bg-light navbar-light">
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="../../img/user/testimonial-2.jpg" alt="" style="width: 40px; height: 40px;">
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">Xin Chào</h6>
                    <span class="text-capitalize"><?php echo $fullName ?></span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="../danhmuc.php" class="nav-item nav-link"><i class="fa fa-list me-2"></i>Danh mục</a>
                <a href="../product.php" class="nav-item nav-link"><i class="fa fa-box me-2"></i>Sản phẩm</a>
                <a href="../khosanpham.php" class="nav-item nav-link"><i class="fa fa-warehouse me-2"></i>Kho sản phẩm</a>
                <a href="../listOrder.php" class="nav-item nav-link"><i class="fa fa-shopping-cart me-2"></i>Đơn hàng</a>
                <a href="../thongke.php" class="nav-item nav-link"><i class="fa fa-chart-line me-2"></i>Thống kê</a>
                <a href="../userAdmin.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>User/Admin</a>
                <a onclick="return confirm('BẠN CÓ MUỐN ĐĂNG XUẤT TÀI KHOẢN NÀY KHÔNG ?');" href="../login/LoGin/logOutadmin.php" class="nav-link">
                    <i class="fa fa-sign-out-alt me-2"></i>Logout
                </a>
            </div>
        </nav>
    </div>


    <div class="content">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="text-center mb-0">Thống kê sản phẩm tồn kho</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Nhà sản xuất</th>
                            <th>Giá tiền (triệu VND)</th>
                            <th>Số lượng tồn kho</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tonkho_data as $product): ?>
                        <tr>
                            <td><?php echo $product['product_id']; ?></td>
                            <td><?php echo $product['SKU_UPC_MPN']; ?></td>
                            <td><?php echo $product['brand']; ?></td>
                            <td><?php echo number_format($product['price'], 3, '.', '.'); ?> triệu VND</td>
                            <td><?php echo $product['tonkho']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <a href="../thongke.php" class="btn btn-secondary">Quay lại</a>
                    <div>
                        <a href="thongke_doanhthu.php" class="btn btn-primary">Thống kê sản phẩm đã bán</a>
                        <a href="thongke_sanpham_ban.php" class="btn btn-success">Thống kê doanh thu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

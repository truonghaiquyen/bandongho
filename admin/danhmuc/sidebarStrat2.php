<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
    <?php
        session_start();
        $fullName = null;
        $userName = null;
        $passWord = null;
        if (isset($_SESSION['loGinAdmin']["fullName"])) {
            $fullName  = $_SESSION['loGinAdmin']["fullName"];
            $userName = $_SESSION['loGinAdmin']["userName"];
            $passWord =  $_SESSION['loGinAdmin']["passWord"];
        }

        if ($userName == null &&  $passWord == null) {
            header("location:../login/LoGin/loGin.php");
        }
        ?>
        <a href="" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"></h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="../../img/user/testimonial-2.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <span class="text-capitalize"><?php echo $fullName ?></span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="../danhmuc.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Danh mục</a>
            <a href="../product.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Sản phẩm</a>
            <a href="../khosanpham.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Kho sản phẩm</a>
            <a href="../listOrder.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Hóa đơn</a>
            <a href="../userAdmin.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>User/Amin</a>
        </div>
    </nav>
</div>
<?php
include '../connect.php';
global $conn;
if (isset($_POST["buttom_search"])) {
    $search = $_POST["search"];
    if ($search == "") {
        header("location:danhmuc.php");
    } else {
        $sql_search = "SELECT * FROM `products` WHERE `brand` LIKE '%$search%' ORDER BY `brand` ASC";
        $queyrySelect = mysqli_query($conn, $sql_search);
        $num_rows = mysqli_num_rows($queyrySelect);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AMIN-quản trị sản phẩm</title>
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
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Thông tin các sản phẩm </h6>
                        <a href=""><button class="btn btn-primary" type="button">Thêm sản phẩm</button></a>
                    </div>
                    <div class="table-responsive ">
                        <table class="table text-start align-middle table-bordered table-hover mb-0 ">
                            <thead>
                                <tr class="text-dark text-center">
                                    <th scope="col">Mã sản phẩm</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá cả</th>
                                    <th scope="col">Giảm giá</th>
                                    <th scope="col">Chi tiết</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Nhà sản xuất</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Size mặt</th>
                                    <th scope="col" colspan="2">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($queyrySelect)) {
                                ?>
                                    <tr class="text-dark text-capitalize ">
                                        <td><?php echo $row["product_id"] ?></td>
                                        <td><?php echo $row["SKU_UPC_MPN"] ?></td>
                                        <td><?php echo number_format($row["price"], 3, '.', '.') ?>₫</td>
                                        <td><?php echo $row["discount"] ?>%</td>
                                        <td><?php echo $row["description"] ?></td>
                                        <td><img style="width: 100px;" class="object-fit-cover border rounded" src="<?php echo $row["image_url"] ?>" alt=""></td>
                                        <td><?php echo $row["brand"] ?></td>
                                        <td><?php echo $row["gender"] ?></td>
                                        <td><?php echo $row["sizeHeadder"] ?></td>
                                        <td><a class="btn btn-sm btn-warning p-2" href="">Sửa</a></td>
                                        <td><a class="btn btn-sm btn-danger p-2" href="">Xóa</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
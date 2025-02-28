<?php
include '../connect.php';
global $conn;
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
    <link href="../img/icon/icon-watch-home.svg" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
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
        <!-- Sidebar Start -->
        <!-- Content Start -->
        <div class="content">
            <?php
            include 'navbarStart.php';
            ?>
            <!-- Navbar Start -->
            <!-- Sale & Revenue Start -->
            <!-- Sale & Revenue End -->
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Thông tin danh mục sản phẩm </h6>
                        <a href="danhmuc/themdanhmuc.php"><button class="btn btn-primary" type="button">Thêm danh mục</button></a>
                    </div>
                    <div class="table-responsive ">
                        <table class="table text-start align-middle table-bordered table-striped mb-0" id="myTable">
                            <thead>
                                <tr class="text-dark text-center">
                                    <th scope="col">.</th>
                                    <th scope="col">Mã danh mục</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Loại danh mục sản phẩm</th>
                                    <th scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select = "SELECT * FROM `categories` ORDER BY `high_class` ASC";
                                $queyrySelect = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_array($queyrySelect)) {
                                    if ($row["high_class"] == 0) {
                                        $row["high_class"] = "phổ biến";
                                    } elseif ($row["high_class"] == 1) {
                                        $row["high_class"] = "cao cấp";
                                    } elseif ($row["high_class"] == 2) {
                                        $row["high_class"] = "hãng khác";
                                    }
                                ?>
                                    <tr class="text-dark text-center">
                                        <td>*</td>
                                        <td><?php echo $row["category_id"] ?></td>
                                        <td class="text-capitalize"><?php echo $row["category_name"] ?></td>
                                        <td><?php echo $row["high_class"] ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-warning p-2" href="danhmuc/suadanhmuc.php?id=<?php echo $row["category_id"] ?>">Sửa</a>
                                            <a onclick="return confirm('Bạn đã chắc chắn muốn xóa không');" class="btn btn-sm btn-danger p-2" href="danhmuc/xoadanhmuc.php?id=<?php echo $row["category_id"] ?>">Xóa</a>
                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Sales Chart Start -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script src="js/main.js"></script>
</body>

</html>
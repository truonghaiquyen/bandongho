<?php
include '../../connect.php';
global $conn;
ob_start();
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
                if (isset($_POST['themSanPham'])) {
                    // Xử lý upload file
                    $path = "img/products";
                    $fileName = "";
                    if (isset($_FILES['image'])) {
                        if (isset($_FILES['image']['name'])) {
                            if (
                                $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png"
                                || $_FILES['image']['type'] == "image/jfif" || $_FILES['image']['type'] == "image/webp"
                            ) {
                                if ($_FILES['image']['size'] <= 240000000) {
                                    if ($_FILES['image']['error'] == 0) {
                                        move_uploaded_file($_FILES['image']['tmp_name'], "../../" . $path . "/" . $_FILES['image']['name']);
                                        $fileName = $path . "/" . $_FILES['image']['name'];
                                    } else {
                                        echo "Lỗi file";
                                    }
                                } else {
                                    echo "File quá lớn";
                                }
                            } else {
                                echo "File không phải là ảnh";
                            }
                        } else {
                            echo "Bạn chưa chọn file";
                        }
                    }
                    $idSanPham = $_POST["idSanPham"];
                    $tenSanPham = $_POST["tenSanPham"];
                    $giaCaSP = $_POST["giaCaSP"];
                    $giamGiaSP = $_POST["giamGiaSP"];
                    $chiTietSP = $_POST["chiTietSP"];
                    $nhaSXSanPham = $_POST["nhaSXSanPham"];
                    $gioiTinhSP = $_POST["gioiTinhSP"];
                    $sizeMatSP = $_POST["sizeMatSP"];
                    $soluong = $_POST["soLuongSP"];
                    $danhmucSP = $_POST["danhmucSP"];
                    if (
                        $idSanPham == null || $tenSanPham == null || $giaCaSP == null || $giamGiaSP == null || $chiTietSP == null || $nhaSXSanPham == null
                        || $sizeMatSP == null || $fileName == null || $soluong == null
                    ) {
                        echo '<script>confirm("Không được để trống thông tin"); </script>';
                    } else {
                        $query = "SELECT * FROM `products` WHERE `product_id` = '$idSanPham'";
                        $result = mysqli_query($conn, $query);
                        $num = mysqli_num_rows($result);
                        if ($num != 0) {
                            echo '<script>confirm("Không thêm được thông tin\nTồn tại mã sản phẩm này rồi"); </script>';
                        } else {
                            $insert = "INSERT INTO `products`(`product_id`, `SKU_UPC_MPN`, `description`, `price`, `discount`, `length`, `image_url`, `category_id`, `brand`, `gender`, `sizeHeadder`) VALUES ('$idSanPham','$tenSanPham','$chiTietSP','$giaCaSP','$giamGiaSP','$soluong','$fileName','$danhmucSP','$nhaSXSanPham','$gioiTinhSP','$sizeMatSP')";
                            mysqli_query($conn, $insert);
                            header("location:../product.php");
                        }
                    }
                }
            }
            ?>
            <div class="container-fluid pt-4 px-4">
                <div class="">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Thêm Sản Phẩm</h6>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Mã danh mục" name="idSanPham">
                                <label for="floatingInput">Mã sản phẩm</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Mã danh mục" name="tenSanPham">
                                <label for="floatingInput">Tên sản phẩm</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="Mã danh mục" name="giaCaSP" min="0" step="100">
                                <label for="floatingInput">Giá cả sản phẩm</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="Mã danh mục" name="giamGiaSP" value="" min="0" max="100" step="2">
                                <label for="floatingInput">Giảm giá sản phẩm</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="danhmucSP">
                                    <?php
                                    $select = "SELECT * FROM `categories` ORDER BY `category_id` ASC";
                                    $queyrySelect = mysqli_query($conn, $select);
                                    while ($row = mysqli_fetch_array($queyrySelect)) {
                                    ?>
                                        <option selected hidden value="id_Calvin_Klein">Danh mục đồng hồ</option>
                                        <option value="<?php echo $row["category_id"]; ?>"><?php echo $row["category_id"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <!-- <input type="text" class="form-control" id="floatingInput" placeholder="Mã danh mục" name="nhaSXSanPham"> -->
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="nhaSXSanPham">
                                    <?php
                                    $select = "SELECT * FROM `categories` ORDER BY `category_id` ASC";
                                    $queyrySelect = mysqli_query($conn, $select);
                                    while ($row = mysqli_fetch_array($queyrySelect)) {
                                    ?>
                                        <option selected hidden value="Calvin KleinN">Nhà Sản Xuất Đồng hồ</option>
                                        <option value="<?php echo $row["category_name"]; ?>"><?php echo $row["category_name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="chiTietSP" style="height: 130px;resize: none;"></textarea>
                                <label for="floatingTextarea2">Chi tiết sản phẩm</label>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Imgage Product</label>
                                <input class="form-control" name="image" type="file" id="formFile">
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="gioiTinhSP">
                                    <option selected hidden value="nam">Đồng hồ dành cho</option>
                                    <option value="nam">Nam</option>
                                    <option value="nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="Mã danh mục" name="sizeMatSP" value="" min="0" max="100" step="2">
                                <label for="floatingInput">Size mặt đồng hồ</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="Mã danh mục" name="soLuongSP" value="" step="10" min="0">
                                <label for="floatingInput">Số lượng sản phẩm</label>
                            </div>
                            <button type="submit" class="btn btn-primary" name="themSanPham">Thêm sản phẩm </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/mainn.js"></script>
</body>

</html>
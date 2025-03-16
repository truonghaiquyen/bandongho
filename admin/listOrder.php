<?php
include '../connect.php';
global $conn;


?>
<!DOCTYPE html>
<html lang="en">

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
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <?php
        include 'sidebarStrat.php';
        ?>
        <div class="content">
            <?php
            include 'navbarStart.php';
            ?>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Thông tin các hóa đơn</h6>
                    </div>
                    <div class="table-responsive ">
                        <!-- <a class="btn btn-sm btn-success p-2 m-1" href="../export/exportListOder.php">Export</a> -->
                        <table class="table text-start align-middle table-bordered table-striped mb-0 " id="myTable">
                            <thead>
                                <tr class="text-dark text-center">
                                    <th scope="col"></th>
                                    <th scope="col">Mã hóa đơn</th>
                                    <th scope="col">Tên người mua</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Chú ý</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Ngày mua</th>
                                    <th scope="col">Giá tiền</th>
                                    <th scope="col">Tài khoản mua</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select = "SELECT * FROM `list_orders` ORDER BY `idList` ASC";
                                $queyrySelect = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_array($queyrySelect)) {
                                ?>
                                    <tr class="text-dark">
                                        <td>
                                            <a class="btn btn-sm btn-secondary p-2 m-1" href="inforProduct.php?id=<?php echo $row["idList"] ?>">Chi tiết</a>
                                        </td>
                                        <td><?php echo $row["idList"] ?></td>
                                        <td class="text-capitalize"><?php echo $row["namePeople"] ?></td>
                                        <td><?php echo $row["address"] ?></td>
                                        <td><?php echo $row["email"] ?></td>
                                        <td><?php echo $row["note"] ?></td>
                                        <td><?php echo $row["phoneNumbers"] ?></td>
                                        <td>
                                            <!-- Khi bấm nút, trạng thái đơn hàng thay đổi bằng cách gọi file trong thư mục tinhtrang/ -->
                                            <?php if ($row["status"] == 0) { ?>
                                                <a onclick="return confirm('Bạn muốn xác nhận đơn hàng này  ?');" class="btn btn-sm btn-danger p-2" href="tinhtrang/accept.php?id=<?php echo $row["idList"] ?>">Chưa xác nhận</a>
                                            <?php } else if ($row["status"] == 1) { ?>
                                                <a onclick="return confirm('Bạn muốn giao đơn hàng này đến với khác hàng ?');" class="btn btn-sm btn-primary p-2" href="tinhtrang/delivering.php?id=<?php echo $row["idList"] ?>">Đã xác nhận</a>
                                            <?php } else if ($row["status"] == 2) { ?>
                                                <a onclick="return confirm('Bạn đã giao đơn hàng này thành công ?');" class="btn btn-sm btn-warning p-2" href="tinhtrang/delivered.php?id=<?php echo $row["idList"] ?>">Đang giao</a>
                                            <?php } else if ($row["status"] == 3) {
                                                echo '<a class="btn btn-sm btn-success p-2">Đã Giao</a>';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $row["dateOder"] ?></td>
                                        <td><?php echo number_format($row["price"], 3, '.', '.'); ?>₫</td>
                                        <td><?php echo $row["userName"] ?></td>

                                    </tr>
                                <?php
                                    if (isset($_POST['accept'])) {
                                        echo 'oke';
                                    }
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
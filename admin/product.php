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
                  <h6 class="mb-0">Thông tin các sản phẩm</h6>
                  <a href="product/insertproduct.php"><button class="btn btn-primary" type="button">Thêm sản phẩm</button></a>
               </div>
               <div class="table-responsive ">
                  <table class="table text-start align-middle table-bordered table-striped mb-0 " id="myTable">
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
                           <th scope="col">Sửa</th>
                           <th scope="col">Xóa</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $select = "SELECT * FROM `products` ORDER BY `brand` ASC";
                        $queyrySelect = mysqli_query($conn, $select);
                        while ($row = mysqli_fetch_array($queyrySelect)) {
                        ?>
                           <tr class="text-dark text-capitalize ">
                              <td><?php echo $row["product_id"] ?></td>
                              <td><?php echo $row["SKU_UPC_MPN"] ?></td>
                              <td><?php echo number_format($row["price"], 3, '.', '.') ?>₫</td>
                              <td><?php echo $row["discount"] ?>%</td>
                              <td><?php echo $row["description"] ?></td>
                              <td><img style="width: 100px;" class="object-fit-cover border rounded" src="../<?php echo $row["image_url"] ?>" alt="ảnh này không tồn tại"></td>
                              <td><?php echo $row["brand"] ?></td>
                              <td><?php echo $row["gender"] ?></td>
                              <td><?php echo $row["sizeHeadder"] ?></td>
                              <td><a class="btn btn-sm btn-warning p-2" href="product/updateproduct.php?id=<?php echo $row["product_id"] ?>">Sửa</a></td>
                              <td><a class="btn btn-sm btn-danger p-2" onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?');" href="product/deleteproduct.php?id=<?php echo $row["product_id"] ?>">Xóa</a></td>
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
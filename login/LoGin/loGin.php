<?php
include '../../connect.php';
global $conn;
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Đăng Nhập Admin</title>
   <link rel="icon" href="../img/icon/icon-watch-home.svg">
   <link rel="stylesheet" href="loGin.css" />
   <script src="loGin.js" defer></script>
</head>

<body>
   <div class="login">
      <div class="login__body">
         <div class="login-body__child login__child--grow2">

         </div>
         <div class="login-body__child login__child--bgblur">
            <form action="../LoGin/loGin.php" method="POST">
               <h1 class="login-child__title">SIGN IN</h1>
               <div class="login-child__User">
                  <label for="inputUser">User Name</label>
               </div>
               <div class="login-child__inputUser">
                  <input type="text" name="userName" id="inputUser" placeholder="Enter User" required />
               </div>
               <div class="login-child__Pass">
                  <label for="inputPass">Pass Word</label>
               </div>
               <div class="login-child__inputPass">
                  <input type="password" name="passWord" id="inputPass" placeholder="Enter Password" required />
               </div>
               <?php
               if ($_POST) {
                  $username = $_POST['userName'];
                  $password = $_POST['passWord'];
                  // Query kiểm tra thông tin đăng nhập
                  // $query = "SELECT * FROM `user_admin` WHERE `userName` = '$username' AND `passWord` = MD5('$password')";
                  // $result = mysqli_query($conn, $query);
                  // $row = mysqli_fetch_array($result);
                  $stmt = $conn->prepare("SELECT * FROM `user_admin` WHERE `userName` = ? AND `passWord` = MD5(?)");
                  $stmt->bind_param("ss", $username, $password);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $row = $result->fetch_assoc();

                  if ($result->num_rows > 0) {
                     if ($row['role'] == 'admin') {
                        session_start();
                        $_SESSION['loGinAdmin']["fullName"] = $row["Name"];
                        $_SESSION['loGinAdmin']["userName"] = $row["userName"];
                        $_SESSION['loGinAdmin']["passWord"] = $row["passWord"];
                        header("location:../../admin/listOrder.php");
                        // echo '<script> ';
                        //  $_SESSION["fullName"] = $row["Name"];
                        //  $_SESSION["userName"] = $row["userName"];
                        //  $_SESSION["passWord"] = $row["passWord"];
                        //  $_SESSION["role"] = $row["role"];
                        echo "<script>window.href='http://localhost/bandongho/admin/listOrder.php</script>";
                        // exit;
                     } else {
                        session_start();
                        $_SESSION['loGin']["fullName"] = $row["Name"];
                        $_SESSION['loGin']["userName"] = $row["userName"];
                        $_SESSION['loGin']["passWord"] = $row["passWord"];
                        header("location:../../index.php");
                        exit;
                     }

                  } else {
                     echo '<div class="login__child--infomation">*Bạn Nhập sai mật khẩu hoặc tài khoản*</div>';
                  }
               }
               $conn->close();
               ?>
               <div class="login-child__option">
                  <div class="login__child--optionOne">
                     <input type="checkbox" name="" id="checked" value="" />
                     <label for="checked">Show Password</label>
                  </div>
                  <a href="../ForGetPass/forGetPass.php">Forget Password</a>
               </div>
               <!-- xong code option  -->
               <div class="login-child__btn">
                  <button type="submit" class="btn__Login" name="signIn">Sign Up</button>
                  <a href="../createaUser/createa.php">
                     <button type="button" class="btn__Or btn__Or--red">Create Account</button>
                  </a>
               </div>
               <!-- xong code button  -->
            </form>
         </div>
         <!-- xong code form  -->
      </div>
      <!-- xong form login  -->
   </div>

   <!-- xong form bao ngoài login  -->
</body>

</html>
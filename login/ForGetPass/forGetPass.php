<?php
include '../../connect.php';
global $conn;
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>ForGet Pass World</title>
   <link rel="stylesheet" href="../LoGin/loGin.css">
   <link rel="icon" href="../img/icon/icon-watch-home.svg">
   <link rel="stylesheet" href="forGetPasss.css" />
   <script src="forGetPass.js" defer></script>
</head>

<body>
   <div class="login">
      <div class="login__body">
         <div class="login-body__child login__child--grow2">
            <div class="heading--layout__logo"><a href="index.php" style="color: #22a6b3 !important;"></a></div>
         </div>
         <div class="login-body__child login__child--bgblur">
            <form action="forGetPass.php" method="POST">
               <h1 class="login-child__title">FORGET PASSWORD</h1>
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
                  <input type="password" name="passWord" id="inputPass" placeholder="Enter Password" required value="" />
               </div>
               <div class="login-child__Pass">
                  <label for="inputPass">Pass Word</label>
               </div>
               <div class="login-child__inputPass">
                  <input type="password" name="EntetpassWord" id="inputPass" placeholder="Enter The Password" required value="" />
               </div>
               <?php
               if ($_POST) {
                  $username = $_POST['userName'];
                  $password = $_POST['passWord'];
                  $enterPass = $_POST['EntetpassWord'];
                  if ($password ==  $enterPass) {
                     $query = "SELECT * FROM `user_admin` WHERE `userName` = '$username'";
                     $result = mysqli_query($conn, $query);
                     if ($result->num_rows > 0) {
                        $update = "UPDATE `user_admin` SET `passWord` = MD5('$password') WHERE `user_admin`.`userName` = '$username';";
                        if ($conn->query($update) === TRUE) {
                           header('location:../ForGetPass/updateSussec.html');
                        } else {
                           echo '<div class="login__child--infomation">*Mật khẩu không được cập nhật*</div>';
                           $conn->error;
                        }
                     } else {
                        echo '<div class="login__child--infomation">*Tài khoản không tồn tại mời kiểm tra lại*</div>';
                     }
                  } else {
                     echo '<div class="login__child--infomation">*Bạn nhập mật khẩu trùng nhau *</div>';
                  }
               }
               $conn->close();
               ?>
               <div class="login-child__option">
                  <div class="login__child--optionOne">
                     <input type="checkbox" name="" id="checked" value="" />
                     <label for="checked">Show Password</label>
                  </div>
               </div>
               <!-- xong code option  -->
               <div class="login-child__btn">
                  <button type="submit" class="btn__Login" name="signIn">Update Pass</button>
                  <a href="../LoGin/loGin.php"><button type="button" class="btn__Or btn__Or--red">Go To LoGin</button></a>
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
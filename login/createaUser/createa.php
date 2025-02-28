<?php
include '../../connect.php';
global $conn;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Account</title>
    <link rel="icon" href="../img/icon/icon-watch-home.svg">
    <link rel="stylesheet" href="../LoGin/loGin.css">
    <link rel="stylesheet" href="../ForGetPass/forGetPasss.css" />
    <script src="../ForGetPass/forGetPass.js" defer></script>
</head>

<body>
    <div class="login">
        <div class="login__body">
            <div class="login-body__child login__child--grow2">
                <div class="heading--layout__logo"><a href="index.php" style="color: #22a6b3 !important;">Đồng hồ</a></div>
            </div>
            <div class="login-body__child login__child--bgblur">
                <form action="createa.php" method="POST">
                    <h1 class="login-child__title">create account</h1>
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
                            $query = " SELECT * FROM `user_admin` WHERE `userName` = '$username'";
                            $result = mysqli_query($conn, $query);
                            if ($result->num_rows > 0) {
                                echo '<div class="login__child--infomation">*Tài khoản đã tồn tại mời kiểm tra lại*</div>';
                            } else {
                                $insset = "INSERT INTO `user_admin` (`userName`, `passWord`) VALUES (' $username', MD5('$password'));";
                                if ($conn->query($insset) === TRUE) {
                                    header('location:../ForGetPass/updateSussec.html');
                                } else {
                                    echo '<div class="login__child--infomation">*Tài khoản của bạn tạo không được*</div>';
                                    $conn->error;
                                }
                            }
                        } else {
                            echo '<div class="login__child--infomation">*Bạn nhập mật khẩu trùng nhau *</div>';
                        }
                    }
                    ?>
                    <div class="login-child__option">
                        <div class="login__child--optionOne">
                            <input type="checkbox" name="" id="checked" value="" />
                            <label for="checked">Show Password</label>
                        </div>
                    </div>
                    <!-- xong code option  -->
                    <div class="login-child__btn">
                        <button type="submit" class="btn__Login" name="signIn">Create</button>
                        <a href="../LoGin/loGin.php"><button type="button" class="btn__Or btn__Or--red">Go to Login</button></a>
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
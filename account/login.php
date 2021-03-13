<?php
session_start();
include_once('../server.php');
include_once('../classes/Login.php');

$userdata = new DB_con();
$login = new Login($userdata->dbcon);

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $result = $login->Check_login($username, $password);
    $num = mysqli_fetch_array($result);
    
    if ($num > 0) {
        $_SESSION['id'] = $num['id'];
        $_SESSION['username'] = $num['r_username'];
        $_SESSION['permisstion'] = $num['r_status'];
        // echo "<script>alert('Login Successful!');</script>";

        echo "<script>window.location.href='../index.php'</script>";
    } else {
        echo "<script>alert('ข้อมูลการเข้าสู่ระบบไม่ถูถต้อง');</script>";
        echo "<script>window.location.href='login.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Login Form Template</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Favicon and touch icons -->
    <!-- <link rel="shortcut icon" href="favicon.png"> -->

</head>

<body>

    <!-- Top content -->
    <div class="top-content">

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>เข้าสู่ระบบ</h1>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <!-- <h3>Login to our site</h3> -->
                            </div>

                        </div>
                        <div class="form-bottom">
                            <form role="form" action="" method="post" class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="username">ชื่อผู้ใช้งาน</label>
                                    <input type="text" name="username" placeholder="ชื่อผู้ใช้งาน..." class="form-username form-control" id="form-username">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="password">รหัสผ่าน</label>
                                    <input type="password" name="password" placeholder="รหัสผ่าน..." class="form-password form-control" id="form-password">
                                </div>
                                <button type="submit" class="btn" name="login">เข้าสู่ระบบ</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 social-login">
                        <h3>...<a href="../index.php">หน้าแรก</a> หรือ <a href="register.php">ลงทะเบียน...</a></h3>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>

</body>

</html>
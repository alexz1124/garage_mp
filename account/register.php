  <?php
  include_once('../server.php');
  include_once('../classes/Register.php');

  $userdata = new DB_con();
  $register = new Register($userdata->dbcon);


  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $re_password = md5($_POST['re-password']);
    $phone = $_POST['phone'];

    $sql = $register->Register($username, $name, $password, $re_password, $phone);

    if ($sql) {
      echo "<script>alert('ลงทะเบียนเรียบร้อย!');</script>";
      echo "<script>window.location.href='../index.php'</script>";
    } else {
      echo "<script>alert('ผิดพลาด');</script>";
      echo "<script>window.location.href='register.php'</script>";
    }
  }
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MP GARAGE</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Favicon and touch icons -->
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

  </head>

  <body>

    <!-- Top content -->
    <div class="top-content">

      <div class="inner-bg">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text">
              <h1>ลงทะเบียน</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3 form-box">
              <div class="form-top">
                <div class="form-top-left">
                  <!-- <h3>ลงทะเบียน</h3> -->
                </div>
                <!-- <div class="form-top-right">
                <i class="fa fa-lock"></i>
              </div> -->
              </div>
              <div class="form-bottom">
                <form method="POST">

                  <div class="form-group">
                    <label class="sr-only" for="username">ชื่อผู้ใช้งาน</label>
                    <input type="text" name="username" placeholder="ชื่อผู้ใช้งาน..." class="form-username form-control" id="username" required>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="name">ชื่อ - นามสกุล</label>
                    <input type="text" name="name" placeholder="ชื่อ - นามสกุล..." class="form-username form-control" id="name" required>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="password">รหัสผ่าน</label>
                    <input type="password" name="password" placeholder="รหัสผ่าน..." class="form-username form-control" id="password" required>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="re-password">ยืนยันรหัสผ่าน</label>
                    <input type="password" name="re-password" placeholder="ยืนยันรหัสผ่าน..." class="form-username form-control" id="re-password" required>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="phone">เบอร์โทรศัพท์</label>
                    <input type="text" name="phone" placeholder="เบอร์โทรศัพท์..." class="form-username form-control" id="phone" required>
                  </div>
                  <div class="p-t-10">
                    <button class="btn btn--pill btn--green" type="submit" name="submit">ยืนยัน</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3 social-login">
              <h3>...หรือ <a href="login.php">เข้าสู่ระบบ...</a></h3>
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

    <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

  </body>

  </html>
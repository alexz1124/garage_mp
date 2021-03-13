<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>MP GARAGE</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-xs-12">
          <ul class="left-info">
            <li><a href="#"><i class="fa fa-envelope"></i>contact@company.com</a></li>
            <li><a href="#"><i class="fa fa-phone"></i>082-326-1716 (เอ็ม)</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="right-info">
            <?php
            if (isset($_SESSION['permisstion'])) {
              $s = $_SESSION['username'];
              echo ("<li><a href=\"#\">  $s  </a></li>");
              echo ("<li><a href=\"account/logout.php\">ออกจากระบบ</a></li>");
            } else {
              echo ("<li><a href=\"account/login.php\">เข้าสู่ระบบ</a></li>");
              echo ("<li><a href=\"account/register.php\">สมัครสมาชิก</a></li>");
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <h2>MP <em> GARAGE</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item active">
              <a class="nav-link" href="index.php">หน้าแรก
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <?php
            if (isset($_SESSION['permisstion'])) {
              // echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"blog.php\">ADMIN</a></li>");
              if ($_SESSION['permisstion'] == 'User') {
                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"users/service.php\">บริการ</a></li>");
                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"users/booking.php\">จองคิว</a></li>");
                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"contact.php\">ติดต่อ</a></li>");
              } else if ($_SESSION['permisstion'] == 'Admin') {
                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"admin/manage_package.php\">จัดการแพ็คเกจ</a></li>");
                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"admin/manage_user.php\">จัดการผู้ใช้งาน</a></li>");
                // echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"admin/manage_cartype.php\">จัดการประเภทรถ</a></li>");
              } else if ($_SESSION['permisstion'] == 'Owner') {
                if ($_SESSION['permisstion'] == 'Owner') {
                  echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"owner/report_queue.php\">รายงานการจองคิว</a></li>");
                  echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"owner/report_income.php\">รายงานรายได้</a></li>");
                }
              } else if ($_SESSION['permisstion'] == 'Employee') {
                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"employee/detail_booking.php\">ข้อมูลการจองคิว</a></li>");
                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"employee/manage_cartype.php\">ลงทะเบียนรถ</a></li>");
              }
            } else {
              echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"users/service.php\">บริการ</a></li>");
              echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"contact.php\">ติดต่อ</a></li>");
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Page Content -->
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>MP GARAGE</h1>
          <span>บริการ ล้างสี ดูดฝุ่น ขัดเคลือบสี เคลือบแก้ว อบโอโซนฆ่าเชื้อ เปลี่ยนถ่ายน้ำมันเครื่อง</span>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info about-info">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="more-info-content">
            <div class="row">
              <div class="col-md-6 align-self-center">
                <div class="right-content">
                  <h2>MP GARAGE <em>34</em></h2>
                  <p>บริการประทับใจ คือ หน้าที่ของเรา มั่นใจคุณภาพ พร้อมให้บริการ ล้าง อัด ฉีด เคลือบสี ดูดฝุ่น ตรวจเช็คสภาพรถยนต์ ดูแลเหมือนใหม่ตลอดเวลา
                    เรียนเชิญลูกค้าทุกท่าน มาใช้บริการคาร์แคร์ ล้างรถยนต์ ครบวงจรได้ที่ MP GARAGE34 </p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Starts Here -->
  <div class="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>
            Copyright © 2020 MP GARAGE Name
            - CREATE by: MP GARAGE
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/slick.js"></script>
  <script src="assets/js/accordions.js"></script>

  <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
      if (!cleared[t.id]) { // function makes it static and global
        cleared[t.id] = 1; // you could use true and false, but that's more typing
        t.value = ''; // with more chance of typos
        t.style.color = '#fff';
      }
    }
  </script>

</body>

</html>
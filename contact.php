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

  <link rel="shortcut icon" href="/favicon.ico" />
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

            <li class="nav-item">
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
                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"admin/manage_cartype.php\">จัดการประเภทรถ</a></li>");
              } else if ($_SESSION['permisstion'] == 'Owner') {
                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"owner/report.php\">ดูรายงาน</a></li>");
              } else if ($_SESSION['permisstion'] == 'Employee') {
                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"detail_booking.php\">ข้อมูลการจองคิว</a></li>");
              }
            } else {
              echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"users/service.php\">บริการ</a></li>");
              echo ("<li class=\"nav-item active\"><a class=\"nav-link\" href=\"contact.php\">ติดต่อ</a></li>");
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
          <h1>ติดต่อเรา</h1>

        </div>
      </div>
    </div>
  </div>

  <div class="contact-information">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="contact-item">
            <i class="fa fa-phone"></i>
            <h4>โทรศัพท์</h4>
            <a href="#">082-326-1716 (เอ็ม)</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-item">
            <i class="fa fa-envelope"></i>
            <h4>Email</h4>
            <a href="#">contact@company.com</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-item">
            <i class="fa fa-map-marker"></i>
            <h4>Location</h4>
            <a style="cursor: pointer;" onclick="scrollWin()">ไปยังแผนที่</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div style="margin-top: 5%;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3873.8563799963085!2d100.63239860046579!3d13.847658198747919!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zMjcvMSDguIvguK3guKIg4Lij4Liy4Lih4Lit4Li04LiZ4LiX4Lij4LiyIDM0IOC5geC4guC4p-C4hyDguJfguYjguLLguYHguKPguYnguIcg4LmA4LiC4LiV4Lia4Liy4LiH4LmA4LiC4LiZIOC4geC4o-C4uOC4h-C5gOC4l-C4nuC4oeC4q-C4suC4meC4hOC4oyAxMDIyMCDguJvguKPguLDguYDguJfguKjguYTguJfguKI!5e0!3m2!1sth!2sth!4v1615629838975!5m2!1sth!2sth" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>


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
<script>
  function scrollWin() {
    window.scrollTo(0, 5000);
  }
</script>

</html>
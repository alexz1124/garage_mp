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
            <li><a href="#"><i class="fa fa-phone"></i>123-456-7890</a></li>
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
          <h2>Blog <em> Website</em></h2>
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
          <h1>Contact Us</h1>
          <span>feel free to send us a message now!</span>
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
            <h4>Phone</h4>
            <p>Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate nec cursus augue.</p>
            <a href="#">+1 333 4040 5566</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-item">
            <i class="fa fa-envelope"></i>
            <h4>Email</h4>
            <p>Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate nec cursus augue.</p>
            <a href="#">contact@company.com</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-item">
            <i class="fa fa-map-marker"></i>
            <h4>Location</h4>
            <p>212 Barrington Court New York str <br> USA</p>
            <a href="#">View on Google Maps</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="callback-form contact-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Send us a <em>message</em></h2>
            <span>Suspendisse a ante in neque iaculis lacinia</span>
          </div>
        </div>
        <div class="col-md-12">
          <div class="contact-form">
            <form id="contact" action="" method="get">
              <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                  </fieldset>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                  </fieldset>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div>
    <!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.5365926124477!2d100.5281183504651!3d13.74648280107283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29ecd506f6c7d%3A0x1ed0028ba796150b!2z4Lir4Lit4Lio4Li04Lil4Lib4Lin4Lix4LiS4LiZ4LiY4Lij4Lij4Lih4LmB4Lir4LmI4LiH4LiB4Lij4Li44LiH4LmA4LiX4Lie4Lih4Lir4Liy4LiZ4LiE4Lij!5e0!3m2!1sth!2sth!4v1613577444794!5m2!1sth!2sth" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>

  <!-- Footer Starts Here -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3 footer-item">
          <h4>Blog Website</h4>
          <p>Vivamus tellus mi. Nulla ne cursus elit,vulputate. Sed ne cursus augue hasellus lacinia sapien vitae.</p>
          <ul class="social-icons">
            <li><a rel="nofollow" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
        <div class="col-md-3 footer-item">
          <h4>Useful Links</h4>
          <ul class="menu-list">
            <li><a href="#">Vivamus ut tellus mi</a></li>
            <li><a href="#">Nulla nec cursus elit</a></li>
            <li><a href="#">Vulputate sed nec</a></li>
            <li><a href="#">Cursus augue hasellus</a></li>
          </ul>
        </div>
        <div class="col-md-3 footer-item">
          <h4>Additional Pages</h4>
          <ul class="menu-list">
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-md-3 footer-item last-item">
          <h4>Contact Us</h4>
          <div class="contact-form">
            <form id="contact footer-contact" action="" method="post">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>
            Copyright © 2020 Company Name
            - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
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
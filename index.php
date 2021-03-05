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
              echo ("<li><a href=\"account/logout.php\">  $s  </a></li>");
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
                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"owner/report.php\">ดูรายงาน</a></li>");
              } else if ($_SESSION['permisstion'] == 'Employee') {
                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"employee/detail_booking.php\">ข้อมูลการจองคิว</a></li>");
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
  <!-- Banner Starts Here -->
  <div class="main-banner header-text" id="top">
    <div class="Modern-Slider">
      <!-- Item -->
      <div class="item item-1">
        <div class="img-fill">
          <div class="text-content">
            <h6>lorem ipsum dolor sit amet!</h6>
            <h4>Quam temporibus accusam <br> hic ducimus quia</h4>
            <p>Magni deserunt dolorem consectetur adipisicing elit. Corporis molestiae optio, laudantium odio quod rerum maiores, omnis unde quae illo.</p>
            <a href="blog.php" class="filled-button">Read More</a>
          </div>
        </div>
      </div>
      <!-- // Item -->
      <!-- Item -->
      <div class="item item-2">
        <div class="img-fill">
          <div class="text-content">
            <h6>magni deserunt dolorem harum quas!</h6>
            <h4>Aliquam iusto harum <br> ratione porro odio</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At culpa cupiditate mollitia adipisci assumenda laborum eius quae quo excepturi, eveniet. Dicta nulla ea beatae consequuntur?</p>
            <a href="about.php" class="filled-button">About Us</a>
          </div>
        </div>
      </div>
      <!-- // Item -->
      <!-- Item -->
      <div class="item item-3">
        <div class="img-fill">
          <div class="text-content">
            <h6>alias officia qui quae vitae natus!</h6>
            <h4>Lorem ipsum dolor <br>sit amet, consectetur.</h4>
            <p>Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate mi. Sed nec cursus augue. Phasellus lacinia ac sapien vitae dapibus. Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</p>
            <a href="contact.html" class="filled-button">Contact Us</a>
          </div>
        </div>
      </div>
      <!-- // Item -->
    </div>
  </div>
  <!-- Banner Ends Here -->

  <div class="more-info">
    <div class="container">
      <div class="row" id="tabs">
        <div class="col-md-4">
          <ul>
            <li><a href='#tabs-1'>Lorem ipsum dolor sit amet, consectetur adipisicing <br> <small>John Doe &nbsp;|&nbsp; 27.07.2020 10:10</small></a></li>
            <li><a href='#tabs-2'>Mauris lobortis quam id dictum dignissim <br> <small>John Doe &nbsp;|&nbsp; 27.07.2020 10:10</small></a></li>
            <li><a href='#tabs-3'>Class aptent taciti sociosqu ad litora torquent per <br> <small>John Doe &nbsp;|&nbsp; 27.07.2020 10:10</small></a></li>
          </ul>

          <br>

          <div class="text-center">
            <a href="blog.php" class="filled-button">Read More</a>
          </div>

          <br>
        </div>

        <div class="col-md-8">
          <section class='tabs-content'>
            <article id='tabs-1'>
              <img src="assets/images/blog-image-1-940x460.jpg" alt="">
              <h4><a href="blog-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing.</a></h4>
              <p>Sed ut dolor in augue cursus ultrices. Vivamus mauris turpis, auctor vel facilisis in, tincidunt vel diam. Sed vitae scelerisque orci. Nunc non magna orci. Aliquam commodo mauris ante, quis posuere nibh vestibulum sit amet.</p>
            </article>
            <article id='tabs-2'>
              <img src="assets/images/blog-image-2-940x460.jpg" alt="">
              <h4><a href="blog-details.html">Mauris lobortis quam id dictum dignissim</a></h4>
              <p>Sed ut dolor in augue cursus ultrices. Vivamus mauris turpis, auctor vel facilisis in, tincidunt vel diam. Sed vitae scelerisque orci. Nunc non magna orci. Aliquam commodo mauris ante, quis posuere nibh vestibulum sit amet</p>
            </article>
            <article id='tabs-3'>
              <img src="assets/images/blog-image-3-940x460.jpg" alt="">
              <h4><a href="blog-details.html">Class aptent taciti sociosqu ad litora torquent per</a></h4>
              <p>Mauris lobortis quam id dictum dignissim. Donec pellentesque erat dolor, cursus dapibus turpis hendrerit quis. Suspendisse at suscipit arcu. Nulla sed erat lectus. Nulla facilisi. In sit amet neque sapien. Donec scelerisque mi at gravida efficitur. Nunc lacinia a est eu malesuada. Curabitur eleifend elit sapien, sed pulvinar orci luctus eget.
              </p>
            </article>
          </section>
        </div>
      </div>


    </div>
  </div>

  <div class="fun-facts">
    <div class="container">
      <div class="more-info-content">
        <div class="row">
          <div class="col-md-6">
            <div class="left-image">
              <img src="assets/images/about-1-570x350.jpg" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-md-6 align-self-center">
            <div class="right-content">
              <span>Who we are</span>
              <h2>Get to know <em>about us</em></h2>
              <p>Curabitur pulvinar sem a leo tempus facilisis. Sed non sagittis neque. Nulla conse quat tellus nibh, id molestie felis sagittis ut. Nam ullamcorper tempus ipsum in cursus</p>
              <a href="about.php" class="filled-button">Read More</a>
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
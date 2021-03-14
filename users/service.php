<?php
session_start();
include_once('../server.php');
include_once('../classes/Packages.php');

$conn = new DB_con();
$package = new Packages($conn->dbcon);
$result_s = $package->Select_package_size("S");
$result_m = $package->Select_package_size("M");
$result_l = $package->Select_package_size("L");
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
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/myStyle.css">

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
                            echo ("<li><a href=\"../account/logout.php\">ออกจากระบบ</a></li>");
                        } else {
                            echo ("<li><a href=\"../account/login.php\">เข้าสู่ระบบ</a></li>");
                            echo ("<li><a href=\"../account/register.php\">สมัครสมาชิก</a></li>");
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
                <a class="navbar-left" href="../index.php" style="margin-top: 0;">
                    <img src="../assets/images/logo.png" width="160" height="60" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">หน้าแรก
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <?php
                        if (isset($_SESSION['permisstion'])) {
                            if ($_SESSION['permisstion'] == 'User') {
                                echo ("<li class=\"nav-item active\"><a class=\"nav-link\" href=#>บริการ</a></li>");
                                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"booking.php\">จองคิว</a></li>");
                                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"car_register.php\">ลงทะเบียนรถ</a></li>");
                                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"../contact.php\">ติดต่อ</a></li>");
                            }
                        } else {
                            echo ("<li class=\"nav-item active\"><a class=\"nav-link\" href=#>บริการ</a></li>");
                            echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"../contact.php\">ติดต่อ</a></li>");
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->

    <div class="team" style="margin: 0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>บริการ</h2>
                        <span>อยากใส่ข้อมูลไรอะไรไหม</span>
                    </div>
                </div>

                <!-- content -->
                <div class="box">
                    <h2 class="size-label">Size <span class="badge badge-secondary" style="background-color: #f5fa70;">S</span></h2>
                </div>
                <table id="myTable" class="table" style="margin-bottom: 5rem;">
                    <tr class="header" style="background-color: #f5fa70;">
                        <th style="width:3%;">#</th>
                        <th style="width:25%;">แพ็คเกจ</th>
                        <th style="width:25%;">ขนาด</th>
                        <th style="width:20%;">ราคา</th>
                    </tr>

                    <?php $no = 1; ?>
                    <?php
                    if (mysqli_num_rows($result_s) == 0) {
                        echo ("<tr>
                        <td colspan=\"4\" style=\"background-color:#d1dced;\"> ไม่พบข้อมูล </td>
                    </tr>");
                    } else {
                        while ($num = mysqli_fetch_array($result_s)) {
                            echo ("<tr>
                                    <th>" . $no . "</th>
                                    <td id = \"name\">" . $num["P_name"] . "</td>
                                    <td id = \"size\">" . $num["P_size"] . "</td>
                                    <td id = \"price\">" . $num["P_price"] . "</td>
                                </tr>");
                            $no++;
                        }
                    }
                    ?>
                </table>
                <div class="box">
                    <h2 class="size-label">Size <span class="badge badge-secondary" style="background-color: #a9fa70;">M</span></h2>
                </div>
                <table id="myTable" class="table" style="margin-bottom: 5rem;">
                    <tr class="header" style="background-color: #a9fa70;">
                        <th style="width:3%;">#</th>
                        <th style="width:25%;">แพ็คเกจ</th>
                        <th style="width:25%;">ขนาด</th>
                        <th style="width:20%;">ราคา</th>
                    </tr>

                    <?php $no = 1; ?>
                    <?php
                    if (mysqli_num_rows($result_m) == 0) {
                        echo ("<tr>
                        <td colspan=\"4\" style=\"background-color:#d1dced;\"> ไม่พบข้อมูล </td>
                    </tr>");
                    } else {
                        while ($num = mysqli_fetch_array($result_m)) {
                            echo ("<tr>
                                    <th>" . $no . "</th>
                                    <td id = \"name\">" . $num["P_name"] . "</td>
                                    <td id = \"size\">" . $num["P_size"] . "</td>
                                    <td id = \"price\">" . $num["P_price"] . "</td>
                                </tr>");
                            $no++;
                        }
                    }
                    ?>
                </table>
                <div class="box">
                    <h2 class="size-label">Size <span class="badge badge-secondary" style="background-color: #a2fcdb;">L</span></h2>
                </div>
                <table id="myTable" class="table" style="margin-bottom: 5rem;">
                    <tr class="header" style="background-color: #a2fcdb;">
                        <th style="width:3%;">#</th>
                        <th style="width:25%;">แพ็คเกจ</th>
                        <th style="width:25%;">ขนาด</th>
                        <th style="width:20%;">ราคา</th>
                    </tr>

                    <?php $no = 1; ?>
                    <?php
                    if (mysqli_num_rows($result_l) == 0) {
                        echo ("<tr>
                        <td colspan=\"4\" style=\"background-color:#d1dced;\"> ไม่พบข้อมูล </td>
                    </tr>");
                    } else {
                        while ($num = mysqli_fetch_array($result_l)) {
                            echo ("<tr>
                                    <th>" . $no . "</th>
                                    <td id = \"name\">" . $num["P_name"] . "</td>
                                    <td id = \"size\">" . $num["P_size"] . "</td>
                                    <td id = \"price\">" . $num["P_price"] . "</td>
                                </tr>");
                            $no++;
                        }
                    }
                    ?>
                </table>

                <!--end content -->

            </div>
        </div>
    </div>
    <!-- Footer Starts Here -->
    <div class="sub-footer navbar fixed-bottom">
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/accordions.js"></script>

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

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

<script>
    function alert(id) {
        console.log(id);
    }
</script>

</html>
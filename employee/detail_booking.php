<?php
session_start();
include_once('../server.php');
include_once('../classes/Booking.php');
include_once('../classes/Member.php');
include_once('../classes/CarType.php');
include_once('../classes/Packages.php');

$conn = new DB_con();
$_booking = new Booking($conn->dbcon);
$_member = new Member($conn->dbcon);
$_car = new Cartype($conn->dbcon);
$_package = new Packages($conn->dbcon);

$select_by_status = $_booking->Select_Booking_by_status("รอดำเนินการ");

// while ($num = mysqli_fetch_array($select_by_status)) {
//     print_r($num);
//     echo '<br>';
// }
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

<body onload="showTable()">

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
                <a class="navbar-left" href="../index.php">
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
                            if ($_SESSION['permisstion'] == 'Employee') {
                                echo ("<li class=\"nav-item active\"><a class=\"nav-link\" href=#>ข้อมูลการจองคิว</a></li>");
                                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"manage_cartype.php\">ลงทะเบียนรถ</a></li>");
                            }
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
                        <h2>ข้อมูล<em>การจองคิว</em></h2>
                        
                    </div>
                </div>

                <!-- content -->
                <div class="box" style="margin-bottom: 1.6rem;">
                    <select name="selectStatus" id="selectStatus" class="custom-select mr-sm-2" onchange="showTable()" required>
                        <option selected value="รอดำเนินการ">รอดำเนินการ</option>
                        <option value="จอง">จอง</option>
                        <option value="สำเร็จ">สำเร็จ</option>
                        <option value="กำลังล้าง">กำลังล้าง</option>
                    </select>
                </div>

                <table id="myTable" class="table" style="margin-bottom: 5rem;">
                    <tr class="header" style="background-color: #706ca3;">
                        <th style="width:2%;">#</th>
                        <th style="width:15%;">วันที่</th>
                        <th style="width:4%;">เวลา</th>
                        <th style="width:21%;">ยีห้อ / รุ่น / สี</th>
                        <th style="width:7%;">ทะเบียน</th>
                        <th style="width:21%;">แพ็คเก็จ</th>
                        <th style="width:15%;">ชื่อลูกค้า</th>
                        <th style="width:12%;">สถานะ</th>
                    </tr>

                </table>
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
    function showTable() {
        x = document.getElementById("selectStatus").value
        console.log(x);

        if (x == "รอดำเนินการ") {
            document.getElementById("myTable").innerHTML = `
            <table id="myTable" class="table" style="margin-bottom: 5rem;">
                    <tr class="header" style="background-color: #706ca3;">
                        <th style="width:2%;">#</th>
                        <th style="width:15%;">วันที่</th>
                        <th style="width:4%;">เวลา</th>
                        <th style="width:21%;">ยีห้อ / รุ่น / สี</th>
                        <th style="width:7%;">ทะเบียน</th>
                        <th style="width:21%;">แพ็คเก็จ</th>
                        <th style="width:15%;">ชื่อลูกค้า</th>
                        <th style="width:12%;">สถานะ</th>
                    </tr>
            
            <?php $no = 1;
            $select_by_status = $_booking->Select_Booking_by_status("รอดำเนินการ");
            while ($num = mysqli_fetch_array($select_by_status)) {
                $members = $_member->Select_member($num['M_id']);
                $name = mysqli_fetch_assoc($members);
                $cars = $_car->Select_car($num['C_id']);
                $car = mysqli_fetch_assoc($cars);
                $packages = $_package->Select_package($num['P_id']);
                $package = mysqli_fetch_assoc($packages);

                echo ("<tr>
                            <th>" . $no . "</th>
                            <td id = \"date\">" . $num['B_date'] . "</td>
                            <td id = \"time\">" . $num['B_time'] . "</td>
                            <td id = \"car\" style=\"font-size: 14px;\">" . $car['C_brand']  . "/" . $car['C_model'] . "/" . $car['C_color'] . "</td>
                            <td id = \"license\">" . $car['C_license'] . "</td>
                            <td id = \"package\" style=\"font-size: 14px;\">" . $package['P_name'] . "</td>
                            <td id = \"name\">" . $name['r_name'] . "</td>
                            <td id = \"status\"><a href=\"status_form.php?d=" . $num['B_date'] . "&l=" . $car['C_license'] . "&t=" . $num['B_time'] . "&dt=" . $car['C_brand']  . "/"
                    . $car['C_model'] . "/" . $car['C_color'] . "&s=" . $num['B_status'] . "&pk=" . $package['P_name'] . "&n=" . $name['r_name'] .
                    "&id=" . $num['B_id'] . "\" style=\"color: #dea300;\">" . $num['B_status'] . "</a></td>                   
                                </tr>");
                $no++;
            }
            ?>
            </table>
            `
        } else if (x == "จอง") {
            document.getElementById("myTable").innerHTML = `
            <table id="myTable" class="table" style="margin-bottom: 5rem;">
                    <tr class="header" style="background-color: #706ca3;">
                        <th style="width:2%;">#</th>
                        <th style="width:15%;">วันที่</th>
                        <th style="width:4%;">เวลา</th>
                        <th style="width:21%;">ยีห้อ / รุ่น / สี</th>
                        <th style="width:7%;">ทะเบียน</th>
                        <th style="width:21%;">แพ็คเก็จ</th>
                        <th style="width:15%;">ชื่อลูกค้า</th>
                        <th style="width:12%;">สถานะ</th>
                    </tr>
            
            <?php $no = 1;
            $select_by_status = $_booking->Select_Booking_by_status("จอง");
            while ($num = mysqli_fetch_array($select_by_status)) {
                $members = $_member->Select_member($num['M_id']);
                $name = mysqli_fetch_assoc($members);
                $cars = $_car->Select_car($num['C_id']);
                $car = mysqli_fetch_assoc($cars);
                $packages = $_package->Select_package($num['P_id']);
                $package = mysqli_fetch_assoc($packages);

                echo ("<tr>
                            <th>" . $no . "</th>
                            <td id = \"date\">" . $num['B_date'] . "</td>
                            <td id = \"time\">" . $num['B_time'] . "</td>
                            <td id = \"car\" style=\"font-size: 14px;\">" . $car['C_brand']  . "/" . $car['C_model'] . "/" . $car['C_color'] . "</td>
                            <td id = \"license\">" . $car['C_license'] . "</td>
                            <td id = \"package\" style=\"font-size: 14px;\">" . $package['P_name'] . "</td>
                            <td id = \"name\">" . $name['r_name'] . "</td>
                            <td id = \"status\"><a href=\"status_form.php?d=" . $num['B_date'] . "&l=" . $car['C_license'] . "&t=" . $num['B_time'] . "&dt=" . $car['C_brand']  . "/"
                    . $car['C_model'] . "/" . $car['C_color'] . "&s=" . $num['B_status'] . "&pk=" . $package['P_name'] . "&n=" . $name['r_name'] .
                    "&id=" . $num['B_id'] . "\" style=\"color: red;\">" . $num['B_status'] . "</td>                   
                    </tr>");
                $no++;
            }
            ?>
            </table>
            `

        } else if (x == "สำเร็จ") {
            document.getElementById("myTable").innerHTML = `
            <table id="myTable" class="table" style="margin-bottom: 5rem;">
                    <tr class="header" style="background-color: #706ca3;">
                        <th style="width:2%;">#</th>
                        <th style="width:15%;">วันที่</th>
                        <th style="width:4%;">เวลา</th>
                        <th style="width:21%;">ยีห้อ / รุ่น / สี</th>
                        <th style="width:7%;">ทะเบียน</th>
                        <th style="width:21%;">แพ็คเก็จ</th>
                        <th style="width:15%;">ชื่อลูกค้า</th>
                        <th style="width:12%;">สถานะ</th>
                    </tr>
            
            <?php $no = 1;
            $select_by_status = $_booking->Select_Booking_by_status("สำเร็จ");
            while ($num = mysqli_fetch_array($select_by_status)) {
                $members = $_member->Select_member($num['M_id']);
                $name = mysqli_fetch_assoc($members);
                $cars = $_car->Select_car($num['C_id']);
                $car = mysqli_fetch_assoc($cars);
                $packages = $_package->Select_package($num['P_id']);
                $package = mysqli_fetch_assoc($packages);

                echo ("<tr>
                            <th>" . $no . "</th>
                            <td id = \"date\">" . $num['B_date'] . "</td>
                            <td id = \"time\">" . $num['B_time'] . "</td>
                            <td id = \"car\" style=\"font-size: 14px;\">" . $car['C_brand']  . "/" . $car['C_model'] . "/" . $car['C_color'] . "</td>
                            <td id = \"license\">" . $car['C_license'] . "</td>
                            <td id = \"package\" style=\"font-size: 14px;\">" . $package['P_name'] . "</td>
                            <td id = \"name\">" . $name['r_name'] . "</td>                   
                            <td id = \"status\"><a href=\"status_form.php?d=" . $num['B_date'] . "&l=" . $car['C_license'] . "&t=" . $num['B_time'] . "&dt=" . $car['C_brand']  . "/"
                    . $car['C_model'] . "/" . $car['C_color'] . "&s=" . $num['B_status'] . "&pk=" . $package['P_name'] . "&n=" . $name['r_name'] .
                    "&id=" . $num['B_id'] . "\" style=\"color: #0d9e00;\">" . $num['B_status'] . "</td>                   
                                </tr>");
                $no++;
            }
            ?>
            </table>
            `

        } else if (x == "กำลังล้าง") {
            document.getElementById("myTable").innerHTML = `
            <table id="myTable" class="table" style="margin-bottom: 5rem;">
                    <tr class="header" style="background-color: #706ca3;">
                        <th style="width:2%;">#</th>
                        <th style="width:15%;">วันที่</th>
                        <th style="width:4%;">เวลา</th>
                        <th style="width:21%;">ยีห้อ / รุ่น / สี</th>
                        <th style="width:7%;">ทะเบียน</th>
                        <th style="width:21%;">แพ็คเก็จ</th>
                        <th style="width:15%;">ชื่อลูกค้า</th>
                        <th style="width:12%;">สถานะ</th>
                    </tr>
            
            <?php $no = 1;
            $select_by_status = $_booking->Select_Booking_by_status("กำลังล้าง");
            while ($num = mysqli_fetch_array($select_by_status)) {
                $members = $_member->Select_member($num['M_id']);
                $name = mysqli_fetch_assoc($members);
                $cars = $_car->Select_car($num['C_id']);
                $car = mysqli_fetch_assoc($cars);
                $packages = $_package->Select_package($num['P_id']);
                $package = mysqli_fetch_assoc($packages);

                echo ("<tr>
                            <th>" . $no . "</th>
                            <td id = \"date\">" . $num['B_date'] . "</td>
                            <td id = \"time\">" . $num['B_time'] . "</td>
                            <td id = \"car\" style=\"font-size: 14px;\">" . $car['C_brand']  . "/" . $car['C_model'] . "/" . $car['C_color'] . "</td>
                            <td id = \"license\">" . $car['C_license'] . "</td>
                            <td id = \"package\" style=\"font-size: 14px;\">" . $package['P_name'] . "</td>
                            <td id = \"name\">" . $name['r_name'] . "</td>    
                            <td id = \"status\"><a href=\"status_form.php?d=" . $num['B_date'] . "&l=" . $car['C_license'] . "&t=" . $num['B_time'] . "&dt=" . $car['C_brand']  . "/"
                    . $car['C_model'] . "/" . $car['C_color'] . "&s=" . $num['B_status'] . "&pk=" . $package['P_name'] . "&n=" . $name['r_name'] .
                    "&id=" . $num['B_id'] . "\" style=\"color: #000080;\">" . $num['B_status'] . "</td>                   
                                </tr>");
                $no++;
            }
            ?>
            </table>
            `

        }
    }
</script>

</html>
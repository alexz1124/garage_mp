<?php
session_start();
include_once('../server.php');
include_once('../classes/Cartype.php');
include_once('../classes/Packages.php');
include_once('../classes/Booking.php');

$conn = new DB_con();
$package = new Packages($conn->dbcon);
$_car = new Cartype($conn->dbcon);
$_book = new Booking($conn->dbcon);


$M_id = $_REQUEST["id"];
$date_show = date_create($_REQUEST["date"]);
$date = $_REQUEST["date"];
$time = $_REQUEST["time"];

$all_car = $_car->Select_car_By_Mid($M_id);

$result_s = $package->Select_package_size("S");
$result_m = $package->Select_package_size("M");
$result_l = $package->Select_package_size("L");

if (isset($_POST['_ADD_BOOKING'])) {
    $date = $date;
    $time = $time;
    $c_id = $_POST['car_id'];
    $show_package = $_POST['show_package'];

    echo $M_id . ">" . $date . ">" . $time . ">" . $c_id . ">" .  $show_package;

    $result = $_book->Booking_queue($M_id, $date, $time, $c_id, $show_package, "รอดำเนินการ");
    if ($result) {
        echo "<script>
        alert(\"จองคิวเรียบร้อย\");
        window.location.href = '../users/booking.php';
        </script>";
    }
}
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
                            if ($_SESSION['permisstion'] == 'User') {
                                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"service.php\">บริการ</a></li>");
                                echo ("<li class=\"nav-item active\"><a class=\"nav-link\" href=#>จองคิว</a></li>");
                                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"car_register.php\">ลงทะเบียนรถ</a></li>");
                                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"../contact.php\">ติดต่อ</a></li>");
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
        <div class="container" style="padding: 0 15%">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>จองคิว</h2>
                    </div>

                    <div class="form-bottom">
                        <form name="formadd" action="" method="post">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="date">วันที่จอง</label>
                                        <input type="text" class="form-username form-control" name="date" id="date" value="<?php echo date_format($date_show, "d/m/Y"); ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="time">เวลาที่จอง</label>
                                        <input type="text" class="form-username form-control" name="time" id="time" value="<?php echo $time; ?>" disabled>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="license">ทะเบียน</label>
                                        <select name="license" id="license" class="custom-select" onchange="selectDetail()" required>
                                            <option value="" selected>กรุณาเลือกรถ</option>
                                            <?php
                                            while ($num = mysqli_fetch_array($all_car)) {
                                                echo "<option value=" . $num['C_license'] . "/" . $num['C_brand'] . "/" . $num['C_model'] . "/" .
                                                    $num['C_color'] . "/" . $num['C_size'] . "/" . $num['C_id'] . ">" . $num['C_license'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-8">
                                        <label for="detail">ยีห้อ / รุ่น / สี / ขนาด</label>
                                        <input type="text" class="form-username form-control" name="detail" id="detail" disabled>
                                        <input type="text" name="car_id" id="car_id" hidden>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="show_package">แพ็กเกจ</label>
                                <select name="show_package" id="show_package" class="custom-select" required>
                                    <option selected value="">กรุณาเลือกแพ็คเกจ</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" onclick="history.go(-1)">ย้อนกลับ</button>
                                <button type="submit" name="_ADD_BOOKING" class="btn btn-success">ยืนยัน</button>
                            </div>
                        </form>
                    </div>
                </div>
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
    function selectDetail() {
        var x = document.getElementById("license").value;
        if (x != "") {
            var res = x.split("/");
            document.getElementById("detail").value = `${res[1]}/${res[2]}/${res[3]}/${res[4]}`;
            document.getElementById("car_id").value = `${res[5]}`;
            switch (res[4]) {
                case "S":
                    // console.log("S");
                    document.getElementById("show_package").innerHTML =
                        `<?php
                            echo (" <select name=\"package\" id=\"show_package\" class=\"custom-select\" required>
                                        <option selected value=\"\">กรุณาเลือกแพ็คเกจ</option>
                                        ");
                            while ($num = mysqli_fetch_array($result_s)) {
                                echo "<option value=" . $num['P_id'] . ">" . $num['P_name'] . "</option>";
                            }
                            echo ("</select>");
                            ?>`
                    break;
                case "M":
                    // console.log("M");
                    document.getElementById("show_package").innerHTML =
                        `<?php
                            echo (" <select name=\"package\" id=\"show_package\" class=\"custom-select\" required>
                                        <option selected value=\"\">กรุณาเลือกแพ็คเกจ</option>
                                        ");
                            while ($num = mysqli_fetch_array($result_m)) {
                                echo "<option value=" . $num['P_id'] . ">" . $num['P_name'] . "</option>";
                            }
                            echo ("</select>");
                            ?>`
                    break;
                case "L":
                    // console.log("L");
                    document.getElementById("show_package").innerHTML =
                        `<?php
                            echo (" <select name=\"package\" id=\"show_package\" class=\"custom-select\" required>
                                        <option selected value=\"\">กรุณาเลือกแพ็คเกจ</option>
                                        ");
                            while ($num = mysqli_fetch_array($result_l)) {
                                echo "<option value=" . $num['P_id'] . ">" . $num['P_name'] . "</option>";
                            }
                            echo ("</select>");
                            ?>`
                    break;
            }
        } else {
            document.getElementById("detail").value = "";
        }
    }
</script>

</html>

<!-- <option selected value=\"\">กรุณาเลือกแพ็คเกจ</option> -->
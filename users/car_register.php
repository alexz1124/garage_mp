<?php
session_start();
include_once('../server.php');
include_once('../classes/Member.php');
include_once('../classes/Cartype.php');

$conn = new DB_con();
$member = new Member($conn->dbcon);
$register_car = new Cartype($conn->dbcon);
$result = $member->Select_member_user();

$cartype = $register_car->Select_car_By_Mid($_SESSION['id']);


if (isset($_POST['_ADD_CAR'])) {

    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $license = $_POST['license'];
    $size = $_POST['size'];

    $result = $register_car->Register_Car($brand, $model, $color, $license, $size, $_SESSION['id']);
    if ($result) {
        echo "<script>
        alert(\"ลงทะเบียนรถเรียบร้อย\");
        window.location.href = '../index.php';
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
                                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"booking.php\">จองคิว</a></li>");
                                echo ("<li class=\"nav-item active\"><a class=\"nav-link\" href=#>ลงทะเบียนรถ</a></li>");
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

    <div class="team" style="margin: 0 25%">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>ลงทะเบียน<em>รถ</em></h2>
                    </div>

                    <div class="form-bottom">
                        <form name="formadd" action="" method="post">

                            <div class="form-group">
                                <label for="brand">ยี่ห้อ</label>
                                <input type="text" placeholder="ยี่ห้อ..." class="form-username form-control" name="brand" id="brand">
                            </div>

                            <div class="form-group">
                                <label for="model">รุ่น</label>
                                <input type="text" placeholder="รุ่น..." class="form-username form-control" name="model" id="model">
                            </div>

                            <div class="form-group">
                                <label for="color">สี</label>
                                <input type="text" placeholder="สี..." class="form-username form-control" name="color" id="color">
                            </div>

                            <div class="form-group">
                                <label for="license">ทะเบียน</label>
                                <input type="text" placeholder="ทะเบียน..." class="form-username form-control" name="license" id="license">
                            </div>


                            <div class="form-group">
                                <label for="size">ขนาด</label>
                                <select name="size" class="custom-select">
                                    <option selected value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <!-- <button type="button" class="btn btn-secondary" onclick="history.go(-1)">ย้อนกลับ</button> -->
                                <button type="submit" name="_ADD_CAR" class="btn btn-success">ยืนยัน</button>
                            </div>
                        </form>
                    </div>


                    <h5 style="margin: 8% 0% 3%">รถของฉัน</h5>

                    <form name="table_user" action="form.php" method="POST" style="width: 100%;">
                        <table id="myTable" class="table">
                            <tr class="header">
                                <th style="width:3%;">#</th>
                                <th style="width:20%;">ยี่ห้อ</th>
                                <th style="width:20%;">รุ่น</th>
                                <th style="width:9%;">สี</th>
                                <th style="width:10%;">ขนาด</th>
                                <th style="width:10%;">ทะเบียน</th>
                                <th style="width:15%;">แก้ไข/ลบ</th>
                            </tr>

                            <?php $no = 1; ?>
                            <?php while ($num = mysqli_fetch_array($cartype)) :
                                $result = $member->Select_member($num['M_id']);
                                $name = mysqli_fetch_assoc($result);
                                echo ("<tr>
                                    <th>" . $no . "</th>
                                    <td id = \"brand\">" . $num["C_brand"] . "</td>
                                    <td id = \"model\">" . $num["C_model"] . "</td>
                                    <td id = \"color\">" . $num["C_color"] . "</td>
                                    <td id = \"size\">" . $num["C_size"] . "</td>
                                    <td id = \"license\">" . $num['C_license'] . "</td>
                                    
                                    <td><a href=\"car_form_edit.php?id=" . $num["C_id"] . "\"><i class=\"fas fa-edit\"></i></a> /
                                        <a href=\"car_form_delete.php?id=" . $num["C_id"] . "\"><i class=\"fas fa-trash\"></i></a>
                                    </td>
                                </tr>");
                                $no++;
                            endwhile ?>

                        </table>
                    </form>
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
    function alert(id) {
        console.log("เรียบร้อย");
    }
</script>

</html>
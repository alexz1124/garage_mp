<?php
session_start();
include_once('../server.php');
include_once('../classes/Member.php');

$conn = new DB_con();
$member = new Member($conn->dbcon);

$__id = $_GET['id'];

$result = $member->Select_member($__id);
$num = mysqli_fetch_array($result);
$status = $num['r_status'];

if (isset($_POST['_EDIT'])) {

    $username = $_POST['user'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $re_password = $_POST['re-password'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];

    $result = $member->Update_member($__id, $username, $name, $password, $re_password, $phone, $status);
    if ($result) {
        header('Location: manage_user.php');
        die();
    }
}
// while($num = mysqli_fetch_array($result)) {
//     echo $num['r_name']; 
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
                            if ($_SESSION['permisstion'] == 'Admin') {
                                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"manage_package.php\">จัดการแพ็คเกจ</a></li>");
                                echo ("<li class=\"nav-item active\"><a class=\"nav-link\" href=#>จัดการผู้ใช้งาน</a></li>");
                                echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"manage_cartype.php\">จัดการประเภทรถ</a></li>");
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
                        <h2>แก้ไข<em>ผู้ใช้งาน</em></h2>
                    </div>

                    <div class="form-bottom">
                        <form name="formedit" action="" method="post">

                            <div class="form-group">
                                <label for="status">สถานะผู้ใช้งาน</label>
                                <select name="status" class="custom-select">
                                    <option selected value="<?php echo $num['r_status']; ?>">สถานะผู้ใช้งาน</option>
                                    <option value="Owner">Owner</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Employee">Employee</option>
                                    <option value="User">User</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="user">ชื่อผู้ใช้งาน</label>
                                <input type="text" placeholder="Username..." class="form-username form-control" name="user" id="user" value="<?php echo $num['r_username']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">ชื่อ</label>
                                <input type="text" placeholder="Name..." class="form-username form-control" name="name" id="name" value="<?php echo $num['r_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">รหัสผ่าน</label>
                                <input type="password" placeholder="New Password..." class="form-username form-control" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label for="re-password">ยืนยันรหัสผ่าน</label>
                                <input type="password" placeholder="Confirm New Password..." class="form-username form-control" name="re-password" id="re-password">
                            </div>
                            <div class="form-group">
                                <label for="phone">หมายเลขโทรศัพท์</label>
                                <input type="text" placeholder="Phone Number..." class="form-username form-control" name="phone" id="phone" value="<?php echo $num['r_phone']; ?>">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" onclick="history.go(-1)">ย้อนกลับ</button>
                                <button type="submit" name="_EDIT" class="btn btn-success">ยืนยัน</button>
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
    function alert() {
        alert(55);
    }
</script>

</html>
<?php
session_start();
include_once('../server.php');
include_once('../classes/Member.php');

$conn = new DB_con();
$member = new Member($conn->dbcon);
$ss = "alex";
$result = $member->Select_all_member();

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
                        <li><a href="#"><i class="fa fa-phone"></i>123-456-7890</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="right-info">
                        <?php
                        if (isset($_SESSION['permisstion'])) {
                            $s = $_SESSION['username'];
                            echo ("<li><a href=\"../account/logout.php\">  $s  </a></li>");
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
                <a class="navbar-brand" href="../index.php">
                    <h2>Blog <em> Website</em></h2>
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
                                // echo ("<li class=\"nav-item\"><a class=\"nav-link\" href=\"manage_cartype.php\">จัดการประเภทรถ</a></li>");
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
                        <h2>จัดการ<em>ผู้ใช้งาน</em></h2>
                        <span>อยากใส่ข้อมูลไรอะไรไหม</span>
                    </div>
                </div>

                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                <form name="table_user" action="form.php" method="POST" style="width: 100%;">
                    <table id="myTable" class="table">
                        <tr class="header">
                            <th style="width:3%;">#</th>
                            <th style="width:25%;">ชื่อผู้ใช้งาน</th>
                            <th style="width:25%;">ชื่อ</th>
                            <th style="width:20%;">เบอร์โทรศัพท์</th>
                            <th style="width:10%;">สถานะผู้ใช้งาน</th>
                            <th style="width:20%;">แก้ไข/ลบ</th>
                        </tr>

                        <?php $no = 1; ?>
                        <?php while ($num = mysqli_fetch_array($result)) :
                            echo ("<tr>
                                    <th>" . $no . "</th>
                                    <td id = \"username\">" . $num["r_username"] . "</td>
                                    <td id = \"name\">" . $num["r_name"] . "</td>
                                    <td id = \"phone\">" . $num["r_phone"] . "</td>
                                    <td id = \"status\">" . $num["r_status"] . "</td>
                                    
                                    <td><a href=\"member_form_edit.php?id=" . $num["id"] . "\"><i class=\"fas fa-edit\"></i></a> /
                                        <a href=\"member_form_delete.php?id=" . $num["id"] . "\"><i class=\"fas fa-trash\"></i></a>
                                    </td>
                                </tr>");
                            $no++;
                        endwhile ?>

                    </table>
                </form>

            </div>
        </div>
    </div>
    <!-- Footer Starts Here -->
    <div class="sub-footer navbar fixed-bottom">
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
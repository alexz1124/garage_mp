<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
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
    <?php
    session_start();
    include_once('../server.php');
    include_once('../classes/Member.php');
    include_once('../classes/Booking.php');
    include_once('../classes/CarType.php');
    include_once('../classes/Packages.php');


    $conn = new DB_con();
    $booking = new Booking($conn->dbcon);
    $_member = new Member($conn->dbcon);
    $_car = new Cartype($conn->dbcon);
    $_package = new Packages($conn->dbcon);

    $q = $_REQUEST["q"];

    $month = date("m", strtotime($q));
    $year = date("Y", strtotime($q));

    $g = $month - 1;

    $result_day = $booking->Select_Booking_by_date_and_status($q, "สำเร็จ");
    $result_month = $booking->Select_Booking_by_month_and_status($month, $year);
    $result_year = $booking->Select_Booking_by_year_and_status($year);

    // By date
    echo "<h6 style=\"margin:0 0 1.5% 0;\">ตารางแสดงรายได้ประจำวันที่ <em>$q</em></h6>";
    echo "<form name=\"table_user\" action=\"form.php\" method=\"POST\" style=\"width: 100%;\">
    <table id=\"myTable\" class=\"table\">
        <tr class=\"header\">
            <th style=\"width:10%;\">ลำดับ</th>
            <th style=\"width:40%;\">รายการ</th>
            <th style=\"width:15%;\">ราคา</th>
            <th style=\"width:0.001%;\"></th>
        </tr>";

    $no = 1;
    if (mysqli_num_rows($result_day) == 0) {
        echo ("<tr>
        <td colspan=\"4\" style=\"background-color:#d1dced;\"> ไม่พบข้อมูล </td>
    </tr>");
    } else {
        while ($num = mysqli_fetch_array($result_day)) {
            $result = $_package->Select_package($num['P_id']);
            $package = mysqli_fetch_assoc($result);
            echo ("<tr>
        <td>" . $no . "</td>
        <td>" . $package['P_name'] . "</td>
        <td>" . $package['P_price'] . "</td>
        <td></td>                   
    </tr>");
            $no++;
        }
    }
    echo ("</table>
            </form>");

    // By month
    $TH_Month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    // $month_th = echo $month + 1;
    echo "<h6 style=\"margin:8% 0 1.5% 0;\">ตารางแสดงรายได้ประจำเดือน <em>$TH_Month[$g]</em></h6>";
    echo "<form name=\"table_user\" action=\"form.php\" method=\"POST\" style=\"width: 100%;\">
    <table id=\"myTable\" class=\"table\">
        <tr class=\"header\">
            <th style=\"width:10%;\">ลำดับ</th>
            <th style=\"width:40%;\">รายการ</th>
            <th style=\"width:15%;\">ราคา</th>
            <th style=\"width:0.001%;\"></th>
        </tr>";

    $no = 1;
    if (mysqli_num_rows($result_month) == 0) {
        echo ("<tr>
        <td colspan=\"4\" style=\"background-color:#d1dced;\"> ไม่พบข้อมูล </td>
    </tr>");
    } else {
        while ($num = mysqli_fetch_array($result_month)) {
            $result = $_package->Select_package($num['P_id']);
            $package = mysqli_fetch_assoc($result);
            echo ("<tr>
        <td>" . $no . "</td>
        <td>" . $package['P_name'] . "</td>
        <td>" . $package['P_price'] . "</td>
        <td></td>                   
    </tr>");
            $no++;
        }
    }

    echo ("</table>
            </form>");
    // By year
    echo "<h6 style=\"margin:8% 0 1.5% 0;\">ตารางแสดงรายได้ประจำปี <em>$year</em></h6>";
    echo "<form name=\"table_user\" action=\"form.php\" method=\"POST\" style=\"width: 100%;\">
    <table id=\"myTable\" class=\"table\">
        <tr class=\"header\">
            <th style=\"width:10%;\">ลำดับ</th>
            <th style=\"width:40%;\">รายการ</th>
            <th style=\"width:15%;\">ราคา</th>
            <th style=\"width:0.001%;\"></th>
        </tr>";

    $no = 1;
    if (mysqli_num_rows($result_year) == 0) {
        echo ("<tr>
        <td colspan=\"4\" style=\"background-color:#d1dced;\"> ไม่พบข้อมูล </td>
    </tr>");
    } else {
        while ($num = mysqli_fetch_array($result_year)) {
            $result = $_package->Select_package($num['P_id']);
            $package = mysqli_fetch_assoc($result);
            echo ("<tr>
        <td>" . $no . "</td>
        <td>" . $package['P_name'] . "</td>
        <td>" . $package['P_price'] . "</td>
        <td></td>                   
    </tr>");
            $no++;
        }
    }

    echo ("</table>
            </form>");

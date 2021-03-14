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


    $conn = new DB_con();
    $booking = new Booking($conn->dbcon);
    $_member = new Member($conn->dbcon);
    $_car = new Cartype($conn->dbcon);

    $q = $_REQUEST["q"];
    $result = $booking->Select_Booking_by_date($q);

    echo "<form name=\"table_user\" action=\"form.php\" method=\"POST\" style=\"width: 100%;\">
    <table id=\"myTable\" class=\"table\">
        <tr class=\"header\">
            <th style=\"width:10%;\">เวลา</th>
            <th style=\"width:33%;\">ยีห้อ / รุ่น / สี</th>
            <th style=\"width:12%;\">ทะเบียน</th>
            <th style=\"width:20%;\">ชื่อลูกค้า</th>
            <th style=\"width:11%;\">สถานะ</th>
            <th style=\"width:14%;\">จอง</th>
        </tr>";

    $time = array("08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30");
    if (mysqli_num_rows($result) == 0) {
        foreach ($time as $value) {
            if ($value == "12:00" || $value == "12:30") {
                echo ("<tr>
                <td id = \"time\">" . $value . "</td>
                <td colspan=\"5\" style=\"background-color:#ff3333;\"> พักเที่ยง </td>
            </tr>");
            } else {
                echo ("<tr>
                <td id = \"time\">" . $value . "</td>
                <td id = \"name\"> - </td>
                <td id = \"size\"> - </td>
                <td id = \"price\"> - </td>
                <td id = \"status\"  style=\"color: green;\"> ว่าง </td>                   
                <td><a href=\"booking_form.php?id=" . $_SESSION['id'] . "&time=" . $value . "&date=" . $q . "\"><i class=\"fas fa-edit\"></i></a>
                </td>
            </tr>");
            }
        }
    } else {
        $i = 0;
        while ($i < 18) {
            while ($num = mysqli_fetch_array($result)) {

                $members = $_member->Select_member($num['M_id']);
                $name = mysqli_fetch_assoc($members);
                $cars = $_car->Select_car($num['C_id']);
                $car = mysqli_fetch_assoc($cars);

                for ($i; $i < 18; $i++) {
                    // echo $time[$i] . "***" . $num['B_time'] . "<br>";
                    if ($time[$i] == $num['B_time']) {
                        if ($num['B_status'] == "รอดำเนินการ") {
                            echo ("<tr>
                            <td id = \"time\">" . $time[$i] . "</td>
                            <td id = \"car\">" . $car['C_brand']  . "/" . $car['C_model'] . "/" . $car['C_color'] . "</td>
                            <td id = \"license\">" . $car['C_license'] . "</td>
                            <td id = \"name\">" . $name['r_name'] . "</td>
                            <td id = \"status\"  style=\"color: #e6b800;\">" . $num['B_status'] . "</td>                   
                            <td> </td>
                        </tr>");
                        } else if ($num['B_status'] == "สำเร็จ") {
                            echo ("<tr>
                            <td id = \"time\">" . $time[$i] . "</td>
                            <td id = \"car\">" . $car['C_brand']  . "/" . $car['C_model'] . "/" . $car['C_color'] . "</td>
                            <td id = \"license\">" . $car['C_license'] . "</td>
                            <td id = \"name\">" . $name['r_name'] . "</td>
                            <td id = \"status\"  style=\"color: #007399;\">" . $num['B_status'] . "</td>                   
                            <td> </td>
                        </tr>");
                        } else {
                            echo ("<tr>
                            <td id = \"time\">" . $time[$i] . "</td>
                            <td id = \"car\">" . $car['C_brand']  . "/" . $car['C_model'] . "/" . $car['C_color'] . "</td>
                            <td id = \"license\">" . $car['C_license'] . "</td>
                            <td id = \"name\">" . $name['r_name'] . "</td>
                            <td id = \"status\"  style=\"color: red;\">" . $num['B_status'] . "</td>                   
                            <td> </td>
                        </tr>");
                        }
                        break;
                    } else if ($time[$i] == "12:00" || $time[$i] == "12:30") {
                        echo ("<tr>
                                    <td id = \"time\">" . $time[$i] . "</td>
                                    <td colspan=\"5\" style=\"background-color:#ff3333;\"> พักเที่ยง </td>
                                </tr>");
                    } else {
                        echo ("<tr>
                                    <td id = \"time\">" . $time[$i] . "</td>
                                    <td id = \"name\"> - </td>
                                    <td id = \"size\"> - </td>
                                    <td id = \"price\"> - </td>
                                    <td id = \"status\"  style=\"color: green;\"> ว่าง </td>                   
                                    <td><a href=\"booking_form.php?id=" . $_SESSION['id'] . "&time=" . $time[$i] . "&date=" . $q . "\"><i class=\"fas fa-edit\"></i></a>
                                    </td>
                                </tr>");
                    }
                }
            }
            $i++;
            for ($i; $i < 18; $i++) {
                if ($time[$i] == "12:00" || $time[$i] == "12:30") {
                    echo ("<tr>
                                <td id = \"time\">" . $time[$i] . "</td>
                                <td colspan=\"5\" style=\"background-color:#ff3333;\"> พักเที่ยง </td>
                            </tr>");
                } else {
                    // echo "empty <br>";
                    echo ("<tr>
                                <td id = \"time\">" . $time[$i] . "</td>
                                <td id = \"name\"> - </td>
                                <td id = \"size\"> - </td>
                                <td id = \"price\"> - </td>
                                <td id = \"status\"  style=\"color: green;\"> ว่าง </td>                   
                                <td><a href=\"booking_form.php?id=" . $_SESSION['id'] . "&time=" . $time[$i] . "&date=" . $q . "\"><i class=\"fas fa-edit\"></i></a>
                                </td>
                            </tr>");
                }
            }
        }
    }
    echo ("</table>
            </form>");

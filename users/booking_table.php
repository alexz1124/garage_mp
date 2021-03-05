<?php
$booking = array("2021-03-04", "14:00", "TOYOTA", "Vios", "แดง", "กข1234", "สมชาย");
$no = 0;
$time = array("08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30");
// $num = mysqli_fetch_array($time);
//var_dump($num);



if (isset($_POST['date'])) {
    echo 45;
} else {
    echo 55;
}


foreach ($time as $value) {
    //echo "$value <br>";
    echo ("<tr>
                <td id = \"time\">" . $time[$no] . "</td>
                <td id = \"name\">" . 5 . "</td>
                <td id = \"size\">" . 5 . "</td>
                <td id = \"price\">" . 5 . "</td>
                <td id = \"price\">" . 5 . "</td>                   
                <td><a href=\"package_form_edit.php?id=" . "จอง" . "\"><i class=\"fas fa-edit\"></i></a>
                </td>
            </tr>");
    $no++;
}

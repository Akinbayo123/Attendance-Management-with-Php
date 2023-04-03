<?php
include "connection.php";
$id = $_GET["id"];
$date = date("Y-m-d ");
$attendance_status =  "Present";
mysqli_query($conn, "UPDATE `attendance` SET `attendance_record`='$attendance_status',`date`='$date' WHERE id='$id'");
$res = mysqli_query($conn, "select * from attendance where id = '$id'");
while ($row = mysqli_fetch_array($res)) {
    $id = $row["id"];
    $roll_number = $row["roll_number"];
    $attendance = $row["attendance_record"];
    $student_name = $row["student_name"];
    $date = $row["date"];
}
$res2 = mysqli_query($conn, "select * from attendance_records where student_name = '$student_name' && date = '$date'");
$count = mysqli_num_rows($res2);
echo $count;
if ($count == 0) {
    echo $count;
    mysqli_query($conn, "INSERT INTO `attendance_records`(`student_name`, `roll_number`, `attendance_status`, `date`) VALUES ('$student_name','$roll_number','$attendance_status','$date')");
} else {
    echo $count;
    mysqli_query($conn, "UPDATE `attendance_records` SET `attendance_status`='$attendance_status' WHERE student_name='$student_name'");
}
header("location:index.php");
die();

<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "attendance_system";
$conn = mysqli_connect($hostname, $username, $password, $database) or die("connection failed");


function heade()
{
    $output = '<div class="container mt-3">
    <div class="h2 p-3 text-center bg-light fw-bold">
        EMPOLYEE/STUDENT ATTENDANCE SYSTEM
    </div>
</div>';

    echo $output;
}

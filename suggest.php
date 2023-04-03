<?php
include "connection.php";
$q = $_GET['q'];
$suggest = "";

if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    $res = mysqli_query($conn, "select * from attendance where CONCAT(student_name) LIKE '%$q%' ");
    while ($row = mysqli_fetch_array($res)) {

        //if (stristr($q, substr($row['student_name'], 0, $len))) {
        if ($suggest === "") {
            $suggest = $row['student_name'];
        } else {
            $suggest .= ",$row[student_name]";
        }
        // }
    }
}

echo $suggest === "" ? "No suggestion" : $suggest;

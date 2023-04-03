<?php
include "connection.php";
session_start();
if (isset($_POST["submit"])) {

    $student_name = $_POST["student_name"][$id];
    $roll_number = $_POST["roll_number"][$id];
    $date = date("Y-m-d H:i:s");
    mysqli_query($conn, "INSERT INTO attendance_records (student_name, roll_number,attendance_status,date) VALUES ('$student_name', '$roll_number','$attendance_status','$date')");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Search Users</h2>
        <form action="">
            Search users: <input class="form-control" type="text" onkeyup="showSuggestion(this.value)">

        </form>
        <p>Suggestion: <span style="font-weight: bold;" id="output"></span></p>

    </div>



    <script src="bootstrap.min.js"></script>
    <script>
        function showSuggestion(str) {
            if (str.lenght == 0) {
                document.getElementById("output").innerHTML = "";
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("output").innerHTML = this.responseText;

                    }
                };
                xmlhttp.open("GET", "suggest.php?q=" + str, true);
                xmlhttp.send();
            }

        }
    </script>
</body>

</html>
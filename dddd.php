<?php
include "connection.php";
session_start();
if (isset($_POST["submit"])) {
    foreach ($_POST["attendance_status"] as $id => $attendance_status) {
        $student_name = $_POST["student_name"][$id];
        $roll_number = $_POST["roll_number"][$id];
        $date = date("Y-m-d H:i:s");
        mysqli_query($conn, "INSERT INTO attendance_records (student_name, roll_number,attendance_status,date) VALUES ('$student_name', '$roll_number','$attendance_status','$date')");
    }
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
    <?php heade() ?>
    <div class="container">
        <div class="row bg-light p-2 mt-3">
            <div class="col-lg-4">
                <a href="adds.php" class="btn btn-success">Add Student</a>
            </div>
            <div class="col-lg-8 d-flex justify-content-end align-item-center">
                <a href="" class="btn btn-info">View All</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <div class="text-center fw-bold mt-2">Date: <?php
                                                            echo date("Y - m - d") ?></div>
                <form action="index.php" method="POST" class="mt-3">
                    <table class="table table-stripped">
                        <tr>
                            <th>#Serial No</th>
                            <th>Student Name</th>
                            <th>Roll Number</th>
                            <th>Attandance Status</th>
                        </tr>
                        <?php
                        $result = mysqli_query($conn, "select *from attendance");
                        $serial_no = 0;
                        $counter = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $serial_no++;


                        ?>
                            <tr>
                                <td><?php echo $serial_no; ?></td>

                                <td><?php echo $row["student_name"]; ?>
                                    <input type="hidden" value="<?php echo $row["student_name"]; ?>" name="student_name[]">
                                </td>
                                <td><?php echo  $row["roll_number"]; ?><input type="hidden" value="<?php echo $row["roll_number"]; ?>" name="roll_number[]"></td>
                                <td><input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="present" <?php if (isset($_POST["attendance_status"][$counter]) && $_POST["attendance_status"][$counter] == "present") {
                                                                                                                                echo "checked==checked";
                                                                                                                            } ?>required>Present

                                    <input type="radio" name="attendance_status[1]" value="absent" required>Absent
                                </td>

                            <?php
                        }
                        $counter++;
                            ?>
                            </tr>
                    </table>
                    <input type="submit" name="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>







    <script src="bootstrap.min.js"></script>
</body>

</html>
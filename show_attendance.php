<?php
include "connection.php";
session_start();
$date =  $_GET['date'];



//if (isset($_POST["present"])) {


//}


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
                <a href="view_all.php" class="btn btn-info">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <div class="text-center fw-bold mt-2">Date: <?php
                                                            echo $date; ?></div>
                <form action="" method="POST" class="mt-3">
                    <table class="table table-stripped">
                        <tr>
                            <th>#Serial No</th>
                            <th>Student Name</th>
                            <th>Roll Number</th>
                            <th>Attendance Status</th>
                        </tr>
                        <?php
                        $result = mysqli_query($conn, "select * from attendance_records where date='$date'");
                        $serial_no = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $serial_no++;


                        ?>
                            <tr>
                                <td><?php echo $serial_no; ?></td>

                                <td><?php echo $row["student_name"]; ?>

                                </td>
                                <td><?php echo  $row["roll_number"]; ?><input type="hidden" value="<?php echo $row["roll_number"]; ?>" name=""></td>
                                <td> <?php echo $row["attendance_status"];  ?></td>
                            </tr>
                        <?php
                        }

                        ?>
                        </tr>
                    </table>

                </form>
            </div>
        </div>
    </div>






    <script src="bootstrap.min.js"></script>
</body>

</html>
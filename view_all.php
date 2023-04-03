<?php
include "connection.php";
session_start();



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
                <a href="index.php" class="btn btn-info">Home</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">

                <form action="" method="POST" class="mt-3">
                    <table class="table table-stripped">
                        <tr>
                            <th>#Serial No</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $result = mysqli_query($conn, "select distinct date from attendance_records");
                        $serial_no = 0;
                        $counter = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $serial_no++;
                            $date = $row["date"];

                        ?>
                            <tr>
                                <td><?php echo $serial_no; ?></td>

                                <td><?php echo $date; ?></ </td>
                                <td><a href="show_attendance.php?date=<?php echo $date ?>" class="btn btn-primary"> Show Attendance</a></td>
                            </tr>
                        <?php
                        }
                        $counter++;
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
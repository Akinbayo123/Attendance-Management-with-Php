<?php
include "connection.php";
session_start();
$num_pg = 3;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$start_from = ($page - 1) * 3;
$result = mysqli_query($conn, "select *from attendance limit $start_from,$num_pg");
$res = mysqli_query($conn, "select *from attendance");
$num = mysqli_num_rows($res);


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

                        </tr>
                        <?php
                        $serial_no = 0;
                        $counter = 0;
                        while ($row = mysqli_fetch_array($result)) {



                        ?>
                            <tr>
                                <td><?php echo  $row["id"]; ?></td>

                                <td><?php echo $row["student_name"]; ?>
                                    <input type="hidden" value="<?php echo $row["student_name"]; ?>" name="student_name[]">
                                </td>
                                <td><?php echo  $row["roll_number"]; ?></td>
                                <td>
                                </td>
                            </tr>
                        <?php
                        }
                        $counter++;
                        ?>
                        </tr>
                    </table>
                    <?php
                    $total_pages = ceil($num / $num_pg);


                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<a href='pagnation.php?page=$i'>$i </a>";
                    }

                    ?>


                </form>
            </div>
        </div>
    </div>






    <script src="bootstrap.min.js"></script>
</body>

</html>
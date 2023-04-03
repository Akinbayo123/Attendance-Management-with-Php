<?php
include "connection.php";
session_start();
$msg = "";
if (isset($_POST["submit"])) {
    $msg = "";
    $name = $_POST["name"];
    $roll = $_POST["roll"];
    $sql = "INSERT INTO attendance (student_name, roll_number) VALUES ('$name', '$roll')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = "<div class='alert alert-success'>
        <strong>success!</strong>attendance successfully inserted
    </div>";
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
                <a href="index.php" class="btn btn-info">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <?php
                echo $msg;
                ?>
                <form action="" method="POST" class="mt-3">
                    <label for="name">Student Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                    <label for="roll">Roll Number</label>
                    <input type="text" name="roll" class="form-control" id="roll">
                    <input type="submit" name="submit" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>
    </div>







    <script src="bootstrap.min.js"></script>
</body>

</html>
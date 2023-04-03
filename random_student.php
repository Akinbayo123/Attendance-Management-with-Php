<?php
include "connection.php";
session_start();
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

<body class="vh-100">

    <div class="container">
        <h2 class="text-center">Display Random Users</h2>
        <div class="row">
            <div class="col-lg-10">
                <form action="" method="POST" class="mt-3">

                    <input type="submit" name="submit" class="btn d-flex btn-primary mt-3 " value="Display">
                </form>
            </div>
        </div>
        <?php
        if (isset($_POST["submit"])) {
            $res = mysqli_query($conn, "select * from attendance order by rand() limit 0,100");
            while ($row = mysqli_fetch_array($res)) {
                $name = $row["student_name"];
            }
        ?>
            <h3> <?php echo $name; ?></h3>
        <?php
        }

        ?>
    </div>







    <script src="bootstrap.min.js"></script>
</body>

</html>
<?php
session_start();
$User_Email = $_SESSION['User_Email'];
if (empty($User_Email)) {
    header('location:index.php');
} else {
}
?>
<!doctype html>
<html lang="en">

<head>
    <style>
        body {
            background-image: url("../assignmentPHP1/images/blur-bg-blurred.jpg");
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            height: 100vh;
        }
    </style>
    <?php include("header.php"); ?>
</head>

<body>

    <?php include("step1.php"); ?>



    <?php include("footer.php"); ?>
</body>

</html>
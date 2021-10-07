<?php
error_reporting(0);
session_start();
$User_Email = $_SESSION['User_Email'];

$fo = fopen("users/" . $User_Email . "/feedback.txt", "r");
$EmpStatus = trim(fgets($fo));
$EmpName = trim(fgets($fo));
$rating = trim(fgets($fo));
$EmploymentStatus = trim(fgets($fo));
$JobTitle = trim(fgets($fo));
$ReviewHeadline = trim(fgets($fo));
$Pros = trim(fgets($fo));
$Cons = trim(fgets($fo));
$AdviceManagement = trim(fgets($fo));
$fname = trim(fgets($fo));

$error = "";

if (isset($_POST['sub'])) {
    $tmp = $_FILES["att"]["tmp_name"];
    $fname = $_FILES["att"]["name"];
    $ext = pathinfo($fname, PATHINFO_EXTENSION);
    $fn = "feedback doc-" . rand() . "-" . time() . ".$ext";

    if (!empty($tmp)) {
        $dest = "users/" . $User_Email . "/";
        if ($ext == "doc" || $ext == "pdf") {
            if (move_uploaded_file($tmp, $dest . $fn)) {
                $error =  "Uploaded succesfully";
                $fo = fopen("users/" . $User_Email . "/feedback.txt", "w");
                fwrite($fo, $EmpStatus . "\n" . $EmpName . "\n" . $rating . "\n" . $EmploymentStatus . "\n" . $JobTitle . "\n" . $ReviewHeadline . "\n" . $Pros . "\n" . $Cons . "\n" . $AdviceManagement . "\n" . $fname);
                header("Location:review.php");
            } else {
                $error = "Upload error";
            }
        } else {
            $error = "upload only doc or pdf files";
        }
    } else {
        $error = "select file";
    }
}


?>


<!doctype html>
<html lang="en">

<head>
    <?php include("style.php"); ?>
    <?php include("header.php"); ?>
</head>

<body>
    <div class=" container bg">
        <div class="page m-0 mt-2 pt-0 pb-5 pt-3">
            <h1 class="title text-center text-light mb-3">Success</h1>
            <div class="row d-flex flex-row justify-content-center mt-2">
                <a href="logout.php" class="btn btn-primary mr-3 mt-3">logout</a>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>
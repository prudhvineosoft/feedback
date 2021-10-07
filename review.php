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

if (isset($_POST['sub'])) {
    $fo = fopen("users/" . $User_Email . "/feedback.txt", "w");
    unlink("users/" . $User_Email . "/" . $fname);
    header("Location:dashboard.php");
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
            <h1 class="title text-center text-success mb-3">Preview</h1>
            <div class="row d-flex flex-row justify-content-center">
                <div class="col-md-3 mycard text-center">
                    <h5 class="text-light">current or former employe</h5>
                </div>
                <div class="col-md-4 mycard text-center">
                    <h5 class="text-warning"><?php echo $EmpStatus ?></h5>
                </div>
            </div>
            <div class="row d-flex flex-row justify-content-center">
                <div class="col-md-3 mycard text-center">
                    <h5 class="text-light">Employer's Name</h5>
                </div>
                <div class="col-md-4 mycard text-center">
                    <h5 class="text-warning"><?php echo $EmpName ?></h5>
                </div>
            </div>
            <div class="row d-flex flex-row justify-content-center">
                <div class="col-md-3 mycard text-center">
                    <h5 class="text-light">Overall Rating</h5>
                </div>
                <div class="col-md-4 mycard text-center">
                    <h5 class="text-warning"><?php echo $rating ?></h5>
                </div>
            </div>
            <div class="row d-flex flex-row justify-content-center">
                <div class="col-md-3 mycard text-center">
                    <h5 class="text-light">Employment Status</h5>
                </div>
                <div class="col-md-4 mycard text-center">
                    <h5 class="text-warning"><?php echo $EmploymentStatus ?></h5>
                </div>
            </div>
            <div class="row d-flex flex-row justify-content-center">
                <div class="col-md-3 mycard text-center">
                    <h5 class="text-light">Job Title</h5>
                </div>
                <div class="col-md-4 mycard text-center">
                    <h5 class="text-warning"><?php echo $JobTitle ?></h5>
                </div>
            </div>
            <div class="row d-flex flex-row justify-content-center">
                <div class="col-md-3 mycard text-center">
                    <h5 class="text-light">Review Headline</h5>
                </div>
                <div class="col-md-4 mycard text-center">
                    <h5 class="text-warning"><?php echo $ReviewHeadline ?></h5>
                </div>
            </div>
            <div class="row d-flex flex-row justify-content-center">
                <div class="col-md-3 mycard text-center">
                    <h5 class="text-light">Pros</h5>
                </div>
                <div class="col-md-4 mycard text-center">
                    <h5 class="text-warning"><?php echo $Pros  ?></h5>
                </div>
            </div>
            <div class="row d-flex flex-row justify-content-center">
                <div class="col-md-3 mycard text-center">
                    <h5 class="text-light">Cons</h5>
                </div>
                <div class="col-md-4 mycard text-center">
                    <h5 class="text-warning"><?php echo $Cons ?></h5>
                </div>
            </div>
            <div class="row d-flex flex-row justify-content-center">
                <div class="col-md-3 mycard text-center">
                    <h5 class="text-light">Advice Management</h5>
                </div>
                <div class="col-md-4 mycard text-center">
                    <h5 class="text-warning"><?php echo $AdviceManagement ?></h5>
                </div>
            </div>
            <div class="row d-flex flex-row justify-content-center">
                <div class="col-md-3 mycard text-center">
                    <h5 class="text-light">Submit Proof</h5>
                </div>
                <div class="col-md-4 mycard text-center">
                    <h5 class="text-warning"><?php echo $fname ?></h5>
                </div>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="row d-flex flex-row justify-content-center mt-2">
                    <input type="submit" name="sub" value="Cancel" class="btn btn-secondary  mr-3 mt-3">
                    <a href="success.php" class="btn btn-primary mt-3">agree and submit</a>
                </div>
            </form>
        </div>

    </div>

    <?php include("footer.php"); ?>
</body>

</html>
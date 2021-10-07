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
            if (move_uploaded_file($tmp, $dest . $fname)) {
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
    <style>
        body {
            background-image: url("../assignmentPHP1/images/blur-bg-blurred.jpg");
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            height: 100vh;
        }


        .page {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 8px;
        }

        .mycard {
            background-color: rgba(158, 154, 154, 0.2);
            border-radius: 8px;
            margin-left: 15px;
            margin-top: 10px;
            padding: 5px;
            height: 36px
        }

        label {
            font-weight: bold;

        }

        .my-input {
            background-color: transparent;
            color: orange;
            font-size: 18px;
            outline: none;
            border: none;
            font-weight: 500;
            height: 26px;
        }

        .my-input:focus,
        .my-input:visited {
            background-color: transparent;
            color: orange;
            font-size: 18px;
            outline: none;
            border: none;
            font-weight: 500;
            height: 26px;
        }

        .text-area {
            height: 60px
        }
    </style>
    <?php include("header.php"); ?>
</head>

<body>
    <div class=" container bg">
        <div class="page m-0 mt-2 pt-0 pb-5 pt-3">
            <h1 class="title text-center text-light mb-3">Step 3</h1>
            <form method="post" enctype="multipart/form-data">

                <!-- Submit Proof -->
                <div class="row d-flex flex-row justify-content-center mt-2">
                    <div class="col-md-2 mycard form  text-center">
                        <label class="text-warning">Submit Proof</label>
                    </div>
                    <div class="col-md-5 mycard">
                        <input type="file" name="att" class="" required>
                        <p class="text-danger mb-2"><?php echo $error ?></p>
                    </div>

                </div>
                <!-- check box -->
                <div class="row d-flex flex-row justify-content-center mt-2">
                    <div class="col-md-1 mycard text-center">
                        <input type="checkbox" class="" name="remember" id="exampleCheck1" required>
                    </div>
                    <label class="col-md-6 mycard text-warning" for="dropdownCheck">
                        Agree Terms and Condition
                    </label>
                </div>

                <div class="row d-flex flex-row justify-content-center mt-2">
                    <a href="step2.php" class="btn btn-primary mr-3 mt-3">previous page</a>
                    <input type="submit" name="sub" value="Submit" class="btn btn-primary  mt-3">
                </div>
            </form>
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>
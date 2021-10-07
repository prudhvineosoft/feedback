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

$error = "";

if (isset($_POST['sub'])) {

    $EmpStatus = input_field($_POST['EmpStatus']);
    $EmpName = input_field($_POST['EmpName']);

    mkdir("users/" . $User_Email);
    $fo = fopen("users/" . $User_Email . "/feedback.txt", "w");
    fwrite($fo, $EmpStatus . "\n" . $EmpName . "\n" . $rating . "\n" . $EmploymentStatus . "\n" . $JobTitle . "\n" . $ReviewHeadline . "\n" . $Pros . "\n" . $Cons . "\n" . $AdviceManagement . "\n" . $fname);

    echo $name1;
    header("Location:step2.php");
}
function input_field($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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

        }

        .page {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 8px;
        }

        .mycard {
            background-color: rgba(158, 154, 154, 0.2);
            margin-left: 15px;
            margin-top: 10px;
            padding: 5px;
            height: 36px;
            border-radius: 8px;
        }

        label {
            font-weight: bold;
            text-align: center;
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
    </style>
    <?php include("header.php"); ?>
</head>

<body>
    <div class=" container">
        <div class="page m-0 mt-2 pt-0 pb-5">
            <h2 class="title text-center text-light mb-4 pt-3">Step 1</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="row d-flex flex-row justify-content-center mt-2">
                    <div class="col-md-4 mycard text-center">
                        <label class="text-warning">Are you a current or former employee?</label>
                    </div>
                    <div class="col-sm-3 mycard">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EmpStatus" id="exampleRadios1" value="Current" checked>
                            <label class="form-check-label text-light" for="exampleRadios1">
                                Current
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EmpStatus" id="exampleRadios2" value="Former" required>
                            <label class="form-check-label text-light" for="exampleRadios2">
                                Former
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row d-flex flex-row justify-content-center mt-2">
                    <div class="col-md-2 mycard text-center">
                        <label for="inputEmail3" class="text-warning ">Name</label>
                    </div>
                    <div class="col-sm-5 mycard">
                        <input type=" text" class="my-input" name="EmpName" value="<?php echo $EmpName ?>" />
                    </div>
                </div>
                <div class="row d-flex flex-row justify-content-center mt-2 mb-3">

                    <a href="logout.php" class="btn btn-primary mt-3 mr-3 ">Logout</a><br>
                    <input type="submit" name="sub" value="Next" class="btn btn-primary  mt-3">
                </div>
            </form>
        </div>
    </div>



    <?php include("footer.php"); ?>
</body>

</html>
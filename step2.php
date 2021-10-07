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

    $rating = input_field($_POST['rating']);
    $EmploymentStatus = input_field($_POST['EmploymentStatus']);
    $JobTitle = input_field($_POST['JobTitle']);
    $ReviewHeadline = input_field($_POST['ReviewHeadline']);
    $Pros = input_field($_POST['Pros']);
    $Cons = input_field($_POST['Cons']);
    $AdviceManagement = input_field($_POST['AdviceManagement']);

    $fo = fopen("users/" . $User_Email . "/feedback.txt", "w");
    fwrite($fo, $EmpStatus . "\n" . $EmpName . "\n" . $rating . "\n" . $EmploymentStatus . "\n" . $JobTitle . "\n" . $ReviewHeadline . "\n" . $Pros . "\n" . $Cons . "\n" . $AdviceManagement . "\n" . $fname);


    header("Location:step3.php");
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
    <?php include("style.php"); ?>
    <?php include("header.php"); ?>

</head>

<body>
    <div class=" container">
        <div class="page m-0 mt-2 pt-0 pb-4">
            <h1 class="title text-center text-light mb-3">Step 2</h1>
            <form method="post" enctype="multipart/form-data">
                <!-- rating -->
                <div class="row d-flex flex-row justify-content-center mt-2">
                    <div class="col-md-2 mycard text-center">
                        <label for="rating" class="text-warning">Choose rating:</label>
                    </div>
                    <div class="col-sm-5 mycard">
                        <select name="rating" id="rating" required>
                            <option value="1">*</option>
                            <option value="2">**</option>
                            <option value="3">***</option>
                            <option value="4">****</option>
                            <option value="5">*****</option>
                        </select>
                    </div>
                </div>

                <!-- Employment Status -->
                <div class="row d-flex flex-row justify-content-center mt-2">
                    <div class="col-md-2 mycard text-center">
                        <label for="rating" class="text-warning">Employment Status:</label>
                    </div>
                    <div class="col-sm-5 mycard">
                        <select name="EmploymentStatus" id="rating" required>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Contract">Contract</option>
                            <option value="Intern">Intern</option>
                        </select>
                    </div>
                </div>
                <!-- Job Title -->
                <div class="row d-flex flex-row justify-content-center mt-2">
                    <div class="col-md-2 mycard text-center">
                        <label for="inputEmail3" class="text-warning ">Job Title</label>
                    </div>
                    <div class="col-sm-5 mycard">
                        <input type="text" class="my-input" name="JobTitle" value="<?php echo $JobTitle ?>" required />
                    </div>
                </div>
                <!-- Review Headline -->
                <div class="row d-flex flex-row justify-content-center mt-2">
                    <div class="col-md-2 mycard text-center">
                        <label for="inputEmail3" class="text-warning ">Review Headline</label>
                    </div>
                    <div class="col-sm-5 mycard">
                        <input type="text" class="my-input" name="ReviewHeadline" value="<?php echo $ReviewHeadline ?>" required />
                    </div>
                </div>
                <!-- Pros -->
                <div class="row d-flex flex-row justify-content-center mt-2">
                    <div class="col-md-2 mycard text-center">
                        <label for="inputEmail3" class="text-warning ">Pros</label>
                    </div>
                    <div class="col-sm-5 mycard text-area">
                        <textarea minlength="15" maxlength="300" cols="50" type="text" class="my-input text-area" name="Pros" value="" required><?php echo $Pros ?></textarea>
                    </div>
                </div>
                <!-- Cons -->
                <div class="row d-flex flex-row justify-content-center mt-2">
                    <div class="col-md-2 mycard text-center">
                        <label for="inputEmail3" class="text-warning ">Cons</label>
                    </div>
                    <div class="col-sm-5 mycard text-area">
                        <textarea minlength="15" maxlength="300" cols="50" type="text" class="my-input text-area" name="Cons" value="" required><?php echo $Cons ?></textarea>
                    </div>
                </div>
                <!-- Advice Management -->
                <div class="row d-flex flex-row justify-content-center mt-2">
                    <div class="col-md-2 mycard text-center">
                        <label for="inputEmail3" class="text-warning ">Advice Management</label>
                    </div>
                    <div class="col-sm-5 mycard text-area">
                        <textarea minlength="15" maxlength="300" cols="50" type="text" class="my-input text-area" name="AdviceManagement" value="" required><?php echo $AdviceManagement ?></textarea>
                    </div>
                </div>

                <div class="row d-flex flex-row justify-content-center mt-2">
                    <a href="dashboard.php" class="btn btn-primary mr-3 mt-3">previous page</a>
                    <input type="submit" name="sub" value="Next" class="btn btn-primary  mt-3">
                </div>
            </form>
        </div>
    </div>



    <?php include("footer.php"); ?>
</body>

</html>
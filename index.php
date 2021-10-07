<?php
error_reporting(0);
session_start();

if (!empty($_SESSION["User_Email"])) {
    header("Location: dashboard.php");
}


//define variables 
$emailErr = $passErr =  $result = "";
if (isset($_POST['sub'])) {

    //email validation 
    $em = input_field($_POST['email']);
    $pass = input_field($_POST['password']);

    if (empty($em)) {
        $emailErr = "<i class='far fa-lightbulb'></i>";;
    } else {
        if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $em)) {
            $emailErr = "<i class='far fa-lightbulb'></i>";
        } else {
            if (is_dir("users/" . $em)) {
                $fo = fopen("users/" . $em . "/data.txt", "r");
                $checkPass = trim(fgets($fo));
                $emailErr =  "<i class='far fa-check-circle green'></i>";
                if (empty($pass)) {
                    $passErr = "<i class='far fa-lightbulb'></i>";
                } else {
                    if ($pass == $checkPass) {
                        $result = 'success';

                        session_start();

                        $_SESSION["User_Email"] = $em;
                        header("Location: dashboard.php");

                        if (!empty($_POST["remember"])) {
                            setcookie("daEmail", $em, time() + 36000 * 24 * 30 * 12);
                            setcookie("daPass", $pass, time() + 36000 * 24 * 30 * 12);
                        }
                    } else {
                        $passErr = "<i class='far fa-times-circle'></i>";
                    }
                }
            } else {
                $emailErr =  "<i class='far fa-times-circle'></i>";
            }
        }
    }
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

    <?php include("header.php"); ?>
    <script>
        function cook() {
            if ("<?php echo $_COOKIE["daEmail"] ?>" != undefined) {
                if (document.getElementById("Emailinput").value == "<?php echo $_COOKIE["daEmail"] ?>") {
                    if (document.getElementById("passwordInput").value = "<?php echo $_COOKIE["daPass"] ?>") {

                    } else {
                        document.getElementById("passwordInput").value = ""
                    }
                }
            }
        }
    </script>
    <style>
        body {
            border: 0px;
        }

        .error {
            color: red;
        }

        .green {
            color: green;
        }

        .login-bg {
            background-image: url("../assignmentPHP1/images/blur-bg-blurred.jpg");
            background-size: cover;
            background-attachment: fixed;
            font-family: "Open Sans", sans-serif;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            background-color: rgba(0, 0, 0, 0.6);
            width: 35%;
            text-align: center;
            border-radius: 15px;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
                rgba(0, 0, 0, 0.22) 0px -12px 30px, rgba(0, 0, 0, 0.22) 0px 4px 6px,
                rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.19) 0px -3px 5px;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:visited,
        textarea:-webkit-autofill,
        textarea:-webkit-autofill:hover,
        textarea:-webkit-autofill:focus,
        select:-webkit-autofill,
        select:-webkit-autofill:hover,
        select:-webkit-autofill:focus {
            border: none;
            width: 70%;
            padding: 1em 2em 1em 3em;
            -webkit-text-fill-color: #9199aa;
            -webkit-box-shadow: 0 0 0px 1000px transparent inset;
            background: url(../assignmentPHP1/images/adm.png) no-repeat 10px 15px;
            outline: none;
            font-size: 18px;
            margin-top: 10px;
            border-bottom: 1px solid#484856;
            -webkit-transition-delay: 99999s;
        }

        input[type="email"] {
            width: 70%;
            padding: 1em 2em 1em 3em;
            color: #9199aa;
            font-size: 18px;
            outline: none;
            background: url(../assignmentPHP1/images/adm.png) no-repeat 10px 15px;
            border: none;
            font-weight: 100;
            border-bottom: 1px solid#484856;
            margin-top: 10px;
        }

        .passeord_css {
            width: 70%;
            padding: 1em 2em 1em 3em;
            color: #dd3e3e;
            font-size: 18px;
            outline: none;
            background: url(../assignmentPHP1/images/key.png) no-repeat 10px 23px;
            border: none;
            font-weight: 100;
            border-bottom: 1px solid#484856;
            margin-bottom: 20px;
        }

        .key {
            background: url(../assignmentPHP1/images/pass.png) no-repeat 447px 17px;
        }

        input[type="submit"] {
            font-size: 30px;
            color: #fff;
            outline: none;
            border: none;
            background: #3ea751;
            width: 100%;
            padding: 18px 0;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background: #14c1ce;
        }
    </style>
</head>

<body>
    <div class="login-bg">
        <div class="login-form">
            <div class="avtar mt-3">
                <img src="images/avtar.png" />
            </div>
            <form method="post">
                <input type="email" id="Emailinput" onchange="cook()" name="email" placeholder="User name" /><span class="error"><?php echo $emailErr; ?></span><br />
                <input type="password" id="passwordInput" class="passeord_css" name="password" placeholder="......" /><span class="error"><?php echo $passErr; ?></span><br />
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
                    <label class="form-check-label text-light" for="dropdownCheck">
                        Remember me
                    </label>
                </div>
                <h2 class="green"><?php echo $result ?></h2>
                <a class="text-light" href="signUp.php">New user here? Sign up</a>
                <input type="submit" value="login" name="sub" />
            </form>
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>
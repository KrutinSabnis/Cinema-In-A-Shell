<!DOCTYPE html>
<?php
  session_start();
  if(isset($_SESSION['username'])){
    header("Location: index.php");
  }
  ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
  <link rel="icon" type="image/png" href="assets/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <style>
        html,
        body,
        .full {
            min-height: 100% !important;
            height: 100%;
        }

        body {
            margin-top: 20px;
            background: #f6f9fc;
        }

        .account-block {
            padding: 0;
            background-image: url("assets/bgimage.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            position: relative;
        }

        .account-block .overlay {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .account-block .account-testimonial {
            text-align: center;
            color: #fff;
            position: absolute;
            margin: 0 auto;
            padding: 0 1.75rem;
            bottom: 3rem;
            left: 0;
            right: 0;
        }

        .text-theme {
            color: #5369f8 !important;
        }

        .btn-theme {
            background-color: #5369f8;
            border-color: #5369f8;
            color: #fff;
        }

        .newRow {
            width: 100%;
            display: table;
        }

        .newRow .col-xl-10 {
            display: table-cell;
            vertical-align: middle;
            float: none
        }
    </style>

</head>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include("database/conn.php");
    $sql = "INSERT INTO users "
        . "VALUES ('" . $_POST["usernamep"] . "', '" . $_POST["dob"] . "', '" . $_POST["emailp"] . "', '" . $_POST["passwordp"] . "', '" . $_POST["gender"] . "',0)";

    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION["username"] = $_POST["usernamep"];
        $_SESSION["password"] = $_POST["passwordp"];
        $_SESSION["gender"] =   $_POST["gender"];

        $username = $_POST["usernamep"];
        $to = $_POST["emailp"];

        $subject = "Thanks for Signing Up on Cinema In A Shell";
        
        $body = "
        <html>
        <head>
        <title>Thank You</title>
        </head>
        <body>
        <center>
        <h1>Thanks for Signing Up on Cinema In A Shell</h1>
        </center>
        <p>Hi $username, This is automated email send from CinemaInAShell team so dont reply to this email.<br>
        Thanks for signing up on CinemaInAShell.<br>Thanks,<br>
        CinemaInAShell Team</p>
        
        </body>
        </html>
        ";
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: CinemaInAShell Team' . "\r\n";
        $headers .= 'Cc: cinemainashell@gmail.com' . "\r\n";
        
        mail($to, $subject, $body, $headers);

        header("Location: index.php");
    } else {
        echo "<script>alert('username or email already taken');</script>";
    }
}

?>


<body class="w3-theme-l5">
    <div id="main-wrapper" class="container full">
        <div class="row newRow full justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div>
                                        <h3 class="h4 font-weight-bold  ">Register</h3>
                                    </div>
                                    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <div class="form-group">
                                            <label for="usernamep">Username</label>
                                            <input type="text" class="form-control" name="usernamep" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="emailp">Email address</label>
                                            <input type="email" class="form-control" name="emailp" required/>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <label for="dob">Date of Birth:</label>
                                            <input type="date" class="form-control" name="dob" placeholder="Date of Birth" required>
                                        </div>

                                        <fieldset class="border p-2">
                                            <legend for="gender w-auto" style="width: auto !important;font-size: 1rem;">Gender</legend>
                                            <div class="px-3">
                                            <input type="radio" id="Male" name="gender" value="Male">
                                            <label for="Male">Male</label><br>
                                            <input type="radio" id="Female" name="gender" value="Female">
                                            <label for="Female">Female</label><br>
                                            <!-- <input type="radio" id="Others" name="gender" value="Others">
                                            <label for="Others">Others</label> -->
                                            </div>
                                        </fieldset><br>

                                        <div class="form-group">
                                            <label for="passwordp">Password</label>
                                            <input type="password" class="form-control" id="actualpassword" name="passwordp" onchange='check_pass();' required/>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="cpassword">Confirm Password</label>
                                            <input type="password" class="form-control" id="cpassword"  onchange='check_pass();' required>
                                            <span id='message'></span>

                                        </div>
                                        <button type="submit" id="submit" class="w3-button w3-theme-d2">Sign up</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <h1 class="text-white mb-4">Cinema in a Nutshell</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
                <p class="text-muted text-center mt-3 mb-0">Already have an account? <a href="login.php" class="text-primary ml-1">login</a></p>
                <!-- end row -->
            </div>
            <!-- end col -->
        </div>
        <!-- Row -->
    </div>
    <script>
        function check_pass() {
            console.log("check_pass");
            if (document.getElementById('actualpassword').value ==
                    document.getElementById('cpassword').value) {
                document.getElementById('submit').disabled = false;
            } else {
                document.getElementById('submit').disabled = true;
            }
        }
    </script>
</body>

</html>

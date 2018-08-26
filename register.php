<?php
    // Include config file
    require_once 'config.php';

    // Define variables and initialize with empty values
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate username
        if(empty(trim($_POST["username"]))){
            $username_err = "<a class='rosso'>Please enter a username.</a>";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE username = ?";

            if($stmt = $mysqli->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_username);

                // Set parameters
                $param_username = trim($_POST["username"]);

                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // store result
                    $stmt->store_result();
                    $userdir2 ='./store/' . $_POST["username"];
                    mkdir($userdir2, 0777, true);


                    if($stmt->num_rows == 1){
                        $username_err = "<a class='rosso'>This username is already taken.</a>";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "<a class='rosso'>Oops! Something went wrong. Please try again later.</a>";
                }
            }

            // Close statement
            $stmt->close();
        }

        // Validate password
        if(empty(trim($_POST['password']))){
            $password_err = "<a class='rosso'>Please enter a password.</a>";
        } elseif(strlen(trim($_POST['password'])) < 6){
            $password_err = "<a class='rosso'>Password must have atleast 6 characters.</a>";
        } else{
            $password = trim($_POST['password']);
        }

        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "<a class='rosso'>Please confirm password.</a>";
        } else{
            $confirm_password = trim($_POST['confirm_password']);
            if($password != $confirm_password){
                $confirm_password_err = "<a class='rosso'>Password did not match.</a>";
            }
        }

        // Check input errors before inserting in database
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

            // Prepare an insert statement
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

            if($stmt = $mysqli->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("ss", $param_username, $param_password);

                // Set parameters
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Redirect to login page
                    header("location: login.php");
                } else{
                    echo "<a class='rosso'>Something went wrong. Please try again later.</a>";
                }
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $mysqli->close();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <?php include './include/stylesheet.php'; ?>
        <link rel="icon" href="./dist/img/favregister.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="./dist/img/favregister.ico" type="image/x-icon"/>
        <style type="text/css">
            body{ font: 14px sans-serif; }
            .wrapper{ width: 350px; padding: 20px; }

            .rosso{
                color:#FF1D15;
            }
            .arancione{
                color:#FF1D15;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <center>
                <div class="wrapper">
                    <div class="jumbotron">
                        <h2>Sign Up</h2>
                        <p>Please fill this form to create an account.</p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label>Username</label>
                                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                                <span class="help-block"><?php echo $username_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <input type="reset" class="btn btn-default" value="Reset">
                            </div>
                            <p>Already have an account? <a href="login">Login here</a>.</p>
                        </form>
                    </div>
            </center>
            </div>
        </div>
    </body>
</html>

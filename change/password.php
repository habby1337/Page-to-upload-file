<?php
    // Initialize the session
    require_once '../config.php';
    session_start();


    // If session variable is not set it will redirect to login page
    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=login\">";
        exit;
    }

    /*declare some varible*/
    $userdir ='./store/' . $_SESSION['username']; //used to know where to store file
    $username = $_SESSION['username']; //used to the message "Welcome $name"



     // Define variables and initialize with empty values
     $curpassword = $newpassword = $confnewpassword = "";
     $curpassword_err = $newpassword_err = $confnewpassword_err = $login_err ="";

   // Processing form data when form is submitted
   if($_SERVER["REQUEST_METHOD"] == "POST"){

    //check if current pw is empty
    if(empty(trim($_POST["currpw"]))){
        $curpassword_err = "Please enter the current password.";
    }else{

        $curpassword = $_POST["currpw"];
        
    }

    
    // Check if password is empty
    if(empty(trim($_POST['newpw']))){
        $newpassword_err = 'Please enter your password.';
    } else{
        $newpassword = $_POST['newpw'];
    }

  // Check if password is empty
    if(empty(trim($_POST['confnewpw']))){
        $confnetpassword_err = 'Please enter your password.';
    } else{
        $confnewpassword = $_POST['confnewpw'];
    }
       }


        //confronto le password
        if($newpassword != $confnewpassword){
            $confnewpassword_err = "Le nuove password non corrispondono!";
        }else{
            $confnewpassword_err = "Le nuove password corrispondono!";

            //vedo se la currpw è vera
            // Validate credentials
        if(empty($login_err) && empty($login_err)){
            // Prepare a select statement
            $sql = "SELECT username, password FROM users WHERE username = ?";

            if($stmt = $mysqli->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_username);

                // Set parameters
                $param_username = $username;



                
                

                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Store result
                    $stmt->store_result();

                    // Check if username exists, if yes then verify password
                    if($stmt->num_rows == 1){
                        // Bind result variables
                        $stmt->bind_result($username, $hashed_password);
                        if($stmt->fetch()){
                            if(password_verify($curpassword, $hashed_password)){
                                /* Password is correct, so start a new session and
                                save the username to the session */
                                
                                $hashed_newpassword = password_hash($newpassword, PASSWORD_DEFAULT); // Creates a password hash
                                $login_err = "all ok";
                               $query = "UPDATE users SET password = '$hashed_newpassword' WHERE username = '$username';";
                               
                               /*INSERT INTO users (password) SELECT username FROM users WHERE username = ($username);*/
                                

                                if(mysqli_query($mysqli, $query)) {
                                   
                                    echo "Successfully inserted " . mysqli_affected_rows($mysqli) . " row";
                                   
                                    } else {
                                  
                                    echo "Error occurred: " . mysqli_error($mysqli);
                                 
                                    }
                               
                               
                            } else{
                                // Display an error message if password is not valid
                                $login_err = 'The password you entered was not valid.';
                            }
                        }
                    } else{
                        // Display an error message if username doesn't exist
                        $login_err = 'No account found with that username.';
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $mysqli->close();


    }
       echo "Errore:";
       print ($login_err);
       echo "<br>"; 
       echo "Current user:";
       print ($username);
       echo "<br>";
       echo "curpassword:";
       print ($curpassword);
       echo "<br>";
       echo "newpassword:";
       print ($newpassword);
       echo "<br>";
       echo "confnewpassword:";
       print ($confnewpassword);
?>

    <!DOCTYPE html>
    <html lang="it" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Change password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include '../include/links.1.php';?>
        <?php include '../include/stylesheet.1.php'?>
    </head>
    <body>
    <?php include '../include/header.1.php'; ?>


<div class="container">
<form method="post">
  <div class="form-group">
    <label for="currpw">Current Password</label>
    <input type="text" name="currpw" class="form-control" value="<?php echo $curpassword; ?>"  placeholder="Current Password">
    <span class="help-block rosso"><?php echo $curpassword_err; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" class="form-control" name="newpw" value="<?php echo $newpassword; ?>" placeholder="New Password">
    <span class="help-block rosso"><?php echo $newpassword_err; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm New Password</label>
    <input type="password" class="form-control" name="confnewpw" value="<?php echo $confnewpassword; ?>" placeholder="Confirm New Password">
    <span class="help-block rosso"><?php echo $confnewpassword_err; ?></span>
  </div>

  <input type="submit" class="btn btn-primary" value="Change">
</form>
</div>

    <?php include "../include/foo.php" ?>   
    </body>
 </html>
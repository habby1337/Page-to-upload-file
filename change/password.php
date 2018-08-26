<?php
    // Initialize the session

    session_start();


    // If session variable is not set it will redirect to login page
    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=login\">";
        exit;
    }

    /*declare some varible*/
    $userdir ='./store/' . $_SESSION['username']; //used to know where to store file
    $name = $_SESSION['username']; //used to the message "Welcome $name"



     // Define variables and initialize with empty values
     $curpassword = $newpassword = $confnewpassword ="";
     $curpassword_err = $newpassword_err = $confnewpassword_err = "";

   // Processing form data when form is submitted
   if($_SERVER["REQUEST_METHOD"] == "POST"){

    //check if current pw is empty
    if(empty(trim($_POST["currpw"]))){
        $curpassword_err = "Please enter the current password.";
    }else{

        $curpassword = $_POST["currpw"];
        
    }

    /*   
    // Check if password is empty
    if(empty(trim($_POST['newpw']))){
        $newpassword_err = 'Please enter your password.';
    } else{
        $newpassword = trim($_POST['newpw']);
    }

  // Check if password is empty
    if(empty(trim($_POST['confnewpw']))){
        $confnetpassword_err = 'Please enter your password.';
    } else{
        $confnewpassword = trim($_POST['confnewpw']);
    }*/
       }

       echo "curpassword:";
       print ($curpassword);
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
<form >
  <div class="form-group">
    <label for="curpw">Current Password</label>
    <input type="text" name="currpw" class="form-control"value="<?php echo $curpassword; ?>"  placeholder="Current Password">
    <span class="help-block rosso"><?php echo $curpassword_err; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="confirm_password" class="form-control" id="newpw"  placeholder="New Password">
    <span class="help-block rosso"><?php echo $newpassword_err; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm New Password</label>
    <input type="confirm_password2" class="form-control" id="confnewpw"  placeholder="Confirm New Password">
    <span class="help-block rosso"><?php echo $confnewpassword_err; ?></span>
  </div>

  <input type="submit" class="btn btn-primary" value="Change">
</form>
</div>

    <?php include "../include/foo.php" ?>   
    </body>
    </html>
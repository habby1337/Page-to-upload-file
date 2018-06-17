<?php
// Initialize the session
session_start();
$userdir ='./store/' . $_SESSION['username'];
?>



<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DashBoard</title>

      <!-- style sheet -->
    <link rel="stylesheet" href="dist/css/bootstrap.css">
  </head>
  <body>
    <center>
      <h1>DASHBOARD</h1>
    </center>
<div class="container">
  <div class="row">
    <div class="col-8">
<br />
<br />
<br />



<?php echo '<form action="upload.php?user=', urlencode($userdir), '/" enctype="multipart/form-data" class="btn btn-primary" method="post" enctype="multipart/form-data">' ?>
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="999000" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="userfile" class="btn btn-outline-light" type="file" />
    <input type="submit" class="btn btn-outline-light" value="Send File" />
</form>




    </div>
    <div class="col-4">
      <?php
        if ($handle = opendir($userdir)) {

            while (false !== ($entry = readdir($handle))) {

                if ($entry != "." && $entry != "..") {

                    echo "
                    <table class='table'>
                      <tbody>
                        <tr>
                          <th scope='row'>$entry\n</th>
                        </tr>
                      </tbody>
                    </table>

                    ";
                }
            }

            closedir($handle);
        }
      ?>

    </div>
  </div>

</div>
  </body>
</html>







<?php
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

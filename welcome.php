<?php
// Initialize the session
session_start();
$userdir ='./store/' . $_SESSION['username'];
?>



<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dash</title>

      <!-- style sheet -->
    <link rel="stylesheet" href="dist/css/bootstrap.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="dist/css/animazione.css" />
  </head>
  <body>
    <center>
      <h1>DASHBOARD<br /></h1>
    </center>
<div class="container">
  <div class="row">
    <div class="col-8">
<br />
<br />
<br />


<ul>
    <li><b>♥</b><a href="#"><i>29 Likes</i></a></li>
    <li><b>♫</b><a href="#"><i>2 Comments</i></a></li>
    <li><b>♡</b><a href="#"><i>design, link</i></a></li>
</ul>

<?php echo '<form action="upload.php?user=', urlencode($userdir), '/" enctype="multipart/form-data"  method="post" enctype="multipart/form-data">' ?>
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="999000" />
    <!-- Name of input element determines name in $_FILES array -->
    <input name="userfile" class="btn btn-primary" type="file" />



      <button type='submit' class="btn btn-primary "  >Send it! </button><span class=""><b class="fas fa-plane"></b></span>




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
                }else if(is_dir_empty($userdir)){
                  echo "Empty Folder ";
                }
            }


            closedir($handle);
        }

        function is_dir_empty($userdir){
          if(!is_readable($userdir)) return null;
          return (count(scandir($userdir)) == 2);
        }
      ?>

    </div>
  </div>

</div>
  </body>
</html>







<?php
// If session variable is not set it will redirect to login page
/*if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}*/
?>

<?php
    // Initialize the session
    include './include/fonts.php';
    session_start();
    $userdir ='./store/' . $_SESSION['username'];
    $name = $_SESSION['username'];
    ?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
    <head>
                            <meta charset="utf-8">
        <title>DashBoard</title>
                                      <?php include './include/stylesheet.php' ?>
    </head>
    <body>
        <center>
            <h1>DASHBOARD<br /></h1>
        </center>
                     <div class="container">
            <div class="row">
                <div class="col-8">
                    <h3>Benvenuto <?php echo "$name"; ?>.</h3>
                                <br />
                    <br />
                    <br />
                    <?php echo '<form action="upload.php?user=', urlencode($userdir), '/" enctype="multipart/form-data"  method="post" enctype="multipart/form-data">' ?>
                    <!-- MAX_FILE_SIZE must precede the file input field -->
                               <input type="hidden" name="MAX_FILE_SIZE" value="999000" />
                    <!-- Name of input element determines name in $_FILES array -->
                    <input name="userfile" class="btn btn-primary" type="file" />
                    <button type='submit' class="btn btn-primary "  >Send it! </button> ?TODO sistemare l'icona
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
    if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
      header("location: login.php");
      exit;
    }
    ?>

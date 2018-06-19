<?php
    // Initialize the session

    session_start();
    $userdir ='./store/' . $_SESSION['username'];
    $name = $_SESSION['username'];
    ?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>DashBoard</title>
        <?php include './include/links.php';?>
        <?php include './include/stylesheet.php'?>
        <style>
            h1,h2,h3{font-family: 'Nunito', sans-serif;}
            th{font-family: 'Exo 2', sans-serif;}
            body{font-family: 'Quicksand', sans-serif;}
        </style>
    </head>
    <body>
        <?php include './include/header.php'; ?>
        <center>
            <h1>DASHBOARD<br /></h1>
        </center>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <br />
                    <br />
                    <br />
                    <div class="jumbotron">
                        <h3 class="display-5">Welcome <?php echo "$name"; ?>.</h3>
                        <hr class="my-4">
                        <p class="lead">
                            <?php echo '<form action="upload.php?user=', urlencode($userdir), '/" enctype="multipart/form-data"  method="post" enctype="multipart/form-data">' ?>
                            <!-- MAX_FILE_SIZE must precede the file input field -->
                            <input type="hidden" name="MAX_FILE_SIZE" value="999000" />
                            <!-- Name of input element determines name in $_FILES array -->
                            <input name="userfile" class="btn btn-primary" type="file" />
                        <hr class="my-4">
                        <!-- <p></p> -->
                        <button type="submit" class="btn btn-primary btn-lg"  >Send it! </button> ?TODO sistemare l'icona
                        </form>
                    </div>
                </div>
                <!--Closing col-8-->
                <div class="col-4">
                    <br />
                    <br />
                    <br />
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <form method="post">
                                    <button class="btn btn-primary btn-lg" type="submit" name="test" id="test">Refresh</button>
                                </form>
                            </center>
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
                                        } elseif (is_dir_empty($userdir)) {
                                            echo "Empty Folder ";
                                            exit;
                                        }
                                    }




                                    closedir($handle);
                                }

                                function is_dir_empty($userdir)
                                {
                                    if (!is_readable($userdir)) {
                                        return null;
                                    }
                                    return (count(scandir($userdir)) == 2);
                                }


                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if(array_key_exists('listdir',$_POST)){
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
                } elseif (is_dir_empty($userdir)) {
                    echo "Empty Folder ";
                    exit;
                }
            }




            closedir($handle);
        }

        function is_dir_empty($userdir)
        {
            if (!is_readable($userdir)) {
                return null;
            }
            return (count(scandir($userdir)) == 2);
        }
    }


        // If session variable is not set it will redirect to login page
        if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
            header("location: login.php");
            exit;
        }
        ?>

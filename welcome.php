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
    $maxupload = "999"; //max file size


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
            .rotate {
            display: inline-block;/* mandatory to be able to use transform */
            transition: 1s all;
            color: #EF2B5C;
            }
            #rotazione:hover .rotate {
            transform: rotate(180deg);
            color:#60A561 ;
            }
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
                            <!-- post in the url the directory(store/user) of the user -->
                            <?php echo '<form action="upload.php?user=', urlencode($userdir), '/" enctype="multipart/form-data"  method="post" enctype="multipart/form-data">' ?>
                            <!-- MAX_FILE_SIZE must precede the file input field -->
                            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo '$maxupload'; ?>" />
                            <!-- Name of input element determines name in $_FILES array -->
                            <input name="userfile" class="btn btn-primary" type="file" />
                        <hr class="my-4">
                        <div id="rotazione">
                            <button type="submit" class="btn btn-primary btn-lg "  >Send it!&nbsp;
                            <span class="rotate"><a class="fas fa-thumbs-down" ></a></span>
                            </button>
                        </div>
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
                                <br />
                            </center>
                            <?php
                                $countershowfile = 0; //Initialize the counter for the directory
                                $countermaxshowfile = 4; //max file shown (add -1 like: 10 -> 9, 20 -> 19 etc..)
                                    /*Check if the directory is empty or has file */
                                    /*and if is not empty show the file inside*/
                                        if ($handle = opendir($userdir)) {
                                            while (false !== ($entry = readdir($handle))) {
                                                if ($entry != "." && $entry != "..") {
                                                    if ($countershowfile <= $countermaxshowfile) {
                                                        $countershowfile++;
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

                                                } elseif (is_dir_empty($userdir)) {
                                                    echo "Empty Folder ";
                                                    exit;
                                                }
                                            }



                                            echo "5 item shown. for the whole list <a href='allfile'>click here</a>";
                                            closedir($handle);
                                        }
                                        /*function to know if the directory has file inside*/
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
            <?php include "./include/foo.php" ?>
        </div>
    </body>
</html>
<?php
    /*Chack if the user click the button refresh and refresh the directory array*/
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



            ?>

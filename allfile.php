<?php
session_start();
 /*declare some varible*/
$userdir ='./store/' . $_SESSION['username']; //used to know where to store file
?>

<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ALL FILE</title>
    <?php include './include/links.php';?>
    <?php include './include/stylesheet.php'?>
  </head>
  <body>
  <?php include './include/header.php'; ?>
  <div class="container">
          <div class="row">
              <div class="col-8">
</div>
<?php
                  /*Check if the directory is empty or has file */
                  /*and if is not empty show the file inside*/
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

  <?php include "./include/foo.php" ?>
  </div>
  </body>
</html>

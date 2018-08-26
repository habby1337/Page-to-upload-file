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


    ?>
    <!DOCTYPE html>
    <html lang="it" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Change password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include './include/links.1.php';?>
        <?php include './include/stylesheet.1.php'?>
    </head>
    <body>
    <?php include './include/header.1.php'; ?>


    <?php include "./include/foo.php" ?>   
    </body>
    </html>
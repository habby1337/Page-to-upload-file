<?php
    /*function myUrlEncode($string) {
        $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
        $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
        return str_replace($entities, $replacements, urlencode($string));
    }*/

    $dirupload = $_GET['user'];
    $dirupload = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode($dirupload));
    $dirupload = html_entity_decode($dirupload,null,'UTF-8');




    $uploadfile = $dirupload . basename($_FILES['userfile']['name']);
     include './include/links.php';
     include './include/stylesheet.php';

     if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
         $respond = "File is valid, and was successfully uploaded.\n";
         $result = "uploaded";
     } else {
         $respond = "Possible file upload attack!\n";
         $result = "not uploaded";
     }
    echo "

     <!DOCTYPE html>
     <html lang='it' dir='ltr'>
       <head>
         <meta charset='utf-8'>
         <title>Upload</title>
         <style>
             h1,h2,h3{font-family: 'Nunito', sans-serif;}
             th{font-family: 'Exo 2', sans-serif;}
             body{font-family: 'Quicksand', sans-serif;}
         </style>
       </head>
       <body>";
       include './include/header.php';
       echo "
       <div class='container'>
       <div class='jumbotron'>
         <h1 class='display-5'>File $result in -> $dirupload</h1>
         <p class='lead'>$respond</p>
         <hr class='my-4'>
         <p>now you can go back to the previous page.</p>
         <button class='btn btn-primary btn-lg'  onclick='window.history.go(-1); return false;' >Go back!</button>

       </div>

     </div>
       </body>
     </html>
     ";


    echo 'Here is some more debugging info:';
    echo "<pre>";
    print_r($_FILES);

    print "</pre>";



    ?>

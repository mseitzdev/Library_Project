<?php 

/*
  Header for the program. Forces secure connection & logs into server.

  Programmed by Mitchell Seitz, 2024
*/

// make sure the page uses a secure connection - Forces secure connection on all pages, as header is included everywhere. 
$https = filter_input(INPUT_SERVER, 'HTTPS'); 
if (!$https) {
    $host = filter_input(INPUT_SERVER, 'HTTP_HOST'); 
    $uri = filter_input(INPUT_SERVER, 'REQUEST_URI'); 
    $url = 'https://' . $host . $uri; header("Location: " . $url); 
    exit();
} 

session_start();

//getting the document root - NOTE -> The php docuemnt root appears to be different from the HTML document root? 
$document_root = $_SERVER['DOCUMENT_ROOT'];

//test code, enable when lining up filesystem.
/*
echo $document_root;
*/

//Database Login Info
$dsn = 'mysql:host=localhost;dbname=books_database'; 
$username = 'books'; 
$password = 'PrincessIrulanGoAway';

//now we try and access the database
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Error, could not log in to database";
}

?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>

    <title> Books Inventory Project - Mitchell Seitz</title>

    <style>
        /*Linking in the main.css style file for non - header portions*/
        <?php include $document_root . '/res/main.css' ; ?>
    </style>

</head>

<!-- starting the body -->
<body>

<!-- the header section -->
<header style="display: flex; z-index: 1;">

   <!-- menu button --> 
   <?php include $document_root . '/res/menu.php'; ?> 
    
    <!-- Div to surround the logo and link -->
    <div class="homeLogo"> 
        <!-- website logo inside link to home -->
        <a href="/index.php"> 
            <img src="/res/msportlogo.png" class="logo"> 
        </a>
    </div>

</header>

<!--
<div id="particles-js"> </div>
<script type="text/javascript" src="/res/particles/particles.js"></script>
<script type="text/javascript" src="/res/particles/app.js"></script>
-->

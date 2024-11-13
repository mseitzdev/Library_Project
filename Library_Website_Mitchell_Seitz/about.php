<!-- 

About.php

Programmed by Mitchell Seitz, Nov 13 2024. 

-->

<?php 

//inclding program header, forces secure connection.
include 'res/header.php'; 

?>

<main class="information">
    
    <!-- Home page -->
    <div class="mainbox">

        <h1 class="pagetitle">About</h1><br>
        
        <p>
            
            <p style="text-align: left;">
            My name is Mitchell Seitz, and this is my submission for the Second Bind Software Development Challenge 
            This is a basic inventory management system for a library. This website consists of four pages:<br> <br>
            The <a href="index.php"> Home Page </a>, which allows users to sort the book inventory and export them if needed, <br>
            The <a href="search.php"> Search Page</a>, which allows users to search books by title, author, and more, as well as export search results if needed, <br>
            The <a href="addBook.php"> Add Book Page </a>, which allows users to add new books to the inventory, <br>
            The <a href="index.php"> About page </a>, which is what you see here.<br>
            </p>
            <br>
            To see more of what I can do, please see <a href="https://www.mseitz.dev"> my portfolio </a>
            and <a href="https://github.com/mseitzdev"> my github </a>, 
            or email me at <a href="mailto:mseitz@mseitz.dev"> mseitz@mseitz.dev </a>
  
        </p>

    </div>

</main>

<?php 
//including footer 
include 'res/footer.php'; 
?>
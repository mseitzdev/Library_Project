<!-- 

addBook.php

Programmed by Mitchell Seitz, Nov 13 2024. 

This page adds new books to the database.

-->

<?php 

//inclding program header, forces secure connection.
include 'res/header.php'; 

//getting input information
$action = filter_input(INPUT_POST, 'action');
$title = filter_input(INPUT_POST, 'Title');
$author = filter_input(INPUT_POST, 'Author');
$genre = filter_input(INPUT_POST, 'Genre');
$publicationDate = filter_input(INPUT_POST, 'PublicationDate');
$ISBN = filter_input(INPUT_POST, 'ISBN');

//Show error or success Message
$actionError = "";
$actionSuccess = "";
$cont = TRUE;

//if the user wants to try adding a book, attempt here.
if($action == 'addBook'){
    
    //checking for issues with formatting 
    if(strlen($title) < 1 || strlen($title) > 50){
        $actionError .= "Title must be between 1 and 50 digits <br>";
        $cont = FALSE;
    }
    if(strlen($author) < 1 || strlen($author) > 50){
        $actionError .= "Author name must be between 1 and 50 digits <br>";
        $cont = FALSE;
    }
    if(strlen($genre) < 1 || strlen($genre) > 50){
        $actionError .= "Genre must be between 1 and 50 digits <br>";
        $cont = FALSE;
    }
    /*
    checking date 
    
    Roughly based on:
    https://stackoverflow.com/questions/19271381/correctly-determine-if-date-string-is-a-valid-date-in-that-format
    */
    $d = DateTime::createFromFormat('Y-m-d', $publicationDate);
    if($d == Null){
        $actionError .= "Date must be in format 'YYYY-MM-DD' <br>";
        $cont = FALSE;
    }
    if(strlen($ISBN) != 10){
        $actionError .= "ISBN must be 10 digits in format: DDDDDDDDDD <br>";
        $cont = FALSE;
    }

    //if no issues are found, we attempt to add to the database.
    if($cont == TRUE){
        try{

        //now, we try and add an order to the database with the given information.
        $query = "INSERT INTO Inventory
                  SET Title = :Title, Author = :Author, Genre = :Genre, 
                      PublicationDate = :PublicationDate, ISBN = :ISBN";
        $statement = $db->prepare($query);
        $statement->bindValue(":Title", $title); 
        $statement->bindValue(":Author", $author); 
        $statement->bindValue(":Genre", $genre);
        $statement->bindValue(":PublicationDate", $publicationDate);
        $statement->bindValue(":ISBN", $ISBN);
        $statement->execute();
        $statement->closeCursor();

        //success message toggle
        $actionSuccess = "Book added! Check Catalog.";

        }catch (Exception $e){
            //error toggle 
            $actionError .= "Database Error.";
        }
    }
    
}

?>

<main class="information">
    
    <!-- Home page -->
    <div class="mainbox">

        <h1 class="pagetitle">Add Book</h1>
        
        <h3 style="color: red;"><?php echo $actionError; ?></h3> 
        <h2 style="color: green;"><?php echo $actionSuccess; ?></h2> <br>

        <p>
             
        <!-- Customer information form, contains relevant info about customer echoed from the session-->
        <form action="addBook.php" method="post">

            <input type="hidden" name="action" value="addBook">

            <label > Title: </label>
            <input type='text' name = 'Title' value="<?php echo $title; ?>" > <br><br>

            <label > Author: </label>
            <input type='text' name = 'Author' value="<?php echo $author; ?>" ><br><br>

            <label > Genre: </label>
            <input type='text' name = 'Genre' value="<?php echo $genre; ?>" ><br><br>

            <label > Publication Date (YYYY-MM-DD) : </label>
            <input type='text' name = 'PublicationDate' value="<?php echo $publicationDate; ?>" ><br><br>

            <label > ISBN (10-Digit) : </label>
            <input type='text' name = 'ISBN' value="<?php echo $ISBN; ?>" ><br><br>
            
            <input type="submit" name="edit" value="Add Book" class="formButton" >

        </form>
        <br>
  
        </p>

    </div>

</main>

<?php 
//including footer 
include 'res/footer.php'; 
?>
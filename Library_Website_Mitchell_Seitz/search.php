<!-- 

search.php

Programmed by Mitchell Seitz, Nov 13 2024. 

This page forms the catalog for our books.

-->

<?php 

//inclding program header, forces secure connection.
include 'res/header.php'; 

//getting input information
$action = filter_input(INPUT_POST, 'action');
$searchBy = "'%" . filter_input(INPUT_POST, 'searchBy') . "%'";
$column = filter_input(INPUT_POST, 'column');

//test code.
//echo $action . " " . $searchBy . " " . $column ;

$books; //books array holds the books 
$hide = 'hidden'; //this toggles wether or not he show the table and download button.

//getting books from the database
if ($action == 'Search'){  
    //getting our books by title
    try{

      //loading in our products
      $query = "SELECT * FROM Inventory WHERE " . $column . " LIKE " . $searchBy. ";"; 
      $statement = $db->prepare($query); 
      $statement->execute();
      $books = $statement->fetchAll(); 
      $statement->closeCursor();

      $hide = '';

    }catch (Exception $e) {
        echo "Error loading books;";
    }
}

/*
encode into JSON and store in session in case download is requested.

Based on:
https://github.com/karolispx/php-generate-json-file/blob/master/generate-json.php
https://www.geeksforgeeks.org/php-json-pretty-print/

*/
$_SESSION["json"] = json_encode($books, JSON_PRETTY_PRINT);
$_SESSION["fileName"] = "_search_results";

?>

<main class="information">
    
    <!-- Home page -->
    <div class="mainbox">

        <h1 class="pagetitle">Search the library</h1>

        <!-- Search Form  -->
        <form action="search.php" method="post" style="display: inline-block;"> 
            <input type='text' name = 'searchBy' value="Search by.." style="width: 80%; padding: 12px 20px; display: inline;" >
            <select name="column" style=" padding: 12px 20px; display: inline;" class="formButton">
                <option value="Title"> Search by Title</option> 
                <option value="EntryID"> Search by EntryID</option> 
                <option value="Author"> Search by Author</option> 
                <option value="Genre"> Search by Genre</option> 
                <option value="PublicationDate"> Search by Publication Date</option> 
                <option value="ISBN"> Search by ISBN</option> 
            </select>
            <input type="submit" name='action' value="Search" class="formButton" style=" padding: 12px 20px; display: inline;" >
        </form>
        <br><br>

        <p>

        <!-- Download button -->
        <form action="download.php" target="_blank" method="post" style="display: inline-block;"> 
            <input type="submit" name='action' value="Download search results as JSON" class="formButton" <?php echo $hide; ?>>
        </form>
        <br>

        <!-- Table for our results -->
        <div style="display: inline-block; overflow-x: auto; overflow-x: scroll; max-width: 100%;">
        <table <?php echo $hide; ?>>
            <tr>
                <th>Entry ID<br><br></th>
                <th>Title<br><br></th>
                <th>Author<br><br></th>
                <th>Genre<br><br></th>
                <th>Publication Date<br><br></th>
                <th>ISBN<br><br></th>
            </tr>
                <?php 
                    //getting each of our products as a list item
                    foreach ($books as $book) {  
                        ?> 
                        <tr>
                            <td>

                                <?php 
                                    //Book ID
                                    echo $book['EntryID'] ;
                                ?>
                            </td> 
                            <td>
                                <?php 
                                   //Title
                                   echo $book['Title']; 
                                ?>
                            </td> 
                            <td >
                                <?php 
                                    //Author 
                                   echo $book['Author']; 
                                ?>
                            </td>
                            <td >
                                <?php
                                    //Genre
                                   echo $book['Genre']; 
                                ?>
                            </td>  
                            <td >
                                <?php 
                                    //Publication Date
                                   echo $book['PublicationDate']; 
                                ?>
                            </td>
                            <td >
                                <?php
                                    //ISBN
                                   echo $book['ISBN']; 
                                ?>
                            </td>  
                        </tr>
                        <?php } 
                ?> 
            
        </table>
        </div>
        </p>

    </div>

</main>

<?php 
//including footer 
include 'res/footer.php'; 
?>
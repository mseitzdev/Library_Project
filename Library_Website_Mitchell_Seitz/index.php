<!-- 

index.php

Programmed by Mitchell Seitz, Nov 13 2024. 

This page forms the catalog for our books.

-->

<?php 

//inclding program header, forces secure connection.
include 'res/header.php'; 

//getting input information
$action = filter_input(INPUT_POST, 'action');//getting the action

$sortedBy = "EntryID";//default sort by EntryID

$books; //books array holds the books 

//selecting sort if need be
if ($action != NULL){
    //this holds what the books are sorted by  
    $sortedBy = str_replace(' ', '', substr($action,8));
}

//getting our books by sort criteria
try{

  //loading in our products
  $query = "SELECT * FROM Inventory ORDER BY " . $sortedBy . ";"; 
  $statement = $db->prepare($query); 
  $statement->execute();
  $books = $statement->fetchAll(); 
  $statement->closeCursor();

}catch (Exception $e) {
    echo "Error loading books;";
}

/*
encode into JSON and store in session in case download is requested.
*/
$_SESSION["json"] = json_encode($books, JSON_PRETTY_PRINT);
$_SESSION["fileName"] = "_by_" . $sortedBy;

?>

<main class="information">
    
    <!-- Home page -->
    <div class="mainbox">

        <h1 class="pagetitle">Library Inventory</h1>

        <!-- Sort Buttons -->
        <form action="index.php" method="post" style="display: inline-block;"> 
        <input type="submit" name='action' value="Sort By EntryID" class="formButton" >
        <input type="submit" name='action' value="Sort By Title" class="formButton" >
        <input type="submit" name='action' value="Sort By Author" class="formButton" >
        <input type="submit" name='action' value="Sort By Genre" class="formButton">
        <input type="submit" name='action' value="Sort By Publication Date" class="formButton">
        <input type="submit" name='action' value="Sort By ISBN" class="formButton">
        </form>
        
        <!-- Download button -->
        <form action="download.php" target="_blank" method="post" style="display: inline-block;"> 
            <input type="submit" name='action' value="Download sorted list as JSON" class="formButton">
        </form>
        <br>

        <p>
        <!-- Table for our results -->
        <div style="display: inline-block; overflow-x: auto; overflow-x: scroll; max-width: 100%;">
        <table>
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
-- Create the books database
DROP DATABASE IF EXISTS books_database;
CREATE DATABASE books_database;
USE books_database;

CREATE TABLE Inventory (
    EntryID int NOT NULL AUTO_INCREMENT UNIQUE,
    Title varchar(50) NOT NULL,
    Author varchar(50) NOT NULL,
    Genre varchar(50) NOT NULL,
    PublicationDate date NOT NULL,
    ISBN varchar(10) NOT NULL,
    PRIMARY KEY (EntryID)
);

INSERT INTO Inventory VALUES 
(111, "A Student's Guide to Internships", "Bob Bobson", "Self-Help", '2008-11-11', "0123456789"),
(112, "Thar She Blows: A Whaler's guide to Whalin'", "Captain Dirtbeard", "Self-Help", '1808-11-11', "1123456789"),
(113, "Books For Books", "Robert Maull", "Librarian Resources", '2011-11-11', "1111111111"),
(114, "A book about Jane", "Jane Austen", "Autobigoraphy", '2000-11-11' , "222222222"),
(115, "A Hitchhiker's Guide to the Galaxy", "Douglass Adams", "Sci-fi", '2008-11-11', "01234512345"),
(116, "Dune", "Frank Herbert", "Sci-fi", '1978-11-11', "0987654321"),
(117, "Dune Messiah", "Frank Herbert", "Sci-fi", '1982-11-11', "0000011111"),
(118, "Blindsight", "Peter Watts", "Sci-fi", '2010-11-11' , "1212121212"),
(119, "A Hitchhiker's Guide to the Galaxy", "Douglas Adams", "Sci-fi", '2008-11-11', "01234512345"),
(120, "Lord of the Rings", "J.R.R Tolkein", "Fantasy", '1958-11-11', "3333333333"),
(121, "Practical Wombat Husbandry", "Marneus Calgar", "Pets", '1982-11-11', "0111111111"),
(122, "WAAAGH", "Ghazkull Mag Uruk Thrakka", "Self-Help", '2010-11-11' , "09090909090");

-- Create a user 
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO books@localhost
IDENTIFIED BY 'PrincessIrulanGoAway';
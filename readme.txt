Coding Project - Second Bind Software Development Challenge

Created by Mitchell Seitz, Nov 2024

____________________________________________________________________________________________

Description:

This is my version of the second bind software development challenge. 
This program consists of a MySQL Database and basic website. I based this
project off of my developer portfolio, www.mseitz.dev, and my previous project,
the Computer Science Student Store, https://github.com/mseitzdev/CSS_Store. 

This is a simle and easy to use LAMP site, and will be tested and developed 
using XAMPP 8.2.4-0 on a Macbook Air. 

____________________________________________________________________________________________

Software Requirements for installation: 

XAMPP Version 8.2.4-0 

	This XAMPP Version Contains:

	PHP 8.2.4, 8.1.17 or 8.0.28
	Apache 2.4.56
	MariaDB 5.4.28
	phpMyAdmin 5.2.1
	OpenSSL 1.1.1t

Built and tested with Firefox 132.0.2 (aarch64) on macOS 15.0.1
____________________________________________________________________________________________

Installation Instructions:

Please ensure that XAMPP is installed on your machine. I used XAMPP 8.2.4-0 on macOS 15.0.1, 
however this website should likely be compatible with other operating systems and XAMPP 
versions/server stacks. 

Make sure that all three servers inside of XAMPP are running. To do this, open XAMPP and go 
to the "manage servers" tab, and press the "Start All" button. This should start MySQL 
database, proFTPD, and Apache web server. Once you see they are all running, you can 
move on to the next step.

Once your servers are running, open up your web browser of choice and go to 
https://localhost/phpmyadmin.

From here, go to the "Import" tab, and select the file books_database.sql from the 
submission folder as the file to import. Click the import button at the bottom
of the screen, and the file will import it's contents. 

Next, find your XAMPP hosting folder. For me, it was /Applications/XAMPP/xamppfiles/htdocs
on macOS, but may be different on other operating systems. Copy/paste the contents of the 
'Library_Website_Mitchell_Seitz' folder from the assignment submission folder into this 
directory. 

Finally, you can enter https://localhost/ into the web 
browser of your choice and see the website. if all goes well, you will be greeted with 
the welcome screen.
____________________________________________________________________________________________

File Structure and Description:

books_database.sql - This is the database file for this program. Contains the Inventory table, 
                     login information, and books in the inventory. 

Library_Website_Mitchell_Seitz (Folder) - Main folder, contains program files.

	index.php - This is the main page of the program, and contains a list of all the books 
	            in the library. The list can be sorted by Author, Title, Genre, ISBN, and
	            Publication Date. In addition, there is a button that allows the sorted 
	            Inventory list to be downloaded as a JSON file. List is stored in the 
	            session to be pulled out by the download.php program if desired.

    search.php - This page is similar to the index page, but allows the user to search by 
                 various characteristics of the books. Also allows the search results to 
                 be pulled out and downloaded by download.php

    addBook.php - This page allows for the user to add new books to the database. Errors
                  will show if addition is unsucessful. 

    about.php - Simple about page with links to my other media.

    download.php - This allows the users to download the sorted lists and search results. It 
                   pulls the list information out of the session, turns it into JSON, and 
                   downloads on the client machine. 

	errorPage.php - This page is the error page for the program, and will be redirected to if
                    operations such as database access fail. 

	res (Folder) - This is the folder containing elements that are constant on every page. 

		menu.php - This is the menu program, which constructs a menu using JavaScript, PHP, 
                   HTML, and CSS. 

		main.css - This file contains the CSS for the program. 

		header.php - This file contains the header data, including buttons and menu display. 
		             Logs us into the database using the login credentials, as well as
                     forcing a secure connection on all pages..

		footer.php - This file contains the footer.

____________________________________________________________________________________________
<?php 

// This file contains the database access information. 
// This file establishes a connection to MySQL and selects the database.

// Set the database access information as constants:
const DBCONNSTRING ='mysql:host=localhost;dbname=yourusername';
const DB_USER = 'yourusername';
const DB_PASSWORD = 'yourSQLpassword';


// Make the connection:
try{
	$dbc = new PDO(DBCONNSTRING, DB_USER, DB_PASSWORD);
	echo "Connection successful"; /*Delete once working */
} catch (PDOException $e){
	echo $e->getMessage();
}

?>
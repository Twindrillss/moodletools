<?php

//inserire qui i dati di connessione per il database
 
$databaseHost = '';
$databaseName = '';
$databaseUsername = '';
$databasePassword = '';
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName) or die('Could not connect the database : Username or password incorrect'); 
?>

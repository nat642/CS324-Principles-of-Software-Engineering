<?php 

 $host = "pluto.hood.edu"; 
 $dbname = "lmt18";
 $user = "lmt18";
 $pass = "password";
 
 try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 }
 catch(PDOException $e) {
die("Could not connect to the database $dbname :" . $e->getMessage()); }
?>
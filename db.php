<?php
    $host="localhost";
    $port="5432";
    $db="company";
    $username='postgres';
    $password='postgres';
    $connection = new PDO("pgsql:host=$host;port=$port;dbname=$db;user=$username;password=$password");
    try{
      if($connection){
      //echo "Connected to the <strong>$db</strong> database successfully!";
      }
     }catch (PDOException $e){
      echo $e->getMessage();
     }
?>

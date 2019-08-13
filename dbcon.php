<?php
// db connections using mysqli and PDO;

//$connect = mysqli_connect("localhost","root","","phptutdb");
try{
  $pdo = new PDO("mysql:host=localhost","root",""); // connecting to db;
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION); //setting the error mode to exception;
  echo "connected to server";


}catch(PDOException $err){
  die("Error: ". $err->getMessage());
}


?>
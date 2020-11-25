<?php

$name = $_POST['foodname'];
$price = $_POST['price']; 
$quantity = $_POST['quantity'];
$calorie = $_POST['calorie'];

$servername = "localhost";
$username = "root";
$passworddb = "";
$dbname = "restaurant";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passworddb);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO food(foodname, price, quantity, calorie)
  VALUES ('$name', '$price', '$quantity', '$calorie')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Your data has been recorded in database!";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
  echo "Wrong Data!";
}

$conn = null;

?>
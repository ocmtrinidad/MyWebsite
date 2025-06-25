<?php 

// Using localhost as we are using XAMPP local server. Use hosting provider info for online server.
$host = "localhost";
$dbname = "myfirstdatabase";
// Default XAMPP username is root & password is "". For mac users, default password is "root".
$dbusername = "root";
$dbpassword = "";

try {
  // new PDO (Php Data Objects). Creates an object that connects to database.
  // new PDO(Data Source Name, database username, database password).
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
  // For allowing error handling.
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
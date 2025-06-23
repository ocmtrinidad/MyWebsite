<?php 

// Data Source Name (dsn).
// Using localhost as we are using XAMPP local server. Use hosting provider info for online server.
$dsn = "mysql:host=localhost;dbname=myfirstdatabase";
// Default XAMPP username is root & password is "". For mac users, default password is "root".
$dbusername = "root";
$dbpassword = "";

try {
  // new PDO (Php Data Objects). Creates an object that connects to database.
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  // Error handling. Uses setAttribute() from pdo object
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
};

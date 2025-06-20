<?php 
// Pure php file does not need closing tag

// Data Source Name (dsn).
// Using localhost as we are using XAMPP local server. Use hosting provider info for online server.
$dsn = "mysql:host=localhost;dbname=myfirstdatabase";
// Default XAMPP username is root & password is "". For mac users, default password is "root".
$dbusername = "root";
$dbpassword = "";

try {
  // 3 ways to connecting to database:
  // 1) mysql connection (NOT RECOMMENDED). Has security problems.
  // 2) mysqli connection. Has improved security.
  // 3) pdo (Php Data Objects). Create an object with new PDO() that connects to database.
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  // Error handling. Uses setAttribute() from pdo object
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
};

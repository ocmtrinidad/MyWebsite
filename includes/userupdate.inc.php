<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
  $email = $_POST["email"];

  try {
    require_once "dbh.inc.php";

    $query = "UPDATE users SET username = :username, pwd = :pwd, email = :email WHERE id = 4;";

    $hashedPassword = password_hash($pwd, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashedPassword);
    $stmt->bindParam(":email", $email);

    $stmt->execute();

    $pdo = null;
    $stmt = null;

    header("Location: ../index.php");

    exit();
  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  };
} else {
  header("Location: ../index.php");
};
<?php
declare(strict_types=1);

// Model files query databases.

function getUsername($pdo, $username) {
  $query = "SELECT username FROM users WHERE username = :username;";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":username", $username);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function getEmail($pdo, $email) {
  $query = "SELECT email FROM users WHERE email = :email;";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":email", $email);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function setUser($pdo, $username, $password, $email) {
  $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";
  $stmt = $pdo->prepare($query);

  $options = [
    "cost" => 12
  ];
  $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

  $stmt->bindParam(":username", $username);
  $stmt->bindParam(":pwd", $hashedPassword);
  $stmt->bindParam(":email", $email);
  $stmt->execute();
}
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // No need to sanitize data as we are NOT outputting data into the browser.
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
  $email = $_POST["email"];

  try {
    // Links to a file.
    // Same as copy and pasting code from file to here.
    // require/ require_once throws an error while include/ include_once throws a warning.
    require_once "dbh.inc.php";

    // DO NOT just put variables into queries. Sql injection security.
    // NON NAMED PARAMETERS use ? in values to prepare query statements.
    // $query = "INSERT INTO users (username, pwd, email) VALUES (?, ?, ?);";
    // NAMED PARAMETERS use : in values to prepare query statements
    $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";

    // Sends query to database without data.
    $stmt = $pdo->prepare($query);

    // Binds user data with NAMED PARAMETERS.
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $pwd);
    $stmt->bindParam(":email", $email);

    // $stmt->execute([data]) using NON NAMED PARAMETERS.
    // Submits user data using NAMED PARAMETERS.
    $stmt->execute();

    // Closes database connection. This happens automatically but is best practice to do so early.
    $pdo = null;
    $stmt = null;

    // Sends user back to index.php.
    header("Location: ../index.php");

    // Closes script. Use die() if there is a script running.
    exit();
  } catch (PDOException $e) {
    // Terminates script and sends message.
    die("Query failed: " . $e->getMessage());
  };
} else {
  header("Location: ../index.php");
};
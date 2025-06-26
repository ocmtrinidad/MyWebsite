<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];

  try {
    require_once "./dbh.inc.php";
    // This order matters. M V C.
    require_once "./signup_model.inc.php";
    require_once "./signup_contr.inc.php";

    $errors = [];
    if (isInputEmpty($username, $password, $email)) {
      $errors["empty_input"] = "Fill in all fields!";
    };
    if (isEmailInvalid($email)) {
      $errors["invalid_email"] = "Invalid email!";
    };
    if (isUsernameTaken($pdo, $username)) {
      $errors["username_taken"] = "Username already taken!";
    };
    if (isEmailRegistered($pdo, $email)) {
      $errors["email_used"] = "Email already registered!";
    };

    require_once "../includes/configSession.inc.php";

    if ($errors) {
      // To be used in views.
      $_SESSION["errors_signup"] = $errors;
      // Data to be sent back. Not password, always re type password.
      $signupData = [
        "username" => $username,
        "email" => $email
      ];
      // To be used in views.
      $_SESSION["signup_data"] = $signupData;
      header("Location: ../index.php");
      die();
    };

    createUser($pdo, $username, $password, $email);

    header("Location: ../index.php?signup=success");

    $pdo = null;
    $stmt = null;
    die();
  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  };
} else {
  header("Location: ../index.php");
  die();
};

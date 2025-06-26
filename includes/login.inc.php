<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  try {
    require_once "./dbh.inc.php";
    require_once "./login_model.inc.php";
    require_once "./login_contr.inc.php";
    require_once "../includes/configSession.inc.php";

    $result = getUser($pdo, $username);

    $errors = [];
    if (isInputEmpty($username, $password)) {
      $errors["empty_input"] = "Fill in all fields!";
    };
    if (
      isUsernameWrong($result) ||
      !isUsernameWrong($result) && isPasswordWrong($password, $result["pwd"])
    ) {
      $errors["login_incorrect"] = "Incorrect login info!";
    };
    if ($errors) {
      $_SESSION["errors_login"] = $errors;
      header("Location: ../index.php");
      die();
    };

    // Always create new session Id when logging in.
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $result["id"];
    // Sets new session Id.
    session_id($sessionId);
    $_SESSION["last_regeneration"] = time();

    $_SESSION["user_id"] = $result["id"];
    $_SESSION["user_username"] = htmlspecialchars($result["username"]);

    $pdo = null;
    $stmt = null;

    header("Location: ../index.php?login=success");
    die();
  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  };
} else {
  header("Location: ../index.php");
  die();
};

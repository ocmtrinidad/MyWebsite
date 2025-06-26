<?php

declare(strict_types=1);

// View files display website.

function checkSignupErrors()
{
  if (isset($_SESSION["errors_signup"])) {
    // $_SESSION["errors_signup"] created in signup.inc.php.
    $errors = $_SESSION["errors_signup"];
    // Session is not needed as it is now in $errors, unset() it.
    unset($_SESSION["errors_signup"]);

    echo "<br>";

    foreach ($errors as $error) {
      echo "<p>" . $error . "</p>";
    };
    // Checks if url has ?signup=success. Not necessary success should send user to /login.
  } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
    echo "<br>";
    echo "<p>Signup success!</p>";
  };
}

function signUpInputs()
{
  // Checks if a username is sent, and username is not already taken. 
  if (
    isset($_SESSION["signup_data"]["username"]) &&
    !isset($_SESSION["errors_signup"]["username_taken"])
  ) {
    echo '<input type="text" name="username" placeholder="Username" value="' . $_SESSION["signup_data"]["username"] . '">';
  } else {
    echo '<input type="text" name="username" placeholder="Username">';
  }

  echo '<input type="password" name="password" placeholder="Password">';

  // Checks if a password is sent, the email has not already been used, and is a valid email.
  if (
    isset($_SESSION["signup_data"]["email"]) &&
    !isset($_SESSION["errors_signup"]["email_used"]) &&
    !isset($_SESSION["errors_signup"]["invalid_email"])
  ) {
    echo '<input type="text" name="email" placeholder="Email" value="' . $_SESSION["signup_data"]["email"] . '">';
  } else {
    echo '<input type="text" name="email" placeholder="Email">';
  }
}

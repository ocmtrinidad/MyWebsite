<?php

declare(strict_types=1);

// View files display website.

function checkSignupErrors()
{
  if (isset($_SESSION["errors_signup"])) {
    $errors = $_SESSION["errors_signup"];

    echo "<br>";

    foreach ($errors as $error) {
      echo "<p>" . $error . "</p>";
    };

    // Session is not needed as it is now in $errors, unset() it.
    unset($_SESSION["errors_signup"]);
  } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
    echo "<br>";
    echo "<p>Signup success!</p>";
  };
}

function signUpInputs()
{

  if (
    isset($_SESSION["signup_data"]["username"]) &&
    !isset($_SESSION["errors_signup"]["username_taken"])
  ) {
    echo '<input type="text" name="username" placeholder="Username" value="' . $_SESSION["signup_data"]["username"] . '">';
  } else {
    echo '<input type="text" name="username" placeholder="Username">';
  }

  echo '<input type="password" name="password" placeholder="Password">';

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

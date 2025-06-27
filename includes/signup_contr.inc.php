<?php

declare(strict_types=1);

// Controller files handle data.

function isInputEmpty($username, $password, $email)
{
  // Checks if inputs are empty.
  if (empty($username) || empty($password) || empty($email)) {
    return true;
  } else {
    return false;
  }
};

function isEmailInvalid($email)
{
  // Checks if email is a valid email.
  // filter_var() can be used to validate variables.
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  };
};

function isUsernameTaken($pdo, $username)
{
  // getUsername() is in model file.
  // getUsername() is accessible because model & contr files are accessible in signup.inc.php.
  if (getUsername($pdo, $username)) {
    return true;
  } else {
    return false;
  };
};

function isEmailRegistered($pdo, $email)
{
  // getEmail() is in model file.
  // getEmail() is accessible because model & contr files are accessible in signup.inc.php.
  if (getEmail($pdo, $email)) {
    return true;
  } else {
    return false;
  };
};

function createUser($pdo, $username, $password, $email)
{
  // setUser() is in model file.
  // setUser() is accessible because model & contr files are accessible in signup.inc.php.
  setUser($pdo, $username, $password, $email);
}

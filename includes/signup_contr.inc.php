<?php
declare(strict_types=1);

// Controller files handle data.

function isInputEmpty($username, $password, $email) {
  // Checks if inputs are empty.
  if (empty($username) || empty($password) || empty($email)) {
    return true;
  } else {
    return false;
  }
};

function isEmailInvalid($email) {
  // Checks if email is a valid email.
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  };
};

function isUsernameTaken($pdo, $username) {
  // getUsername() is in model file.
  if (getUsername($pdo, $username)) {
    return true;
  } else {
    return false;
  };
};

function isEmailRegistered($pdo, $email) {
  // getEmail() is in model file.
  if (getEmail($pdo, $email)) {
    return true;
  } else {
    return false;
  };
};

function createUser($pdo, $username, $password, $email) {
  setUser($pdo, $username, $password, $email);
}
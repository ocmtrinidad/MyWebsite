<?php

declare(strict_types=1);

// Type declaration for bool OR array.
function isUsernameWrong(bool|array $result)
{
  // If result === false then there is NO user.
  if (!$result) {
    return true;
  } else {
    return false;
  }
};

function isPasswordWrong(string $password, string $hashedPassword)
{
  // password_verify() is a built in function that checks if hashed password matches.
  if (!password_verify($password, $hashedPassword)) {
    return true;
  } else {
    return false;
  }
};

function isInputEmpty(string $username, string $password)
{
  if (empty($username) || empty($password)) {
    return true;
  } else {
    return false;
  }
};

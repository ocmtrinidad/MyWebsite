<?php

// GENERAL HASHING (NOT FOR PASSWORDS).
// $sensitiveData1 = "Button";
// // Normally use a database query to get this data.
// // Generates random string
// $salt = bin2hex(random_bytes(16));
// // Constant unique string you make.
// $pepper = "ASecretPepperString";

// $dataToHash1 = $sensitiveData1 . $salt . $pepper;
// $hash1 = hash("sha256", $dataToHash1);

// $sensitiveData2 = "Button";

// $dataToHash2 = $sensitiveData2 . $salt . $pepper;
// $hash2 = hash("sha256", $dataToHash2);

// if ($hash1 === $hash2) {
//   echo $hash1;
//   echo "<br>";
//   echo $hash2;
// } else {
//   echo "Different data.";
// }

// PASSWORD HASHING.
// Normally a POST input.
$password = "password";
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$passwordInput = "password";

if (password_verify($passwordInput, $hashedPassword)) {
  echo "SAME";
} else {
  echo "DIFFERENT";
};

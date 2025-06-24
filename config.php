<?php
// session.use_only_cookies = true
ini_set("session.use_only_cookies", 1);

// MANDATORY. Makes sure site only uses session id that is created by server.
ini_set("session.use_strict_mode", 1);

session_set_cookie_params([
  // Cookies get destroyed after 1800 seconds (30 mins).
  "lifetime" => 1800,
  // Cookies only work in this domain.
  "domain" => "localhost",
  // Any route in our domain.
  "path" => "/",
  // Cookies only work when using https.
  "secure" => true,
  // Restricts script access from clients.
  "httponly" => true
]);

// session_set_cookie_params() MUST be set before sessionn_start();
session_start();

// Transforms current id to more complex id.
// Best practice is to regenerate id regularly.
// session_regenerate_id(true);

// Checks if $_SESSION["last_regeneration"] is created.
if (!isset($_SESSION["last_regeneration"])) {
  // If not created, regenerates id.
  session_regenerate_id(true);
  // Logs time of last regeneration.
  $_SESSION["last_regeneration"] = time();
} else {
  // Interval of 30 mins.
  $interval = 60 * 30;
  // If current time and last regeneration are more >= 30 mins, regenerate id and log new time.
  if (time() - $_SESSION["last_regeneration"] >= $interval) {
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
  }
}
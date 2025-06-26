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
  // "/" means any route in our domain.
  "path" => "/",
  // Cookies only work when using https.
  "secure" => true,
  // Restricts script access from clients.
  "httponly" => true
]);

// session_set_cookie_params() MUST be set before session_start();
session_start();

// session_regenerate_id(true) transforms current id to more complex id.
// Best practice is to regenerate id regularly.

// Checks if user is logged in.
if (isset($_SESSION["user_id"])) {
  // Checks if $_SESSION["last_regeneration"] has been created.
  if (!isset($_SESSION["last_regeneration"])) {
    // If not created, regenerates id for the first time.
    regenerateSessionIdLoggedIn();
  } else {
    // Interval of 30 mins.
    $interval = 60 * 30;
    // If current time and last regeneration are >= 30 mins, regenerate id and log new time.
    if (time() - $_SESSION["last_regeneration"] >= $interval) {
      regenerateSessionIdLoggedIn();
    };
  };
} else {
  if (!isset($_SESSION["last_regeneration"])) {
    regenerateSessionId();
  } else {
    $interval = 60 * 30;
    if (time() - $_SESSION["last_regeneration"] >= $interval) {
      regenerateSessionId();
    };
  };
}

function regenerateSessionId()
{
  session_regenerate_id(true);
  $_SESSION["last_regeneration"] = time();
};

function regenerateSessionIdLoggedIn()
{
  $newSessionId = session_create_id();
  $sessionId = $newSessionId . "_" . $_SESSION["user_id"];
  session_id($sessionId);
  $_SESSION["last_regeneration"] = time();
};

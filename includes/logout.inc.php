<?php

// Can only destory a session if you start one.
session_start();
session_unset();
session_destroy();

header("Location: ../index.php");
die();

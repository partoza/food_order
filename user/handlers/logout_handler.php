<?php

session_start();

// Remove the token from the session
unset($_SESSION['access_token']);

session_destroy();

header("Location: ../login.php");
exit;

<?php

if (isset($_SESSION['access_token']) || isset($_COOKIE['access_token'])) {
  // Redirect authenticated users to the homepage or dashboard
  header("Location: ../user/index-2.php");
  exit;
}

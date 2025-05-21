<?php

if (isset($_SESSION['access_token'])) {
  $token = $_SESSION['access_token'];
} elseif (isset($_COOKIE['access_token'])) {
  $token = $_COOKIE['access_token'];
} else {
  header("Location: ../user/login.php");
  exit;
}

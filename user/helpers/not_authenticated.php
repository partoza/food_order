<?php

if (isset($_SESSION['access_token']) || isset($_COOKIE['access_token'])) {
  header("Location: ../user/index-2.php");
  exit;
}

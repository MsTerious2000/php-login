<?php
require 'connection.php';
$_SESSION['signin'] = false;
$_SESSION['user'] = null;
session_unset();
session_destroy();
header('Location: index.php');

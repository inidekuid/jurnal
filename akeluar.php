<?php
ob_start();
session_start();
session_destroy();
// Redirect to the login page:
header('Location: login.php');

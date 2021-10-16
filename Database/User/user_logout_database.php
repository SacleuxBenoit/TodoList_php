<?php
session_start();

$_SESSION = array();
session_destroy();
header('Location: ../../layouts/user_connection.php');
?>
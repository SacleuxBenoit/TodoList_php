<?php
session_start();
include('../pass.php');

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=mailBox;charset=utf8', 'root', $_SESSION['pass']);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

?>
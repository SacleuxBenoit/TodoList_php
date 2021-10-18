<?php
// verify if user want the darkMode

$select_darkMode = $bdd->prepare('SELECT darkMode FROM user WHERE username =:username');
$select_darkMode->bindParam(':username', $_SESSION['username']);
$select_darkMode->execute();
$fetch_select_darkMode = $select_darkMode->fetch();
?>
<?php require_once('functions.php') ?>
<?php require_once('sessions.php') ?>
<?php 
$_SESSION['UserName']=null;
session_destroy();
Redirect_to('index.php');

 ?>


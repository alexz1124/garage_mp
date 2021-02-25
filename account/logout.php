<?php 
include_once('../server.php');
include_once('../classes/Login.php');

$userdata = new DB_con();
$user = new Login($userdata->dbcon);

$user->Logout();

?>
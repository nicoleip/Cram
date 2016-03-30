<?php

require_once('session.php');
require_once('../classes/User.php');
$user_logout = new User();

if(isset($_GET['logout']) && $_GET['logout']=="true")
{
	$user_logout->logout();
	$user_logout->redirect('login.php');
}
<?php
require_once '../db/dbconfig.php';

if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['send-login']))
{
	$uname = $_POST['username'];
	$upass = $_POST['password'];

	if($user->login($uname, $upass))
	{
		$user->redirect('home.php');
	}
	else
	{
		$error = "Wrong Details !";
	}
}
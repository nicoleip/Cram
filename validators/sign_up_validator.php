<?php
require_once '../db/dbconfig.php';

if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['send-registration']))
{
	$uname = trim($_POST['name']);
	$username = trim($_POST['username']);
	$umail = trim($_POST['email']);
	$upass = trim($_POST['password']);

	if($uname=="") {
		$error[] = "Please enter name!";
	}
	else if($username=="") {
		$error[] = "Please enter username !";
	}
	else if($umail=="") {
		$error[] = "Please enter email !";
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
		$error[] = 'Please enter a valid email address !';
	}
	else if($upass=="") {
		$error[] = "Please enter password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";
	}
	else
	{
		try
		{
			$stmt = $DB_con->prepare("SELECT username,email FROM users WHERE username=:username OR email=:umail");
			$stmt->execute(array(':username'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			if($row['username']==$username) {
				$error[] = "sorry username already taken !";
			}
			else if($row['email']==$umail) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($uname, $username, $umail,$upass))
				{
					$user->redirect('signup.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
?>
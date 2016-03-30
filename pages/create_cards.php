<?php
require_once '../db/dbconfig.php';

if(!$user->is_loggedin())
{
	$user->redirect('login.php');
}

if(isset($_POST['add-new-card']))
{
	$front = trim($_POST['front']);
	$back = trim($_POST['back']);
	
	
	$user_id = trim($_SESSION['user_session']);
	
	$GetDeckStmt = $DB_con->prepare("SELECT id FROM decks WHERE user_id=:user_id ORDER BY id DESC LIMIT 1;");
	$GetDeckStmt->bindparam(":user_id", $user_id);
	$GetDeckStmt->execute();
	$GetDeckStmtRow=$GetDeckStmt->fetch(PDO::FETCH_ASSOC);

	$deck_id = $GetDeckStmtRow['id'];
	

	try
	{
		
			if($card->addCard($front, $back, $deck_id))
			{
				$user->redirect('create_cards.php');
			}
		
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

if(isset($_POST['save-cards']))
{
	$front = trim($_POST['front']);
	$back = trim($_POST['back']);


	$user_id = trim($_SESSION['user_session']);

	$GetDeckStmt = $DB_con->prepare("SELECT id FROM decks WHERE user_id=:user_id ORDER BY id DESC LIMIT 1;");
	$GetDeckStmt->bindparam(":user_id", $user_id);
	$GetDeckStmt->execute();
	$GetDeckStmtRow=$GetDeckStmt->fetch(PDO::FETCH_ASSOC);

	$deck_id = $GetDeckStmtRow['id'];


	try
	{

		if($card->addCard($front, $back, $deck_id))
		{
			$user->redirect('account.php');
		}

	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Create Decks</title>
<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
<script src="../assets/js/jquery-2.2.0.min.js"></script>
</head>
<body id="card-body">

<div id="container">
    <header>
        <div id="head" class="inline-block fleft">
            <div id="logo" class="float_left">
                <a id="site-logo" class="pointer"><img src="../assets/images/logo2.png" alt="Cram Cards" width="150" height="120"></a>
            </div>
            <a class="pointer" id="site-heading" href="index.html"><h1 class="inline-block">Cram Cards*</h1></a>
        </div>
        <nav>
            <ul id="navBar">
                <li class="float_left pointer"><a id="browse" href="home.php">Browse</a></li>
                <li class="float_left pointer"><a class="active" id="create" href="create_decks.php">Create decks</a></li>
                <li  class="float_left pointer"><a id="account" href="account.php">Log In</a></li>
            </ul>
        </nav>
    </header>
    <article id="card-article">    
    <div id="createcards-container">       
        <div id="createcards-form" class ="form border-none">
        <p class="title">*Create Cards</p>
            <form id="addCard" method="post">
                <div class="float_left">
                    <label class="block font">
                        Front
                    </label>
                    <textarea name="front" style="width: 300px;" class="front-card-description" maxlength="2000" cols="1" rows="1" required=""></textarea>
                </div>
                <div class="float_left">
                    <label class="block font">
                        Back
                    </label>
                    <textarea name="back" style="width: 300px;" class="back-card-description" maxlength="2000" cols="1" rows="1" required=""></textarea>
                </div>
                <div id="add" class="float_right height-button" class="float_right">
                    <input name = "add-new-card" id="add-new-card" type="submit" value="Add new card"></input>
                </div>
                <div id ="button-send" class="height-button">
                    <input name="save-cards" id="save-cards" type="submit" value="Save cards"/>
                </div>
                
            </form>
        </div>
        </div>
        </article>
         <footer>        
        <div class="social">
            <img class="pointer" src="../assets/icons/facebook.png" width="32px" height="32px">
            <img class="pointer" src="../assets/icons/twitter.png" width="32px" height="32px">
            <img class="pointer" src="../assets/icons/google.png" width="32px" height="32px">
        </div>
    </footer>
    </div>
    </body>
</html>
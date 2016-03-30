<?php
require_once '../db/dbconfig.php';

if(!$user->is_loggedin())
{
	$user->redirect('login.php');
}

if(isset($_POST['create-deck']))
{
	$title = trim($_POST['title']);
	$category_id = trim($_POST['categoryid']);
	$description = trim($_POST['description']);
	$user_id = trim($_SESSION['user_session']);
	
	

	
		try
		{
			$stmt = $DB_con->prepare("SELECT title FROM decks WHERE title=:title LIMIT 1");
			$stmt->bindparam(":title", $title);
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			if($row['title']==$title) {
				$error[] = "Sorry! This title is already taken !";
			}			
			else
			{
				if($deck->addDeck($title, $description, $category_id, $user_id))
				{
					$user->redirect('create_cards.php');
				}
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
<body id="deck-body">

<div id="container">
    <header>
        <div id="head" class="inline-block fleft">
            <div id="logo" class="float_left">
                <a id="site-logo" class="pointer"><img src="../assets/images/logo2.png" alt="Cram Cards" width="150" height="120"></a>
            </div>
            <a class="pointer" id="site-heading" href="home.php"><h1 class="inline-block">Cram Cards*</h1></a>
        </div>
        <nav>
            <ul id="navBar">
                <li class="float_left pointer"><a id="browse" href="home.php">Browse</a></li>
                <li class="float_left pointer"><a class="active" id="create" href="create_decks.php">Create decks</a></li>
                <li  class="float_left pointer"><a id="account" href="account.php">My profile</a></li>
            </ul>
        </nav>
    </header>
    <article id="deck-article">    
<div id="createdeck-container">
        <section id="createdeck-form" class = "form float_left block border-none">
        <p class="title">*Create A Deck</p>
            <form id="createDeck" method="post">
                <ul class="form-fields">
                    <li class="float_left">
                        <ul>                            
                            <li>
                                <label  for="title" class="required font block">
                                    Set Title:
                                </label>
                                <input  type="text" name="title" id="title" value="" maxlength="200" required="">
                            </li>
                            <li>
                                <label class="block font">
                                    Category:
                                </label>
                                <select name="categoryid" id="categories2">                                    
                                    <option selected="selected" class="ctgry" value="1">Math</option>
                                    <option class="ctgry" value="2">Science</option>
                                    <option class="ctgry" value="3">Biology</option>
                                    <option class="ctgry" value="4">Medicine</option>
                                    <option class="ctgry" value="5">Technologies</option>
                                    <option class="ctgry" value="6">Culture</option>
                                    <option class="ctgry" value="7">Geography</option>
                                    <option class="ctgry" value="8">History</option>
                                    <option class="ctgry" value="9">Languages</option>
                                    <option class="ctgry" value="10">Arts</option>
                                     <option class="ctgry" value="11">Environment</option>
                                    <option class="ctgry" value="12">Other</option>
                                </select>
                            </li>                           
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li id="descriptionBox" class="">
                                <label for="description" class="font block">
                                    Description:
                                </label>
                                <textarea name="description" id="description" maxlength="2000" cols="1" rows="1" required=""></textarea>
                            </li>
                            <li>
                                <div>
                                    <input name="create-deck" id="create-deck-send" type="submit" value="Create deck"/>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </form>
        </section>
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
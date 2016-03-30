<?php
include_once '../db/dbconfig.php';
if(!$user->is_loggedin())
{
	$user->redirect('login.php');
}

if(isset($_POST['createCards']))
{
	$user->redirect('create_decks.php');
}

?>


<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>Cram Cards</title>
<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
</head>
<body id="home-body">

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
                <li class="float_left pointer"><a class="active" id="browse" href="home.php">Browse</a></li>
                <li class="float_left pointer"><a id="create" href="create_decks.php">Create decks</a></li>
                <li  class="float_left pointer"><a id="account" href="account.php">My Profile</a></li>
            </ul>
        </nav>
    </header>
    <article id="home-article">

    <div id="categories-container">
            <h2 id="CategoriesHeading">Categories :</h2>
            <div id="categories" class="float_left">
                <ul id="first" class="float_left">
                    <li><a id="1" href="browse.php?category=1" class="math pointer">Math</a></li>
                    <li><a id="2" href="browse.php?category=2" class="science pointer">Science</a></li>
                    <li><a id="3" href="browse.php?category=3" class="biology pointer">Biology</a></li>
                    <li><a id="4" href="browse.php?category=4" class="medicine pointer">Medicine</a></li>
                    <li><a id="5" href="browse.php?category=5" class="technologies pointer">Technologies</a></li>
                    <li><a id="6" href="browse.php?category=6" class="culture pointer">Culture</a></li>
                    
                </ul>
                <ul id="second" class="float_left">
                    <li><a id="7" href="browse.php?category=7"class="geography pointer">Geography</a></li>
                    <li><a id="8" href="browse.php?category=8"class="history pointer">History</a></li>
                    <li><a id="9" href="browse.php?category=9"class="languages pointer">Languages</a></li>
                    <li><a id="10" href="browse.php?category=10"class="arts pointer">Arts</a></li>
                    <li><a id="11" href="browse.php?category=11"class="environment pointer">Environment</a></li>
                    <li><a id="12" href="browse.php?category=12"class="other pointer">Other</a></li>
                </ul>
            </div>
            <div id="create-cards" class="float_right">
                <div >
                    <img id="create-cards-image" src="../assets/images/create_cards.png" alt="Flash Cards" width="200" height="100">
                </div>
                <div>
                <form method="post">
                    <input type="submit" name="createCards" id="createCardsIndex" value="Create Cards" />
                    </form>
                </div>
                <div>
                    <h2>Start creating your own cards NOW!</h2>
                    
                </div>
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
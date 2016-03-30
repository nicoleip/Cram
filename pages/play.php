<?php
include_once '../db/dbconfig.php';
if(!$user->is_loggedin())
{
	$user->redirect('login.php');
}

if(isset($_GET['deck'])){
$deck_id = $_GET['deck'];
$decksStmt = $DB_con->prepare("SELECT * from cards WHERE deck_id=:deck_id");
$decksStmt->bindParam(":deck_id", $deck_id);
$decksStmt->execute();

}
?>

<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>Cram Cards</title>
<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
</head>
<body id="play-body">

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
                <li class="float_left pointer"><a  id="browse" href="home.php">Browse</a></li>
                <li class="float_left pointer"><a id="create" href="create_decks.php">Create decks</a></li>
                <li  class="float_left pointer"><a id="account" href="account.php">My Profile</a></li>
            </ul>
        </nav>
    </header>
    <article id="play-article">
    <div id="index-container">
    <?php if ($decksStmt->rowCount() > 0): ?> 
    <?php while($row = $decksStmt->fetch(PDO::FETCH_ASSOC)):?>
       <div id="card-priview">
       <h1>Question : <?php print($row['front'])?></h1>
        <h3>Answer : <?php print($row['back'])?></h3>        
       </div>
    <?php endwhile;?>
     <?php endif;?>
	<?php if($decksStmt->rowCount() == 0):?>
	<div id="card-priview">
       <h1>No cards!</h1>
       </div>
       <?php endif;?>
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

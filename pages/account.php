<?php
include_once '../db/dbconfig.php';
if (! $user->is_loggedin ()) {
	$user->redirect ( 'login.php' );
}
$user_id = $_SESSION ['user_session'];
$stmt = $DB_con->prepare ( "SELECT * FROM users WHERE id=:user_id" );
$stmt->bindParam ( ":user_id", $user_id );
$stmt->execute ();
$userRow = $stmt->fetch ( PDO::FETCH_ASSOC );

$Decksstmt = $DB_con->prepare ( "SELECT * FROM decks WHERE user_id=:user_id" );
$Decksstmt->bindParam ( ":user_id", $user_id );
$Decksstmt->execute ();

?>

<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>Cram Cards</title>
<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
</head>
<body id="account-body">

	<div id="container">
		<header>
			<div id="head" class="inline-block fleft">
				<div id="logo" class="float_left">
					<a id="site-logo" class="pointer"><img
						src="../assets/images/logo2.png" alt="Cram Cards" width="150"
						height="120"></a>
				</div>
				<a class="pointer" id="site-heading" href="home.php"><h1
						class="inline-block">Cram Cards*</h1></a>
			</div>
			<nav>
				<ul id="navBar">
					<li class="float_left pointer"><a id="browse" href="home.php">Browse</a></li>
					<li class="float_left pointer"><a id="create"
						href="create_decks.php">Create decks</a></li>
					<li class="float_left pointer"><a class="active" id="account"
						href="account.php">My Profile</a></li>
				</ul>
			</nav>
		</header>
		<article id="account-article">
			<div id="index-container">
				<h1>Welcome, <?php print($userRow['name']); ?> / <?php print($userRow['email']);?> !</h1>

				<a href="logout.php?logout=true">Log out</a>


				<div id="my-decks">
					<h1>My decks:</h1>
    <?php if ($Decksstmt->rowCount() > 0): ?> 
    <?php while($row = $Decksstmt->fetch(PDO::FETCH_ASSOC)):?>
       <div id="deck-priview">
						<a href="play.php?deck=<?php print $row['id']?>"><h1><?php print($row['title'])?></h1></a>
						<h3><?php print($row['description'])?></h3>

					</div>
    <?php endwhile;?>
     <?php endif;?>
	<?php if($Decksstmt->rowCount() == 0):?>
	<div id="deck-priview">
						<h1 style="color: red">No decks!</h1>
						<a href="create_decks.php"><h2>Create your first one here</h2></a>
					</div>
       <?php endif;?>
    
    </div>
			</div>
		</article>
		<footer>
			<div class="social">
				<img class="pointer" src="../assets/icons/facebook.png" width="32px"
					height="32px"> <img class="pointer"
					src="../assets/icons/twitter.png" width="32px" height="32px"> <img
					class="pointer" src="../assets/icons/google.png" width="32px"
					height="32px">
			</div>
		</footer>
	</div>

</body>
</html>

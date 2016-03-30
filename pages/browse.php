<?php
include_once '../db/dbconfig.php';
if (! $user->is_loggedin ()) {
	$user->redirect ( 'login.php' );
}

if (isset ( $_GET ['category'] )) {
	$category_id = $_GET ['category'];
	$decksStmt = $DB_con->prepare ( "SELECT * from decks WHERE category_id=:category_id" );
	$decksStmt->bindParam ( ":category_id", $category_id );
	$decksStmt->execute ();
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>Cram Cards</title>
<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
</head>
<body id="browse-body">

	<div id="container">
		<header>
			<div id="head" class="inline-block fleft">
				<div id="logo" class="float_left">
					<a id="site-logo" class="pointer"><img
						src="../assets/images/logo2.png" alt="Cram Cards" width="150"
						height="120"></a>
				</div>
				<a class="pointer" id="site-heading" href="home.php">
				<h1	class="inline-block">Cram Cards*</h1></a>
			</div>
			<nav>
				<ul id="navBar">
					<li class="float_left pointer"><a class="active" id="browse"
						href="home.php">Browse</a></li>
					<li class="float_left pointer"><a id="create"
						href="create_decks.php">Create decks</a></li>
					<li class="float_left pointer"><a id="account" href="account.php">My
							Profile</a></li>
				</ul>
			</nav>
		</header>
		<article id="browse-article">
			<div id="index-container">
    <?php if ($decksStmt->rowCount() > 0): ?> 
    <?php while($row = $decksStmt->fetch(PDO::FETCH_ASSOC)):?>
       <div id="deck-preview">
					<a href="play.php?deck=<?php print $row['id']?>">
					<h1 style="font-size: 50px"><?php print($row['title'])?></h1></a>
					<h3 style="font-size: 40px"><?php print($row['description'])?></h3>

				</div>
    <?php endwhile;?>
     <?php endif;?>
	<?php if($decksStmt->rowCount() == 0):?>
	<div id="deck-priview">
					<h1 style="color: red">No decks in this category yet!</h1>
					<a href="create_decks.php"><h2 style="color: white">Be the first to
							create one! :)</h2></a>
				</div>
			</div>
       <?php endif;?>

    </article>
	</div>
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

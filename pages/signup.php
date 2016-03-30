<?php 
require_once '../validators/sign_up_validator.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
<link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css" type="text/css"  />
<script src="assets/js/jquery-2.2.0.min.js"></script>
</head>
<body>

<div id="container">
    <header>
        <div id="head" class="inline-block fleft">
            <div id="logo" class="float_left">
                <a id="site-logo" class="pointer"><img src="../assets/images/logo2.png" alt="Cram Cards" width="150" height="120"></a>
            </div>
            <a class="pointer" id="site-heading" href="signup.php"><h1 class="inline-block">Cram Cards*</h1></a>
        </div>        
    </header>
    <article id="signup-article">    
    <div id="login-container">
    <section id="registration-form" class="form float_right" style="display:block">
            <form method="post" id="formRegistration">
                <h1>Registration</h1>      
                <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                       &nbsp; <?php echo $error; ?>
                  </div>
                  <?php
               }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
                 <div class="alert alert-info">
                       &nbsp; Successfully registered <a href='login.php'>login</a> here
                 </div>
                 <?php
            }
            ?>          
                <div>
                    <input type="text" placeholder="Name" name="name" id="name">
                    <p class="error"></p>
                </div>       
                <div>
                    <input type="text" name="username" placeholder="Username" id="username"/>
                    <p class="error"></p>
                </div>         
                <div>
                    <input type="email" name="email" placeholder="E-mail" id="email" onchange=""/>
                    <p class="error"></p>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" id="password2" onchange=""/>
                    <p  class="error"></p>
                </div>
                
                <div>
                    <input id="send-registration" name="send-registration" type="submit" value="Sign up" />
                </div>
                <div>                   
                    <a id="logInButton" style="cursor: pointer; font-size: 20px;" href="login.php">Have an account? Sign in!</a>
                </div>
                
            </form><!-- form -->
        </section>
        <section id="welcome">
            
            <p>Cram cards are a fun way to study and improve the way you expand your knowledge! 
            If you haven't had the chance to try out this kind of study-technique, this is a great
            place to start. Go to the 'Browse' tab in the menu and explore a various number of 
            categories with vast amount of flashcards in them! You can create your own decks of 
            cards and train your brain the best way possible. If you are not a memeber, click the
            'Sign Up' button and fill out our registration form, and if you have already signed up,
            don't waste time looking --> start learning and become a master!<br>
            Have fun !</p>
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
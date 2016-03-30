<?php
require_once '../validators/login_validator.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
<link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css" type="text/css"  />
<script src="../assets/js/jquery-2.2.0.min.js"></script>

</head>
<body>

<div id="container">
    <header>
        <div id="head" class="inline-block fleft">
            <div id="logo" class="float_left">
                <a id="site-logo" class="pointer"><img src="../assets/images/logo2.png" alt="Cram Cards" width="150" height="120"></a>
            </div>
            <a class="pointer" id="site-heading" href="login.php"><h1 class="inline-block" style="font-family: Chalk">Cram Cards*</h1></a>
        </div>        
    </header>
    <article id="login-article">    

    <div id="login-container" >
             <section id="login-form" class="form float_right">
            <form method="post" id="formLogin">
                <h1>Login</h1>
                <div>
                    <input type="text" placeholder="Username" name="username" required="" id="username"/>
                    <p></p>
                </div>

                <div>
                    <input type="password" placeholder="Password" name="password" required="" id="password"/>
                    <p id="login-error"></p>
                </div>
                <div>
                    <input name="send-login"  id="send-login" type="submit" value="Log In" />
                </div>

                <div>
                            
                    <a id="signUpButton" style="cursor: pointer" href="signup.php">Sign up!</a>
                </div>
                
                <div id="apple"></div>
            </form>
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
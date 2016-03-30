<?php

session_start();

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "flashcards";

try
{
     $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}


include_once '../classes/User.php';
include_once '../classes/Deck.php';
include_once '../classes/Card.php';
$user = new User($DB_con);
$deck = new Deck($DB_con);
$card = new Card($DB_con);
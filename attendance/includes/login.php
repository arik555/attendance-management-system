<?php 
// Start session
session_start(); 

// Username and password
$username = "admin";
$password = "admin";

if (isset($_POST["username"]) && isset($_POST["password"])) { 

    if ($_POST["ID"] === $username && $_POST["password"] === $password) { 
    
    $_SESSION["inloggedin"] = true; 

    header("Location: ../Admin-dash.php"); 
    exit; 
    } 
        // Wrong login - message
        else {$wrong = "Bad ID and password, the system could not log you in";} 
}
?> 
<?php
session_start();

// Simple login handler
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // In a real app, you would validate credentials against a database
    // For this demo, we'll just set session variables if the form is submitted
    $_SESSION['id'] = 1;
    $_SESSION['email'] = $_POST['email'];
    
    // Redirect to home page after login
    header('Location: /');
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="ISO-8859-1">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Rydr</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="icon" type="image/png" href="assets/images/favicon.ico" sizes="32x32">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>
<body>
<div class="topbar">
    <div class="logo">
        <a href="/">
            Rydr.
        </a>
    </div>
</div>

<main>
    <form action="" method="post" class="account-form">
        <h2>Inloggen</h2>
        
        <label for="email">Uw e-mail</label>
        <input type="email" name="email" id="email" placeholder="johndoe@gmail.com" required autofocus>
        
        <label for="password">Uw wachtwoord</label>
        <input type="password" name="password" id="password" placeholder="Uw wachtwoord" required>
        
        <input type="submit" value="Inloggen" class="button-primary">
        
        <p style="text-align: center; margin-top: 20px;">
            Nog geen account? <a href="/pages/register-form.php">Maak een account aan</a>
        </p>
    </form>
</main>

<?php 
$root_path = $_SERVER['DOCUMENT_ROOT'];
require $root_path . "/includes/footer.php"; 
?>

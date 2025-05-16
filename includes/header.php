<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="ISO-8859-1">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rydr</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="icon" type="image/png" href="/assets/images/favicon.ico" sizes="32x32">
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
    <form action="/pages/zoeken.php" method="GET">
        <input type="search" name="brand" id="search" placeholder="Zoek op automerk..." required>
        <img src="/assets/images/icons/search-normal.svg" alt="" class="search-icon">
    </form>
    <nav>
        <ul>
            <li><a href="/pages/home.php">Home</a></li>
            <li><a href="/pages/ons-aanbod.php">Ons aanbod</a></li>
            <li><a href="/over-ons">Over ons</a></li>
            <li><a href="#">Hulp nodig?</a></li>
        </ul>
    </nav>
    <div class="menu">
        <?php if(isset($_SESSION['id'])){ ?>
        <div class="wishlist-icon">
            <a href="/pages/wishlist.php" title="Mijn favorieten">
                ♥
                <?php if(isset($_SESSION['likes']) && count($_SESSION['likes']) > 0): ?>
                <span class="count"><?= count($_SESSION['likes']) ?></span>
                <?php endif; ?>
            </a>
        </div>
        <div class="account">
            <div class="profile-container">
                <img src="/assets/images/profil.png" alt="Profiel">
                <span class="dropdown-arrow">▼</span>
            </div>
            <div class="account-dropdown">
                <ul>
                    <li><img src="/assets/images/icons/setting.svg" alt=""><a href="/pages/register-form.php">Naar account</a></li>
                    <li><img src="/assets/images/icons/logout.svg" alt=""><a href="/logout.php">Uitloggen</a></li>
                </ul>
            </div>
        </div>
        <?php }else{ ?>
            <a href="/pages/register-form.php" class="button-primary">Start met huren</a>
        <?php } ?>

    </div>
</div>
<div class="content"></div>

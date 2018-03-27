<?php session_start();
if (!isset($_SESSION['nightmode'])) {
    $_SESSION['nightmode'] = 'false';
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ziggo eSports</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo URL; ?>css/manifest.css" rel="stylesheet">

        <!--    Favicon    -->
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
        <link rel="manifest" href="img/favicon/site.webmanifest">
        <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#f48c00">
        <meta name="msapplication-TileColor" content="#f48c00">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body class=" <?php
    if($_SESSION['nightmode'] == 'false'){
        echo "light-theme";
    }elseif ($_SESSION['nightmode'] == 'true'){
        echo "dark-theme";
    }else{
        echo "light-theme";
    }
    ?> ">
        <!-- logo -->


        <header id="header">
            <div class="header--inner">
                <div class="logo">
                    <a href="<?php echo URL; ?>">
                        <img src="<?php echo URL?>img/logo--white.svg">
                    </a>
                </div>

                <!-- navigation -->
                <div class="navigation">
                    <a class="navigation--item" href="<?php echo URL; ?>"><i class="fas fa-home"></i></a>
                    <a class="navigation--item" href="<?php echo URL; ?>tournaments">Events</a>
                    <a class="navigation--item" href="<?php echo URL; ?>streams">Streamers</a>
                    <a class="navigation--item" href="<?php echo URL; ?>signup">Sign up</a>
                    <a class="navigation--item" href="<?php echo URL; ?>favorite"><i class="fas fa-star"></i>Favorites</a>
                    <a class="navigation--item" href="<?php echo URL; ?>login">Sign In <i class="fas fa-sign-in-alt"></i></a>

                </div>
                <div class="navigation-menu-icon" onclick="menuAnimation(this)">
                    <div class="menu-icon__line"></div>
                    <div class="menu-icon__line"></div>
                    <div class="menu-icon__line"></div>
                </div>
            </div>
        </header>
        <div class="main-container">
            <div class="main-container--inner">
                <div class="switch-container">
                    <p>Night Mode</p>
                    <label class="switch">
                        <input type="checkbox" <?php if($_SESSION['nightmode'] == 'true'){ echo 'checked';}?>>
                        <span id="nightmode" class="switch-slider round "></span>
                    </label>
                </div>

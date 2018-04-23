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

        <!--   Google reCaptcha -->
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <!-- Font Awesome  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- twitter meta info -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:creator" content="">
        <meta name="twitter:title" content="Ziggo Esport">
        <meta name="twitter:description" content="Ziggo Esport homepage">
        <meta name="twitter:image" content="http://ronpelt.synology.me/ewa/img/logo__twitter.jpg">
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
                    <a class="navigation--item" title="Home" href="<?php echo URL; ?>"><i class="fas fa-home"></i></a>
                    <a class="navigation--item" href="<?php echo URL; ?>matches">Matches</a>
                    <a class="navigation--item" href="<?php echo URL; ?>tournaments">Tournaments</a>
                    <a class="navigation--item" href="<?php echo URL; ?>streams">Streamers</a>
                    <?php if($_SESSION['email'] == ''){ ?>
                        <a class="navigation--item signing-up" href="<?php echo URL; ?>signup">Sign Up</a>
                        <a class="navigation--item menu-box" title="Sign In" href="<?php echo URL; ?>signin"><i class="fas fa-sign-in-alt"></i></a>
                    <?php } else{ ?>
                        <a class="navigation--item" href="<?php echo URL; ?>favorite">Favorites</a>
                        <a class="navigation--item menu-box" title="Sign Out" href="<?php echo URL; ?>home/logout"><i class="fas fa-sign-out-alt"></i></a>
                    <?php } ?>

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

<?php session_start();
if (!isset($_SESSION['nightmode'])) {
    $_SESSION['nightmode'] = 'false';
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ziggo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo URL; ?>css/manifest.css" rel="stylesheet">
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
                    <!--  <a class="navigation--item" href="--><?php //echo URL; ?><!--songs">Songs</a>-->
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

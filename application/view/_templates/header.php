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

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <!-- twitter meta info -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:creator" content="">
    <meta name="twitter:title" content="Ziggo Esport">
    <meta name="twitter:description" content="Ziggo Esport homepage">
    <meta name="twitter:image" content="http://ronpelt.synology.me/ewa/img/logo__twitter.jpg">
</head>
<body class=" <?php
if ($_SESSION['nightmode'] == 'false') {
    echo "light-theme";
} elseif ($_SESSION['nightmode'] == 'true') {
    echo "dark-theme";
} else {
    echo "light-theme";
}
?> ">
<!-- logo -->


<header class="header--main" id="header">
    <div class="header--inner">
        <div class="logo">
            <a href="<?php echo URL; ?>">
                <img src="<?php echo URL ?>img/logo--white.svg">
            </a>
        </div>

        <!-- navigation -->
        <div class="navigation">
            <a class="navigation--item" title="Home" href="<?php echo URL; ?>"><i class="fas fa-home"></i></a>
            <a class="navigation--item" href="<?php echo URL; ?>matches">Matches</a>
            <a class="navigation--item" href="<?php echo URL; ?>tournaments">Tournaments</a>
            <a class="navigation--item" href="<?php echo URL; ?>players">Players</a>
            <a class="navigation--item" href="<?php echo URL; ?>streams">Streamers</a>
            <a class="navigation--item" href="<?php echo URL; ?>news">News</a>
            <?php if ($_SESSION['email'] == '') { 
                ?>
                <a class="navigation--item signing-up" href="<?php echo URL; ?>signup">Sign Up</a>
                <a class="navigation--item menu-box" title="Sign In" href="<?php echo URL; ?>signin"><i
                            class="fas fa-sign-in-alt"></i></a>
            <?php } else { ?>
                <a class="navigation--item" href="<?php echo URL; ?>favorite">Follows</a>
                <a class="navigation--item" title="View Profile" href="<?php echo URL; ?>profile"><i
                            class="far fa-user-circle"></i></a>
                <a class="navigation--item menu-box" title="Sign Out" href="<?php echo URL;  ?>home/logout"><i
                            class="fas fa-sign-out-alt"></i></a> 
            <?php } ?>

        </div>
        <div class="navigation-menu-icon" onclick="menuAnimation(this)">
            <div class="menu-icon__line"></div>
            <div class="menu-icon__line"></div>
            <div class="menu-icon__line"></div>
        </div>
    </div>
</header>


<?php // HOMEPAGE SLIDER
if (URL == (URL_PROTOCOL . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'])) { ?>

    <ul class="slider-front">
        <?php
        $break = 0;
        if (!empty($slider)) {
            foreach ($slider as $key => $item) { ?>
                <li class="slider-item">
                    <div class="slider-item--background">
                        <?php if ($item['videogame']['name'] == 'Dota 2') { ?>
                            <img class="slider-item--background__image"
                                 src="<?php echo URL ?>img/backgrounds/dota-background.jpg"/>
                        <?php } elseif ($item['videogame']['name'] == 'LoL') { ?>
                            <img class="slider-item--background__image"
                                 src="<?php echo URL ?>img/backgrounds/lol-background.jpg"/>
                        <?php } elseif ($item['videogame']['name'] == 'Overwatch') { ?>
                            <img class="slider-item--background__image"
                                 src="<?php echo URL ?>img/backgrounds/overwatch-background.jpg"/>
                        <?php } else { ?>
                            <img class="slider-item--background__image"
                                 src="<?php echo URL ?>img/backgrounds/generic-background.jpg"/>
                        <?php } ?>
                    </div>
                    <div class="slider-item--content">
                        <span class="slider-item--content__date">
                            <p class="slider-item--content__date__time ">
                                <?php echo date('d F H:i', strtotime($item["begin_at"]) + 60 * 60) ?>
                            </p>
                        </span>
                        <span class="slider-item--content__icon">
                            <img class="slider-item--content__icon__image"
                                 src="<?php echo $item["league"]["image_url"] ?> "/>
                        </span>
                        <span class="slider-item--content__info">
                            <p class="slider-item--content__info__name"> <?php if ($item["videogame"]['name'] == 'LoL') {
                                    echo 'League of Legends';
                                } else {
                                    echo $item["videogame"]['name'];
                                } ?>
                            </p>
                            <div class="slider-item--content__info__matchup">
                                <?php if (!$item["opponents"] == null || !$item["opponents"] == "") {
                                    $oppCounter = 0;
                                    foreach ($item["opponents"] as $key => $itemOpponents) {
                                        if ($oppCounter !== 0) { ?>
                                            <p class="slider-item--content__info__matchup__vs">VS</p>
                                        <?php } ?>


                                        <div class="slider-item--content__info__matchup__item">
                                            <?php if (!$itemOpponents["opponent"]["image_url"] == null || !$itemOpponents["opponent"]["image_url"] == "") { ?>
                                                <img class="slider-item--content__info__matchup__item__img"
                                                     src="<?php echo $itemOpponents['opponent']["image_url"] ?>"/>
                                            <?php } ?>
                                            <p class="slider-item--content__info__matchup__item__game">
                                                <?php echo $itemOpponents['opponent']['name'] ?>
                                            </p>
                                        </div>
                                        <?php $oppCounter++;
                                    }
                                } else { ?>
                                    <p class="slider-item--content__info__matchup__no-info">No match data available</p>
                                <?php } ?>
                            </div>
                            <p class="slider-item--content__info__tournament"> TOURNAMENT: </p>
                            <p class="slider-item--content__info__tournamentname"> <?php echo $item["tournament"]['name'] ?></p>
                        </span>
                    </div>
                </li>
                <?php
                $break++;
                if ($break == 5) break;
            }
        } ?>

    </ul>

<? }  //END HOMEPAGE SLIDER ?>

<div class="main-container">
    <div class="main-container--inner">
        <div class="switch-container">
            <div class="header--search hidden" id="searchbar">
                <form class="navigation--item--search" action="<?php echo URL; ?>search/redirect" method="POST">
                    <input class="navigation--item--search__input" placeholder="Search..." type="text"
                           name="search-input" value="" required/>
                    <input type="submit" name="search" value="Search">
                </form>
            </div>
            <a href="#" id="search-icon" class="search-icon"><i class="fas fa-search"></i></a>
            <p>Night Mode</p>
            <label class="switch">
                <input type="checkbox" <?php if ($_SESSION['nightmode'] == 'true') {
                    echo 'checked';
                } ?>>
                <span id="nightmode" class="switch-slider round "></span>
            </label>
        </div>

        <header class="header--search" id="searchbar" hidden>
            <div class="header--inner">
                <form class="navigation--item--search" action="<?php echo URL; ?>search/redirect" method="POST">
                    <input class="navigation--item--search__input" placeholder="Search..." type="text"
                           name="search-input" value="" required/>
                    <input type="submit" name="search" value="Search">
                </form>
            </div>
        </header>

        <script>
            function myFunction() {
                var x = document.getElementById("searchbar");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>

<div class="container streamers-container">
    <h1>Streamers</h1>
    <div class="filterBar-container">
        <div class="filterBar--inner">
            <div class="dateFilter">
                <a class="tablinks dateFilter--item" href="#"><i class="filter-icon fas fa-filter"></i></a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'all')">all</a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'NL')">Dutch Streamers</a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'lol')">League of Legends</a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'dota2')">Dota 2</a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'overwatch')">Overwatch</a>
            </div>
        </div>
    </div>
    <div id="lol" class="tabcontent">

        <h3>League of Legends</h3>
        <ul class="streamers__list">
            <?php
            $counter = 0;
            if (!empty($streamers)) {
                foreach ($streamers as $key => $item) {
                    if ($item["type"]["name"] == "League of legends") { ?>

                        <li class="streamers--item">
                            <a class="streamer--item__share">
                                <i class="fas fa-share"></i>
                            </a>
                            <div class="streamer--item__social">
                                <a target="_blank"
                                   href="http://www.facebook.com/sharer/sharer.php?u=https://mixer.com/<?php echo $item["token"] ?>">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a target="_blank"
                                   href="http://twitter.com/share?url=https://mixer.com/<?php echo $item["token"] ?>&text=<?php echo $item["token"] ?>&nbsp;-&nbsp;<?php echo $item["name"] ?>:">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a target="_blank"
                                   href="https://plus.google.com/share?url=https://mixer.com/<?php echo $item["token"] ?>">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a target="_blank"
                                   href="http://reddit.com/submit?url=https://mixer.com/<?php echo $item["token"] ?>&title=<?php echo $item["token"] ?>&nbsp;-&nbsp;<?php echo $item["name"] ?>:">
                                    <i class="fab fa-reddit"></i>
                                </a>
                            </div>

                            <a href="https://mixer.com/<?php echo $item["token"] ?>"
                               target="_blank">
                                <div class="streamers--item__container">
                                    <div class="streamers--item--image">
                                        <?php
                                        $file = 'https://thumbs.mixer.com/channel/' . $item["id"] . '.small.jpg';
                                        $file_headers = @get_headers($file);
                                        if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                                            ?>
                                            <img class="streamers--item__cover"
                                                 src="<?php echo $item["type"]["coverUrl"] ?>"/>
                                        <?php } else { ?>
                                            <img class="streamers--item__cover"
                                                 src="https://thumbs.mixer.com/channel/<?php echo $item["id"] ?>.small.jpg"/>
                                        <?php } ?>

                                        <img class="streamers--item__icon"
                                             src="https://mixer.com/api/v1/users/<?php echo $item["userId"] ?>/avatar?w=128&h=128"/>
                                    </div>
                                    <span class="streamer--item__title"><i
                                                class="streamer--item__live fas fa-circle"></i> <?php echo $item["token"] ?> </span>
                                    <div class="streamer-title-wrapper">
                                        <span class="streamer-title"><?php echo $item["name"] ?></span>
                                    </div>
                                </div>
                            </a>
                            <?php if (!$_SESSION['email'] == '') { ?>
                                <a class="streamer-star
                            <?php
                                if (!empty($favorites)) {
                                    foreach ($favorites as $favorite) {
                                        if ($favorite->Streamer_streamID == $item["id"]) {
                                            echo ' active';
                                        } else {
                                            echo '';
                                        }
                                    }
                                } ?>
                            " href="#" id="<?php echo $item["id"] ?> "><i class="fas fa-star"></i></a>
                            <?php } ?>
                        </li>
                        <?php $counter++;
                    }
                }
            }

            ?>

            <?php
            $counter = 0;
            if (!empty($streamersTwitch)) {
                foreach ($streamersTwitch["streams"] as $key => $item) {
                    if ($item["channel"]["game"] == "League of Legends") { ?>
                        <li class="streamers--item">
                            <!-- Social Media links -->
                            <a class="streamer--item__share">
                                <i class="fas fa-share"></i>
                            </a>
                            <div class="streamer--item__social">
                                <a target="_blank"
                                   href="http://www.facebook.com/sharer/sharer.php?u=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a target="_blank"
                                   href="http://twitter.com/share?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>&text=<?php echo $item["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item["channel"]["status"] ?>:">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a target="_blank"
                                   href="https://plus.google.com/share?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a target="_blank"
                                   href="http://reddit.com/submit?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>&title=<?php echo $item["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item["channel"]["status"] ?>:">
                                    <i class="fab fa-reddit"></i>
                                </a>
                            </div>
                            <a href="<?php echo $item["channel"]["url"] ?>"
                               target="_blank">
                                <div class="streamers--item__container">
                                    <div class="streamers--item--image">

                                        <img class="streamers--item__cover"
                                             src="<?php echo $item["preview"]["medium"] ?>"/>

                                        <img class="streamers--item__icon"
                                             src="<?php echo $item["channel"]["logo"] ?>"/>
                                    </div>
                                    <span class="streamer--item__title"><i
                                                class="streamer--item__live fas fa-circle"></i> <?php echo $item["channel"]["display_name"] ?> </span>
                                    <span class="streamer-title"><?php echo $item["channel"]["status"] ?></span>
                                </div>
                            </a>
                            <?php if (!$_SESSION['email'] == '') { ?>
                                <a class="streamer-star
                            <?php
                                if (!empty($favorites)) {
                                    foreach ($favorites as $favorite) {
                                        if ($favorite->Streamer_streamID == $item["_id"]) {
                                            echo ' active';
                                        } else {
                                            echo '';
                                        }
                                    }
                                } ?>
                            " href="#" id="<?php echo $item["_id"] ?> "><i class="fas fa-star"></i></a>

                            <?php } ?>
                        </li>
                        <?php $counter++;
                    }
                }
            }
            if ($counter == 0) {
                echo 'No streams available';
            }

            ?>
        </ul>
    </div>
    <div id="dota2" class="tabcontent">
        <h3>Dota 2</h3>
        <ul class="streamers__list">

            <?php
            $counter = 0;
            if (!empty($streamers)) {

                foreach ($streamers as $key => $item) {
                    if ($item["type"]["name"] == "Dota 2") { ?>
                        <li class="streamers--item">
                            <a class="streamer--item__share">
                                <i class="fas fa-share"></i>
                            </a>
                            <div class="streamer--item__social">
                                <a target="_blank"
                                   href="http://www.facebook.com/sharer/sharer.php?u=https://mixer.com/<?php echo $item["token"] ?>">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a target="_blank"
                                   href="http://twitter.com/share?url=https://mixer.com/<?php echo $item["token"] ?>&text=<?php echo $item["token"] ?>&nbsp;-&nbsp;<?php echo $item["name"] ?>:">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a target="_blank"
                                   href="https://plus.google.com/share?url=https://mixer.com/<?php echo $item["token"] ?>">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a target="_blank"
                                   href="http://reddit.com/submit?url=https://mixer.com/<?php echo $item["token"] ?>&title=<?php echo $item["token"] ?>&nbsp;-&nbsp;<?php echo $item["name"] ?>:">
                                    <i class="fab fa-reddit"></i>
                                </a>
                            </div>

                            <a href="https://mixer.com/<?php echo $item["token"] ?>"
                               target="_blank">
                                <div class="streamers--item__container">
                                    <div class="streamers--item--image">
                                        <?php
                                        $file = 'https://thumbs.mixer.com/channel/' . $item["id"] . '.small.jpg';
                                        $file_headers = @get_headers($file);
                                        if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                                            ?>
                                            <img class="streamers--item__cover"
                                                 src="<?php echo $item["type"]["coverUrl"] ?>"/>
                                        <?php } else { ?>
                                            <img class="streamers--item__cover"
                                                 src="https://thumbs.mixer.com/channel/<?php echo $item["id"] ?>.small.jpg"/>
                                        <?php } ?>

                                        <img class="streamers--item__icon"
                                             src="https://mixer.com/api/v1/users/<?php echo $item["userId"] ?>/avatar?w=128&h=128"/>
                                    </div>
                                    <span class="streamer--item__title"><i
                                                class="streamer--item__live fas fa-circle"></i> <?php echo $item["token"] ?> </span>
                                    <div class="streamer-title-wrapper">
                                        <span class="streamer-title"><?php echo $item["name"] ?></span>
                                    </div>
                                </div>
                            </a>
                            <?php if (!$_SESSION['email'] == '') { ?>
                                <a class="streamer-star
                            <?php
                                if (!empty($favorites)) {
                                    foreach ($favorites as $favorite) {
                                        if ($favorite->Streamer_streamID == $item["id"]) {
                                            echo ' active';
                                        } else {
                                            echo '';
                                        }
                                    }
                                } ?>
                            " href="#" id="<?php echo $item["id"] ?> "><i class="fas fa-star"></i></a>
                            <?php } ?>
                        </li>
                        <?php $counter++;
                    }
                }

            }

            ?>
            <?php
            $counter = 0;
            if (!empty($streamersTwitch)) {
                foreach ($streamersTwitch["streams"] as $key => $item) {
                    if ($item["channel"]["game"] == "Dota 2") { ?>
                        <li class="streamers--item">
                            <!-- Social Media links -->
                            <a class="streamer--item__share">
                                <i class="fas fa-share"></i>
                            </a>
                            <div class="streamer--item__social">
                                <a target="_blank"
                                   href="http://www.facebook.com/sharer/sharer.php?u=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a target="_blank"
                                   href="http://twitter.com/share?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>&text=<?php echo $item["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item["channel"]["status"] ?>:">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a target="_blank"
                                   href="https://plus.google.com/share?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a target="_blank"
                                   href="http://reddit.com/submit?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>&title=<?php echo $item["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item["channel"]["status"] ?>:">
                                    <i class="fab fa-reddit"></i>
                                </a>
                            </div>
                            <a href="<?php echo $item["channel"]["url"] ?>"
                               target="_blank">
                                <div class="streamers--item__container">
                                    <div class="streamers--item--image">

                                        <img class="streamers--item__cover"
                                             src="<?php echo $item["preview"]["medium"] ?>"/>

                                        <img class="streamers--item__icon"
                                             src="<?php echo $item["channel"]["logo"] ?>"/>
                                    </div>
                                    <span class="streamer--item__title"><i
                                                class="streamer--item__live fas fa-circle"></i> <?php echo $item["channel"]["display_name"] ?> </span>
                                    <span class="streamer-title"><?php echo $item["channel"]["status"] ?></span>
                                </div>
                            </a>
                            <?php if (!$_SESSION['email'] == '') { ?>
                                <a class="streamer-star
                            <?php
                                if (!empty($favorites)) {
                                    foreach ($favorites as $favorite) {
                                        if ($favorite->Streamer_streamID == $item["_id"]) {
                                            echo ' active';
                                        } else {
                                            echo '';
                                        }
                                    }
                                } ?>
                            " href="#" id="<?php echo $item["_id"] ?> "><i class="fas fa-star"></i></a>
                            <?php } ?>
                        </li>
                        <?php $counter++;
                    }
                }
            }
            if ($counter == 0) {
                echo 'No streams available';
            }

            ?>

        </ul>
    </div>

    <div id="overwatch" class="tabcontent">
        <h3>Overwatch</h3>
        <ul class="streamers__list">

            <?php
            $counter = 0;
            if (!empty($streamers)) {
                foreach ($streamers as $key => $item) {
                    if ($item["type"]["name"] == "Overwatch") { ?>
                        <li class="streamers--item">

                            <!-- Social Media links -->
                            <a class="streamer--item__share">
                                <i class="fas fa-share"></i>
                            </a>
                            <div class="streamer--item__social">
                                <a target="_blank"
                                   href="http://www.facebook.com/sharer/sharer.php?u=https://mixer.com/<?php echo $item["token"] ?>">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a target="_blank"
                                   href="http://twitter.com/share?url=https://mixer.com/<?php echo $item["token"] ?>&text=<?php echo $item["token"] ?>&nbsp;-&nbsp;<?php echo $item["name"] ?>:">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a target="_blank"
                                   href="https://plus.google.com/share?url=https://mixer.com/<?php echo $item["token"] ?>">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a target="_blank"
                                   href="http://reddit.com/submit?url=https://mixer.com/<?php echo $item["token"] ?>&title=<?php echo $item["token"] ?>&nbsp;-&nbsp;<?php echo $item["name"] ?>:">
                                    <i class="fab fa-reddit"></i>
                                </a>
                            </div>
                            <a href="https://mixer.com/<?php echo $item["token"] ?>"
                               target="_blank">
                                <div class="streamers--item__container">
                                    <div class="streamers--item--image">
                                        <?php
                                        $file = 'https://thumbs.mixer.com/channel/' . $item["id"] . '.small.jpg';
                                        $file_headers = @get_headers($file);
                                        if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                                            ?>
                                            <img class="streamers--item__cover"
                                                 src="<?php echo $item["type"]["coverUrl"] ?>"/>
                                        <?php } else { ?>
                                            <img class="streamers--item__cover"
                                                 src="https://thumbs.mixer.com/channel/<?php echo $item["id"] ?>.small.jpg"/>
                                        <?php } ?>

                                        <img class="streamers--item__icon"
                                             src="https://mixer.com/api/v1/users/<?php echo $item["userId"] ?>/avatar?w=128&h=128"/>
                                    </div>
                                    <span class="streamer--item__title"><i
                                                class="streamer--item__live fas fa-circle"></i> <?php echo $item["token"] ?> </span>
                                    <div class="streamer-title-wrapper">
                                        <div class="streamer-title"><?php echo $item["name"] ?></div>
                                    </div>
                                </div>
                            </a>
                            <?php if (!$_SESSION['email'] == '') { ?>
                                <a class="streamer-star
                            <?php
                                if (!empty($favorites)) {
                                    foreach ($favorites as $favorite) {
                                        if ($favorite->Streamer_streamID == $item["id"]) {
                                            echo ' active';
                                        } else {
                                            echo '';
                                        }
                                    }
                                } ?>
                            " href="#" id="<?php echo $item["id"] ?> "><i class="fas fa-star"></i></a>
                            <?php } ?>
                        </li>
                        <?php $counter++;
                    }
                }
            }

            ?>

            <?php
            if (!empty($streamersTwitch)) {
                foreach ($streamersTwitch["streams"] as $key => $item) {
                    if ($item["channel"]["game"] == "Overwatch") { ?>
                        <li class="streamers--item">
                            <!-- Social Media links -->
                            <a class="streamer--item__share">
                                <i class="fas fa-share"></i>
                            </a>
                            <div class="streamer--item__social">
                                <a target="_blank"
                                   href="http://www.facebook.com/sharer/sharer.php?u=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a target="_blank"
                                   href="http://twitter.com/share?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>&text=<?php echo $item["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item["channel"]["status"] ?>:">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a target="_blank"
                                   href="https://plus.google.com/share?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a target="_blank"
                                   href="http://reddit.com/submit?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>&title=<?php echo $item["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item["channel"]["status"] ?>:">
                                    <i class="fab fa-reddit"></i>
                                </a>
                            </div>
                            <a href="<?php echo $item["channel"]["url"] ?>"
                               target="_blank">
                                <div class="streamers--item__container">
                                    <div class="streamers--item--image">

                                        <img class="streamers--item__cover"
                                             src="<?php echo $item["preview"]["medium"] ?>"/>

                                        <img class="streamers--item__icon"
                                             src="<?php echo $item["channel"]["logo"] ?>"/>
                                    </div>
                                    <span class="streamer--item__title"><i
                                                class="streamer--item__live fas fa-circle"></i> <?php echo $item["channel"]["display_name"] ?> </span>
                                    <span class="streamer-title"><?php echo $item["channel"]["status"] ?></span>
                                </div>
                            </a>
                            <?php if (!$_SESSION['email'] == '') { ?>
                                <a class="streamer-star
                            <?php
                                if (!empty($favorites)) {
                                    foreach ($favorites as $favorite) {
                                        if ($favorite->Streamer_streamID == $item["_id"]) {
                                            echo ' active';
                                        } else {
                                            echo '';
                                        }
                                    }
                                } ?>
                            " href="#" id="<?php echo $item["_id"] ?> "><i class="fas fa-star"></i></a>
                            <?php } ?>
                        </li>
                        <?php $counter++;

                    }
                }
            }
            if ($counter == 0) {
                echo 'No streams available';
            }
            ?>
        </ul>
    </div>

    <div id="NL" class="tabcontent">
        <h3>Dutch Streamers</h3>
        <ul class="streamers__list">

            <?php
            $counter = 0;
            if (!empty($streamers)) {
                foreach ($streamers as $key => $item) {
                    if ($item["languageId"] == "nl") { ?>
                        <li class="streamers--item">

                            <!-- Social Media links -->
                            <a class="streamer--item__share">
                                <i class="fas fa-share"></i>
                            </a>
                            <div class="streamer--item__social">
                                <a target="_blank"
                                   href="http://www.facebook.com/sharer/sharer.php?u=https://mixer.com/<?php echo $item["token"] ?>">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a target="_blank"
                                   href="http://twitter.com/share?url=https://mixer.com/<?php echo $item["token"] ?>&text=<?php echo $item["token"] ?>&nbsp;-&nbsp;<?php echo $item["name"] ?>:">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a target="_blank"
                                   href="https://plus.google.com/share?url=https://mixer.com/<?php echo $item["token"] ?>">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a target="_blank"
                                   href="http://reddit.com/submit?url=https://mixer.com/<?php echo $item["token"] ?>&title=<?php echo $item["token"] ?>&nbsp;-&nbsp;<?php echo $item["name"] ?>:">
                                    <i class="fab fa-reddit"></i>
                                </a>
                            </div>
                            <a href="https://mixer.com/<?php echo $item["token"] ?>"
                               target="_blank">
                                <div class="streamers--item__container">
                                    <div class="streamers--item--image">
                                        <?php
                                        $file = 'https://thumbs.mixer.com/channel/' . $item["id"] . '.small.jpg';
                                        $file_headers = @get_headers($file);
                                        if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                                            ?>
                                            <img class="streamers--item__cover"
                                                 src="<?php echo $item["type"]["coverUrl"] ?>"/>
                                        <?php } else { ?>
                                            <img class="streamers--item__cover"
                                                 src="https://thumbs.mixer.com/channel/<?php echo $item["id"] ?>.small.jpg"/>
                                        <?php } ?>

                                        <img class="streamers--item__icon"
                                             src="https://mixer.com/api/v1/users/<?php echo $item["userId"] ?>/avatar?w=128&h=128"/>
                                    </div>
                                    <span class="streamer--item__title"><i
                                                class="streamer--item__live fas fa-circle"></i> <?php echo $item["token"] ?> </span>
                                    <span class="streamer-title"><?php echo $item["name"] ?></span>
                                </div>
                            </a>
                            <?php if (!$_SESSION['email'] == '') { ?>
                                <a class="streamer-star
                            <?php
                                if (!empty($favorites)) {
                                    foreach ($favorites as $favorite) {
                                        if ($favorite->Streamer_streamID == $item["id"]) {
                                            echo ' active';
                                        } else {
                                            echo '';
                                        }
                                    }
                                } ?>
                            " href="#" id="<?php echo $item["id"] ?> "><i class="fas fa-star"></i></a>
                            <?php } ?>
                        </li>
                        <?php $counter++;
                    }
                }
            }

            ?>
            <?php

            $counter = 0;
            if (!empty($streamersTwitch)) {
                foreach ($streamersTwitch["streams"] as $key => $item) {
                    if ($item["channel"]["language"] == "nl") { ?>
                        <li class="streamers--item">
                            <!-- Social Media links -->
                            <a class="streamer--item__share">
                                <i class="fas fa-share"></i>
                            </a>
                            <div class="streamer--item__social">
                                <a target="_blank"
                                   href="http://www.facebook.com/sharer/sharer.php?u=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a target="_blank"
                                   href="http://twitter.com/share?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>&text=<?php echo $item["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item["channel"]["status"] ?>:">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a target="_blank"
                                   href="https://plus.google.com/share?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a target="_blank"
                                   href="http://reddit.com/submit?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>&title=<?php echo $item["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item["channel"]["status"] ?>:">
                                    <i class="fab fa-reddit"></i>
                                </a>
                            </div>

                            <a href="<?php echo $item["channel"]["url"] ?>"
                               target="_blank">
                                <div class="streamers--item__container">
                                    <div class="streamers--item--image">
                                        <img class="streamers--item__cover"
                                             src="<?php echo $item["preview"]["medium"] ?>"/>

                                        <img class="streamers--item__icon"
                                             src="<?php echo $item["channel"]["logo"] ?>"/>
                                    </div>
                                    <span class="streamer--item__title"><i
                                                class="streamer--item__live fas fa-circle"></i> <?php echo $item["channel"]["display_name"] ?> </span>
                                    <span class="streamer-title"><?php echo $item["channel"]["status"] ?></span>
                                </div>
                            </a>
                            <?php if (!$_SESSION['email'] == '') { ?>
                                <a class="streamer-star
                            <?php
                                if (!empty($favorites)) {
                                    foreach ($favorites as $favorite) {
                                        if ($favorite->Streamer_streamID == $item["_id"]) {
                                            echo ' active';
                                        } else {
                                            echo '';
                                        }
                                    }
                                } ?>
                            " href="#" id="<?php echo $item["_id"] ?> "><i class="fas fa-star"></i></a>
                            <?php } ?>
                        </li>
                        <?php $counter++;

                    }
                }
            }
            if ($counter == 0) {
                echo 'No streams available';
            }
            ?>
        </ul>
    </div>

</div>

<div class="container streamers-container favorite-container">

    <h1 class="homepage-title"> Favorites </h1>

    <div class="filterBar-container">
        <div class="filterBar--inner">
            <div class="dateFilter">
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'all')"><i
                            class="filter-icon fas fa-filter"></i></a>
                <a class="tablinks dateFilter--item active" href="#" id="onlineNav">online</a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'all')">all</a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'lol')">League of Legends</a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'dota2')">Dota 2</a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'overwatch')">Overwatch</a>
            </div>
        </div>
    </div>
    <div id="lol" class="tabcontent">
        <?php
        $counter = 0;
        if (!empty($favoritePage)) {
            foreach ($favoritePage as $key => $item) {
                if ($item["type"]["name"] == "League of legends") {
                    if ($counter == 0) { ?>
                        <h3>League of Legends</h3>
                        <ul class="streamers__list">
                    <?php } ?>
                    <li class="streamers--item <?php if ($item["online"] == true) echo ' online' ?>">
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
                                <span class="streamer--item__title">
                                    <?php if ($item['online'] == true) { ?>
                                        <i class="streamer--item__live fas fa-circle"></i>
                                    <?php } ?>
                                    <?php echo $item["token"] ?> </span>
                                <div class="streamer-title-wrapper">
                                    <p class="streamer-title"><?php echo $item["name"] ?></p>
                                </div>
                            </div>
                        </a>
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
                    </li>
                    <?php $counter++;
                }
            } ?>
            </ul>
            <?php
        }?>
    </div>
    <div id="dota2" class="tabcontent">

        <?php
        $counter = 0;
        if (!empty($favoritePage)) {
            foreach ($favoritePage as $key => $item) {
                if ($item["type"]["name"] == "Dota 2") {
                    if ($counter == 0) { ?>
                        <h3>Dota 2</h3>
                        <ul class="streamers__list">
                    <?php } ?>
                    <li class="streamers--item <?php if ($item["online"] == true) echo ' online' ?>">
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
                                <span class="streamer--item__title">
                                    <?php if ($item['online'] == true) { ?>
                                        <i class="streamer--item__live fas fa-circle"></i>
                                    <?php } ?>
                                    <?php echo $item["token"] ?> </span>
                                <div class="streamer-title-wrapper">
                                    <p class="streamer-title"><?php echo $item["name"] ?></p>
                                </div>
                            </div>
                        </a>
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
                    </li>
                    <?php $counter++;
                }
            } ?>
            </ul>
            <?php
        }?>

    </div>

    <div id="overwatch" class="tabcontent">

        <?php
        $counter = 0;
        if (!empty($favoritePage)) {
            foreach ($favoritePage as $key => $item) {
                if ($item["type"]["name"] == "Overwatch") {
                    if ($counter == 0) { ?>
                        <h3>Overwatch</h3>
                        <ul class="streamers__list">
                    <?php } ?>
                    <li class="streamers--item <?php if ($item["online"] == true) echo ' online' ?>">
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
                                <span class="streamer--item__title">
                                    <?php if ($item['online'] == true) { ?>
                                        <i class="streamer--item__live fas fa-circle"></i>
                                    <?php } ?>
                                    <?php echo $item["token"] ?> </span>
                                <div class="streamer-title-wrapper">
                                    <p class="streamer-title"><?php echo $item["name"] ?></p>
                                </div>
                            </div>
                        </a>
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
                    </li>
                    <?php $counter++;
                }
            } ?>
            </ul>
            <?php
        }?>
    </div>

</div>

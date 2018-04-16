<div class="container  streamers-container homepage-container">

    <h2 class="homepage-title"> Upcoming events </h2>

    <ul class="slider">
        <?php
        $break = 0;
        if (!empty($slider)) {
            foreach ($slider as $key => $item) { ?>
                <li class="slider-item">
                    <span class="slider-item--date">
                        <p class="slider-item--content__time"><?php echo date('d F H:i', strtotime($item["begin_at"]) + 60 * 60) ?></p>
                    </span>
                    <span class="slider-item--icon">
                        <img class="slider-item--icon__image" src=" <?php echo $item["league"]["image_url"] ?> "/>
                    </span>
                    <span class="slider-item--content">
                        <p class="slider-item--content__name">
                            <?php if ($item["videogame"]['name'] == 'LoL') {
                                echo 'League of Legends';
                            } else {
                                echo $item["videogame"]['name'];
                            } ?>
                        </p>
                        <div class="slider-desc--matchup">
                            <?php if (!$item["opponents"] == null || !$item["opponents"] == "") { ?>
                                <?php $oppCounter = 0; ?>
                                <?php foreach ($item["opponents"] as $key => $itemOpponents) { ?>
                                    <?php if ($oppCounter !== 0) { ?>
                                        <p class="slider-desc--matchup__vs">VS</p>
                                    <?php } ?>




                                    <div class="slider-desc--matchup__item">
                                        <?php if (!$itemOpponents["opponent"]["image_url"] == null || !$itemOpponents["opponent"]["image_url"] == "") { ?>
                                            <img class="slider-desc--matchup__img"
                                                 src="<?php echo $itemOpponents['opponent']["image_url"] ?>"/>
                                        <?php } ?>
                                        <p class="game"><?php echo $itemOpponents['opponent']['name'] ?> </p>
                                    </div>
                                    <?php $oppCounter++; ?>
                                <?php } ?>
                            <?php } else { ?>
                                <p>No match data available</p>

                            <?php } ?>
                        </div>
                        <p class="slider-item--content__tournament"> TOURNAMENT: </p>
                        <p class="slider-item--content__tournamentname"> <?php echo $item["tournament"]['name'] ?></p>
                    </span>
                </li>
                <?php
                $break++;
                if ($break == 5) break;
            }
        } ?>

    </ul>
    <?php if (!$_SESSION['email'] == '') { ?>
        <h2 class="homepage-title">Favorites</h2>
        <ul class="streamers__list">

            <?php
            $counter = 0;
            if (!empty($favoritePage)) {
                foreach ($favoritePage as $key => $item) {
                    if ($item["online"]== true) {
                        ?>
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
                        <?php
                        if ($item["online"]== true) {
                            $counter++;
                        }
                        if ($counter == 5) {
                            break;
                        }
                    }
                }
            } else {
                echo '<p> You have not selected any favorites yet. to do that go to the <a href="streams">Streamers</a> page</p>';
            }
            ?>
        </ul>
    <?php } ?>
</div>

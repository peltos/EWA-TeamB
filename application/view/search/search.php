<div class="container streamers-container search-container">

    <h3>Searches</h3>
    <form action="<?php echo URL; ?>search/redirect" method="POST">
        <input type="text" name="search-input" value=""/>
        <input type="submit" name="search" value="Submit"/>
        <p><?php echo $message ?></p>
    </form>
    <?php if ($favoritePageMixer !== null && $favoritePageTwitch !== null) { ?>
        <div class="tabcontent">
            <?php
            $counter = 0;
            if (!empty($favoritePageMixer)) {
                foreach ($favoritePageMixer as $key => $item) {
                    if ($counter == 0) { ?>
                        <ul class="streamers__list">
                    <?php } ?>
                    <li class="streamers--item <?php if ($item["online"] == true) echo ' online' ?>">
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
                        <a class="streamer--item__content" href="https://mixer.com/<?php echo $item["token"] ?>"
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

                } ?>
                <?php
            } ?>
            <?php
            if (!empty($favoritePageTwitch)) {
                foreach ($favoritePageTwitch as $key => $item) {
                if ($counter == 0) { ?>
                <h3>Searches</h3>
                <ul class="streamers__list">
                    <?php } ?>
                    <li class="streamers--item <?php if ($item['stream']["stream_type"] == 'live') echo ' online' ?>">
                        <!-- Social Media links -->
                        <a class="streamer--item__share">
                            <i class="fas fa-share"></i>
                        </a>
                        <div class="streamer--item__social">
                            <a target="_blank"
                               href="http://www.facebook.com/sharer/sharer.php?u=https://twitch.tv/<?php echo $item['stream']["channel"]["display_name"] ?>">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a target="_blank"
                               href="http://twitter.com/share?url=https://twitch.tv/<?php echo $item['stream']["channel"]["display_name"] ?>&text=<?php echo $item['stream']["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item['stream']["channel"]["status"] ?>:">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a target="_blank"
                               href="https://plus.google.com/share?url=https://twitch.tv/<?php echo $item['stream']["channel"]["display_name"] ?>">
                                <i class="fab fa-google"></i>
                            </a>
                            <a target="_blank"
                               href="http://reddit.com/submit?url=https://twitch.tv/<?php echo $item['stream']["channel"]["display_name"] ?>&title=<?php echo $item['stream']["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item['stream']["channel"]["status"] ?>:">
                                <i class="fab fa-reddit"></i>
                            </a>
                        </div>
                        <a class="streamer--item__content" href="<?php echo $item['stream']["channel"]["url"] ?>"
                           target="_blank">
                            <div class="streamers--item__container">
                                <div class="streamers--item--image">

                                    <img class="streamers--item__cover"
                                         src="<?php echo $item['stream']["preview"]["medium"] ?>"/>

                                    <img class="streamers--item__icon"
                                         src="<?php echo $item['stream']["channel"]["logo"] ?>"/>
                                </div>
                                <span class="streamer--item__title"><i
                                            class="streamer--item__live fas fa-circle"></i> <?php echo $item['stream']["channel"]["display_name"] ?> </span>
                                <span class="streamer-title"><?php echo $item['stream']["channel"]["status"] ?></span>
                            </div>
                        </a>
                        <?php if (!$_SESSION['email'] == '') { ?>
                        <a class="streamer-star
                                <?php
                        if (!empty($favorites)) {
                            foreach ($favorites as $favorite) {
                                if ($favorite->Streamer_streamID == $item['stream']["_id"]) {
                                    echo ' active';
                                } else {
                                    echo '';
                                }
                            }
                        } ?>
                                " href="#" id="<?php echo $item['stream']["_id"] ?> "><i class="fas fa-star"></i></a>
                    </li>
                <?php }
                $counter++;

                }

            }
            ?>
        </div>

    <?php } ?>
</div>

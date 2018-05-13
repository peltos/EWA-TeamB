<?php if (isset($item["stream"])) { ?>
    <li class="streamers--item <?php if ($item['stream']["stream_type"] == 'live') echo 'online' ?>">
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
            <a class="streamer-star <?php if (!empty($favorites)) {
                foreach ($favorites as $favorite) {
                    if ($favorite->Streamer_streamID == $item['stream']["_id"]) {
                        echo ' active';
                    } else {
                        echo '';
                    }
                }
            } ?>" href="#" id="<?php echo $item['stream']["_id"] ?> "><i class="fas fa-star"></i></a>

        <?php } ?>
    </li>
<?php } else { ?>
    <li class="streamers--item online">
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

        <a class="streamer--item__content" href="<?php echo $item["channel"]["url"] ?>"
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
    <?php
}
$counter++; ?>
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
    <a class="streamer-star <?php if (!empty($favorites)) {
        foreach ($favorites as $favorite) {
            if ($favorite->Streamer_streamID == $item["id"]) {
                echo ' active';
            } else {
                echo '';
            }
        }
    } ?>" href="#" id="<?php echo $item["id"] ?> "><i class="fas fa-star"></i></a>
</li>
<?php $counter++; ?>
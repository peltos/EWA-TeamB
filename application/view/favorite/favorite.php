<div class="container streamers-container favorite-container">

    <h1 class="homepage-title"> Favorites </h1>

    <div id="overwatch" class="tabcontent">
        <h3>Overwatch</h3>
        <ul class="streamers__list">

            <?php
            $counter = 0;
            if (!empty($favoritePage)) {
                foreach ($favoritePage as $key => $item) { ?>
                    <li class="streamers--item">
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
            }
            if ($counter == 0) {
                echo 'No streams available';
            }
            ?>
    </div>

</div>

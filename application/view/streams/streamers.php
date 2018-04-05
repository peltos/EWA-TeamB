<div class="container streamers-container">
    <h1>Streamers</h1>
    <div class="filterBar-container">
        <div class="filterBar--inner">
            <div class="dateFilter">
                <a class="tablinks dateFilter--item" href="#"><i class="filter-icon fas fa-filter"></i></a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'all')">all</a>
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

                        <a class="streamers--item" href="https://mixer.com/<?php echo $item["token"] ?>"
                           target="_blank">
                            <div class="streamers--item__container">
                                <div class="streamers--item--image">
                                    <?php
                                    $file = 'https://thumbs.mixer.com/channel/' . $item["id"] .'.small.jpg';
                                    $file_headers = @get_headers($file);
                                    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                                        ?>
                                        <img class="streamers--item__cover" src="<?php echo $item["type"]["coverUrl"] ?>"/>
                                    <?php } else { ?>
                                        <img class="streamers--item__cover" src="https://thumbs.mixer.com/channel/<?php echo $item["id"] ?>.small.jpg"/>
                                    <?php } ?>

                                    <img class="streamers--item__icon"
                                         src="https://mixer.com/api/v1/users/<?php echo $item["userId"] ?>/avatar?w=128&h=128"/>
                                </div>
                                <span class="streamer--item__title"><i class="streamer--item__live fas fa-circle"></i> <?php echo $item["token"] ?> </span>
                              <div class="streamer-title-wrapper">
                                <span class="streamer-title"><?php echo $item["name"] ?></span>
                              </div>
                            </div>
                        </a>
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

                        <a class="streamers--item" href="https://mixer.com/<?php echo $item["token"] ?>"
                           target="_blank">
                            <div class="streamers--item__container">
                                <div class="streamers--item--image">
                                    <?php
                                    $file = 'https://thumbs.mixer.com/channel/' . $item["id"] .'.small.jpg';
                                    $file_headers = @get_headers($file);
                                    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                                        ?>
                                        <img class="streamers--item__cover" src="<?php echo $item["type"]["coverUrl"] ?>"/>
                                    <?php } else { ?>
                                        <img class="streamers--item__cover" src="https://thumbs.mixer.com/channel/<?php echo $item["id"] ?>.small.jpg"/>
                                    <?php } ?>

                                    <img class="streamers--item__icon"
                                         src="https://mixer.com/api/v1/users/<?php echo $item["userId"] ?>/avatar?w=128&h=128"/>
                                </div>
                                <span class="streamer--item__title"><i class="streamer--item__live fas fa-circle"></i> <?php echo $item["token"] ?> </span>
                              <div class="streamer-title-wrapper">
                                <span class="streamer-title"><?php echo $item["name"] ?></span>
                              </div>
                            </div>
                        </a>
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

                      <!-- Social Media links -->
                      <div class="streamer--item__social">
                        <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=https://mixer.com/<?php echo $item["token"] ?>">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                        <a target="_blank" href="http://twitter.com/share?url=https://mixer.com/<?php echo $item["token"] ?>&text=<?php echo $item["token"] ?>&nbsp;-&nbsp;<?php echo $item["name"] ?>:">
                          <i class="fab fa-twitter"></i>
                        </a>
                        <a target="_blank" href="https://plus.google.com/share?url=https://mixer.com/<?php echo $item["token"] ?>">
                          <i class="fab fa-google"></i>
                        </a>
                        <a target="_blank" href="http://reddit.com/submit?url=https://mixer.com/<?php echo $item["token"] ?>&title=<?php echo $item["token"] ?>&nbsp;-&nbsp;<?php echo $item["name"] ?>:">
                          <i class="fab fa-reddit"></i>
                        </a>
                      </div>
                        <a class="streamers--item" href="https://mixer.com/<?php echo $item["token"] ?>"
                           target="_blank">
                            <div class="streamers--item__container">
                                <div class="streamers--item--image">
                                    <?php
                                    $file = 'https://thumbs.mixer.com/channel/' . $item["id"] .'.small.jpg';
                                    $file_headers = @get_headers($file);
                                    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                                    ?>
                                        <img class="streamers--item__cover" src="<?php echo $item["type"]["coverUrl"] ?>"/>
                                    <?php } else { ?>
                                        <img class="streamers--item__cover" src="https://thumbs.mixer.com/channel/<?php echo $item["id"] ?>.small.jpg"/>
                                    <?php } ?>

                                    <img class="streamers--item__icon"
                                         src="https://mixer.com/api/v1/users/<?php echo $item["userId"] ?>/avatar?w=128&h=128"/>
                                </div>
                                    <span class="streamer--item__title"><i class="streamer--item__live fas fa-circle"></i> <?php echo $item["token"] ?> </span>
                                  <div class="streamer-title-wrapper">
                                    <div class="streamer-title"><?php echo $item["name"] ?></div>
                                  </div>
                            </div>
                        </a>
                        <?php $counter++;
                    }
                }
            }
            if ($counter == 0) {
                echo 'No streams available';
            }
            ?>
    </div>

    </ul>

</div>

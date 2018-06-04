<div class="container search-container">

    <h3>Search</h3>
    <form class="search-page" action="<?php echo URL; ?>search/redirect" method="POST">
        <input type="text" name="search-input" placeholder="Search..." value=""/>
        <input type="submit" name="search" value="Search"/>
        <p><?php echo $message ?></p>
    </form>

    <?php //Start: Searching for streamers ?>

    <?php if ($favoritePageMixer !== null && $favoritePageTwitch !== null) { ?>
        <ul class="streamers__list">
            <?php
            $counter = 0;

            // Mixer streamers

            if (!empty($favoritePageMixer)) {
                foreach ($favoritePageMixer as $key => $item) {
                    if ($item["online"] == true) {
                        if ($counter < 4) {
                            include APP . 'view/_templates/streamer-mixer.php';
                        }
                    }
                }
            }

            // Twitch streamers

            if (!empty($favoritePageTwitch)) {
                foreach ($favoritePageTwitch as $key => $item) {
                    if (!$item['stream'] == null) {
                        if ($counter < 4) {
                            include APP . 'view/_templates/streamer-twitch.php';
                        }
                    }
                }
            }
            ?>
        </ul>

    <?php } ?>

    <?php //End: Searching for streamers ?>

</div>

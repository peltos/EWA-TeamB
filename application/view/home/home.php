<div class="container homepage-container">

    <h2 class="homepage-title">
        <div>
            <a href="streams" class="home-title">Recommended Streams</a>
            <span class="tooltip">
                <i class="fas fa-info-circle"></i>
                <span class="tooltiptext">Our recommendations based on currently most followed channels.</span>
            </span>
        </div>
        <a class="view-more btn" href="streams">View More...</a>
    </h2>

    <?php //Start: Recommended Streamers ?>

    <ul class="streamers__list">
        <?php
        $counter = 0;

        // Mixer streamers

        if (!empty($favoritePageRecommendedMixer)) {
            foreach ($favoritePageRecommendedMixer as $key => $item) {
                if ($item["online"] == true) {
                    if ($counter < 4) {
                        include APP . 'view/_templates/streamer-mixer.php';
                    }
                }
            }
        }

        // Twitch streamers

        if (!empty($favoritePageRecommendedTwitch)) {
            foreach ($favoritePageRecommendedTwitch as $key => $item) {
                if (!$item['stream'] == null) {
                    if ($counter < 4) {
                        include APP . 'view/_templates/streamer-twitch.php';
                    }
                }
            }
        }
        ?>
    </ul>

    <?php //End: Recommended Streamers ?>

    <?php //Start: Followed Streamers ?>

    <?php if (!$_SESSION['email'] == '') { ?>
        <h2 class="homepage-title">
            <div>
                <a href="favorite" class="home-title">Followed Channels</a>
                <span class="tooltip">
                    <i class="fas fa-info-circle"></i>
                    <span class="tooltiptext"> Check out your favorite streamers that are online. </span>
                </span>
            </div>
            <a class="view-more btn" href="favorite">View More...</a>
        </h2>
        <ul class="streamers__list">
            <?php
            $counter = 0;

            // Mixer streamers

            if (!empty($favoritePage)) {
                foreach ($favoritePage as $key => $item) {
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
        <div class="view-more__container">
        </div>
    <?php } ?>

    <?php //End: Followed Streamers ?>

</div>

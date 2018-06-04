<div class="container homepage-container">
    <h2 class="homepage-title">Recommended Streams</h2>
    <ul class="streamers__list">

        <?php  ?>


                <?php
                $counter = 0;
                if (!empty($favoritePageRecommendedMixer)) {
                    foreach ($favoritePageRecommendedMixer as $key => $item) {
                        if ($item["online"] == true) {
                            if ($counter < 4) {
                                include APP . 'view/_templates/streamer-mixer.php';
                            }
                        }
                    }
                }

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

        <?php  ?>
        <?php if (!$_SESSION['email'] == '') { ?>

            <h2 class="homepage-title">Followed Channels</h2>
            <ul class="streamers__list" >
                <?php 
                $counter = 0;
                if (!empty($favoritePage)) {
                    foreach ($favoritePage as $key => $item) {
                        if ($item["online"] == true) {
                            if ($counter < 4) {
                                include APP . 'view/_templates/streamer-mixer.php';
                            }
                        }
                    }
                }

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
</div>

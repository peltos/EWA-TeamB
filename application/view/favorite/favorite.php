<div class="container favorite-container">

    <h1 class="homepage-title"> Followers </h1>

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
        <h3>League of Legends</h3>
        <ul class="streamers__list">
            <?php
            $counter = 0;

            $filter = 'League of legends';
            if (!empty($favoritePageMixer)) {
                foreach ($favoritePageMixer as $key => $item) {
                    if ($item["type"]["name"] == $filter) {
                        include APP . 'view/_templates/streamer-mixer.php';
                    }
                }
            }

            $filter = 'League of Legends';
            if (!empty($favoritePageTwitch)) {
                foreach ($favoritePageTwitch as $key => $item) {
                    if (!$item['stream'] == null) {
                        if ($item['stream']["channel"]["game"] == $filter) {
                            include APP . 'view/_templates/streamer-twitch.php';
                        }
                    }
                }
            } ?>
        </ul>
    </div>

    <div id="dota2" class="tabcontent">
        <h3>Dota 2</h3>
        <ul class="streamers__list">
            <?php
            $counter = 0;

            $filter = 'Dota 2';
            if (!empty($favoritePageMixer)) {
                foreach ($favoritePageMixer as $key => $item) {
                    if ($item["type"]["name"] == $filter) {
                        include APP . 'view/_templates/streamer-mixer.php';
                    }
                }
            }

            $filter = 'Dota 2';
            if (!empty($favoritePageTwitch)) {
                foreach ($favoritePageTwitch as $key => $item) {
                    if (!$item['stream'] == null) {
                        if ($item['stream']["channel"]["game"] == $filter) {
                            include APP . 'view/_templates/streamer-twitch.php';
                        }
                    }
                }
            } ?>
        </ul>
    </div>

    <div id="overwatch" class="tabcontent">
        <h3>Overwatch</h3>
        <ul class="streamers__list">
            <?php
            $counter = 0;

            $filter = 'Overwatch';
            if (!empty($favoritePageMixer)) {
                foreach ($favoritePageMixer as $key => $item) {
                    if ($item["type"]["name"] == $filter) {
                        include APP . 'view/_templates/streamer-mixer.php';
                    }
                }
            }

            $filter = 'Overwatch';
            if (!empty($favoritePageTwitch)) {
                foreach ($favoritePageTwitch as $key => $item) {
                    if (!$item['stream'] == null) {
                        if ($item['stream']["channel"]["game"] == $filter) {
                            include APP . 'view/_templates/streamer-twitch.php';
                        }
                    }
                }
            } ?>
        </ul>
    </div>

</div>

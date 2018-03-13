<div class="container timeline-container" data-url="<?php if (!empty($url)) echo $url ?>">

  <h2>Tournament Events</h2></br>

    <ul class="timeline">
        <?php
        $counter = 0;
        if (!empty($timeline)) {
            foreach ($timeline as $key => $item) {
                echo '<li>';
                    if($counter % 2 == 0){
                        echo '<div class="direction-r">';
                    }
                    else{
                        echo '<div class="direction-l">';
                    }
                        echo '<div class="flag-wrapper">';
                            echo '<span class="hexa"></span>';
                            echo '<span class="flag">' .$item["name"] . '</span>';
                            echo '<span class="time-wrapper"><span class="time"><b>' . date('d F H:i', strtotime($item["begin_at"])) . '</b></span>';
                        echo '</div>';
                        echo '<div class="desc">';
                          if(!$item["opponents"] == null || !$item["opponents"] == ""){
                            echo '<span class="game">' .$item["opponents"][0]['opponent']['name'] . ' vs. </span>',
                                 '<span class="game">' .$item["opponents"][1]['opponent']['name'] . '</span></br>';
                                 if(!$item["opponents"][0]["opponent"]["image_url"] == null || !$item["opponents"][0]["opponent"]["image_url"] == ""){
                                   echo '<img src="' .$item["opponents"][0]['opponent']["image_url"] . '"/>',
                                        '<img src="' .$item["opponents"][1]['opponent']["image_url"] . '"/>';
                                 }
                          }

                          if(!$item["league"]['url'] == null){
                            echo '<span class="league-name">' .$item["league"]['name'] . '</span>',
                                 '<a href="' .$item["league"]['url'] . '" target="_blank"> Go to league website</a></br>';

                          }

                          echo '<span class="game">' .$item["videogame"]['name'] . '</span>',
                                '<span class="rounds">' .$item["number_of_games"] . '</span>',
                                '<span class="season">' .$item["tournament"]['name'] . '</span>',
                                '<img src="' .$item["league"]["image_url"] .
                             '"/></div>' ;
                    echo '</div>';
                echo '</li>';
                $counter++;
            }
        }
        ?>
    </ul>
</div>

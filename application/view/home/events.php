<div class="container timeline-container" data-url="<?php if (!empty($url)) echo $url ?>">

  <h2>Tournament Events</h2>

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
                            echo '<span class="flag">' . $item["name"] . '</span>';
                            echo '<span class="time-wrapper"><span class="time"><b>' . date('d F H:i', strtotime($item["begin_at"])) . '</b></span>';
                        echo '</div>';
                        echo '<div class="desc">' .
                                '<span class="game">' . $item["videogame"]['name'] . '</span>',
                                '<span class="rounds">' . $item["number_of_games"] . '</span>',
                                '<span class="season">' . $item["tournament"]['name'] . '</span>',
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

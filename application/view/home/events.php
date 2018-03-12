<div class="container timeline-container" data-url="<?php if (!empty($url)) echo $url ?>">

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
                            echo '<span class="time-wrapper"><span class="time">' . $item["begin_at"] . '</span>';
                        echo '</div>';
                        echo '<div class="desc">' .
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

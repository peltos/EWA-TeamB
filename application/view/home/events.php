<div class="container timeline-container" data-url="<?php if (!empty($url)) echo $url ?>">

    <h2>Tournament Events</h2></br>

    <ul class="timeline">
        <?php
        $counter = 0;
        if (!empty($timeline)) {
            foreach ($timeline

                     as $key => $item) { ?>
                <li>
                    <?php
                    if ($counter % 2 == 0) {
                        echo '<div class="direction-r">';
                    } else {
                        echo '<div class="direction-l">';
                    }
                    ?>
                    <div class="flag-wrapper">
                        <span class="hexa"></span>
                        <span class="flag"> <?php echo $item["name"] ?></span>
                        <span class="time-wrapper">
                            <span class="time"><?php echo date('d F H:i', strtotime($item["begin_at"])) ?></span>
                        </span>
                    </div>
                    <div class="desc">
                        <?php if (!$item["opponents"] == null || !$item["opponents"] == "") { ?>
                            <p class="game"><?php echo $item["opponents"][0]['opponent']['name'] ?> vs. </p>
                            <p class="game"><?php echo $item["opponents"][1]['opponent']['name'] ?> </p>
                            <?php if (!$item["opponents"][0]["opponent"]["image_url"] == null || !$item["opponents"][0]["opponent"]["image_url"] == "") { ?>
                                <img src="<?php echo $item["opponents"][0]['opponent']["image_url"] ?>"/>
                                <img src="<?php echo $item["opponents"][1]['opponent']["image_url"] ?>"/>
                            <?php }
                        } ?>

                        <?php if (!$item["league"]['url'] == null) { ?>
                            <span class="league-name"><?php echo $item["league"]['name'] ?></span>
                            <a href="<?php echo $item["league"]['url'] ?>" target="_blank"> Go to league
                                website</a></br>
                        <?php } ?>

                        <span class="game"><?php echo $item["videogame"]['name'] ?></span>
                        <span class="rounds"><?php echo $item["number_of_games"] ?></span>
                        <span class="season"><?php echo $item["tournament"]['name'] ?></span>
                        <img src="<?php echo $item["league"]["image_url"] ?>"/>
                    </div>

                </li>
                <?php $counter++;
            }
        }
        ?>
    </ul>
</div>

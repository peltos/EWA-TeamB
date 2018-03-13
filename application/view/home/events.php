<div class="container timeline-container" data-url="<?php if (!empty($url)) echo $url ?>">

    <h2>Tournament Events</h2></br>

    <ul class="timeline">
        <?php
        $counter = 0;
        if (!empty($timeline)) {
            foreach ($timeline as $key => $item) { ?>
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
                        <div class="flag">
                            <span class="flag-title-league">
                                <img class="flag-title-league__image" src=" <?php echo $item["league"]["image_url"] ?> "/>
                                <p class="flag-title-league__name"><?php echo $item["league"]['name'] ?></p>
                            </span>
                            <span class="flag-title-match">
                                <span class="game">
                                    <?php if($item["videogame"]['name'] == 'LoL'){
                                        echo  'League of Legends';
                                    }else{
                                        echo  $item["videogame"]['name'];
                                    }?>
                                </span>
                                 -
                                <?php echo $item["name"] ?>
                            </span>
                            <span class="flag-title-season">
                                Tournament: <?php echo $item["tournament"]['name'] ?>
                            </span>
                        </div>
                        <span class="time-wrapper">
                        <span class="time"><?php echo date('d F H:i', strtotime($item["begin_at"])) ?></span>
                    </span>
                    </div>
                    <div class="timeline-desc">

                        <p class="timeline-desc--title"><?php echo $item["league"]['name'] ?></p>

                        <div class="timeline-desc--matchup">
                        <?php if (!$item["opponents"] == null || !$item["opponents"] == "") { ?>
                                <?php foreach ($item["opponents"] as $key => $itemOpponents) { ?>
                                    <div class="timeline-desc--matchup__item">
                                        <?php if (!$itemOpponents["opponent"]["image_url"] == null || !$itemOpponents["opponent"]["image_url"] == "") { ?>
                                            <img class="timeline-desc--matchup__img"
                                                 src="<?php echo $itemOpponents['opponent']["image_url"] ?>"/>
                                        <?php } ?>
                                        <p class="game"><?php echo $itemOpponents['opponent']['name'] ?> </p>
                                    </div>
                                <?php } ?>
                        <?php }

                        else{ ?>
                            <p>No opponents available</p>

                        <?php } ?>

                        </div>
                        <?php if (!$item["league"]['url'] == null) { ?>
                            <a href="<?php echo $item["league"]['url'] ?>" target="_blank"> Go to league
                                website</a></br>
                        <?php } ?>
                    </div>

                </li>
                <?php $counter++;
            }
        }
        ?>
    </ul>
</div>

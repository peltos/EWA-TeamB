<?php require APP . 'view/tournaments/eventsheader.php'; ?>

<div class="resultFilter"><?php echo count($timeline); ?> Result(s)</div>
<ul class="timeline">
    <?php
    $counter = 0;
    if (!empty($timeline)) {
        foreach ($timeline as $key => $item) { ?>

            <?php
            if ($item["videogame"]['name'] == 'dota-2') { ?>
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
                                <img class="flag-title-league__image"
                                     src=" <?php echo $item["league"]["image_url"] ?> "/>
                                <p class="flag-title-league__name"> &nbsp <?php echo $item["league"]['name'] ?></p>
                            </span>
                        <span class="flag-title-match">
                                <span class="game-name">
                                    <?php if ($item["videogame"]['name'] == 'LoL') {
                                        echo 'League of Legends';
                                    } else {
                                        echo $item["videogame"]['name'];
                                    } ?>
                                </span>
                                <span class="event-name">&nbsp (<?php echo $item["name"] ?>) </span>
                            </span>
                        <span class="flag-title-season season-name">
                                TOURNAMENT: <?php echo $item["tournament"]['name'] ?>
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
                        <?php } else { ?>
                            <p>No match data available</p>

                        <?php } ?>

                    </div>
                    <span class="rounds"><?php echo $item["number_of_games"] ?> ROUND(S) </span>
                    <?php if (!$item["league"]['url'] == null) { ?>
                        <a href="<?php echo $item["league"]['url'] ?>" target="_blank"> Go to league
                            website</a></br>
                    <?php } ?>
                </div>


                <?php $counter++;
            } ?>
            </li>
            <?php
        }
    }
    ?>
</ul>
</div>

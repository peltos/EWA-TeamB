<div class="container homepage">

    <ul class="slider">
        <?php
        $break = 0;
        if (!empty($slider)) {
            foreach ($slider as $key => $item) { ?>
                <li class="slider-item">
                    <span class="slider-item--date">
                        <p class="slider-item--content__time"><?php echo date('d F H:i', strtotime($item["begin_at"]) + 60 * 60) ?></p>
                    </span>
                    <span class="slider-item--icon">
                        <img class="slider-item--icon__image" src=" <?php echo $item["league"]["image_url"] ?> "/>
                    </span>
                    <span class="slider-item--content">
                        <p class="slider-item--content__name">
                            <?php if ($item["videogame"]['name'] == 'LoL') {
                                echo 'League of Legends';
                            } else {
                                echo $item["videogame"]['name'];
                            } ?>
                        </p>
                        <div class="slider-desc--matchup">
                            <?php if (!$item["opponents"] == null || !$item["opponents"] == "") { ?>
                                <?php $oppCounter = 0; ?>
                                <?php foreach ($item["opponents"] as $key => $itemOpponents) { ?>
                                    <?php if($oppCounter !== 0){ ?>
                                        <p class="slider-desc--matchup__vs">VS</p>
                                    <?php } ?>
                                    <div class="slider-desc--matchup__item">
                                        <?php if (!$itemOpponents["opponent"]["image_url"] == null || !$itemOpponents["opponent"]["image_url"] == "") { ?>
                                            <img class="slider-desc--matchup__img"
                                                 src="<?php echo $itemOpponents['opponent']["image_url"] ?>"/>
                                        <?php } ?>
                                        <p class="game"><?php echo $itemOpponents['opponent']['name'] ?> </p>
                                    </div>
                                    <?php $oppCounter++; ?>
                                <?php } ?>
                            <?php } else { ?>
                                <p>No match data available</p>

                            <?php } ?>
                        </div>
                        <p class="slider-item--content__tournament"> TOURNAMENT: </p>
                        <p class="slider-item--content__tournamentname"> <?php echo $item["tournament"]['name'] ?></p>
                    </span>
                </li>
                <?php
                $break++;
                if ($break == 5) break;
            }
        } ?>

    </ul>
</div>

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
                <?php
                if ($item["videogame"]['name'] == 'LoL') {
                    echo 'League of Legends';
                } else {
                    echo $item["videogame"]['name'];
                }
                ?>
            </span>
            <span class="event-name">&nbsp (<?php echo $item["name"] ?>) </span>
        </span>
        <span class="flag-title-season season-name">
            TOURNAMENT: <?php echo $item["tournament"]['name'] ?>
        </span>
    </div>
    <span class="time-wrapper">
        <span class="time"><?php echo date('d F H:i', strtotime($item["begin_at"]) + 60 * 60) ?></span>
    </span>
</div>
<div class="timeline-desc">

    <p class="timeline-desc--title"><?php echo $item["league"]['name'] ?></p>

    <div class="timeline-desc--matchup">
        <?php if (!$item["opponents"] == null || !$item["opponents"] == "") { ?>

            <?php $itemOpponentsCounter = 0; ?>
                <?php foreach ($item["opponents"] as $key => $itemOpponents) { ?>
                <div class="timeline-desc--matchup__item">
        <?php if (!$itemOpponents["opponent"]["image_url"] == null || !$itemOpponents["opponent"]["image_url"] == "") { ?>
                        <img class="timeline-desc--matchup__img"
                             src="<?php echo $itemOpponents['opponent']["image_url"] ?>"/>
                    <?php } else { ?>
                        <img class="no-image" src="<?php echo URL ?>img/no-photo.png">
        <?php } ?>

                    <p class="game"><?php echo $itemOpponents["opponent"]["name"] ?> </p>
                    <p class="score"><?php echo $item["results"][$itemOpponentsCounter]["score"] ?> </p>
                <?php $itemOpponentsCounter++; ?>
                </div>
            <?php } ?>
<?php } else { ?>
            <p>No match data available</p>

<?php } ?>

    </div>
    <span class="rounds"><?php echo $item["number_of_games"] ?> ROUND(S) </span>
<?php if (!$item["league"]['url'] == null) { ?>
        </br><a href="<?php echo $item["league"]['url'] ?>" target="_blank"> Go to league
            website</a>
        <!-- Social Media links -->
        <div class="timeline--desc--social">
            <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $item["league"]['url'] ?>">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a target="_blank" href="http://twitter.com/share?url=<?php echo $item["league"]['url'] ?>&text=<?php echo $item["league"]['name'] ?> - <?php echo $item["tournament"]['name'] ?>: <?php echo $item["name"] ?> ">
                <i class="fab fa-twitter"></i>
            </a>
            <a target="_blank" href="https://plus.google.com/share?url=<?php echo $item["league"]['url'] ?>">
                <i class="fab fa-google"></i>
            </a>
            <a target="_blank" href="http://reddit.com/submit?url=<?php echo $item["league"]['url'] ?>&title=<?php echo $item["league"]['name'] ?> - <?php echo $item["tournament"]['name'] ?>: <?php echo $item["name"] ?> ">
                <i class="fab fa-reddit"></i>
            </a>
        </div>
<?php } ?>
</div>
<?php $counter++; ?>
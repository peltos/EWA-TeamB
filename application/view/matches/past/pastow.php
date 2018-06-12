<?php require APP . 'view/matches/eventsheader.php';
      require APP . 'view/matches/past/pastfilter.php';

$counterFilter = 0;

foreach ($timeline as $key => $item) {
    if ($item["videogame"]['slug'] == 'ow') {
        $counterFilter++;
    }
}
?>


    <div class="resultFilter"><?php
        if (!empty($timeline)) {
            echo $counterFilter  . " Result(s)";
        }else{
            echo "No Result(s)";
        };
        ?>
    </div>
    <ul class="timeline">
    <?php
    $counter = 0;

    // Start: all Matches Items

    if (!empty($timeline)) {
        foreach ($timeline as $key => $item) { ?>

          <?php
          if ($item["videogame"]['slug'] == 'ow') { ?>
                <li>
                    <?php
                    include APP . 'view/_templates/game-result.php';
                }  ?>
                </li>
                <?php
        }
    } else {
      ?>
      <span class="noTimeline">No current events available.</span>
      <?php
    }
    ?>

    </ul>

<?php //End: all Matches Items ?>

<?php require APP . 'view/tournaments/eventsheader.php'; ?>

    <div class="duedhe"><?php
        if (!empty($timeline)) {
            echo count($timeline) . " Result(s)";
        }else{
            echo "No Result(s)";
        };
        ?>
    </div>
    <ul class="timeline">
       <?php
       echo $timeline["sport_event"]["season"]['name']; ?>
    </ul>

</div>

<div class="container streamers-container">
    <h1>Streamers</h1>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'all')">All</button>
        <button class="tablinks" onclick="openCity(event, 'lol')">League of legends</button>
        <button class="tablinks" onclick="openCity(event, 'dota2')">Dota 2</button>
        <button class="tablinks" onclick="openCity(event, 'overwatch')">Overwatch</button>
    </div>
    <div id="lol" class="tabcontent">

        <h3>League of Legends</h3>
        <ul class="streamers__list">
            <?php
            $counter = 0;
            if (!empty($streamers)) {
                foreach ($streamers as $key => $item) {
                    if ($item["type"]["name"] == "League of Legends") {
                        echo '<a class="streamers--item" href="https://mixer.com/' . $item["token"] . '" target="_blank">';
                        echo '<div class="streamers--item__container">';
                        echo '<img src="' . $item["type"]["coverUrl"] . '"/>';
                        echo '<img class="streamers--item__icon" src="https://mixer.com/api/v1/users/' . $item["userId"] . '/avatar?w=128&h=128" /> <br>';
                        echo '<span class="streamer-title">' . $item["token"] . ' - ' . $item["name"] . ' </span>';
                        echo '</br>';
                        echo '</div>';
                        echo '</a>';
                        $counter++;
                    }
                }
            }
            if ($counter == 0) {
                echo 'No streams available';
            }

            ?>
        </ul>
    </div>
    <div id="dota2" class="tabcontent">
        <h3>Dota 2</h3>
        <ul class="streamers__list">

            <?php
            $counter = 0;
            if (!empty($streamers)) {

                foreach ($streamers as $key => $item) {
                    if ($item["type"]["name"] == "Dota 2") {
                        echo '<a class="streamers--item" href="https://mixer.com/' . $item["token"] . '" target="_blank">';
                        echo '<div class="streamers--item__container">';
                        echo '<img src="' . $item["type"]["coverUrl"] . '"/>';
                        echo '<img class="streamers--item__icon" src="https://mixer.com/api/v1/users/' . $item["userId"] . '/avatar?w=128&h=128" /> <br>';
                        echo '<span class="streamer-title">' . $item["token"] . ' - ' . $item["name"] . ' </span>';
                        echo '</br>';
                        echo '</div>';
                        echo '</a>';
                        $counter++;
                    }
                }
            }
            if ($counter == 0) {
                echo 'No streams available';
            }

            ?>

        </ul>
    </div>

    <div id="overwatch" class="tabcontent">
    <h3>Overwatch</h3>
    <ul class="streamers__list">

    <?php
    $counter = 0;
    if (!empty($streamers)) {
        foreach ($streamers as $key => $item) {
           if($item["type"]["name"] == "Overwatch"){
              echo '<a class="streamers--item" href="https://mixer.com/'.$item["token"].'" target="_blank">';
              echo '<div class="streamers--item__container">';
              echo '<img src="' . $item["type"]["coverUrl"] . '"/> <br>';
              echo '<img class="streamers--item__icon" src="https://mixer.com/api/v1/users/' . $item["userId"] . '/avatar?w=128&h=128" /> <br>';
              echo '<span class="streamer-title">' . $item["token"] . ' - ' . $item["name"] . ' </span>';
              echo '</br>';
            echo '</div>';
          echo '</a>';
          $counter++;
         }
       }
    }
    if($counter == 0){
      echo 'No streams available';
    }
    ?>
    </div>

    </ul>

</div>

<div class="container streamers-container">
    <h1>Streamers</h1>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'all')">All</button>
        <button class="tablinks" onclick="openCity(event, 'fifa18')">FIFA 18</button>
        <button class="tablinks" onclick="openCity(event, 'battlefield4')">Battlefield 4</button>
        <button class="tablinks" onclick="openCity(event, 'fortnite')">Fortnite</button>
    </div>
    <div id="fifa18" class="tabcontent">

        <h3>FIFA 18</h3>
        <ul class="streamers__list">
            <?php
            $counter = 0;
            if (!empty($streamers)) {
                foreach ($streamers as $key => $item) {
                    if ($item["type"]["name"] == "FIFA 18") {
                        echo '<a class="streamers--item" href="https://mixer.com/' . $item["token"] . '" target="_blank">';
                        echo '<div class="streamers--item__container">';
                        echo '<img src="' . $item["type"]["coverUrl"] . '"/>';
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
    <div id="battlefield4" class="tabcontent">
        <h3>Battlefield 4</h3>
        <ul class="streamers__list">

            <?php
            $counter = 0;
            if (!empty($streamers)) {

                foreach ($streamers as $key => $item) {
                    if ($item["type"]["name"] == "Battlefield 4") {
                        echo '<a class="streamers--item" href="https://mixer.com/' . $item["token"] . '" target="_blank">';
                        echo '<div class="streamers--item__container">';
                        echo '<img src="' . $item["type"]["coverUrl"] . '"/>';
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

    <div id="fortnite" class="tabcontent">
    <h3>Fortnite</h3>
    <ul class="streamers__list">

    <?php
    $counter = 0;
    if (!empty($streamers)) {
        foreach ($streamers as $key => $item) {
           if($item["type"]["name"] == "Fortnite"){
              echo '<a class="streamers--item" href="https://mixer.com/'.$item["token"].'" target="_blank">';
              echo '<div class="streamers--item__container">';
              echo '<img src="' . $item["type"]["coverUrl"] . '"/> <br>';
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

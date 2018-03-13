<div class="container streamers">
  <h2>streamers</h2>
  <h2>FIFA 18</h2>
  <ul class="streamers__list">

    <?php

    if (!empty($streamers)) {
        foreach ($streamers as $key => $item) {
           if($item["type"]["name"] == "FIFA 18"){
              echo '<a class="streamers--item" href="https://mixer.com/'.$item["token"].'" target="_blank">';
              echo '<div class="streamers--item__container">';
              echo '<img src="' . $item["type"]["coverUrl"] . '"/>';
              echo '<p>' . $item["id"] . ' </p>';
              echo '<p>' . $item["type"]["name"] . ' </p>';
              echo '<p>' . $item["name"] . ' </p>';
              echo '<p>' . $item["audience"] . ' </p>';
              echo '</br>';
            echo '</div>';
          echo '</a>';
         }
        }
    } ?>

    </ul>
    <h2>Battlefield 4</h2>
    <ul class="streamers__list">

    <?php if (!empty($streamers)) {

        foreach ($streamers as $key => $item) {
           if($item["type"]["name"] == "Battlefield 4"){
              echo '<a class="streamers--item" href="https://mixer.com/'.$item["token"].'" target="_blank">';
              echo '<div class="streamers--item__container">';
              echo '<img src="' . $item["type"]["coverUrl"] . '"/>';
              echo '<p>' . $item["id"] . ' </p>';
              echo '<p>' . $item["type"]["name"] . ' </p>';
              echo '<p>' . $item["name"] . ' </p>';
              echo '<p>' . $item["audience"] . ' </p>';
              echo '</br>';
            echo '</div>';
          echo '</a>';
        }
        }
    }?>

    </ul>
    <h2>Fortnite </h2>
    <ul class="streamers__list">

    <?php if (!empty($streamers)) {
        foreach ($streamers as $key => $item) {
           if($item["type"]["name"] == "Fortnite"){
              echo '<a class="streamers--item" href="https://mixer.com/'.$item["token"].'" target="_blank">';
              echo '<div class="streamers--item__container">';
              echo '<img src="' . $item["type"]["coverUrl"] . '"/>';
              echo '<p>' . $item["id"] . ' </p>';
              echo '<p>' . $item["type"]["name"] . ' </p>';
              echo '<p>' . $item["name"] . ' </p>';
              echo '<p>' . $item["audience"] . ' </p>';
              echo '</br>';
            echo '</div>';
          echo '</a>';
        }
        }
    }
    ?>
  </ul>
</div>

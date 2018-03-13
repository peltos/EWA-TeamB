<div class="container streamers">
  <h2>streamers</h2>

  <ul class="timeline">
      <?php
      if (!empty($streamers)) {
          foreach ($streamers as $key => $item) {
            // if($item["type"]["name"] == "League of Legends"){
              echo $item["id"] . '</br>';
              echo $item["type"]["name"] . '</br>';
              echo $item["name"] . '</br>';
              echo $item["audience"] . '</br>';
              echo '<img src="' . $item["type"]["coverUrl"] . '" </br>';
              echo '</br>';
            // }
          }
      }
      ?>
  </ul>
</div>

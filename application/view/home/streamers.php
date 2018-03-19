<div class="container streamers">
<h1>Streamers</h1>
<div class="tab">
<button class="tablinks" onclick="openCity(event, 'all')">All</button>
<button class="tablinks" onclick="openCity(event, 'fifa18')">FIFA 18</button>
<button class="tablinks" onclick="openCity(event, 'battlefield4')">Battlefield 4</button>
<button class="tablinks" onclick="openCity(event, 'fortnite')">Fortnite</button>
</div>
<div id="fifa18" class="tabcontent">

  <h2>FIFA 18</h2>
  <ul class="streamers__list">
  <?php
  $counter = 0;
  if (!empty($streamers)) {
        foreach ($streamers as $key => $item) {
           if($item["type"]["name"] == "FIFA 18"){
              echo '<a class="streamers--item" href="https://mixer.com/'.$item["token"].'" target="_blank">';
              echo '<div class="streamers--item__container">';
              echo '<img src="' . $item["type"]["coverUrl"] . '"/>';
              echo '<h4>' . $item["token"] . ' - ' . $item["name"] . ' </h4>';
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
  </ul>
</div>
    <div id="battlefield4" class="tabcontent">
    <h2>Battlefield 4</h2>
    <ul class="streamers__list">

    <?php
    $counter = 0;
    if (!empty($streamers)) {

        foreach ($streamers as $key => $item) {
           if($item["type"]["name"] == "Battlefield 4"){
              echo '<a class="streamers--item" href="https://mixer.com/'.$item["token"].'" target="_blank">';
              echo '<div class="streamers--item__container">';
              echo '<img src="' . $item["type"]["coverUrl"] . '"/>';
              echo '<h4>' . $item["token"] . ' - ' . $item["name"] . ' </h4>';
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

    </ul>
    </div>

    <div id="fortnite" class="tabcontent">
    <h2>Fortnite </h2>
    <ul class="streamers__list">

    <?php
    $counter = 0;
    if (!empty($streamers)) {
        foreach ($streamers as $key => $item) {
           if($item["type"]["name"] == "Fortnite"){
              echo '<a class="streamers--item" href="https://mixer.com/'.$item["token"].'" target="_blank">';
              echo '<div class="streamers--item__container">';
              echo '<img src="' . $item["type"]["coverUrl"] . '"/>';
              echo '<h4>' . $item["token"] . ' - ' . $item["name"] . ' </h4>';
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

<body>

<script>
function openCity(evt, gameName) {
  if(gameName !== 'all'){
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(gameName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    else{
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "block";
      }
    }
}
</script>

</body>

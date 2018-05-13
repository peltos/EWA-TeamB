<div class="container players-container">

  <h2> Players </h2>

    <ul class="slider">
        <?php
        $break = 0;
        if (!empty($slider)) {
            foreach ($slider as $key => $item) {
              if ($item["first_name"] != null && $item["image_url"] != null) { ?>
                <li class="slider-item">
                    <span class="slider-item--titles">
                        <p class="slider-item--content__league"><?php echo $item['name'] ?></p>
                        <p class="slider-item--content__tournament"><?php echo $item["first_name"] ?> <?php echo $item["last_name"] ?></p>
                    </span>
                    <div class="slider-item--icon">
                        <img class="slider-item--icon__image" src=" <?php echo $item["image_url"] ?> "/>
                    </div>
                    <div class="slider-item--content">
                      <p class="slider-item--content__name"><?php echo $item["current_team"]["name"] ?></p>
                      <p class="slider-item--content__date"><i class="fas fa-map-marker-alt"></i> <?php echo $item["hometown"] ?></p>
                    </div>

                </li>
                <?php
                $break++;
                if ($break == 48) break;
            }
          }
        } ?>

    </ul>
</div>

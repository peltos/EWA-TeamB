<?php require APP . 'view/players/playerfilter.php'; ?>

<div class="container players-container">

    <ul class="slider">
        <?php
        $break = 0;
        if (!empty($slider)) {
            foreach ($slider as $key => $item) {
              if ($item["first_name"] != null && $item["image_url"] != null) { ?>
                <li class="slider-item">
                    <span class="slider-item--titles">
                        <p class="slider-item--content__nickname"><?php echo $item['name'] ?></p>
                        <p class="slider-item--content__firstLastname"><?php echo $item["first_name"] ?> <?php echo $item["last_name"] ?></p>
                    </span>
                    <div class="slider-item--icon">
                        <img class="slider-item--icon__image" src=" <?php echo $item["image_url"] ?> "/>
                    </div>
                    <div class="slider-item--content">
                      <p class="slider-item--content__team">
                        <?php if ($item["current_team"]["name"] != null) { ?>
                          <?php echo $item["current_team"]["name"] ?></p>
                        <?php } else { ?>
                                - No Team - </p>
                        <?php } ?>
                      <p class="slider-item--content__hometown">
                        <i class="fas fa-map-marker-alt"></i>
                        <?php if ($item["hometown"] != null) { ?>
                          <?php echo $item["hometown"] ?></p>
                        <?php } else { ?>
                                Unkown </p>
                        <?php } ?>
                      <p class="slider-item--content__game">
                        <i class="fas fa-trophy"></i>
                        <?php if ($item["current_videogame"]["name"] != null) { ?>
                            <?php if ($item["current_videogame"]["name"] != 'LoL') { ?>
                              <?php echo $item["current_videogame"]["name"] ?></p>
                            <?php } else { ?>
                                    League of Legends
                            <?php } ?>
                        <?php } else { ?>
                                Unkown </p>
                        <?php } ?>
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

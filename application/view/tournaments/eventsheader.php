<?php
$page = 'timeline';
?>
<div class="container timeline-container" data-url="<?php if (!empty($url)) echo $url ?>">

    <div class="filterBar-container">
        <div class="filterBar--inner">
            <div class="dateFilter">
                <a class="dateFilter--item" href="<?php echo URL; ?>tournaments"><i class="filter-icon fas fa-filter"></i></a>
                <a class="dateFilter--item" href="<?php echo URL; ?>tournaments">upcoming</a>
                <a class="dateFilter--item" href="<?php echo URL; ?>tournaments/running">running</a>
                <a class="dateFilter--item" href="<?php echo URL; ?>tournaments/past">past</a>
                <a class="dateFilter--item" href="<?php echo URL; ?>tournaments/lol">League of Legends</a>
                <a class="dateFilter--item" href="<?php echo URL; ?>tournaments/dota2">Dota 2</a>
                <a class="dateFilter--item" href="<?php echo URL; ?>tournaments/ow">Overwatch</a>
            </div>
        </div>
    </div>

<?php
$page = 'timeline';
$active = '//' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<div class="container timeline-container" data-url="<?php if (!empty($url)) echo $url ?>">

    <h1>Matches</h1>
    <div class="filterBar-container">
        <div class="filterBar--inner">
            <div class="dateFilter">
                <a class="dateFilter--item" href="<?php echo URL; ?>matches"><i class="filter-icon fas fa-filter"></i></a>
                <a class="dateFilter--item <?php if($active == (URL . 'matches')) {echo 'active';} ?>" href="<?php echo URL; ?>matches">upcoming</a>
                <a class="dateFilter--item <?php if($active == (URL . 'matches/running')) {echo 'active';} ?>" href="<?php echo URL; ?>matches/running">running</a>
                <a class="dateFilter--item <?php if($active == (URL . 'matches/past')) {echo 'active';} ?>" href="<?php echo URL; ?>matches/past">results</a>
                <a class="dateFilter--item <?php if($active == (URL . 'matches/lol')) {echo 'active';} ?>" href="<?php echo URL; ?>matches/lol">League of Legends</a>
                <a class="dateFilter--item <?php if($active == (URL . 'matches/dota2')) {echo 'active';} ?>" href="<?php echo URL; ?>matches/dota2">Dota 2</a>
                <a class="dateFilter--item <?php if($active == (URL . 'matches/ow')) {echo 'active';} ?>" href="<?php echo URL; ?>matches/ow">Overwatch</a>
            </div>
        </div>
    </div>

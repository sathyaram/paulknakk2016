<?php

/**
 * @file
 * Template for displaying the agenda in a block
 */

// Build some neat dates.
$dates[date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") - 1))] = t('Yesterday');
$dates[date('Y-m-d', mktime(0, 0, 0))] = t('Today');
$dates[date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") + 1))] = t('Tomorrow');

// List of keys to display.
$keys    = array_map('trim', explode(',', $block->display_keys));
$nolabel = array_map('trim', explode(',', $block->hide_labels));
?>
<div class="agenda-block">
  <h2>Tour</h2>
  <div id ="tour-block">
  <?php foreach ($events as $day): ?>
  <?php
  $date = $day[0]['start date'];

  // Substitute today/yesterday/tomorrow.
  if (isset($dates[$day[0]['when']])) {
    $date = $dates[$day[0]['when']];
  }
  ?>
  <div class="tour-date">
  <h3><?php echo $date; ?></h3>
  <ol>
  <?php foreach ($day as $event): ?>
    <li class="cal_<?php echo $event['index']; ?>">
      <h4 class="calendar_title"><?php echo $event['title']; ?></h4>
      <ul class="moreinfo">

        <?php foreach ($keys as $key): ?>
          <?php if (!empty($event[$key])): ?>
            <li>
            <?php if (!in_array($key, $nolabel)): ?>
              <em><?php echo _agenda_translate($key); ?></em>:
            <?php endif; ?>
            <?php echo $event[$key]; ?>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>

      </ul>
    </li>
  <?php endforeach; ?>
  </ol>
  </div>
<?php endforeach; ?>
</div>
<a class="more-button" href="http://paulknakk.com/shows">More Tour Dates</a>
</div>

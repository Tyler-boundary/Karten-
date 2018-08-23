<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title><?php wp_title(''); ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <?php wp_head(); ?>
</head>
<body>
  <header class="header transparent <? echo (get_field('logo_light', get_the_id()) ? 'light' : 'dark') ?>">
    <a href="<? echo SUB_PATH ?>" class="hover-opacity">
      <img src="<?php echo get_image('logo-c.svg') ?>" alt="" class="logo dark"></img>
      <img src="<?php echo get_image('logo-w.svg') ?>" alt="" class="logo light"></img>
    </a>
    <img src="<?php echo get_image('ham-menu.svg') ?>" alt="" class="hamburger" onclick="openMenu()"></img>
  </header>
  <?php include(locate_template('inc/menu.php')); ?>

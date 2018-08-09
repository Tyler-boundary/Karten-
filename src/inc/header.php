<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title><?php wp_title(''); ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <?php wp_head(); ?>
</head>
<body>
  <header class="header">
    <img src="<?php echo get_image('karten-temp-logo.png') ?>" alt="" class="logo"></img>
    <img src="<?php echo get_image('ham-menu.svg') ?>" alt="" class="hamburger"></img>
  </header>

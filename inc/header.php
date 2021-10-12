<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php wp_title(''); ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="google" content="notranslate">
  <?php wp_head(); ?>
</head>
<body <?php body_class(is_front_page() ? 'loader--enabled' : '') ?>>
  <?php do_action('body_start'); ?>

  <?php include(locate_template('inc/menu.php')); ?>

  <header class="header transparent <? echo (get_field('logo_light', get_the_id()) ? 'light' : 'dark') ?>">
    <a href="<?php echo get_page_link(116) ?>" class="hover-opacity">
      <img src="<?php echo get_image('logo-c.svg') ?>" alt="" class="logo dark"></img>
      <img src="<?php echo get_image('logo-w.svg') ?>" alt="" class="logo light"></img>
    </a>

    <div class="menu-toggle">
      <img src="<?php echo get_image('ham-menu.svg') ?>" alt="Menu" class="hamburger dark" onclick="openMenu()"></img>
      <img src="<?php echo get_image('ham-menu-light.svg') ?>" alt="Menu" class="hamburger light" onclick="openMenu()"></img>
    </div>
  </header>

  <div class="main-wrap">

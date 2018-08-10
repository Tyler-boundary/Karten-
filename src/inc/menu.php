<div class="menu-container">
  <img src="<?php echo get_image('small-logo.png') ?>" alt="k:d" class="menu-logo"></img>
  <div>
    <?php wp_nav_menu('slide-in-menu'); ?>
    <div class="social-links">
      <a href="#">
        <img src="<?php echo get_image('twitter.svg') ?>" alt="twitter" class="menu-social"></img>
      </a>
      <a href="#">
        <img src="<?php echo get_image('linkedin.svg') ?>" alt="linkedin" class="menu-social"></img>
      </a>
    </div>
  </div>
  <div class="menu-text">Product Innovation Since 1986</div>
  <img src="<?php echo get_image('menu-close.svg') ?>" alt="close" class="menu-close" onclick="closeMenu()"></img>
</div>

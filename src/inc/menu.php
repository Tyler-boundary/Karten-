<div class="menu-container">
  <a href="<? echo SUB_PATH ?>" class="hover-opacity">
    <img src="<?php echo get_image('small-logo.png') ?>" alt="k:d" class="menu-logo"></img>
  </a>
  <div>
    <?php wp_nav_menu('slide-in-menu'); ?>
    <div class="social-links">
      <a href="https://twitter.com/StuartKarten" target="_blank">
        <img src="<?php echo get_image('twitter.svg') ?>" alt="twitter" class="menu-social hover-opacity"></img>
      </a>
      <a href="http://www.linkedin.com/company/karten-design" target="blank">
        <img src="<?php echo get_image('linkedin.svg') ?>" alt="linkedin" class="menu-social hover-opacity"></img>
      </a>
    </div>
  </div>
  <div class="menu-text">Product Innovation Since 1984</div>
  <img src="<?php echo get_image('menu-close.svg') ?>" alt="close" class="menu-close hover-opacity" onclick="closeMenu()"></img>
</div>

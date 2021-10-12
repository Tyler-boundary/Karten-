<?php
  class Walker_Overlay_Menu extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $output .= sprintf( "\n<li><a href='%s'%s><span data-hover='%s'>%s</span></a></li>\n",
        $item->url,
        ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
        $item->title,
        $item->title
      );
    }
  }
?>

<div class="menu-container">
  <a href="/">
    <img width="50" src="<?php echo get_image('logo-lettermark.svg') ?>" alt="k:d" class="menu-logo" />
  </a>

  <div class="menu-wrap cl-effect-5">
    <?php wp_nav_menu(array(
      'name' => 'slide-in-menu',
      'depth' => 1,
      'walker' => new Walker_Overlay_Menu()
    )); ?>
  </div>

  <?php get_template_part( 'menu', 'social' ); ?>

  <!-- <div class="social-links">
    <a href="https://twitter.com/StuartKarten" target="_blank">
      <img src="<?php echo get_image('twitter.svg') ?>" alt="twitter" class="menu-social hover-opacity"></img>
    </a>
    <a href="http://www.linkedin.com/company/karten-design" target="blank">
      <img src="<?php echo get_image('linkedin.svg') ?>" alt="linkedin" class="menu-social hover-opacity"></img>
    </a>
  </div> -->

  <img src="<?php echo get_image('menu-close.svg') ?>" alt="close" class="menu-close hover-opacity" onclick="closeMenu()"></img>
</div>

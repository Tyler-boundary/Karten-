<?php include(locate_template('inc/header.php')); ?>
<?php
  $outsights = get_posts(array(
    'numberposts'	=> 3,
    'category_name' => 'Outsights',
  ));
?>
<div class="page news-archive">
  <div class="container">
    <h1 class="heading group-heading animate-in__fadeUp animate-once" style="margin-top: 102px; text-transform: uppercase">News</h1>
    <div class="projects-section" style="margin-top: 38px; margin-bottom: 153px;">
      <div class="row-wrapper">
        <? echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="15" category__not_in="259" transition_container_classes="row" button_loading_label="Loading posts..."]'); ?>
      </div>
    </div>
  </div>
</div>

<?php include(locate_template('inc/footer.php')); ?>

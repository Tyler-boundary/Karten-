<?php
/*
  Template Name: News
  Template Post Type: news
*/
?>
<?php include(locate_template('inc/header.php')); ?>

<div class="news-page">
  <div class="container" style="margin-top: 160px;">
    <div
      class="news-image animate-once animate-in__fadeUp"
      style="background-image: url(<? echo get_the_post_thumbnail_url() ?>);"
    ></div>
    <div class="heading animate-once animate-in__fadeUp"><? echo get_the_title() ?></div>
    <div class="content animate-once animate-in__fadeUp"><? echo wpautop(get_post_field('post_content', get_the_id()), true) ?></div>
  </div>
</div>

<?php include(locate_template('inc/footer.php')); ?>

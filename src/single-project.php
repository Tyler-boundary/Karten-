<?php
/*
  Template Name: Project
  Template Post Type: projects
*/
?>
<?php include(locate_template('inc/header.php')); ?>
<div class="project-page">
  <div
    class="project-image"
    style="background-image: url(<? echo get_the_post_thumbnail_url() ?>);"
  ></div>
  <div class="container" style="margin-top: 191px;">
    <div class="heading animate-in__fadeUp animate-once"><? echo the_title() ?></div>
  </div>
  <? echo the_content() ?>
</div>

<?php include(locate_template('inc/footer.php')); ?>

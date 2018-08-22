<?php /* Template Name: AllNews */ ?>
<?php include(locate_template('inc/header.php')); ?>
<?php
  $outsights = get_posts(array(
    'numberposts'	=> -1,
    'post_type' => 'outsights',
  ));
  $allNews = get_posts(array(
    'numberposts'	=> -1,
    'post_type' => 'news',
  ));
?>
<div class="page">
  <div class="container" style="background-color: #f5f5f5">
    <div class="group-heading animate-in__fadeUp animate-once" style="margin-top: 193px;">OUTSIGHTS</div>
    <div class="projects-section" style="margin-top: 38px;">
      <div class="row-wrapper">
        <div class="row">
          <?php 
            foreach ($outsights as $outsight) {
          ?>
            <div class="col-lg-4 col-md-6 col-sm-12 animate-once animate-in__fadeUp">
              <div class="project tiny">
                <div
                  class="project-image"
                  style="background-image: url(<? echo get_the_post_thumbnail_url($outsight) ?>);"
                >
                </div>
                <div class="project-subheading">
                  <strong><? echo $outsight -> post_title ?></strong>
                  <br>
                  <? echo $outsight -> post_content ?>
                </div>
                <a href="<? echo get_field('pdf', $outsight->ID)['url'] ?>" download>
                  <strong><span style="font-size: 11px; color: #82828a;">DOWNLOAD</span></strong>
                </a>
              </div>
            </div>
          <? } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="group-heading animate-in__fadeUp animate-once" style="margin-top: 102px;">NEWS</div>
    <div class="projects-section" style="margin-top: 38px; margin-bottom: 153px;">
      <div class="row-wrapper">
        <div class="row">
          <?php 
            foreach ($allNews as $news) {
          ?>
            <div class="col-lg-4 col-md-6 col-sm-12 animate-once animate-in__fadeUp">
              <a class="project supertiny" href="<? echo get_permalink($news) ?>">
                <div
                  class="project-image"
                  style="background-image: url(<? echo get_the_post_thumbnail_url($news) ?>);"
                >
                </div>
                <div class="project-subheading">
                  <? echo $news -> post_title ?>
                </div>
                <div class="project-description">
                  <? echo get_field('description', $news->ID) ?>
                </div>
              </div>
            </a>
          <? } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(locate_template('inc/footer.php')); ?>

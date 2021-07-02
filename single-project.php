<?php
/*
  Template Name: Project
  Template Post Type: projects
*/
?>
<?php
  $projects = get_posts(array(
    'numberposts'	=> 6,
    'post_type' => 'projects',
    'post__not_in' => array(get_the_ID()),
  ));
?>
<?php include(locate_template('inc/header.php')); ?>
<div class="page project-page">
  <? /*$video_hero_url = get_the_post_video_url( $post_id );*/?>
  <? if (has_post_video()) : ?>
    <div
      class="project-video-wrap"
    >
      <video
        class="project-video"
        autoplay muted playsinline loop
        src="<? echo get_the_post_video_url() ?>"
        cover="<? echo get_the_post_video_image_url() ?>"
      ></video>
    </div>
  <? else : ?>
    <div
      class="project-image"
      style="background-image: url(<? the_post_thumbnail_url('hero') ?>);"
    ></div>
  <? endif; ?>
  <div class="container" style="margin-top: 191px;">
    <h1 class="heading animate-in__fadeUp animate-once"><? the_field('headline') ?></h1>
  </div>

  <? the_content() ?>

  <hr style="margin: 200px 0 80px" />

  <div class="container">
    <div class="projects-section" style="margin: 0 0 80px">

    <div class="row-wrapper">
      <div class="label">More Case Studies</div>
      <div class="row project-row">
      <?
        foreach ($projects as $project) {
          $link_enabled = get_field('link_to_project_detail', $project->ID);
      ?>
        <div class="project-wrapper col-lg-4 col-md-6 col-sm-12 animate-once animate-in__fadeUp">
          <div class="project">
            <? if ($link_enabled) { ?> <a href="<? echo get_permalink($project) ?>"> <? } ?>
              <div
                class="project-image"
                style="background-image: url(<? echo get_field('thumb', $project -> ID)['sizes']['project-thumb'] ?>);"
              >
                <div
                  class="project-image-hover"
                  style="background-image: url(<? echo get_field('thumb_hover', $project -> ID)['sizes']['project-thumb'] ?>);"
                ></div>
              </div>
              <div class="project-subheading"><? echo get_field('subheading', $project -> ID) ?></div>
              <div class="project-title"><? echo $project -> post_title ?></div>
            <? if ($link_enabled) { ?> </a> <? } ?>
          </div>
        </div>
      <? } ?>
    </div>
    </div>
    </div>
  </div>
</div>

<?php include(locate_template('inc/footer.php')); ?>

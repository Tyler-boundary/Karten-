<?php /* Template Name: Work */ ?>
<?php include(locate_template('inc/header.php')); ?>
<?php
  $projects = get_posts(array(
    'numberposts'	=> -1,
    'post_type' => 'projects',
  ));
?>
<div class="page">
  <div class="container">
    <div class="projects-section" style="margin-top: 244px;">
      <div class="row-wrapper">
        <div class="row">
          <?php 
            foreach ($projects as $project) {
          ?>
            <div class="col-lg-4 col-md-6 col-sm-12 animate-once animate-in__fadeUp">
              <div class="project <? echo get_field('height', $project->ID) ?>">
                <div
                  class="project-image"
                  style="background-image: url(<? echo get_the_post_thumbnail_url($project) ?>);"
                >
                </div>
                <div class="project-subheading">Industrial Design, Branding</div>
                <div class="project-title"><? echo $project -> post_title ?></div>
              </div>
            </div>
          <? } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(locate_template('inc/footer.php')); ?>

<?php
/*
  Template Name: Project
  Template Post Type: projects
*/
?>
<?php
  $projects = get_posts(array(
    'numberposts'	=> -1,
    'post_type' => 'projects',
  ));
  $projects = array_merge($projects, $projects);
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
  <div class="container" style="margin-top: 225px">
    <div class="more-projects">More Projects</div>
    <div class="project-wrapper row">
      <? $nextCount = -1; ?>
      <? 
        foreach ($projects as $project) {
          if ($project->ID == get_the_id()) {
            if ($nextCount != -1) break;
            $nextCount = 3;
            continue;
          }
          if ($nextCount > 0) {
            $nextCount --;
      ?>
        <a div class="project animate-once animate-in__fadeUp" href="<? echo get_permalink($project) ?>">
          <div
            class="project-image"
            style="background-image: url(<? echo get_the_post_thumbnail_url($project) ?>);"
          >
          </div>
          <div class="project-subheading"><? echo get_field('subheading', $project -> ID) ?></div>
          <div class="project-title"><? echo $project -> post_title ?></div>
        </a>
      <?
          }
          if ($nextCount == 0) break;
        }
      ?>
    </div>
  </div>
</div>

<?php include(locate_template('inc/footer.php')); ?>

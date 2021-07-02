<?php /* Template Name: Projects */ ?>
<?php include(locate_template('inc/header.php')); ?>
<?php
  $project_styles = [
    ['class' => 'col-md-7', 'delay' => 0],
    ['class' => 'col-md-5', 'delay' => 0.1],
    ['class' => 'col-md-5', 'delay' => 0],
    ['class' => 'col-md-7', 'delay' => 0.1],
    ['class' => '', 'delay' => 0, 'full-width' => true],
    ['class' => 'col-md-5', 'delay' => 0],
    ['class' => 'col-md-7', 'delay' => 0.1],
    ['class' => 'col-md-7', 'delay' => 0],
    ['class' => 'col-md-5', 'delay' => 0.1],
  ];
  $logos = acf_photo_gallery('logos', get_the_id());
  $project_case_studies = [
    get_field('project1', 116),
    get_field('project2', 116),
    get_field('project3', 116),
    get_field('project4', 116),
    get_field('project5', 116),
    get_field('project6', 116),
    get_field('project7', 116),
    get_field('project8', 116),
    get_field('project9', 116)
  ];

  $project_case_studies_ids = array_map(
    function($p) { return $p -> ID; },
    $project_case_studies
  );
  $projects = get_posts(array(
    'numberposts'	=> -1,
    'post_type' => 'projects',
    'exclude' => $project_case_studies_ids
  ));
?>

<div class="page page-work">
  <div class="container">
    <div class="projects-section" style="margin-bottom: 75px">
      <h2 class="heading group-heading animate-in__fadeUp animate-once" style="margin-bottom: 100px; text-transform: uppercase">Work</h2>

      <div class="row-wrapper">
        <div class="row home-projects">
          <?php
            foreach ($project_case_studies as $i => $project) {
              $project_style = $project_styles[$i];
              $link_enabled = get_field('link_to_project_detail', $project->ID);
          ?>
            <? if (isset($project_style['full-width']) && $project_style['full-width']) { ?>
                </div>
              </div>

              <div class="<? echo $project_style['class'] ?> project full-width animate-once animate-in__fadeUp">
                <? if ($link_enabled) { ?> <a href="<? echo get_permalink($project) ?>"> <? } ?>
                  <div class="project-image" style="background-image: url(<? echo get_field('thumb_wide', $project->ID)['sizes']['project-thumb'] ?>)">
                    <div
                      class="project-image-hover"
                      style="background-image: url(<? echo get_field('thumb_hover', $project->ID)['sizes']['project-thumb'] ?>);"
                    ></div>
                  </div>
                  <div class="project-subheading"><? echo get_field('subheading', $project -> ID) ?></div>
                  <div class="project-title"><? echo get_the_title($project) ?></div>
                <? if ($link_enabled) { ?> </a> <? } ?>
              </div>

              <div class="row-wrapper">
                <div class="row home-projects">
            <? } else { ?>
              <div class="<? echo $project_style['class'] ?> project-wrapper animate-once animate-in__fadeUp">
                <div class="project">
                  <? if ($link_enabled) { ?> <a href="<? echo get_permalink($project) ?>"> <? } ?>
                    <div class="project-image" style="background-image: url(<? echo get_field('thumb', $project->ID)['sizes']['large'] ?>)">
                      <div
                        class="project-image-hover"
                        style="background-image: url(<? echo get_field('thumb_hover', $project->ID)['sizes']['large'] ?>);"
                      ></div>
                    </div>
                    <div class="project-subheading"><? echo get_field('subheading', $project -> ID) ?></div>
                    <div class="project-title"><? echo get_the_title($project) ?></div>
                  <? if ($link_enabled) { ?> </a> <? } ?>
                </div>
              </div>
            <? } ?>
          <? } ?>
        </div>
      </div>
    </div>
  </div>

  <hr style="margin: 0 0 -160px;" />

  <div class="container">
    <div class="projects-section" style="margin-bottom: 150px">
      <div class="row-wrapper">
        <div class="label" style="font-size: 24px;">Additional Projects</div>

        <div class="row project-row">
          <?php
            foreach ($projects as $project) {
          ?>
            <?
              $height = get_field('height', $project->ID);
              $thumb_url = get_field('thumb', $project->ID)['sizes']['project-thumb'];
              $thumb_hover_url = get_field('thumb_hover', $project->ID)['sizes']['project-thumb'];
              $thumb_video_url = get_field('thumb_video', $project->ID);
              $link_enabled = get_field('link_to_project_detail', $project->ID);
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12 animate-once animate-in__fadeUp project-wrapper">

              <div class="project project-work <? echo $height ?>">
                <? if ($link_enabled) { ?> <a href="<? echo get_permalink($project) ?>"> <? } ?>
                  <? if ($thumb_video_url) : ?>
                    <div
                      class="project-image"
                    >
                      <video
                        class="project-video <? echo $height ?>"
                        autoplay muted playsinline loop
                        src="<? echo $thumb_video_url ?>"
                      ></video>
                      <div
                        class="project-image-hover"
                        style="background-image: url(<? echo $thumb_hover_url ?>);"
                      ></div>
                    </div>
                  <? else : ?>
                    <div
                      class="project-image"
                      style="background-image: url(<? echo $thumb_url ?>);"
                    >
                      <div
                        class="project-image-hover"
                        style="background-image: url(<? echo $thumb_hover_url ?>);"
                      ></div>
                    </div>
                  <? endif; ?>
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

<?php /* Template Name: Home */ ?>
<?php include(locate_template('inc/header.php')); ?>
<?php
  $project_styles = [
    ['class' => 'col-md-7', 'delay' => 0],
    ['class' => 'col-md-5', 'delay' => 0.1],
    ['class' => '', 'delay' => 0, 'full-width' => true],
    ['class' => 'col-md-5', 'delay' => 0],
    ['class' => 'col-md-7', 'delay' => 0.1],
  ];
  $logos = acf_photo_gallery('logos', get_the_id());
  $projects = [
    get_field('project1'),
    get_field('project2'),
    get_field('project3'),
    get_field('project4'),
    get_field('project5')
  ];
?>

<div class="page">
  <div class="container">
    <div class="heading animate-in__fadeUp animate-once"><? echo get_field('heading') ?></div>
    <div class="divider"></div>
    <div class="subheading animate-in__fadeUp animate-once"><? echo get_field('subheading') ?></div>
    <div class="clients-section" style="margin-bottom: 100px">
      <div class="title">Our Clients</div>
      <div class="row animate-once">
        <?php
          foreach ($logos as $i => $logo) {
        ?>
          <div class="col-xs-6 col-md-4 col-lg-3 client-col animate-in__fadeUp" style="transition-delay: <?php echo $i * 0.1 ?>s;">
            <img src="<? echo $logo['full_image_url'] ?>" alt="axonics-logo-color-no-tag-large" class="client"></img>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="projects-section" style="margin-bottom: 150px">
      <div class="row-wrapper">
        <div class="row home-projects">
          <?php 
            foreach ($projects as $i => $project) {
              $project_style = $project_styles[$i];
          ?>
            <? if (isset($project_style['full-width']) && $project_style['full-width']) { ?>
                </div>
              </div>
              <a class="<? echo $project_style['class'] ?> project full-width animate-once animate-in__fadeUp" href="<? echo get_permalink($project) ?>">
                <div class="project-image" style="background-image: url(<? echo get_the_post_thumbnail_url($project) ?>)">
                </div>
                <div class="project-subheading"><? echo get_field('subheading', $project -> ID) ?></div>
                <div class="project-title"><? echo $project -> post_title ?></div>
              </a>
              <div class="row-wrapper">
                <div class="row">
            <? } else { ?>
              <div class="<? echo $project_style['class'] ?> project-wrapper animate-once animate-in__fadeUp">
                <a class="project" href="<? echo get_permalink($project) ?>">
                  <div class="project-image" style="background-image: url(<? echo get_the_post_thumbnail_url($project) ?>)">
                  </div>
                  <div class="project-subheading"><? echo get_field('subheading', $project -> ID) ?></div>
                  <div class="project-title"><? echo $project -> post_title ?></div>
                </a>
              </div>
            <? } ?>
          <? } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include(locate_template('inc/footer.php')); ?>

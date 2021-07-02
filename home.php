<?php /* Template Name: Home */ ?>
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
  $projects = [
    get_field('project1'),
    get_field('project2'),
    get_field('project3'),
    get_field('project4'),
    get_field('project5'),
    get_field('project6'),
    get_field('project7'),
    get_field('project8'),
    get_field('project9')
  ];
?>

<div class="page">
  <div class="container">
    <div class="intro-wrap">
      <h1 class="heading animate-in__fadeUp animate-once"><? echo get_field('heading') ?></h1>
      <div class="subheading animate-in__fadeUp animate-once" style="color: #ec7600"><? echo get_field('subheading') ?></div>
    </div>
  </div>

  <div class="container" style="background: #333">
    <div class="clients-section">
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
  </div>

  <div class="container">
    <div class="projects-section" style="margin: 300px 0 75px">
      <div class="row-wrapper">
        <div class="row home-projects">
          <?php
            foreach ($projects as $i => $project) {
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

  <section class="tiered-list">
    <div class="container">
      <h2 class="tiered-list__title"><?php the_field('tiered-list__title') ?></h2>
      <?php if (have_rows('tiered-list__items')) : ?>
        <div class="tiered-list__list">
          <?php while (have_rows('tiered-list__items')) : the_row(); ?>
            <?php $id = 'tiered-list-item-' . get_row_index() ?>
            <div class="tiered-list__item">
              <div class="row">
                <div class="col-md-6 position-static">
                  <div class="tiered-list__item-title" id="<?php echo $id . '-title' ?>">
                    <button class="collapsed" type="button" data-toggle="collapse" data-target="#<?php echo $id ?>" aria-expanded="false" aria-controls="<?php echo $id ?>">
                      <?php the_sub_field('title') ?>
                    </button>
                  </div>
                </div>

                <div class="col">
                  <div class="tiered-list__item-text collapse" id="<?php echo $id ?>" aria-labelledby="<?php echo $id . '-title' ?>">
                    <?php the_sub_field('text') ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
</div>

<?php include(locate_template('inc/footer.php')); ?>

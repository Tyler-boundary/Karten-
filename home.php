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



<?php 

// IPV Animation

$ipv_animation =  get_field('ipv_animation');
$shortcode = sprintf(
  '[ipv_animation img_dir="%s" img_prefix="%s" img_extension="%s text="%s" last_frame="%s" ]',
    $ipv_animation['images_directory'],
    $ipv_animation['image_prefix'],
    $ipv_animation['image_extension'],
    $ipv_animation['animation_text'],
    $ipv_animation['number_frames']
);

echo do_shortcode($shortcode); 
?> 


<div class="page">

  <div class="container" style="background: #333">
    <div class="clients-section">
      <div class="title">Our Clients</div>
      <div class="row animate-once row_clients">
        <?php
          foreach ($logos as $i => $logo) {
        ?>
          <div class="col-xs-6 col-md-4 col-lg-3 client-col animate-in__fadeUp" style="transition-delay: <?php echo $i * 0.1 ?>s;">
            <img src="<?php echo $logo['full_image_url'] ?>" alt="axonics-logo-color-no-tag-large" class="client"></img>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="projects-section" style="margin: 90px 0 75px">
      <div class="row-wrapper">
        <div class="row home-projects">
          <?php
            foreach ($projects as $i => $project) {
              $project_style = $project_styles[$i];
              $link_enabled = get_field('link_to_project_detail', $project->ID);
          ?>
            <?php if (isset($project_style['full-width']) && $project_style['full-width']) { ?>
                </div>
              </div>

              <div class="<?php echo $project_style['class'] ?> project full-width animate-once animate-in__fadeUp">
                <?php if ($link_enabled) { ?> <a href="<?php echo get_permalink($project) ?>"> <?php } ?>
                  <div class="project-image" style="background-image: url(<?php echo get_field('thumb_wide', $project->ID)['sizes']['project-thumb'] ?>)">
                    <div
                      class="project-image-hover"
                      style="background-image: url(<?php echo get_field('thumb_hover', $project->ID)['sizes']['project-thumb'] ?>);"
                    ></div>
                  </div>
                  <div class="project-subheading"><?php echo get_field('subheading', $project -> ID) ?></div>
                  <div class="project-title"><?php echo get_the_title($project) ?></div>
                <?php if ($link_enabled) { ?> </a> <?php } ?>
              </div>

              <div class="row-wrapper">
                <div class="row home-projects">
            <?php } else { ?>
              <div class="<?php echo $project_style['class'] ?> project-wrapper animate-once animate-in__fadeUp">
                <div class="project">
                  <?php if ($link_enabled) { ?> <a href="<?php echo get_permalink($project) ?>"> <?php } ?>
                    <div class="project-image" style="background-image: url(<?php echo get_field('thumb', $project->ID)['sizes']['large'] ?>)">
                      <div
                        class="project-image-hover"
                        style="background-image: url(<?php echo get_field('thumb_hover', $project->ID)['sizes']['large'] ?>);"
                      ></div>
                    </div>
                    <div class="project-subheading"><?php echo get_field('subheading', $project -> ID) ?></div>
                    <div class="project-title"><?php echo get_the_title($project) ?></div>
                  <?php if ($link_enabled) { ?> </a> <?php } ?>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Domain Expertise Section Starts -->
  <section class="domain_wrapper">
    <div class="container">
      <div class="domainsub_wrapper">
        <div class="row">
          <div class="col-12">
            <h2><?php the_field('domain_section_heading'); ?></h2>
          </div>
        </div>
        <div class="row">
          <?php
          if( have_rows('domain_section_content') ):
          while( have_rows('domain_section_content') ) : the_row();?>
          <div class="col-md-4">
            <div class="domain_cont">
              <h3><?php the_sub_field('domain_content_heading'); ?></h3>              
              <?php if( have_rows('domain_contents') ): ?>
              <ul>
                <?php
                while( have_rows('domain_contents') ) : the_row();?>                
                <li><?php the_sub_field('domain_points'); ?></li>
                <?php   
                  endwhile;
                ?>
              </ul>
              <?php   
                  endif;
                ?>
            </div>
          </div>
          <?php   
            endwhile;
            endif;
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Domain Expertise Section Ends -->

  <!-- Our Capabilities Section Starts -->
    <div class="capabilities-wrapper capabilities_home">
    <div class="container">
      <div class="capabilities-section">
        <div class="title"><?php the_field('capabilities_section_heading'); ?></div>
        <div class="row animate-once">
        <?php
        if( have_rows('capabilities_section_points') ):
        while( have_rows('capabilities_section_points') ) : the_row();?>
           <div class="col-md-6 animate-in__fadeUp" style="transition-delay: <? echo $key * 0.1 ?>s;">
            <div class="capability-title">              
              <?php the_sub_field('capabilities_point_heading'); ?>            
            </div>
            <div class="capability-description">              
              <?php the_sub_field('capabilities_point_content'); ?>            
            </div>
          </div>
          <?php   
            endwhile;
            endif;
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Our Capabilities Section Ends -->
</div>

<?php include(locate_template('inc/footer.php')); ?>

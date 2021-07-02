<?php include(locate_template('inc/header.php')); ?>
<?php
  $outsights = get_posts(array(
    'numberposts'	=> 3,
    'category_name' => 'Outsights',
  ));
?>
<div class="page news-archive">
  <div class="container" style="background-color: #f5f5f5;">
    <h2 class="heading group-heading animate-in__fadeUp animate-once" style="margin-top: 193px; margin-bottom: 122px; text-transform: uppercase">Outsights</h2>
    <div class="projects-section" style="margin-top: 38px; margin-bottom: 122px;">
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
                  <div class="outsight-subheading"><? echo $outsight -> post_title ?></div>

                  <? echo $outsight -> post_excerpt ?>
                </div>
                <?
                  $pdf = get_field('pdf', $outsight->ID);
                  if ($pdf) :
                ?>
                  <a href="<? echo $pdf['url'] ?>" title="<? echo $pdf['title'] ?>" download class="download-link">
                    Download <i class="icon-file-pdf"></i>
                  </a>
                <? endif; ?>
              </div>
            </div>
          <? } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <h1 class="heading group-heading animate-in__fadeUp animate-once" style="margin-top: 102px; text-transform: uppercase">News</h1>
    <div class="projects-section" style="margin-top: 38px; margin-bottom: 153px;">
      <div class="row-wrapper">
        <? echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="15" category__not_in="259" transition_container_classes="row" button_loading_label="Loading posts..."]'); ?>
      </div>
    </div>
  </div>
</div>

<?php include(locate_template('inc/footer.php')); ?>

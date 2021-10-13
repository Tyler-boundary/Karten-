<?php /* Template Name: About */ ?>
<?php include(locate_template('inc/header.php')); ?>
<?php
  $logo_section_images = acf_photo_gallery('logo_section_images', get_the_id());
  $academia_section_images = acf_photo_gallery('academia_section_images', get_the_id());
  $awards_section_images = acf_photo_gallery('awards_section_images', get_the_id());
  $capabilities = get_field('capabilities');
  $logos = acf_photo_gallery('logos', get_the_id());
  $testimonials = get_field('testimonials');
?>
<div class="page page-about">
  <div class="container">
    <div>
      <h1 class="heading animate-in__fadeUp animate-once">
        <?php echo get_field('heading') ?>
      </h1>
      <div class="divider"></div>
      <div class="subheading animate-in__fadeUp animate-once">
        <?php echo get_field('subheading') ?>
      </div>
    </div>
  </div>

  <div class="logo__section">
    <div class="container">
      <div class="logo__content">
        <div class="row">
          <div class="col-md-6 left__content animate-in__fadeUp animate-once">
            <div class="title"><?php echo get_field('logo_section_left_heading'); ?></div>
            <div class="description">
              <?php echo get_field('logo_section_left_paragraph'); ?>
            </div>
          </div>
          <div class="col-md-6 right__content animate-in__fadeUp animate-once">
            <div class="title"><?php echo get_field('logo_section_right_heading'); ?></div>
            <div class="description">
              <?php echo get_field('logo_section_right_paragraph'); ?>
            </div>
          </div>
        </div>
        <div class="logo__images animate-in__fadeUp animate-once">
          <div class="row">
          <?php
              foreach ($logo_section_images as $i => $logo_section_image) {
            ?>
              <div class="col-lg-3 col-md-4 col-xs-6 d-lg-flex align-items-center justify-content-center animate-in__fadeUp" style="transition-delay: <?php echo $i * 0.1 ?>s;">
                <img src="<?php echo $logo_section_image['full_image_url'] ?>" alt="" />
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="academia__section">
    <div class="container">
      <div class="academia__content">
        <div class="row">
          <div class="col-md-12 animate-in__fadeUp animate-once">
            <div class="title"><?php echo get_field('academia_section_heading'); ?></div>
            <div class="description">
              <?php echo get_field('academia_section_paragraph'); ?>
            </div>
          </div>
        </div>
        <div class="academia__images animate-in__fadeUp animate-once">
          <div class="row">
          <?php
              foreach ($academia_section_images as $i => $academia_section_image) {
            ?>
              <div class="col-lg-3 col-md-4 col-xs-6 animate-in__fadeUp" style="transition-delay: <?php echo $i * 0.1 ?>s;">
                <img src="<?php echo $academia_section_image['full_image_url'] ?>" alt="" />
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="awards__section">
    <div class="container">
      <div class="awards__content animate-in__fadeUp animate-once">
        <div class="row">
          <div class="col-md-5">
            <div class="title"><?php echo get_field('awards_section_heading'); ?></div>
            <div class="description">
              <?php echo get_field('awards_section_paragraph'); ?>
            </div>
          </div>
          <div class="col-md-7">
            <div class="awards__images">
              <div class="row">
              <?php
                  foreach ($awards_section_images as $i => $awards_section_image) {
                ?>
                  <div
                    class="col-lg-4 col-md-6 col-sm-4 col-xs-6 d-flex align-items-center justify-content-center animate-in__fadeUp"
                    style="transition-delay: <?php echo $i * 0.1 ?>s;"
                  >
                    <img src="<?php echo $awards_section_image['full_image_url'] ?>" alt="" />
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bottomline__section">
    <div class="container">
      <div class="bottomline__content">
        <div class="animate-in__fadeUp animate-once">
          <div class="title"><?php echo get_field('bottomline_section_heading'); ?></div>
          <div class="description">
            <?php echo get_field('bottomline_section_paragraph'); ?>
            <a class="label-wrapper" href="<?php echo get_field('show_our_work_link'); ?>">
              <span class="label"><?php echo get_field('show_our_work_button'); ?></span>
              <img src="<?php echo get_image('right-arrow-orange.png') ?>" alt="orange arrow pointing right" class="right-arrow">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="container" style="background: #333">
    <div class="clients-section">
      <div class="title">Our Clients</div>
      <div class="row animate-once row_clients">
        <?php
          foreach ($logos as $i => $logo) {
        ?>
        <div class="col-xs-6 col-md-4 col-lg-3 client-col animate-in__fadeUp"
          style="transition-delay: <?php echo $i * 0.1 ?>s;">
          <img src="<?php echo $logo['full_image_url'] ?>" alt="axonics-logo-color-no-tag-large" class="client"></img>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <?php if ($testimonials && count($testimonials) > 0) : ?>
  <?php foreach ($testimonials as $i => $testimonial) : ?>
  <div
    class="quotes-section animate-in__fadeUp animate-once"
    style="<?php if ($i == 0) echo 'margin-top: 491px'; else echo 'margin-top: 50px;' ?>;"
  >
    <div class="container">
      <div class="quote">
        <?php echo $testimonial['quote'] ?>
      </div>
      <div class="name">
        <?php echo $testimonial['person'] ?>
      </div>
      <div class="company-name">
        <?php echo $testimonial['company'] ?>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>

  <div class="work-with-us-wrapper">
    <div class="container">
      <div class="work-with-us-section animate-in__fadeUp animate-once">
        <div class="title">Like what you see? we’re ready to chat about your project.</div>
        <a class="label-wrapper" href="/contact">
          <div class="label">Work With Us</div>
          <img src="<?php echo get_image('right-arrow-orange.png') ?>" alt="k:d" class="right-arrow"></img>
        </a>
      </div>
    </div>
  </div>

  <?php include(locate_template('inc/footer.php')); ?>

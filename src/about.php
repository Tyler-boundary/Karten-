<?php /* Template Name: About */ ?>
<?php include(locate_template('inc/header.php')); ?>
<?php
  $capabilities = get_field('capabilities');
  $logos = acf_photo_gallery('logos', get_the_id());
  $testimonials = get_field('testimonials');
?>
<div class="page">
  <div class="container">
    <div class="heading animate-in__fadeUp animate-once"><? echo get_field('heading') ?></div>
    <div class="divider"></div>
    <div class="subheading animate-in__fadeUp animate-once">
      <? echo get_field('subheading') ?>
    </div>
    <div class="capabilities-wrapper">
      <div class="capabilities-section">
        <div class="title">Our Capabilities</div>
        <div class="row animate-once">
          <?
            foreach ($capabilities as $key => $capability) {
          ?>
            <div class="col-md-6 animate-in__fadeUp" style="transition-delay: <? echo $key * 0.1 ?>s;">
              <div class="capability-title"><? echo $capability['name'] ?></div>
              <div class="capability-description"><? echo $capability['description'] ?></div>
            </div>
          <? } ?>
        </div>
      </div>
    </div>
    <div class="heading-2 animate-in__fadeUp animate-once" style="margin-top: 397px;">
      <? echo get_field('section_heading') ?>
    </div>
    <div class="subheading-2 animate-in__fadeUp animate-once" style="margin-top: 78px; margin-bottom: 210px;">
      <? echo get_field('section_subheading') ?>
    </div>
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
    <?php
      foreach ($testimonials as $i => $testimonial) {
    ?>
      <div class="quotes-section animate-in__fadeUp animate-once" style="<? if ($i == 0) echo 'margin-top: 491px'; else echo 'margin-top: 50px;' ?>;">
        <div class="quote"><? echo $testimonial['quote'] ?></div>
        <div class="name"><? echo $testimonial['person'] ?></div>
        <div class="company-name"><? echo $testimonial['company'] ?></div>
      </div>
    <?php } ?>
    <div class="work-with-us-wrapper">
      <div class="work-with-us-section animate-in__fadeUp animate-once">
        <div class="title">Like what you see? we’re ready to chat about your project.</div>
        <a class="label-wrapper" href="<? echo SUB_PATH ?>contact">
          <div class="label">Work With Us</div>
          <img src="<?php echo get_image('right-arrow-orange.png') ?>" alt="k:d" class="right-arrow"></img>
        </a>
    </div>
  </div>
</div>
<?php include(locate_template('inc/footer.php')); ?>

<?php /* Template Name: Contact */ ?>
<?php include(locate_template('inc/header.php')); ?>
<div class="page contact-page">
  <div class="container">
    <!-- <div class="heading animate-in__fadeUp animate-once">
      Have a project for Karten Design?
    </div> -->

    <? /* contact form */ /* echo do_shortcode('[weforms id="285"]') */ ?>

    <!-- <div class="row input-group">
      <div class="big-input col-sm-6 animate-in__fadeUp animate-once">
        <input placeholder="First Name">
      </div>
      <div class="big-input col-sm-6 animate-in__fadeUp animate-once">
        <input placeholder="Last Name">
      </div>
      <div class="big-input col-sm-6 animate-in__fadeUp animate-once">
        <input placeholder="Email">
      </div>
      <div class="big-input col-sm-6 animate-in__fadeUp animate-once">
        <input placeholder="Company">
      </div>
      <div class="big-input col-xs-12 animate-in__fadeUp animate-once">
        <textarea placeholder="Your Message" rows="5"></textarea>
      </div>
    </div>
    <a class="label-wrapper animate-in__fadeUp animate-once" href="/contact">
      <div class="label">Send</div>
      <img src="<?php echo get_image('right-arrow-orange.png') ?>" alt="k:d" class="right-arrow"></img>
    </a> -->

    <h1 class="heading contact-heading animate-in__fadeUp animate-once">Contact</h1>
    <div class="row contact-info-block-group">
      <div class="contact-info-block col-md-4 col-sm-6 animate-in__fadeUp animate-once">
        <div class="title">General</div>
        <div class="text">
          <?php the_field('contact_general_text'); ?>
        </div>
      </div>
      <div class="contact-info-block col-md-4 col-sm-6 animate-in__fadeUp animate-once" style="transition-delay: 0.1s">
        <div class="title">New Business</div>
        <div class="text">
          Stuart Karten<br>
          <a href="mailto:<?php the_field('contact_new_business_email'); ?>" target="_blank" title="Email">
            <?php the_field('contact_new_business_email'); ?>
          </a><br>
          <?php the_field('contact_new_business_phone_number'); ?>
        </div>
      </div>
      <div class="contact-info-block col-md-4 col-sm-6 animate-in__fadeUp animate-once" style="transition-delay: 0.2s">
        <div class="title">Social</div>
        <div class="text">
          <? if ( get_field('contact_social_linkedin') ) : ?>
            <a href="<?php the_field('contact_social_linkedin'); ?>" target="_blank" title="LinkedIn">LinkedIn</a>
            <br />
          <? endif; ?>
          <? if ( get_field('contact_social_facebook') ) : ?>
            <a href="<?php the_field('contact_social_facebook'); ?>" target="_blank" title="Facebook">Facebook</a>
            <br />
          <? endif; ?>
          <? if ( get_field('contact_social_twitter') ) : ?>
            <a href="<?php the_field('contact_social_twitter'); ?>" target="_blank" title="Twitter">Twitter</a>
          <? endif; ?>
          <!-- Lil' hack to stop unorphan from inserting a space before the last link -->
          <span style="display: none">.</span>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(locate_template('inc/footer.php')); ?>

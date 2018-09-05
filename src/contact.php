<?php /* Template Name: Contact */ ?>
<?php include(locate_template('inc/header.php')); ?>
<div class="contact-page">
  <div class="container">
    <div class="heading animate-in__fadeUp animate-once">
      Have a project for Karten Design?
    </div>
    <div class="row input-group">
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
    <a class="label-wrapper animate-in__fadeUp animate-once" href="<? echo SUB_PATH ?>contact">
      <div class="label">Send</div>
      <img src="<?php echo get_image('right-arrow-orange.png') ?>" alt="k:d" class="right-arrow"></img>
    </a>
    <div class="contact-heading animate-in__fadeUp animate-once">Contact</div>
    <div class="row contact-info-block-group">
      <div class="contact-info-block col-md-4 col-sm-6 animate-in__fadeUp animate-once">
        <div class="title">General</div>
        <div class="text">
          Karten Design<br>
          4204 Glencoe Ave<br>
          Marina del Rey, CA 90292<br>
          <br>
          T: 310 827 8722<br>
          F: 310 821 4492
        </div>
      </div>
      <div class="contact-info-block col-md-4 col-sm-6 animate-in__fadeUp animate-once" style="transition-delay: 0.1s">
        <div class="title">New Business</div>
        <div class="text">
          Stuart Karten<br>
          stuart@kartendesign.com<br>
          310 827 8722 ext. 226
        </div>
      </div>
      <div class="contact-info-block col-md-4 col-sm-6 animate-in__fadeUp animate-once" style="transition-delay: 0.2s">
        <div class="title">Social</div>
        <div class="text">
          Linkedin<br>
          Twitter
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(locate_template('inc/footer.php')); ?>

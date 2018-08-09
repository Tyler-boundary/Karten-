<?php /* Template Name: About */ ?>
<?php include(locate_template('inc/header.php')); ?>
<?php
  $capabilities = [
    ['title' => 'Design Strategy', 'description' => 'IWe help companies differentiate their products and services to create competitive advantage in the marketplace. We develop innovation strategies tailored to bridge our clients’ business goals and objectives with their customers’ needs.'],
    ['title' => 'DESIGN RESEARCH', 'description' => 'Our researchers immerse themselves in individual motives, behaviors, values, and desires. Using unique tools and processes, we transform this data into actionable insights that help creative teams develop innovative solutions that meet real user needs.'],
    ['title' => 'INDUSTRIAL DESIGN', 'description' => 'Driven by strategic understanding of the marketplace and deep user empathy, we develop innovative products that blend seamlessly with end users’ lifestyles, habits, and workflows. We deliver product concepts that become powerful brand ambassadors.'],
    ['title' => 'Digital Design', 'description' => 'We bring clients’ apps and embedded interfaces to life through intuitive digital design. Our team creates meaningful interactions that surprise, delight, and engage end users while enhancing the overall brand experience.'],
    ['title' => 'Mechanical Engineering', 'description' => 'Our highly collaborative approach to innovation ensures a smooth transition from design to production. We create product architecture that supports innovative forms, implementing novel mechanisms and efficiencies wherever possible.'],
  ];
?>
<div class="about-page">
  <div class="container">
    <div class="heading animate-in__fadeUp animate-once">Since 1983, Karten Design has Ipsum Dolar Sit Amet, Consectetuer Elit.</div>
    <div class="divider"></div>
    <div class="subheading animate-in__fadeUp animate-once">
      Karten Design is an award-winning product design and innovation consultancy passionate about creating extraordinary experiences between people and products.
      <br />
      <br />
      For 32 years, we have helped leading consumer product and medical device companies seize new opportunities, build their brands, and generate revenue by designing and developing beautiful, easy-to-use products that resonate with end users.
    </div>
    <div class="capabilities-wrapper">
      <div class="capabilities-section">
        <div class="title">Our Capabilities</div>
        <div class="row animate-once">
          <?
            foreach ($capabilities as $key => $capability) {
          ?>
            <div class="col-md-6 animate-in__fadeUp" style="transition-delay: <? echo $key * 0.1 ?>s;">
              <div class="capability-title"><? echo $capability['title'] ?></div>
              <div class="capability-description"><? echo $capability['description'] ?></div>
            </div>
          <? } ?>
        </div>
      </div>
    </div>
    <div class="heading-2 animate-in__fadeUp animate-once" style="margin-top: 397px;">
      Lorem ipsum dolor sit amet adiscio, consectetuer adipiscing elit.
    </div>
    <div class="subheading-2 animate-in__fadeUp animate-once" style="margin-top: 78px;">
      Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis
    </div>
    <div class="clients-section" style="margin-top: 547px;">
      <div class="title">Our Clients</div>
      <div class="row animate-once">
        <?php
          for($i = 1; $i<=28; $i++) {
        ?>
          <div class="col-sm-6 col-md-4 col-lg-3 client-col animate-in__fadeUp" style="transition-delay: <?php echo $i * 0.1 ?>s;">
            <img src="<? echo get_image('axonics-logo-color-no-tag-large.png') ?>" alt="axonics-logo-color-no-tag-large" class="client"></img>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="quotes-section animate-in__fadeUp animate-once" style="margin-top: 491px;">
      <div class="quote">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</div>
      <div class="name">SAM JACKSON</div>
      <div class="company-name">AXONICS</div>
    </div>
    <div class="work-with-us-wrapper">
      <div class="work-with-us-section animate-in__fadeUp animate-once">
        <div class="title">Like what you see? we’re ready to chat about your project.</div>
        <div class="label-wrapper">
          <div class="label">Work With Us</div>
          <img src="<?php echo get_image('right-arrow-orange.png') ?>" alt="k:d" class="right-arrow"></img>
      </div>
    </div>
  </div>
</div>
<?php include(locate_template('inc/footer.php')); ?>

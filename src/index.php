<?php include(locate_template('inc/header.php')); ?>
<?php
  $projects = [
    ['title' => 'AXONICS', 'subheading' => 'INDUSTRIAL DESIGN, BRANDING', 'image' => 'project-image', 'class' => 'col-md-7', 'delay' => 0],
    ['title' => 'AXONICS', 'subheading' => 'INDUSTRIAL DESIGN, BRANDING', 'image' => 'project-image', 'class' => 'col-md-5', 'delay' => 0.1],
    ['title' => 'TEST PROJECT', 'subheading' => 'INDUSTRIAL DESIGN, BRANDING', 'image' => 'project-image', 'class' => '', 'delay' => 0, 'full-width' => true],
    ['title' => 'TEST PROJECT', 'subheading' => 'INDUSTRIAL DESIGN, BRANDING', 'image' => 'project-image', 'class' => 'col-md-5', 'delay' => 0],
    ['title' => 'TEST PROJECT', 'subheading' => 'INDUSTRIAL DESIGN, BRANDING', 'image' => 'project-image', 'class' => 'col-md-7', 'delay' => 0.1],
  ];
?>

<div class="home-page">
  <div class="container">
    <div class="heading">We create extraordinary experiences between people and products</div>
    <div class="subheading animate-in__fadeUp animate-once">We've designed medical devices that touched over 2.5 million people's lives.</div>
    <div class="clients-section">
      <div class="title">Our Clients</div>
      <div class="row animate-once">
        <?php
          for($i = 1; $i<=12; $i++) {
        ?>
          <div class="col-sm-6 col-md-4 col-lg-3 client-col animate-in__fadeUp" style="transition-delay: <?php echo $i * 0.1 ?>s;">
            <img src="<? echo get_image('axonics-logo-color-no-tag-large.png') ?>" alt="axonics-logo-color-no-tag-large" class="client"></img>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="projects-section">
      <div class="row-wrapper">
        <div class="row">
          <?php 
            foreach ($projects as $project) {
          ?>
            <? if ($project['full-width']) { ?>
                </div>
              </div>
              <div class="<? echo $project['class'] ?> project full-width animate-once animate-in__fadeUp">
                <div class="project-image" style="background-image: url(<? echo get_image($project['image'].'.png') ?>)">
                </div>
                <div class="project-subheading"><? echo $project['subheading'] ?></div>
                <div class="project-title"><? echo $project['title'] ?></div>
              </div>
              <div class="row-wrapper">
                <div class="row">
            <? } else { ?>
              <div class="<? echo $project['class'] ?> animate-once animate-in__fadeUp">
                <div class="project">
                  <div class="project-image" style="background-image: url(<? echo get_image($project['image'].'.png') ?>)">
                  </div>
                  <div class="project-subheading"><? echo $project['subheading'] ?></div>
                  <div class="project-title"><? echo $project['title'] ?></div>
                </div>
              </div>
            <? } ?>
          <? } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="following">
    <div class="label">Sign up for Karten Newsletter</div>
    <div class="big-input">
      <input class="email" placeholder="email" type="email">
      <img src="<?php echo get_image('input-go.png') ?>" alt="k:d" class="input-go"></img>
    </div>
    <img src="<?php echo get_image('footer-logo.png') ?>" alt="k:d" class="footer-logo"></img>
  </div>
</div>

<?php include(locate_template('inc/footer.php')); ?>

<?php include(locate_template('inc/header.php')); ?>

<div class="page">
  <div class="container">
    <div class="intro-wrap">
      <h1 class="heading animate-in__fadeUp animate-once"><?php echo get_field('heading') ?></h1>
      <div class="subheading animate-in__fadeUp animate-once" style="color: #ec7600"><?php echo get_field('subheading') ?></div>
      <div>
        <?php the_content() ?>
      </div>
    </div>
  </div>
</div>

<?php include(locate_template('inc/footer.php')); ?>


    <footer class="footer" id="signup">
      <div class="newsletter-title">Sign up for Karten Design Newsletter</div>

      <? echo do_shortcode('[yikes-mailchimp form="1"]') ?>

      <a href="<?php echo get_page_link(116) ?>">
        <img width="50" src="<?php echo get_image('logo-lettermark.svg') ?>" alt="k:d" class="footer-logo" />
      </a>
    </footer>
  </div> <!-- .main-wrap -->

  <?php wp_footer(); ?>
</body>
</html>

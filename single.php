<?php include(locate_template('inc/header.php')); ?>

<div class="page news-page">
  <div class="container" style="margin-top: 160px;">
    <img class="news-image animate-once animate-in__fadeUp" src="<? echo get_the_post_thumbnail_url() ?>" />
    <h1 class="heading animate-once animate-in__fadeUp"><? echo get_the_title() ?></h1>
    <div id="karten-post-content" class="content animate-once animate-in__fadeUp"><? echo wpautop(get_post_field('post_content', get_the_id()), true) ?></div>

    <script>
      /**
       * This script hides the first image in the post body if a post was
       * published before the launch date of the new site design. This is done
       * so we can use featured images in all posts, but not see the
       * duplicate image in the post body of older posts, which were created
       * without featured images.
       */
      var publishDate = new Date('<?php echo get_the_date('D M d Y H:i:s O'); ?>');
      var newPostFormatStartDate = new Date('28 Nov 2018');
      if (publishDate < newPostFormatStartDate) {
        document.querySelector('#karten-post-content img').style.display = 'none';
      }
    </script>
  </div>
</div>

<?php include(locate_template('inc/footer.php')); ?>

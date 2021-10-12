/**
 * Allow our framed device carousels to show their arrows outside the frame.
 * Elementor places them inside the overflow container that also contains the
 * track, making it impossible to move out with CSS. C'mon Elementor.
 */
import $ from 'jquery/dist/jquery.slim';

$(document).ready(() => {
  $('.slider--framed').each(function() {
    $(this).find('.elementor-swiper-button').appendTo(
      $(this).find('.elementor-widget-container')
    );
  })
})

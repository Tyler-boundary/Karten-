import $ from 'jquery/dist/jquery.slim';

window.closeMenu = () => {
  $('body').removeClass('menu-open');
}

window.openMenu = () => {
  $('body').addClass('menu-open');
}

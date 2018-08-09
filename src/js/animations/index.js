import $ from 'jquery/dist/jquery.slim';

$.fn.inView = function() {
  //Window Object
  const win = $(window);
  //Object to Check
  const obj = $(this);
  //the top Scroll Position in the page
  const scrollPosition = win.scrollTop();
  //the end of the visible area in the page, starting from the scroll position
  const visibleArea = win.scrollTop() + win.height();
  //the end of the object to check
  const objEndPos = obj.offset().top;
  return(visibleArea >= objEndPos && scrollPosition <= objEndPos ? true : false)
};

let lastScrollTop = 0;

const applyScroll = () => {
  let st = $(window).scrollTop();
  if (st > lastScrollTop){
      // downscroll code
      $('.header').addClass('hidden');
  } else {
     // upscroll code
     $('.header').removeClass('hidden');
  }
  lastScrollTop = st;

  // make animate-once elements to be active
  const inactiveAnimateOnceElements = $('.animate-once:not(.active)');
  for (let i = 0; i < inactiveAnimateOnceElements.length; i ++) {
    const element = inactiveAnimateOnceElements[i];
    if ($(element).inView()) {
      $(element).addClass('active');
    }
  }
}

$(document).ready(() => {
  applyScroll();
})

$(window).scroll((e) => {
  applyScroll();
});

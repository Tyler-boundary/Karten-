import anime from 'animejs';

/*
Make sure we only see the loader once every 10 mins max
 */
const loaderLastSeen = localStorage.getItem('loaderLastSeen');
const tenMinsAgo = new Date();
tenMinsAgo.setMinutes(new Date().getMinutes() - 10);

// if (!loaderLastSeen || new Date(loaderLastSeen) < tenMinsAgo) {
//   localStorage.setItem('loaderLastSeen', new Date());
//   doLoader();
// }
// else {
//   document.querySelector('.loader').style.display = 'none';
// }

// Velocity.defaults.


doLoader();
function doLoader() {
  const $loader = document.querySelector('.loader');
  const $wordmark = $loader.querySelector('.loader__wordmark');
  const $dotsWrapper = $loader.querySelector('.loader__dots');
  const $dot1 = $loader.querySelector('.loader__dot--1');
  const $dot2 = $loader.querySelector('.loader__dot--2');
  const $words = $loader.querySelectorAll('.loader__keyword');
  const $word1 = $loader.querySelector('.loader__keyword--1');
  const $word2 = $loader.querySelector('.loader__keyword--2');

  const TEMPO = 800;
  const DELAY = 100;
  const startWithPrevious = `-=${TEMPO}`;

  const revealPage = () => {
    const timeline = anime.timeline({
      easing: 'easeInOutQuad',
      duration: TEMPO,
      autoplay: true,
    });

    timeline
      // set initial values
      .add({
        targets: $dotsWrapper,
        rotate: -90,
        duraton: 0,
      })
      .add({
        targets: [$dot1, $dot2],
        duration: 0,
        scale: 40,
        stroke: '#F47F20',
        fill: 'rgba(244, 127, 32, 0)',
      })
      .add({
        targets: $dot1,
        duration: 0,
        translateY: '7.5%',
      })
      .add({
        targets: $dot2,
        duration: 0,
        translateY: '-10.5%',
      })

      // fade in words
      .add({
        targets: $words,
        opacity: 1,
      }, '+=500')

      // fade in dots
      .add({
        targets: $dotsWrapper,
        opacity: 1,
      }, '+=300')
      // move dots toward center
      .add({
        targets: $dot1,
        easing: 'easeInOutExpo',
        translateY: '+=4.7%',
      }, startWithPrevious)
      .add({
        targets: $dot2,
        easing: 'easeInOutExpo',
        translateY: '-=4.7%',
      }, startWithPrevious)
      .add({
        targets: $word1,
        easing: 'easeInOutExpo',
        translateX: '72%',
      }, startWithPrevious)
      .add({
        targets: $word2,
        easing: 'easeInOutExpo',
        translateX: '-40%',
      }, startWithPrevious)

      // dots weirdly jump back if we use offset on the next step. doing this
      // instead works
      .add({
        targets: [$dot1, $dot2],
        duration: 400,
        translateY: '+=0',
      })

      // rotate dots vertical and change stroke to orange
      .add({
        targets: $dotsWrapper,
        duration: 1400,
        rotate: 0,
      })
      .add({
        targets: [$dot1, $dot2],
        duration: 1400,
        strokeWidth: '0.6%',
      }, '-=1400')
      .add({
        targets: $dot1,
        duration: 1400,
        scale: 8,
        translateY: '-=10%',
      }, '-=1400')
      .add({
        targets: $dot2,
        duration: 1400,
        scale: 8,
        translateY: '+=10%',
      }, '-=1400')
      .add({
        targets: $words,
        duration: 300,
        opacity: 0,
      }, '-=1400')

      // dots weirdly jump back if we use offset on the next step. doing this
      // instead works
      .add({
        targets: [$dot1, $dot2],
        duration: 300,
        scale: '+=0',
        translateY: '+=0',
        stroke: '#F47F20',
      })

      // reduce dots to normal size and fill
      .add({
        targets: [$dot1, $dot2],
        scale: 1,
        translateY: 0,
        fill: '#F47F20',
      })
      .add({
        targets: $wordmark,
        opacity: 1,
      }, startWithPrevious)

      // dots weirdly jump back if we use offset on the next step. doing this
      // instead works
      .add({
        targets: [$dot1, $dot2],
        duration: 300,
        scale: '+=0',
        translateY: '+=0',
        stroke: '#F47F20',
        fill: '#F47F20',
      })

      // hide loader
      .add({
        targets: $loader,
        opacity: 0,
      })
      .add({
        targets: [$dot1, $dot2],
        scale: '+=0',
        translateY: '+=0',
        stroke: '#F47F20',
        fill: '#F47F20',
      }, startWithPrevious);
  }

  revealPage();
}

import Velocity from 'velocity-animate';

/*
  Loader markup for reference
 */
//   <div class="loader">
//     <div class="loader__logo">
//       <div class="loader__logo__k"></div>
//       <div class="loader__logo__dots"></div>
//       <div class="loader__logo__d"></div>
//     </div>
//   </div>

/*
Make sure we only see the loader once every 10 mins max
 */
const loaderLastSeen = localStorage.getItem('loaderLastSeen');
const tenMinsAgo = new Date();
tenMinsAgo.setMinutes(new Date().getMinutes() - 10);

if (!loaderLastSeen || new Date(loaderLastSeen) < tenMinsAgo) {
  localStorage.setItem('loaderLastSeen', new Date());
  doLoader();
}
else {
  document.querySelector('.loader').style.display = 'none';
}

function doLoader() {
  const $loader = document.querySelector('.loader');
  const $logo = $loader.querySelector('.loader__logo');
  const $logoK = $loader.querySelector('.loader__logo__k');
  const $logoD = $loader.querySelector('.loader__logo__d');
  const $dots = $loader.querySelector('.loader__logo__dots');
  const $wipe = $loader.querySelector('.loader__wipe');

  const TEMPO = 500;
  const DELAY = 300;

  // Fade in dots
  Velocity($dots,
    {
      translateZ: 0,
      opacity: 1,
    },
    {
      duration: 800,
      // delay: 1000,
    }
  );

  /*
  Have dots do half-rotations until content is loaded
  This is the start of our animation queue
   */
  let dotRotation = 0;
  const spinDots = () => {
    Velocity($dots,
      {
        rotateZ: dotRotation += 180,
        translateZ: 0,
      },
      {
        duration: TEMPO,
        delay: DELAY,
        complete: () => document.readyState === 'interactive' || document.readyState === 'complete'
          ? revealPage()
          : spinDots()
      }
    );
  }

  const revealPage = () => {
    // Tracks total delay so we can queue these effects more easily
    let revealDelay = DELAY;

    // Slide down K
    Velocity($logoK, {
      translateY: [0, -60],
      opacity: 1,
      translateZ: 0,
    },
    {
      duration: TEMPO,
      delay: revealDelay,
    });

    // Slide up D
    Velocity($logoD, {
      translateY: [0, 60],
      opacity: 1,
      translateZ: 0,
    },
    {
      duration: TEMPO,
      delay: revealDelay,
    });

    revealDelay += TEMPO;

    // Slide the logo up a lil'
    Velocity($logo, {
      translateY: '-200px',
      translateZ: 0,
    },
    {
      duration: TEMPO * 1.2,
      delay: revealDelay,
      easing: 'easeInQuad',
    });

    // Slide our orange wipe up, ending just outside view
    Velocity($wipe, {
      translateY: '-190vh',
      translateZ: 0,
    },
    {
      duration: TEMPO * 1.2,
      delay: revealDelay,
      easing: 'easeInQuad',
    });

    revealDelay += TEMPO * 1.2 + 100;

    // Fade out entire loader
    Velocity($loader, {
      opacity: 0,
      translateZ: 0,
    },
    {
      duration: TEMPO,
      delay: revealDelay,
      display: 'none',
      // Allow user to interact with page while loader is fading out
      begin: () => $loader.style.pointerEvents = 'none',
    });

    // Slide up page content
    Velocity(document.querySelector('.main-wrap'), {
      translateY: [0, 50],
      translateZ: 0,
    },
    {
      duration: TEMPO,
      delay: revealDelay,
      easing: 'easeOutQuad',
      // Make sure our reveal-on-scroll effects run
      complete: () => setTimeout(() => window.dispatchEvent(new Event('scroll'), 50))
    });
  }

  spinDots();
}

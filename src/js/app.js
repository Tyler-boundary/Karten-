import 'bootstrap';
import './animations';
import './layout';
import '../scss/style.scss';
import './components/ipv_animation.js'; 

import unorphan from 'unorphan';

unorphan(`
  h1, h2, h3, h4, h5, h6,
  p, p > *,
  .heading, .subheading,
  .title, .text, .label,
  .project-subheading, .project-title
`);

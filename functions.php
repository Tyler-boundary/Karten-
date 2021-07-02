<?php
global $siteVersion;
$siteVersion = '1.0.2';

// Hide Admin Bar
add_filter('show_admin_bar', '__return_false');

// Load CSS Styles
function karten_enqueue_styles() {
  global $siteVersion;
  wp_enqueue_style('styles', get_template_directory_uri() . '/style.css?v=' . time(), '', $siteVersion);
}
add_action('wp_enqueue_scripts', 'karten_enqueue_styles');

// Load JS Scripts
function karten_enqueue_scripts() {
  global $siteVersion;
  wp_register_script('scripts', get_template_directory_uri() . '/app.js', '', $siteVersion, true);

  wp_enqueue_script('scripts');

  $scripts_nonce = wp_create_nonce('lbc_cards');
  wp_localize_script(
    'scripts',
    'scripts_object',
    array(
      'ajaxurl' => admin_url('admin-ajax.php'),
      'nonce' => $scripts_nonce
    )
  );
}
add_action('wp_enqueue_scripts', 'karten_enqueue_scripts');

function karten_create_loader_wipe() {
  if (is_front_page()) {
    echo '' .
      '<div class="loader">' .
        '<div class="loader__logo">' .
          '<div class="loader__logo__k"></div>' .
          '<div class="loader__logo__dots"></div>' .
          '<div class="loader__logo__d"></div>' .
        '</div>' .
        '<div class="loader__wipe"></div>' .
      '</div>';

    echo '<script src="' . get_template_directory_uri() . '/loader-wipe.js?v=' . $siteVersion . '"></script>';
  }
}

function karten_create_loader() {
  if (is_front_page()) {
    echo '
      <div class="loader">
        <div class="loader__container">
          <div class="loader__logo">
            <svg class="loader__wordmark" width="522px" height="50px" xmlns="http://www.w3.org/2000/svg">
              <g fill="#424242" fill-rule="nonzero">
                <path d="M0 1h10.9655844v49H0V1zm12.3584416 23.9646202L25.5019481 1H37.987013L24.3116883 24.9646202 39 50H26.5149351L12.3584416 24.9646202z"/>
                <path d="M85 50H73.390411l-2.5684932-9.5858481H54.255137L51.6866438 50H40L55.0770548 1h14.8202055L85 50zM56.7465753 31.2362123h11.5068494l-5.650685-20.3954215-5.8561644 20.3954215z"/>
                <path d="M108.322878 34.7193347h-6.404674V50H91V1h20.172202c11.800738 0 16.162976 4.71153846 16.162976 13.8799376v6.0358628c0 6.0867984-2.193727 10.1871102-7.06027 12.2754678L132 49.9490644h-12.985855l-10.691267-15.2297297zm8.068881-18.7952183c0-3.6928274-1.386839-5.0935551-5.824723-5.0935551h-8.648832v14.3383576h8.648832c4.664821 0 5.824723-1.6808732 5.824723-5.3482328v-3.8965697z"/>
                <path d="M154.911565 10.7898023V50h-10.89864V10.7898023H131V1h37v9.7898023z"/>
                <path d="M174 50V1h31v9.7898023h-19.897436v8.9739854h18.333333v9.764308h-18.333333v10.682102H205V50z"/>
                <path d="M225.463492 17.7752341V50H215V1h13.485714l16.050794 33.7544225V1H255v49h-13.561905z"/>
                <path d="M313.693467 50H295V1h18.693467C325.577889 1 330 7.09313215 330 13.7471384v23.5312175C330 43.8048907 325.577889 50 313.693467 50zm5.452262-33.1425598c0-3.8241416-1.306533-5.9401665-6.758794-5.9401665h-6.507538v29.292924h6.507538c5.452261 0 6.758794-2.1415192 6.758794-5.9656608V16.8574402z"/>
                <path d="M339 50V1h31v9.7898023h-19.897436v8.9739854h18.333333v9.764308h-18.333333v10.682102H370V50z"/>
                <path d="M391.899096 50c-5.459227.0207843-10.866697-1.0474429-15.899096-3.1411179l1.843373-8.4599279c4.580788 1.4851597 9.363615 2.2709417 14.183735 2.3302796 5.709338 0 6.810241-1.0891524 6.810241-5.0658251s-.230421-4.8885212-8.269578-6.6362309c-11.90512-2.5329126-13.671687-4.9138503-13.671687-15.4254374 0-9.7263842 3.456326-13.6017404 17-13.6017404 5.009582.01536672 10.003737.55020064 14.900603 1.5957349l-1.100904 9.2198017c-4.476587-.90767026-9.02644-1.41629035-13.594879-1.51974755-4.941265 0-6.042169.88651935-6.042169 4.45792605 0 4.6858882.204819 4.7618756 7.962349 6.5855727C409.334337 23.4800993 410 26.038341 410 35.536763 410 45.0351851 406.748494 50 391.899096 50z"/>
                <path d="M419 50V1h11v49z"/>
                <path d="M456.44868 50C444.807918 50 439 43.9554881 439 35.1289833V14.8963075C439 5.91805766 444.907625 0 456.44868 0c5.145601.0397353 10.276877.55612653 15.329912 1.54274153l-1.296187 9.55993927c-4.64882-.6934683-9.335926-1.0904706-14.033725-1.18866967-5.384164 0-6.755132 2.85786547-6.755132 6.65149217v16.7172483c0 3.7936268 1.370968 6.9296915 6.755132 6.9296915 2.142799.0132106 4.283745-.1304773 6.406159-.4299444V24.8356095H473v22.7617603C467.618887 49.1706879 462.048727 49.979266 456.44868 50z"/>
                <path d="M492.463492 17.7752341V50H482V1h13.460317l16.050794 33.7544225V1H522v49h-13.561905z"/>
              </g>
            </svg>

            <svg class="loader__dots" width="13px" height="50px" xmlns="http://www.w3.org/2000/svg">
              <circle class="loader__dot loader__dot--1" fill="#F47F20" stroke="#F47F20" cx="6.5" cy="13.5" r="6" />
              <circle class="loader__dot loader__dot--2" fill="#F47F20" stroke="#F47F20" cx="6.5" cy="37.5" r="6" />
            </svg>
          </div>

          <svg class="loader__keyword loader__keyword--1" width="128px" height="34px" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" fill-rule="evenodd">
              <path d="M6.3 27v-6.948h5.076c2.232 0 4.17-.366 5.814-1.098 1.644-.732 2.91-1.788 3.798-3.168.888-1.38 1.332-2.994 1.332-4.842 0-1.872-.444-3.492-1.332-4.86-.888-1.368-2.154-2.424-3.798-3.168-1.644-.744-3.582-1.116-5.814-1.116H.468V27H6.3zm4.752-11.7H6.3V6.552h4.752c1.752 0 3.084.378 3.996 1.134.912.756 1.368 1.842 1.368 3.258 0 1.392-.456 2.466-1.368 3.222-.912.756-2.244 1.134-3.996 1.134zm24.984 11.988c3.504 0 6.168-1.044 7.992-3.132l-2.988-3.24c-.672.648-1.398 1.122-2.178 1.422-.78.3-1.674.45-2.682.45-1.464 0-2.688-.348-3.672-1.044-.984-.696-1.608-1.644-1.872-2.844h14.652c.072-.936.108-1.44.108-1.512 0-2.016-.438-3.786-1.314-5.31-.876-1.524-2.082-2.694-3.618-3.51-1.536-.816-3.252-1.224-5.148-1.224-1.944 0-3.702.426-5.274 1.278-1.572.852-2.808 2.04-3.708 3.564-.9 1.524-1.35 3.234-1.35 5.13 0 1.92.456 3.636 1.368 5.148.912 1.512 2.208 2.694 3.888 3.546 1.68.852 3.612 1.278 5.796 1.278zm4.068-11.664h-9.54c.192-1.248.72-2.232 1.584-2.952.864-.72 1.932-1.08 3.204-1.08 1.248 0 2.304.366 3.168 1.098.864.732 1.392 1.71 1.584 2.934zm18.252 11.664c2.04 0 3.864-.426 5.472-1.278 1.608-.852 2.868-2.034 3.78-3.546.912-1.512 1.368-3.228 1.368-5.148 0-1.92-.456-3.636-1.368-5.148-.912-1.512-2.172-2.694-3.78-3.546-1.608-.852-3.432-1.278-5.472-1.278-2.04 0-3.87.426-5.49 1.278-1.62.852-2.886 2.034-3.798 3.546-.912 1.512-1.368 3.228-1.368 5.148 0 1.92.456 3.636 1.368 5.148.912 1.512 2.178 2.694 3.798 3.546 1.62.852 3.45 1.278 5.49 1.278zm0-4.608c-1.44 0-2.628-.486-3.564-1.458-.936-.972-1.404-2.274-1.404-3.906 0-1.632.468-2.934 1.404-3.906.936-.972 2.124-1.458 3.564-1.458s2.622.486 3.546 1.458c.924.972 1.386 2.274 1.386 3.906 0 1.632-.462 2.934-1.386 3.906-.924.972-2.106 1.458-3.546 1.458zm19.98 11.304v-9.036c1.416 1.56 3.36 2.34 5.832 2.34 1.8 0 3.438-.414 4.914-1.242 1.476-.828 2.634-1.992 3.474-3.492.84-1.5 1.26-3.246 1.26-5.238 0-1.992-.42-3.738-1.26-5.238-.84-1.5-1.998-2.664-3.474-3.492-1.476-.828-3.114-1.242-4.914-1.242-2.664 0-4.692.84-6.084 2.52V7.632H72.72v26.352h5.616zm4.86-11.304c-1.44 0-2.622-.486-3.546-1.458-.924-.972-1.386-2.274-1.386-3.906 0-1.632.462-2.934 1.386-3.906.924-.972 2.106-1.458 3.546-1.458s2.622.486 3.546 1.458c.924.972 1.386 2.274 1.386 3.906 0 1.632-.462 2.934-1.386 3.906-.924.972-2.106 1.458-3.546 1.458zm19.98 4.32V.288H97.56V27h5.616zm14.832.288c3.504 0 6.168-1.044 7.992-3.132l-2.988-3.24c-.672.648-1.398 1.122-2.178 1.422-.78.3-1.674.45-2.682.45-1.464 0-2.688-.348-3.672-1.044-.984-.696-1.608-1.644-1.872-2.844h14.652c.072-.936.108-1.44.108-1.512 0-2.016-.438-3.786-1.314-5.31-.876-1.524-2.082-2.694-3.618-3.51-1.536-.816-3.252-1.224-5.148-1.224-1.944 0-3.702.426-5.274 1.278-1.572.852-2.808 2.04-3.708 3.564-.9 1.524-1.35 3.234-1.35 5.13 0 1.92.456 3.636 1.368 5.148.912 1.512 2.208 2.694 3.888 3.546 1.68.852 3.612 1.278 5.796 1.278zm4.068-11.664h-9.54c.192-1.248.72-2.232 1.584-2.952.864-.72 1.932-1.08 3.204-1.08 1.248 0 2.304.366 3.168 1.098.864.732 1.392 1.71 1.584 2.934z" fill="#444" fill-rule="nonzero"/>
              <circle stroke="#BDBCBC" cx="62.5" cy="24" r="250.5"/>
            </g>
          </svg>
          <svg class="loader__keyword loader__keyword--2" width="222px" height="35px" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" fill-rule="evenodd">
              <path d="M14.182 27V6.552h8.064V1.8H.286v4.752H8.35V27h5.832zm20.412.288c3.504 0 6.168-1.044 7.992-3.132l-2.988-3.24c-.672.648-1.398 1.122-2.178 1.422-.78.3-1.674.45-2.682.45-1.464 0-2.688-.348-3.672-1.044-.984-.696-1.608-1.644-1.872-2.844h14.652c.072-.936.108-1.44.108-1.512 0-2.016-.438-3.786-1.314-5.31-.876-1.524-2.082-2.694-3.618-3.51-1.536-.816-3.252-1.224-5.148-1.224-1.944 0-3.702.426-5.274 1.278-1.572.852-2.808 2.04-3.708 3.564-.9 1.524-1.35 3.234-1.35 5.13 0 1.92.456 3.636 1.368 5.148.912 1.512 2.208 2.694 3.888 3.546 1.68.852 3.612 1.278 5.796 1.278zm4.068-11.664h-9.54c.192-1.248.72-2.232 1.584-2.952.864-.72 1.932-1.08 3.204-1.08 1.248 0 2.304.366 3.168 1.098.864.732 1.392 1.71 1.584 2.934zm18.396 11.664c2.04 0 3.822-.432 5.346-1.296 1.524-.864 2.634-2.064 3.33-3.6l-4.356-2.376c-.984 1.776-2.436 2.664-4.356 2.664-1.464 0-2.676-.48-3.636-1.44s-1.44-2.268-1.44-3.924c0-1.656.48-2.964 1.44-3.924s2.172-1.44 3.636-1.44c1.896 0 3.348.888 4.356 2.664l4.356-2.34c-.696-1.584-1.806-2.802-3.33-3.654-1.524-.852-3.306-1.278-5.346-1.278-2.064 0-3.918.426-5.562 1.278-1.644.852-2.928 2.034-3.852 3.546-.924 1.512-1.386 3.228-1.386 5.148 0 1.92.462 3.636 1.386 5.148.924 1.512 2.208 2.694 3.852 3.546 1.644.852 3.498 1.278 5.562 1.278zM74.59 27v-9.576c0-1.728.42-3.03 1.26-3.906.84-.876 1.968-1.314 3.384-1.314 1.272 0 2.244.378 2.916 1.134.672.756 1.008 1.902 1.008 3.438V27h5.616V15.912c0-2.832-.738-4.968-2.214-6.408-1.476-1.44-3.414-2.16-5.814-2.16-1.248 0-2.4.198-3.456.594-1.056.396-1.956.966-2.7 1.71V.288h-5.616V27h5.616zm24.876 0v-9.576c0-1.728.42-3.03 1.26-3.906.84-.876 1.968-1.314 3.384-1.314 1.272 0 2.244.378 2.916 1.134.672.756 1.008 1.902 1.008 3.438V27h5.616V15.912c0-2.832-.738-4.968-2.214-6.408-1.476-1.44-3.414-2.16-5.814-2.16-1.32 0-2.532.222-3.636.666-1.104.444-2.028 1.074-2.772 1.89V7.632H93.85V27h5.616zm28.476.288c2.04 0 3.864-.426 5.472-1.278 1.608-.852 2.868-2.034 3.78-3.546.912-1.512 1.368-3.228 1.368-5.148 0-1.92-.456-3.636-1.368-5.148-.912-1.512-2.172-2.694-3.78-3.546-1.608-.852-3.432-1.278-5.472-1.278-2.04 0-3.87.426-5.49 1.278-1.62.852-2.886 2.034-3.798 3.546-.912 1.512-1.368 3.228-1.368 5.148 0 1.92.456 3.636 1.368 5.148.912 1.512 2.178 2.694 3.798 3.546 1.62.852 3.45 1.278 5.49 1.278zm0-4.608c-1.44 0-2.628-.486-3.564-1.458-.936-.972-1.404-2.274-1.404-3.906 0-1.632.468-2.934 1.404-3.906.936-.972 2.124-1.458 3.564-1.458s2.622.486 3.546 1.458c.924.972 1.386 2.274 1.386 3.906 0 1.632-.462 2.934-1.386 3.906-.924.972-2.106 1.458-3.546 1.458zm19.98 4.32V.288h-5.616V27h5.616zm14.436.288c2.04 0 3.864-.426 5.472-1.278 1.608-.852 2.868-2.034 3.78-3.546.912-1.512 1.368-3.228 1.368-5.148 0-1.92-.456-3.636-1.368-5.148-.912-1.512-2.172-2.694-3.78-3.546-1.608-.852-3.432-1.278-5.472-1.278-2.04 0-3.87.426-5.49 1.278-1.62.852-2.886 2.034-3.798 3.546-.912 1.512-1.368 3.228-1.368 5.148 0 1.92.456 3.636 1.368 5.148.912 1.512 2.178 2.694 3.798 3.546 1.62.852 3.45 1.278 5.49 1.278zm0-4.608c-1.44 0-2.628-.486-3.564-1.458-.936-.972-1.404-2.274-1.404-3.906 0-1.632.468-2.934 1.404-3.906.936-.972 2.124-1.458 3.564-1.458s2.622.486 3.546 1.458c.924.972 1.386 2.274 1.386 3.906 0 1.632-.462 2.934-1.386 3.906-.924.972-2.106 1.458-3.546 1.458zm23.472 11.592c3.552 0 6.252-.864 8.1-2.592 1.848-1.728 2.772-4.368 2.772-7.92V7.632h-5.328v2.484c-1.464-1.848-3.6-2.772-6.408-2.772-1.776 0-3.402.39-4.878 1.17-1.476.78-2.646 1.878-3.51 3.294-.864 1.416-1.296 3.048-1.296 4.896 0 1.848.432 3.48 1.296 4.896.864 1.416 2.034 2.514 3.51 3.294 1.476.78 3.102 1.17 4.878 1.17 2.616 0 4.656-.804 6.12-2.412v.828c0 1.776-.462 3.102-1.386 3.978-.924.876-2.358 1.314-4.302 1.314-1.248 0-2.496-.198-3.744-.594-1.248-.396-2.28-.93-3.096-1.602l-2.232 4.032c1.104.864 2.496 1.524 4.176 1.98 1.68.456 3.456.684 5.328.684zm.252-12.816c-1.488 0-2.712-.438-3.672-1.314-.96-.876-1.44-2.022-1.44-3.438 0-1.416.48-2.562 1.44-3.438.96-.876 2.184-1.314 3.672-1.314s2.706.438 3.654 1.314c.948.876 1.422 2.022 1.422 3.438 0 1.416-.474 2.562-1.422 3.438-.948.876-2.166 1.314-3.654 1.314zm18.288 12.816c1.848 0 3.426-.456 4.734-1.368 1.308-.912 2.406-2.484 3.294-4.716l8.748-20.556h-5.4l-5.472 13.14-5.436-13.14h-5.796l8.388 19.512-.072.18c-.384.864-.816 1.482-1.296 1.854-.48.372-1.104.558-1.872.558-.552 0-1.11-.108-1.674-.324-.564-.216-1.062-.516-1.494-.9l-2.052 3.996c.624.552 1.428.984 2.412 1.296.984.312 1.98.468 2.988.468z" fill="#444" fill-rule="nonzero"/>
              <circle stroke="#BDBCBC" cx="109.5" cy="24" r="250.5"/>
            </g>
          </svg>
        </div>
      </div>
    ';

    echo '<script src="' . get_template_directory_uri() . '/loader4.js?v=' . $siteVersion . '"></script>';
  }
}

// add_action('body_start', 'karten_create_loader_wipe');

function dequeue_script() {
  if(!is_admin()) {
    // wp_deregister_script('jquery');
    wp_deregister_script('wp-embed');
  }
}
add_action('wp_enqueue_scripts', 'dequeue_script');

add_filter('wpcf7_load_js', '__return_false');

// Register image sizes
function add_custom_sizes() {
  add_image_size( 'project-thumb', 9999, 400 );
  add_image_size('hero', 1920, 9999);
  // add_image_size('full-hd-cropped', 1920, 1080, true);
}
add_action('after_setup_theme', 'add_custom_sizes');

function karten_register_nav_menus() {
  register_nav_menus(
    array(
      'header-menu' => __('Hamburger Menu'),
      'footer-menu' => __('Footer Menu'),
      'social' => __( 'Social Media' )
    )
  );
}
add_action('init', 'karten_register_nav_menus');

// Enable featured image for post
add_theme_support('post-thumbnails');

// Remove WPML Generator Meta Tag
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

// Disallow Theme and Plugin Editor
define('DISALLOW_FILE_EDIT', true);

// Deactivate Wordpress REST API
add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');

// Deactivate Theme Update Check
function deactivateThemeUpdateCheck($r, $url) {
  if (0 !== strpos($url, 'http://api.wordpress.org/themes/update-check'))
    return $r; // Not a theme update request. Bail immediately.

  $themes = unserialize($r['body']['themes']);
  unset( $themes[ get_option('template' )]);
  unset( $themes[ get_option('stylesheet')]);
  $r['body']['themes'] = serialize($themes);
  return $r;
}

add_filter('http_request_args', 'deactivateThemeUpdateCheck', 5, 2);

// Change excerpt length
function wpdocs_custom_excerpt_length($length) {
  return 40;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

// Don't wrap images in p tags
function filter_ptags_on_images($content) {
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

// if(function_exists('acf_add_options_page')) {
//   $option_page = acf_add_options_page(array(
//     'page_title' => 'General Content',
//     'menu_title' => 'General Content',
//     'menu_slug' => 'general-content',
//     'capability' => 'edit_posts',
//     'redirect' => false
//   ));
// }

// Allow Editors to edit Menu
$role_object = get_role('editor');
$role_object->add_cap('edit_theme_options');

// Disable WP Emoticons
function disable_emojicons_tinymce($plugins) {
  if(is_array($plugins)) {
    return array_diff($plugins, array('wpemoji'));
  }else{
    return array();
  }
}
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
  add_filter( 'emoji_svg_url', '__return_false' );
}
add_action('init', 'disable_wp_emojicons');

function get_image($image) {
  return get_template_directory_uri().'/assets/images/'.$image;
}

// Our custom post type function
function create_posttype() {

  register_post_type( 'projects',
  // CPT Options
      array(
          'labels' => array(
              'name' => __( 'Projects' ),
              'singular_name' => __( 'Project' )
          ),
          'public' => true,
          'has_archive' => true,
          'rewrite' => array('slug' => 'works'),
          'taxonomies' => array('category', 'post_tag', 'featured'),
          'supports' => array('title', 'editor', 'thumbnail'),
      )
  );

  // register_post_type( 'outsights',
  // // CPT Options
  //     array(
  //         'labels' => array(
  //             'name' => __( 'Outsights' ),
  //             'singular_name' => __( 'Outsight' )
  //         ),
  //         'public' => true,
  //         'has_archive' => true,
  //         'rewrite' => array('slug' => 'outsights'),
  //         'taxonomies' => array('category', 'post_tag', 'featured'),
  //         'supports' => array('title', 'editor', 'thumbnail'),
  //     )
  // );

  register_post_type( 'news',
  // CPT Options
      array(
          'labels' => array(
              'name' => __( 'News' ),
              'singular_name' => __( 'News' )
          ),
          'public' => true,
          'has_archive' => true,
          'show_in_nav_menus' => true,
          'rewrite' => array('slug' => 'news'),
          'taxonomies' => array('category', 'post_tag', 'featured'),
          'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
      )
  );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


function karten_remove_menu_items() {
    remove_menu_page( 'edit.php?post_type=news' );
}
add_action( 'admin_menu', 'karten_remove_menu_items' );


/* * IPV ANIMATION */ 

function ipv_animation_shortcode($atts){ 

  // JS on js/karten2011.js 
  $new_atts = shortcode_atts(
    array(
      'img_dir' => 'https://karten.local/wp-content/uploads/ipvanimation/',
      'img_prefix' => 'ipvplus_', 
      'img_extension' => '.jpg', 
      'text' => 'WE CREATE\nEXTRAORDINARY\nEXPERIENCES IN\nHEALTHCARE.',
      'last_frame' => '50'
    ),
    $atts,
    'ipv'
  );

  return ' <script id="ipv_data" type="application/json">' . json_encode($new_atts) . '</script>' . '<div class="scroll-bound"><canvas id="ipv-animation" class="ipv-animation"> </canvas></div>';
  }

  add_shortcode('ipv_animation', 'ipv_animation_shortcode');

?>
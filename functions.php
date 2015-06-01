<?php
/*
 Theme Name:   Twenty Fifteen Child for Burkionline
 Theme URI:    http://cblog.burkionline.net
 Description:  Twenty Fifteen Child Theme for Burkionline
 Author:       Christophe Burki
 Author URI:   http://cbloh.burkionline.net
 Template:     twentyfifteen
 Version:      1.0.0
 License:      GNU General Public License v2 or later
 License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 Tags:         light, dark, two-columns, right-sidebar, responsive-layout, accessibility-ready
 Text Domain:  twenty-fifteen-child
*/

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}


/**
 * Setup My Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function burkionline_theme_setup() {
    load_child_theme_textdomain('burkionline', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'burkionline_theme_setup');


/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
if (! function_exists('burkionline_fonts_url')) {
    function burkionline_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';
        
        /* translators: If there are characters in your language that are not supported by Noto Sans, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Ubuntu font: on or off', 'burkionline')) {
            $fonts[] = 'Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic';
        }

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}
        
        if ($fonts) {
            $fonts_url = add_query_arg(array(
                                             'family' => urlencode(implode('|', $fonts)),
                                             'subset' => urlencode($subsets),
                                             ), '//fonts.googleapis.com/css');
        }
        
        return $fonts_url;
    }
}

?>

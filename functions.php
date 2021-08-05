<?php

/*---------	Sidebar's functionality ---------*/

	include('sidebar.php');

/*---------	Texonomy's functionality ---------*/

	include('includes/theme-init.php');
	
/*---------	Pagination's functionality ---------*/

	include('pagination.php');

/*---------	Shortcode's functionality ---------*/

	include(get_template_directory().'/symple-shortcodes/symple-shortcodes.php');

/*---------	This theme styles the visual editor with editor-style.css to match the theme style ---------*/

	add_editor_style();

/*------ jQuery enqueue Here ------*/
function vt_scripts() {

	wp_enqueue_script(
      'bootstrap', 
       get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.min.js',
       array('jquery'), 
       '2', 
       true
);

	wp_enqueue_script(
      'easing', 
       get_template_directory_uri().'/vendor/jquery.easing.min.js',
       array('jquery'), 
       '3', 
       true
);
	wp_enqueue_script(
      'mousewheel', 
       get_template_directory_uri().'/vendor/jquery.mousewheel.min.js',
       array('jquery'), 
       '4', 
       true
);
	wp_enqueue_script(
      'nicescroll', 
       get_template_directory_uri().'/vendor/jquery.nicescroll.min.js',
       array('jquery'), 
       '5', 
       true
);
	
	wp_enqueue_script(
      'nicescroll-plus', 
       get_template_directory_uri().'/vendor/jquery.nicescroll.plus.js',
       array('jquery'), 
       '6', 
       true
);
	wp_enqueue_script(
      'waypoints', 
       get_template_directory_uri().'/vendor/waypoints.min.js',
       array('jquery'), 
       '7', 
       true
);
	wp_enqueue_script(
      'nivo-lightbox', 
       get_template_directory_uri().'/vendor/nivo-lightbox/nivo-lightbox.min.js',
       array('jquery'), 
       '8', 
       true
);
	wp_enqueue_script(
      'bxslider', 
       get_template_directory_uri().'/vendor/jquery.bxslider.min.js',
       array('jquery'), 
       '9', 
       true
);
	wp_enqueue_script(
      'validate', 
       get_template_directory_uri().'/vendor/jquery.validate.min.js',
       array('jquery'), 
       '10', 
       true
);
	wp_enqueue_script(
      'placeholders', 
       get_template_directory_uri().'/vendor/placeholders.jquery.min.js',
       array('jquery'), 
       '11', 
       true
);
	wp_enqueue_script(
      'cross-browser', 
       get_template_directory_uri().'/vendor/cross-browser.js',
       array('jquery'), 
       '12', 
       true
);
	wp_enqueue_script(
      'main-js', 
       get_template_directory_uri().'/js/main.js',
       array('jquery'), 
       '13', 
       true
);
}
add_action('wp_enqueue_scripts', 'vt_scripts');
 
/*------ REGISTER css/screen.css ------*/

 function vt_scripts_styles(){ 
	wp_enqueue_style( 'style-main', get_stylesheet_uri() );
	wp_enqueue_style( 'reset', get_template_directory_uri() .'/vendor/bootstrap/css/bootstrap.min.css', array(), '2', 'screen'  );
	wp_enqueue_style( 'responsive', get_template_directory_uri() .'/vendor/font-awesome/css/font-awesome.min.css', array(), '3', 'screen'  );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/vendor/nivo-lightbox/nivo-lightbox.css', array(), '4', 'screen'  );
	wp_enqueue_style( 'nivo-lightbox', get_template_directory_uri() .'/vendor/nivo-lightbox/themes/default/default.css', array(), '5', 'screen'  );
	wp_enqueue_style( 'nivo-lightbox1', get_template_directory_uri() .'/vendor/animate.css', array(), '6', 'screen'  );
	wp_enqueue_style( 'customs', get_template_directory_uri() .'/css/customs.css', array(), '7', 'screen'  );
	wp_enqueue_style( 'styles', get_template_directory_uri() .'/css/styles.css', array(), '8', 'screen');
	
	$al_options = get_option('al_general_settings');

	if($al_options['al_choose_theme']=='style_1'):
	wp_enqueue_style( 'style_1', get_template_directory_uri() .'/css/themes/james.css', array(), '9', 'screen');

	elseif($al_options['al_choose_theme']=='style_2'):
	wp_enqueue_style( 'style_1', get_template_directory_uri() .'/css/themes/jessie.css', array(), '10', 'screen');

	elseif($al_options['al_choose_theme']=='style_3'):
	wp_enqueue_style( 'style_1', get_template_directory_uri() .'/css/themes/melissa.css', array(), '11', 'screen');
	endif; 
}
add_action( 'wp_enqueue_scripts', 'vt_scripts_styles' );



 
/*------ ENQUEUE GOOFLE FONT STYLES ------*/

function vt_fonts() {
$protocol = is_ssl() ? 'https' : 'http';
wp_enqueue_style( 'mytheme-opensans', "http://fonts.googleapis.com/css?family=Open+Sans:400,300,700" );
}
add_action( 'wp_enqueue_scripts', 'vt_fonts' );
	
/*--------- Site title ---------*/

	if(defined('ICL_SITEPRESS_VERSION')) {
		$wpml_include = get_template_directory() . '/includes/wpml.php';
		include $wpml_include;
	}

/*--------- Site title ---------*/

	add_filter( 'wp_title', 'vt_wp_title_for_home' );
	function vt_wp_title_for_home( $title )
	{
	  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
		return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
	  }
	  return $title;
	}
/*--------- register nav menu ---------*/

	function vt_register_menus() {
		register_nav_menus( array( 'vt-menu' => 'Main primary menu')
							);
	}
	add_action('init', 'vt_register_menus');


/*--------- Add class to <li> ---------*/

function vt_add_menu_parent_class($items)
{

    $parents=array();
    foreach($items as $item){

        if($item->menu_item_parent && $item->menu_item_parent>0){
            $parents[]=$item->menu_item_parent;
        }
    }
    foreach($items as $item){
        if(in_array($item->ID,$parents)){
            $item->classes[]='current';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects','vt_add_menu_parent_class');


class vt_description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
           
           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $object->classes ) ? array() : (array) $object->classes;
           if(isset($classes[0]))
		   $icon_class = $classes[0];
		   else
		   $icon_class = null;
		   
       $classes = array_slice($classes,1);

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           

           $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
           $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
           $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
            
            if( $icon_class != '' ) {
              $icon_classes = '<i class="'. $icon_class .'"></i>';
        }
        else{
          $icon_classes = '';
        }

           if($object->object == 'page')
           {
                $varpost = get_post($object->object_id);                
                $separate_page = get_post_meta($object->object_id, "vt_separate_page", true);
                $disable_menu = get_post_meta($object->object_id, "vt_disable_section_from_menu", true);
        $current_page_id = get_option('page_on_front');

                if ( ( $disable_menu != true ) && ( $varpost->ID != $current_page_id ) ) {

                  $output .= $indent . '<li class="parent" id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

                  if ( $separate_page == true )
                    $attributes .= ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'"' : '';
                  else{
                    if (is_front_page()) 
                      $attributes .= ' href="#' . $varpost->post_name . '"'; 
                    else 
                      $attributes .= ' href="'. home_url().'#'. $varpost->post_name . '"'; 
                      //$attributes .= ' href="'. home_url().'"';
                  } 

                  $object_output = $args->before;
                $object_output .= '<a'. $attributes .'>';
                $object_output .= $args->link_before . $icon_classes . '<span>' . apply_filters( 'the_title', $object->title, $object->ID ) . '</span>';
                $object_output .= $args->link_after;
                $object_output .= '</a>';
                $object_output .= $args->after;    

                 $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );                              
                }
                                         
           }

           
      }
}

/*---------	Theme Support ---------*/

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
	add_theme_support( "title-tag" );
	//add_theme_support( 'post-formats', array('image', 'quote', 'video', ));
	//add_post_type_support( 'shgallery', 'post-formats' );

/*---------	Word Limit ---------*/
 
	function vt_string_limit_words($string, $word_limit)
	{
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
	}

/*---------	Theme Option's functionality ---------*/

	$al_options = isset($_POST['options']) ? $_POST['options'] : get_option('al_general_settings');

	if ( ! isset( $content_width ) ) $content_width = 900;
	$adminPath 	=  get_template_directory() . '/library/admin/';
	$funcPath 	=  get_template_directory() . '/library/functions/';

	global $al_options;
	$al_options = isset($_POST['options']) ? $_POST['options'] : get_option('al_general_settings');

	include ($funcPath . 'options.php');

	include ($adminPath . 'custom-fields.php');
	include ($adminPath . 'scripts.php');
	include ($adminPath . 'admin-panel/admin-panel.php');


/*---------	Redirect To Theme Options Page on Activation ---------*/

	if (is_admin() && isset($_GET['activated'])){
		wp_redirect(admin_url('admin.php?page=adminpanel'));
	}
	$functions_path = get_template_directory() . '/functions/';
	$includes_path = get_template_directory() . '/includes/';

/*---------	Add post thumbnail functionality ---------*/
	add_theme_support( 'post-thumbnails' );
	add_image_size('portfolio', 200,180, true);
	set_post_thumbnail( 200, 180, true );
	
/*---------	Shortcodes in Widgets ---------*/
add_filter('widget_text', 'do_shortcode');
	
/*---------	Widgets ---------*/
include (TEMPLATEPATH . '/includes/widgets/m-network-widget.php');
include (TEMPLATEPATH . '/includes/widgets/m-tags-widget.php');
add_action("widgets_init", "load_m_widgets");

function load_m_widgets() {
	

	register_widget("m_networkwidget");
	register_widget("M_TagsWidget");
}
	
/*---------	Show Categories ---------*/

// How comments are displayed
function vt_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<?php $add_below = ''; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">	
		<div class="comment">
			<div class="avatar">
				<?php echo get_avatar($comment, 54); ?>
			</div>			
			<div class="comment-container">			
				<div class="comment-author meta">
					<strong><?php echo get_comment_author_link() ?></strong>
					<?php printf(__('%1$s at %2$s', 'M'), get_comment_date(),  get_comment_time()) ?></a><?php comment_reply_link(array_merge( $args, array('reply_text' => ' - Reply', 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>			
				<div class="text">
					<?php if ($comment->comment_approved == '0') : ?>
					<br />
					<?php endif; ?>
					<?php comment_text() ?>
				</div>			
			</div>			
		</div>

<?php }
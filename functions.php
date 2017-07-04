<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once('library/custom-post-types.php'); // you can disable this if you like
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
require_once('library/translation/translation.php'); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'panel-2col', 600, 350, true );
add_image_size( 'partner-logo', 9999,100, false);
add_image_size( 'square-600', 500, 500, true);

// add_image_size( 'bones-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'bonestheme'),
		'description' => __('The first (primary) sidebar.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'bonestheme'),
		'description' => __('The second (secondary) sidebar.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'bonestheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'bonestheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'bonestheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...','bonestheme').'" />
	</form>';
	return $form;
} // don't remove this bracket!
function my_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
    array(
      'name'      => 'caption',                       // unique field name
      'type'      => 'textarea',                      // registered field type
      'label'     => __( 'Caption', 'attachments' ),  // label to display
      'default'   => 'caption',                       // default value upon selection
    ),
     array(
      'name'      => 'linkurl',                       // unique field name
      'type'      => 'text',                      // registered field type
      'label'     => __( 'Link URL', 'attachments' ),  // label to display
      'default'   => '',                       // default value upon selection
    ),
  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'Examples & Images',

    // all post types to utilize (string|array)
    'post_type'     => array( 'post', 'page', 'custom_type' ),

    // meta box position (string) (normal, side or advanced)
    'position'      => 'advanced',

    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Attach images here!',

    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Add Images', 'attachments' ),

    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Add', 'attachments' ),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    // fields array
    'fields'        => $fields,

  );

  $attachments->register( 'my_attachments', $args ); // unique instance name
}

add_action( 'attachments_register', 'my_attachments' );
add_post_type_support('page', 'excerpt');

// Additional social medie menu
register_nav_menus(
		array(
			'meta-links' => __( 'The Meta Menu', 'bonestheme' )   // main nav in header
		)
	);

// the social media menu (should you choose to use one)
function bones_meta_links() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => 'meta-links clearfix',   // class of container (should you choose to use it)
    	'menu' => __( 'Meta Links', 'bonestheme' ),   // nav name
    	'menu_class' => 'nav meta-links clearfix',      // adding custom nav class
    	'theme_location' => 'meta-links',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
	));
} /* end bones footer link */

// Adding custom theme settings for Eventdate 
function mytheme_customize_register( $wp_customize ) {
	// Create settings itself
	$wp_customize->add_setting( 'tagline_date' , array(
	    'default'     => '12-14. September 2014',
	    'transport'   => 'refresh',
	) );

	// Now add the Color Controls
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'c_tagline_date', array(
		'label'        => __( 'Date', 'bonestheme' ),
		'section'    => 'title_tagline',
		'settings'   => 'tagline_date',
	) ) );
}
add_action( 'customize_register', 'mytheme_customize_register' );

// Additional social media menu
register_nav_menus(
		array(
			'cta-links' => __( 'The CTA-Menu', 'bonestheme' )   // main nav in header
		)
	);

// the social media menu (should you choose to use one)
function bones_cta_links() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => 'cta-links clearfix',   // class of container (should you choose to use it)
    	'menu' => __( 'CTA Link(s)', 'bonestheme' ),   // nav name
    	'menu_class' => 'nav cta-links clearfix',      // adding custom nav class
    	'theme_location' => 'cta-links',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
	));
} /* end bones footer link */


function get_the_content_by_id($post_id) {
	
	$page_data = get_page($post_id);
	
	if ($page_data) {
		$content = $page_data->post_content;
		$content = apply_filters('the_content', $content);
		return $content;
	}
	else return false;

}


/*==============================
=            EVENTS            =
==============================*/

function get_event_fields ($id) {
			
	$result['event_city'] = get_field('event_city');
	$result['event_date'] = get_field('event_date');
	$tmp = get_field('event_registerpage');
	$result['event_registerpage_id'] = $tmp[0]->ID;
	$result['event_facts'] = get_field('event_facts');
	$result['event_program'] = get_field('event_program');
	$result['event_sponsors'] = get_field('event_sponsors');
	
	return $result;

}

/*-----  End of EVENTS  ------*/

// Register Custom Taxonomy
function page_category() {

	$labels = array(
		'name'                       => _x( 'Kategorien', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Kategorie', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Kategorien', 'text_domain' ),
		'all_items'                  => __( 'Alle', 'text_domain' ),
		'parent_item'                => __( 'Eltern', 'text_domain' ),
		'parent_item_colon'          => __( 'Elternelement:', 'text_domain' ),
		'new_item_name'              => __( 'Neue Kategorie Nam', 'text_domain' ),
		'add_new_item'               => __( 'Neue Kategorie hinzufügen', 'text_domain' ),
		'edit_item'                  => __( 'Kategorie bearbeiten', 'text_domain' ),
		'update_item'                => __( 'Kategorie aktualisieren', 'text_domain' ),
		'view_item'                  => __( 'Kategorie ansehen', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'page_category', array( 'page' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'page_category', 0 );

//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}

add_filter( 'body_class', 'add_slug_body_class' );



// Allow upload of these files types:

add_filter('upload_mimes', 'jugendhackt_extra_mimes');

function jugendhackt_extra_mimes( $mimes ){
  $mimes['zip']  = 'application/zip';
  return $mimes;
}





// Twitter Widget 

function wpb_load_widget() {
	register_widget( 'jh_twitter_widget' );
}

add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget 
class jh_twitter_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'jh_twitter_widget', 

			// Widget name will appear in UI
			__('JH Twitter Widget', 'wpb_widget_domain'), 

			// Widget description
			array( 'description' => __( 'Display twitter feet from spesific account or list.', 'wpb_widget_domain' ), ) 
		);
	}

	// Creating widget front-end

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		?>

			<a class="twitter-timeline" href="https://twitter.com/jugendhackt/lists/jugend-hackt-allstars/">A Twitter List by TwitterDev</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		<?php

			// <div class="clearfix">
			// 	<div class="follow-wrap">
			// 		<a class="twitter-follow-button" href="https://twitter.com/jugendhackt" data-show-count="false" data-show-screen-name="false">Follow @twitterapi</a>
			// 	</div>
			// </div>
			// <a class="twitter-timeline" href="https://twitter.com/jugendhackt" data-widget-id="535489125131239424" data-chrome="noborders transparent nofooter noheader">Tweets by @jugendhackt</a>
			// <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		echo $args['after_widget'];
	}

		
	// Widget Backend 
	public function form( $instance ) {

		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'wpb_widget_domain' );
		}

		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here


//End Twitter Widget

?>

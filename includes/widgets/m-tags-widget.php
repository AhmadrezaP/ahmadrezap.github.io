<?php
/*********************************************************************************************

Tags Widget

*********************************************************************************************/
class M_TagsWidget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'M-Popular Tags', array( 'description' => 'M Tags Widget for this site.' ) );
    }
	       function form( $instance ) {
		$widget_title="";
		$tags="";
		if(isset( $instance['widget_title'] ))
		{
		$widget_title = esc_html($instance['widget_title']);
		}
		if(isset( $instance['tags'] ))
		{
		$tags = esc_html($instance['tags']);
		}


    /*
     * Displays the widget form in the admin panel
     */

 ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'm') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'tags' ); ?>"><?php _e('Number of Tags:', 'm') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'tags' ); ?>" name="<?php echo $this->get_field_name( 'tags' ); ?>" type="text" value="<?php echo $tags; ?>" />
        </p>

<?php
    }
/*
 * Renders the widget in the sidebar
 */
function widget( $args, $instance ) {
echo $args['before_widget'];
?>

<aside class="widget widget_tag_cloud">
    <h3 class="line-title"><?php echo esc_html($instance['widget_title']); ?></h3>

<div class="tagcloud"> 
	<?php
		$tags=null;
		$tags_count="";
		$tags = get_tags(array('orderby' => 'count', 'order' => 'DESC', 'number' => $tags_count));
		if(isset($tags)!=null)
		{
		
		foreach ( (array) $tags as $tag ) {
		echo ' <a href="' . get_tag_link ($tag->term_id) . '" rel="tag" class="btn btn-danger custom_btn_bottom">' . $tag->name . '</a>';
		}
		}
	?>			
</div>
 </aside>

        <?php
        echo $args['after_widget'];
    }
};


?>
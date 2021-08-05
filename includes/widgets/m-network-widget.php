<?php
// =============================== m Business Hour ======================================
class m_networkwidget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'M-Network Widget', array( 'description' => 'M  Network Hour Widget for this site.' ) );
    }

    function form( $instance ) {
	$widget_title="";
	$net1="";
	$net2="";
	$net3="";
	$net4="";
	$net5="";
	$nett1="";
	$nett2="";
	$nett3="";
	$nett4="";
	$nett5="";

		if(isset( $instance['widget_title'] ))
		{
		$widget_title = esc_html($instance['widget_title']);
		}
		if(isset( $instance['nett1'] ))
		{
        $nett1 = esc_html( $instance['nett1'] );
		}
		if(isset( $instance['net1'] ))
		{
        $net1 = esc_html( $instance['net1'] );
		}
		if(isset( $instance['nett2'] ))
		{
        $nett2 = esc_html( $instance['nett2'] );
		}
		if(isset( $instance['net2'] ))
		{
        $net2 = esc_html( $instance['net2'] );
		}
		if(isset( $instance['nett3'] ))
		{
        $nett3 = esc_html( $instance['nett3'] );
		}
		if(isset( $instance['net3'] ))
		{
        $net3 = esc_html( $instance['net3'] );
		}
		if(isset( $instance['nett4'] ))
		{
        $nett4 = esc_html( $instance['nett4'] );
		}
		if(isset( $instance['net4'] ))
		{
        $net4 = esc_html( $instance['net4'] );
		}
		if(isset( $instance['nett5'] ))
		{
        $nett5 = esc_html( $instance['nett5'] );
		}
		if(isset( $instance['net5'] ))
		{
        $net5 = esc_html( $instance['net5'] );
		}
        ?>
		
		<p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'm') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id( 'nett1' ); ?>"><?php _e('Network Title:', 'm') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'nett1' ); ?>" name="<?php echo $this->get_field_name( 'nett1' ); ?>" type="text" value="<?php echo $nett1; ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id( 'net1' ); ?>"><?php _e('Network Link:', 'm') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'net1' ); ?>" name="<?php echo $this->get_field_name( 'net1' ); ?>" type="text" value="<?php echo $net1; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'nett2' ); ?>"><?php _e('Network Title:	', 'm') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'nett2' ); ?>" name="<?php echo $this->get_field_name( 'nett2' ); ?>" type="text" value="<?php echo $nett2; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'net2' ); ?>"><?php _e('Network Link:	', 'm') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'net2' ); ?>" name="<?php echo $this->get_field_name( 'net2' ); ?>" type="text" value="<?php echo $net2; ?>" />
        </p>		
		<p>
            <label for="<?php echo $this->get_field_id( 'nett3' ); ?>"><?php _e('Network Title:', 'm') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'nett3' ); ?>" name="<?php echo $this->get_field_name( 'nett3' ); ?>" type="text" value="<?php echo $nett3; ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id( 'net3' ); ?>"><?php _e('Network Link:', 'm') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'net3' ); ?>" name="<?php echo $this->get_field_name( 'net3' ); ?>" type="text" value="<?php echo $net3; ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id( 'nett4' ); ?>"><?php _e('Network Title:', 'm') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'nett4' ); ?>" name="<?php echo $this->get_field_name( 'nett4' ); ?>" type="text" value="<?php echo $nett4; ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id( 'net4' ); ?>"><?php _e('Network Link:', 'm') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'net4' ); ?>" name="<?php echo $this->get_field_name( 'net4' ); ?>" type="text" value="<?php echo $net4; ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id( 'nett5' ); ?>"><?php _e('Network Title:', 'm') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'nett5' ); ?>" name="<?php echo $this->get_field_name( 'nett5' ); ?>" type="text" value="<?php echo $nett5; ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id( 'net5' ); ?>"><?php _e('Network Link:', 'm') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'net5' ); ?>" name="<?php echo $this->get_field_name( 'net5' ); ?>" type="text" value="<?php echo $net5; ?>" />
        </p>
		
		<?php
    }

function widget( $args, $instance ) {
echo $args['before_widget'];
?>
			<aside class="widget">
				<h3 class="line-title"><?php echo esc_html($instance['widget_title']); ?></h3>
				<ul>
					<li><a href="<?php echo esc_html($instance['net1']); ?>" target="_blank"><?php echo esc_html($instance['nett1']); ?></a></li>
					<li><a href="<?php echo esc_html($instance['net2']); ?>" target="_blank"><?php echo esc_html($instance['nett2']); ?></a></li>
					<li><a href="<?php echo esc_html($instance['net3']); ?>" target="_blank"><?php echo esc_html($instance['nett3']); ?></a></li>
					<li><a href="<?php echo esc_html($instance['net4']); ?>" target="_blank"><?php echo esc_html($instance['nett4']); ?></a></li>
					<li><a href="<?php echo esc_html($instance['net5']); ?>" target="_blank"><?php echo esc_html($instance['nett5']); ?></a></li>
				</ul>
			</aside>

<?php


        echo $args['after_widget'];
    }
};

?>
<?php

global $vt_new_meta_boxes;
$vt_new_meta_boxes =
array(
	
	// Portfolio
	"_casestudies_title" => array(
		"name" => "_casestudies_title",
		"std" => "",
		"title" => "Casestudies Sub Title",
		"description" => "Put Here Casestudies Sub Title",
		"type" => "text",
		"location" => "casestudies"
	),
	"_casestudies_subcontent" => array(
		"name" => "_casestudies_subcontent",
		"std" => "",
		"title" => "casestudies Sub Content",
		"description" => "Put Here casestudies Sub Content",
		"type" => "textarea",
		"location" => "casestudies"
	),
);


function vt_new_meta_boxes_casestudies() {
	vt_new_meta_boxes('casestudies');
}

function vt_new_meta_boxes( $type ) {
	global $post, $vt_new_meta_boxes;
	
	// Use nonce for verification
    echo '<input type="hidden" name="Spa_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<div class="form-wrap">';

	foreach($vt_new_meta_boxes as $meta_box) {
		if( $meta_box['location'] == $type) {
			
			if ( $meta_box['type'] == 'title' ) {
				echo '<p style="font-size: 18px; font-weight: bold; font-style: normal; color: #e5e5e5; text-shadow: 0 1px 0 #111; line-height: 40px; background-color: #464646; border: 1px solid #111; padding: 0 10px; -moz-border-radius: 6px;">' . $meta_box[ 'title' ] . '</p>';
			} else {			
				$meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
		
				if(isset ($meta_box_value) && $meta_box_value == "")
					if(isset( $meta_box['std'])) $meta_box_value = $meta_box['std'];
				if (!isset($meta_box['blocksize'])) echo '<div class="clear"></div>';
				?>
				<div class="form-field form-required <?php echo isset($meta_box['blocksize']) ?  $meta_box[ 'blocksize' ] : ''?>">
				<?php 
				switch ( $meta_box['type'] ) {
					case 'text':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						echo 	'<input type="text" name="' . $meta_box[ 'name' ] . '" value="' . htmlspecialchars( $meta_box_value ) . '" />';
						if (isset($meta_box[ 'description' ])) echo '<p>' . $meta_box[ 'description' ] . '</p>';
					break;
					
					case 'textarea':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						echo 	'<textarea name="' . $meta_box[ 'name' ] . '" id ="'. $meta_box[ 'name' ].'">' . htmlspecialchars( $meta_box_value ). '</textarea>';
						if (isset($meta_box[ 'description' ])) echo '<p>' . $meta_box[ 'description' ] . '</p>';
					break;
					
					case 'checkbox':
						if($meta_box_value == '1'){ $checked = "checked=\"checked\""; }else{ $checked = "";} 
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong>&nbsp;
						<input style="width: 20px;" id ="'. $meta_box[ 'name' ].'" type="checkbox" name="' . $meta_box[ 'name' ] . '" value="1" ' . $checked . ' /></label>';
						if (isset($meta_box[ 'description' ])) echo '<p>' . $meta_box[ 'description' ] . '</p>';
					break;
					
					case 'sidebar':
					
					 global $post;
						$post_id = $post;
						if (is_object($post_id)) {
							$post_id = $post_id->ID;
						}
						$selected_sidebar = get_post_meta($post_id, 'sbg_selected_sidebar', true);
						if(!is_array($selected_sidebar)){
							$tmp = $selected_sidebar; 
							$selected_sidebar = array(); 
							$selected_sidebar[0] = $tmp;
						}
						$selected_sidebar_replacement = get_post_meta($post_id, 'sbg_selected_sidebar_replacement', true);
						if(!is_array($selected_sidebar_replacement)){
							$tmp = $selected_sidebar_replacement; 
							$selected_sidebar_replacement = array(); 
							$selected_sidebar_replacement[0] = $tmp;
						}
						?>
						
						<label for="<?php echo $meta_box[ 'name' ]?>"><strong><?php echo $meta_box[ 'title' ]?></strong></label>
						<input name="sbg_edit" type="hidden" value="sbg_edit" />
						
						<ul>
						<?php 
						global $wp_registered_sidebars;
						//var_dump($wp_registered_sidebars);		
							for($i=0;$i<1;$i++){ ?>
								<li>Replace 
								<select name="sidebar_generator[<?php echo $i?>]">
									<option value="0"<?php if($selected_sidebar[$i] == ''){ echo " selected";} ?>>WP Default Sidebar</option>
								<?php
								$sidebars = $wp_registered_sidebars;// sidebar_generator::get_sidebars();
								if(is_array($sidebars) && !empty($sidebars)){
									foreach($sidebars as $sidebar){
										if($selected_sidebar[$i] == $sidebar['name']){
											echo "<option value='{$sidebar['name']}' selected>{$sidebar['name']}</option>\n";
										}else{
											echo "<option value='{$sidebar['name']}'>{$sidebar['name']}</option>\n";
										}
									}
								}
								?>
								</select>
								 with  
								<select name="sidebar_generator_replacement[<?php echo $i?>]">
									<option value="0"<?php if($selected_sidebar_replacement[$i] == ''){ echo " selected";} ?>>None</option>
								<?php
								
								$sidebar_replacements = $wp_registered_sidebars;//sidebar_generator::get_sidebars();
								if(is_array($sidebar_replacements) && !empty($sidebar_replacements)){
									foreach($sidebar_replacements as $sidebar){
										if($selected_sidebar_replacement[$i] == $sidebar['name']){
											echo "<option value='{$sidebar['name']}' selected>{$sidebar['name']}</option>\n";
										}else{
											echo "<option value='{$sidebar['name']}'>{$sidebar['name']}</option>\n";
										}
									}
								}
								?>
								</select> 
								
								</li>
							<?php } ?>
						</ul>
						
						<?php if (isset($meta_box[ 'description' ])) echo '<p class="top15">' . $meta_box[ 'description' ] . '</p>'; ?>
						<?php
					break;
					
					// slider
					case 'slider':
						
						if ($meta_box_value == '') $meta_box_value = 9;  
						echo '
						<script type="text/javascript">		
						jQuery(document).ready(function () {						
							jQuery( "#'.$meta_box['id'].'-slider" ).slider({ 
								value: '.$meta_box_value.', 
								min: '.$meta_box['min'].', 
								max: '.$meta_box['max'].', 
								step: '.$meta_box['step'].', 
								slide: function( event, ui ) { 
									jQuery( "#'.$meta_box['id'].'" ).val( ui.value ); 
								} 
							});
						});
						</script>';  
						
						//$value = $meta != '' ? $meta : '0';
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						echo '<div id="'.$meta_box['id'].'-slider" class="slider-container"></div>
						<input type="text" name="'.$meta_box['id'].'" id="'.$meta_box['id'].'" value="'.$meta_box_value.'" size="5" class="minimal-textbox" />
						<div class="clear"></div>';
						if (isset($meta_box[ 'description' ])) echo '<p>' . $meta_box[ 'description' ] . '</p>';
					break;
						
					case 'select':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
				        echo	'<select name="' . $meta_box[ 'name' ] . '" id ="'. $meta_box[ 'name' ].'">';
						// Loop through each option in the array
						foreach ($meta_box[ 'options' ] as $option) {
							if(is_array($option)) {
								echo '<option ' . ( $meta_box_value == $option['value'] ? 'selected="selected"' : '' ) . ' value="' . $option['value'] . '">' . $option['text'] . '</option>';
							} else {
   								echo '<option ' . ( $meta_box_value == $option ? 'selected="selected"' : '' ) . ' value="' . $option['value'] . '">' . $option['text'] . '</option>';
							}
						}
                        
						echo	'</select>';
						if (isset($meta_box[ 'description' ])) echo '<p>' . $meta_box[ 'description' ] . '</p>'; 
					break;
					
					// radio  
					case 'radio':  
					
						echo 	'<label><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						echo '<div class="radio-container">';
						
						foreach ( $meta_box['options'] as $option ) { 
							$checked = ($meta_box_value == $option['value']) ? ' checked="checked"' : '';
							echo '
							<div class="radio-block">	
								<input type="radio" name="'.$meta_box['name'].'" id="radio_button_'.$option['value'].'" value="'.$option['value'].'" '.$checked.' /> 
								<label for="radio_button_'.$option['value'].'">'.$option['text'].'</label>
								<div class="clearbig"></div> 
							</div>';
						}  
						echo '</div><div class="clear"></div>';
						if (isset($meta_box[ 'description' ])) echo '<p>' . $meta_box[ 'description' ] . '</p>'; 
						
					break; 
						
					case 'casestudies_cat':
						echo 	'<label for="' . $meta_box[ 'name' ] .'" id ="'. $meta_box[ 'name' ].'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						
						// Get the categories first
						$args = array( 'taxonomy' => 'casestudies_category', 'hide_empty' => '0' );
						$categories = get_categories( $args ); 
						
						$selected_cats = explode( ",", $meta_box_value );
						
						echo '<ul class="casestudies-listing">';

						// Loop through each category
						foreach ($categories as $category) {
														
							foreach ($selected_cats as $selected_cat) {
        	           			if($selected_cat == $category->cat_ID){ $checked = 'checked="checked"'; break; } else { $checked = ""; }
		            	    }
							
			                echo '<li>
								<input style="width: 14px;" type="checkbox" id="pcategory' . $category->cat_ID . '" name="' . $meta_box[ 'name' ] . '[]" value="' . $category->cat_ID . '" ' . $checked . ' />
								<label for="pcategory'.$category->cat_ID.'" class="inline">' . $category->name . '</label>
								</li>';
						}
						
						echo '</ul>';
						if (isset($meta_box[ 'description' ])) echo '<p class="top15">' . $meta_box[ 'description' ] . '</p>'; 
					break;
				}
				
				
				echo '</div>';
				
			}
		}
	}
	
	echo '</div>';
}

function create_meta_box() {
	global $theme_name;
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'vt_new_meta_boxes_casestudies', 'Lg'  . ' casestudies Settings', 'vt_new_meta_boxes_casestudies', 'casestudies', 'normal', 'high' );
	}
}

function save_postdata( $post_id ) {
	
	if ( !wp_verify_nonce(isset($_POST['Lg_meta_box_nonce']) ? $_POST['Lg_meta_box_nonce'] : '', basename(__FILE__)) ) {
		
		return $post_id;
	}
	
	if ( wp_is_post_revision( $post_id ) or wp_is_post_autosave( $post_id ) )
		return $post_id;
		
	global $post, $vt_new_meta_boxes;

	foreach($vt_new_meta_boxes as $meta_box) {
		
		if ( $meta_box['type'] != 'title)' ) {
		
			if ( 'page' == $_POST['post_type'] ) {
				if ( !current_user_can( 'edit_page', $post_id ))
					return $post_id;
			} else {
				if ( !current_user_can( 'edit_post', $post_id ))
					return $post_id;
			}
			
			if (isset($_POST[$meta_box['name']]) && is_array($_POST[$meta_box['name']]) ) {
				$cats = '';
				foreach($_POST[$meta_box['name']] as $cat){
					$cats .= $cat . ",";
				}
				$data = substr($cats, 0, -1);
			}
			
			else { $data = ''; if(isset($_POST[$meta_box['name']])) $data = $_POST[$meta_box['name']]; }			
			
			if(get_post_meta($post_id, $meta_box['name']) == "")
				add_post_meta($post_id, $meta_box['name'], $data, true);
			elseif($data != get_post_meta($post_id, $meta_box['name'], true))
				update_post_meta($post_id, $meta_box['name'], $data);
			elseif($data == "")
				delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
				
		}
	}
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

?>
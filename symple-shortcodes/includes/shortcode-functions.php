<?php
/**
*
*
*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');

/*
 * Clear Floats
 * @since v1.0
 */

if(! function_exists('vt_page_title_shortcode')){
	function vt_page_title_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			), $atts) );
            $html ='';
            $html .='<div class="line row timeline-margin">
              <div class="content-wrap">
                <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height"></div>
                <div class="col-md-9 bg1 full-height"></div>
              </div>
            </div>
            <div class="line row">
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs timeline-title full-height">
              </div>
              <div class="col-md-8 content-wrap bg1">
                <h2 class="section-title">'.$content.'</h2>
              </div>
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
            </div>';
			return $html;
	}
	add_shortcode('vt_page_title', 'vt_page_title_shortcode' );
}

if(! function_exists('vt_profile_field_shortcode')){
	function vt_profile_field_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			), $atts) );
            $html ='';
            $html .='<div class="line row">
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-point "></div>
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content">
                  <h3 class="section-item-title-1">'.$title.'</h3>
                  <p>'.$content.'</p>
                </div>
              </div>
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
            </div>';
			return $html;
	}
	add_shortcode('vt_profile_field', 'vt_profile_field_shortcode' );
}

if(! function_exists('vt_education_field_shortcode')){
	function vt_education_field_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'cource_title'=>'',
			'cource_time'=>'',
			), $atts) );
            $html ='';
            $html .='<div class="line row">
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-education "></div>
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content line-content-education">
                  <h3 class="section-item-title-1">'.$title.'</h3>
                  <h4 class="graduation-time"><i class="fa fa-university"></i> '.$cource_title.' - <span class="graduation-date">'.$cource_time.'</span></h4>
                  <div class="graduation-description">
                    <p>'.$content.'</p>
                  </div>
                </div>
              </div>
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              </div>';
			return $html;
	}
	add_shortcode('vt_education_field', 'vt_education_field_shortcode' );
}

if(! function_exists('vt_experience_field_shortcode')){
	function vt_experience_field_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'designation'=>'',
			'duration'=>'',
			), $atts) );
            $html ='';
            $html .='<div class="line row">
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-work "></div>
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content line-content-education">
                  <h3 class="section-item-title-1">'.$title.'</h3>
                  <h4 class="job"><i class="fa fa-flag"></i> '.$designation.' - <span class="job-date">'.$duration.'</span></h4>
                  <div class="job-description">
                    <p>'.$content.'</p>
                  </div>
                </div>
              </div>
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
            </div>';
			return $html;	
	}
	add_shortcode('vt_experience_field', 'vt_experience_field_shortcode' );
}

if(! function_exists('vt_skill_field_shortcode')){
	function vt_skill_field_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'skill_title_1'=>'',
			'percentage_1'=>'',
			'skill_title_2'=>'',
			'percentage_2'=>'',
			'skill_title_3'=>'',
			'percentage_3'=>'',
			'skill_title_4'=>'',
			'percentage_4'=>'',
			'skill_title_5'=>'',
			'percentage_5'=>'',
			), $atts) );
            $html ='';
            $html .='<div class="line row">
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-point "></div>
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content">
                  <h3 class="section-item-title-1">'.$title.'</h3>
                  <ul class="skills-list">';
			if($percentage_1 != '' AND $skill_title_1 != ''):	  
            $html .='<li>
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" data-percent="'.$percentage_1.'" style="width: '.$percentage_1.';">
                            <span class="sr-only">'.$percentage_1.' Complete</span>
                        </div>
                        <span class="progress-type">'.$skill_title_1.'</span>
                        <span class="progress-completed">'.$percentage_1.'</span>
                      </div>
                    </li>';
			endif;		
			if($percentage_2 != '' AND $skill_title_2 != ''):	  
            $html .='<li>
                      <div class="progress">
                        <div class="progress-bar progress-bar-2" role="progressbar" data-percent="'.$percentage_2.'" style="width: '.$percentage_2.';">
                            <span class="sr-only">'.$percentage_2.' Complete</span>
                        </div>
                        <span class="progress-type">'.$skill_title_2.'</span>
                        <span class="progress-completed">'.$percentage_2.'</span>
                      </div>
                    </li>';
			endif;		
			if($percentage_3 != '' AND $skill_title_3 != ''):	  
            $html .='<li>
                      <div class="progress" title="Doing my best!">
                        <div class="progress-bar progress-bar-3" role="progressbar" data-percent="'.$percentage_3.'" style="width: '.$percentage_3.';">
                            <span class="sr-only">'.$percentage_3.' Complete</span>
                        </div>
                        <span class="progress-type">'.$skill_title_3.'</span>
                        <span class="progress-completed">'.$percentage_3.'</span>
                      </div>
                    </li>';
			endif;		
			if($percentage_4 != '' AND $skill_title_4 != ''):	  
            $html .='<li>
                      <div class="progress" title="Doing my best!">
                        <div class="progress-bar progress-bar-3" role="progressbar" data-percent="'.$percentage_4.'" style="width: '.$percentage_4.';">
                            <span class="sr-only">'.$percentage_4.' Complete</span>
                        </div>
                        <span class="progress-type">'.$skill_title_4.'</span>
                        <span class="progress-completed">'.$percentage_4.'</span>
                      </div>
                    </li>';
			endif;		
			if($percentage_5 != '' AND $skill_title_5 != ''):	  
            $html .='<li>
                      <div class="progress" title="Doing my best!">
                        <div class="progress-bar progress-bar-3" role="progressbar" data-percent="85%" style="width: '.$percentage_5.';">
                            <span class="sr-only">'.$percentage_5.' Complete</span>
                        </div>
                        <span class="progress-type">'.$skill_title_5.'</span>
                        <span class="progress-completed">'.$percentage_5.'</span>
                      </div>
                    </li>';
			endif;
            $html .='</ul>
                </div>
              </div>
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
            </div>';
			return $html;	
	}
	add_shortcode('vt_skill_field', 'vt_skill_field_shortcode' );
}

if(! function_exists('vt_portfolio_shortcode')){
	function vt_portfolio_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			), $atts) );
            $html ='';
            $html .='<div class="line row">
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-point "></div>
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content">
                  <h3 class="section-item-title-1">'.$title.'</h3>
                  <div class="portfolio-itens clearfix">';
					$port=array('post_type' => 'portfolio', 'showposts' => -1   );
					$loop=new WP_Query($port);
					while ( $loop->have_posts() ) : $loop->the_post(); 		
            $attachedimage = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio'); 
			$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');		
			$html .='<div class="portfolio-item">
                      <a href="'.$full_image[0].'" title="'.get_the_content().'" class="nivobox" data-lightbox-gallery="portfolio">
                        <div class="hover">
                          <p class="zoomi"><i class="fa fa-search"></i></p>
                          <p class="portfolio-item-title"><strong>'.get_the_title().'</strong><br/>';		 
			$html1 = get_the_term_list('portfolio_category', '',', ','');
			$html .= strip_tags($html1);
            $html .='</p></div>
                        <div class="hover-bg-wrapper">
                          <div class="hover-bg"></div>
                        </div>
                        <div class="portfolio-item-thumbnail">
                          <img src="'.$attachedimage[0].'" alt="" />
                        </div>                        
                      </a>
                    </div>';			
					endwhile;		
            $html .='</div>
                </div>
              </div>
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
            </div>';
			return $html;	
	}
	add_shortcode('vt_portfolio', 'vt_portfolio_shortcode' );
}

if(! function_exists('vt_interestes_field_shortcode')){
	function vt_interestes_field_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',		
			), $atts) );	
            $html ='';
            $html .='<div class="line row">
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-point "></div>
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content">
                  <h3 class="section-item-title-1">'.$title.'</h3>
                  <p>'.$content.'</p>
                </div>
              </div>
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
            </div>';
			return $html;	
	}
	add_shortcode('vt_interestes_field', 'vt_interestes_field_shortcode' );
}

if(! function_exists('vt_contact_shortcode')){
	function vt_contact_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'address'=>'',
			'phone'=>'',
			'mail'=>'',
			), $atts) );
		$al_options = get_option('al_general_settings');
            $html ='';
            $html .='<div class="line row">
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-mail "></div>
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content contact-content">
                  <h3 class="section-item-title-1">'.$title.'</h3>
                  <div class="row">
                    <div class="col-md-8 contact-form-wrapper">'.do_shortcode($content).'
                    </div>
                    <div class="col-md-4 contact-infos">
                      <h4 class="contact-subtitle-1">'.$address.'</h4>
                      <p>'.$al_options['al_contact_address'].'</p>
                      <h4 class="contact-subtitle-1">'.$phone.'</h4>
                      <p>'.$al_options['al_phone'].'</p>
                      <h4 class="contact-subtitle-1">'.$mail.'</h4>
                      <p>'.$al_options['al_contact_mail'].'</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
            </div>';			
			return $html;	
	}
	add_shortcode('vt_contact', 'vt_contact_shortcode' );
}

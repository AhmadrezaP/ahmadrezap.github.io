<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>
<?php  $al_options = get_option('al_general_settings'); ?>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Page title -->
		<?php {
		 ?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php } 
		?>
  <!-- /Page title -->
		<?php if(!empty($al_options['al_favicon'])) { ?>
		  <link rel="shortcut icon" href="<?php echo $al_options['al_favicon'];?>" type="image/x-icon">
		<?php } ?>
  
 	<?php 
		if ( is_singular() && comments_open() && get_option('thread_comments') )
			wp_enqueue_script( 'comment-reply' );
			wp_head(); 
	?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target="#side-menu">

<!-- Page Loader
========================================================= -->
<?php if(!empty($al_options['al_loader_option'])):
	if($al_options['al_loader_option'] == 'yes'):
?>
<div class="loader" id="page-loader"> 
  <div class="loading-wrapper">
    <div class="tp-loader spinner"></div>
    <!-- Edit With Your Name -->
    <div class="side-menu-name">
	    <?php if(!empty($al_options['al_name'])):
	$pieces = explode(" ", $al_options['al_name']);
	$i=0;
	foreach($pieces as $pieces1):
	//echo count($pieces);
//		echo $al_options['al_name']; 
	if($i==0):
	echo $pieces1.' <strong>';
	else:
	echo $pieces1.' ';
	endif; 
	$i++;
	endforeach;
	?>
	</strong>
	<?php endif; ?>
      <!--John <strong>Rex</strong>-->
    </div>
    <!-- /Edit With Your Name -->
    <!-- Edit With Your Job -->
    <p class="side-menu-job"><?php if(!empty($al_options['al_title_designation'])):
		echo $al_options['al_title_designation']; endif; ?></p>
    <!-- /Edit With Your Job -->
  </div>   
</div>
<?php endif; ?>
<?php endif; ?>
<!-- /End of Page loader
========================================================= -->

<!-- SIDE MENU
========================================================= -->
<div class="side-menu-open hidden-sm hidden-xs">
  <!-- Menu-button -->
    <a href="#" class="btn btn-default side-menu-button"><i class="fa fa-bars"></i> <?php if(!empty($al_options['al_menutitle'])):
		echo $al_options['al_menutitle']; else: echo 'MENU'; endif; ?></a>
  <!-- /menu-button -->
</div>
<!-- Side Menu container -->
<div class="side-menu">
  <!-- close button -->
  <span id="side-menu-close"><i class="fa fa-times"></i></span>
  <!-- /close button -->


  <!-- Menu header -->
  <?php if($al_options['al_choose_logoname'] == 'No'): ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php if(!empty($al_options['al_logoimg'])): echo $al_options['al_logoimg']; endif; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
	</a>
	<p class="side-menu-job"></p>
  <?php  endif; ?>
  <?php if($al_options['al_choose_logoname'] == 'Yes'): ?>
  <div class="side-menu-name">
    <!-- edit with your name
	John <strong>Rex</strong>
	-->
    <?php if(!empty($al_options['al_name'])):
	$pieces = explode(" ", $al_options['al_name']);
	$i=0;
	foreach($pieces as $pieces1):
	//echo count($pieces);
//		echo $al_options['al_name']; 
	if($i==0):
	echo $pieces1.' <strong>';
	else:
	echo $pieces1.' ';
	endif; 
	$i++;
	endforeach;
	?>
	</strong>
	<?php endif; ?>
    <!-- /edit with your name -->
  </div>
  <!-- edit with your Job -->
  <p class="side-menu-job"><?php if(!empty($al_options['al_title_designation'])):
		echo $al_options['al_title_designation']; endif; ?></p>
  <?php  endif; ?>
  <!-- /edit with your job -->
  <!-- /Menu Header -->

  <!-- Main Navigation -->
  <nav id="side-menu" class="side-menu-este">
	<?php		
		$header_menu_args = array(
			'theme_location'  => 'vc-menu',
			'container'       => '',
			'menu_class'      => 'sf-menu nav side-menu-nav',
			'menu_id'         => 'nav',
			'echo' => true,
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 0,
			'walker'          => new vt_description_walker()
			);
		wp_nav_menu( $header_menu_args );
	?>
  </nav>
  <!-- /Main Navigation-->

  <!-- Other Buttons -->
  <div class="side-menu-buttons">
  <?php if($al_options['al_show_down_resume'] == 'yes'): ?>
    <a href="<?php if(!empty($al_options['al_upload_resume'])): echo $al_options['al_upload_resume']; else: echo '#';  endif; ?>" class="btn btn-side-menu"><i class="fa fa-download"></i> <?php if(!empty($al_options['al_show_down_r_text'])): echo $al_options['al_show_down_r_text']; endif; ?></a>
  <?php endif; ?>
  <?php if($al_options['al_show_contact_us'] == 'yes'): ?>  
    <a href="<?php if(!empty($al_options['al_show_contact_us_link'])): echo $al_options['al_show_contact_us_link']; else: echo '#'; endif; ?>" class="btn btn-side-menu"><i class="fa fa-envelope-o"></i> <?php if(!empty($al_options['al_show_contact_us_text'])): echo $al_options['al_show_contact_us_text']; endif; ?></a>
  <?php endif; ?>
  </div>
  <!-- /Other Buttons-->
</div>
<!-- /side menu container -->

<!-- /SIDE MENU
========================================================= -->
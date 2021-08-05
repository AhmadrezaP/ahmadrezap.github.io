<?php get_header(); ?>

<div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-1 resume-container">
    <div class="line row mar_bot">
	
		<div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
		
		<div class="col-md-7 content-wrap bg1">
			
			<?php while ( have_posts() ) : the_post(); ?>
			
			<div id="" class="line-content line-content-education">
				<?php the_content();?>
				<?php wp_link_pages(); ?>
			</div>
			 
			<?php endwhile;?>
				
		</div>
			
	</div>
		
</div>
	
<?php  get_footer();  ?>
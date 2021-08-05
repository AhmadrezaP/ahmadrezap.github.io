<?php get_header(); ?>

	<!-- Header Colors -->
    <div class="col-md-10 col-sm-10  col-md-offset-2 col-sm-offset-1 clearfix top-colors">
      <div class="top-color top-color1"></div>
      <div class="top-color top-color2"></div>
      <div class="top-color top-color3"></div>
      <div class="top-color top-color1"></div>
      <div class="top-color top-color2"></div>
    </div>
    <!-- /Header Colors -->    
    
    <!-- Beginning of Content -->
    <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-1 resume-container">
            <div class="line row mar_bot">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-7 content-wrap bg1">
					<?php query_posts('post_type=post&post_status=publish&posts_per_page=5&paged='. get_query_var('paged')); ?>
					<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
					<?php 
						$dat=array();$dy="";
						$dt=get_the_date();
						//echo $dt;
						$dat =  preg_split('[ /.-]', $dt);
						$dm=$dat[0];
						list($month,$dy,$year)=explode(' ', $dm);
						list($day) = explode(',', $dy);
					?>
                <div class="line-content line-content-education">
                  <!-- Graduation title -->
                  <a href="<?php the_permalink();?>">
					<h3 class="section-item-title-1"><?php the_title(); ?></h3>
				  </a>
                  <!-- /Graduation title -->
                  <!-- Graduation time -->
                  <h4 class="graduation-time"><i class="fa fa-university"></i> <?php the_author(); ?> <?php _e('-','vt');?> <span class="graduation-date"><?php the_time('d/m/Y') ?></span></h4>
                  <!-- /Graduation time -->
                  <!-- content -->
                  <div class="graduation-description">
                    <p><?php the_content();?></p>
                  </div>
                  <!-- /Content -->
                </div>
				<?php endwhile; ?>
				<?php endif; ?>	
				<div class="pagination">
					<?php if (function_exists("m_pagination")) {
						m_pagination($wp_query->max_num_pages);
					} ?>
				</div>
            </div>
			  <div class="col-md-4 content-wrap bg1">
			       <div class="graduation-description">
						<?php dynamic_sidebar( 'Blog Sidebar' ); ?>
                  </div>
              </div>
            </div>
    </div>
<?php get_footer(); ?>	  
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

<div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-1 resume-container">
	<div class="line row">
		<h1 class="intro-title1 def_ttitle">
			<span class="color1 bold">
				<?php printf( __( 'Search Results for: %s', 'vt' ), '<span>' . get_search_query() . '</span>' ); ?>
			</span>
		</h1>
	</div>
</div>

<div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-1 resume-container">
    <div class="line row mar_bot">
		<div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
		<div class="col-md-7 content-wrap bg1">
			<div class="line-content line-content-education">
				<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php
					get_template_part( 'content', get_post_format() );
				?>
				
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="post entry type-post format-standard">
                    <div class="post-content">
                        <header class="post-header">
							<a href="<?php the_permalink();?>"><h3 class="section-item-title-1"><?php the_title(); ?></h3></a>				
								<p><?php the_excerpt(); ?></p>
                        </header><!-- post-header -->
                                            
						<?php if (!empty($post->post_excerpt)) { ?>
						<div class="post-excerpt left">
							<?php the_excerpt(); ?>
						</div><!-- post-excerpt -->
						<?php } ?>
                                        
                    </div><!-- post-content -->
				</article>

				<?php endwhile; ?>
				<?php else : ?>

				<article id="post-0" class="post entry type-post format-standard">
					<header class="entry-header">
						<h2 class="entry-title"><?php _e( 'Nothing Found', 'm' ); ?></h2>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'm' ); ?></p>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

				<?php endif; ?>

			</div><!-- #content -->
		</div>
		
		<div class="col-md-4 content-wrap bg1">
			<div class="graduation-description">
				<?php dynamic_sidebar( 'Blog Sidebar' ); ?>
			</div>
		</div>
		
	</div>
</div>
<?php get_footer(); ?>	
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
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

		<?php /* If this is a category archive */ if (is_category()) { ?>
			<h1 class="intro-title1 def_ttitle"><span class="color1 bold"><?php //single_cat_title(); ?></span></h1>

		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h1 class="intro-title1 def_ttitle"><span class="color1 bold">Posts Tagged &#8216;<?php //single_tag_title(); ?>&#8217;</span></h1>

		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h1 class="intro-title1 def_ttitle"><span class="color1 bold">Archive for <?php the_time(); ?></span></h1>

		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h1 class="intro-title1 def_ttitle"><span class="color1 bold">Archive for <?php the_time(); ?></span></h1>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h1 class="intro-title1 def_ttitle"><span class="color1 bold">Archive for <?php the_time(); ?></span></h1>

		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h1 class="intro-title1 def_ttitle"><span class="color1 bold">Author Archive</span></h1>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h4>Blog Archives</h4>
		
		<?php } ?>
		
	</div>
</div>

<div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-1 resume-container">
    <div class="line row mar_bot">
		<div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
		<div class="col-md-7 content-wrap bg1">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			
			<article class="post entry type-post format-standard">
				<?php if(!empty($attachment_image)) { ?>
				<div class="line-thumb">
						<a href="#"><img src="<?php echo $attachment_image[0]; ?>" alt="thumb" /></a>
				</div>
			  <?php }?>
				<div class="line-entry-content-wrap">
					<div class="entry-header">
						<a href="<?php the_permalink();?>"><h3 class="entry-title"><?php the_title(); ?></h3></a>
						<div class="line-entry-meta">
							<div class="line-info">
								<?php _e('Post by','m')?>
								<a href="<?php the_permalink();?>" class="author"><?php the_author(); ?></a>
								<?php _e('in ','m')?>
								<span class="incategory">
									<a href="<?php the_permalink();?>"><?php the_category(', '); ?></a>
								</span>
							</div>
							<div class="line-time">
							   <?php the_time('d/m/Y') ?>
							</div>
						</div>
					</div>
					<div class="line-entry-content">
					  <p><?php the_content();?></p>
					</div>
				</div>
			</article>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div class="col-md-4 content-wrap bg1">
			<div class="graduation-description">
				<?php dynamic_sidebar( 'Blog Sidebar' ); ?>
			</div>
		</div>
    </div>
</div>
<!-- end content -->
<?php get_footer(); ?>	
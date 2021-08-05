<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	
	<div class="line-section line-comments">
		<h3 class="line-title"><?php comments_number('0 Comment', '1 Comment', '% Comments' );?></h3>
		
		<ol class="commentlist">
			<?php wp_list_comments('type=comment&callback=m_comment'); ?>
		</ol>
		
		<div class="comments-navigation">
		    <div class="alignleft"><?php previous_comments_link(); ?></div>
		    <div class="alignright"><?php next_comments_link(); ?></div>
		</div>
	</div>
	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<p>Comments are closed.</p>

	<?php endif; ?>
	
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<div id="respond" class="line-section line-comment-form form-group">
		<h3 class="line-title"><?php comment_form_title( 'Leave a Comment', 'Leave a comment to %s' ); ?></h3>

	<div class="cancel-comment-reply reply">
		<?php cancel_comment_reply_link(); ?>
	</div>


	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="commentform">

		<?php if ( is_user_logged_in() ) : ?>

			<p class="login">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

		<?php else : ?>
		
			<p class="comment-form-author line-hide">
				<input type="text" name="author" id="name" size="30" class="form-control name_box" placeholder="Name *"<?php if ($req) echo "aria-required='true'"; ?> />
			</p>
			<p class="comment-form-email line-hide">
				<input type="text" name="email" id="email" class="form-control name_box" placeholder="Email *" size="30" <?php if ($req) echo "aria-required='true'"; ?> />
			</p>
			<p class="comment-form-url line-hide">
				<input type="text" id="url" class="form-control name_box" placeholder="Website" value="" name="url">
			</p>

			<?php endif; ?>

			<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->
			<p class="comment-form-comment">
				<textarea name="comment" id="comments" style="height: 113px;" class="form-control comment_box" cols="40" rows="3" placeholder="Comments *"></textarea>
			</p>

			<span class="break"></span>
			<span id="message"></span>
			<p class="form-submit">
				<input type="submit" class="line-btn green" id="submit" value="Post Comment" />
			</p>

				<?php comment_id_fields(); ?>

		

		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>
	
</div>
<?php endif; ?>

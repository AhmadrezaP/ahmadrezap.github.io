
<?php function m_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>	
	<?php $add_below = ''; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">	
		<div class="comment">
			<div class="avatar">
				<?php echo get_avatar($comment, 54); ?>
			</div>			
			<div class="comment-container">			
				<div class="comment-author meta">
					<strong><?php echo get_comment_author_link() ?></strong>
					<?php printf(__('%1$s at %2$s', 'M'), get_comment_date(),  get_comment_time()) ?></a><?php comment_reply_link(array_merge( $args, array('reply_text' => ' - Reply', 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>			
				<div class="text">
					<?php if ($comment->comment_approved == '0') : ?>
					<br />
					<?php endif; ?>
					<?php comment_text() ?>
				</div>			
			</div>			
		</div>

<?php }
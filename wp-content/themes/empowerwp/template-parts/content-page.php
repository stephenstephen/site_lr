<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div>
		<?php
		the_content();
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'empowerwp' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html( 'Page', 'empowerwp' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
    </div>
	<?php
	if ( comments_open() || get_comments_number() ):
		comments_template();
	endif;
	?>
</div>

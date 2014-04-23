<?php get_header(); ?>

<section id="content">
<div class="container">

<?php /* if it's not in or within directory (7) then show*/ ?>
<?php if (!is_category(7) && !post_is_in_descendant_category(7)) : ?>

		<?php /* show featured/announcement */ ?>
		<?php get_template_part( 'modules/content', 'featured');  ?>

		<?php /* adrotate long banner */ ?>
		<?php if (function_exists('adrotate_group') && !is_page() ) { ?>
        <div class="adblock">
        	<?php echo adrotate_ad(2); ?>
        </div>
		<?php } ?>


	<?php if ( have_posts() ) : ?>
	
    	<ul class="row list-unstyled">
    	<?php while ( have_posts() ) : the_post(); if( $post->ID == $do_not_duplicate ) continue;?>

			<?php get_template_part( 'modules/content', 'block' ); ?>

    		<?php if (function_exists('adrotate_group')) { ?>
			
				<?php if( $wp_query->current_post == 3 ) { ?>
				<li class="box-post col-sm-6 col-md-4 col-lg-3 hidden-xs">
					<article class="thumbnail text-center">
						<div class="ads">
							<?php echo adrotate_ad(1); ?>
							<a href="/advertise/">Advertise with us.</a>
						</div>
					</article>
				</li>
				<?php } ?>
			
				<?php if( $wp_query->current_post == 3 ) { ?>
					<li class="box-post col-sm-6 col-md-4 col-lg-3 hidden-xs">
						<article class="thumbnail text-center">
							<div class="ads">
								<?php echo adrotate_ad(3); ?>
								<a href="/advertise/">Advertise with us.</a>
							</div>
						</article>
					</li>
				<?php } ?>
			
				<?php if( $wp_query->current_post == 3 ) { ?>
					<li class="box-post col-sm-6 col-md-4 col-lg-3 hidden-xs">
						<article class="thumbnail text-center">
							<div class="ads">
								<?php echo adrotate_ad(4); ?>
								<a href="/advertise/">Advertise with us.</a>
							</div>
						</article>
					</li>
				<?php } ?>
			
				<?php if( $wp_query->current_post == 3 ) { ?>
					<li class="box-post col-sm-6 col-md-4 col-lg-3 hidden-xs">
						<article class="thumbnail text-center">
							<div class="ads">
								<?php echo adrotate_ad(4); ?>
								<a href="/advertise/">Advertise with us.</a>
							</div>
						</article>
					</li>
				<?php } ?>
			
			<?php } ?>

		<?php endwhile; ?>
		</ul>

	<?php else : ?>

		<div class="row">
			<?php get_template_part( 'modules/content', 'none' ); ?>
		</div>
	
	<?php endif; // end have_posts() check ?>

<?php /* else show directory (7) format */ ?>
<?php else : ?><!-- directory -->

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<?php if ( have_posts() ) : ?>
		
	    	<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'modules/content', get_post_format() ); ?>

				<?php if (is_category(7) || post_is_in_descendant_category(7)) : ?>
				<hr/>
				<?php endif ; ?>

			<?php endwhile; ?>

		<?php else : ?>

				<?php get_template_part( 'modules/content', 'none' ); ?>	
		
		<?php endif;?>
		</div><!-- col-md-10 col-md-offset-1 -->
	
	    <?php /* get_sidebar(); */ ?>
	</div><!-- .row -->

<?php endif; ?><!-- directory -->

	
		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if ( function_exists('hdn_pagination') ) { hdn_pagination(); } elseif ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="previous"><?php next_posts_link( __( '&larr; Older posts', 'hdn' ) ); ?></div>
			<div class="next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'hdn' ) ); ?></div>
		</nav>
		<?php } ?>


</div><!-- .container -->
</section><!-- #content -->

<?php get_footer(); ?>
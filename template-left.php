<?php
/*
Template Name: Left sidebar
*/
?>
<?php get_header(); ?>

	<div id="wrap" class="container clearfix">
		
		<section id="content" class="primary" role="main" style="float:right;width:80%">
		
		<?php if (have_posts()) : while (have_posts()) : the_post();

			get_template_part( 'content', 'page' );

			endwhile;

		endif; ?>
		
		<?php comments_template(); ?>
		
		</section>
		
		<?php get_sidebar('left'); ?>
		
	</div>
	
<?php get_footer(); ?>	

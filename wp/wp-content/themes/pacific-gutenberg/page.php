<?php get_header(); ?>
<div class="main-wrapper">
	<main id="main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</main><!-- /#main -->
	<?php get_template_part('templates/search-form'); ?>
	<?php get_footer(); ?>
</div>

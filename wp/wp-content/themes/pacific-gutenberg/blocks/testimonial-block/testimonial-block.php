<?php

/**
 * Testimonial block Block Template.
 *
 * @param	 array $block The block settings and attributes.
 * @param	 string $content The block inner HTML (empty).
 * @param	 bool $is_preview True during AJAX preview.
 * @param	 (int|string) $post_id The post ID this block is saved to.
 */

if( isset( $block['data']['preview_image_help'] )  ) :
	echo Pacific_Gutenberg::get_preview_image( $block['data']['preview_image_help'], $block['name'] );
	return;
endif;

// Create id attribute allowing for custom 'anchor' value.
$id = 'testimonial-block-' . $block['id'];
if (!empty($block['anchor'])) :
	$id = $block['anchor'];
endif;

// Create class attribute allowing for custom 'className' and 'align' values.
$className = 'block testimonial-block';
if (!empty($block['className'])) :
	$className .= ' ' . $block['className'];
endif;
if (!empty($block['align'])) :
	$className .= ' align' . $block['align'];
endif;

$className = apply_filters( 'pacific_block_class', $className, $block, $post_id );

// Load values and assing defaults.
$testimonials = get_field('testimonials', 'options');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container-xxl bg-primary testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s">
		<div class="container py-5 px-lg-5">
			<div class="owl-carousel testimonial-carousel">
				<?php foreach($testimonials as $testimonial): ?>
					<?php get_template_part( 'templates/testimonial', null, array("testimonial" => $testimonial) );  ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php

/**
 * About us block Block Template.
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
$id = 'about-us-block-' . $block['id'];
if (!empty($block['anchor'])) :
	$id = $block['anchor'];
endif;

// Create class attribute allowing for custom 'className' and 'align' values.
$className = 'block about-us-block';
if (!empty($block['className'])) :
	$className .= ' ' . $block['className'];
endif;
if (!empty($block['align'])) :
	$className .= ' align' . $block['align'];
endif;

$className = apply_filters( 'pacific_block_class', $className, $block, $post_id );

// Load values and assing defaults.
$pre_header = get_field('pre_header');
$header = get_field('header');
$text = get_field('text');
$bonus_list = get_field('bonus_list');
$button = get_field('button');
$socials = get_field('socials');
$image = get_field('image');

$pre_header = Pacific_Helper::generate_header(array(
	'text' => $pre_header['title'],
	'tag' => $pre_header['tag'],
	'class' => 'position-relative text-primary ps-4'
));

$header = Pacific_Helper::generate_header(array(
	'text' => $header['title'],
	'tag' => $header['tag'],
	'class' => 'mt-2'
));

$text = Pacific_Helper::generate_paragraph(array(
	'text'  => $text,
	'class' => 'mb-4'
));

$button = Pacific_Helper::generate_acf_link(array(
	'link'            => $button,
	'class'           => 'btn btn-primary rounded-pill px-4',
	'link_attributes' => array(
		'title' => $button['title'],
		'alt' => $button['title'],
		'target' => $button['target'] ?? null
	)
));

$image = Pacific_Helper::generate_image( array(
	'image' => $image,
	'attributes' => array(
		'class' => 'img-fluid wow zoomIn',
		'data-wow-delay' => '0.5s',
	)
));
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container-xxl py-5">
		<div class="container px-lg-5">
			<div class="row g-5">
				<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
					<div class="section-title position-relative mb-4 pb-2">
						<?php echo $pre_header; ?>
						<?php echo $header; ?>
					</div>
					<?php echo $text; ?>
					<div class="row g-3">
						<?php if ( have_rows( 'bonus_list_left' ) ) : ?>
							<div class="col-sm-6">
								<?php while ( have_rows( 'bonus_list_left' ) ) : the_row(); ?>
									<?php $bonus = get_sub_field('bonus'); ?>
									<h6>
										<i class="fa fa-check text-primary me-2"></i>
										<?php echo $bonus; ?>
									</h6>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>

						<?php if ( have_rows( 'bonus_list_right' ) ) : ?>
							<div class="col-sm-6">
								<?php while ( have_rows( 'bonus_list_right' ) ) : the_row(); ?>
									<?php $bonus = get_sub_field('bonus'); ?>
									<h6>
										<i class="fa fa-check text-primary me-2"></i>
										<?php echo $bonus; ?>
									</h6>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="d-flex align-items-center mt-4 about-us-block__button-wrapper">
						<?php echo $button; ?>

						<?php if ( have_rows( 'socials' ) ) : ?>
							<?php while ( have_rows( 'socials' ) ) : the_row(); ?>
								<?php 
									$link = get_sub_field('link');
									$icon_class = get_sub_field('icon_class');
									$linkElement = '<a class="btn btn-outline-primary btn-square" 
																		href="' . $link['url'] . '"
																		title="' . $link['title'] . '"
																	>
																		<i class="' . $icon_class . '"></i>
																	</a>';
								?>
								<?php echo $linkElement; ?>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-6">
					<?php echo $image; ?>
				</div>
			</div>
		</div>
	</div>
</section>
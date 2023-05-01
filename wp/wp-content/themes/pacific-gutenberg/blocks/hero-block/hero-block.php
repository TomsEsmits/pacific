<?php

/**
 * Hero block Block Template.
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
$id = 'hero-block-' . $block['id'];
if (!empty($block['anchor'])) :
	$id = $block['anchor'];
endif;

// Create class attribute allowing for custom 'className' and 'align' values.
$className = 'block hero-block';
if (!empty($block['className'])) :
	$className .= ' ' . $block['className'];
endif;
if (!empty($block['align'])) :
	$className .= ' align' . $block['align'];
endif;

$className = apply_filters( 'pacific_block_class', $className, $block, $post_id );

// Load values and assing defaults.
$header = get_field('header');
$text = get_field('text');
$white_button = get_field('white_button');
$transparent_button = get_field('transparent_button');
$image = get_field('image');

$header = Pacific_Helper::generate_header(array(
	'text' => $header['title'],
	'tag' => $header['tag'],
	'class' => 'hero-block__title text-white mb-4 animated zoomIn'
));

$text = Pacific_Helper::generate_paragraph(array(
	'text'  => $text,
	'class' => 'hero-block__text text-white pb-3 animated zoomIn'
));

$white_button = Pacific_Helper::generate_acf_link(array(
	'link'            => $white_button,
	'class'           => 'btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft',
	'link_attributes' => array(
		'title' => $white_button['title'],
		'target' => $white_button['target'] ?? null
	)
));

$transparent_button = Pacific_Helper::generate_acf_link(array(
	'link'            => $transparent_button,
	'class'           => 'btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight',
	'link_attributes' => array(
		'title' => $transparent_button['title'],
		'target' => $transparent_button['target'] ?? null
	)
));

$image = Pacific_Helper::generate_image( array(
	'image' => $image,
	'attributes' => array(
		'class' => 'img-fluid'
	)
));
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> ">
	<div class="container-xxl py-5 mb-5 hero-block__background-wrapper">
		<div class="container my-5 py-5 px-lg-5">
			<div class="row g-5 py-5">
				<div class="col-lg-6 text-center text-lg-start">
					<?php echo $header; ?>
					<?php echo $text; ?>
					<?php echo $white_button; ?>
					<?php echo $transparent_button; ?>
				</div>
				<div class="col-lg-6 text-center text-lg-start">
					<?php echo $image; ?>
				</div>
			</div>
		</div>
	</div>
</section>
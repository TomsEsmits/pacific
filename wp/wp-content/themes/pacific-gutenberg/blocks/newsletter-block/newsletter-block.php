<?php

/**
 * Newsletter block Block Template.
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
$id = 'newsletter-block-' . $block['id'];
if (!empty($block['anchor'])) :
	$id = $block['anchor'];
endif;

// Create class attribute allowing for custom 'className' and 'align' values.
$className = 'block newsletter-block';
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
$image = get_field('image');

$header = Pacific_Helper::generate_header(array(
	'text' => $header['title'],
	'tag' => $header['tag'],
	'class' => 'text-white'
));

$text = Pacific_Helper::generate_small_text(array(
	'text'  => $text,
	'class' => 'text-white'
));

$image = Pacific_Helper::generate_image( array(
	'image' => $image,
	'attributes' => array(
		'class' => 'img-fluid mt-5',
		'style' => 'height: 250px;'
	)
));

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container-xxl bg-primary newsletter my-5 wow fadeInUp" data-wow-delay="0.1s">
		<div class="container px-lg-5">
			<div class="row align-items-center" style="height: 250px;">
				<div class="col-12 col-md-6">
					<?php echo $header; ?>
					<?php echo $text; ?>
					<div class="position-relative w-100 mt-3">
						<input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Enter Your Email" style="height: 48px;">
						<button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
					</div>
				</div>
				<div class="col-md-6 text-center mb-n5 d-none d-md-block">
					<?php echo $image; ?>
				</div>
			</div>
		</div>	
	</div>
</section>
<?php

/**
 * Projects block Block Template.
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
$id = 'projects-block-' . $block['id'];
if (!empty($block['anchor'])) :
	$id = $block['anchor'];
endif;

// Create class attribute allowing for custom 'className' and 'align' values.
$className = 'block projects-block';
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
$filter_headers = get_field('filter_headers');
$projects = get_field('projects');

$pre_header = Pacific_Helper::generate_header(array(
	'text' => $pre_header['title'],
	'tag' => $pre_header['tag'],
	'class' => 'position-relative d-inline text-primary ps-4'
));

$header = Pacific_Helper::generate_header(array(
	'text' => $header['title'],
	'tag' => $header['tag'],
	'class' => 'mt-2'
));

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container-xxl py-5">
		<div class="container px-lg-5">
			<div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
				<?php echo $pre_header; ?>
				<?php echo $header; ?>
			</div>
			<div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
				<div class="col-12 text-center">
					<ul class="list-inline mb-5" id="portfolio-flters">
						<li class="btn px-3 pe-4 active" data-filter="*"><?php echo $filter_headers[0]['header']; ?></li>
						<li class="btn px-3 pe-4" data-filter=".first"><?php echo $filter_headers[1]['header']; ?></li>
						<li class="btn px-3 pe-4" data-filter=".second"><?php echo $filter_headers[2]['header']; ?></li>
					</ul>
				</div>
			</div>
			<div class="row g-4 portfolio-container">
				<?php foreach($projects as $project): ?>
					<?php get_template_part( 'templates/project', null, array("project" => $project) );  ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php
  $project = $args['project'];
  $wow_delay = get_field('wow_delay', $project->ID);
  $filter_class = get_field('filter_class', $project->ID);
?>

<div class="col-lg-4 col-md-6 portfolio-item wow zoomIn <?php echo $filter_class; ?>" data-wow-delay="<?php echo $wow_delay; ?>">
  <div class="position-relative rounded overflow-hidden">
    <?php echo wp_get_attachment_image(get_post_thumbnail_id($project->ID), 'project', false, array('class' => 'img-fluid w-100')); ?>
    <div class="portfolio-overlay">
      <a class="btn btn-light" href="<?php echo get_the_post_thumbnail_url($project->ID) ?>" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
      <div class="mt-auto">
        <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
        <a class="h5 d-block text-white mt-1 mb-0" href=""><?php echo $project->post_title; ?></a>
      </div>
    </div>
  </div>
</div>
<?php
  $service = $args['service'];
?>
<div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
  <div class="service-item d-flex flex-column justify-content-center text-center rounded">
    <div class="service-icon flex-shrink-0">
      <i class="fa fa-home fa-2x"></i>
    </div>
    <h5 class="mb-3"><?php echo $service->post_title ?></h5>
      <p><?php echo $service->post_excerpt ?></p>
      <a class="btn px-3 mt-auto mx-auto" href="<?php echo get_permalink($service); ?>">Read More</a>
  </div>
</div>
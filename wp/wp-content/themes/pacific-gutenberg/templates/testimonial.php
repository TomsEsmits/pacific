<?php
  $testimonial = $args['testimonial'];

  $image = Pacific_Helper::generate_image( array(
    'image' => $testimonial['author_image'],
    'attributes' => array(
      'class' => 'img-fluid flex-shrink-0 rounded-circle',
      'style' => 'width:50px; height:50px;'
    )
  ));
?>
<div class="testimonial-item bg-transparent border rounded text-white p-4">
  <i class="fa fa-quote-left fa-2x mb-3"></i>
  <p><?php echo $testimonial['testimonial']; ?></p>
  <div class="d-flex align-items-center">
    <?php echo $image; ?>
    <div class="ps-3">
      <h6 class="text-white mb-1"><?php echo $testimonial['author_name']; ?></h6>
      <small><?php echo $testimonial['author_position']; ?></small>
    </div>
  </div>
</div>
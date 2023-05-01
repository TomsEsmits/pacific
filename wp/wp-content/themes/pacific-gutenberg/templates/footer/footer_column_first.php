<?php
  $data = $args['first_column_data'];

  $header = Pacific_Helper::generate_header(array(
    'text' => $data['header']['title'],
    'tag' => $data['header']['tag'],
    'class' => 'text-white mb-4'
  ));
?>
<div class="col-md-6 col-lg-3">
  <?php echo $header; ?>
  <p><i class="fa fa-map-marker-alt me-3"></i><?php echo $data['address']; ?></p>
  <p><i class="fa fa-phone-alt me-3"></i><?php echo $data['phone']; ?></p>
  <p><i class="fa fa-envelope me-3"></i><?php echo $data['email']; ?></p>
  <div class="d-flex pt-2">
    <a 
      class="btn btn-outline-light btn-social" 
      href="<?php echo $data['twitter']['url']; ?>" 
      title="<?php echo $data['twitter']['title']; ?>" 
      target="<?php echo $data['twitter']['target']; ?>"
    >
      <i class="fab fa-twitter"></i>
    </a>
    <a 
      class="btn btn-outline-light btn-social"
      href="<?php echo $data['facebook']['url']; ?>" 
      title="<?php echo $data['facebook']['title']; ?>" 
      target="<?php echo $data['facebook']['target']; ?>" 
    >
      <i class="fab fa-facebook-f"></i>
    </a>
    <a 
      class="btn btn-outline-light btn-social"
      href="<?php echo $data['youtube']['url']; ?>" 
      title="<?php echo $data['youtube']['title']; ?>" 
      target="<?php echo $data['youtube']['target']; ?>"
    >
    <i class="fab fa-youtube"></i>
  </a>
    <a 
      class="btn btn-outline-light btn-social" 
      href="<?php echo $data['instagram']['url']; ?>" 
      title="<?php echo $data['instagram']['title']; ?>" 
      target="<?php echo $data['instagram']['target']; ?>"
    >
      <i class="fab fa-instagram"></i>
    </a>
    <a 
      class="btn btn-outline-light btn-social" 
      href="<?php echo $data['linkedin']['url']; ?>" 
      title="<?php echo $data['linkedin']['title']; ?>" 
      target="<?php echo $data['linkedin']['target']; ?>"
    >
    <i class="fab fa-linkedin-in"></i>
    </a>
  </div>
</div>
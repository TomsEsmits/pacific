<?php 
  $data = $args['third_column_data'];
  
  $header = Pacific_Helper::generate_header(array(
    'text' => $data['header']['title'],
    'tag' => $data['header']['tag'],
    'class' => 'text-white mb-4'
  ));
?>

<div class="col-md-6 col-lg-3">
  <?php echo $header; ?>
  <div class="row g-2">
    <?php foreach($data['images'] as $image) { ?>
      <div class="col-4">
        <img class="img-fluid" src="<?php echo $image['image']['url']; ?>" title="<?php echo $image['image']['title']; ?>" alt="<?php echo $image['image']['title']; ?>">
      </div>
    <?php } ?>
  </div>
</div>
<?php 
  $data = $args['second_column_data'];
  
  $header = Pacific_Helper::generate_header(array(
    'text' => $data['header']['title'],
    'tag' => $data['header']['tag'],
    'class' => 'text-white mb-4'
  ));
?>

<div class="col-md-6 col-lg-3">
  <?php echo $header; ?>
  <?php foreach($data['links'] as $link) { ?>
    <a 
      class="btn btn-link" 
      href="<?php echo $link['link']['url']; ?>" 
      title="<?php echo $link['link']['title']; ?>" 
      target="<?php echo $link['link']['target']; ?>"
      >
    <?php echo $link['link']['title']; ?>
  </a>
  <?php } ?>
</div>
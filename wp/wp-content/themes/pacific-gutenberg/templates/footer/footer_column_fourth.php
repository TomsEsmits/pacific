<?php
  $data = $args['fourth_column_data'];
    
  $header = Pacific_Helper::generate_header(array(
    'text' => $data['header']['title'],
    'tag' => $data['header']['tag'],
    'class' => 'text-white mb-4'
  ));

  $text = Pacific_Helper::generate_paragraph(array(
    'text'  => $data['text'],
    'class' => null
  ));
?>

<div class="col-md-6 col-lg-3">
  <?php echo $header; ?>
  <p><?php echo $text; ?></p>
  <div class="position-relative w-100 mt-3">
    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
    <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
  </div>
</div>
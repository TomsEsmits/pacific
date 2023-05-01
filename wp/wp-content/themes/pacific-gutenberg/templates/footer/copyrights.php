<?php
  $data = $args['copyrights'];

  $text = Pacific_Helper::generate_wysiwyg(array(
    'content'  => $data['copyright_text'],
    'container' => null,
    'class' => null
  ));
?>
<div class="container px-lg-5">
  <div class="copyright">
    <div class="row">
      <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
        <?php echo $text; ?>
      </div>
      <div class="col-md-6 text-center text-md-end">
        <div class="footer-menu">
          <?php foreach($data['copyright_links'] as $link) { ?>
            <a 
              href="<?php echo $link['link']['url']; ?>" 
              title="<?php echo $link['link']['title']; ?>"
              target="<?php echo $link['link']['target']; ?>"
              >
              <?php echo $link['link']['title']; ?>
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
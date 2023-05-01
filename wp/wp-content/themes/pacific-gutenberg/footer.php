<?php
  $first_column_data = array(
    'header' => get_field('header', 'options'),
    'address' => get_field('address', 'options'),
    'phone' => get_field('phone', 'options'),
    'email' => get_field('email', 'options'),
    'twitter' => get_field('twitter', 'options'),
    'facebook' => get_field('facebook', 'options'),
    'youtube' => get_field('youtube', 'options'),
    'instagram' => get_field('instagram', 'options'),
    'linkedin' => get_field('linkedin', 'options'),
  );

  $second_column_data = array(
    'header' => get_field('header_2', 'options'),
    'links' => get_field('links', 'options'),
  );

  $third_column_data = array(
    'header' => get_field('header_3', 'options'),
    'images' => get_field('images', 'options'),
  );

  $fourth_column_data = array(
    'header' => get_field('header_4', 'options'),
    'text' => get_field('text', 'options'),
  );

  $copyrights = array(
    'copyright_text' => get_field('copyright_text', 'options'),
    'copyright_links' => get_field('copyright_links', 'options'),
  );
?>
<footer class="site-footer">
  <div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
      <div class="row g-5">
        <?php get_template_part( 'templates/footer/footer_column_first', null, array("first_column_data" => $first_column_data) ); ?>
        <?php get_template_part( 'templates/footer/footer_column_second', null, array("second_column_data" => $second_column_data) ); ?>
        <?php get_template_part( 'templates/footer/footer_column_third', null, array("third_column_data" => $third_column_data) ); ?>
        <?php get_template_part( 'templates/footer/footer_column_fourth', null, array("fourth_column_data" => $fourth_column_data) ); ?>
      </div>
    </div>
    <?php get_template_part( 'templates/footer/copyrights', null, array("copyrights" => $copyrights) ); ?>
  </div>
</footer>
<?php wp_footer(); ?>
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
</body>
</html>


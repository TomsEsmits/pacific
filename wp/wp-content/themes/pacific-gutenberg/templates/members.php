<?php
  $member = $args['member'];
?>

<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
  <div class="team-item">
    <div class="d-flex">
      <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
          <a 
            class="btn btn-square text-primary bg-white my-1" 
            href="<?php echo $member['facebook']['url']; ?>" 
            title="<?php echo $member['facebook']['title']; ?>"
            target="<?php echo $member['facebook']['target']; ?>"
            >
            <i class="fab fa-facebook-f"></i>
          </a>
          <a 
            class="btn btn-square text-primary bg-white my-1" 
            href="<?php echo $member['twitter']['url']; ?>" 
            title="<?php echo $member['twitter']['title']; ?>"
            target="<?php echo $member['twitter']['target']; ?>"
            >
            <i class="fab fa-twitter"></i>
          </a>
          <a 
            class="btn btn-square text-primary bg-white my-1" 
            href="<?php echo $member['instagram']['url']; ?>" 
            title="<?php echo $member['instagram']['title']; ?>"
            target="<?php echo $member['instagram']['target']; ?>"
            >
            <i class="fab fa-instagram"></i>
          </a>
          <a 
            class="btn btn-square text-primary bg-white my-1" 
            href="<?php echo $member['linkedin']['url']; ?>" 
            title="<?php echo $member['linkedin']['title']; ?>"
            target="<?php echo $member['linkedin']['target']; ?>"
            >
            <i class="fab fa-linkedin-in"></i>
          </a>
      </div>
      <img 
        class="img-fluid rounded w-100" 
        src="<?php echo $member['image']['url']; ?>" 
        title="<?php echo $member['image']['title']; ?>" 
        alt="<?php echo $member['image']['title']; ?>">
    </div>
    <div class="px-4 py-3">
      <h5 class="fw-bold m-0"><?php echo $member['full_name']; ?></h5>
      <small><?php echo $member['position']; ?></small>
    </div>
  </div>
</div>

<?php 
$args = array(
	'theme_location'  => 'primary',
	'menu_class'      => 'site-header__menu-item-list',
	'container'       => 'nav',
	'container_class' => 'site-header__navbar',
	'echo'            => false,
	'fallback_cb'     => false
); 
$nav_menu = wp_nav_menu( $args );
?>
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
	<div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
			<span class="sr-only">Loading...</span>
	</div>
</div>
<header class="site-header">
	<div class="container-xxl position-relative p-0">
		<div class="site-header__inner-wrapper navbar-light">
			<a href="" class="navbar-brand p-0">
				<h1 class="m-0">
					<i class="fa fa-search me-2"></i>SEO<span class="fs-5">Master</span>
				</h1>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
				<span class="fa fa-bars"></span>
			</button>
			<div class="site-header__position-wrapper  collapse navbar-collapse" id="navbarCollapse">
				<?php echo $nav_menu; ?>
				<butaton type="button" class="btn site-header__search-button ms-3" data-bs-toggle="modal" data-bs-target="#searchModal">
					<i class="fa fa-search"></i>
				</butaton>
				<a href="https://htmlcodex.com/startup-company-website-template" target="_blank" class="site-header__pro-button btn rounded-pill py-2 px-4 ms-3" title="htmlcodex.com">Pro Version</a>
			</div>
		</div>
	</div>
</header>

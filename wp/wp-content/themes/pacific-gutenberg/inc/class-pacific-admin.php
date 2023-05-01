<?php
/*
	WP Admin Custom Function
*/

class Pacific_Admin {
	public function __construct()
	{
		add_filter( 'admin_footer_text', [$this, 'custom_footer_admin'] );
		add_action( 'wp_before_admin_bar_render', [$this, 'admin_bar'] ); 
		add_action( 'admin_menu', [$this, 'admin_menu'] );
		add_action( 'wp_dashboard_setup', [$this, 'remove_dashboard_widgets'] );
		add_action( 'load-index.php', function() {
			remove_action('welcome_panel', 'wp_welcome_panel');
		} );
		add_action( 'welcome_panel', [$this, 'welcome_panel'] );
		add_action( 'admin_enqueue_scripts', [$this, 'admin_styles'] );
		add_action( 'login_enqueue_scripts', [$this, 'login_style'] );
	}

	public function custom_footer_admin() 
	{
		echo '<span id="footer-thankyou">' . __('Built with love by', 'pacific') . '<a href="https://www.linkedin.com/in/toms-e%C5%A1mits-968257109/" target="_blank"> Toms Esmits</a></span>';
	}

	public function admin_bar()
	{
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu( 'comments' );
	}

	public function admin_menu()
	{
		remove_menu_page( 'edit-comments.php' );
		if ( ! current_user_can( 'manage_options' ) ) {
			remove_menu_page( 'tools.php' );
			remove_submenu_page( 'themes.php', 'customize.php' );
		}
	}

	public function remove_dashboard_widgets()
	{
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); //Quick Press widget
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' ); //Recent Drafts
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); //WordPress.com Blog
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' ); //Other WordPress News
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' ); //Incoming Links
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' ); //Plugins
		remove_meta_box( 'dashboard_recent_comments',	 'dashboard', 'normal'); //Comments
	}

	public function welcome_panel()
	{
		list( $display_version ) = explode( '-', get_bloginfo( 'version' ) );
		$edit_posts              = current_user_can( 'edit_posts' );
		$edit_posts              = current_user_can( 'edit_posts' );
		$edit_theme_options      = current_user_can( 'edit_theme_options' );
		?>
		<div class="welcome-panel-content">
			<div class="welcome-panel-header">
				<div class="welcome-panel-header-image">
					<?php echo file_get_contents( get_admin_url() . 'images/about-header-about.svg' ); ?>
				</div>
				<h2>
					<?php
						printf(
							__( 'Welcome to WordPress %s!', 'pacific' ),
							$display_version
						);
					?>
				</h2>
				<p class="welcome-panel-text">
					<?php 
						printf( 
							__( 'This is a site created by Toms Esmits. If you have any question you could always contact me.', 'pacific' ),
							' <a href="https://www.linkedin.com/in/toms-e%C5%A1mits-968257109" target="_blank">',
							'</a>'
						);
					?>
				</p>
			</div>
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column">
					<div class="welcome-panel-icon-pages"></div>
					<div class="welcome-panel-column-content">
						<h3><?php _e( 'Create rich pages with blocks' ); ?></h3>
						<p><?php _e( 'Blocks are little pieces of content which you can add to any page you create.' ); ?></p>
						<?php if ( $edit_posts ) : ?>
							<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=page' ) ); ?>"><?php _e( 'Add a new page' ); ?></a>
						<?php endif; ?>
					</div>
				</div>
				<div class="welcome-panel-column">
					<div class="welcome-panel-icon-layout"></div>
					<div class="welcome-panel-column-content">
						<h3><?php _e( 'Customize your menu' ); ?></h3>
						<p><?php _e( 'Configure your site&#8217;s menus to contain anything you want - both internal and external.' ); ?></p>
						<?php if ( $edit_theme_options ) : ?>
							<a href="<?php echo esc_url( admin_url('nav-menus.php') ); ?>"><?php _e( 'Edit your menus' ); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	public function admin_styles() {
		$csstime = filemtime( get_template_directory() . '/inc/css/admin-styles.css' );
		wp_enqueue_style('pacific_admin_styles', get_template_directory_uri() . '/inc/css/admin-styles.css', '', $csstime, 'all');
	}

	public function login_style()
	{
		$csstime = filemtime( get_template_directory() . '/inc/css/login-styles.css' );
		wp_enqueue_style( 'pacific_login_styles', get_template_directory_uri() . '/inc/css/login-styles.css', '', $csstime, 'all' ); 
	}
}

new Pacific_Admin();
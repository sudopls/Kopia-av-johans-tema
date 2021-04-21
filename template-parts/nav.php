<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<a class="navbar-brand" href="/">
			<?php mbt_navbar_brand(); ?>
		</a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<?php
			// output the menu set for theme location `header-menu`
			wp_nav_menu([
				'theme_location' => 'header-menu',
				'container_class' => 'collapse navbar-collapse',
				'container_id' => 'navbarNav',
				'menu_class' => '',
				'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
				'fallback_cb' => '__return_false',
				'depth' => 2,
				'walker' => new Bootstrap_5_WP_Nav_Menu_Walker(),
			]);
		?>
	</div>
</nav>

<?php get_header(); ?>

<section class="section section-catalog single-page" id="section-catalog">
	<div class="container">
	<header class="section__header">
		<h2 class="page-title">Catalog</h2>
		<nav class="catalog-nav">
			<?php
				$catalog_nav_items = get_terms(
					array(
						'taxonomy' => 'product-categories',
						'parent'   => 0,
					)
				);
				?>
		<ul class="catalog-nav__wrapper">
			<li class="catalog-nav__item">
				<a href="<?php echo get_site_url() . '/products'; ?>" class="catalog-nav__btn is-active">all</a>
			</li>
			<?php
			foreach ( $catalog_nav_items as $item ) {
				?>
				<li class="catalog-nav__item">
					<a href="<?php echo get_site_url() . '/product-categories/' . $item->slug; ?>" class="catalog-nav__btn"><?php echo $item->name; ?></a>
				</li>
			<?php } ?>
		</ul>
		</nav >
	</header>

	<?php
	if ( have_posts() ) :
		?>
<div class="catalog js-catalog">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php echo get_template_part( 'product-content' ); ?>
		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>
	</div>
	<?php endif; ?>

	<?php
	$args = array(
		'show_all'           => false,
		'end_size'           => 1,
		'mid_size'           => 1,
		'prev_next'          => false,
		'prev_text'          => __( '<< Previous' ),
		'next_text'          => __( 'Next >>' ),
		'add_args'           => false,
		'add_fragment'       => '',
		'screen_reader_text' => __( 'Posts navigation' ),
	);
	the_posts_pagination( $args );
	?>

	</div>
</section>

<?php get_footer(); ?>
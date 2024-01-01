<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', 'Additional fields' )
	->show_on_page( '7' )

	->add_tab(
		'First srceen',
		array(
			Field::make( 'text', 'top_info', 'Top heading' )
			->set_width( 50 ),
			Field::make( 'text', 'top_title', 'Heading' )
			->set_width( 50 ),
			Field::make( 'text', 'top_btn_text', 'Button text' )
			->set_width( 50 ),
			Field::make( 'text', 'top_btn_scroll_to', 'Section class' )
			->set_width( 50 ),
			Field::make( 'image', 'top_image', 'Image' ),
		)
	)

	->add_tab(
		'Catalog',
		array(
			Field::make( 'text', 'catalog_title', 'Heading' ),
			Field::make( 'association', 'catalog_nav', __( 'Product categories' ) )
			->set_types(
				array(
					array(
						'type'     => 'term',
						'taxonomy' => 'product-categories',
					),
				)
			),
			Field::make( 'association', 'catalog_products', __( 'Products' ) )
			->set_types(
				array(
					array(
						'type'      => 'post',
						'post_type' => 'product',
					),
				)
			),
		)
	)

	->add_tab(
		'About',
		array(
			Field::make( 'text', 'about_title', 'Heading' ),
			Field::make( 'rich_text', 'about_text', 'Text' ),
			Field::make( 'image', 'about_img', 'Image' ),
		)
	)

	->add_tab(
		'Contacts',
		array(
			Field::make( 'text', 'contacts_title', 'Heading' ),
			Field::make( 'checkbox', 'contacts_is_img', 'Show tomatoes image' ),
		)
	);

Container::make( 'post_meta', 'Additional fields' )
	->show_on_post_type( 'product' )

	->add_tab(
		'Product info',
		array(
			Field::make( 'text', 'product_price', 'Price' ),
			Field::make( 'complex', 'product_attributes', __( 'Attributes' ) )
			->set_max( 3 )
			->add_fields(
				array(
					Field::make( 'text', 'name', __( 'Name' ) )->set_width( 50 ),
					Field::make( 'text', 'price', __( 'Price' ) )->set_width( 50 ),
				)
			),
		)
	);

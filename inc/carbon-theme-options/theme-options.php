<?php

if( !defined('ABSPATH') ) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Theme Options' ) )
    ->add_tab( 'General setting', array(
        Field::make( 'image', 'site_logo', 'Logo' ),
        Field::make( 'text', 'site_footer_text', 'Footer text' ),
    ) )
    ->add_tab( 'Contacts', array(
        Field::make( 'text', 'site_phone', 'Phone' ),
        Field::make( 'text', 'site_phone_digits', 'Phone trim spaces' ),
        Field::make( 'text', 'site_address', 'Address' ),
        Field::make( 'text', 'site_li_url', 'LinkedIn' ),
        Field::make( 'text', 'site_fb_url', 'Facebook' ),
        Field::make( 'text', 'site_inst_url', 'Instagram' ),
    ) );

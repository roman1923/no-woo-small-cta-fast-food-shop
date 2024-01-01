<?php
/*
Template Name: Contacts
*/
?>
<?php $page_id = get_the_ID(); ?>
<?php get_header(); ?>

<!-- section-contacts -->
<section class="section section-contacts single-page">
	<div class="container section-contacts__container">
	<?php if ( carbon_get_post_meta( $page_id, 'contacts_is_img' ) ) : ?>
		<div class="section-contacts__img lazy" data-src="<?php echo get_template_directory_uri(); ?>/assets/img/section-contacts/tomatoes.webp" data-src-replace-webp="img/section-contacts/tomatoes.jpg"></div>
	<?php endif; ?>
	<header class="section__header">
		<h2 class="page-title sectoin-contacts__title"><?php the_title(); ?></h2>
	</header>
	<div class="contacts">
		<div class="contacts__start">
		<div class="contacts__map" id="google-map">
			<!-- I use picture because i don't want to show my google maps api key, but js code for this is also existing -->
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/kyiv.png ?>" alt="Kyiv">
		</div>
		</div>
		<div class="contacts__end">
		<div class="contacts__item">
			<h3 class="contacts__title">Address</h3>
			<p class="contacts__text"><?php echo $GLOBALS['pizza_time']['address']; ?></p>
		</div>
		<div class="contacts__item">
			<h3 class="contacts__title">Phone</h3>
			<p class="contacts__text">
			<a class="contacts__phone" href="tel:<?php echo $GLOBALS['pizza_time']['phone_digits']; ?>"><?php echo $GLOBALS['pizza_time']['phone']; ?></a>
			</p>
		</div>
		<div class="contacts__item">
			<h3 class="contacts__title">Socials</h3>
			<ul class="socials">
			<li class="socials__item">
				<a href="<?php echo $GLOBALS['pizza_time']['li_url']; ?>" class="socials__link" target="_blank">
				<svg class="socials__icon socials__icon--li" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 112.2 112.2" width="35" height="35">
					<g>
					<circle cx="56.1" cy="56.1" r="56.1" />
					<path class="socials__logo" style="margin-left: 5px;" d="M2.5 18h3V6.9h-3V18zM4 2c-1 0-1.8.8-1.8 1.8S3 5.6 4 5.6s1.8-.8 1.8-1.8S5 2 4 2zm6.6 6.6V6.9h-3V18h3v-5.7c0-3.2 4.1-3.4 4.1 0V18h3v-6.8c0-5.4-5.7-5.2-7.1-2.6z" transform="translate(1, 1)"/>
					</g>
				</svg>
				</a>
			</li>
			<li class="socials__item">
				<a href="<?php echo $GLOBALS['pizza_time']['fb_url']; ?>" class="socials__link" target="_blank">
				<svg class="socials__icon socials__icon--fb" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 112.2 112.2" width="35" height="35">
					<g>
					<circle cx="56.1" cy="56.1" r="56.1" />
					<path class="socials__logo" d="M70.2,58.3h-10V95H45V58.3H37.8V45.4H45V37.1c0-6,2.8-15.3,15.3-15.3H71.5V34.3H63.3c-1.3,0-3.2.7-3.2,3.5v7.6H71.4Z" />
					</g>
				</svg>
				</a>
			</li>
			<li class="socials__item">
				<a href="<?php echo $GLOBALS['pizza_time']['inst_url']; ?>" class="socials__link" target="_blank">
				<svg class="socials__icon socials__icon--inst" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="35" height="35">
					<g>
					<path d="M332.3,136.2H179.7a44.21,44.21,0,0,0-44.2,44.2V333a44.21,44.21,0,0,0,44.2,44.2H332.3A44.21,44.21,0,0,0,376.5,333V180.4A44.21,44.21,0,0,0,332.3,136.2ZM256,336a79.3,79.3,0,1,1,79.3-79.3A79.42,79.42,0,0,1,256,336Zm81.9-142.2A18.8,18.8,0,1,1,356.7,175,18.78,18.78,0,0,1,337.9,193.8Z" />
					<path d="M256,210.9a45.8,45.8,0,1,0,45.8,45.8A45.86,45.86,0,0,0,256,210.9Z" />
					<path d="M256,0C114.6,0,0,114.6,0,256S114.6,512,256,512,512,397.4,512,256,397.4,0,256,0ZM410,333a77.78,77.78,0,0,1-77.7,77.7H179.7A77.78,77.78,0,0,1,102,333V180.4a77.84,77.84,0,0,1,77.7-77.7H332.3A77.84,77.84,0,0,1,410,180.4Z" />
					</g>
				</svg>
				</a>
			</li>
			</ul>
		</div>
		</div>
	</div>
	</div>
</section>
<!-- /.section-contacts -->

<?php get_footer(); ?>
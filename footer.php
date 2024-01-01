<!-- footer-page -->
<footer class="footer-page">
  <div class="container">
    <div class="footer-page__text">
      <?php echo carbon_get_theme_option( 'site_footer_text' ); ?>
    </div>
  </div>
</footer>
<!-- /.footer-page -->


<!-- popup-menu -->
<div class="popup popup-menu">
  <div class="popup__wrapper">
    <div class="popup__inner">
      <div class="popup__content popup__content--fluid popup__content--centered">
        <button class="btn-close popup__btn-close popup-close"></button>
        <nav class="mobile-menu popup__mobile-menu">
          <?php
            wp_nav_menu( [
            'theme_location' => 'menu_main_header',
            'container' => null,
            'menu_class' => 'mobile-menu__ul popup-close',
            ]);
          ?>
        </nav>
        <div class="phone popup__phone">
          <a class="phone__item phone__item--accent" href="tel:<?php echo $GLOBALS['pizza_time']['phone_digits']; ?>"><?php echo $GLOBALS['pizza_time']['phone'] ; ?></a>
        </div>
        <ul class="socials">
            <li class="socials__item">
              <a href="<?php echo $GLOBALS['pizza_time']['li_url'] ; ?>" class="socials__link" target="_blank">
                <svg class="socials__icon socials__icon--li" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 112.2 112.2" width="35" height="35">
                  <g>
                    <circle cx="56.1" cy="56.1" r="56.1" />
                    <path class="socials__logo" style="margin-left: 5px;" d="M2.5 18h3V6.9h-3V18zM4 2c-1 0-1.8.8-1.8 1.8S3 5.6 4 5.6s1.8-.8 1.8-1.8S5 2 4 2zm6.6 6.6V6.9h-3V18h3v-5.7c0-3.2 4.1-3.4 4.1 0V18h3v-6.8c0-5.4-5.7-5.2-7.1-2.6z" transform="translate(1, 1)"/>
                  </g>
                </svg>
              </a>
            </li>
            <li class="socials__item">
              <a href="<?php echo $GLOBALS['pizza_time']['fb_url'] ; ?>" class="socials__link" target="_blank">
                <svg class="socials__icon socials__icon--fb" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 112.2 112.2" width="35" height="35">
                  <g>
                    <circle cx="56.1" cy="56.1" r="56.1" />
                    <path class="socials__logo" d="M70.2,58.3h-10V95H45V58.3H37.8V45.4H45V37.1c0-6,2.8-15.3,15.3-15.3H71.5V34.3H63.3c-1.3,0-3.2.7-3.2,3.5v7.6H71.4Z" />
                  </g>
                </svg>
              </a>
            </li>
            <li class="socials__item">
              <a href="<?php echo $GLOBALS['pizza_time']['inst_url'] ; ?>" class="socials__link" target="_blank">
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
<!-- /.popup-menu -->

<!-- popup-order -->
<div class="popup popup-order">
  <div class="popup__wrapper">
    <div class="popup__inner">
      <div class="popup__content">
        <button class="btn-close popup__btn-close popup-close"></button>
        <h2 class="page-title popup__title">Fill form</h2>
        <p class="popup__subtitle popup__subtitle--order">We will bring you hot food in 50 minutes</p>
        <div class="order">
          <img class="order__img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="">
          <h3 class="order__title">
            <span class="order-product-title"></span>
            <span class="order-product-price"></span> &dollar;
          </h3>
          <p class="order__size"></p>
          <form class="form form-send">
            <input class="order-info-title" type="hidden" name="products">
            <input class="order-info-price" type="hidden" name="price">
            <input class="order-info-size" type="hidden" name="size">
            <input class="form__input" type="text" name="name" placeholder="Name" required>
            <input class="form__input" type="text" name="phone" placeholder="Phone" required>
            <input class="form__input" type="text" name="address" placeholder="Address" required>
            <select class="form__input" name="pay">
              <option value="Оплата наличными">Cash payment</option>
              <option value="Оплата картой">Card payment</option>
            </select>
            <button class="btn form__btn" type="submit">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.popup-order -->

<!-- popup-thanks -->
<div class="popup popup-thanks">
  <div class="popup__wrapper">
    <div class="popup__inner">
      <div class="popup__content">
        <button class="btn-close popup__btn-close popup-close"></button>
        <h2 class="page-title popup__title">Success delivery</h2>
        <p class="popup__subtitle">We have already started preparing your pizza</p>
      </div>
    </div>
  </div>
</div>
<!-- /.popup-thanks -->

<!-- popup-error -->
<div class="popup popup-error">
  <div class="popup__wrapper">
    <div class="popup__inner">
      <div class="popup__content">
        <button class="btn-close popup__btn-close popup-close"></button>
        <h2 class="page-title popup__title">Error</h2>
        <p class="popup__subtitle">Please place your order by phone number <a class="popup__link" href="tel:<?php echo $GLOBALS['pizza_time']['phone_digits']; ?>"><?php echo $GLOBALS['pizza_time']['phone'] ; ?></a></p>
      </div>
    </div>
  </div>
</div>
<!-- /.popup-error -->
    <?php wp_footer(); ?>
</body>
</html>
<!-- <script src="<?php echo get_site_url() ?>/template/js/main.js" type="module"></script> -->
<!-- footer -->
<div class="links-main">
    <ul class="links-main-list">
		<?php
		$socials_floating_items = mona_get_option( 'socials_floating_items' );

		if ( is_array( $socials_floating_items ) ) :
			foreach ( $socials_floating_items as $item ) :
				if ( content_exists( $item ) ) :
					?>
                    <li class="links-main-item">
                        <a href="<?php echo ( $item['item_url'] ) ? esc_url( $item['item_url'] ) : 'javascript:;'; ?>"
                           class="link-items" target="_blank">
                            <img src="<?php echo esc_url( $item['item_img'] ); ?>" alt=""/>
                        </a>
                    </li>
				<?php endif;
			endforeach;
		endif; ?>
        <li class="links-main-item scroll-to-top">
            <div class="link-items">
                <span class="items-top" href="">
                    <img src="<?php echo get_site_url() ?>/template/assets/images/arrowTop.svg" alt="">
                    <img src="<?php echo get_site_url() ?>/template/assets/images/arrowTop.svg" alt="">
                </span>
            </div>
        </li>
    </ul>
</div>
<div class="popup sign-form signup" data-popup-id="fsu">
    <div class="popup-overlay"></div>
    <div class="popup-main">
        <div class="popup-over">
            <form action="" method="post" id="mona-register-popup">
                <div class="popup-wrapper">
                    <div class="sign-up-con d-wrap">
                        <div class="left d-item d-2">
                            <div class="left-img">
                                <img src="<?php echo get_site_url(); ?>/template/assets/images/Rectangle 160.png"
                                     alt="">
                            </div>
                        </div>

                        <div class="right d-item d-2">
                            <div class="title">
                                <p class="title-text">
									<?php echo __( 'ĐĂNG KÝ', 'monamedia' ); ?>
                                </p>
                            </div>
                            <div class="form-sign">
                                <input type="text" name="register_loginname" required placeholder="Tên tài khoản">
                            </div>
                            <div class="form-sign">
                                <input type="email" name="register_email" required placeholder="Email">
                            </div>
                            <div class="form-sign">
                                <input type="number" required placeholder="Số điện thoại">
                            </div>
                            <div class="form-sign lock">
                                <input class="pass" required name="register_pass" type="password"
                                       placeholder="Mật khẩu">
                                <span class="hide-pass"> <i class="fas fa-lock"></i></span>
                                <span class="show-pass">
                                    <i class="fas fa-lock-open"></i>
                                </span>

                            </div>
                            <div class="form-sign lock">
                                <input class="re-pass" required name="register_repass" type="password"
                                       placeholder="Nhập lại mật khẩu">
                                <span class="re-hide-pass"> <i class="fas fa-lock"></i></span>
                                <span class="re-show-pass">
                                    <i class="fas fa-lock-open"></i>
                                </span>

                            </div>
                            <button type="submit" class="btn box-loading is-loading-btn">
                                <span class="btn-inner">
                                    <span class="text"><?php echo __( 'Đăng ký ngay', 'monamedia' ); ?></span>
                                </span>
                            </button>
                            <div class="css-response-error" id="response-register" style="display: none;"></div>
                            <div class="note">
                                <p class="note-text"><?php echo __( 'Bạn đã có tài khoản', 'monamedia' ); ?> ? </p>
                                <a class="note-link popup-open" href="javascript:;"
                                   data-popup="fsi"><?php echo __( 'Đăng nhập ngay', 'monamedia' ); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="popup-close">
            <i class="fas fa-times icon"></i>
        </div>
    </div>
</div>

<div class="popup sign-form signin" data-popup-id="fsi">
    <div class="popup-overlay"></div>
    <div class="popup-main">
        <div class="popup-over">
            <div class="popup-wrapper">
                <form action="" id="mona-login-form">

                    <div class="sign-up-con d-wrap">

                        <div class="left d-item d-2">
                            <div class="left-img">
                                <img src="<?php echo get_site_url(); ?>/template/assets/images/Rectangle 158.png"
                                     alt="">
                            </div>
                        </div>
                        <div class="right d-item d-2">
                            <div class="title">
                                <p class="title-text">
									<?php echo __( 'ĐĂNG NHẬP', 'monamedia' ); ?>
                                </p>
                            </div>
                            <div class="form-sign">
                                <input type="text" required name="user_name" placeholder="Tên tài khoản">
                            </div>
                            <div class="form-sign lock">
                                <input class="pass" required name="user_pass" type="password" placeholder="Mật khẩu">
                                <span class="hide-pass"> <i class="fas fa-lock"></i></span>
                                <span class="show-pass">
                                    <i class="fas fa-lock-open"></i>
                                </span>

                            </div>
                            <a href="javascript:;" class="forgot popup-open" data-popup="fgp">
								<?php echo __( 'Quên mật khẩu', 'monamedia' ); ?> ?
                            </a>
                            <button type="submit" class="btn is-loading-btn box-loading">
                                <span class="btn-inner">
                                    <span class="text"><?php echo __( 'Đăng nhập', 'monamedia' ); ?></span>
                                </span>
                            </button>
                            <div class="css-response-error" id="response-login">
                            </div>

                            <div class="note">
                                <p class="note-text"><?php echo __( 'Bạn chưa có tài khoản', 'monamedia' ); ?> ? </p>
                                <a class="note-link popup-open" href="javascript:;"
                                   data-popup="fsu"><?php echo __( 'Đăng ký ngay', 'monamedia' ); ?></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="popup-close">
            <i class="fas fa-times icon"></i>
        </div>
    </div>
</div>

<div class="popup sign-form forgot" data-popup-id="fgp">
    <div class="popup-overlay"></div>
    <div class="popup-main">
        <div class="popup-over">
            <form action="" method="post" id="mona-foget-submit-form">
                <div class="popup-wrapper">
                    <div class="sign-up-con d-wrap">
                        <div class="left d-item d-2">
                            <div class="left-img">
                                <img src="<?php echo get_site_url(); ?>/template/assets/images/Rectangle 159.png"
                                     alt="">
                            </div>
                        </div>

                        <div class="right d-item d-2">
                            <div class="title">
                                <p class="title-text">
									<?php echo __( 'QUÊN MẬT KHẨU', 'monamedia' ); ?>
                                </p>
                            </div>
                            <div class="text-con">
                                <p class="text">
									<?php echo __( 'Điền email của bạn vào bên dưới để yêu cầu mật khẩu mới. Một email sẽ được gửi đến địa
                                chỉ bên dưới chứa liên kết để xác minh địa chỉ email của bạn.', 'monamedia' ); ?>
                                </p>
                            </div>
                            <div class="form-sign">
                                <input type="text" name="register_email" required placeholder="Email đăng ký tài khoản">
                            </div>
                            <button type="submit" class="btn box-submit-form box-loading is-loading-btn">
                                <span class="btn-inner">
                                    <span class="text"><?php echo __( 'Gửi yêu cầu', 'monamedia' ); ?></span>
                                </span>
                            </button>
                            <div class="css-response-error" id="response-foget">
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="popup-close">
            <i class="fas fa-times icon"></i>
        </div>
    </div>
</div>

<footer class="footer bodder">
    <div class="footer-inner">
        <div class="container">
            <div class="footer-sign">
                <div class="footer-sign-wrap flex flex-wrap flex-jc-between">
                    <p class="footer-title">
						<?php
						// Lấy form title
						echo mona_get_option( 'form_footer_title' );
						?>
                    </p>

                    <div class="footer-form">
						<?php
						// Lấy form shortcode
						$form_shortcode = mona_get_option( 'form_footer_shortcode' );
						echo ( do_shortcode( $form_shortcode ) != $form_shortcode ) ? do_shortcode( $form_shortcode ) : '';
						?>
                    </div>
                </div>
            </div>
            <div class="footer-wrap d-wrap">
                <div class="footer-logo d-item">
                    <div class="footer-logo-wrap">
                        <a href="<?php echo get_site_url(); ?>" class="logo">
							<?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'image-medium-square' ); ?>
                        </a>
                    </div>
                </div>
                <div class="footer-content d-item">


                    <div class="footer-box">
                        <div class="footer-box-list d-wrap">
                            <div class="footer-box-item d-item">
								<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer_column_1' ) ) {
									;
								} ?>
                            </div>
                            <div class="footer-box-item d-item">
								<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer_column_2' ) ) {
									;
								} ?>
                            </div>
                            <div class="footer-box-item d-item">
								<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer_column_3' ) ) {
									;
								} ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom flex flex-wrap flex-jc-between">
                <div class="footer-copyright">
                    <p class="text text-center">
						<?php echo __( 'Thiết kế và lập trình bởi', 'monamedia' ); ?>
                        <span class="img">
                            <img src="<?php echo get_site_url() ?>/template/assets/images/monamedia-copyright.svg"
                                 alt="">
                        </span>
                    </p>
                </div>

                <div class="footer-sc">
                    <ul class="sc-list">
						<?php
						$socials_footer_items = mona_get_option( 'socials_footer_items' );

						if ( is_array( $socials_footer_items ) ) :
							foreach ( $socials_footer_items as $item ) :
								if ( content_exists( $item ) ) :
									?>
                                    <li class="sc-item">
                                        <a href="<?php echo ( $item['item_url'] ) ? esc_url( $item['item_url'] ) : 'javascript:;'; ?>"
                                           class="sc-link" target="_blank">
                                            <img src="<?php echo esc_url( $item['item_img'] ); ?>" alt=""/>
                                        </a>
                                    </li>
								<?php endif;
							endforeach;
						endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo get_site_url() ?>/template/js/library/jquery/jquery.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/jquery/jquery.easings.min.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/aos/aos.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/select2/select2.min.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/magnific/jquery.magnific-popup.min.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/gallery/lightgallery-all.min.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/countup/jquery.countup.min.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/countup/jquery.waypoints.min.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/jquery/jquery-migrate.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/popper/popper.min.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/plyr/plyr.min.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/datetime/moment.min.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/datetime/daterangepicker.min.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/readmore/readmore.min.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/library/imageload/imagesloaded.pkgd.min.js "></script>
<script src="<?php echo get_site_url() ?>/template/js/library/smoothscroll/SmoothScroll.min.js"></script>
<script src="<?php echo get_site_url() ?>/template/js/main.js" type="module"></script>
</body>

</html>
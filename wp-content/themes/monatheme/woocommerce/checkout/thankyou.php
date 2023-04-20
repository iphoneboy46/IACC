<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">
    <div class="hidden">

		<?php
		if ( $order ) :
			$order_id = $order->get_id();

			// Nếu người dùng nhấp vào nút Hủy đơn hàng
			if ( isset( $_POST['cancel_order'] ) ) {
				// Cập nhật trạng thái của đơn hàng thành "cancelled"
				$updated_order = array(
					'ID'          => $order_id,
					'post_status' => 'cancelled',
				);
				wp_update_post( $updated_order );
			}

			do_action( 'woocommerce_before_thankyou', $order->get_id() );
			?>

			<?php if ( $order->has_status( 'failed' ) ) : ?>

            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>"
                   class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"
                       class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
            </p>

		<?php else : ?>

            <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

            <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                <li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
                    <strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                </li>

                <li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
                    <strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                </li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
                    <li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
                        <strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                    </li>
				<?php endif; ?>

                <li class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
                    <strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                </li>

				<?php if ( $order->get_payment_method_title() ) : ?>
                    <li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
                        <strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
                    </li>
				<?php endif; ?>

            </ul>

		<?php endif; ?>

			<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
			<?php do_action( 'woocommerce_thankyou', $order->get_id() );
			?>

		<?php else : ?>

            <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

		<?php endif; ?>

    </div>
	<?php
	if ( isset( $_GET['mona-bill-info'] ) ) {
		?>
        <div class="cartsec">
            <div class="container">
                <!-- content -->

                <div class="details">
                    <div class="details-client">
                        <div class="title">
                            <h1 class="title-text">
								<?php echo __( 'THÔNG TIN CHI TIẾT ĐƠN HÀNG', 'monamedia' ); ?>
                            </h1>

                            <?php
                             $order_id = $order->get_id();

			// Nếu người dùng nhấp vào nút Hủy đơn hàng
                             ?>
							<?php
							function get_vietnamese_status( $status ) {
								switch ( $status ) {
									case 'on-hold':
										return 'Chờ xác nhận';
									case 'processing':
										return 'Đang xử lý';
									case 'completed':
										return 'Hoàn thành';
									case 'cancelled':
										return 'Đã hủy';
									case 'refunded':
										return 'Đã hoàn tiền';
									case 'failed':
										return 'Thất bại';
									default:
										return 'Không xác định';
								}
							}


							$status = get_vietnamese_status( $order->get_status() );
							?>
                            <p class="note">

                               #<?php echo $order->get_order_number(); ?> (
                                    <?php
                                        if ( isset( $_POST['cancel_order'] ) ) {
                                            echo "Đã hủy";
                                        } else {
                                            echo $status;
                                        }
                                    ?>
                                )

                            </p>
                        </div>
                    </div>
                    <div class="details-client-content">
                        <div class="content-item">
                            <div class="title">
                                <h3 class="title-text">
									<?php echo __( 'Tên người đặt', 'monamedia' ); ?>:
                                </h3>
                                <p class="title-content upper">
									<?php echo $order->get_billing_first_name() . ' ' . $order->get_billing_last_name(); ?>
                                </p>
                            </div>
                            <div class="title">
                                <h3 class="title-text">
									<?php echo __( 'SĐT người đặt', 'monamedia' ); ?>:
                                </h3>
                                <p class="title-content">
									<?php echo $order->get_billing_phone(); ?>
                                </p>
                            </div>
                            <div class="title ghi-chu">
                                <h3 class="title-text">
									<?php echo __( 'Ghi chú', 'monamedia' ); ?>:
                                </h3>
								<?php
								if ( ! empty( $order->get_customer_note() ) ) {
									?>
                                    <p class="title-content">
										<?php echo $order->get_customer_note(); ?>
                                    </p>
									<?php
								} else { ?>
                                    <p class="title-content">
										<?php echo __( 'Không có ghi chú cho đơn hàng này', 'monamedia' ); ?>.
                                    </p>
									<?php
								}
								?>
                            </div>
                        </div>
                        <div class="content-item">
                            <div class="title">
                                <h3 class="title-text">
									<?php echo __( 'Tên người nhận', 'monamedia' ); ?>:
                                </h3>
                                <span class="title-content upper">
                    <?php echo $order->get_shipping_first_name() . ' ' . $order->get_shipping_last_name(); ?>
                </span>
                            </div>
                            <div class="title">
                                <h3 class="title-text">
									<?php echo __( 'SĐT người nhận', 'monamedia' ); ?>:
                                </h3>
                                <span class="title-content">
                    <?php echo $order->get_billing_phone(); ?>
                </span>
                            </div>
                            <div class="title dia-chi">
                                <h3 class="title-text">
									<?php echo __( 'Địa chỉ nhận hàng', 'monamedia' ); ?>:
                                </h3>
                                <span class="title-content">
                    <?php echo $order->get_shipping_address_1() . ', ' . $order->get_shipping_city() . ', ' . $order->get_shipping_country(); ?>
                </span>
                            </div>
                        </div>
                        <div class="content-item">
                            <div class="title">
                                <h3 class="title-text">
									<?php echo __( 'Ngày đặt hàng', 'monamedia' ); ?>:
                                </h3>
                                <span class="title-content">
                    <?php echo wc_format_datetime( $order->get_date_created() ); ?>
                </span>
                            </div>
                            <div class="title">
                                <h3 class="title-text">
									<?php echo __( 'Ngày giao hàng dự kiến', 'monamedia' ); ?>:
                                </h3>
                                <span class="title-content">
                                 <?php
                                 $shipping_date = $order->get_meta( 'shipping_date' );
                                 if ( $shipping_date ) {
	                                 echo date( 'd/m/Y', strtotime( $shipping_date ) );
                                 } else {
	                                 echo 'Chưa có thông tin';
                                 }
                                 ?>
            </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info d-wrap">
                    <div class="info-left d-2 d-item">
						<?php foreach ( $order->get_items() as $item_id => $item ) { ?>
                            <div class="info-left-con">
                                <div class="img-item">
                                    <img src="<?php echo get_the_post_thumbnail_url( $item->get_product_id(), 'thumbnail' ); ?>"
                                         alt="">
                                </div>
                                <div class="note">
                                    <p class="note-text">
										<?php echo $item->get_name(); ?>
                                    </p>
                                    <p class="note-number">
										<?php echo __( 'x', 'monamedia' ) . $item->get_quantity(); ?>
                                    </p>
                                </div>
                                <div class="price">
                                    <p class="price-text">
										<?php echo wc_price( $item->get_total() ); ?>
                                    </p>
                                </div>
                            </div>
						<?php } ?>
                    </div>

                    <div class="info-right d-2 d-item">
                        <div class="info-right-con">
                            <div class="item-con">
                                <div class="content">
                                    <p class="text">
										<?php echo __( 'Hình thức thanh toán', 'monamedia' ); ?>
                                    </p>
                                </div>
                                <div class="content">
                                    <p class="text">
										<?php echo $order->get_payment_method_title(); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="item-con">
                                <div class="content">
                                    <p class="text">
										<?php echo __( 'Giảm giá', 'monamedia' ); ?>
                                    </p>
                                </div>
                                <div class="content">
                                    <p class="text">
										<?php echo wc_price( $order->get_total_discount() ); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="item-con line">
                                <div class="content">
                                    <p class="text">
										<?php echo __( 'Phí vận chuyển', 'monamedia' ); ?>
                                    </p>
                                </div>
                                <div class="content">
                                    <p class="text">
										<?php echo wc_price( $order->get_shipping_total() ); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="item-con ">
                                <div class="content">
                                    <p class="text">
										<?php echo __( 'Tổng tiền', 'monamedia' ); ?>
                                    </p>
                                </div>
                                <div class="content">
                                    <p class="text">
										<?php echo wc_price( $order->get_total() ); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                        <?php if ( isset( $_POST['cancel_order'] ) || $order->has_status( 'cancelled' ) ) : ?>
                                <div class="btn-huy">
                                    <a href="<?php echo get_permalink(MONA_WC_PRODUCTS); ?>" class="btn no-bg t-third bd-third">

                                <span class="btn-inner">
                                    <?php echo __('Tiếp tục mua sắm', 'monamedia'); ?>
                                </span>
                                    </a>
                                </div>
                    			<?php
                    			else:
							 ?>

                    <div class="btn-huy d-item">
                        <form method="post">
                            <button type="submit" name="cancel_order" class="btn no-bg t-third bd-third">
                                <span class="btn-inner">
                                    <?php echo __( 'Hủy đơn hàng', 'monamedia' ); ?>
                                </span>
                            </button>
                        </form>
                    </div>
                        <?php
                        endif; ?>
                </div>


            </div>
        </div>
		<?php
	} else {
	?>
    <div class="cartsec">
        <div class="container">
            <div class="scsec">
                <div class="scsec-icon">
                    <img src="<?php echo get_site_url(); ?>/template/assets/images/stamp-icon.svg" alt="">
                </div>

                <div class="scsec-top mb-40">
                    <h1 class="t-title-5 fw-6 upper text-center t-second mb-8"><?php echo __( 'ĐẶT HÀNG THÀNH CÔNG', 'monamedia' ); ?></h1>

                    <div class="scsec-desc mb-48 text-center">
                        <p><?php echo __( 'Đơn hàng đã thiết lập thành công. Chúng tôi sẽ liên lạc trực tiếp với quý khách để xác
                            nhận', 'monamedia' ); ?>.
                        </p>
                    </div>
                </div>

                <div class="scsec-wrap d-wrap mb-48">
                    <div class="scsec-left d-item d-2">
                        <h2 class="fw-7 upper t-main mb-24"><?php echo __( 'TÓM TẮT ĐƠN HÀNG', 'monamedia' ); ?></h2>

                        <div class="billi mb-24">
                            <div class="billi-wrap d-wrap">
                                <div class="billi-item d-item d-2 mb-16">
                                    <p class="billi-item-tit"><?php echo __( 'Mã đơn hàng', 'monamedia' ); ?></p>
                                    <p class="billi-item-txt fw-7">
                                        #<?php echo $order->get_order_number(); ?></p>
                                </div>
                                <div class="billi-item d-item d-2 mb-16">
                                    <p class="billi-item-tit"><?php echo __( 'Ngày', 'monamedia' ); ?></p>
                                    <p class="billi-item-txt fw-7">
										<?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </p>
                                </div>
                                <div class="billi-item d-item mb-16">
                                    <p class="billi-item-tit"><?php echo __( 'Địa chỉ nhận hàng', 'monamedia' ); ?></p>
                                    <p class="billi-item-txt fw-7">Số nhà 1073/30, Phường 27, Tân Bình,
                                        Thành phố Hồ Chí
                                        Minh</p>
                                </div>
                            </div>
                        </div>

						<?php do_action( 'woocommerce_thankyou', $order->get_id() );
						?>

                    </div>
                    <div class="scsec-right d-item d-2">
                        <div class="transf">
                            <h2 class="fw-7 upper t-main mb-24">THÔNG TIN CHUYỂN KHOẢN</h2>
                            <div class="transf-box">
                                <p class="transf-tit fw-7">Ngân hàng Á Châu (ACB)</p>

                                <div class="trans-list">
                                    <p class="transf-txt">Số tài khoản: 1922xxxxxx</p>
                                    <p class="transf-txt">Chi nhánh: Tân Bình</p>
                                    <p class="transf-txt">Người thụ hưởng: Trần Đạt</p>
                                </div>
                            </div>

                            <div class="transf-box">
                                <p class="transf-tit fw-7">Ngân hàng TMCP Nam Á
                                    (Nam A Bank)</p>

                                <div class="trans-list">
                                    <p class="transf-txt">Số tài khoản: 1922xxxxxx</p>
                                    <p class="transf-txt">Chi nhánh: Tân Bình</p>
                                    <p class="transf-txt">Người thụ hưởng: Trần Đạt</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="scsec-bottom d-wrap flex-ai-center flex-jc-between">
                    <p class="scsec-bottom-txt d-item t-third fw-7">
						<?php echo __( 'Cảm ơn quý khách', 'monamedia' ); ?>!
                    </p>
                    <div class="scsec-bottom-btn flex flex-wrap">
                        <a href="<?php echo 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '&mona-bill-info'; ?>"
                           class="btn no-bg t-third bd-third">
                            <span class="btn-inner"><?php echo __( 'Chi tiết đơn hàng', 'monamedia' ); ?></span>
                        </a>


                        <a href="<?php echo get_permalink( MONA_WC_PRODUCTS ) ?>" class="btn">
                            <span class="btn-inner"><?php echo __( 'Tiếp tục mua sắm', 'monamedia' ); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php
        } ?>
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
global $post;
$current_product_id = $post->ID;
$product_id         = $post->ID;
$product_obj        = wc_get_product( $current_product_id ); ?>
    <main class="main">
        <form id="frmAddProduct">
            <input type="hidden" name="product_id" value="<?php the_ID() ?>">
            <div class="breadcrumbs other">
                <div class="container">
					<?php
					/**
					 * GET TEMPLATE PART
					 * BREADCRUMB
					 */
					$slug = '/partials/breadcrumb';
					echo get_template_part( $slug );
					?>
                </div>
            </div>
            <div class="prodt section-2">
                <div class="container">
                    <div class="prodt-wrap d-wrap">
                        <div class="prodt-left prodt-slide d-item">
                            <div class="prodt-main gallery mb-1y">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
										<?php
										// Get the product's thumbnail
										$thumbnail_id  = get_post_thumbnail_id( $product_id );
										$thumbnail_url = wp_get_attachment_image_url( $thumbnail_id, 'image-medium-square' );

										// Get all images in the product gallery
										$image_ids = get_post_meta( $product_id, '_product_image_gallery', true );
										$image_ids = explode( ',', $image_ids );

										// Determine the total number of images
										$total_images = count( $image_ids ) + 1;

										// Display the product thumbnail
										if ( $thumbnail_url ) {
											?>
                                            <div class="swiper-slide">
                                                <div class="prodt-img gItem"
                                                     data-src="<?php echo $thumbnail_url; ?>">
													<?php echo wp_get_attachment_image( $thumbnail_id, 'image-medium-square', '', [ 'class' => '' ] ); ?>
                                                </div>
                                            </div>
											<?php
										}

										// Display the remaining gallery images
										foreach ( $image_ids as $image_id ) {
											?>
                                            <div class="swiper-slide">
                                                <div class="prodt-img gItem"
                                                     data-src="<?php echo wp_get_attachment_image_url( $image_id, 'banner-desktop-image' ) ?>">
													<?php echo wp_get_attachment_image( $image_id, 'image-medium-square', '', [ 'class' => '' ] ); ?>
                                                </div>
                                            </div>
											<?php
										}
										?>
                                    </div>

									<?php
									// Display pagination if there is more than one image
									if ( $total_images > 1 ) {
										?>
                                        <div class="swiper-pagination"></div>
										<?php
									}
									?>
                                </div>
                            </div>

							<?php if ( $total_images > 1 ) { ?>
                                <div class="prodt-thumbs mb-24">
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
											<?php
											// Display the product thumbnail
											if ( $thumbnail_url ) {
												?>
                                                <div class="swiper-slide">
                                                    <div class="prodt-img">
														<?php echo wp_get_attachment_image( $thumbnail_id, 'image-medium-square', '', [ 'class' => '' ] ); ?>
                                                    </div>
                                                </div>
												<?php
											}

											// Display the remaining gallery images
											foreach ( $image_ids as $image_id ) {
												?>
                                                <div class="swiper-slide">
                                                    <div class="prodt-img">
														<?php echo wp_get_attachment_image( $image_id, 'image-medium-square', '', [ 'class' => '' ] ); ?>
                                                    </div>
                                                </div>
												<?php
											}
											?>
                                        </div>
                                    </div>
                                </div>
							<?php } ?>

                        </div>

                        <div class="prodt-right d-item">
                            <div class="prodt-info-ct">
                                <h1 class="t-title-5 fw-6 mb-8"><?php the_title(); ?></h1>
								<?php
								$terms = get_the_terms( get_the_ID(), 'product_cat' ); // Lấy danh sách các danh mục sản phẩm của sản phẩm hiện tại
								if ( $terms && ! is_wp_error( $terms ) ) {
									$parent_cat = get_term_parents_list( $terms[0]->term_id, 'product_cat' ); // Lấy danh mục cha đầu tiên kèm link
									$parent_cat = rtrim( $parent_cat, '/' ); // Xóa bỏ dấu "/" ở cuối chuỗi
									echo '<p class="prodt-cate mb-8">' . __( 'Danh mục', 'monamedia' ) . ': <span class="t-main fw-7">' . $parent_cat . '</span></p>';
								}
								?>

                                <div class="prodt-rv mb-16 flex flex-wrap flex-ai-center">
                                    <div class="prodt-rv-item mb-8">
										<?php
										$average_rating = round( $product_obj->get_average_rating(), 1 ); // làm tròn đến 1 chữ số thập phân
										$stars_width    = ( $average_rating / 5 ) * 100; // tính toán width phù hợp
										?>

                                        <div class="mona-star-rating flex flex-ai-center">
											<?php
											if ( ! empty( $average_rating ) ) {
												?>
                                                <span class="star-rating-num"><?php echo $average_rating; ?></span>
												<?php
											}
											?>
                                            <div class="star">
                                                <div class="star-list">
                                                    <div class="star-flex star-empty">
                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                             alt="" class="icon">
                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                             alt="" class="icon">
                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                             alt="" class="icon">
                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                             alt="" class="icon">
                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                             alt="" class="icon">
                                                    </div>
                                                    <div class="star-flex star-filter"
                                                         style="width: <?php echo $stars_width; ?>%">
                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                             alt="" class="icon">
                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                             alt="" class="icon">
                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                             alt="" class="icon">
                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                             alt="" class="icon">
                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                             alt="" class="icon">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
									<?php
									$review_count = $product_obj->get_review_count();
									?>
                                    <div class="prodt-rv-item mb-8">
                                    <span class="prodt-rv-text">
                                        <span class="num"><?php echo $review_count; ?></span>
                                        <?php echo __( 'Đánh giá', 'monamedia' ); ?>
                                </span>
                                    </div>

									<?php
									$mona_product_sold = get_field( 'mona_product_sold' );
									$total_sales       = get_post_meta( $product_id, '_total_sales', true );
									if ( isset( $mona_product_sold ) && ! empty( $mona_product_sold ) ) {
										$sales = $mona_product_sold;
									} else {
										$sales = $total_sales;
									}
									?>
                                    <div class="prodt-rv-item mb-8">
                                    <span class="prodt-rv-text">
                                        <span class="num"><?php echo $sales; ?></span>
                                        <?php echo __( 'Đã bán', 'monamedia' ); ?>
                                    </span>
                                    </div>


                                </div>

								<?php
								$mona_product_option = get_field( 'mona_product_option', $post->ID );
								$product_price       = floatval( get_post_meta( get_the_ID(), '_regular_price', true ) );
								echo '<span class="prodt-price mb-24 block t-main">';
								if ( $mona_product_option == true ) {
									echo __( 'Pre Order', 'monamedia' );
								} else {
									if ( ! empty( $product_price ) ) {
										echo number_format( $product_price, 0, '.', ',' ) . ' ' . __( 'đ', 'monamedia' );
									}
								}
								echo '</span>';
								?>
								<?php
								$mona_product_info = get_field( 'mona_product_info' );
								?>
                                <div class="prodt-desc mb-40 mona-content">
									<?php echo $mona_product_info; ?>
                                </div>

								<?php
								$stock_quantity = $product_obj->get_stock_quantity();
								?>
                                <div class="prodt-numOf mb-40">
                                    <span class="prodt-tit block mb-8"><?php echo __( 'Số lượng:', 'monamedia' ); ?></span>
                                    <div class="prodt-qty flex flex-ai-center">
                                        <div class="qty flex qtyJS">
                                        <span class="minus icon">
                                            <img src="<?php echo get_site_url(); ?>/template/assets/images/decr-icon.svg"
                                                 alt="">
                                        </span>
											<?php
											// If stock quantity exists, set the max input value to stock quantity
											if ( isset( $stock_quantity ) && $stock_quantity !== '' ) {
												$max_value = $stock_quantity;
											} else {
												$max_value = '';
											}
											?>
                                            <input type="number" class="amount" name="quantity" value="1"
                                                   max="<?php echo $max_value; ?>">
                                            <span class="plus icon">
                                            <img src="<?php echo get_site_url(); ?>/template/assets/images/incre-icon.svg"
                                                 alt="">
                                        </span>
                                        </div>
										<?php if ( isset( $stock_quantity ) && $stock_quantity !== '' ) : ?>
                                            <p class="text"><?php echo $stock_quantity . __( ' sản phẩm sẳn có', 'monamedia' ); ?></p>
										<?php endif; ?>
                                    </div>
                                </div>


								<?php
								$mona_product_option = get_field( 'mona_product_option', $post->ID );
								if ( $mona_product_option ) {
									?>
                                    <a target="_blank" href="https://www.facebook.com/messages/t/100537656312246"
                                       class="btn mb-8">
                                        <span class="btn-inner"><?php echo __( 'Đặt hàng trước', 'monamedia' ); ?></span>
                                    </a>
									<?php
								} else { ?>
                                    <div class="prodt-btn-list flex flex-wrap mb-24">
                                        <a href="" class="btn no-bg bd-third t-third icon-right mb-8">
                                    <span class="btn-inner"><?php echo __( 'Thêm vào giỏ', 'monamedia' ); ?>
                                        <span class="icon">
                                            <img src="<?php echo get_site_url(); ?>/template/assets/images/shopping-bag.svg"
                                                 alt="">
                                        </span>

                                    </span>
                                        </a>

                                        <a href="javascript:;" class="btn mb-8 mona-buy-now">
                                            <span class="btn-inner"><?php echo __( 'Đặt hàng ngay', 'monamedia' ); ?></span>
                                        </a>
                                    </div>
									<?php
								} ?>
                                <div class="prodt-share">
                                    <p class="text mb-8"><?php echo __( 'Chia sẻ', 'monamedia' ); ?>: </p>
                                    <ul class="sc-list">
                                        <li class="sc-item">
                                            <a href="" class="sc-link">
                                                <img src="<?php echo get_site_url(); ?>/template/assets/images/facebook-2.svg"
                                                     alt="" rq4k2xpud="">
                                            </a>
                                        </li>
                                        <li class="sc-item">
                                            <a href="" class="sc-link">
                                                <img src="<?php echo get_site_url(); ?>/template/assets/images/tw-i.svg"
                                                     alt="">
                                            </a>
                                        </li>
                                        <li class="sc-item">
                                            <a href="" class="sc-link">
                                                <img src="<?php echo get_site_url(); ?>/template/assets/images/pt-i.svg"
                                                     alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="proInfo st">
                <div class="proInfo-wrap">
                    <div class="tabJS2 tab1">
                        <div class="container">
                            <div class="tabs pos-relative">
                                <div class="tabs-inner">
                                    <div class="tab-item"><span
                                                class="text"><?php echo __( 'Mô tả sản phẩm', 'monamedia' ); ?></span>
                                    </div>
                                    <div class="tab-item"><span
                                                class="text"><?php echo __( 'Chi tiết sản phẩm', 'monamedia' ); ?></span>
                                    </div>
                                    <div class="tab-item"><span
                                                class="text"><?php echo __( 'Đánh giá sản phẩm', 'monamedia' ); ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="proInfo-ct">
                            <div class="container">
                                <div class="tab_content">
                                    <div class="tab_item">
                                        <div class="tab-wrap reamoreJS">
                                            <div class="mona-content">
                                                <div class="content reamoreCTJS" data-show-text="Xem thêm"
                                                     data-hide-text="Thu gọn nội dung" data-height="650">
                                                    <div class="proInfo-content">
														<?php the_content(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab_item">
                                        <div class="tab-wrap reamoreJS">
											<?php
											$mona_product_detail = get_field( 'mona_product_detail' );
											?>
											<?php
											if ( ! empty( $mona_product_detail ) && is_array( $mona_product_detail ) ) {
												?>
                                                <div class="mona-content">
                                                    <div class="content reamoreCTJS" data-show-text="Xem thêm"
                                                         data-hide-text="Thu gọn nội dung" data-height="800">
                                                        <div class="prodt-info mb-16">
															<?php
															foreach ( $mona_product_detail['detail_list_info'] as $key_info => $item_info ) {
																?>
                                                                <div class="prodt-info-item">
                                                                    <div class="prodt-info-tit"><?php echo $item_info['title'] ?></div>
                                                                    <div class="prodt-info-txt">
																		<?php echo $item_info['info']; ?>
                                                                    </div>
                                                                </div>
																<?php
															}
															?>
                                                        </div>

                                                        <p class="note mona-content">
															<?php echo $mona_product_detail['detail_description'] ?>
                                                        </p>
                                                    </div>
                                                </div>
												<?php
											}
											?>
                                        </div>
                                    </div>
                                    <div class="tab_item">
                                        <div class="tab-wrap reamoreJS">
                                            <div class="mona-content">
                                                <div class="content reamoreCTJS" data-show-text="Xem thêm"
                                                     data-hide-text="Thu gọn nội dung" data-height="800">
                                                    <div class="proInfo-rv d-wrap">
                                                        <div class="proInfo-left d-item">
                                                            <div class="cmt-list">
                                                                <div class="cmt-item">
                                                                    <div class="cmt-avt">
                                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/avt1.png"
                                                                             alt="">
                                                                    </div>
                                                                    <div class="cmt-box">
                                                                        <p class="cmt-name">Đặng Thu Hà</p>
                                                                        <div class="cmt-star star">
                                                                            <div class="star-list">
                                                                                <div class="star-flex star-empty">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                                         alt="" class="icon">
                                                                                </div>
                                                                                <div class="star-flex star-filter"
                                                                                     style="width: 100%">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                                         alt="" class="icon">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="cmt-ct">
                                                                            Có rất nhiều biến thể của Lorem Ipsum mà bạn
                                                                            có
                                                                            thể tìm thấy, nhưng đa số được biến đổi bằng
                                                                            cách thêm các yếu tố hài hước, các từ ngẫu
                                                                            nhiên
                                                                            có khi không có vẻ gì là có ý
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="cmt-item">
                                                                    <div class="cmt-avt">
                                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/avt1.png"
                                                                             alt="">
                                                                    </div>
                                                                    <div class="cmt-box">
                                                                        <p class="cmt-name">Đặng Thu Hà</p>
                                                                        <div class="cmt-star star">
                                                                            <div class="star-list">
                                                                                <div class="star-flex star-empty">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                                         alt="" class="icon">
                                                                                </div>
                                                                                <div class="star-flex star-filter"
                                                                                     style="width: 80%">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                                         alt="" class="icon">
                                                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                                         alt="" class="icon">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="cmt-ct">
                                                                            Có rất nhiều biến thể của Lorem Ipsum mà bạn
                                                                            có
                                                                            thể tìm thấy, nhưng đa số được biến đổi bằng
                                                                            cách thêm các yếu tố hài hước, các từ ngẫu
                                                                            nhiên
                                                                            có khi không có vẻ gì là có ý
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="proInfo-right d-item">
                                                            <form action="">
                                                                <span class="tit block fw-7 mb-16">Thêm đánh giá</span>
                                                                <div
                                                                        class="rvcheck-list recheck-block flex flex-wrap mb-16">
                                                                    <div class="rvcheck-item recheck-item">
                                                                        5
                                                                        <span class="star">
                                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                             alt="">
                                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                             alt="">
                                                                    </span>

                                                                        <input type="radio" hidden
                                                                               class="recheck-input">
                                                                    </div>
                                                                    <div class="rvcheck-item recheck-item">
                                                                        4
                                                                        <span class="star">
                                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                             alt="">
                                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                             alt="">
                                                                    </span>

                                                                        <input type="radio" hidden
                                                                               class="recheck-input">
                                                                    </div>
                                                                    <div class="rvcheck-item recheck-item">
                                                                        3
                                                                        <span class="star">
                                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                             alt="">
                                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                             alt="">
                                                                    </span>

                                                                        <input type="radio" hidden
                                                                               class="recheck-input">
                                                                    </div>
                                                                    <div class="rvcheck-item recheck-item">
                                                                        2
                                                                        <span class="star">
                                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                             alt="">
                                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                             alt="">
                                                                    </span>

                                                                        <input type="radio" hidden
                                                                               class="recheck-input">
                                                                    </div>
                                                                    <div class="rvcheck-item recheck-item">
                                                                        1
                                                                        <span class="star">
                                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-opa.svg"
                                                                             alt="">
                                                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/star-fill.svg"
                                                                             alt="">
                                                                    </span>

                                                                        <input type="radio" hidden
                                                                               class="recheck-input">
                                                                    </div>
                                                                </div>

                                                                <div class="proInfo-form mb-32">
                                                                    <div class="proInfo-control">
                                                                        <input type="text" class="proInfo-input"
                                                                               placeholder="Họ và tên">
                                                                    </div>
                                                                    <div class="proInfo-control">
                                                                        <input type="text" class="proInfo-input"
                                                                               placeholder="Email">
                                                                    </div>
                                                                    <div class="proInfo-control">
                                                                    <textarea name="" id="" cols="30" rows="10"
                                                                              class="proInfo-textarea"
                                                                              placeholder="Nội dung đánh giá"></textarea>
                                                                    </div>
                                                                </div>

                                                                <button class="btn">
                                                                    <span class="btn-inner">Gửi đánh giá</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-relate">
                <div class="container">
                    <p class="footer-title title-text"><?php echo __( 'Sản Phẩm Liên Quan', 'monamedia' ); ?></p>
                    <div class="product-relate-con pos-relative free-slide d-wrap pro-list">
                        <div class="swiper ">
							<?php

							$related_products = wc_get_related_products( get_the_ID(), $limit = 6 );

							?>

                            <div class="swiper-wrapper ">
								<?php foreach ( $related_products as $related_product ) :
									$post = get_post( $related_product, 'product' );
									?>
                                    <div class="swiper-slide d-item d-4">
                                        <div class="pro-item">
											<?php
											/**
											 * GET TEMPLATE PART
											 * BOX PRODUCT
											 */
											$slug = '/partials/loop/box';
											$name = 'product';
											echo get_template_part( $slug, $name );
											wp_reset_postdata();
											?>
                                        </div>
                                    </div>
								<?php endforeach;
								wp_reset_query();
								?>
                            </div>

                        </div>
                        <div class="pagination-con swiper-navi">
                            <div class="swiper-navigation circle pri prev swiper-abs ">
                                <img src="<?php echo get_site_url(); ?>/template/assets/images/vPrev.svg" alt="">
                            </div>
                            <div class="swiper-navigation circle pri next swiper-abs ">
                                <img src="<?php echo get_site_url(); ?>/template/assets/images/vNext.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-main">
                <img src="<?php echo get_site_url(); ?>/template/assets/images/vbannerMain.png" alt="">
            </div>
        </form>
    </main>
<?php
get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

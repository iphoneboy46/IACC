<?php
get_header();
$current = get_queried_object();
?>

    <!-- MAIN -->
    <main class="main">
		<?php
		/**
		 * GET TEMPLATE PART
		 * GLOBAL BANNER
		 */
		$slug = '/partials/global/banners';
		echo get_template_part( $slug );
		?>
		<?php
		$mona_category_list = get_field( 'mona_category_list', MONA_WC_PRODUCTS );
		?>
		<?php
		if ( content_exists( $mona_category_list ) ) {
			?>
            <div class="procate">
                <div class="container">
                    <div class="procate-wrap">
                        <div class="procate-list free-slide d-wrap">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide d-4">
                                        <div class="procate-item d-item">
                                            <a href="<?php echo get_permalink( MONA_WC_PRODUCTS ); ?>"
                                               class="procate-item-wrap">
                                            <span class="procate-item-img">
                                                <img src="<?php echo get_site_url(); ?>/template/assets/images/cate-1.png"
                                                     alt="">
                                            </span>

                                                <span class="procate-item-name"><?php echo __( 'Tât cả sản phẩm', 'monamedia' ); ?></span>
                                            </a>
                                        </div>
                                    </div>
									<?php
									foreach ( $mona_category_list as $item_cat ) {
										$term_name = esc_html( $item_cat->name );
										$term_link = esc_url( get_term_link( $item_cat, 'product_cat' ) );
										?>
                                        <div class="swiper-slide d-4">
                                            <div class="procate-item d-item">
                                                <a href="<?php echo $term_link; ?>" class="procate-item-wrap">
                                                <span class="procate-item-img">
                                                    <?php
                                                    $thumbnail_id = get_term_meta( $item_cat->term_id, 'thumbnail_id', true );
                                                    if ( $thumbnail_id ) {
	                                                    echo wp_get_attachment_image( $thumbnail_id, 'image-medium-square' );
                                                    } else { ?>
                                                        <img src="<?php echo get_template_directory_uri() ?>/public/helpers/images/default-thumbnail.jpg"
                                                             alt="">
	                                                    <?php
                                                    }
                                                    ?>
                                                </span>
                                                    <span class="procate-item-name"><?php echo $term_name; ?></span>
                                                </a>
                                            </div>
                                        </div>
										<?php
									}

									?>
                                </div>
                            </div>

							<div class="swiper-navi">
                            <div class="swiper-navigation circle pri prev swiper-abs ">
							<i class="fas fa-chevron-left"></i>
                            </div>
                            <div class="swiper-navigation circle pri next swiper-abs ">
							<i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php
		}
		?>

        <div class="prolist">
            <div class="container">
                <div class="prolist-wrap d-wrap">
                    <div class="prolist-left d-item">
                        <form action="#mona-list-product" id="sidebar-product">
                            <input type="hidden" name="order" id="form-order">
                            <div class="sidebar">
                                <div class="side-fixed">
                                    <div class="side-fixed-wrap filterJs">
                                        <div class="sidebar-wrap">
                                            <div class="sidebar-top">
                                                <p class="sidebar-tit t-white upper fw-7">
                                                <span class="icon">
                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/menu-hd.svg"
                                                         alt="">
                                                </span>
													<?php echo __( 'DANH MỤC SẢN PHẨM', 'monamedia' ); ?>
                                                </p>
                                            </div>
                                            <div class="sidebar-wrap-ct">
                                                <div class="sidebar-box filterBoxJS">
                                                    <div class="sidebar-type filterTypeJS">
                                                        <a href="<?php echo get_permalink( MONA_WC_PRODUCTS ); ?>">
															<?php echo __( 'Tất cả sản phẩm', 'monamedia' ); ?>
                                                        </a>
                                                    </div>
                                                </div>
												<?php
												$parent_categories = get_terms( array(
													'taxonomy'   => 'product_cat',
													'parent'     => 0,
													'hide_empty' => true,
												) );

												if ( ! empty( $parent_categories ) && is_array( $parent_categories ) ) {
													foreach ( $parent_categories as $key_parent_cat => $item_parent_cat ) {
														// Lấy danh sách các danh mục sản phẩm con
														$child_categories = get_terms( array(
															'taxonomy'   => 'product_cat',
															'parent'     => $item_parent_cat->term_id,
															'hide_empty' => true,
														) );
														?>
                                                        <div class="sidebar-box filterBoxJS">
                                                            <div class="sidebar-type filterTypeJS">
                                                                <a href="<?php echo get_term_link( $item_parent_cat->term_id, 'product_cat' ) ?>">
																	<?php echo $item_parent_cat->name ?>
                                                                </a>
																<?php
																if ( ! empty( $child_categories ) && is_array( $child_categories ) ) {
																	?>
                                                                    <span class="icon">
                                                                    <i class="fas fa-angle-down"></i>
                                                                </span>
																	<?php
																} ?>
                                                            </div>
                                                            <div class="sidebar-content filter-sub">
                                                                <ul class="cate-list">
																	<?php foreach ( $child_categories as $child_category ) { ?>
                                                                        <li class="cate-item">
                                                                            <a href="<?php echo get_term_link( $child_category->term_id, 'product_cat' ) ?>">
                                                                                <span class="text"><?php echo $child_category->name ?></span>
                                                                            </a>
                                                                        </li>
																	<?php } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
														<?php
													}
												}
												?>

                                            </div>
                                            <div class="sidebar-top">
                                                <p class="sidebar-tit t-white upper fw-7">
                                                <span class="icon">
                                                    <img src="<?php echo get_site_url(); ?>/template/assets/images/filter-icon.svg"
                                                         alt="">
                                                </span>
													<?php echo __( 'BỘ LỌC SẢN PHẨM', 'monamedia' ); ?>
                                                </p>
                                            </div>

                                            <div class="sidebar-wrap-ct">
                                                <p class="sidebar-type-tit mb-24">
													<?php echo __( 'Tùy chọn hàng', 'monamedia' ); ?>
                                                </p>

												<?php
												$options = isset( $_GET['product-option'] ) ?: '';

												$checkboxes = array(
													array(
														'value' => 'available',
														'label' => __( 'Hàng có sẵn', 'monamedia' ),
													),
													array(
														'value' => 'pre-order',
														'label' => __( 'Hàng order', 'monamedia' ),
													),
												);

												?>

                                                <ul class="cate-list recheck-block mb-24">
													<?php foreach ( $checkboxes as $checkbox ) : ?>
                                                        <li class="cate-item recheck-item">
															<?php
															$is_check = $checkbox['value'] == $options;
															?>
                                                            <input type="radio" <?php echo $is_check ? 'checked' : '' ?>
                                                                   name="product-option"
                                                                   value="<?php echo $checkbox['value']; ?>" hidden=""
                                                                   class="recheck-input">
                                                            <span class="box"><i class="ti-check"></i></span>
                                                            <span class="text"><?php echo $checkbox['label']; ?></span>
                                                        </li>
													<?php endforeach; ?>
                                                </ul>
                                                <p class="sidebar-type-tit mb-24">
													<?php echo __( 'Giá bán', 'monamedia' ); ?>
                                                </p>

                                                <div class="range-price mb-24">
													<?php
													$min_price_default = 0;
													$max_price_default = 3000000;

													if ( isset( $_GET['min'] ) && isset( $_GET['max'] ) ) {
														$min_price = intval( $_GET['min'] );
														$max_price = intval( $_GET['max'] );
													} else {
														$min_price = $min_price_default;
														$max_price = $max_price_default;
													}
													?>
                                                    <div class="list" style="display: block;">
                                                        <div class="ranges">
                                                            <div class="range">
                                                                <div class="range-slider">
                                                                    <div class="progress"></div>
                                                                </div>
                                                                <div class="range-input mb-24">
                                                                    <input type="range" class="range-min" name="min"
                                                                           step="500000" min="0" max="10000000"
                                                                           value="<?php echo esc_attr( $min_price ); ?>">
                                                                    <input type="range" class="range-max" name="max"
                                                                           step="500000" min="0" max="10000000"
                                                                           value="<?php echo esc_attr( $max_price ); ?>">
                                                                </div>
                                                                <div class="range-flex flex-jc-between">
                                                                    <div class="range-item min">
                                                                        <span class="price"><?php echo esc_html( number_format( $min_price, 0, ',', '.' ) ); ?>đ</span>
                                                                    </div>
                                                                    <div class="range-item max">
                                                                        <span class="price"><?php echo esc_html( number_format( $max_price, 0, ',', '.' ) ); ?>đ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p class="sidebar-type-tit mb-24">
													<?php echo __( 'Đánh giá', 'monamedia' ); ?>
                                                </p>

                                                <ul class="cate-list star-rate recheck-block mb-24">
													<?php
													$starRatings = array(
														array( 'rating' => 5, 'text' => 'Từ 5 sao', 'fill' => 5 ),
														array( 'rating' => 4, 'text' => 'Từ 4 sao', 'fill' => 4 ),
														array( 'rating' => 3, 'text' => 'Từ 3 sao', 'fill' => 3 ),
													);
													foreach ( $starRatings as $star ) :
														$isActive = ( isset( $_GET['star-rating'] ) && $_GET['star-rating'] == $star['rating'] ) ? 'active' : '';
														?>
                                                        <li class="cate-item recheck-item">
                                                            <input type="radio" <?php echo $isActive ? ' checked' : '' ?>
                                                                   name="star-rating"
                                                                   value="<?php echo $star['rating'] ?>" hidden
                                                                   class="recheck-input">
                                                            <span class="text"><?php echo __( $star['text'], 'monamedia' ) ?></span>
                                                            <span class="star-list">
                                                            <div class="star">
                                                                <div class="star-list">
                                                                    <div class="star-flex star-empty">
                                                                        <?php for ( $i = 1; $i <= 5; $i ++ ) : ?>
                                                                            <img src="<?php echo get_site_url() ?>/template/assets/images/star-opa.svg"
                                                                                 alt="" class="icon">
                                                                        <?php endfor ?>
                                                                    </div>
                                                                    <div class="star-flex star-filter"
                                                                         style="width: <?php echo( $star['fill'] * 20 ) ?>%">
                                                                        <?php for ( $i = 1; $i <= $star['fill']; $i ++ ) : ?>
                                                                            <img src="<?php echo get_site_url() ?>/template/assets/images/star-fill.svg"
                                                                                 alt="" class="icon">
                                                                        <?php endfor ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        </li>
													<?php endforeach ?>
                                                </ul>


                                                <p class="sidebar-type-tit mb-24">
													<?php echo __( 'Giao hàng', 'monamedia' ); ?>
                                                </p>


                                                <ul class="cate-list recheck-block mb-32">
													<?php
													$shipping_options = array(
														'domestic'      => __( 'Giao hàng nội địa', 'monamedia' ),
														'international' => __( 'Giao hàng quốc tế', 'monamedia' ),
													);
													foreach ( $shipping_options as $value => $label ) {
														$checked = '';
														if ( isset( $_GET['shipping'] ) && $value == $_GET['shipping'] ) {
															$checked = 'checked';
														}
														?>
                                                        <li class="cate-item recheck-item">
                                                            <input type="radio" name="shipping"
                                                                   value="<?php echo $value; ?>" hidden=""
                                                                   class="recheck-input" <?php echo $checked; ?>>
                                                            <span class="box">
                                                            <i class="ti-check"></i>
                                                        </span>
                                                            <span class="text"><?php echo $label; ?></span>
                                                        </li>
														<?php
													}
													?>
                                                </ul>


                                                <button type="submit" class="btn fw mb-10 non-upper">
                                                <span class="btn-inner">
                                                    <?php echo __( 'Lọc', 'monamedia' ); ?>
                                                </span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="side-close">
                                        <i class="fas fa-times close icon"></i>
                                    </div>
                                </div>
                                <div class="side-overlay"></div>
                            </div>
                        </form>
                    </div>
					<?php
					$current_page = get_query_var( 'paged' );
					$current_page = max( 1, $current_page );
					$offset_start = 0;
					$order        = 'DESC';
					$per_page     = wp_is_mobile() ? 8 : 9;
					$offset       = ( $current_page - 1 ) * $per_page + $offset_start;
					$argsProducts = array(
						'post_type'      => 'product',
						'paged'          => $current_page,
						'offset'         => $offset,
						'post_status'    => 'publish',
						'posts_per_page' => $per_page,
						'order'          => $order,
						'meta_query'     => array(
							'relation' => 'AND',
						),
					);
					// Nếu có tham số product-option được truyền vào
					if ( isset( $_GET['product-option'] ) && ! empty( $_GET['product-option'] ) ) {
						$product_options   = $_GET['product-option'];
						$meta_query_option = array(
							'relation' => 'OR',
						);
						if ( $product_options == 'available' ) {
							$meta_query_option[] = array(
								'key'     => 'mona_product_option',
								'value'   => '0',
								'compare' => '=',
							);
						} elseif ( $product_options == 'pre-order' ) {
							$meta_query_option[] = array(
								'key'     => 'mona_product_option',
								'value'   => '1',
								'compare' => '=',
							);
						}
						$argsProducts['meta_query'][] = $meta_query_option;
					}

					if ( isset( $_GET['shipping'] ) && ! empty( $_GET['shipping'] ) ) {
						$product_shipping    = $_GET['shipping'];
						$meta_query_shipping = array(
							'relation' => 'OR',
						);
						if ( $product_shipping == 'domestic' ) {
							$meta_query_shipping[] = array(
								'key'     => 'mona_product_ship',
								'value'   => 'domestic',
								'compare' => 'LIKE',
							);
						} elseif ( $product_shipping == 'international' ) {
							$meta_query_shipping[] = array(
								'key'     => 'mona_product_ship',
								'value'   => 'international',
								'compare' => 'LIKE',
							);
						}
						$argsProducts['meta_query'][] = $meta_query_shipping;
					}

					if ( isset( $_GET['star-rating'] ) && $_GET['star-rating'] >= 3 && $_GET['star-rating'] <= 5 ) {
						$star_rating                  = $_GET['star-rating'];
						$meta_query_rating            = array(
							'key'     => '_wc_average_rating',
							'value'   => $star_rating,
							'type'    => 'numeric',
							'compare' => '>='
						);
						$argsProducts['meta_query'][] = $meta_query_rating;
					}

					if ( isset( $_GET['min'] ) && isset( $_GET['max'] ) ) {
						$min_price                    = intval( $_GET['min'] );
						$max_price                    = intval( $_GET['max'] );
						$meta_query_price             = array(
							'key'     => '_price',
							'value'   => array( $min_price, $max_price ),
							'type'    => 'numeric',
							'compare' => 'BETWEEN',
						);
						$argsProducts['meta_query'][] = $meta_query_price;
					}
					if ( isset( $_GET['order'] ) ) {
						switch ( $_GET['order'] ) {
							case 'newest':
								$argsProducts['order'] = 'DESC';
								break;
							case 'high-to-low':
								$argsProducts['meta_key'] = '_price';
								$argsProducts['orderby']  = 'meta_value_num';
								$argsProducts['order']    = 'DESC';
								break;
							case 'low-to-high':
								$argsProducts['meta_key'] = '_price';
								$argsProducts['orderby']  = 'meta_value_num';
								$argsProducts['order']    = 'ASC';
								break;
							case 'outstanding':
								$argsProducts['orderby']  = 'meta_value_num';
								$argsProducts['meta_key'] = '_mona_post_view';
								$argsProducts['order']    = 'DESC';
								break;
							default:
								break;
						}
					}

					$loop = new WP_Query( $argsProducts );

					?>
                    <div class="prolist-right d-item" id="mona-list-product">
                        <div class="prolist-top mb-16 d-wrap flex-jc-between flex-ai-center">
                            <div class="result d-item"><?php echo __( 'Đang hiển thị', 'monamedia' ); ?> <span
                                        class="num fw-7"><?php echo $loop->found_posts ?></span> <?php echo __( 'kết quả', 'monamedia' ); ?>
                            </div>
                            <div class="sort d-item">
                                <div class="sort-wrap flex flex-ai-center">
                                    <div class="sort-text"><?php echo __( 'Sắp xếp', 'monamedia' ); ?>:</div>

                                    <div class="sort-select">
                                        <select name="product-order" id="" class="select">
                                            <option value="newest" <?php if ( isset( $_GET['order'] ) && $_GET['order'] == 'newest' ) {
												echo 'selected';
											} ?>>Sản phẩm mới
                                            </option>
                                            <option value="outstanding" <?php if ( isset( $_GET['order'] ) && $_GET['order'] == 'outstanding' ) {
												echo 'selected';
											} ?>>Nổi bật
                                            </option>
                                            <option value="high-to-low" <?php if ( isset( $_GET['order'] ) && $_GET['order'] == 'high-to-low' ) {
												echo 'selected';
											} ?>>Giá cao đến thấp
                                            </option>
                                            <option value="low-to-high" <?php if ( isset( $_GET['order'] ) && $_GET['order'] == 'low-to-high' ) {
												echo 'selected';
											} ?>>Giá thấp đến cao
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="filter d-item flex flex-ai-center">
                                <div class="proFilter-cate-open">
                                    <div class="icon">
                                        <img src="<?php echo get_site_url(); ?>/template/assets/images/filter-icon.svg"
                                             alt="">
                                    </div>
                                    <span class="text">Phân loại</span>
                                </div>
                            </div>
                        </div>
                        <div class="pro-list d-wrap">
							<?php if ( $loop->have_posts() ) : ?>
								<?php
								while ( $loop->have_posts() ) {
									$loop->the_post();
									?>
                                    <div class="pro-item d-item d-3">
										<?php
										/**
										 * GET TEMPLATE PART
										 * BOX PRODUCT
										 */
										$slug = '/partials/loop/box';
										$name = 'product';
										echo get_template_part( $slug, $name );
										?>
                                    </div>
									<?php
								}
								wp_reset_query();
								?>

							<?php endif ?>
                        </div>

                        <div class="prolist-bott flex flex-wrap flex-ai-center">
							<?php mona_pagination_links( $loop ); ?>

							<?php
							$current_page = max( 1, get_query_var( 'paged' ) );
							$total_pages  = $loop->max_num_pages;
							$display_text = sprintf( 'Hiển thị %d/%d trang', $current_page, $total_pages );
							?>
                            <p class="text"><?php echo $display_text; ?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="banner-main">
			<?php
			$mona_category_banner = get_field( 'mona_category_banner', MONA_WC_PRODUCTS );
			// Lấy và kiểm tra hình ảnh banner
			$banner_desk_img   = $mona_category_banner['banner_desk_img'];
			$banner_mobile_img = $mona_category_banner['banner_mobile_img'];

			if ( wp_is_mobile() && ! empty( $banner_mobile_img ) ) {
				echo wp_get_attachment_image( $banner_mobile_img, 'banner-mobile-image' );
			} else if ( ! wp_is_mobile() && ! empty( $banner_desk_img ) ) {
				echo wp_get_attachment_image( $banner_desk_img, 'banner-desktop-image' );
			} else {
				echo '<img src="' . get_template_directory_uri() . '/public/helpers/images/banner-default-min.png" alt="" />';
			}
			?>
        </div>

        <div class="ser sec-decor">
			<?php
			/**
			 * GET TEMPLATE PART
			 * Section pledge
			 */
			$slug = '/partials/global/section-pledge';
			echo get_template_part( $slug );
			?>
        </div>
    </main>


<?php
get_footer();
?>
<?php

/**
 * Section name: Home - Mua hàng ngay
 * Description: 
 * Author: Monamedia
 * Order: 2
 */
?>
<div id="<?php echo $args['id'] ?>" class="<?php echo $args['classes'] ?> buysec section">
    <div class="container">
        <div class="buysec-wrap">
            <div class="buysec-list free-slide d-wrap">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php
                        $mona_home_section_buynow = get_field('mona_home_section_buynow');
                        $buynow_list_item = $mona_home_section_buynow['buynow_list_item'];
                        foreach ($buynow_list_item as $item) :
                            if (content_exists($item)) :
                        ?>
                                <div class="swiper-slide d-2">
                                    <?php
                                    // kiểm tra nút mua ngay
                                    $button = $item['item_button'];
                                    ?>
                                    <a href="<?php echo (!empty($button['button_url'])) ? esc_url($button['button_url']) : 'javascript:;'; ?>" class="buysec-item d-item">
                                        <div class="buysec-item-wrap">
                                            <span class="buysec-item-img">
                                                <?php echo wp_get_attachment_image($item['item_img'], 'image-medium-square'); ?>
                                            </span>

                                            <div class="buysec-item-content">
                                                <div class="buysec-item-name" data-aos="fade-up" data-aos-delay="100">
                                                    <?php echo $item['item_name']; ?>
                                                </div>
                                                <span class="buysec-item-numof" data-aos="fade-up" data-aos-delay="300">
                                                    <?php echo $item['item_text']; ?>
                                                </span>
                                                <span class="btn" data-aos="fade-up" data-aos-delay="500">
                                                    <span class="btn-inner"><?php echo $button['button_text']; ?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php endif;
                        endforeach; ?>
                    </div>
                </div>

                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
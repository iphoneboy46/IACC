<?php

/**
 * Section name: Home - Săn Figure trên Tiktok
 * Description: 
 * Author: Monamedia
 * Order: 1
 */
?>
<div id="<?php echo $args['id'] ?>" class="<?php echo $args['classes'] ?> join section pos-relative">
    <div class="scrolld-btn">
        <spa class="icon">
            <img src="<?php echo get_site_url() ?>/template/assets/images/arrow-down.svg" alt="">
        </spa>
        <div class="scrolld-btn-inner emblemJS">Kéo xuống - Kéo xuống - Kéo xuống - Kéo xuống - Kéo xuống - </div>
    </div>
    <div class="container">
        <div class="join-wrap d-wrap">
            <?php $mona_home_section_tiktok = get_field('mona_home_section_tiktok'); ?>
            <div class="join-left d-item">
                <div class="join-content">
                    <h2 class="t-title fw-6 mb-32" data-aos="fade-up" data-aos-delay="100">
                        <?php echo $mona_home_section_tiktok['tiktok_title']; ?>
                    </h2>
                    <div class="desc mb-40" data-aos="fade-up" data-aos-delay="300">
                        <?php echo $mona_home_section_tiktok['tiktok_desc']; ?>
                    </div>
                    <?php
                    // kiểm tra nút xem thêm
                    $tiktok_button = $mona_home_section_tiktok['tiktok_button'];
                    if (content_exists($tiktok_button)) :
                    ?>
                        <a href="<?php echo (!empty($tiktok_button['button_url'])) ? esc_url($tiktok_button['button_url']) : 'javascript:;'; ?>" class="btn" data-aos="fade-up" data-aos-delay="600">
                            <span class="btn-inner"><?php echo $tiktok_button['button_text']; ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="join-right d-item">
                <div class="join-sc free-slide d-wrap">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php $delay=100;
                            foreach ($mona_home_section_tiktok['tiktok_list_item'] as $item) :
                                if (!empty($item['item_img'])) :
                                ?>
                                    <div class="swiper-slide d-2">
                                        <div class="join-item d-item">
                                            <div class="join-item-wrap">
                                                <div class="join-item-img">
                                                    <?php echo wp_get_attachment_image($item['item_img'], 'image-medium-square'); ?>
                                                </div>
                                                <p class="join-item-text text-center"><?php echo $item['item_text']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
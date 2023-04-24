<?php

/**
 * Section name: Thư viện ảnh
 * Description: 
 * Author: Monamedia
 * Order: 7
 */
?>
<div id="<?php echo $args['id'] ?>" class="<?php echo $args['classes'] ?> glr section-2">
    <div class="container">
        <div class="glr-wrap">
            <?php $mona_home_section_gallery = get_field('mona_home_section_gallery'); ?>
            <h2 class="t-title fw-6 text-center mb-40 text-effect"><?php echo $mona_home_section_gallery['gallery_title'] ?></h2>

            <div class="glr-sl gallery free-slide pos-relative d-wrap">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php
                        $delay=300;
                        $gallery_ids = $mona_home_section_gallery['gallery_ids'];
                        if ($gallery_ids) :
                            // Cắt mảng: mỗi mảng chứa số ảnh nhất định
                            $img_per_page = 6;
                            $gallery_pages = array_chunk($gallery_ids, $img_per_page);

                            // Lấy ảnh
                            $count = 0;
                            foreach ($gallery_pages as $page) :
                                
                                ?>
                                <div class="swiper-slide">
                                    <div class="glr-grid">
                                        <?php foreach ($page as $img_id) : ?>
                                            <div class="glr-item d-item <?php if ($count == 0) echo "h-2 hehehe";
                                                                        if ($count == $img_per_page - 1) echo "w-2"; ?>"   data-aos="zoom-in" data-aos-delay="<?php echo $delay; ?>">
                                                <div class="glr-item-wrap">
                                                    <div class="img-inner gItem" data-src="<?php echo wp_get_attachment_image_url($img_id, 'banner-mobile-image'); ?>">
                                                        <?php echo wp_get_attachment_image($img_id, 'banner-mobile-image'); ?>
                                                        <span class="content">
                                                            <span class="icon">
                                                                <img src="<?php echo get_site_url() ?>/template/assets/images/zoom-icon.jpg" alt="">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $delay+=300; $count++; endforeach; ?>
                                    </div>
                                </div>
                                <?php 
                            endforeach;
                        endif; ?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
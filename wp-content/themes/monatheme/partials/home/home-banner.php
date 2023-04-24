<?php

/**
 * Section name: Home Banner
 * Description: 
 * Author: Monamedia
 * Order: 0
 */
?>
<div id="<?php echo $args['id'] ?>" class="<?php echo $args['classes'] ?> bn bn-home sec-decor other">
    <div class="container">
        <div class="bn-wrap d-wrap">
            <?php $mona_home_section_banner = get_field('mona_home_section_banner'); ?>
            <div class="bn-left d-item d-2">
                <div class="bn-content">
                    <p class="t-stroke t-title-xl fw-6 bn-txt-big text-effect"><?php echo $mona_home_section_banner['banner_subtitle']; ?></p>
                    <h1 class="t-title-bn mb-20" data-aos="fade-up" data-aos-delay="500"><?php echo $mona_home_section_banner['banner_title']; ?></h1>
                    <div class="bn-text mb-40" data-aos="fade-up" data-aos-delay="700">
                        <?php echo $mona_home_section_banner['banner_desc']; ?>
                    </div>
                    <?php
                    // kiểm tra nút xem thêm
                    $banner_button = $mona_home_section_banner['banner_button'];
                    if (content_exists($banner_button)) :
                    ?>
                        <a href="<?php echo (!empty($banner_button['button_url'])) ? esc_url($banner_button['button_url']) : 'javascript:;'; ?>" class="btn bg-white t-third"  data-aos="fade-up" data-aos-delay="900">
                            <span class="btn-inner"><?php echo $banner_button['button_text']; ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="bn-right d-item d-2">
                <div class="bn-img" data-aos="fade-left">
                    <div class="img-inner">
                        <?php
                        // Lấy và kiểm tra hình ảnh banner
                        $banner_desk_img = $mona_home_section_banner['banner_desk_img'];
                        $banner_mobile_img = $mona_home_section_banner['banner_mobile_img'];

                        if (wp_is_mobile() && !empty($banner_mobile_img)) {
                            echo wp_get_attachment_image($banner_mobile_img, 'banner-mobile-image');
                        } else if (!wp_is_mobile() && !empty($banner_desk_img)) {
                            echo wp_get_attachment_image($banner_desk_img, 'banner-desktop-image');
                        } else {
                            echo '<img src="' .  get_template_directory_uri() . '/public/helpers/images/banner-default-min.png" alt="" />';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

/**
 * Section name: Home Banner phụ
 * Description: 
 * Author: Monamedia
 * Order: 6
 */
?>
<div id="<?php echo $args['id'] ?>" class="<?php echo $args['classes'] ?> banner-main">
    <?php
    $mona_home_section_banner2 = get_field('mona_home_section_banner2');
    // Lấy và kiểm tra hình ảnh banner
    $banner_desk_img = $mona_home_section_banner2['banner2_desk_img'];
    $banner_mobile_img = $mona_home_section_banner2['banner2_mobile_img'];

    if (wp_is_mobile() && !empty($banner_mobile_img)) {
        echo wp_get_attachment_image($banner_mobile_img, 'banner-mobile-image');
    } else if (!wp_is_mobile() && !empty($banner_desk_img)) {
        echo wp_get_attachment_image($banner_desk_img, 'banner-desktop-image');
    } else {
        echo '<img src="' .  get_template_directory_uri() . '/public/helpers/images/banner-default-min.png" alt="" />';
    }
    ?>
</div>
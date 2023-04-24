<?php
/**
 * Section name: Section Pledge Global
 * Description: Lời cam kết
 * Author: Monamedia
 * Order: 0
 */
?>
<div class="container">
    <div class="ser-wrap pos-relative">
        <div class="ser-list d-wrap flex-jc-between">
            <?php $delay=100;
            $mona_home_section_pledge = get_field('mona_home_section_pledge', MONA_PAGE_HOME);
            foreach ($mona_home_section_pledge['pledge_list_item'] as $item) :
                if (content_exists($item)) :
            ?>
                    <div class="ser-item d-item" data-aos="zoom-in" data-aos-delay="<?php echo $delay; ?>">
                        <div class="ser-item-wrap">
                            <div class="ser-item-icon">
                                <?php echo wp_get_attachment_image($item['item_icon'], 'image-small-square'); ?>
                            </div>

                            <div class="ser-item-content">
                                <p class="ser-item-tit"><?php echo $item['item_title']; ?></p>
                                <p class="ser-item-desc"><?php echo $item['item_desc']; ?></p>
                            </div>
                        </div>
                    </div>
            <?php $delay+=300;
                endif;
            endforeach;
            ?>
        </div>
    </div>
</div>
<?php

/**
 * Section name: Lời cam kết
 * Description: 
 * Author: Monamedia
 * Order: 4
 */
?>
<div id="<?php echo $args['id'] ?>" class="<?php echo $args['classes'] ?> ser sec-decor">
    <?php
    /**
     * GET TEMPLATE PART
     * Section pledge
     */
    $slug = '/partials/global/section-pledge';
    echo get_template_part($slug);
    ?>
</div>
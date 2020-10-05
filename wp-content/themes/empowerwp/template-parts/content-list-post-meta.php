<?php
if (!apply_filters('mesmerize_show_post_meta', true)) {
    return;
}

?>
<div class="post-meta small muted space-bottom-small">
    <span class="date"><?php @the_field('periode'); ?></span>
</div>

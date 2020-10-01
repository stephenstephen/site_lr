<?php
if (!apply_filters('mesmerize_show_post_meta', true)) {
    return;
}
?>

<div class="row post-meta small">
    <div class="col-sm-12 text-left">

        <!-- <ul class="is-bar">
            <li><?php esc_html_e('by', 'empowerwp'); ?> <?php the_author_posts_link(); ?></li>
            <li><?php esc_html_e('on', 'empowerwp'); ?> <?php the_time(get_option('date_format')); ?></li>
        </ul> -->

        <ul class="is-bar" style="color: #8E9DAE;">
            <i>
                <li><strong class="title-blue-color">Nom du client:</strong> <?php @the_field('nom_du_client'); ?></li> <br> <br> 
                <li><strong class="title-blue-color">Pays:</strong> <?php @the_field('pays'); ?></li> <br> <br>  
                <li><strong class="title-blue-color">Rôle dans le mission:</strong> <?php @the_field('role_dans_le_mission'); ?></li> <br> <br>  
                <li><strong class="title-blue-color">Période:</strong> <?php @the_field('periode'); ?></li> <br> <br>  
                <li><strong class="title-blue-color">Fiche de projet:</strong>
                    <?php
                    $file = get_field('fiche_de_projet');
                    if ($file): ?>
                        <a href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a>
                    <?php endif; ?>
                </li>
            </i>
        </ul>

    </div>
    <!-- <div class="col-sm-2 text-right">

        <i class="font-icon-post fa fa-comment-o"></i><span><?php echo esc_html(get_comments_number()); ?></span>


    </div> -->
</div>

<div <?php echo mesmerize_footer_container( 'footer-content-lists footer-border-accent' ) ?>>
    <div <?php echo mesmerize_footer_background( 'footer-content' ) ?>>
        <div class="gridContainer">
            <div class="row">
                <div class="col-sm-12 flexbox">
                    <div class="row widgets-row">
                        <div class="col-sm-4">
							<?php
							mesmerize_print_widget( 'first_box_widgets' );
							?>
                        </div>
                        <div class="col-sm-4">
							<?php
							mesmerize_print_widget( 'second_box_widgets' );
							?>
                        </div>
                        <div class="col-sm-4">
							<?php
							mesmerize_print_widget( 'third_box_widgets' );
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div <?php echo mesmerize_footer_background( 'footer-content' ) ?>>
        <div class="gridContainer">
            <div class="row">
                <div class="col-sm-12 flexbox">
                    <div class="row widgets-row">
                        <div class="col-sm-12 text-center">
                            <div>
                                <p class="copyright">Copyright ©&nbsp;&nbsp;2020&nbsp;Land Ressources.&nbsp;</p>
                                <?php mesmerize_print_area_social_icons( 'footer', 'content', 'footer-social-icons', 5 ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * 
 * Trata as requisições de catgorias
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */
get_header();?>
<!-- Main Content-->
<main class="container my-4">
    <div class="row">
        <div class="col-md-9">
            <?php 
                if( have_posts() ):

                    echo '<div class="row">';

                    while( have_posts() ):
                        the_post();
                        
                        /**
                         * 
                         * Adiciona cards para posts
                         * 
                         */
                        wm_get_part( 'content', 'card' );
                    endwhile;

                    echo '</div>';
                    
                endif;
            ?>
        </div>
        <?php get_sidebar();?>
    </div>
    
</main>
<!-- #Main Content -->
<?php get_footer();

<?php
/**
 * 
 * Modelo padrão para criação dinâmica de páginas
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */
get_header();?>
<!-- Main Content -->
<main class="container-fluid px-0">
    <?php 
        if( have_posts() ):
            while( have_posts() ):
                the_post();
                the_content();
            endwhile;
        else:
            wm_get_part( 'content', 'none' );
        endif;?>
</main>
<!-- #Main Content -->
<?php get_footer();

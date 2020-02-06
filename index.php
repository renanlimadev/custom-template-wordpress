<?php 
/**
 * 
 * Chamada ao blog, também serve como substituto para todas as requisições do Wordpress
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */
get_header();?>
<!-- Main Content -->
<main class="container-fluid my-4">
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-9">
            <?php 
                if( have_posts() ):
                    echo '<h2 class="title-blog text-center font-weight-bold pb-5">Leia os artigos desta semana.</h2>';

                    echo '<div class="row">';
                    while( have_posts() ):
                        the_post();
                        /**
                         * 
                         * Adiciona card para posts
                         * 
                         */
                        wm_get_part( 'content', 'card' );
                    endwhile;
                    echo '</div>';
                else:
                    wm_get_part( 'content', 'none' );
                endif;
            ?>
            </div>
            <?php get_sidebar();?>
        </div>
    </div>
</main>
<!-- Main Content -->
<?php get_footer();

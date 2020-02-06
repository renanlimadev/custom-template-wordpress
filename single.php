<?php
/**
 * 
 * Trata a requisição dos posts temporais
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */
get_header();?>
<!-- Main Content -->
<main class="container my-4">
    <div class="row">
        <div class="col-md-9">
            <?php 
                if( have_posts() ):
                    while( have_posts() ):
                        the_post();

                        the_content();
                        
                        /**
                         * 
                         * Chama o modelo padrão de comentários
                         * 
                         */
                        if( comments_open() || get_comments_number() ):
                            comments_template();
                        endif;

                    endwhile;
                else:
                    wm_get_part( 'content', 'none' );
                endif;
            ?>
        </div>
        <?php get_sidebar();?>
    </div>
</main>
<!-- #Main Content -->
<?php get_footer();

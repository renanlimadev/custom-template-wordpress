<?php
/**
 * 
 * Trata requisições de erro 404
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */


/**
 * 
 * Usando a url para encadear uma busca por termos semelhantes internamente
 * 
 */
$last_url           = $_SERVER["REQUEST_URI"];

$first_replace      = str_replace( '/', ' ', $last_url );

$prepared_query     = str_replace( '-', ' ', $first_replace );

$pursuit_url        = new WP_Query( $prepared_query );

$total_found_posts  = $pursuit_url->found_posts;

get_header();?>
<!-- Main Content -->
<main class="container my-4">
    <div class="row">
        <div class="col-md-9">
            <?php 
                
                /**
                 * 
                 * Loop para a pesquisa
                 * 
                 */
                if( $pursuit_url->have_posts() ):
                    
                    echo '<h2 class="warning-found text-center pt-3 pb-5 font-weight-bold">Encontramos alguns assuntos relacionados ao seu link</h2>';
                    
                    echo '<div class="row">';

                    while( $pursuit_url->have_posts() ):

                        $pursuit_url->the_post();
                        
                        /**
                         * 
                         * Adiciona card para os posts
                         * 
                         */
                        wm_get_part( 'content', 'card' );
                    endwhile;

                    echo '</div>';
                else:

                    echo '<h2 class="warning-found text-center pt-3 pb-5 font-weight-bold">Desculpe, mas não encontramos nada semelhante ao seu link.</h2>';

                endif;
            ?> 
        </div>
        <?php get_sidebar();?>
    </div>
</main>
<!-- #Main Content -->
<?php get_footer();

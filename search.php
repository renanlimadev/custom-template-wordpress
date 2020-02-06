<?php
/**
 * 
 * Trata as requisições de busca
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */

/**
 * 
 * Preservando os dados de pesquisa
 * 
 */
$query_search = get_search_query();

$search_term = array( 's' => $query_search );

$object_search = new WP_Query( $search_term );

$number_results = $object_search->found_posts;

get_header();?>
<!-- Main Content -->
<main class="container my-4">
    <div class="row">
        <div class="col-md-9">
            <?php 

                /**
                 * 
                 * Imprimindo o título, segundo os resutados
                 * 
                 */
                if( $number_results == 0 ):
                    printf( '<h3 class="title-results pt-3 pb-5 text-center font-weight-bold">Desculpe, mas não há resultado para %s...<br/>Mas não desanime, continue pesquisando!</h3>', $query_search );
                    
                elseif( $number_results == 1 ):
                    printf( '<h3 class="title-results pt-3 pb-5 text-center font-weight-bold">Foi encontrado 1 resultado para %s.</h3>', $query_search );
                else:
                    echo '<h3 class="title-results pt-3 pb-5 text-center font-weight-bold">Foram encontrados ', $number_results. ' para '. $query_search. '</h3>';
                endif;

                /**
                 * 
                 * Loop para os resultdos
                 * 
                 */
                if( $object_search->have_posts() ):

                    echo '<div class="row">';

                    while( $object_search->have_posts() ):
                        $object_search->the_post();

                        /**
                         * 
                         * Adiciona card para posts
                         * 
                         */
                        wm_get_part( 'content', 'card' );
                        
                    endwhile;

                    echo '</div>';
                    
                else:
                    /**
                     * 
                     * Mensagem de erro na busca
                     * 
                     */
                    echo '<h2 class="">Nenhum resultado encontrado :(</h2>';
                endif;
            ?>
        </div>
        <?php get_sidebar();?>
    </div>   
</main>
<!-- #Main Content -->
<?php get_footer();

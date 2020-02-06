<?php
/**
 * 
 * Ativa mudanças no core do Wordpress, cuidado ao fazer alterações neste arquivo!
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */

/**
 * Registrando o caminho
 */
$wm_path = get_template_directory();

/**
 * Chamando os arquivos adicionais
 * 
 */
require_once $wm_path. '/inc/func/default.php';

require_once $wm_path. '/inc/post-types/social-navbar.php';

require_once $wm_path. '/inc/meta-boxes/social-metabox.php';

/**
 * 
 * Suporte para miniaturas
 *  
 */
add_theme_support( 'post-thumbnails' );
/**
 * 
 * Suporte para Feed
 * 
 */
add_theme_support( 'automatic-feed-links' );
/**
 * 
 * Suporte para formatos de post
 * 
 */
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
/**
 * 
 * Suporte para descrição
 * 
 */
add_post_type_support( 'page', 'excerpt' );
/**
 * 
 * Suporte para formulários
 * 
 */ 
add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
/**
 * 
 * Suporte para a meta Title
 * 
 */
add_theme_support('title-tag');
/**
 * 
 * Desativa meta tags que geram insegurança
 * 
 */
function disable_metatags()
{
    remove_action('wp_head', 'wp_generator') ;
    remove_action('wp_head', 'wlwmanifest_link') ;
    remove_action('wp_head', 'rsd_link') ;
}

add_action('init', 'disable_metatags');

/**
 * 
 * Limita o número de caracteres do resumo
 * 
 */
function get_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 90);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	return $excerpt;
}

/**
 * 
 * Função que retorna a lista de comentários
 * 
 */
function wm_comment_list($comment, $args, $depth)
{
    $GLOBALS[ 'comment' ]     = $comment;
    $GLOBALS['comment_depth'] = $depth;

    printf('<div id="comment-%s">', get_comment_id());?>
        <div <?php comment_class('card bg-light border-0 w-75 my-3');?>>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <?php echo get_avatar($comment, 56, '', '', array('class' => 'border border-light rounded-circle comment-avatar'));?>
                    </div>
                    <div class="col-md-10">
                        <p class="card-subtitle text-muted py-1"><?php echo 'Publicado em '. get_comment_date( 'j \d\e F \d\e Y' ). ' às '. get_comment_time('G:i');?></p>
                        <div class="comment-text">
                            <p class="card-text">
                                <span class="text-info">
                                    <?php echo get_comment_author();?>
                                </span>
                            </p>
                            <?php comment_text();?>
                        </div>
                        <?php comment_reply_link( 
                                        array_merge( $args, 
                                            array( 
                                                'reply_text' => 'Responder',
                                                'depth'     => $depth, 
                                                'max_depth' => $args[ 'max_depth' ] 
                                            ) 
                                        ) 
                                    );?>
                    </div>
                </div>
            </div>
        </div>
<?php }

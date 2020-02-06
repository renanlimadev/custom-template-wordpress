<?php
/**
 * 
 * Caixas Meta para Post Type de redes sociais
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */

function wm_social_metabox()
{
    add_meta_box( 'social_media_menu', 'Menu para redes sociais', 'add_social_items', 'social-media', 'advanced', 'high' );
}

add_action( 'add_meta_boxes', 'wm_social_metabox' );

/**
 * 
 * Renderizando as caixas
 * 
 */
function add_social_items()
{
    global $post;
    /**
     * 
     * Recuperando a identificação da postagem
     * 
     */
    $id_of_post = get_post_custom( $post->ID );
    
    /**
     * 
     * Validando os dados para o campo select
     * 
     */
    $social_icon = isset( $id_of_post[ 'social-select' ] ) ? esc_attr( $id_of_post[ 'social-select' ][ 0 ] ) : '' ;

    /**
     * 
     * Validando os dados do campo de texto
     * 
     */
    $social_link = isset( $id_of_post[ 'link-social-media' ] ) ? esc_url( $id_of_post[ 'link-social-media' ][ 0 ] ) : '' ;

    /**
     * 
     * Protegendo os dados recebidos
     * 
     */
    wp_nonce_field( 'nonce_social_medias', 'wm_social_nonce' );
    
    ?>
    <form class="form-field">
        <!-- Seletor de Rede Social -->
        <br/>
        <label for="social-select">Escolha uma Rede Social </label>
        <select name="social-select" class="salect-default" id="select-social-media">
            <option class="opt-social" value="fab fa-facebook" <?php selected( $social_icon, 'fab fa-facebook' );?>>Facebook</option>
            <option class="opt-social" value="fab fa-instagram" <?php selected( $social_icon, 'fab fa-instagram' );?>>Instagram</option>
            <option class="opt-social" value="fab fa-youtube" <?php selected( $social_icon, 'fab fa-youtube' );?>>Youtube</option>
            <option class="opt-social" value="fab fa-twitter" <?php selected( $social_icon, 'fab fa-twitter' );?>>Twitter</option>
            <option class="opt-social" value="fab fa-whatsapp" <?php selected( $social_icon, 'fab fa-whatsapp' );?>>Whatsapp</option>
            <option class="opt-social" value="fab fa-linkedin-in" <?php selected( $social_icon, 'fab fa-linkedin-in' );?>>Linkdin</option>
            <option class="opt-social" value="fab fa-google-plus-g" <?php selected( $social_icon, 'fab fa-google-plus-g' );?>>Google+</option>
            <option class="opt-social" value="fab fa-snapchat" <?php selected( $social_icon, 'fab fa-snapchat' );?>>Snapchat</option>
            <option class="opt-social" value="fab fa-pinterest" <?php selected( $social_icon, 'fab fa-pinterest' );?>>Pinterest</option>
            <option class="opt-social" value="fab fa-behance" <?php selected( $social_icon, 'fab fa-behance' );?>>Behance</option>
            <option class="opt-social" value="fab fa-slack" <?php selected( $social_icon, 'fab fa-slack' );?>>Slack</option>
            <option class="opt-social" value="fab fa-github" <?php selected( $social_icon, 'fab fa-github' );?>>Github</option>
            <option class="opt-social" value="fab fa-stack-overflow" <?php selected( $social_icon, 'fab fa-stack-overflow' );?>>Stack Overflow</option>
            <option class="opt-social" value="fab fa-telegram-plane" <?php selected( $social_icon, 'fab fa-telegram-plane' );?>>Telegram</option>
            <option class="opt-social" value="fab fa-flickr" <?php selected( $social_icon, 'fab fa-flickr' );?>>Flickr</option>
            <option class="opt-social" value="fab fa-reddit-alien" <?php selected( $social_icon, 'fab fa-reddit-alien' );?>>Reddit</option>
        </select>
        <!-- #Seletor de Rede Social -->
        <!-- Input para os links -->
        <label for="link-social-media">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Link de Destino </label>
        <input type="text" name="link-social-media" placeholder="Digite o link" size="45" aria-required="true"/><br/><br/>
        <!-- #Input para os links -->
    </form><?php 
}

/**
 * 
 * Salva os dados recebidos da Meta Box para redes sociais
 * 
 */
function save_social_metabox( $post_id )
{
    /**
     * 
     * Verifica se os dados estão sendo salvos automaticamente
     * 
     */
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ):
        return;
    endif;

    /**
     * 
     * Verifica se os dados passaram pelo prodedimento de segurnça wp_nonce
     * 
     */
    if( !isset( $_POST[ 'wm_social_nonce' ] ) || !wp_verify_nonce( $_POST[ 'wm_social_nonce' ], 'nonce_social_medias' ) ):
        return;
    endif;

    /**
     * 
     * Verifica se o usuário tem as permissões necessárias para executar a ação
     * 
     */
    if( !current_user_can( 'edit_post', $post_id ) ):
        return;
    endif;

    /**
     * 
     * Salva os dados do select, se foi definido
     * 
     */
    if( isset( $_POST[ 'social-select' ] ) ):
        update_post_meta( $post_id, 'social-select', esc_attr( $_POST[ 'social-select' ] ) );
    endif;

    /**
     * 
     * Salva os dados do Input, se foi definido
     * 
     */
    if( isset( $_POST[ 'link-social-media' ] ) ):
        update_post_meta( $post_id, 'link-social-media', esc_url( $_POST[ 'link-social-media' ] ) );
    endif;
}

add_action( 'save_post', 'save_social_metabox' );

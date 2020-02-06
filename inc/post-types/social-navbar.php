<?php
/**
 * 
 * Post Type customizado para criar um menu dinâmico e intuitivo para redes sociais 
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */

function wm_social_post_type()
{
    /**
     * 
     * Declaração de Labels
     * 
     */
    $labels = array(
        'name'               => _x( 'Redes Sociais', 'wm-template' ),
        'singular_name'      => _x( 'Rede Social', 'wm-template' ),
        'menu_name'          => __( 'Redes Sociais', 'wm-template' ),
        'parent_item_colon'  => '',
        'all_items'          => __( 'Lista Completa', 'wm-template' ),
        'view_item'          => __( 'Visualizar', 'wm-template' ),
        'add_new_item'       => __( 'Adicionar Nova Rede Social', 'wm-template' ),
        'add_new'            => __( 'Adicionar Nova', 'wm-template' ),
        'edit_item'          => __( 'Editar', 'wm-template' ),
        'update_item'        => __( 'Atualizar', 'wm-template' ),
        'search_items'       => __( 'Procurar Redes Ativas', 'wm-template' ),
        'not_found'          => __( 'Nenhuma Rede Social foi Encontrada', 'wm-template' ),
        'not_found_in_trash' => __( 'Nunhuma Rede foi Encontrada na Lixeira', 'wm-template' )
    );

    /**
     * 
     * Declaração de Args
     * 
     */
    $args = array(
        'label'                => __( 'social-media', 'wm-template' ),
        'labels'               => $labels,
        'description'          => __( 'Menu para Redes Sociais', 'wm-template' ),
        'supports'             => array( 'title', 'revisions' ),
        'taxonomies'           => array(),
        'hierarchical'         => false,
        'show_ui'              => true,
        'query_var'            => true,
        'rewrite'              => true,
        'show_in_menu'         => true,
        'show_in_admin_bar'    => true,
        'menu_position'        => 10,
        'register_meta_box_cb' => 'wm_social_metabox', // Função para as caixas especiais meta
        'menu_icon'            => 'dashicons-share',
        'can_export'           => true,
        'has_archive'          => true,
        'capability_type'      => 'post'
    );

    /**
     * 
     * Registra o tipo de postagem customizada
     * 
     */
    register_post_type( 'social-media', $args );

    /**
     * 
     * altera as regras de escrita
     * 
     */
    flush_rewrite_rules();
}

add_action( 'init', 'wm_social_post_type', 110 );

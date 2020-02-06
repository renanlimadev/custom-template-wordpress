<?php
/**
 * 
 * Funções próprias do template
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */

/**
 * 
 * Seleciona o hero de acordo com a página
 * 
 */
function wm_select_hero()
{
    // Print the atual hero for a page type
    if( is_home() ):
        wm_get_part( 'hero', 'blog' );
    elseif( is_front_page() ):
        wm_get_part( 'hero', 'frontpage' );
    elseif( is_page() ):
        wm_get_part( 'hero', 'page' );
    elseif( is_category() ):
        wm_get_part( 'hero', 'category' );
    elseif( is_archive() ):
        wm_get_part( 'hero', 'archive' );
    elseif( is_search() ):
        wm_get_part( 'hero', 'search' );
    elseif( is_singular() ):
        wm_get_part( 'hero', 'single' );
    elseif( is_404() ):
        wm_get_part( 'hero', '404' );
    endif;
}

/**
 * 
 * Chama o menu de navegação atual
 * 
 */
function wm_print_navbar( $term )
{
    get_template_part( 'template-parts/navbars/navbar', $term );
}

/**
 * 
 * Envia a classe para o header de acordo com a página
 * 
 */
function wm_header_class( $class )
{
    if( is_home() ):
        echo 'class="blog-header '. $class. '"';
    elseif( is_front_page() ):
        echo 'class="frontpage-header '. $class. '"';
    elseif( is_page() ):
        echo 'class="page-header '. $class. '"';
    elseif( is_category() || is_archive() ):
        echo 'class="archive-header '. $class. '"';
    elseif( is_search() ):
        echo 'class="search-header '. $class. '"';
    elseif( is_singular() ):
        echo 'class="post-header '. $class. '"';
    elseif( is_404() ):
        echo 'class="error-header '. $class. '"';
    endif;
}

/**
 * 
 * Imprime o menu de navegação requisitado
 * 
 */
function wm_get_menu( $menu )
{
    /**
     * 
     * Cria uma condicional para classes específicas
     * 
     */
    if( $menu == 'top' ):
        $classes_navbar = 'navbar-nav align-items-center ml-auto navbar-'. $menu;
    elseif( $menu == 'right' ):
        $classes_navbar = 'nav flex-column mobile-center navbar-'. $menu;
    else:
        $classes_navbar = null;
    endif;

    /**
     * 
     * Chama a lista de navegação via Hook do Wordpress
     * 
     */
    wp_nav_menu(
        $args = array(
            'theme_location' => $menu,
            'container'      => false,
            'menu_class'     => $classes_navbar,
            'menu_id'        => $menu,
            'fallback_cb'    => false
        )
    );
}

/**
 * 
 * Chama partes dos templates
 * 
 */
function wm_get_part( $slug, $term )
{
    get_template_part( 'template-parts/'. $slug. 's/'. $slug, $term );
}

/**
 * 
 * Chama o formulário de busca
 * 
 */
function wm_get_searchform()
{
    get_search_form();
}

/**
 * 
 * Cria a lista dinâmica de redes sociais
 * 
 * @since 1.0.0
 * 
 */
function wm_social_navigation()
{
    /**
     * 
     * Atribuindo o valor de postagem customizada
     * 
     */
    $social_post_type = array(
        'post_type'     => 'social-media',
        'post_per_page' => 10
    );

    /**
     * 
     * Cria o objeto para o Loop
     * 
     */
    $social_medias = new WP_Query( $social_post_type );

    if( $social_medias->have_posts() ):

        echo '<ul class="nav justify-content-center social-navbar pt-3" id="social-menu">';

        while( $social_medias->have_posts() ):
            $social_medias->the_post();
            /**
             * 
             * Cria o container para os atributos
             * 
             */
            echo '<li class="nav-item"><a target="_blank" class="nav-link" href="'. get_post_meta( get_the_ID(), "link-social-media", true ). '"><i class="'. get_post_meta( get_the_ID(), "social-select", true ). '"></i></a></li>';
        endwhile;

        echo '</ul>';

    else:

        echo '<h5 class="social-info text-white pt-3">Sem Redes sociais cadastradas</h5>';
        
    endif;
}

/**
 * 
 * Retorna os arquivos js e css para todas as páginas
 *
 */
  function wm_scripts()
{
    
    wp_enqueue_script('jQuerySlim', get_template_directory_uri(). '/assets/js/jquery.slim.min.js', array(), '1.0.0', false);

    wp_enqueue_script('bootstrapJs', get_template_directory_uri(). '/assets/js/bootstrap.min.js', array(), '1.0.0', false);


    wp_enqueue_script('wmCustomScripts', get_template_directory_uri(). '/assets/js/wm-custom-script.js', array(), '1.0.0', false);

    wp_enqueue_script('fontAwesomeJs', get_template_directory_uri(). '/assets/js/fontawesome.min.js', array(), '1.0.0', true);

    wp_enqueue_script('popperJs', get_template_directory_uri(). '/assets/js/popper.min.js', array(), '1.0.0', true);

    wp_enqueue_style('bootstrapCss', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '1.0.0', 'all');

    wp_enqueue_style('wmCustomCss', get_template_directory_uri().'/assets/css/wm-custom-style.css', array(), '1.0.0', 'all');

    wp_enqueue_style('fontAwesomeAllFontsCss', get_template_directory_uri().'/assets/css/all.min.css', array(), '1.0.0', 'all');

    wp_enqueue_style('fontAwesomeCss', get_template_directory_uri().'/assets/css/fontawesome.min.css', array(), '1.0.0', 'all');
}

add_action('wp_enqueue_scripts', 'wm_scripts');

/**
 * 
 * Chamada ao Favicon, tanto para o explorer, quanto para os outros navegadores
 * 
 */
function wm_favicon()
{
	echo '<link rel="apple-touch-icon" sizes="180x180" href="'. get_template_directory_uri(). '/assets/icons/apple-touch-icon.png">
          <link rel="icon" type="image/png" sizes="32x32" href="'. get_template_directory_uri(). '/assets/icons/favicon-32x32.png">
          <link rel="icon" type="image/png" sizes="16x16" href="'. get_template_directory_uri(). '/assets/icons/favicon-16x16.png">
          <link rel="manifest" href="'. get_template_directory_uri(). '/assets/icons/site.webmanifest">';
}

add_action( 'wp_head', 'wm_favicon' );

/**
 * 
 * Ativa as listas de navegação
 * 
 */
function wm_register_menus()
{
    register_nav_menus(
        $args = array(
            'top'     => __( 'Menu Principal' ),
            'right'   => __( 'Menu Lateral' )
        )
    );
}

add_action( 'init', 'wm_register_menus' );

/**
 * 
 * Adiciona classes aos itens de menus
 * 
 */
function wm_list_items( $classes, $item, $args )
{
    $classes[] = 'nav-item';
 
    return $classes;
}

add_filter( 'nav_menu_css_class', 'wm_list_items', 10, 3 );

/**
 * 
 * Adiciona classes aos links de menus
 * 
 */
function wm_list_links( $atts, $item, $args )
{
    $atts[ 'class' ] = 'nav-link';
 
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'wm_list_links', 10, 3 );

/**
 * 
 * Adiciona classes ao item ativo
 * 
 */
function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes) ){
      $classes[] = 'active ';
    }
    return $classes;
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

/**
 * 
 * Retorna css para o admin panel
 * 
 */

function custom_admin_css()
{
	echo '<link rel="stylesheet" type="text/css" href="'. get_template_directory_uri(). '/assets/css/admin.css"/>';
}

add_action( 'login_head', 'custom_admin_css' );

/**
 * 
 * Redireciona o link do título
 * 
 */
function admin_redirect()
{
	return get_bloginfo( 'url' );
}

add_filter( 'login_headerurl', 'admin_redirect' );

/**
 * 
 * Modifica o título
 * 
 */
function admin_title()
{
	return 'Visualizar Site';
}

add_filter( 'login_headertext', 'admin_title' );

/**
 * 
 * Modificando campo de texto de rodapé
 * 
 */
function admin_footer()
{
	echo '<a style="text-decoration: none;" href="https://renandev.com.br"><span style="font-size: 11pt; font-family: arial sans-serif;">&#10140; Criado com carinho por Renan Delgado de Lima.</span></a>';
}

add_filter( 'admin_footer_text', 'admin_footer' );

/**
 * 
 * Remove a logo do admin panel
 * 
 */
function remove_logo_dash( $wp_admin_bar )
{
	$wp_admin_bar->remove_node( 'wp-logo' );
}

add_action( 'admin_bar_menu', 'remove_logo_dash', 100 );

/**
 * 
 * Ativa o script de comantário dinâmico
 * 
 */
function comment_dinamic()
{
	if( ( !is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ):
		wp_enqueue_script( 'comment-reply' );
	endif;
}

add_action( 'wp_print_scripts', 'comment_dinamic' );

/**
 * 
 * Retorna a tag de rastreamento do Google analytcs
 * 
 */
function gtag_analytics()
{?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149465866-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-149465866-1');
    </script>
<?php 
}


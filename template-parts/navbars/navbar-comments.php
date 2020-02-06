<?php 
/**
 * 
 * Barra de paginação para a seção de comentários
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */

if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ):?>
<!-- Previous and Next Navigation -->
<nav class="navbar-pagination" id="pag-comments">
    <ul class="horizontal-pag">
        <li><?php previous_comments_link( 'Comentários antigos' );?></li>
        <li><?php next_comments_link( 'Comentários novos' );?></li>
    </ul>
</nav>
<!-- #Previous and Next Navigation --><?php 
endif;

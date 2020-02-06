<?php
/**
 * 
 * 
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */?>
<!-- Right Container -->
<div class="col-md-3 mt-5 mobile-center" id="nav-right">
    <?php 
    /**
     * 
     * Chamada ao formulário de busca
     * 
     */
    wm_get_searchform();

    echo   '<h2 class="title-sidebar font-weight-bold py-2">Principais assuntos</h2>';
    /**
     * 
     * Chamada ao menu de navegação lateral
     * 
     */
    wm_print_navbar( 'right' );?>
</div>
<!-- #Right Container -->

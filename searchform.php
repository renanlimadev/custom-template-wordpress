<?php
/**
 * 
 * Formulário padrão de busca
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */?>
<!-- Search Form -->
<form class="form-group py-2" method="get" action="<?php echo esc_url( home_url( '/' ) );?>" role="search">
    <input type="search" class="form-control" name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Procurando algo?', 'wm-template' ); ?>"/>  
</form>
<!-- #Search Form -->

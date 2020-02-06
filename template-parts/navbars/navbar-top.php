<?php
/**
 * 
 * Menu de navegação para o topo
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */?>
<!-- Main Navigation -->
<nav class="navbar navbar-expand-md fixed-top nav-transparent nav-mobile" id="nav-top">
    <div class="container px-0">
        <a class="navbar-brand logo-size light-logo logo-mobile" id="logo-top" href="<?php echo esc_url(home_url('/'));?>" role="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse text-uppercase font-weight-normal" id="conteudoNavbarSuportado">
            <?php wm_get_menu('top');?>
        </div>
    </div>
</nav>
<!-- #Main Navigation -->

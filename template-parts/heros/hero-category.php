<?php
/**
 * 
 * Hero para a página de categorias
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */?>
<!-- Category Hero -->
<div class="container text-center py-5 text-white" id="category-hero">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <?php the_archive_title( '<h1 clas="title-header font-weight-bold">', '</h1>' );?>
        </div>
        <div class="col-2"></div>
    </div>
    <?php 
        /**
         * 
         * Elementos de título e descrição
         * 
         */
        

        the_archive_description( '<p class="description-header px-4">', '</p>' );?>
</div>
<!-- #Category Hero -->

<?php
/**
 * 
 * Cards para posts
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */?>
<div class="col-md-1"></div>
<div class="card col-md-4 my-4 px-0 custom-card">
    <?php 
        if(has_post_thumbnail()):
            the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top']);
        else:
            echo '<img class="card-img-top" src="'. get_bloginfo('template_url'). '/assets/images/img-thumbnail.jpg" alt="Miniatura de imagem para posts"/>';
        endif;
    ?>
    <div class="card-body text-center">
        <?php 
            /**
              * 
             * Adiciona o título do post
             * 
             */
            printf('<h3 class="card-title py-2">%s</h3>', get_the_title());

            /**
             * 
             * Adiciona o subtitulo do post
             * 
             */
            printf('<h5 class="card-subtitle text-muted py-2">Públicado em %s</h5>', get_the_date('j \d\e F \d\e Y'));

            /**
             * 
             * Adiciona o trecho de texto ao post
             * 
             */
            printf('<p class="card-text py-2">%s...</p>', get_excerpt());

            /**
             * 
             * Adiciona o link de visualização do post
             * 
             */
            printf('<a class="btn btn-info" target="_blank" href="%s">Continue lendo</a>', get_the_permalink());
        ?>
    </div>
</div>
<div class="col-md-1"></div>

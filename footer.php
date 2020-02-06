<?php
/**
 * 
 * Rodapé pricipal do tema
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */?>
        <!-- Footer -->
        <footer class="container-fluid bg-footer text-white pt-4 pb-2">
            <div class="container line-up py-3">
                <div class="row text-center">
                    <div class="col-12">
                        <a class="footer-brand" href="<?php esc_url(home_url('/'));?>"><img src="<?php bloginfo('template_url');?>/assets/icons/logo-renan-branca.svg" alt="Logotipo branco para rodapé"/></a>
                    </div>
                </div>
                <div class="row text-center py-5">
                    <div class="col-12">
                        <h5 class="social-title">Me siga nas redes sociais.</h5>
                        <?php wm_social_navigation();?>
                    </div>
                </div>
                
            </div>
            <div class="container line-down border-top border-light">
                <div class="row">
                    <div class="col-12 text-center pt-3">
                        <p class="rights-letter">&copy; 2020. Todos os direitos reservados</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- #Footer -->
        <?php wp_footer();?>
    </body>
    <!-- #Body -->
</html>

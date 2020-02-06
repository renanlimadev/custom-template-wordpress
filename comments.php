<?php
/**
 * 
 * Trata as informações de comentários
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */?>
<!-- Comments Section -->
<section id="comments" class="pt-5 mt-5" itemscope itemtype="https://schema.org/Comment">
    <?php 
    /**
     * 
     * Verifica a permissão para acesso aos comentários
     * 
     */
	if( post_password_required() ):
		
		echo '<p class="text-danger">Faça login para acessar aos comentários.</p></section><!-- #Comments Section -->';

		return;

	endif;

	/**
	 * 
	 * Inicia a impressão dos comentários
	 * 
	 */
		
		/**
		 * 
		 * Imprimi o número total de comentários
		 * 
		 */
		$comments_number = get_comments_number();

		if( $comments_number == 0 ):

			echo '<p class="text-muted">Sem comentários publicados.</p>';

		elseif( $comments_number == 1 ):

			printf( '<p class="text-muted">%s Comentário publicado.</p>', $comments_number );

		else:

			printf( '<p class="text-muted">%s Comentários publicados.</p>', $comments_number );

		endif;

		/**
		 * 
		 * Chamada aos comentários
		 * 
		 */
		wp_list_comments(
			array(
				'callback'          => 'wm_comment_list',
				'reverse_top_level' => true
			)
		);

		/**
		 * 
		 * Verifica se os comentários estãos fechados
		 * 
		 */
		if( !comments_open() && post_type_supports( get_post_type(), 'comments' ) ):
			echo '<p class="text-warning">Seção de comentários fechada.</p>';
		endif;

		/**
		 * 
		 * Exibindo o formulário de comentários
		 * 
		 */
		$wm_current_commenter = wp_get_current_commenter();
    	$required_name_email  = get_option( 'require_name_email' );
    	$aria_required 	      = ( $req ? " aria-required='true'" : '' );
    	$html_required 	      = ( $req ? " required='required'" : '' );
    	$html5_support        = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : null;
    	$comment_field        = '<textarea class="form-control my-3" name="comment" id="comment" cols="40" rows="6" placeholder="Digite o seu comentário" required="required" ></textarea>';
    	$elements_field       = array(
        	'author' => '<input class="form-control my-3" id="author" name="author" placeholder="Digite o seu nome" type="text" value="' . esc_attr( $wm_current_commenter['comment_author'] ) . '" size="30"' . $aria_required . $html_required . '/>',
        	'email'  => '<input class="form-control my-3" id="email" name="email" placeholder="Digite o seu email" ' . ( $html5_support ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $wm_current_commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_required . $html_required  . '/>'
        	
    	);

		/**
		 * 
		 * Chamada aos formulários
		 * 
		 */
		comment_form(
			array(
				'comment_notes_after' => '',
				'class_form'          => 'form-group col-md-9 my-3',
				'comment_field'       => $comment_field,
				'fields'              => apply_filters( 'comment_form_default_fields', $elements_field ),
				'class_submit'        => 'btn btn-info',
				'title_reply'         => 'Escreva o seu comentário',
				'title_reply_before'  => '<h5 class="text-primary py-2">',
				'title_reply_after'   => '</h5>'
			)
		);
		
		/**
		 * 
		 * Exibindo menu de paginação
		 * 
		 */
		wm_print_navbar( 'comments' );

?>
</section>
<!-- #Comments Section -->


<?php
/**
 * 
 * Cabeçalho principal do tema
 * 
 * @package wm-template
 * 
 * @since 1.0.0
 * 
 */?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php wp_head();?>
    </head>
    <!-- Body -->
    <body class="">
        <?php wm_print_navbar( 'top' );?>
        <!-- Header -->
        <header <?php wm_header_class( 'container-fluid full-header' );?> role="banner">
            <div class="mask py-5">
                <?php wm_select_hero();?>
            </div>
        </header>
        <!-- #Header -->

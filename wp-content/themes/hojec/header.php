<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */
$args_comunicacao = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'post_parent' => 15,
    'order' => 'ASC',
    'orderby' => 'menu_order'
        ));
$array_paginas_comunicacao = array();
if ($args_comunicacao->have_posts()):
    while ($args_comunicacao->have_posts()) : $args_comunicacao->the_post();
        $array_paginas_comunicacao[] = array(
            'nome' => get_the_title(),
            'link' => get_the_permalink()
        );
    endwhile;
endif;

$explode_url_header = explode('/', $_SERVER['REQUEST_URI']);
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon.png">

        <!-- fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link
            href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <link
            href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
            rel="stylesheet">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/animate/animate.min.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/animate/custom-animate.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/fontawesome/css/all.min.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/jarallax/jarallax.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/nouislider/nouislider.min.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/nouislider/nouislider.pips.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/odometer/odometer.min.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/swiper/swiper.min.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/qutiiz-icons/style.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/tiny-slider/tiny-slider.min.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/reey-font/stylesheet.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/owl-carousel/owl.carousel.min.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/owl-carousel/owl.theme.default.min.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/bxslider/jquery.bxslider.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/vegas/vegas.min.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/jquery-ui/jquery-ui.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendors/timepicker/timePicker.css" />

        <!-- template styles -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/qutiiz.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/qutiiz-responsive.css" />
    </head>

    <body <?php body_class(); ?>>
        <div class="preloader">
            <img class="preloader__image" width="60" src="<?php echo get_template_directory_uri() ?>/assets/images/loader.png" alt="Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital" />
        </div>
        <!-- /.preloader -->
        <div class="page-wrapper">
            <header class="main-header clearfix">
                <nav class="main-menu clearfix">
                    <div class="main-menu-wrapper clearfix">
                        <div class="main-menu-wrapper__left">
                            <div class="main-menu-wrapper__logo">
                                <a href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/resources/logo-1.png" alt="Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital"></a>
                            </div>
                            <div class="main-menu-wrapper__main-menu">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                <ul class="main-menu__list">
                                    <li class="<?php
                                    if (!isset($explode_url_header[1]) || TRIM($explode_url_header[1]) === '') {
                                        echo 'current';
                                    }
                                    ?>"><a href="<?php echo home_url() ?>">Home</a></li>
                                    <li class="dropdown <?php
                                    if (isset($explode_url_header[1]) && TRIM($explode_url_header[1]) === 'hojec') {
                                        echo 'current';
                                    }
                                    ?>">
                                        <a href="<?php echo home_url() ?>/hojec">Hoje.C</a>
                                        <ul>
                                            <li>
                                                <a href="<?php echo home_url() ?>/hojec/historia">História</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo home_url() ?>/hojec/marcela-castelini">Marcela Castelini</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown <?php
                                    if (isset($explode_url_header[1]) && TRIM($explode_url_header[1]) === 'comunicacao') {
                                        echo 'current';
                                    }
                                    ?>">
                                        <a href="<?php echo home_url() ?>/comunicacao">Comunicação</a>
                                        <?php if (!empty($array_paginas_comunicacao)) { ?>
                                            <ul>
                                                <?php foreach ($array_paginas_comunicacao as $COMUNICACAO) { ?>
                                                    <li>
                                                        <a href="<?php echo $COMUNICACAO['link'] ?>"><?php echo $COMUNICACAO['nome'] ?></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                    <li class="<?php
                                    if (isset($explode_url_header[1]) && TRIM($explode_url_header[1]) === 'clientes') {
                                        echo 'current';
                                    }
                                    ?>"><a href="<?php echo home_url() ?>/clientes">Clientes</a></li>
                                    <li class="<?php
                                    if (isset($explode_url_header[1]) && TRIM($explode_url_header[1]) === 'blog') {
                                        echo 'current';
                                    }
                                    ?>"><a href="<?php echo home_url() ?>/blog">Blog</a></li>
                                    <li class="<?php
                                    if (isset($explode_url_header[1]) && TRIM($explode_url_header[1]) === 'contato') {
                                        echo 'current';
                                    }
                                    ?>"><a href="<?php echo home_url() ?>/contato">Contato</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="main-menu-wrapper__right">
                            <div class="main-menu-wrapper__call">
                                <div class="main-menu-wrapper__call-icon">
                                    <span class="icon-chatting"></span>
                                </div>
                                <div class="main-menu-wrapper__call-number">
                                    <p>Fale Conosco</p>
                                    <h5><a href="#">(17) 3222-3925</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div class="stricky-header stricked-menu main-menu">
                <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
            </div><!-- /.stricky-header -->

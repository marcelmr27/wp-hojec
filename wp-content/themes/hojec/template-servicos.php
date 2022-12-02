<?php
global $wp;

$institucional = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => url_to_postid(home_url($wp->request))
        ));

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


/**
 * Template Name: Template Serviços
 */
get_header();
?>
<?php
if ($institucional->have_posts()):
    while ($institucional->have_posts()) : $institucional->the_post();
        $imagem = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url(<?php the_field('banner_topo'); ?>)">
            </div>
            <div class="page-header-border"></div>
            <div class="page-header-border page-header-border-two"></div>
            <div class="page-header-border page-header-border-three"></div>
            <div class="page-header-border page-header-border-four"></div>
            <div class="page-header-border page-header-border-five"></div>
            <div class="page-header-border page-header-border-six"></div>

            <div class="page-header-shape-1"></div>
            <div class="page-header-shape-2"></div>
            <div class="page-header-shape-3"></div>

            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="<?php echo home_url() ?>">Home</a></li>
                        <li><a href="<?php echo home_url() ?>/comunicacao">Comunicação</a></li>
                        <li class="active"><?php the_title() ?></li>
                    </ul>
                    <h2><?php the_title() ?></h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Service Details Start-->
        <section class="service-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="service-details__sidebar">
                            <?php if (!empty($array_paginas_comunicacao)) { ?>
                                <div class="service-details__sidebar-service">
                                    <ul class="service-details__sidebar-service-list list-unstyled">
                                        <?php foreach ($array_paginas_comunicacao as $COMUNICACAO) { ?>
                                            <li class="<?php
                                            if ($COMUNICACAO['link'] === get_the_permalink()) {
                                                echo 'current';
                                            }
                                            ?>"><a href="<?php echo $COMUNICACAO['link'] ?>"><?php echo $COMUNICACAO['nome'] ?> <span
                                                        class="icon-right-arrow"></span></a></li>
                                            <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                            <div class="service-details__need-help">
                                <div class="service-details__need-help-icon">
                                    <span class="icon-chatting"></span>
                                </div>
                                <h2 class="service-details__need-help-title">Hoje.C <br> Comunicação</h2>
                                <div class="service-details__need-help-contact">
                                    <p>Fale Conosco</p>
                                    <a href="#">(17) 3222-3925</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-7">
                        <div class="service-details__right">
                            <div class="service-details__img">
                                <?php if (@is_array(getimagesize($imagem))) { ?>
                                    <img src="<?php echo $imagem ?>" alt="<?php the_title() ?> - Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital">
                                <?php } ?>
                            </div>
                            <div class="service-details__content">
                                <h2 class="service-details__title"><?php the_title() ?></h2>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Service Details End-->
        <?php
    endwhile;
endif;
?>
<?php
get_footer();

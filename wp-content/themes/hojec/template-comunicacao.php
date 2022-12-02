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
            'link' => get_the_permalink(),
            'imagem' => get_the_post_thumbnail_url(get_the_ID(), 'full')
        );
    endwhile;
endif;

/**
 * Template Name: Template Comunicação
 */
get_header();
?>
<?php
if ($institucional->have_posts()):
    while ($institucional->have_posts()) : $institucional->the_post();
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
                        <li class="active">Comunicação</li>
                    </ul>
                    <h2>Comunicação</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Projects Page Start-->
        <section class="projects-page">
            <div class="container">
                <div class="row filter-layout">
                    <?php if (!empty($array_paginas_comunicacao)) { ?>
                        <?php foreach ($array_paginas_comunicacao as $COMUNICACAO) { ?>
                            <div class="col-xl-4 col-lg-6 col-md-6 filter-item bra photo web">
                                <!--Portfolio One Single-->
                                <div class="project-one__single">
                                    <div class="project-one__img">
                                        <a href="<?php echo $COMUNICACAO['link'] ?>"><img src="<?php echo $COMUNICACAO['imagem'] ?>" alt="<?php echo $COMUNICACAO['nome'] ?> - Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital"></a>
                                        <div class="project-one__hover">
                                            <h3 class="project-one__title"><a href="<?php echo $COMUNICACAO['link'] ?>"><?php echo $COMUNICACAO['nome'] ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <p class="text-center">Não há comunicações cadastradas ainda!</p>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!--Projects Page End-->
        <?php
    endwhile;
endif;
?>
<?php
get_footer();

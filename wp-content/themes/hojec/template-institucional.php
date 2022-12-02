<?php
$explode_url = explode('/', $_SERVER['REQUEST_URI']);

global $wp;

$institucional = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => url_to_postid(home_url($wp->request))
        ));

$array_equipe = array();
$args_equipe = new WP_Query(array(
    'post_type' => 'equipe',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'ASC',
        ));
if ($args_equipe->have_posts()):
    while ($args_equipe->have_posts()) : $args_equipe->the_post();
        $array_equipe[] = array(
            'nome' => get_the_title(),
            'imagem' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            'cargo' => get_field('cargo'),
            'redes_sociais' => get_field('redes_sociais')
        );
    endwhile;
endif;
/**
 * Template Name: Template Institucional
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
                        <li><a href="<?php echo home_url() ?>/hojec">Hoje.C</a></li>
                        <li class="active"><?php the_title() ?></li>
                    </ul>
                    <h2><?php the_title() ?></h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--About Page Start-->
        <section class="about-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-page__left">
                            <div class="about-page__img">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" alt="<?php the_title() ?> - Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-page__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline"><?php the_field('subtitulo') ?></span>
                                <h2 class="section-title__title"><?php the_field('titulo') ?></h2>
                            </div>
                            <p class="about-page__right-text-1"><?php the_field('frase_de_efeito') ?></p>
                            <div class="about-page__right-text-2"><?php the_content() ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About Page End-->

        <?php if (isset($explode_url[2]) && $explode_url[2] === 'historia') { ?>
            <!--Qutiiz Ready Two-->
            <section class="qutiiz-ready-two">
                <div class="qutiiz-ready-two-bg-box">
                    <div class="qutiiz-ready-two-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%" style="background-image: url(assets/images/backgrounds/qutiiz-ready-two-bg.jpg)"></div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="qutiiz-ready-two__inner">
                                <h2 class="qutiiz-ready-two__title">Deixe-nos escrever a história de sucesso da sua marca!</h2>
                                <a href="<?php echo home_url() ?>/contato" class="qutiiz-ready-two__btn thm-btn">Quero ser Hoje.C</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Qutiiz Ready End-->
            <?php if (!empty($array_equipe)) { ?>
                <!--Team One Start-->
                <section class="team-one">
                    <div class="team-one-container">
                        <div class="section-title text-center">
                            <span class="section-title__tagline">nossa equipe</span>
                            <h2 class="section-title__title">Conheça o Time Hoje.C</h2>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="team-one__carousel owl-theme owl-carousel">
                                    <?php foreach ($array_equipe as $EQUIPE) { ?>
                                        <!--Team One Single-->
                                        <div class="team-one__single">
                                            <div class="team-one__img">
                                                <img src="<?php echo $EQUIPE['imagem'] ?>" alt="<?php echo $EQUIPE['nome'] ?> - Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital">
                                            </div>
                                            <div class="team-one__content">
                                                <h4 class="team-one__name"><?php echo $EQUIPE['nome'] ?></h4>
                                                <p class="team-one__title"><?php echo $EQUIPE['cargo'] ?></p>
                                            </div>
                                            <div class="team-one__hover">
                                                <h4 class="team-one__hover-name"><?php echo $EQUIPE['nome'] ?></h4>
                                                <p class="team-one__hover-title"><?php echo $EQUIPE['cargo'] ?></p>
                                                <div class="team-one__social">
                                                    <?php if (isset($EQUIPE['redes_sociais']['twitter']) && $EQUIPE['redes_sociais']['twitter'] !== null && $EQUIPE['redes_sociais']['twitter'] !== '') { ?>
                                                        <a href="<?php echo $EQUIPE['redes_sociais']['twitter'] ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                                    <?php } ?>
                                                    <?php if (isset($EQUIPE['redes_sociais']['facebook']) && $EQUIPE['redes_sociais']['facebook'] !== null && $EQUIPE['redes_sociais']['facebook'] !== '') { ?>
                                                        <a href="<?php echo $EQUIPE['redes_sociais']['facebook'] ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                                                    <?php } ?>
                                                    <?php if (isset($EQUIPE['redes_sociais']['instagram']) && $EQUIPE['redes_sociais']['instagram'] !== null && $EQUIPE['redes_sociais']['instagram'] !== '') { ?>
                                                        <a href="<?php echo $EQUIPE['redes_sociais']['instagram'] ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                                    <?php } ?>
                                                    <?php if (isset($EQUIPE['redes_sociais']['linkedin']) && $EQUIPE['redes_sociais']['linkedin'] !== null && $EQUIPE['redes_sociais']['linkedin'] !== '') { ?>
                                                        <a href="<?php echo $EQUIPE['redes_sociais']['linkedin'] ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Team One End-->
            <?php } ?>
        <?php } ?>
        <?php
    endwhile;
endif;
?>
<?php
get_footer();

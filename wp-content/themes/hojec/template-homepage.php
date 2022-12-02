<?php
/**
 * Template Name: Template Home Page
 */
global $wp;

$institucional = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => url_to_postid(home_url($wp->request))
        ));

$array_blog = $array_banners = $array_paginas_comunicacao = $array_clientes = $array_equipe = $array_cases = $array_cases_categorias = array();

$args_comunicacao = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'post_parent' => 15,
    'order' => 'ASC',
    'orderby' => 'menu_order'
        ));
if ($args_comunicacao->have_posts()):
    while ($args_comunicacao->have_posts()) : $args_comunicacao->the_post();
        $array_paginas_comunicacao[] = array(
            'nome' => get_the_title(),
            'link' => get_the_permalink(),
            'icone' => get_field('icone')
        );
    endwhile;
endif;

$args_blog = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'DESC'
        ));
if ($args_blog->have_posts()):
    while ($args_blog->have_posts()) : $args_blog->the_post();
        $array_blog[] = array(
            'nome' => get_the_title(),
            'link' => get_the_permalink(),
            'imagem' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            'headline' => substr(get_the_excerpt(), 0, 215) . '[...]',
            'data' => get_the_date('d/m/Y'),
            'ID' => get_the_ID(),
        );
    endwhile;
endif;

$args_banners = new WP_Query(array(
    'post_type' => 'banners',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'ASC'
        ));
if ($args_banners->have_posts()):
    while ($args_banners->have_posts()) : $args_banners->the_post();
        $array_banners[] = array(
            'nome' => get_the_title(),
            'imagem' => get_field('imagem'),
            'subtitulo' => get_field('subtitulo'),
            'titulo' => get_field('titulo'),
            'link' => get_field('link'),
        );
    endwhile;
endif;

$args_cases = new WP_Query(array(
    'post_type' => 'cases-de-sucesso',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'meta_key' => 'aparecer_na_home_page',
    'meta_value' => 'Sim'
        ));
if ($args_cases->have_posts()):
    while ($args_cases->have_posts()) : $args_cases->the_post();
        $array_cases[] = array(
            'nome' => get_the_title(),
            'imagem' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            'categoria' => get_field('categoria')
        );
        if (!in_array(get_field('categoria'), $array_cases_categorias)) {
            $array_cases_categorias[] = get_field('categoria');
        }
    endwhile;
endif;

$array_meses = array(
    '01' => 'JAN',
    '02' => 'FEV',
    '03' => 'MAR',
    '04' => 'ABR',
    '05' => 'MAI',
    '06' => 'JUN',
    '07' => 'JUL',
    '08' => 'AGO',
    '09' => 'SET',
    '10' => 'OUT',
    '11' => 'NOV',
    '12' => 'DEZ'
);

$clientes = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => 25
        ));
if ($clientes->have_posts()):
    while ($clientes->have_posts()) : $clientes->the_post();
        if (get_field('clientes') !== null && get_field('clientes') !== '') {
            foreach (get_field('clientes') as $CLIENTES) {
                $array_clientes[] = $CLIENTES;
            }
        }
    endwhile;
endif;

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

function remover_acento($string) {
    $acentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
    $matrizes = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');
    return str_replace($acentos, $matrizes, $string);
}

get_header();
?>
<?php
if ($institucional->have_posts()):
    while ($institucional->have_posts()) : $institucional->the_post();
        ?>
        <?php if (!empty($array_banners)) { ?>
            <!--Main Slider Start-->
            <section class="main-slider">
                <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                     "effect": "fade",
                     "pagination": {
                     "el": "#main-slider-pagination",
                     "type": "bullets",
                     "clickable": true
                     },
                     "navigation": {
                     "nextEl": "#main-slider__swiper-button-next",
                     "prevEl": "#main-slider__swiper-button-prev"
                     },
                     "autoplay": {
                     "delay": 5000
                     }}'>
                    <div class="swiper-wrapper">
                        <?php foreach ($array_banners as $BANNERS) { ?>
                            <div class="swiper-slide">
                                <div class="image-layer"
                                     style="background-image: url(<?php echo $BANNERS['imagem'] ?>);">
                                </div>
                                <!-- /.image-layer -->
                                <div class="main-slider-border"></div>
                                <div class="main-slider-border main-slider-border-two"></div>
                                <div class="main-slider-border main-slider-border-three"></div>
                                <div class="main-slider-border main-slider-border-four"></div>
                                <div class="main-slider-border main-slider-border-five"></div>
                                <div class="main-slider-border main-slider-border-six"></div>

                                <div class="main-slider-shape-1"></div>
                                <div class="main-slider-shape-2"></div>
                                <div class="main-slider-shape-3"></div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="main-slider__content">
                                                <p><?php echo $BANNERS['subtitulo'] ?></p>
                                                <h2><?php echo $BANNERS['titulo'] ?></h2>
                                                <?php if (filter_var($BANNERS['link'], FILTER_VALIDATE_URL) !== FALSE) { ?>
                                                    <a href="<?php echo $BANNERS['link']; ?>" class="thm-btn">Descubra</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-pagination" id="main-slider-pagination"></div>
                    <div class="main-slider__nav">
                        <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                            <i class="icon-right-arrow icon-left-arrow"></i>Anterior
                        </div>
                        <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                            Próximo <i class="icon-right-arrow"></i>
                        </div>
                    </div>
                </div>
            </section>
            <!--Main Slider End-->
        <?php } ?>

        <!--Services One Start-->
        <section class="services-one">
            <div class="services-one-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"><img
                    class="float-bob-x" src="<?php echo get_template_directory_uri() ?>/assets/images/shapes/services-one-shape.png" alt=""></div>
            <div class="container">
                <div class="services-one__top">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="services-one__top-left">
                                <div class="section-title text-left">
                                    <span class="section-title__tagline"><?php the_field('campo_1') ?></span>
                                    <h2 class="section-title__title"><?php the_field('campo_2') ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="services-one__top-text-box mt-4">
                                <p class="services-one__top-text text-right"><?php the_field('campo_3') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($array_paginas_comunicacao)) { ?>
                    <div class="services-one__bottom">
                        <div class="row">
                            <div class="col-xl-12">
                                <ul class="list-unstyled services-one__list">
                                    <?php foreach ($array_paginas_comunicacao as $KEY => $COMUNICACAO) { ?>
                                        <li class="services-one__single wow fadeInUp" data-wow-delay="<?php echo (int) $KEY + 1 ?>00ms">
                                            <div class="services-one__icon">
                                                <img src="<?php echo $COMUNICACAO['icone'] ?>" alt="Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital">
                                            </div>
                                            <div class="services-one__count"></div>
                                            <h3 class="services-one__title"><a href="<?php echo $COMUNICACAO['link'] ?>"><?php echo $COMUNICACAO['nome'] ?></a></h3>
                                            <a class="services-one__arrow" href="<?php echo $COMUNICACAO['link'] ?>"><span
                                                    class="icon-right-arrow"></span></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
        <!--Services One End-->

        <!--Get To Know Start-->
        <section class="get-to-know">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="get-to-know__left wow slideInLeft" data-wow-delay="100ms"
                             data-wow-duration="2500ms">
                            <div class="get-to-know__img">
                                <img src="<?php the_field('campo_8') ?>" alt="Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital">
                                <?php if (filter_var(get_field('campo_9'), FILTER_VALIDATE_URL) !== FALSE) { ?>                                                
                                    <div class="get-to-know__video-link">
                                        <a href="<?php the_field('campo_9') ?>" class="video-popup">
                                            <div class="get-to-know__video-icon">
                                                <span class="icon-play-button"></span>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="get-to-know__right">
                            <div class="get-to-know-big-text">Hoje.C</div>
                            <div class="section-title text-left">
                                <span class="section-title__tagline"><?php the_field('campo_4') ?></span>
                                <h2 class="section-title__title"><?php the_field('campo_5') ?></h2>
                            </div>
                            <p class="get-to-know__text-1"><?php the_field('campo_6') ?></p>
                            <p class="get-to-know__text-2"><?php the_field('campo_7') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Get To Know End-->

        <?php if (!empty($array_cases)) { ?>
            <!--Project One Start-->
            <section class="project-one">
                <div class="container">
                    <div class="section-title text-center">
                        <span class="section-title__tagline">cases de sucesso</span>
                        <h2 class="section-title__title">projetos premiados</h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <ul class="project-filter style1 post-filter has-dynamic-filters-counter list-unstyled">
                                <li data-filter=".filter-item" class="active"><span class="filter-text">Todos</span></li>
                                <?php
                                if (!empty($array_cases_categorias)) {
                                    foreach ($array_cases_categorias as $CASES_CATEGORIAS) {
                                        echo '<li data-filter=".' . remover_acento(mb_strtolower(str_replace(' ', '-', $CASES_CATEGORIAS))) . '"><span class="filter-text">' . $CASES_CATEGORIAS . '</span></li>';
                                    }
                                }
                                ?>
                                <li class="todos-projetos"><a href="<?php echo home_url() ?>/cases" style="color:#ef1359">Ver outros cases</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row filter-layout masonary-layout">
                        <?php foreach ($array_cases as $CASES) { ?>
                            <div class="col-md-4 filter-item <?php echo remover_acento(mb_strtolower(str_replace(' ', '-', $CASES['categoria']))) ?>">
                                <!--Portfolio One Single-->
                                <div class="project-one__single">
                                    <div class="project-one__img">
                                        <img src="<?php echo $CASES['imagem'] ?>" alt="Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital">
                                        <div class="project-one__hover project-one__hover-pl-40">
                                            <p class="project-one__tagline"><?php echo $CASES['categoria'] ?></p>
                                            <h3 class="project-one__title"><a href="#"><?php echo $CASES['nome'] ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!--Project One End-->
        <?php } ?>

        <!--Counter One Start-->
        <section class="counter-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="list-unstyled counter-one__list">
                            <li class="counter-one__single wow fadeInUp" data-wow-delay="100ms">
                                <div class="counter-one__icon">
                                    <span class="icon-checking"></span>
                                </div>
                                <h3 class="odometer" data-count="<?php echo get_field('campo_10')['projetos_concluidos'] ?>">00</h3>
                                <p class="counter-one__text">Projetos Concluídos</p>
                            </li>
                            <li class="counter-one__single wow fadeInUp" data-wow-delay="200ms">
                                <div class="counter-one__icon">
                                    <span class="icon-recommend"></span>
                                </div>
                                <h3 class="odometer" data-count="<?php echo get_field('campo_10')['clientes_satisfeitos'] ?>">00</h3>
                                <p class="counter-one__text">Clientes Satisfeitos</p>
                            </li>
                            <li class="counter-one__single wow fadeInUp" data-wow-delay="300ms">
                                <div class="counter-one__icon">
                                    <span class="icon-consulting"></span>
                                </div>
                                <h3 class="odometer" data-count="<?php echo get_field('campo_10')['time_de_experts'] ?>">00</h3>
                                <p class="counter-one__text">Time de Experts</p>
                            </li>
                            <li class="counter-one__single wow fadeInUp" data-wow-delay="400ms">
                                <div class="counter-one__icon">
                                    <span class="icon-increment"></span>
                                </div>
                                <h3 class="odometer" data-count="<?php echo get_field('campo_10')['clientes_recorrentes'] ?>">00</h3>
                                <p class="counter-one__text">Clientes Recorrentes</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Counter One End-->

        <!--Why Choose One Start-->
        <section class="why-choose-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="why-choose-one__left wow fadeInLeft" data-wow-delay="100ms"
                             data-wow-duration="2500ms">
                            <div class="why-choose-one__img">
                                <img src="<?php the_field('campo_14') ?>" alt="Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="why-choose-one__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline"><?php the_field('campo_11') ?></span>
                                <h2 class="section-title__title" style="color: #f26722"><?php the_field('campo_12') ?></h2>
                            </div>
                            <p class="why-choose-one__text"><?php the_field('campo_13') ?></p>
                            <?php if (get_field('campo_15') !== null && is_array(get_field('campo_15')) && !empty(get_field('campo_15'))) { ?>
                                <div class="why-choose-one__bottom">
                                    <ul class="list-unstyled why-choose-one__points">
                                        <?php foreach (get_field('campo_15') as $ITEM) { ?>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-draw-check-mark"></span>
                                                </div>
                                                <div class="text">
                                                    <p><?php echo $ITEM['item'] ?></p>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Why Choose One End-->

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

        <?php if (get_field('campo_18') !== null && is_array(get_field('campo_18')) && !empty(get_field('campo_18'))) { ?>
            <!--Testimonial One Start-->
            <section class="testimonial-one">
                <div class="testimonial-one__inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="testimonial-one__left">
                                    <div class="section-title text-left">
                                        <span class="section-title__tagline" style="color: white"><?php the_field('campo_16') ?></span>
                                        <h2 class="section-title__title" style="color: white"><?php the_field('campo_17') ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-one__right">
                        <div class="testimonial-one__carousel owl-theme owl-carousel">
                            <?php foreach (get_field('campo_18') as $DEPOIMENTOS) { ?>
                                <!--Testimonial One Single-->
                                <div class="testimonial-one__single">
                                    <p class="testimonial-one__text"><?php echo $DEPOIMENTOS['depoimento'] ?></p>
                                    <div class="testimonial-one__client-info">
                                        <div class="testimonial-one__client-img">
                                            <img src="<?php echo $DEPOIMENTOS['foto'] ?>" alt="Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital">
                                            <div class="testimonial-one__quote">
                                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/testimonial/testimonial-one-quote.png" alt="Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital">
                                            </div>
                                        </div>
                                        <div class="testimonial-one__client-details">
                                            <h4 class="testimonial-one__client-name"><?php echo $DEPOIMENTOS['nome'] ?></h4>
                                            <p class="testimonial-one__client-title"><?php echo $DEPOIMENTOS['empresa'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="owl-theme">
                        <div class="owl-controls">
                            <div class="custom-nav owl-nav"></div>
                        </div>
                    </div>

                </div>
            </section>
            <!--Testimonial One End-->
        <?php } ?>

        <?php if (!empty($array_clientes)) { ?>
            <!--Brand One Start-->
            <section class="brand-one">
                <div class="container">
                    <div class="section-title text-center">
                        <span class="section-title__tagline">nossos parceiros</span>
                        <h2 class="section-title__title">Clientes que confiam na Hoje.C</h2>
                    </div>
                    <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 4, "autoplay": { "delay": 5000 }, "breakpoints": {
                         "0": {
                         "spaceBetween": 20,
                         "slidesPerView": 2
                         },
                         "375": {
                         "spaceBetween": 20,
                         "slidesPerView": 2
                         },
                         "575": {
                         "spaceBetween": 20,
                         "slidesPerView": 3
                         },
                         "767": {
                         "spaceBetween": 20,
                         "slidesPerView": 4
                         },
                         "991": {
                         "spaceBetween": 20,
                         "slidesPerView": 4
                         },
                         "1199": {
                         "spaceBetween": 20,
                         "slidesPerView": 4
                         }
                         }}'>
                        <div class="swiper-wrapper">
                            <?php foreach ($array_clientes as $CLIENTE) { ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $CLIENTE ?>" alt="Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <!--Brand One End-->
        <?php } ?>

        <?php if (!empty($array_blog)) { ?>
            <!--Blog One Start-->
            <section class="blog-one">
                <div class="container">
                    <div class="section-title text-center">
                        <span class="section-title__tagline">blog</span>
                        <h2 class="section-title__title">Últimas Notícias</h2>
                    </div>
                    <div class="row">
                        <?php
                        foreach ($array_blog as $KEY => $BLOG) {
                            $explode_data_blog = explode('/', $BLOG['data']);
                            ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?php echo (int) $KEY + 1 ?>00ms">
                                <!--Blog One Start-->
                                <div class="blog-one__single">
                                    <div class="blog-one__img">
                                        <img src="<?php echo $BLOG['imagem'] ?>" alt="<?php echo $BLOG['nome'] ?>">
                                        <a href="<?php echo $BLOG['link'] ?>">
                                            <span class="blog-one__plus"></span>
                                        </a>
                                        <div class="blog-one__date">
                                            <p><?php echo $explode_data_blog[0] ?> <br> <?php echo $array_meses[$explode_data_blog[1]] ?></p>
                                        </div>
                                    </div>
                                    <div class="blog-one__content">
                                        <h3 class="blog-one__title">
                                            <a href="<?php echo $BLOG['link'] ?>"><?php echo $BLOG['nome'] ?></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!--Blog One End-->
        <?php } ?>
        <?php
    endwhile;
endif;
?>
<?php
get_footer();
?>
<script>
    jQuery(document).ready(function () {
        jQuery('.todos-projetos').click(function () {
            window.location.href = '/cases';
        });
    })
</script>
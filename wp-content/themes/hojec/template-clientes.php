<?php
global $wp;

$institucional = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => url_to_postid(home_url($wp->request))
        ));

/**
 * Template Name: Template Clientes
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
                        <li class="active">Clientes</li>
                    </ul>
                    <h2>Clientes</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Projects Page Start-->
        <section class="projects-page">
            <div class="container">
                <div class="row filter-layout">
                    <?php if (get_field('clientes') !== null && get_field('clientes') !== '') { ?>
                        <?php foreach (get_field('clientes') as $CLIENTES) { ?>
                            <div class="col-xl-4 col-lg-6 col-md-6 filter-item bra photo web">
                                <!--Portfolio One Single-->
                                <div class="project-one__single">
                                    <div class="project-one__img">
                                        <img src="<?php echo $CLIENTES ?>" alt="Hoje.C - Assessoria de Imprensa, Relações Públicas e Conteúdo Digital">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <p class="text-center">Não há clientes cadastrados ainda!</p>
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

<?php
global $wp;

$institucional = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => url_to_postid(home_url($wp->request))
        ));
/**
 * Template Name: Template Contato
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
                        <li class="active">Contato</li>
                    </ul>
                    <h2>Contato</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Contact Info Start-->
        <section class="contact-info">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <!--Contact Info Single-->
                        <div class="contact-info__single">
                            <div class="contact-info__icon">
                                <span class="icon-conversation"></span>
                            </div>
                            <h3 class="contact-info__title">Hoje.C</h3>
                            <p class="contact-info__text"><?php the_field('texto_hojec') ?></p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <!--Contact Info Single-->
                        <div class="contact-info__single">
                            <div class="contact-info__icon">
                                <span class="icon-address"></span>
                            </div>
                            <h3 class="contact-info__title">Endereço</h3>
                            <p class="contact-info__text"><?php the_field('texto_endereco') ?></p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                        <!--Contact Info Single-->
                        <div class="contact-info__single contact-info__single-last">
                            <div class="contact-info__icon">
                                <span class="icon-contact"></span>
                            </div>
                            <h3 class="contact-info__title">Contato</h3>
                            <p class="contact-info__text"><?php the_field('texto_contato') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Info End-->

        <!--contact Page Start-->
        <section class="contact-page contact-page-two">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">fale conosco</span>
                    <h2 class="section-title__title">formulário de contato</h2>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="contact-page__form">
                            <div class="comment-one__form contact-form-validated">
                                <?php echo do_shortcode('[contact-form-7 id="5" title="Formulário de Contato"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--contact Page End-->

        <!--Google Map Start-->
        <section class="google-map">
            <iframe
                src="<?php the_field('mapa') ?>"
                class="google-map__one" allowfullscreen></iframe>

        </section>
        <!--Google Map End-->
        <?php
    endwhile;
endif;
?>
<?php
get_footer();

<?php
global $wp;
global $wp;

$institucional = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => url_to_postid(home_url($wp->request))
        ));

$array_blog = array();
$args_blog = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'DESC',
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

/**
 * Template Name: Template Blog
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
                        <li class="active">Blog</li>
                    </ul>
                    <h2>Blog</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->


        <!--Blog Page Start-->
        <section class="blog-one blog-one__blog-page">
            <div class="container">
                <div class="row">
                    <?php if (!empty($array_blog)) { ?>
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
                    <?php } else { ?>
                        <p class="text-center">Não há noticias cadastradas no Blog ainda!</p>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!--Blog Page End-->
        <?php
    endwhile;
endif;
?>
<?php
get_footer();

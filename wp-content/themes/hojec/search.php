<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP_Bootstrap_Starter
 */
$array_blog = array();
if (have_posts()) {
    while (have_posts()) : the_post();
        $post_type = '';
        switch (get_post_type(get_the_ID())) {
            case 'page':
                $post_type = 'Página';
                break;
            case 'videos':
                $post_type = 'Vídeos';
                break;
            case 'e-books':
                $post_type = 'E-books';
                break;
            case 'post':
                $array_blog[] = array(
                    'nome' => get_the_title(),
                    'link' => get_the_permalink(),
                    'imagem' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                    'headline' => substr(get_the_excerpt(), 0, 215) . '[...]',
                    'data' => get_the_date('d/m/Y'),
                    'ID' => get_the_ID(),
                );
                break;
        }
    endwhile;
}

$institucional_header = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => 27
        ));
if ($institucional_header->have_posts()):
    while ($institucional_header->have_posts()) : $institucional_header->the_post();
        $bg_header = get_field('banner_topo');
    endwhile;
endif;

get_header();
?>

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(<?php echo $bg_header; ?>)">
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
                <li class="active">Resultados da Busca</li>
            </ul>
            <h2>Resultados da Busca</h2>
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
                <p class="text-center">Nada encontrado!</p>
            <?php } ?>
        </div>
    </div>
</section>
<!--Blog Page End-->

<?php
get_footer();

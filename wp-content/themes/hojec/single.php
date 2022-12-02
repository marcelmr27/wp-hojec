<?php
global $wp;
$institucional = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'post',
    'p' => url_to_postid(home_url($wp->request))
        ));

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
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */
get_header();
?>

<?php
if ($institucional->have_posts()):
    while ($institucional->have_posts()) : $institucional->the_post();
        $explode_data_blog = explode('/', get_the_date('d/m/Y'));
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
                        <li><a href="<?php echo home_url() ?>/blog">Blog</a></li>
                        <li class="active"><?php the_title() ?></li>
                    </ul>
                    <h2><?php the_title() ?></h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Blog Details Start-->
        <section class="blog-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-details__left">
                            <div class="blog-details__img">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" alt="<?php the_title() ?>">
                                <div class="blog-details__date-box">
                                    <p><?php echo $explode_data_blog[0] ?> <br> <?php echo $array_meses[$explode_data_blog[1]] ?></p>
                                </div>
                            </div>
                            <div class="blog-details__content">
                                <h3 class="blog-details__title mb-4"><?php the_title() ?></h3>
                                <?php the_content() ?>
                            </div>
                            <div class="blog-details__bottom">
                                <div class="blog-details__social-list">
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink() ?>&text=" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink() ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink() ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                            <div class="sidebar__single sidebar__search">
                                <form role="search" method="get" class="side-nav-search-form wp-block-search__button-outside wp-block-search__text-button wp-block-search sidebar__search-form" action="<?php echo home_url('/'); ?>">
                                    <input type="search" class="search-field" name="s" placeholder="Pesquisar no Blog">
                                    <button type="submit" class="side-nav-search-btn wp-block-search__button"><i class="icon-magnifying-glass"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Blog Details End-->

        <?php
    endwhile;
endif;
?>
<?php
get_footer();

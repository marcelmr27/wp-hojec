<?php
global $wp;
$institucional = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'e-books',
    'p' => url_to_postid(home_url($wp->request))
        ));
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
        ?>
        <div class="breadcrumb-wrapper">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo home_url() ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo home_url() ?>/ebooks">E-books</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php the_title() ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="banner banner__single-post banner__standard">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="post-title-wrapper">
                            <div class="btn-group">
                                <a href="<?php echo home_url() ?>/ebooks" class="cat-btn bg-color-blue-one">E-books</a>
                            </div>

                            <h2 class="m-t-xs-20 m-b-xs-0 axil-post-title hover-line"><?php the_title() ?></h2>
                            <div class="post-metas banner-post-metas m-t-xs-20">
                                <ul class="list-inline">
                                    <li><?php the_excerpt(); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" alt="<?php the_title() ?>" class="img-fluid" width="600" height="600">
                    </div>
                </div>
            </div>
        </section>

        <div class="post-single-wrapper p-t-xs-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <main class="site-main">
                            <article class="post-details">
                                <div class="single-blog-wrapper">
                                    <div class="post-details__social-share mt-2">
                                        <ul class="social-share social-share__with-bg social-share__vertical">
                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink() ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink() ?>&text=" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink() ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>

                                    <div style="text-align: justify">
                                        <?php the_content() ?>
                                    </div>
                                </div>
                            </article>
                        </main>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endwhile;
endif;
?>
<?php
get_footer();

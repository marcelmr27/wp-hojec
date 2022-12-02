<?php
global $wp;

$page_object = get_queried_object();
$array_blog = array();
$args_blog = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $page_object->term_id,
        ),
    )
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

/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */
get_header();
?>
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo home_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $page_object->cat_name; ?></li>
            </ol>
        </nav>
    </div>
</div>

<section class="banner banner__default bg-grey-light-three">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="post-title-wrapper">
                    <h2 class="m-b-xs-0 axil-post-title hover-line"><?php echo $page_object->cat_name; ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="random-posts section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <main class="axil-content">
                    <?php if (!empty($array_blog)) { ?>
                        <?php
                        foreach ($array_blog as $BLOG) {
                            $array_categorias = array();
                            $categories = get_the_category($BLOG['ID']);
                            $categoria_nome = '';
                            $categoria_link = '';
                            if (!empty($categories)) {
                                foreach ($categories as $KEY_2 => $CAT) {
                                    if ((int) $KEY_2 === 0) {
                                        $categoria_nome = $CAT->cat_name;
                                        $categoria_link = get_category_link($CAT->term_id);
                                    }
                                    $array_categorias[] = $CAT->cat_name;
                                }
                            }
                            ?>
                            <div class="media post-block post-block__mid m-b-xs-30">
                                <a href="<?php echo $BLOG['link'] ?>" class="align-self-center"><img class=" m-r-xs-30" src="<?php echo $BLOG['imagem'] ?>" alt="<?php echo $BLOG['nome'] ?>"></a>
                                <div class="media-body">
                                    <div class="post-cat-group m-b-xs-10">
                                        <a href="<?php echo $categoria_link ?>" class="post-cat cat-btn bg-color-blue-one"><?php echo $categoria_nome ?></a>
                                    </div>
                                    <h3 class="axil-post-title hover-line hover-line"><a href="<?php echo $BLOG['link'] ?>"><?php echo $BLOG['nome'] ?></a></h3>
                                    <p class="mid"><?php echo $BLOG['headline'] ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        Não há posts cadastrados nesta categoria ainda.
                    <?php } ?>
                </main>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();

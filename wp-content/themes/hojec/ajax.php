<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
/**
 * Template Name: 
 */
if (isset($_POST['action']) && $_POST['action'] === 'busca_posts_lidos_categorias') {
    $wpdb->query('SELECT WPV.* FROM wpbbenan21_post_views WPV INNER JOIN wpbbenan21_term_relationships WTR ON WTR.object_id = WPV.id WHERE WPV.period = "total" AND WTR.term_taxonomy_id = ' . $_POST['key'] . ' ORDER BY WPV.count DESC LIMIT 6');
    if (isset($wpdb->last_result) && is_array($wpdb->last_result) && !empty($wpdb->last_result)) {
        foreach ($wpdb->last_result as $POST) {
            $args_blog_lidos_cat = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'post_status' => 'publish',
                'p' => $POST->id
            ));
            if ($args_blog_lidos_cat->have_posts()):
                while ($args_blog_lidos_cat->have_posts()) : $args_blog_lidos_cat->the_post();
                    $array_blog_mais_lidos_cat[] = array(
                        'nome' => get_the_title(),
                        'link' => get_the_permalink(),
                        'imagem' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                        'headline' => substr(get_the_excerpt(), 0, 215) . '[...]',
                        'data' => get_the_date('d/m/Y'),
                        'ID' => get_the_ID(),
                    );
                endwhile;
            endif;
        }
    }
    ?>

    <?php if (!empty($array_blog_mais_lidos_cat)) { ?>
        <?php
        foreach ($array_blog_mais_lidos_cat as $LIDOS_CAT_POSTS) {
            $array_categorias = array();
            $categories = get_the_category($LIDOS_CAT_POSTS['ID']);
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
            <div class="col-lg-6">
                <div class="media post-block m-b-xs-30">
                    <a href="<?php echo $LIDOS_CAT_POSTS['link'] ?>" class="align-self-center"><img class=" m-r-xs-30" src="<?php echo $LIDOS_CAT_POSTS['imagem'] ?>" alt="<?php echo $LIDOS_CAT_POSTS['nome'] ?>"></a>
                    <div class="media-body">
                        <div class="post-cat-group m-b-xs-10">
                            <a href="<?php echo $categoria_link ?>" class="post-cat cat-btn bg-color-blue-one"><?php echo $categoria_nome ?></a>
                        </div>
                        <h3 class="axil-post-title hover-line hover-line"><a href="<?php echo $LIDOS_CAT_POSTS['link'] ?>"><?php echo $LIDOS_CAT_POSTS['nome'] ?></a></h3>
                        <div class="post-metas">
                            <ul class="list-inline">
                                <li><?php echo $LIDOS_CAT_POSTS['headline'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="col-lg-12">Não há posts lidos nesta categoria ainda</div>
        <?php
    }
}
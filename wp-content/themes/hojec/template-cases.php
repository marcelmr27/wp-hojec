<?php
global $wp;

$institucional = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => url_to_postid(home_url($wp->request))
        ));
$array_cases = $array_cases_categorias = array();
$args_cases = new WP_Query(array(
    'post_type' => 'cases-de-sucesso',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'DESC',
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

function remover_acento($string) {
    $acentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
    $matrizes = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');
    return str_replace($acentos, $matrizes, $string);
}

/**
 * Template Name: Template Cases
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
                        <li class="active">Cases de Sucesso</li>
                    </ul>
                    <h2>Cases de Sucesso</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Projects Page Start-->
        <section class="projects-page">
            <div class="container">
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
                        </ul>
                    </div>
                </div>
                <div class="row filter-layout">
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
        <!--Projects Page End-->
        <?php
    endwhile;
endif;
?>
<?php
get_footer();

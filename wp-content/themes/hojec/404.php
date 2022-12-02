<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
                <li class="breadcrumb-item active" aria-current="page">Ooops! Nada encontrado</li>
            </ol>
        </nav>
    </div>
</div>

<section class="banner banner__default bg-grey-light-three">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="post-title-wrapper">
                    <h2 class="m-b-xs-0 axil-post-title hover-line">Ooops! Nada encontrado</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="axil-about-us section-gap-top p-b-xs-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="text-align: justify">
                <p>Desculpe, mas a página que você está tentando acessar não existe.</p>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();

<?php
$header_section_background = get_theme_mod('background_image_header_banner_setting') ?: 'https://wallpapers.com/images/high/summer-landscape-1920-x-1044-wallpaper-gl9ejmy7pdhsfmp6.webp';
$header_banner_title = get_theme_mod('header_banner_title_setting') ?: 'A digital marketing blog';
$header_banner_description = get_theme_mod('header_banner_description_setting') ?: 'Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis felis. Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper risus rhoncus rutrum. Integer et ornare mauris.';
$header_banner_button_link = get_theme_mod('header_banner_button_link_setting') ?: '/try_for_free';
$header_banner_button_text = get_theme_mod('header_banner_button_text_setting') ?: 'Try for free';
?>

<section id="cta" class="section" style="background: rgba(0, 0, 0, 0) url(<?php echo $header_section_background;?>) no-repeat scroll center center / cover" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 align-self-center">
                <h2><?php echo $header_banner_title ?></h2>
                <p class="lead"><?php echo $header_banner_description?></p>
                <a href="<?php echo $header_banner_button_link ?>" class="btn btn-primary"><?php echo $header_banner_button_text?></a>
            </div>
        </div>
    </div>
</section>
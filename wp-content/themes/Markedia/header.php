<!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Site Icons -->
<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
    <?php wp_head(); ?>
</head>
<body>

<div id="wrapper">
    <header class="market-header header">
        <div class="container-fluid">
            <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="marketing-index.html"><?php the_custom_logo(); ?></a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <?php
                    $args = array(
                        'container'=> false,
                        'theme_location'=>'primary',
                        'depth'         => 1,
                        'items_wrap'=>'<ul class="%2$s">%3$s</ul>',
                        'menu_class'=>'navbar-nav mr-auto',
                        'add_li_class'  => 'nav-item',
                        'add_a_class'  => 'nav-link',
                    );
                    wp_nav_menu($args);

                    ?>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="text" placeholder="How may I help?">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div><!-- end container-fluid -->
    </header><!-- end market-header -->

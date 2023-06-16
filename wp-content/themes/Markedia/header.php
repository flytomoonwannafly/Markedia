<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="--><?php //bloginfo( 'charset' ); ?><!--">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    --><?php //wp_head(); ?>
<!--    <title>--><?php //wp_title( '|', true, 'right' ); ?><!--</title>-->
<!--</head>-->
<!--<body>-->
<!--<h1>--><?php //bloginfo( 'name' ); ?><!--</h1>-->
<!---->
<!--<div>-->
<?php
//wp_nav_menu(array(
//    'theme_location'=>'primary'
//))
//
//?>
<!---->
<!--</div>-->

<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<!-- Site Icons -->
<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">


<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="marketing-index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="marketing-category.html">Marketing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="marketing-category.html">Make Money</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="marketing-blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="marketing-contact.html">Contact Us</a>
                        </li>
                    </ul>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="text" placeholder="How may I help?">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div><!-- end container-fluid -->
    </header><!-- end market-header -->

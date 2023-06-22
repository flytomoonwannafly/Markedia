<?php get_header() ?>
    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><?php the_title() ?> <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit
                            amet volutpat non. </small></h2>
                </div><!-- end col -->


                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <?php
                    if (function_exists('yoast_breadcrumb')) {
                        $breadcrumbs = yoast_breadcrumb('<p id="breadcrumbs">', '</p>', false);
                        $breadcrumbs = preg_replace('/<p[^>]*>/', '<ol class="breadcrumb">', $breadcrumbs);
                        $breadcrumbs = str_replace(array('</p>', '<span', '</span>'), array('</ol>', '<li class="breadcrumb-item"', '</a></li>'), $breadcrumbs);
                        $breadcrumbs = str_replace('<strong>', '', $breadcrumbs);
                        $breadcrumbs = str_replace('</strong>', '', $breadcrumbs);
                        echo $breadcrumbs;
                    }
                    ?>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->
    <section class="section lb">
        <div class="container">
            <div class="row">
                <!-- sidebar is here -->
                <?php if (is_active_sidebar('left-sidebar')): ?>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                        <div class="sidebar">
                            <?php dynamic_sidebar('left-sidebar'); ?>
                        </div><!-- end sidebar -->

                </div><!-- end col -->
                <?php endif; ?>

                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <?php if (have_posts()): ?>
                        <?php while (have_posts()): the_post();
                            get_template_part('template-parts/content', 'page');
                        endwhile; ?>
                    <?php endif ?>
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    </section>
<?php get_footer();
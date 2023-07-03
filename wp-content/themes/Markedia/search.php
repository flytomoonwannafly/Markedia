<?php get_header() ?>

<?php get_template_part('template-parts/header-banner') ?>

    <section class="section lb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-custom-build">
                            <?php if (have_posts()): ?>
                                <?php while (have_posts()): the_post(); ?>
                                    <?php get_template_part('template-parts/content', 'search') ?>
                                    <hr class="invis">
                                <?php endwhile;?>
                            <?php else: ?>
                                <p>No posts found.</p> <!-- Ваш код для випадку, коли постів немає -->
                            <?php endif; ?>
                        </div>
                    </div>

                    <hr class="invis">

                    <div class="row">
                        <div class="col-md-12">
                            <?php markedia_pagination() ?>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->
                <!-- sidebar is here -->
                <?php get_sidebar()?>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>


<?php get_footer();
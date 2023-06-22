<?php get_header() ?>

    <section class="section lb m3rem">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <?php if (have_posts()): ?>
                        <?php while (have_posts()): the_post();
                            get_template_part('template-parts/content', 'single');
                        endwhile; ?>
                    <?php endif ?>
                </div><!-- end col -->
                <!-- sidebar is here -->
                <?php get_sidebar() ?>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
<?php get_footer();
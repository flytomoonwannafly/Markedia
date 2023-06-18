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
                                    <div class="blog-box wow fadeIn">
                                        <div class="post-media">
                                            <a href="<?php the_permalink();?>" title="">
                                                <img src="<?php the_post_thumbnail_url(array(634, 364)); ?>" alt="" class="img-fluid">

                                                <div class="hovereffect">
                                                    <span></span>
                                                </div>
                                                <!-- end hover -->
                                            </a>
                                        </div>
                                        <!-- end media -->
                                        <div class="blog-meta big-meta text-center">
                                            <div class="post-sharing">
                                                <ul class="list-inline">
                                                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                                </ul>
                                            </div><!-- end post-sharing -->
                                            <h4><a href="<?php the_permalink();?>" title=""><?php the_title() ?></a></h4>
                                            <?php the_excerpt();?>
                                            <small><a href="marketing-category.html" title=""><?php the_category(' , ');?></a></small>
                                            <small><a href="marketing-single.html" title=""><?php the_time('j F Y'); ?></a></small>
                                            <small><a href="#" title="">BY <?php the_author()?></a></small>
                                            <small><a href="#" title=""><i class="fa fa-eye"></i> 2291</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->

                                    <hr class="invis">


                            <?php endwhile;?>
                            <?php endif  ?>

                        </div>
                    </div>

                    <hr class="invis">

                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->
                <!-- sidebar is here -->
                <?php get_sidebar()?>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>


<?php get_footer();
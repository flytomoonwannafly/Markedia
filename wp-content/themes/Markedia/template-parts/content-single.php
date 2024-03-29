<div class="page-wrapper">
    <div class="blog-title-area">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
            $breadcrumbs = yoast_breadcrumb( '<p id="breadcrumbs">','</p>', false );
            $breadcrumbs = preg_replace( '/<p[^>]*>/', '<ol class="breadcrumb hidden-xs-down">', $breadcrumbs );
            $breadcrumbs = str_replace( array( '</p>', '<span', '</span>' ), array( '</ol>', '<li class="breadcrumb-item"', '</a></li>' ), $breadcrumbs );
            $breadcrumbs = str_replace( '<strong>', '', $breadcrumbs );
            $breadcrumbs = str_replace( '</strong>', '', $breadcrumbs );
            echo $breadcrumbs;
        }
        ?>
        <span class="color-yellow"><?php the_category(' , ');?></span>

        <h3><?php the_title()?></h3>

        <div class="blog-meta big-meta">
            <small><a href="#" title=""><?php the_time('j F Y'); ?></a></small>
            <small><a href="blog-author.html" title="">by <?php the_author()?></a></small>
            <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
        </div><!-- end meta -->

        <div class="post-sharing">
            <ul class="list-inline">
                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div><!-- end post-sharing -->
    </div><!-- end title -->

    <div class="single-post-media">
        <img src="upload/market_blog_06.jpg" alt="" class="img-fluid">
    </div><!-- end media -->

    <div class="blog-content">
        <div class="pp">
        <?php the_content();?>
        </div>
    </div><!-- end content -->
    <div class="blog-title-area">
        <div class="tag-cloud-single">
            <span>Tags</span>
            <small><?php the_tags('','');?></small>
        </div><!-- end meta -->

        <div class="post-sharing">
            <ul class="list-inline">
                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div><!-- end post-sharing -->
    </div><!-- end title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                </div><!-- end banner-img -->
            </div><!-- end banner -->
        </div><!-- end col -->
    </div><!-- end row -->

    <hr class="invis1">

    <div class="custombox authorbox clearfix">
        <h4 class="small-title">About author</h4>
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle">
            </div><!-- end col -->

            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <h4><a href="#">Jessica</a></h4>
                <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Markedia!</p>

                <div class="topsocial">
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                </div><!-- end social -->

            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end author-box -->

    <hr class="invis1">

    <div class="custombox clearfix">
        <h4 class="small-title">You may also like</h4>
        <div class="row">
            <div class="col-lg-6">
                <div class="blog-box">
                    <div class="post-media">
                        <a href="marketing-single.html" title="">
                            <img src="upload/market_blog_02.jpg" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span class=""></span>
                            </div><!-- end hover -->
                        </a>
                    </div><!-- end media -->
                    <div class="blog-meta">
                        <h4><a href="marketing-single.html" title="">We are guests of ABC Design Studio</a></h4>
                        <small><a href="blog-category-01.html" title="">Trends</a></small>
                        <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->
            </div><!-- end col -->

            <div class="col-lg-6">
                <div class="blog-box">
                    <div class="post-media">
                        <a href="marketing-single.html" title="">
                            <img src="upload/market_blog_03.jpg" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span class=""></span>
                            </div><!-- end hover -->
                        </a>
                    </div><!-- end media -->
                    <div class="blog-meta">
                        <h4><a href="marketing-single.html" title="">Nostalgia at work with family</a></h4>
                        <small><a href="blog-category-01.html" title="">News</a></small>
                        <small><a href="blog-category-01.html" title="">20 July, 2017</a></small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end custom-box -->

    <hr class="invis1">

    <?php
    if (comments_open() || get_comments_number()  ){
        comments_template();
    }
    ?>

    <hr class="invis1">

</div><!-- end page-wrapper -->
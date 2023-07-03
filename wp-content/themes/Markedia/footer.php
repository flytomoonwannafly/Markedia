<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
                <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                <?php endif; ?>
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <br>
                <div class="copyright">&copy; Markedia. Design: <a href="http://html.design">HTML Design</a>.</div>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end footer -->

<div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<?php wp_footer(); ?>

</body>
</html>
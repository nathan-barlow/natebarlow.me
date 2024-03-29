        <footer class="flex flex-xs flex-column flex-center">
            <a href="/">&copy; <?php echo date('Y'); ?> Nate Barlow</a>

            <?php get_template_part( 'template-parts/social-links' ); ?>

            <a href="https://github.com/nathan-barlow/natebarlow.me" class="button">
                <i class="bi bi-github"></i>&nbsp; View this page on GitHub
            </a>
            
            <a class="small" href="https://www.vecteezy.com/free-vector/website">Website Vectors by Vecteezy</a>
        </footer>
        
        <?php
        wp_footer();
        ?>
    </body>
</html>

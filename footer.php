<footer class="l-footer">
    <?php wp_nav_menu(
    array(

            'menu_class'=>'l-footer__info',
            'container'=>false,
            'theme_location'=>'footer_info'
        )
); ?>
    <!-- </nav> -->
    <p class="l-footer__copyright"><small>&copy; <?php bloginfo('name'); ?> 2021</small></p>
</footer>
<?php wp_footer(); ?>
<!-- /.l-footer -->
</div>
</body>

</html>
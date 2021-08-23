<aside class="l-sidebar">
    <!-- ----closeボタン---- -->
    <div class="l-sidebar__btn c-btn__close">
        <span></span>
        <span></span>
    </div>

    <h2 class="l-sidebar__ttl p-ttl__sidebar"> Menu</h2>

    <ul class="l-sidebar__gmenu p-gmenu">

        <?php
if (is_active_sidebar('menu_widget')):
    dynamic_sidebar('menu_widget');
else:
    ?>
        <div class="widget">
            <h2>No widget</h2>
            <p>ウィジェットが設定されていません</p>
        </div>
        <?php endif; ?>

    </ul>
</aside>
<!-- /.l-sidebar -->
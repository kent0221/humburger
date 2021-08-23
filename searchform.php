<?php
if (get_search_query()) {
    $keyword = get_search_query();
}
?>

<form class="p-searchform" method="get" action="<?php echo esc_url(home_url()); ?>">
    <input type="search" name="s" id="s" class="p-searchform__keyword fas fa-search" placeholder="&#xf002;"
        value="<?php echo $keyword;?>">
    <input type="submit" class="p-searchform__submit p-submit" value="検索">
</form>
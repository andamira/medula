<?php 

osea_debug_showfile( __FILE__ );

/*
<!-- Search Form Type 1: Default -->

<li id="search">
    <label for="s"><?php _e('Search:', 'osea-theme')?></label>
    <form id="searchform" method="get" action="/index.php">
        <div>
            <input type="text" name="s" id="s" size="15" /><br />
            <input type="submit" value="<?php _e('Search','osea-theme')?>" />
        </div>
    </form>
</li>


<!-- Search Form Type 2: simple clean + icon -->

<form id="searchform" method="get" action="/index.php">
    <input type="text" name="s" id="s" />
    <button type="submit" title="<?php _e('Search','osea-theme')?>">
        <i class="dashicons-search dashicons"></i>
    </button>
</form>


<!-- Search Form Type 2: simple clean + icon -->
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
<input type="text" value="" name="s" id="s" placeholder="<?php _e('Type & Hit Enter')?>" />
</form>


/**/
?>

<form class="searchform" method="get" action="/index.php">
    <input type="text" name="s" id="s" placeholder="<?php _e('Search . . .','osea-theme')?>" />
    <button type="submit" title="<?php _e('Search','osea-theme')?>">
        <i class="dashicons-search dashicons"></i>
    </button>
</form>

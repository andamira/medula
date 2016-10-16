<?php 
/**
 * Search Form Template
 *
 */

// <!-- Search Form Type 1: simple text box -->
?>
<form class="searchform" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<input type="text" value="" name="s" id="s" placeholder="<?php _e('Type & Hit Enter', 'medula')?>" />
</form>
<?php

// <!-- Search Form Type 2: simple text box + icon -->
/*
<form class="searchform" role="search" method="get" action="/index.php">
    <input type="text" name="s" id="s" />
    <button type="submit" title="<?php _e('Search', 'medula')?>">
        <i class="dashicons-search dashicons"></i>
    </button>
</form>
/**/

// <!-- Search Form Type 3 with button -->
/*
<form class="searchform" role="search" method="get" action="/index.php">
    <input type="text" name="s" id="s" placeholder="<?php _e('Search', 'medula') . ' . . .'; ?>" />
    <button type="submit" title="<?php _e('Search', 'medula'); ?>">
        <i class="dashicons-search dashicons"></i>
    </button>
</form>
/**/


<?php 
/**
 * Template for disaplaying search forms
 */

// <!-- Search Form Type 1: simple text box -->
?>
<form class="searchform" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<input type="text" value="" name="s" id="s" placeholder="<?php _e('Type & Hit Enter', 'medula-t')?>" />
</form>
<?php

// <!-- Search Form Type 2: simple text box + icon -->
/*
<form id="searchform" method="get" action="/index.php">
    <input type="text" name="s" id="s" />
    <button type="submit" title="<?php _e('Search', 'medula-t')?>">
        <i class="dashicons-search dashicons"></i>
    </button>
</form>
/**/

// <!-- Search Form Type 3 with button -->
/*
<form class="searchform" method="get" action="/index.php">
    <input type="text" name="s" id="s" placeholder="<?php _e('Search', 'medula-t') . ' . . .'; ?>" />
    <button type="submit" title="<?php _e('Search', 'medula-t'); ?>">
        <i class="dashicons-search dashicons"></i>
    </button>
</form>
/**/


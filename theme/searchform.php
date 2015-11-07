<?php 

/*
<!-- Search Form Type 1: Default -->

<li id="search">
    <label for="s"><?php _e('Search:', 'medula-t')?></label>
    <form id="searchform" method="get" action="/index.php">
        <div>
            <input type="text" name="s" id="s" size="15" /><br />
            <input type="submit" value="<?php _e('Search','medula-t')?>" />
        </div>
    </form>
</li>


<!-- Search Form Type 2: simple clean + icon -->

<form id="searchform" method="get" action="/index.php">
    <input type="text" name="s" id="s" />
    <button type="submit" title="<?php _e('Search','medula-t')?>">
        <i class="dashicons-search dashicons"></i>
    </button>
</form>


<!-- Search Form Type 2: simple clean + icon -->
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
<input type="text" value="" name="s" id="s" placeholder="<?php _e('Type & Hit Enter','medula-t')?>" />
</form>


/**/
?>

<form class="searchform" method="get" action="/index.php">
    <input type="text" name="s" id="s" placeholder="<?php _e('Search . . .','medula-t')?>" />
    <button type="submit" title="<?php _e('Search','medula-t')?>">
        <i class="dashicons-search dashicons"></i>
    </button>
</form>

<?php 

// Sidebars & Widgetizes Areas
function osea_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'andamira-osea' ),
		'description' => __( 'The first (primary) sidebar.', 'andamira-osea' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	)); 



    /*  
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call
    your new sidebar just use the following code:

    Just change the name to whatever your new
    sidebar's id is, for example:

        'id' => 'sidebar2',

    To call the sidebar in your template, you can just copy
    the sidebar.php file in the root and rename it adding
	your new sidebar'sid to the file name.
    So using the above example, it would be:

    sidebar-sidebar2.php

    */

}

?>

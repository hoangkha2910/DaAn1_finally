<?php

/* ----------------------------------------------------------------
   SET PATH
-----------------------------------------------------------------*/

$path = get_template_directory() . '/includes/';


/* ----------------------------------------------------------------
   WIDGET SETUP
-----------------------------------------------------------------*/
/**
 * Include helper functions that display widget fields in the dashboard
 *
 * @since nora Widget Pack 1.0
 */
require $path . 'widgets/widget-social.php';
/*include category dropdown*/
require $path . '/category-dropdown.php';

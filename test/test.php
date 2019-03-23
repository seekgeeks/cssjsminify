<?php
/**
 * 
 * This file is just for test purpose, not to be used in production
 * 
 *  */
require '../vendor/autoload.php';

include '../src/Cssjsminify/Minify.php';

use CssJsminify\Minify as Mini; 

$mini   =    new Mini;

/**
 * 
 * Source directory to be minified
 * 
 */
$mini->target_css_dir    =   'static/css/';

/**
 * 
 * Target directory to be written
 * 
 *  */
$mini->target_js_dir    =   'static/js/';    


$mini->fcpath        =   dirname(__FILE__).DIRECTORY_SEPARATOR;

if( $mini->init_minify() != null )
{
    echo "<p style='color:green'>File minified successfully at destination ".$mini->minify_dir."</p>";
}
else
{
    echo "<p style='color:red'>Error in minification, please check destination folder's write permission: ".$mini->minify_dir."</p>";
}



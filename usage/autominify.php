<?php
/**
 * 
 * Please use this file to execute to minify your content
 * 
 *  */

include '../src/Cssjsminify/Minify.php';

use CssJsminify\Minify as Mini; 

$mini   =    new Mini;

/**
 * 
 * Source directory to be minified
 * 
 */
$mini->source_css_dir    =   'static/css/';

/**
 * 
 * Target directory to be written
 * 
 *  */
$mini->source_js_dir    =   'static/js/';    


$mini->fcpath        =   dirname(__FILE__).DIRECTORY_SEPARATOR;

if( $mini->init_minify() != null )
{
    echo "<p style='color:green'>File minified successfully at destination </p>";
}
else
{
    echo "<p style='color:red'>Error in minification, please check destination folder's write permission: </p>";
}



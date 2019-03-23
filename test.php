<?php

include 'src/Cssjsminify/Minify.php';

use CssJsminify\Minify; 

$cssjs  =  new Minify();

echo $cssjs->css();
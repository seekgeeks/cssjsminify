<?php

require 'vendor/autoload.php';

use CssJsminify\Minify;

$cssjs  =   new Minify();

echo $cssjs->css();

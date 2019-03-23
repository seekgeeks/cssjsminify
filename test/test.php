<?php

require '../vendor/autoload.php';

include '../src/Cssjsminify/Minify.php';

use CssJsminify\Minify as Mini; 

$mini   =    new Mini;

$mini->target_dir    =   'static/assets/';

$mini->minify_dir    =   'static/assests/min/';    

$mini->fcpath        =   dirname(__FILE__).DIRECTORY_SEPARATOR;

$mini->init_minify();



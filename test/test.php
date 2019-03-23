<?php

include '../src/Cssjsminify/Minify.php';

use CssJsminify\Minify as Mini; 

class Test extends Mini{
    /**
     * 
     * Path to all asset file where js and css files resides
     * change this value to your path
     * 
     *  */
    public $asset_path = 'static/';

    /**
     * 
     * Sub directory where minified javascript files will be stored
     * 
     * */
    public $js_target_dir  =   'js/';

    /**
     * 
     * Sub directory where minified css files will be stored
     * 
     * */
    public $css_target  =   'css/';


    /**
     * 
     * path to your project
     * 
     * */
    public $fcpath  =   '/Applications/MAMP/htdocs/seekgeeks/cssjsminify/test/';

    public function test_js(){
        $this->init_js($this->asset_path, $this->js_target_dir, $this->fcpath);
    }

}

$test   =    new Test;

$test->test_js();



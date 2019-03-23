<?php

namespace CssJsminify;

class Minify{


    /**
     * 
     * Path to all asset file where js and css files resides
     * change this value to your path
     * 
     *  */
    private const ASSET_PATH = '/static/';

    /**
     * 
     * Sub directory where minified javascript files will be stored
     * 
     * */
    private const JS_MIN_PATH  =   '/min/js/';

    /**
     * 
     * Sub directory where minified css files will be stored
     * 
     * */
    private const CSS_MIN_PATH  =   '/min/css/';


    /**
     * 
     * path to your project
     * 
     * */
    private const FCPATH  =   '/var/www/html/';

    /**
     * init_js will initialize paths and parameters for javascript file
     * will do logics like checking file modified time and path existance
     * if modified time found to be update, file will be minified
     * if file is new it will creare file and directory
     * 
     * 
     * 
     *  */
    public function init_js()
    {
        $asset     =   $this->ASSET_PATH;
        $target_dir =   

        $files          =   array_diff(scandir($target_dir), array('.', '..'));
        $minified_path  =   $this->JS_MIN_PATH;
        
        foreach($files as $file)
        {
            $sourcePath     =   $this->FCPATH.$target_dir.$file;
            $minifiedPath   =   $this->FCPATH.$asset.$minified_path.$file;

            $last_modified_source  =   filemtime($sourcePath);
            $last_modified_target  =   filemtime($minifiedPath);
            
            if (!file_exists( $asset.$minified_path.'/min/js/') )
            {
                mkdir( $asset.$minified_path.'/min/js/', 0777, true );
            }

            if( !file_exists( $minifiedPath ) || $last_modified_target < $last_modified_source )
            {
                $this->minify_js($sourcePath,$minifiedPath);
            }
        }
    }

    private function minify_js($src='',$minified='')
    {
        $minifier   = new \MatthiasMullie\Minify\JS($src);
        $minifier->minify($minified);
        $minifier->minify();
    }

}
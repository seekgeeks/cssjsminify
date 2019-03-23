<?php

namespace CssJsminify;

class Minify{
    /**
     * init_js will initialize paths and parameters for javascript file
     * will do logics like checking file modified time and path existance
     * if modified time found to be update, file will be minified
     * if file is new it will creare file and directory
     *
     *  */

    /**
     * DIR to be minified
     *
     * @var string
     */
    public $target_dir = '';

    /**
     * DIR to store minified files
     *
     * @var string
     */
    public $minify_dir = '';

    /**
     * Local DIR path
     *
     * @var string
     */
    public $fcpath = '';


    /**
     * Convert Css and js files from target_dir to minify_dir
     *
     */
    public function init_minify()
    {   

        $target_dir     =   $this->target_dir;
        $fcpath         =   $this->fcpath;
        $minify_dir     =   $this->minify_dir;
        $files          =   array_diff(scandir($fcpath.$target_dir), array('.', '..'));
        
        foreach ($files as $file)
        {
            $sourcePath     =   $fcpath.$target_dir.$file;
            $minifiedPath   =   $minify_dir.$file;

            if (!file_exists( $minify_dir) )
            {
                mkdir( $minify_dir, 0777, true );
            }

            $last_modified_source  =  filemtime($sourcePath);
            $last_modified_target  =  (file_exists($minifiedPath) ? filemtime($minifiedPath) : '0');
            
            if (!file_exists( $minifiedPath ) || $last_modified_target < $last_modified_source)
            {

                // echo $sourcePath;
                // echo $minifiedPath;
                $this->minify($sourcePath,$minifiedPath);
            } 
        }
    }

    private function minify( $src='',$minified='' )
    {   
        $file_ext   =   pathinfo($src,PATHINFO_EXTENSION);
        if ($file_ext    ==  'css') 
        {
            $minifier   =   new \MatthiasMullie\Minify\CSS($src);
        }elseif ($file_ext  ==  'js') 
        {
            $minifier   =   new \MatthiasMullie\Minify\JS($src);
        }
        $minifier->minify($minified);
        $minifier->minify();
    }
}

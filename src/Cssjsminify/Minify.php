<?php

namespace CssJsminify;

class Minify{
    /**
     * init_js will initialize paths and parameters for javascript file
     * will do logics like checking file modified time and path existance
     * if modified time found to be update, file will be minified
     * if file is new it will creare file and directory
     * 
     * 
     * 
     *  */
    public function init_js($asset, $target_dir, $fcpath)
    {

        $files          =   array_diff(scandir($fcpath.$asset.$target_dir), array('.', '..'));
        $minified_dir   =   $fcpath.$asset.'min/'.$target_dir;
        
        foreach ($files as $file)
        {
            $sourcePath     =   $fcpath.$asset.$target_dir.$file;
            $minifiedPath   =   $minified_dir.$file;

            if (!file_exists( $minified_dir) )
            {
                mkdir( $minified_dir, 0777, true );
            }

            $last_modified_source  =   filemtime($sourcePath);
            $last_modified_target  =   (file_exists($minifiedPath) ?  filemtime($minifiedPath) : '0');
            
            if( !file_exists( $minifiedPath ) || $last_modified_target < $last_modified_source )
            {

                // echo $sourcePath;
                // echo $minifiedPath;

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
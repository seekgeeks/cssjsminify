<?php
namespace CssJsminify;

@require '../vendor/autoload.php';

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
    public $source_css_dir = '';

    /**
     * DIR to store minified files
     *
     * @var string
     */
    public $source_js_dir = '';

    /**
     * Local DIR path
     *
     * @var string
     */
    public $fcpath = '';

    /**
     * 
     * Convert Css and js files from target_dir to minify_dir
     *
     */
    
    public function init_minify()
    
    {
        if( !$this->init_minify_css() OR !$this->init_minify_js() )
        {
            return false;
        }
        

        return true;
    }

    private function get_minify_dir( $target_dir )
    {
        $pieces     = array_filter(explode('/', $target_dir));
        $min_dir    = implode('/', array_slice($pieces, 0, -1));
        $min_dir    = $min_dir.'/min/'.end($pieces).'/';
        return $min_dir;
    }

    private function init_minify_css()
    {   

        $source_dir     =   $this->source_css_dir;
        $fcpath         =   $this->fcpath;
        $minify_dir     =   $this->get_minify_dir($source_dir);
        $files          =   array_diff(scandir($fcpath.$source_dir), array('.', '..'));
        
        foreach ( $files as $file )
        {
            $sourcePath     =   $fcpath.$source_dir.$file;
            $minifiedPath   =   $fcpath.$minify_dir.$file;

            if (!file_exists( $minify_dir) )
            {
                mkdir( $minify_dir, 0777, true );
            }

            $last_modified_source  =  filemtime( $sourcePath );
            $last_modified_target  =  ( file_exists($minifiedPath) ? filemtime($minifiedPath) : '0' );
            
            if (!file_exists( $minifiedPath ) || $last_modified_target < $last_modified_source)
            {   
                $this->minify($sourcePath,$minifiedPath);
            } 
        }

        return true;
    }

    private function init_minify_js()
    {   

        $source_dir     =   $this->source_js_dir;

        $fcpath         =   $this->fcpath;
        
        $minify_dir     =   $this->get_minify_dir($source_dir);
        
        $files          =   array_diff(scandir($fcpath.$source_dir), array('.', '..'));
        
        foreach ( $files as $file )
        {
            $sourcePath     =   $fcpath.$source_dir.$file;
            $minifiedPath   =   $minify_dir.$file;

            if (!file_exists( $minify_dir) )
            {
                mkdir( $minify_dir, 0777, true );
            }

            $last_modified_source  =  filemtime( $sourcePath );
            $last_modified_target  =  ( file_exists($minifiedPath) ? filemtime($minifiedPath) : '0' );
            
            if (!file_exists( $minifiedPath ) || $last_modified_target < $last_modified_source)
            {
                $this->minify($sourcePath,$minifiedPath);
            } 
        }

        return true;
    }


    /**
     * ## Core function 
     * This function simply takes source and destination path
     * Convert/minify file and write back
     * 
     * ### Parameters 
     *  - @param src string : path or source file
     * 
     *  - @param minified string : path for the destination file.
     * 
     *  - @return void
     * 
     *  */
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
        
        if( $minifier->minify($minified) )
        {
            return true;
        }

        return false;
        
    }
}

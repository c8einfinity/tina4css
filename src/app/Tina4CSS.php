<?php


class Tina4CSS {

    public function __construct(){
    }

    /** Function to check if the default-base.css file is missing and thus force a SCSS compile.
     * @return bool
     */
    public function yesCompile(){
        //Check if the CSS file exists
        if (!file_exists("./src/assets/css/default-base.css")) {
            // If the file does not exist, check to see if we need to create the folder first before returning true
            if (!file_exists("./src/assets/css")) {
                if (!is_dir("./src/assets/css") && !mkdir("./src/assets/css", 0777, true)) {
                    return false;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    /** Function to compile SCSS to CSS file using scssphp library. Two files are compiled,
     * a colors file with css variables to control the colours, and a base file with the css.
     * @param $path - Path pointing to the scss files directory to be compiled
     * @param $prefix - allows numerous scss folders to be compiled with a prefix added for each set.
     * @return bool
     * @throws \ScssPhp\ScssPhp\Exception\CompilerException
     */
    public function compile($path, $prefix){
        //Check if the given directory exists
        if (!is_dir($path)) {
            return false;
        }
        //Step through the scss files and do the relevant compiles.
        $scss = (new \ScssPhp\ScssPhp\Compiler());
        $cssContent = "";
        foreach (scandir($path) as $file) {
            if ($file !== '.' && $file !== '..') {
                $scssCode = file_get_contents($path . DIRECTORY_SEPARATOR . $file);
                // If a colors specific scss file exists it compiles that as a separate css file
                if ($file == "colors.scss"){
                    $cssColors = $scss->compile($scssCode);
                    file_put_contents("./src/assets/css/".$prefix."-colors.css", $cssColors );
                } else {
                    if (substr($file, 0, strpos($file, ".")+1) == "scss"){
                        $cssContent .= $scss->compile($scssCode);
                    }
                }
            }
        }
        file_put_contents("./src/assets/css/".$prefix."-base.css", $cssContent );
        return true;
    }

    // Function to alter the CSS filename to force autoCaching.
    public function autoVersion(){

    }


}
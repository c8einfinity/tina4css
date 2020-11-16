<?php


class Tina4CSS {

    public $message;

    public function __construct(){
    }

    // Function to compile SCSS to CSS file using scssphp library
    public function compile($path, $prefix){


        //Check if the directory exists
        $path = "./vendor/andrevanzuydam/tina4css/src/scss";
        if (!is_dir($path)) {
            throw new \RuntimeException("Directory '" . $path . "' does not exist");
        }
        //Step through the tina4 scss files and do the relevant compiles.
        $scss = (new \ScssPhp\ScssPhp\Compiler());
        $cssContent = "";
        foreach (scandir($path) as $file) {
            if ($file !== '.' && $file !== '..') {
                $scssCode = file_get_contents($path . DIRECTORY_SEPARATOR . $file);
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


    }

    // Function to alter the CSS filename to force autoCaching.
    public function autoVersion(){

    }

    /** Function to check if the default.css file is missing and thus force a SCSS compile.
     * @return bool
     */
    public function yesCompile(){
        if (!file_exists("./src/assets/css")) {
            if (!mkdir("./src/assets/css", 0777, true) && !is_dir("./src/assets/css")) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', "./src/assets/css"));
            }
        }
        if (!file_exists("./src/assets/css/default.css")) {
           return true;
        } else {
            return false;
        }
    }

}
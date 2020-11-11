<?php

//Some code to compile scss
$scss = (new \ScssPhp\ScssPhp\Compiler());
if (!file_exists("./src/assets/css")) {
    if (!mkdir("./src/assets/css", 0777, true) && !is_dir("./src/assets/css")) {
        throw new \RuntimeException(sprintf('Directory "%s" was not created', "./src/assets/css"));
    }
}

$scssContent = file_get_contents(__DIR__.DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."scss".DIRECTORY_SEPARATOR."colors.scss");
$scssContent .= file_get_contents(__DIR__.DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."scss".DIRECTORY_SEPARATOR."base.scss");
$css = $scss->compile($scssContent);
if (!file_exists("./src/assets/css/default.css")) {
    file_put_contents("./src/assets/css/default.css", $css );
}

//see if we find any other scss files and add then to the mix


\Tina4\Module::addModule("Tina4CSS", "1.0.0", "tina4css");
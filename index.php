<?php
// Compile the SCSS if required
$scss = (new Tina4CSS());
if ($scss->yesCompile()){
    $scss->compile("./vendor/andrevanzuydam/tina4css/src/scss", "tina4css");
    $scss->compile("./src/scss", "default");
}

// Add Tina4CSS as a module to Tina4
\Tina4\Module::addModule("Tina4CSS", "1.0.0", "Tina4CSS");
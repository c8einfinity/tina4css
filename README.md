# tina4css

Tina4 CSS is a Tina4 module that provides a base CSS, which can be used as is, or can be added to for the CSS for your project.

###Installation

The module is naturally included into Tina4, through the composer file autoloader.

Tina4 CSS files are found in the path

```\vendor\andrevanzuydam\tina4-css\src\scss\```

Any files used to overwrite the Tina4 CSS should be in the project folder path

```\src\scss\```

###Compilation

Tina4 CSS will automatically regenerate the CSS file, on the first load of Tina4, if the generated file ```default-base.css``` is deleted.

The generated CSS files will be in the projet folder path

```\src\assets\css\```

Four files are generated, two Tina4CSS files and two project files

```
default-base.css 
default-colors.css 
tina4css-base.css 
tina4css-colors.css
```


Any SCSS partial files, indicated by starting with '_' will not be included in the compile, and need to be imported into other SCSS files to be compiled, as you would expect for partials.

###Modification  

Should you decide to modify the generated CSS files, it is recommended that you change the file names, to avoid them getting overwritten, should the compile function be invoked somehow. 
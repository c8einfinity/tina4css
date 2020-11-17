# tina4css

Tina4 CSS is a Tina4 module that provides a base CSS, which can be used as is, or can be added to for the CSS for your project.

Tina4 CSS files are found in the path

```\vendor\andrevanzuydam\tina4-css\src\scss\```

Any files used to overwrite the Tina4 CSS should be in the project folder path

```\src\scss\```

The module is naturally included through the composer file autoloader.

The generated CSS file ```default.css``` will be in the projet folder path

```\src\assets\css\```

Tina4 CSS will automatically regenerate the CSS file, on the first load of Tina4, if the generated file ```default.css``` is deleted.  

Should you decide to modify the generated CSS files, it is recommended that you change the file names, to avoid them getting overwritten, should the compile function be invoked.
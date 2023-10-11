# moodle-filter_isymetaselectact
Adds a Filter to Moodle to automatically embed an ISy Metaselect Activiy -content in textfields.

This filter adds the possibility to get isymetaselectact content being automatically embedded in textfields based on the activityname.

In order to use this filter you have to activate it after installation and ensure that it is listed above any translation filter. If you have created an interactive content using ISy Metaselect Activiy you can embed it anywhere in the course you like by using the syntax {isymetaselectact:activity name}.

Example:

1. Create an ISy Metaselect Activiy with the name "course proposal"
2. (optional) Set the visibility to "available but not shown on course page"
3. Enter in any textfield the following pattern {isymetaselectact:course proposal}
4. It will be embedded automatically.

Please note, that the activity name is case sensitive!

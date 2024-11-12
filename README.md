1. Recommended versions of WP and plugins:
Wordpress - 6.6.2 (the version on which the theme is developed);
ACF PRO - 5.9.1 (the version on which the theme is developed);
Cyr-To-Lat - 6.1.0 (optional, used for automatic link transcription)

The theme files were compiled and minified using Gulp.

2. To install a theme using the Wordpress visual interface, you must first increase the parameters in the file
php.ini:
  upload_max_filesize = 30M
  post_max_size = 30M
  max_execution_time = 300
  max_input_time = 300

.htaccess(for Apachi):
  php_value upload_max_filesize 30M
  php_value post_max_size 30M
  php_value max_execution_time 300
  php_value max_input_time 300

You can also use an FTP client to upload files manually.


3. Activation of existing ACF fields:
Custom Fields -> Sync available -> Select and activate all groups of fields.


4. Templates of pages and publications.
For the main page, you need to choose the Main page template.
Sections for this template are implemented using the Flexible field, which makes it possible to reuse section templates multiple times and place them in any order.
The custom recording type "Movies" is available immediately after activating the theme. Date, rating and poster fields are implemented using ACF fields, genres are taxonomy (categories). 
All pre-created fields for all templates will be displayed on the page after execution of point 3.


5. Menu and general parameters (options):
Menu items are set in: Appearance -> Menus
The logo and name of the site are set in the "Options" tab, the fields for which are also saved in JSON format and are available in point 3.

6. Website operation.
Display of content and its orderliness is based on each selected parameter: sort type + genre + release date range.
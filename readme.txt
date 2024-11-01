=== WP Issuu Viewer ===
Version: 3.0
Stable tag: trunk
Contributors: jocken
Tags: Issuu, pdf, flash, publish
Requires at least: 3.0
Tested up to: 3.1


Uses the api from www.issuu.com to display your files

== Description ==

This plugin uses the api to display each pdf-file(you can do some hacking to the file and add all formats) on your issuu.com-account.

This will display as an embed object.

You need flash activated for this to work.

How to upload on issuu.com:

Log on to issuu.com. In the top right corner, there is a button that says "upload document".

There you can either upload a file from your computer or from an url. You need to fill in: Title, description, web name, keywords. You can also choose privacy etc.

The file you upload needs to be a pdf and it doesn't matter where you save it. Remember though: It takes a while for the document to be uploaded and then it also needs to render it to a flash file.

= Important! = 
This plugin doesn't use the pdfs you have on your wordpress installation.
You need to upload the documents to issuu.com

= Future release =
* Add functionality to choose formats
* Change number of objects to display
* More option to the function issuu_viewer()


== Installation ==

1. Upload `wpissuu.php` to the `/wp-content/plugins/` directory 
OR
1. Activate the plugin through the 'Plugins' menu in WordPress

2. Place `<?php issuu_viewer(); ?>` in your templates

== Frequently Asked Questions ==

No one yet!


== Screenshots ==

1. Admin interface.
2. User interface.

== Changelog ==

= 3.0 =
* Added option to choose the new version of embed issuu
* Choose where to view the fullscreen
* Choose layoutstyle, single or 2 page
* Choose to show flipbuttons on old version
* Changed height and width so you can write %, px, em or any other css-valid format.
* Updated design on admin page
* Added a css-class so you can style the boxes around

= 2.0 =
* Admin interface to change details.

= 1.0 =
* Write in file when changing details.





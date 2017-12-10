http://devdocs.magento.com/guides/v2.2/frontend-dev-guide/themes/theme-create.html
===============================================================
Create a storefront theme: walkthrough
The high-level steps required to add a new theme in the Magento system are the following:
a. Create a directory for the theme under app/design/frontend/<your_vendor_name>/<your_theme_name>.
b. Add a declaration file theme.xml and optionally create etc directory and 
   create a file named view.xml to the theme directory.
c. Add a composer.json file.
d. Add registration.php.
e. Create directories for CSS, JavaScript, images, and fonts.
f. Configure your theme in the Admin panel.
================================================================
Magento theme based on Luma
----------------------------
a. directory - app/design/frontend/Magento/theme-frontend-modluma
b. --- composer.json 
{
    "name": "magento/theme-frontend-modluma",
    "description": "N/A",
    "require": {
        "php": "7.0.2|7.0.4|~7.0.6|~7.1.0",
        "magento/theme-frontend-luma": "100.2.*",
        "magento/framework": "101.0.*"
    },
    "type": "magento2-theme",
    "version": "100.2.0.1",
    "license": [
        "OSL-3.0",
        "AFL-3.0"
    ],
    "autoload": {
        "files": [
            "registration.php"
        ]
    }
}
c. --- theme.xml 
<!--
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
-->
<theme xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Config/etc/theme.xsd">
    <title>Magento - Modified Luma</title>
    <!--<parent>Magento/blank</parent>-->
    <parent>Magento/luma</parent>
    <media>
        <preview_image>media/preview.jpg</preview_image>
    </media>
</theme>
d. --- registration.php
<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::THEME,
    'frontend/Magento/modluma',
    __DIR__
);
e. --- Setting the "media/preview.png" 
=======================================================================
'Layout Define':    
--------------
The basic view of all Magento storefront pages in defined in two page configuration 
layout files located in the Magento_Theme module. 
<Magento_Theme_module_dir>/view/frontend/layout/default.xml: defines the default page layout.   
<Magento_Theme_module_dir>/view/frontend/layout/default_head_blocks.xml: defines the scripts, images, 
and meta data included in pages’ <head> section
------------------------------------------------------- 
Module and theme layout files: 
------------------------------
The following terms are used to distinguish layouts provided by different application components:
Base layouts: Layout files provided by modules. Conventional location:
   Page configuration and generic layout files: <module_dir>/view/frontend/layout
   Page layout files: <module_dir>/view/frontend/page_layout
Theme layouts: Layout files provided by themes. Conventional location:
   Page configuration and generic layout files: <theme_dir>/<Namespace>_<Module>/layout
   Page layout files: <theme_dir>/<Namespace>_<Module>/page_layout
------------------------------------------------------










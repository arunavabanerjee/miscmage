
http://devdocs.magento.com/guides/v2.2/frontend-dev-guide/themes/theme-create.html
Prerequisites
 For the sake of compatibility, upgradability, and easy maintenance, do not modify the out of the box Magento themes. 
 To customize the design of your Magento store, create a new custom theme.
 Set your Magento application to the developer mode. The application mode influences the way static files are cached 
  by Magento. The recommendations about theme development we provide in this chapter are developer/default-mode specific.
  
Main Steps:
Create a storefront theme: walkthrough
The high-level steps required to add a new theme in the Magento system are the following:
    a. Create a directory for the theme under app/design/frontend/<your_vendor_name>/<your_theme_name>.
    a.1. Create a directory for the theme under app/design/frontend/Magento/<your_theme_name> like "theme-frontend-misterac". 
    b. Add a declaration file theme.xml and optionally create etc directory and create a file named view.xml to the theme directory.
    b.1 
    c. Add a composer.json file.
    d. Add registration.php.
    e. Create directories for CSS, JavaScript, images, and fonts.
    f. Configure your theme in the Admin panel.

  
  

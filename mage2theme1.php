
<?php
$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
$collection = $productCollection->create()->addAttributeToSelect('*')->load();
$storeManager = $objectManager->get('Magento\Store\Model\StoreManagerInterface');
$currentStoreId = $storeManager->getStore()->getId();
$rating = $objectManager->get("Magento\Review\Model\ResourceModel\Review\CollectionFactory");

//== get product collection
foreach ($collection as $product){ echo 'Name  =  '.$product->getId().'<br>';
   $reviewcollection = $rating->create()->addStoreFilter( $currentStoreId )
   			->addStatusFilter( \Magento\Review\Model\Review::STATUS_APPROVED )
   			->addEntityFilter( 'product', $product->getId() )->setDateOrder();	
   echo "<pre>";
   print_r($reviewcollection->getData()); 	
} 
?>

//=============================================================================================

<div id="menu2" class="tab-pane fade">
<?php
$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$catId = 803; // Parent Category ID
$subcategory = $objectManager->create('Magento\Catalog\Model\Category')->load($catId);
$subcats = $subcategory->getChildrenCategories(); ?>
<?php //get the make ?>
<select id="level-1" name="level-1">
<option pdata-id="0" data-id="" data-href="" value="" selected="selected"> Select... </option>    
<?php foreach($subcats as $subcat){
 $_category = $objectManager->create('Magento\Catalog\Model\Category')->load($subcat->getId()); ?>
<option pdata-id="0" data-id="<?php echo $subcat->getId();?>" data-href="<?php echo $subcat->getUrl();?>" value="<?php echo $subcat->getName();?>"> <?php echo $subcat->getName();?> </option>
<?php } ?>
</select>
<?php //get the model ?>
<select id="level-2" name="level-2">
<option pdata-id="0" data-id="" data-href="" value="" selected="selected"> Select... </option>    
<?php foreach($subcats as $subcat){
 $_category = $objectManager->create('Magento\Catalog\Model\Category')->load($subcat->getId()); 
 $subsubcats = $_category->getChildrenCategories();
 foreach($subsubcats as $subsubcat){ 
  $_subcategory = $objectManager->create('Magento\Catalog\Model\Category')->load($subsubcat->getId()); ?>
<option pdata-id="<?php echo $subcat->getId();?>" data-id="<?php echo $subsubcat->getId();?>" data-href="<?php echo $subsubcat->getUrl();?>" value="<?php echo $subsubcat->getName();?>"> <?php echo $subsubcat->getName();?> </option>
<?php }} ?>
</select>
<?php //get the engineyear ?>
<select id="level-3" name="level-3">
<option pdata-id="0" data-id="" data-href="" value="" selected="selected"> Select... </option>    
<?php foreach($subcats as $subcat){
 $_category = $objectManager->create('Magento\Catalog\Model\Category')->load($subcat->getId()); 
 $subsubcats = $_category->getChildrenCategories();
 foreach($subsubcats as $subsubcat){ 
  $_subcategory = $objectManager->create('Magento\Catalog\Model\Category')->load($subsubcat->getId()); 
  $subsubsubcats = $_subcategory->getChildrenCategories(); ?>
<?php foreach($subsubsubcats as $subsubsubcat){ ?>
<option pdata-id="<?php echo $subsubcat->getId();?>" data-id="<?php echo $subsubsubcat->getId();?>" data-href="<?php echo $subsubsubcat->getUrl();?>" value="<?php echo $subsubsubcat->getName();?>"> <?php echo $subsubsubcat->getName();?> </option>
<?php }}} ?>
</select>
         
<button type="submit" class="btn btn-default sub-btn search-btn">
    <i class="fa fa-search" aria-hidden="true"></i>Search</button>       
                    
<script>
require(["jquery"], function($){
 var optionlvl2 = ''; var optionlvl3 = '';  
 //change values on load    
$(document).ready(function(){ 
 $('#level-2').attr('disabled', 'true');
 $('#level-3').attr('disabled', 'true');
 $('#level-2 option').each(function(){ optionlvl2 += $(this)[0].outerHTML; }); 
 $('#level-3 option').each(function(){ optionlvl3 += $(this)[0].outerHTML; }); 
});    

//change the values on selection    
$('#level-1').change(function(){ 
 $('#level-2').empty().append(optionlvl2);
 $('#level-3').empty().append(optionlvl3);
 var idl1 = ''; 
 idl1 = parseInt( $('#level-1 option:selected').attr('data-id') ); //console.log(idl1);
 $('#level-2').removeAttr('disabled');
 $('#level-2 option').each(function(){ 
     $(this).css('display', ''); //$(this).removeAttr('selected');
 });
 $('#level-2 option').each(function(){ 
   var opt = parseInt( $(this).attr('pdata-id') ); //console.log(opt);
   //if( $(this).attr('pdata-id').indexOf(idl1) == -1 ){
   if( (opt != 0) && (idl1 != opt) ){ 
     //$(this).css('display', 'none');
     $(this).remove();
     //$(this).css('display', 'inline');
   } else {
      if( opt != 0){  
        idl2 = $(this).attr('data-id'); //$(this).attr('selected','selected');
      }  
   }
 });
});

$('#level-2').change(function(){ 
 $('#level-3').empty().append(optionlvl3); 
 var idl2 = '';
 idl2 = parseInt( $('#level-2 option:selected').attr('data-id') ); //console.log(idl2);
 $('#level-3').removeAttr('disabled');
 $('#level-3 option').each(function(){ 
     $(this).css('display', ''); //$(this).removeAttr('selected');
 });
 $('#level-3 option').each(function(){ 
  var opt = parseInt( $(this).attr('pdata-id') ); //console.log(opt);
  //if( $(this).attr('pdata-id').indexOf(idl2) == -1 ){
  if( (opt != 0) && (idl2 != opt) ) {  
    // $(this).css('display', 'none');
    $(this).remove();
    //$(this).css('display', 'inline');
  }
  /*else{
    if( opt != 0){ 
     $(this).attr('selected','selected'); 
    }  
  }*/
 });
});

//submit button
$('#menu2 .search-btn').click(function(){
 var $l1Url =  $('#level-1 option:selected').attr('data-href');   
 var $l2Url =  $('#level-2 option:selected').attr('data-href');    
 var $l3Url =  $('#level-3 option:selected').attr('data-href');    

 if( $l3Url != ''){ window.location.assign( $l3Url ); return; }
 if( $l2Url != ''){ window.location.assign( $l2Url ); return; }
 if( $l1Url != ''){ window.location.assign( $l1Url ); return; }
});

});
</script>                
</div>                       

============================================================================
//category filter on home page script

<script>
require(["jquery"], function($){
 var optionlvl2 = ''; var optionlvl3 = '';  
 //change values on load    
$(document).ready(function(){ 
 $('#level-2').attr('disabled', 'true');
 $('#level-3').attr('disabled', 'true');
 $('#level-2 option').each(function(){ optionlvl2 += $(this)[0].outerHTML; }); 
 $('#level-3 option').each(function(){ optionlvl3 += $(this)[0].outerHTML; }); 
});    

//change the values on selection    
$('#level-1').change(function(){ 
 $('#level-2').empty().append(optionlvl2);
 $('#level-3').empty().append(optionlvl3);
 var idl1 = ''; 
 idl1 = parseInt( $('#level-1 option:selected').attr('data-id') ); //console.log(idl1);
 $('#level-2').removeAttr('disabled');
 $('#level-2 option').each(function(){ 
     $(this).css('display', ''); //$(this).removeAttr('selected');
 });
 $('#level-2 option').each(function(){ 
   var opt = parseInt( $(this).attr('pdata-id') ); //console.log(opt);
   //if( $(this).attr('pdata-id').indexOf(idl1) == -1 ){
   if( (opt != 0) && (idl1 != opt) ){ 
     //$(this).css('display', 'none');
     $(this).remove();
     //$(this).css('display', 'inline');
   } else {
      if( opt != 0){  
        idl2 = $(this).attr('data-id'); //$(this).attr('selected','selected');
      }  
   }
 });
});

$('#level-2').change(function(){ 
 $('#level-3').empty().append(optionlvl3); 
 var idl2 = '';
 idl2 = parseInt( $('#level-2 option:selected').attr('data-id') ); //console.log(idl2);
 $('#level-3').removeAttr('disabled');
 $('#level-3 option').each(function(){ 
     $(this).css('display', ''); //$(this).removeAttr('selected');
 });
 $('#level-3 option').each(function(){ 
  var opt = parseInt( $(this).attr('pdata-id') ); //console.log(opt);
  //if( $(this).attr('pdata-id').indexOf(idl2) == -1 ){
  if( (opt != 0) && (idl2 != opt) ) {  
    // $(this).css('display', 'none');
    $(this).remove();
    //$(this).css('display', 'inline');
  }
  /*else{
    if( opt != 0){ 
     $(this).attr('selected','selected'); 
    }  
  }*/
 });
});

//submit button
$('#menu2 .search-btn').click(function(){
 var $l1Url =  $('#level-1 option:selected').attr('data-href');   
 var $l2Url =  $('#level-2 option:selected').attr('data-href');    
 var $l3Url =  $('#level-3 option:selected').attr('data-href');    

 if( $l3Url != ''){ window.location.assign( $l3Url ); return; }
 if( $l2Url != ''){ window.location.assign( $l2Url ); return; }
 if( $l1Url != ''){ window.location.assign( $l1Url ); return; }
});

});
</script>                




===============================================================
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
----------------------------------------
{
    "name": "magento/theme-frontend-luma",
    "description": "N/A",
    "require": {
        "php": "~5.5.0|~5.6.0|~7.0.0",
        "magento/theme-frontend-blank": "100.0.*",
        "magento/framework": "100.0.*"
    },
    "type": "magento2-theme",
    "version": "100.0.1",
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
============================================================================================================
Removing resources: 
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
   <head>
        <!-- Remove local resources -->
        <remove src="css/styles-m.css" />
        <remove src="my-js.js"/>
        <remove src="Magento_Catalog::js/compare.js" />
								
	<!-- Remove external resources -->
        <remove src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"/>
        <remove src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"/>
        <remove src="http://fonts.googleapis.com/css?family=Montserrat" /> 
   </head>
============================================================================================================
$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$storeInformation = $objectManager->create('Magento\Store\Model\Information');
$store = $objectManager->create('Magento\Store\Model\Store');
$storeInfo = $storeInformation->getStoreInformationObject($store);
$store_email = $objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('trans_email/ident_general/email');
$store_phone = $storeInfo->getPhone();










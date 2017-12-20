
//submit button
$('#menu2 .search-btn').click(function(){
var $l1Url =  $('#level-1 option:selected').attr('data-href');   
var $l2Url =  $('#level-2 option:selected').attr('data-href');    
var $l3Url =  $('#level-3 option:selected').attr('data-href');    

if( $l3Url != ''){ window.location.assign( $l3Url ); }
if( $l2Url != ''){ window.location.assign( $l2Url ); }
if( $l1Url != ''){ window.location.assign( $l1Url ); }

});


======================================================================================================
<?php
$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$catId = 803; // Parent Category ID
$subcategory = $objectManager->create('Magento\Catalog\Model\Category')->load($catId);
$subcats = $subcategory->getChildrenCategories(); ?>
<?php //get the make ?>
<select id="level-1" name="level-1">
<?php foreach($subcats as $subcat){
 $_category = $objectManager->create('Magento\Catalog\Model\Category')->load($subcat->getId()); ?>
<option pdata-id="0" data-id="<?php echo $subcat->getId();?>" data-href="<?php echo $subcat->getUrl();?>" value="<?php echo $subcat->getName();?>"> <?php echo $subcat->getName();?> </option>
<?php } ?>
</select>
<?php //get the model ?>
<select id="level-2" name="level-2">
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
<?php foreach($subcats as $subcat){
 $_category = $objectManager->create('Magento\Catalog\Model\Category')->load($subcat->getId()); 
 $subsubcats = $_category->getChildrenCategories();
 foreach($subsubcats as $subsubcat){ 
  $_subcategory = $objectManager->create('Magento\Catalog\Model\Category')->load($subsubcat->getId()); 
  $subsubsubcats = $_subcategory->getChildrenCategories();
 foreach($subsubsubcats as $subsubsubcat){ ?>
<option pdata-id="<?php echo $subsubcat->getId();?>" data-id="<?php echo $subsubsubcat->getId();?>" data-href="<?php echo $subsubsubcat->getUrl();?>" value="<?php echo $subsubsubcat->getName();?>"> <?php echo $subsubsubcat->getName();?> </option>
<?php }}} ?>
</select>

<script>
require(["jquery"], function($){
$('#level-1').change(function(){ 
 var idl1 = ''; var idl2 = '';
 idl1 = $('#level-1 option:selected').attr('data-id');
 $('#level-2 option').each(function(){ 
  if( ($('#level-2 option').attr('pdata-id')) !=  idl1 ){
    $('#level-2 option').attr('display', 'none');
  } else {  id2 = $('#level-2 option').attr('data-id'); }
 });
 $('#level-3 option').each(function(){ 
  if( ($('#level-3 option').attr('pdata-id')) !=  idl2 ){
    $('#level-3 option').attr('display', 'none');
  }
 });
}); 
});
</script>



==============================================================================================
<?php
$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$catId = 2; // Parent Category ID
$subcategory = $objectManager->create('Magento\Catalog\Model\Category')->load($catId);
$subcats = $subcategory->getChildrenCategories();
$_helper = $this->helper('Magento\Catalog\Helper\Output');
?>
<ul class="nav navbar-nav navbar-right">
<li class="active"><a href="<?php echo $block->getBaseUrl(); ?>">Home</a></li>      
<?php
foreach ($subcats as $subcat) {
$_category = $objectManager->create('Magento\Catalog\Model\Category')->load($subcat->getId());
$menucat = $_category->getIncludeInMenu();
if($menucat==0){ continue;}
$_outputhelper = $this->helper('Magento\Catalog\Helper\Output');
$subcaturl = $subcat->getUrl();
?>
<li>
<a class="dropdown" href="<?php echo $subcaturl ?>"><?php echo $subcat->getName();?></a>
</li>
<?php } ?>
</ul>

===============================================================================================



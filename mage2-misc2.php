
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



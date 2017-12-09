                <div class="nav-section">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">   
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
                   </div>
             
               </div>           
           </div>
$objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        
 
$appState = $objectManager->get('\Magento\Framework\App\State');
$appState->setAreaCode('frontend');
 
$storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
$store = $storeManager->getStore();
 
echo $store->getUrl('product/33'); echo '<br>';
echo $store->getCurrentUrl(); echo '<br>';
echo $store->getBaseUrl(); echo '<br>';
echo $store->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_WEB); echo '<br>';
echo $store->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA); echo '<br>';
$this->_storeManager->getStore()->getBaseUrl();

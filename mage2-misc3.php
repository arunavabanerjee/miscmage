
//template in a static block
{{block class="Magento\Framework\View\Element\Template" template="Vendor_Module::myfiles/myfile.phtml"}}
{{block class="Magento\CatalogSearch\Block\Advanced\Form" name="block_name" template="Magento_CatalogSearch::advanced/form.phtml"}}

//current url
$urlInterface = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\UrlInterface'); 
$urlInterface->getCurrentUrl();

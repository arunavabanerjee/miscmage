
//static block
<referenceContainer name="content">
<block class="Magento\Cms\Block\Block" name="block_identifier">
<arguments>
<argument name="block_id" xsi:type="string">block_identifier</argument>
</arguments>
</block>
</referenceContainer>
<?php echo $block->getLayout()->createBlock('Magento\Cms\Block\Block')->setBlockId('block_identifier')->toHtml();?>
{{block class="Magento\\Cms\\Block\\Block" block_id="block_identifier"}}

//template in a static block
{{block class="Magento\Framework\View\Element\Template" template="Vendor_Module::myfiles/myfile.phtml"}}
{{block class="Magento\CatalogSearch\Block\Advanced\Form" name="block_name" template="Magento_CatalogSearch::advanced/form.phtml"}}

//current url
$urlInterface = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\UrlInterface'); 
$urlInterface->getCurrentUrl();


//total records in the collections
 <?php
    $objManager = \Magento\Framework\App\ObjectManager::getInstance();
    $mvFactory = $objManager->get('Magento\Reports\Model\Product\Index\Factory');
    echo count( $mvFactory->get('viewed')->getCollection() ); echo '<br/>';
    foreach( $mvFactory->get('viewed')->getCollection() as $colObject ){ echo $colObject->getId(); echo '  '; }
?>



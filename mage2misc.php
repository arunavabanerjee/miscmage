
//clone a git branch
git clone [url] -b [branch-name]

//mysqldump 
mysqldump -u root -p test_bigphoneshop_v1 > test_bigphoneshop_v1.sql

//total records in the collections
 <?php
    $objManager = \Magento\Framework\App\ObjectManager::getInstance();
    $mvFactory = $objManager->get('Magento\Reports\Model\Product\Index\Factory');
    echo count( $mvFactory->get('viewed')->getCollection() ); echo '<br/>';
    foreach( $mvFactory->get('viewed')->getCollection() as $colObject ){ echo $colObject->getId(); echo '  '; }
?>



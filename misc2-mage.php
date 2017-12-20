
$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
 $cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 

// retrieve quote items collection
$itemsCollection = $cart->getQuote()->getItemsCollection();

// get array of all items what can be display directly
$itemsVisible = $cart->getQuote()->getAllVisibleItems();

// retrieve quote items array
 $items = $cart->getQuote()->getAllItems();

foreach($items as $item) {
     echo 'ID: '.$item->getProductId().'<br />';
      echo 'Name: '.$item->getName().'<br />';
       echo 'Sku: '.$item->getSku().'<br />';
       echo 'Quantity: '.$item->getQty().'<br />';
      echo 'Price: '.$item->getPrice().'<br />';
    echo "<br />";            
  }

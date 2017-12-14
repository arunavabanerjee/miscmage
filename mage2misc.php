
////// cart
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

---------------------------------------------------------------------

Get total items and total quantity in cart


$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 

$totalItems = $cart->getQuote()->getItemsCount();
$totalQuantity = $cart->getQuote()->getItemsQty();

$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 
 
$totalItems = $cart->getQuote()->getItemsCount();
$totalQuantity = $cart->getQuote()->getItemsQty();

---------------------------------------------------------------------

Get subtotal and grand total price of cart


$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 

$subTotal = $cart->getQuote()->getSubtotal();
$grandTotal = $cart->getQuote()->getGrandTotal();

$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 
 
$subTotal = $cart->getQuote()->getSubtotal();
$grandTotal = $cart->getQuote()->getGrandTotal();

----------------------------------------------------------------------------

Get subtotal and grand total price of cart


$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 

$subTotal = $cart->getQuote()->getSubtotal();
$grandTotal = $cart->getQuote()->getGrandTotal();

$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 
 
$subTotal = $cart->getQuote()->getSubtotal();
$grandTotal = $cart->getQuote()->getGrandTotal();

----------------------------------------------------------------------------

Get billing and shipping addresses


$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 

$billingAddress = $cart->getQuote()->getBillingAddress();
echo '<pre>'; print_r($billingAddress->getData()); echo '</pre>';

$shippingAddress = $cart->getQuote()->getShippingAddress();
echo '<pre>'; print_r($shippingAddress->getData()); echo '</pre>';

$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 
 
$billingAddress = $cart->getQuote()->getBillingAddress();
echo '<pre>'; print_r($billingAddress->getData()); echo '</pre>';
 
$shippingAddress = $cart->getQuote()->getShippingAddress();
echo '<pre>'; print_r($shippingAddress->getData()); echo '</pre>';

------------------------------------------------------------------------------------

Using Dependency Injection (DI)
------------------------------------------------------------------------------------
In the above code in Object Manager, object of class \Magento\Checkout\Model\Cart used. 
But, we can also use the object of class \Magento\Checkout\Model\Session.

Here is your block class code:


namespace YourCompany\YourModule\Block;
class YourModule extends \Magento\Framework\View\Element\Template
{    
    protected $_cart;    
    protected $_checkoutSession;    
        
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        ...
		\Magento\Checkout\Model\Cart $cart,
		\Magento\Checkout\Model\Session $checkoutSession,
        array $data = []
    )
    {
		$this->_cart = $cart;
		$this->_checkoutSession = $checkoutSession;
		
        parent::__construct($context, $data);
    }
    
    public function getCart()
    {		
		return $this->_cart;
    }
	
    public function getCheckoutSession()
    {
		return $this->_checkoutSession;
    }
}

-----------------------------------------------------------------------
namespace YourCompany\YourModule\Block;
class YourModule extends \Magento\Framework\View\Element\Template
{    
    protected $_cart;    
    protected $_checkoutSession;    
        
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        ...
        \Magento\Checkout\Model\Cart $cart,
        \Magento\Checkout\Model\Session $checkoutSession,
        array $data = []
    )
    {
        $this->_cart = $cart;
        $this->_checkoutSession = $checkoutSession;
        
        parent::__construct($context, $data);
    }
    
    public function getCart()
    {        
        return $this->_cart;
    }
    
    public function getCheckoutSession()
    {
        return $this->_checkoutSession;
    }
}

Your .phtml template code:


// Get all items in cart

$quote = $block->getCheckoutSession()->getQuote();
$items = $quote->getAllItems();
 
foreach($items as $item) {
    echo 'ID: '.$item->getProductId().'<br />';
    echo 'Name: '.$item->getName().'<br />';
    echo 'Sku: '.$item->getSku().'<br />';
    echo 'Quantity: '.$item->getQty().'<br />';
    echo 'Price: '.$item->getPrice().'<br />';
    echo "<br />";            
}

// Get total items and total quantity in cart

$totalItems = $quote->getItemsCount();
$totalQuantity = $quote->getItemsQty();

//Get subtotal and grand total price of cart

$subTotal = $quote->getSubtotal();
$grandTotal = $quote->getGrandTotal();

//Get billing and shipping addresses

$billingAddress = $quote->getBillingAddress();
$shippingAddress = $quote->getShippingAddress();


// Get all items in cart
 
$quote = $block->getCheckoutSession()->getQuote();
$items = $quote->getAllItems();
 
foreach($items as $item) {
    echo 'ID: '.$item->getProductId().'<br />';
    echo 'Name: '.$item->getName().'<br />';
    echo 'Sku: '.$item->getSku().'<br />';
    echo 'Quantity: '.$item->getQty().'<br />';
    echo 'Price: '.$item->getPrice().'<br />';
    echo "<br />";            
}
 
// Get total items and total quantity in cart
 
$totalItems = $quote->getItemsCount();
$totalQuantity = $quote->getItemsQty();
 
//Get subtotal and grand total price of cart
 
$subTotal = $quote->getSubtotal();
$grandTotal = $quote->getGrandTotal();
 
//Get billing and shipping addresses
 
$billingAddress = $quote->getBillingAddress();
$shippingAddress = $quote->getShippingAddress();

-----------------------------------------------------------------------------------------

/// get layout
    <?php 
    echo $this->getLayout()
        ->createBlock('Magento\Framework\View\Element\Template')
        ->setTemplate('Magento_Search::form.mini.phtml');->toHtml(); ?>


--------------------------------------------------------------------------


{{block class="Magento\HelloWorld\Block\HelloWorld" name="your_block_name" template="Magento_HelloWorld::helloworld.phtml"}}

echo $this->getLayout()
          ->createBlock('Magento\HelloWorld\Block\HelloWorld')
          ->setTemplate('Magento_HelloWorld::helloworld.phtml')
          ->toHtml();

--------------------------------------------------------------------------

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



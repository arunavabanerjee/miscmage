=====================================================
=== a. module config -- app/etc/modules/MGOverride_All.xml
<config>
    <modules>
	    <MGOverride_HelloWorld>
            <active>true</active>
            <codePool>local</codePool>
	          <version>0.1.0</version>
	    </MGOverride_HelloWorld>	
    </modules>
</config>
=======================================================
=== b. config -- MGOverride/HelloWorld/etc/config.xml
<config>
  <modules>
    <MGOverride_HelloWorld>
      <version>0.1.0</version>
    </MGOverride_HelloWorld>
  </modules>
  <frontend>
	<routers>
	<helloworld>
		<use>standard</use>
		<args>
			<module>MGOverride_HelloWorld</module>
      <frontName>helloworld</frontName>
		</args>
	</helloworld>
	</routers>
  </frontend>
</config>
=========================================================
=== c. Url -- /index.php/helloworld/ , /index.php/helloworld/index/ , /index.php/helloworld/index/index 
=== will hit the same index method in IndexController
=== file -- MGOverride/HelloWorld/controllers/IndexController.php
class MGOverride_HelloWorld_IndexController extends Mage_Core_Controller_Front_Action{

    public function indexAction(){
        echo "We're echoing just to show that this is what's called, 
		          normally you'd have some kind of redirect going on here";
	      echo "Index Action";
    }
    
    public function fooAction(){
	      echo 'Index Foo Action';
    }

    public function addAction(){
        echo 'Index add Action';
    }

    public function deleteAction(){
        echo 'Index delete Action';
    }        
}
==========================================================





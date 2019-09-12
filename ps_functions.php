/*corresponding template - themes/default-bootstrap */
{capture name=path}{l s='Register Opticians'}{/capture}
<h1 class="font-even-30 text-black f-w-700 text-uppercase mab-40 mat-30">
	{l s='Opticians Registeration'} - {if isset($customerThread) && $customerThread}{l s='Your reply'}{else}{l s='Form'}{/if}
</h1>
{if isset($confirmation)}
	<p class="alert alert-success">{l s='Your message has been successfully sent to our team.'}</p>
	<ul class="footer_links clearfix">
		<li>
			<a class="btn btn-default button button-small" href="{if isset($force_ssl) && $force_ssl}{$base_dir_ssl}{else}{$base_dir}{/if}">
				<span>
					<i class="icon-chevron-left"></i>{l s='Home'}
				</span>
			</a>
		</li>
	</ul>
{elseif isset($alreadySent)}
	<p class="alert alert-warning">{l s='Your message has already been sent.'}</p>
	<ul class="footer_links clearfix">
		<li>
			<a class="btn btn-default button button-small" href="{if isset($force_ssl) && $force_ssl}{$base_dir_ssl}{else}{$base_dir}{/if}">
				<span>
					<i class="icon-chevron-left"></i>{l s='Home'}
				</span>
			</a>
		</li>
	</ul>
{else}
<div class="loginsection mab-60">
	{include file="$tpl_dir./errors.tpl"}
	<form id="opticians-register" action="{$request_uri}" method="post" class="contact-form-box" enctype="multipart/form-data">
		<fieldset>
			<h3 class="logintitle font-even-18 text-uppercase text-black may-20 text-blue">{l s='Please Enter Following Details:'}</h3>
			<div class="row clearfix"> 
				<div class="col-12 col-md-6 border-right-1 border-color-light">
					<p class="form-group" style="padding-top:10px;font-weight:800;font-size:17px;"><u><strong>Optician Details :</strong></u></p>
					<p class="form-group">
						<label class="font-even-16 f-w-700" for="id_contact">{l s='Enter Name'}</label>
						<input type="text" class="form-control" id="optician_name" name="optician_name" placeholder="Enter Name" value=""/>
					</p>

					<p class="form-group">					
						<label class="font-even-16 f-w-700" for="id_contact">{l s='Enter Description'}</label>
						<input type="textarea" class="form-control" id="optician_desc" name="optician_desc" placeholder="Enter Description" value="" />
					</p>

					<p class="form-group">
						<label class="font-even-16 f-w-700" for="id_contact">{l s='Enter Phone'}</label>
						<input type="text" class="form-control" id="optician_phone" name="optician_phone" placeholder="Enter Phone" value="" />
					</p>

					<p class="form-group">
						<label class="font-even-16 f-w-700" for="id_contact">{l s='Enter Mobile Phone'}</label>
						<input type="text" class="form-control" id="optician_mphone" name="optician_mphone" placeholder="Enter Mobile No" value="" />
					</p>
				</div>

				<div class="col-12 col-md-6">
					<p class="form-group" style="padding-top:10px;font-weight:800;font-size:17px;"><u><strong>Optician Address Details :</strong></u></p>
					<p class="form-group">
						<label class="font-even-16 f-w-700" for="id_contact">{l s='Enter Address'}</label>
						<input type="text" class="form-control" id="optician_address1" name="optician_address1" placeholder="Enter Address" value="" />
					</p>

					<p class="form-group">					
						<label class="font-even-16 f-w-700" for="id_contact">{l s='Enter Address2'}</label>
						<input type="text" class="form-control" id="optician_address2" name="optician_address2" placeholder="Enter Address(more details)" value="" />
					</p>

					<p class="form-group">
						<label class="font-even-16 f-w-700" for="id_contact">{l s='Enter Zip/Postal Code'}</label>
						<input type="text" class="form-control" id="optician_zip" name="optician_zip" placeholder="Enter Zip/Postal Code" value="" />
					</p>

					<p class="form-group">
						<label class="font-even-16 f-w-700" for="id_contact">{l s='Enter City'}</label>
						<input type="text" class="form-control" id="optician_city" name="optician_city" placeholder="Enter City" value="" />
					</p>

					<!--<p class="form-group">
						<label class="font-even-16 f-w-700" for="id_contact">{l s='Enter Country'}</label>
						<input type="text" class="form-control" id="optician_country" name="optician_country" placeholder="Enter Country" value="" />
					</p>

					<p class="form-group">
						<label class="font-even-16 f-w-700" for="id_contact">{l s='Enter State'}</label>
						<input type="text" class="form-control" id="optician_state" name="optician_state" placeholder="Enter State" value="" />
					</p>-->

					<p class="form-group">
						<label for="id_contact">{l s='Enter Country'}</label>
						<select class="form-control" id="optician_country" name="optician_country">
							<option value="0" selected="selected">{l s='-- Choose --'}</option>
							{$countries_list}
						</select>						
					</p>

					<p class="form-group">
						<label for="id_contact">{l s='Enter State'}</label>
						<select class="form-control" id="optician_state" name="optician_state"></select>						
					</p>

				</div>
			</div>	
			<div class="submit">
				<p class="form-group">
					<div class="" style="margin-bottom:5px;">
						<input type="checkbox" class="form-control" id="agree_store" name="agree_store" value="" />
						<label class="font-even-16 f-w-700" for="id_contact" style="float: left;margin: -19px 0 0 21px;">{l s='By clicking you agree for the site to store your details'}</label>
					</div>
					<div class="">	
						<input type="checkbox" class="form-control" id="agree_terms" name="agree_terms" value="" />
						<label class="font-even-16 f-w-700" for="id_contact" style="float: left;margin: -19px 0 0 21px;">{l s='By clicking you agree to the Terms and Conditions'}</label>
					</div>	
				</p>

				<p class="form-group">
					<button type="submit" class="loginbtn background-blue text-white f-w-600 font-odd-15 border-radius-5 border-0 exclusive" 
																						name="submitOpticianDetails" id="submitOpticianDetails">
						<span>{l s='Submit'}</span>
					</button>
				</p>
			</div>
		</fieldset>
	</form>
</div>	
{/if}
{literal}
<script>
$(document).on('change', '#optician_country', function(){ 
  var selCountryId = $(this).val(); alert(selCountryId);
  $.ajax({
	 url: window.location.href, 
	 cache: 'false',
	 type: 'POST', 
	 data: {
			ajax: 'true',
			controller: 'opticiansregister',
			action: 'assignStates',
			id: selCountryId,
		  },
	 success: function(result){ //console.log(result);
		//console.log(result);
		$('#optician_state').html(result);
	 },
  });
});
$('#opticians-register').on('submit', function(){ 
   	if(! $('#agree_store').is(':checked')){
		alert('Please Agree To Site Collecting Your Details'); return false;
	}

   	if(! $('#agree_terms').is(':checked')){
		alert('Please Agree To Terms and Conditions'); return false;
	}

});

</script>
{/literal}

/*controller - override/controllers/front*/
class OpticiansRegisterController extends FrontController
{
    public $php_self = 'opticiansregister';
    public $ssl = false;

	/**
	 * Initialize the controller
	 */
	public function init(){
		parent::init(); //var_dump($_SERVER['REQUEST_URI']);

		$this->context->smarty->assign(array(
            'hide_left_column'    => $this->display_column_left,
            'hide_right_column'   => $this->display_column_right,
		));
	}

	/**
	 * Set Media for the page
	 *
	 */
    public function setMedia()
    {
        parent::setMedia();
        $this->addCSS(_THEME_CSS_DIR_.'contact-form.css');
        $this->addJS(_THEME_JS_DIR_.'contact-form.js');
        $this->addJS(_PS_JS_DIR_.'validate.js');
    }

    /**
    * Assign template vars related to page content
    */
    public function initContent()
    {

		if(Tools::getValue('ajax')){  $this->ajaxProcessAssignStates(); } 

        parent::initContent();

		$this->assignCountries();

        $email = Tools::safeOutput(Tools::getValue('from',
        		((isset($this->context->cookie) && isset($this->context->cookie->email) && Validate::isEmail($this->context->cookie->email)) ? $this->context->cookie->email : '')));
        $this->context->smarty->assign(array(
            'errors' => $this->errors,
            'email' => $email,
            'fileupload' => Configuration::get('PS_CUSTOMER_SERVICE_FILE_UPLOAD'),
            'max_upload_size' => (int)Tools::getMaxUploadSize()
        ));

        if (($id_customer_thread = (int)Tools::getValue('id_customer_thread')) && $token = Tools::getValue('token')) {
            $customer_thread = Db::getInstance()->getRow('
				SELECT cm.*
				FROM '._DB_PREFIX_.'customer_thread cm
				WHERE cm.id_customer_thread = '.(int)$id_customer_thread.'
				AND cm.id_shop = '.(int)$this->context->shop->id.'
				AND token = \''.pSQL($token).'\'
			');
            $order = new Order((int)$customer_thread['id_order']);
            if (Validate::isLoadedObject($order)) {
                $customer_thread['reference'] = $order->getUniqReference();
            }
            $this->context->smarty->assign('customerThread', $customer_thread);
        }

        $contactKey = md5(uniqid(microtime(), true));
        $this->context->cookie->__set('contactFormKey', $contactKey);

        $this->context->smarty->assign(array(
            'contacts' => Contact::getContacts($this->context->language->id),
            'message' => html_entity_decode(Tools::getValue('message')),
            'contactKey' => $contactKey,
        ));

        $this->setTemplate(_PS_THEME_DIR_.'register-opticians.tpl');
    }


    /**
    * Start forms process
    */
    public function postProcess()
    {
        if (Tools::isSubmit('submitOpticianDetails')) { 
			//var_dump($_POST); var_dump($this->context); exit;
			/**
			 * After submission process, create the optician i.e. supplier 
			 * Also, create an login for supplier. 
			 */
			/* generate a supplier or optician */
			$an_optician = new Supplier((int)0, $this->context->language->id);
			$an_optician->name = Tools::getValue("optician_name", null);
			$an_optician->active = 1; 
			$an_optician->description = Tools::getValue("optician_desc", null);
			$an_optician->meta_title = Tools::getValue("optician_name", null);
			$an_optician->meta_description = Tools::getValue("optician_name", null); 
			$opticianId = $an_optician->save();

			/* generate the address of the supplier */
			$opt_address_id=0; $id_country = 17; $id_state = 0;
			$opt_address = new Address(); 
            $opt_address->alias = Tools::getValue('optician_name', null);
            $opt_address->lastname = 'supplier'; // skip problem with numeric characters in supplier name
            $opt_address->firstname = 'supplier'; // skip problem with numeric characters in supplier name
            $opt_address->address1 = Tools::getValue("optician_address1", null);
            $opt_address->address2 = Tools::getValue("optician_address2", null);
            $opt_address->postcode = Tools::getValue("optician_zip", null);
            $opt_address->phone = Tools::getValue("optician_phone", null);
            $opt_address->phone_mobile = Tools::getValue("optician_mphone", null);
            $opt_address->id_country = (int)Tools::getValue("optician_country", null);
            $opt_address->id_state = (int)Tools::getValue("optician_state", null);
            $opt_address->city = Tools::getValue("optician_city", null);
			$opt_address->id_supplier = $opticianId;
			/* validate the address */
            $validation = $opt_address->validateController();
            // checks address validity
            if (count($validation) > 0) {
                foreach ($validation as $item) {
                    $this->errors[] = $item;
                }
                $this->errors[] = Tools::displayError('The address is not correct. Please make sure all of the required fields are completed.');
			} else {
				 $opt_address_id = $opt_address->save();
			}

			/*generate a login for the supplier */
			$opt_employee = new Employee((int)0);  
			if(strstr($_POST["optician_name"], ' ')){ 
				$names = explode(' ', $_POST["optician_name"], 2); 
				$opt_employee->lastname = $names[1];
				$opt_employee->firstname = $names[0];
			}else{
				$opt_employee->lastname = $_POST["optician_name"];
				$opt_employee->firstname = $_POST["optician_name"];
			}
			//remove special characters from name
			$email_namestring = preg_replace('/[^A-Za-z0-9\-]/', '', $_POST["optician_name"]); 
			$opt_employee->email = strtolower('s').'_'.strtolower($email_namestring).'@contactplus.com';
			$opt_employee->passwd = Tools::encrypt('password1234'); 
			$opt_employee->id_lang = 1; $opt_employee->id_profile = 4; 
			$opt_employee->default_tab = 1; 
			$opt_employee->add(); 

            if (count($this->errors) > 1) {
            	array_unique($this->errors);
            } elseif (!count($this->errors)) {
            	$this->context->smarty->assign('confirmation', 1);
            }

        }
    }

    /**
     * Assign template vars related to countries display
     */
    protected function assignCountries()
    {
        $curr_id_country = (int)$this->context->country->id;
        // Generate countries list
        if (Configuration::get('PS_RESTRICT_DELIVERED_COUNTRIES')) {
            $countries = Carrier::getDeliveredCountries($this->context->language->id, true, true);
        } else {
            $countries = Country::getCountries($this->context->language->id, true);
        }

        // @todo use helper
        $list = '';
        foreach ($countries as $country) {
            $selected = ((int)$country['id_country'] === $curr_id_country) ? ' selected="selected"' : '';
            $list .= '<option value="'.(int)$country['id_country'].'"'.$selected.'>'.htmlentities($country['name'], ENT_COMPAT, 'UTF-8').'</option>';
        }

        // Assign vars
        $this->context->smarty->assign(array(
            'countries_list' => $list,
            'countries' => $countries,
            'sl_country' => (int)$curr_id_country,
        ));
    }


    /**
     * Return States pertaining to the country
     */
    protected function ajaxProcessAssignStates() 
    {
        $curr_id_country = (int)Tools::getValue('id'); 
		$states = State::getStatesByIdCountry($curr_id_country); //var_dump($states);
		$html = '';
		$html .= '<option value="0" selected="selected"> -- Choose State -- </option>';

		if(!empty($states)){
		  foreach($states as $state){
			$html .= '<option value="'.(int)$state['id_state'].'">'.htmlentities($state['name'], ENT_COMPAT, 'UTF-8').'</option>';
		  }
		}
		die($html);
    }
}



===================================================================================

/* corresponding template - themes/default-bootstrap/register-opticians.tpl*/
<p> CONTENT FROM REGISTER OPTICIANS TEMPLATE </p>

{capture name=path}{l s='Register Opticians'}{/capture}
<h1 class="page-heading bottom-indent">
	{l s='Register Opticians'} - {if isset($customerThread) && $customerThread}{l s='Your reply'}{else}{l s='Registration Form For Opticians'}{/if}
</h1>
{if isset($confirmation)}
	<p class="alert alert-success">{l s='Your message has been successfully sent to our team.'}</p>
	<ul class="footer_links clearfix">
		<li>
			<a class="btn btn-default button button-small" href="{if isset($force_ssl) && $force_ssl}{$base_dir_ssl}{else}{$base_dir}{/if}">
				<span>
					<i class="icon-chevron-left"></i>{l s='Home'}
				</span>
			</a>
		</li>
	</ul>
{elseif isset($alreadySent)}
	<p class="alert alert-warning">{l s='Your message has already been sent.'}</p>
	<ul class="footer_links clearfix">
		<li>
			<a class="btn btn-default button button-small" href="{if isset($force_ssl) && $force_ssl}{$base_dir_ssl}{else}{$base_dir}{/if}">
				<span>
					<i class="icon-chevron-left"></i>{l s='Home'}
				</span>
			</a>
		</li>
	</ul>
{else}
	{include file="$tpl_dir./errors.tpl"}
	<form action="{$request_uri}" method="post" class="contact-form-box" enctype="multipart/form-data">
		<fieldset>
			<h3 class="page-subheading">{l s='Fill In Details To Register'}</h3>
			<div class="clearfix"> 
				<div class="col-xs-12 col-md-6">
					<p class="form-group" style="padding-top:10px;"><strong>ENTER OPTICIAN DETAILS:</strong></p>
					<p class="form-group">
						<label for="id_contact">{l s='Enter Name'}</label>
						<input type="text" class="form-control" id="optician_name" name="optician_name" placeholder="Enter Name" value=""/>
					</p>

					<p class="form-group">					
						<label for="id_contact">{l s='Enter Description'}</label>
						<input type="textarea" class="form-control" id="optician_desc" name="optician_desc" placeholder="Enter Description" value="" />
					</p>

					<p class="form-group">
						<label for="id_contact">{l s='Enter Phone'}</label>
						<input type="text" class="form-control" id="optician_phone" name="optician_phone" placeholder="Enter Phone" value="" />
					</p>

					<p class="form-group">
						<label for="id_contact">{l s='Enter Mobile Phone'}</label>
						<input type="text" class="form-control" id="optician_mphone" name="optician_mphone" placeholder="Enter Mobile No" value="" />
					</p>

					<!--<p class="form-group">
						<label for="fileUpload">{l s='Attach Logo'}</label>
						<input type="hidden" name="MAX_FILE_SIZE" value="80000000" />
						<input type="file" name="fileUpload" id="fileUpload" class="form-control" />
					</p>-->
				</div>

				<div class="col-xs-12 col-md-6">
					<p class="form-group" style="padding-top:10px;"><strong>ENTER OPTICIAN ADDRESS:</strong></p>
					<p class="form-group">
						<label for="id_contact">{l s='Enter Address'}</label>
						<input type="text" class="form-control" id="optician_address1" name="optician_address1" placeholder="Enter Address" value=""/>
					</p>

					<p class="form-group">					
						<label for="id_contact">{l s='Enter Address2'}</label>
						<input type="text" class="form-control" id="optician_address2" name="optician_address2" placeholder="Enter Address(more details)" value="" />
					</p>

					<p class="form-group">
						<label for="id_contact">{l s='Enter Zip/Postal Code'}</label>
						<input type="text" class="form-control" id="optician_zip" name="optician_zip" placeholder="Enter Zip/Postal Code" value="" />
					</p>

					<p class="form-group">
						<label for="id_contact">{l s='Enter City'}</label>
						<input type="text" class="form-control" id="optician_city" name="optician_city" placeholder="Enter City" value="" />
					</p>

					<p class="form-group">
						<label for="id_contact">{l s='Enter Country'}</label>
						<input type="text" class="form-control" id="optician_country" name="optician_country" placeholder="Enter Country" value="" />
					</p>

					<p class="form-group">
						<label for="id_contact">{l s='Enter State'}</label>
						<input type="text" class="form-control" id="optician_state" name="optician_state" placeholder="Enter State" value="" />
					</p>

				</div>
			</div>	
			<div class="submit">
				<input type="text" name="url" value="" class="hidden" />
				<button type="submit" name="submitOpticianDetails" id="submitOpticianDetails" class="button btn btn-default button-medium">
					<span>{l s='Submit'}<i class="icon-chevron-right right"></i></span>
				</button>
			</div>
		</fieldset>
	</form>
{/if}
{addJsDefL name='contact_fileDefaultHtml'}{l s='No file selected' js=1}{/addJsDefL}
{addJsDefL name='contact_fileButtonHtml'}{l s='Choose File' js=1}{/addJsDefL}

/* generation of a new controller for registration of users -- override/controllers/front/ */
class OpticiansRegisterController extends FrontController
{
    public $php_self = 'opticiansregister';
    public $ssl = false;

	/**
	 * Initialize the controller
	 */
	public function init(){
		parent::init(); //var_dump($_SERVER['REQUEST_URI']);

		$this->context->smarty->assign(array(
            'hide_left_column'    => $this->display_column_left,
            'hide_right_column'   => $this->display_column_right,
		));
	}

	/**
	 * Set Media for the page
	 *
	 */
    public function setMedia()
    {
        parent::setMedia();
        $this->addCSS(_THEME_CSS_DIR_.'contact-form.css');
        $this->addJS(_THEME_JS_DIR_.'contact-form.js');
        $this->addJS(_PS_JS_DIR_.'validate.js');
    }

    /**
    * Assign template vars related to page content
    * @see FrontController::initContent()
    */
    public function initContent()
    {

		echo 'executing - RO-112345';

        parent::initContent();

        $this->assignOrderList();

        $email = Tools::safeOutput(Tools::getValue('from',
        ((isset($this->context->cookie) && isset($this->context->cookie->email) && Validate::isEmail($this->context->cookie->email)) ? $this->context->cookie->email : '')));
        $this->context->smarty->assign(array(
            'errors' => $this->errors,
            'email' => $email,
            'fileupload' => Configuration::get('PS_CUSTOMER_SERVICE_FILE_UPLOAD'),
            'max_upload_size' => (int)Tools::getMaxUploadSize()
        ));

        if (($id_customer_thread = (int)Tools::getValue('id_customer_thread')) && $token = Tools::getValue('token')) {
            $customer_thread = Db::getInstance()->getRow('
				SELECT cm.*
				FROM '._DB_PREFIX_.'customer_thread cm
				WHERE cm.id_customer_thread = '.(int)$id_customer_thread.'
				AND cm.id_shop = '.(int)$this->context->shop->id.'
				AND token = \''.pSQL($token).'\'
			');

            $order = new Order((int)$customer_thread['id_order']);
            if (Validate::isLoadedObject($order)) {
                $customer_thread['reference'] = $order->getUniqReference();
            }
            $this->context->smarty->assign('customerThread', $customer_thread);
        }

        $contactKey = md5(uniqid(microtime(), true));
        $this->context->cookie->__set('contactFormKey', $contactKey);

        $this->context->smarty->assign(array(
            'contacts' => Contact::getContacts($this->context->language->id),
            'message' => html_entity_decode(Tools::getValue('message')),
            'contactKey' => $contactKey,
        ));

        $this->setTemplate(_PS_THEME_DIR_.'register-opticians.tpl');
    }


    /**
    * Start forms process
    * @see FrontController::postProcess()
    */
    public function postProcess()
    {
        if (Tools::isSubmit('submitOpticianDetails')) { 
			//var_dump($_POST); var_dump($this->context); exit;
			/**
			 * After submission process, create the optician i.e. supplier 
			 * Also, create an login for supplier. 
			 */
			/* generate a supplier or optician */
			$an_optician = new Supplier((int)0, $this->context->language->id);
			$an_optician->name = Tools::getValue("optician_name", null);
			$an_optician->active = 1; 
			$an_optician->description = Tools::getValue("optician_desc", null);
			$an_optician->meta_title = Tools::getValue("optician_name", null);
			$an_optician->meta_description = Tools::getValue("optician_name", null); 
			$opticianId = $an_optician->save();

			/* generate the address of the supplier */
			$opt_address_id=0; $id_country = 17; $id_state = 0;
			$opt_address = new Address(); 
            $opt_address->alias = Tools::getValue('name', null);
            $opt_address->lastname = 'supplier'; // skip problem with numeric characters in supplier name
            $opt_address->firstname = 'supplier'; // skip problem with numeric characters in supplier name
            $opt_address->address1 = Tools::getValue("optician_address1", null);
            $opt_address->address2 = Tools::getValue("optician_address2", null);
            $opt_address->postcode = Tools::getValue("optician_zip", null);
            $opt_address->phone = Tools::getValue("optician_phone", null);
            $opt_address->phone_mobile = Tools::getValue("optician_mphone", null);
            $opt_address->id_country = $id_country;
            $opt_address->id_state = $id_state;
            $opt_address->city = Tools::getValue("optician_city", null);
			$opt_address->id_supplier = $opticianId;
			/* validate the address */
            $validation = $opt_address->validateController();
            // checks address validity
            if (count($validation) > 0) {
                foreach ($validation as $item) {
                    $this->errors[] = $item;
                }
                $this->errors[] = Tools::displayError('The address is not correct. Please make sure all of the required fields are completed.');
			} else {
				 $opt_address_id = $opt_address->save();
			}

			/*generate a login for the supplier */
			$opt_employee = new Employee((int)0);  
			if(strstr($_POST["optician_name"], ' ')){ 
				$names = explode(' ', $_POST["optician_name"], 2); 
				$opt_employee->lastname = $names[1];
				$opt_employee->firstname = $names[0];
			}else{
				$opt_employee->lastname = $_POST["optician_name"];
				$opt_employee->firstname = $_POST["optician_name"];
			}
			//remove special characters from name
			$email_namestring = preg_replace('/[^A-Za-z0-9\-]/', '', $_POST["optician_name"]); 
			$opt_employee->email = strtolower('s').'_'.strtolower($email_namestring).'@contactplus.com';
			$opt_employee->passwd = Tools::encrypt('password1234'); 
			$opt_employee->id_lang = 1; $opt_employee->id_profile = 4; 
			$opt_employee->default_tab = 1; 
			$opt_employee->add(); 

            if (count($this->errors) > 1) {
            	array_unique($this->errors);
            } elseif (!count($this->errors)) {
            	$this->context->smarty->assign('confirmation', 1);
            }





            $saveContactKey = $this->context->cookie->contactFormKey;
            $extension = array('.txt', '.rtf', '.doc', '.docx', '.pdf', '.zip', '.png', '.jpeg', '.gif', '.jpg');
            $file_attachment = Tools::fileAttachment('fileUpload');
            $message = Tools::getValue('message'); // Html entities is not usefull, iscleanHtml check there is no bad html tags.
            $url = Tools::getValue('url');
            if (!($from = trim(Tools::getValue('from'))) || !Validate::isEmail($from)) {
                $this->errors[] = Tools::displayError('Invalid email address.');
            } elseif (!$message) {
                $this->errors[] = Tools::displayError('The message cannot be blank.');
            } elseif (!Validate::isCleanHtml($message)) {
                $this->errors[] = Tools::displayError('Invalid message');
            } elseif (!($id_contact = (int)Tools::getValue('id_contact')) || !(Validate::isLoadedObject($contact = new Contact($id_contact, $this->context->language->id)))) {
                $this->errors[] = Tools::displayError('Please select a subject from the list provided. ');
            } elseif (!empty($file_attachment['name']) && $file_attachment['error'] != 0) {
                $this->errors[] = Tools::displayError('An error occurred during the file-upload process.');
            } elseif (!empty($file_attachment['name']) && !in_array(Tools::strtolower(substr($file_attachment['name'], -4)), $extension) && !in_array(Tools::strtolower(substr($file_attachment['name'], -5)), $extension)) {
                $this->errors[] = Tools::displayError('Bad file extension');
            } elseif ($url === false || !empty($url) || $saveContactKey != (Tools::getValue('contactKey'))) {
                $this->errors[] = Tools::displayError('An error occurred while sending the message.');
            } else {
                $customer = $this->context->customer;
                if (!$customer->id) {
                    $customer->getByEmail($from);
                }

                $id_order = (int)$this->getOrder();

                /**
                 * Check if customer select his order.
                 */
                if (!empty($id_order)) {
                    $order = new Order($id_order);
                    $id_order = (int) $order->id_customer === (int) $customer->id ? $id_order : 0;
                }

                if (!((($id_customer_thread = (int)Tools::getValue('id_customer_thread'))
                        && (int)Db::getInstance()->getValue('
						SELECT cm.id_customer_thread FROM '._DB_PREFIX_.'customer_thread cm
						WHERE cm.id_customer_thread = '.(int)$id_customer_thread.' AND cm.id_shop = '.(int)$this->context->shop->id.' AND token = \''.pSQL(Tools::getValue('token')).'\'')
                    ) || (
                        $id_customer_thread = CustomerThread::getIdCustomerThreadByEmailAndIdOrder($from, $id_order)
                    ))) {
                    $fields = Db::getInstance()->executeS('
					SELECT cm.id_customer_thread, cm.id_contact, cm.id_customer, cm.id_order, cm.id_product, cm.email
					FROM '._DB_PREFIX_.'customer_thread cm
					WHERE email = \''.pSQL($from).'\' AND cm.id_shop = '.(int)$this->context->shop->id.' AND ('.
                        ($customer->id ? 'id_customer = '.(int)$customer->id.' OR ' : '').'
						id_order = '.(int)$id_order.')');
                    $score = 0;
                    foreach ($fields as $key => $row) {
                        $tmp = 0;
                        if ((int)$row['id_customer'] && $row['id_customer'] != $customer->id && $row['email'] != $from) {
                            continue;
                        }
                        if ($row['id_order'] != 0 && $id_order != $row['id_order']) {
                            continue;
                        }
                        if ($row['email'] == $from) {
                            $tmp += 4;
                        }
                        if ($row['id_contact'] == $id_contact) {
                            $tmp++;
                        }
                        if (Tools::getValue('id_product') != 0 && $row['id_product'] == Tools::getValue('id_product')) {
                            $tmp += 2;
                        }
                        if ($tmp >= 5 && $tmp >= $score) {
                            $score = $tmp;
                            $id_customer_thread = $row['id_customer_thread'];
                        }
                    }
                }
                $old_message = Db::getInstance()->getValue('
					SELECT cm.message FROM '._DB_PREFIX_.'customer_message cm
					LEFT JOIN '._DB_PREFIX_.'customer_thread cc on (cm.id_customer_thread = cc.id_customer_thread)
					WHERE cc.id_customer_thread = '.(int)$id_customer_thread.' AND cc.id_shop = '.(int)$this->context->shop->id.'
					ORDER BY cm.date_add DESC');
                if ($old_message == $message) {
                    $this->context->smarty->assign('alreadySent', 1);
                    $contact->email = '';
                    $contact->customer_service = 0;
                }

                if ($contact->customer_service) {
                    if ((int)$id_customer_thread) {
                        $ct = new CustomerThread($id_customer_thread);
                        $ct->status = 'open';
                        $ct->id_lang = (int)$this->context->language->id;
                        $ct->id_contact = (int)$id_contact;
                        $ct->id_order = (int)$id_order;
                        if ($id_product = (int)Tools::getValue('id_product')) {
                            $ct->id_product = $id_product;
                        }
                        $ct->update();
                    } else {
                        $ct = new CustomerThread();
                        if (isset($customer->id)) {
                            $ct->id_customer = (int)$customer->id;
                        }
                        $ct->id_shop = (int)$this->context->shop->id;
                        $ct->id_order = (int)$id_order;
                        if ($id_product = (int)Tools::getValue('id_product')) {
                            $ct->id_product = $id_product;
                        }
                        $ct->id_contact = (int)$id_contact;
                        $ct->id_lang = (int)$this->context->language->id;
                        $ct->email = $from;
                        $ct->status = 'open';
                        $ct->token = Tools::passwdGen(12);
                        $ct->add();
                    }

                    if ($ct->id) {
                        $cm = new CustomerMessage();
                        $cm->id_customer_thread = $ct->id;
                        $cm->message = $message;
                        if (isset($file_attachment['rename']) && !empty($file_attachment['rename']) && rename($file_attachment['tmp_name'], _PS_UPLOAD_DIR_.basename($file_attachment['rename']))) {
                            $cm->file_name = $file_attachment['rename'];
                            @chmod(_PS_UPLOAD_DIR_.basename($file_attachment['rename']), 0664);
                        }
                        $cm->ip_address = (int)ip2long(Tools::getRemoteAddr());
                        $cm->user_agent = $_SERVER['HTTP_USER_AGENT'];
                        if (!$cm->add()) {
                            $this->errors[] = Tools::displayError('An error occurred while sending the message.');
                        }
                    } else {
                        $this->errors[] = Tools::displayError('An error occurred while sending the message.');
                    }
                }

                if (!count($this->errors)) {
                    $var_list = array(
                                    '{order_name}' => '-',
                                    '{attached_file}' => '-',
                                    '{message}' => Tools::nl2br(stripslashes($message)),
                                    '{email}' =>  $from,
                                    '{product_name}' => '',
                                );

                    if (isset($file_attachment['name'])) {
                        $var_list['{attached_file}'] = $file_attachment['name'];
                    }

                    $id_product = (int)Tools::getValue('id_product');

                    if (isset($ct) && Validate::isLoadedObject($ct) && $ct->id_order) {
                        $order = new Order((int)$ct->id_order);
                        $var_list['{order_name}'] = $order->getUniqReference();
                        $var_list['{id_order}'] = (int)$order->id;
                    }

                    if ($id_product) {
                        $product = new Product((int)$id_product);
                        if (Validate::isLoadedObject($product) && isset($product->name[Context::getContext()->language->id])) {
                            $var_list['{product_name}'] = $product->name[Context::getContext()->language->id];
                        }
                    }

                    if (!empty($contact->email)) {
                        if (!Mail::Send($this->context->language->id, 'contact', Mail::l('Message from contact form').' [no_sync]',
                            $var_list, $contact->email, $contact->name, null, null,
                                    $file_attachment, null,    _PS_MAIL_DIR_, false, null, null, $from)) {
                            $this->errors[] = Tools::displayError('An error occurred while sending the message.');
                        }
                    }
                }

                if (count($this->errors) > 1) {
                    array_unique($this->errors);
                } elseif (!count($this->errors)) {
                    $this->context->smarty->assign('confirmation', 1);
                }
            }
        }
    }

    /**
    * Start forms process
    * @see FrontController::postProcess()
    */
    public function postProcessOLD()
    {
        if (Tools::isSubmit('submitMessage')) {
            $saveContactKey = $this->context->cookie->contactFormKey;
            $extension = array('.txt', '.rtf', '.doc', '.docx', '.pdf', '.zip', '.png', '.jpeg', '.gif', '.jpg');
            $file_attachment = Tools::fileAttachment('fileUpload');
            $message = Tools::getValue('message'); // Html entities is not usefull, iscleanHtml check there is no bad html tags.
            $url = Tools::getValue('url');
            if (!($from = trim(Tools::getValue('from'))) || !Validate::isEmail($from)) {
                $this->errors[] = Tools::displayError('Invalid email address.');
            } elseif (!$message) {
                $this->errors[] = Tools::displayError('The message cannot be blank.');
            } elseif (!Validate::isCleanHtml($message)) {
                $this->errors[] = Tools::displayError('Invalid message');
            } elseif (!($id_contact = (int)Tools::getValue('id_contact')) || !(Validate::isLoadedObject($contact = new Contact($id_contact, $this->context->language->id)))) {
                $this->errors[] = Tools::displayError('Please select a subject from the list provided. ');
            } elseif (!empty($file_attachment['name']) && $file_attachment['error'] != 0) {
                $this->errors[] = Tools::displayError('An error occurred during the file-upload process.');
            } elseif (!empty($file_attachment['name']) && !in_array(Tools::strtolower(substr($file_attachment['name'], -4)), $extension) && !in_array(Tools::strtolower(substr($file_attachment['name'], -5)), $extension)) {
                $this->errors[] = Tools::displayError('Bad file extension');
            } elseif ($url === false || !empty($url) || $saveContactKey != (Tools::getValue('contactKey'))) {
                $this->errors[] = Tools::displayError('An error occurred while sending the message.');
            } else {
                $customer = $this->context->customer;
                if (!$customer->id) {
                    $customer->getByEmail($from);
                }

                $id_order = (int)$this->getOrder();

                /**
                 * Check if customer select his order.
                 */
                if (!empty($id_order)) {
                    $order = new Order($id_order);
                    $id_order = (int) $order->id_customer === (int) $customer->id ? $id_order : 0;
                }

                if (!((
                        ($id_customer_thread = (int)Tools::getValue('id_customer_thread'))
                        && (int)Db::getInstance()->getValue('
						SELECT cm.id_customer_thread FROM '._DB_PREFIX_.'customer_thread cm
						WHERE cm.id_customer_thread = '.(int)$id_customer_thread.' AND cm.id_shop = '.(int)$this->context->shop->id.' AND token = \''.pSQL(Tools::getValue('token')).'\'')
                    ) || (
                        $id_customer_thread = CustomerThread::getIdCustomerThreadByEmailAndIdOrder($from, $id_order)
                    ))) {
                    $fields = Db::getInstance()->executeS('
					SELECT cm.id_customer_thread, cm.id_contact, cm.id_customer, cm.id_order, cm.id_product, cm.email
					FROM '._DB_PREFIX_.'customer_thread cm
					WHERE email = \''.pSQL($from).'\' AND cm.id_shop = '.(int)$this->context->shop->id.' AND ('.
                        ($customer->id ? 'id_customer = '.(int)$customer->id.' OR ' : '').'
						id_order = '.(int)$id_order.')');
                    $score = 0;
                    foreach ($fields as $key => $row) {
                        $tmp = 0;
                        if ((int)$row['id_customer'] && $row['id_customer'] != $customer->id && $row['email'] != $from) {
                            continue;
                        }
                        if ($row['id_order'] != 0 && $id_order != $row['id_order']) {
                            continue;
                        }
                        if ($row['email'] == $from) {
                            $tmp += 4;
                        }
                        if ($row['id_contact'] == $id_contact) {
                            $tmp++;
                        }
                        if (Tools::getValue('id_product') != 0 && $row['id_product'] == Tools::getValue('id_product')) {
                            $tmp += 2;
                        }
                        if ($tmp >= 5 && $tmp >= $score) {
                            $score = $tmp;
                            $id_customer_thread = $row['id_customer_thread'];
                        }
                    }
                }
                $old_message = Db::getInstance()->getValue('
					SELECT cm.message FROM '._DB_PREFIX_.'customer_message cm
					LEFT JOIN '._DB_PREFIX_.'customer_thread cc on (cm.id_customer_thread = cc.id_customer_thread)
					WHERE cc.id_customer_thread = '.(int)$id_customer_thread.' AND cc.id_shop = '.(int)$this->context->shop->id.'
					ORDER BY cm.date_add DESC');
                if ($old_message == $message) {
                    $this->context->smarty->assign('alreadySent', 1);
                    $contact->email = '';
                    $contact->customer_service = 0;
                }

                if ($contact->customer_service) {
                    if ((int)$id_customer_thread) {
                        $ct = new CustomerThread($id_customer_thread);
                        $ct->status = 'open';
                        $ct->id_lang = (int)$this->context->language->id;
                        $ct->id_contact = (int)$id_contact;
                        $ct->id_order = (int)$id_order;
                        if ($id_product = (int)Tools::getValue('id_product')) {
                            $ct->id_product = $id_product;
                        }
                        $ct->update();
                    } else {
                        $ct = new CustomerThread();
                        if (isset($customer->id)) {
                            $ct->id_customer = (int)$customer->id;
                        }
                        $ct->id_shop = (int)$this->context->shop->id;
                        $ct->id_order = (int)$id_order;
                        if ($id_product = (int)Tools::getValue('id_product')) {
                            $ct->id_product = $id_product;
                        }
                        $ct->id_contact = (int)$id_contact;
                        $ct->id_lang = (int)$this->context->language->id;
                        $ct->email = $from;
                        $ct->status = 'open';
                        $ct->token = Tools::passwdGen(12);
                        $ct->add();
                    }

                    if ($ct->id) {
                        $cm = new CustomerMessage();
                        $cm->id_customer_thread = $ct->id;
                        $cm->message = $message;
                        if (isset($file_attachment['rename']) && !empty($file_attachment['rename']) && rename($file_attachment['tmp_name'], _PS_UPLOAD_DIR_.basename($file_attachment['rename']))) {
                            $cm->file_name = $file_attachment['rename'];
                            @chmod(_PS_UPLOAD_DIR_.basename($file_attachment['rename']), 0664);
                        }
                        $cm->ip_address = (int)ip2long(Tools::getRemoteAddr());
                        $cm->user_agent = $_SERVER['HTTP_USER_AGENT'];
                        if (!$cm->add()) {
                            $this->errors[] = Tools::displayError('An error occurred while sending the message.');
                        }
                    } else {
                        $this->errors[] = Tools::displayError('An error occurred while sending the message.');
                    }
                }

                if (!count($this->errors)) {
                    $var_list = array(
                                    '{order_name}' => '-',
                                    '{attached_file}' => '-',
                                    '{message}' => Tools::nl2br(stripslashes($message)),
                                    '{email}' =>  $from,
                                    '{product_name}' => '',
                                );

                    if (isset($file_attachment['name'])) {
                        $var_list['{attached_file}'] = $file_attachment['name'];
                    }

                    $id_product = (int)Tools::getValue('id_product');

                    if (isset($ct) && Validate::isLoadedObject($ct) && $ct->id_order) {
                        $order = new Order((int)$ct->id_order);
                        $var_list['{order_name}'] = $order->getUniqReference();
                        $var_list['{id_order}'] = (int)$order->id;
                    }

                    if ($id_product) {
                        $product = new Product((int)$id_product);
                        if (Validate::isLoadedObject($product) && isset($product->name[Context::getContext()->language->id])) {
                            $var_list['{product_name}'] = $product->name[Context::getContext()->language->id];
                        }
                    }

                    if (!empty($contact->email)) {
                        if (!Mail::Send($this->context->language->id, 'contact', Mail::l('Message from contact form').' [no_sync]',
                            $var_list, $contact->email, $contact->name, null, null,
                                    $file_attachment, null,    _PS_MAIL_DIR_, false, null, null, $from)) {
                            $this->errors[] = Tools::displayError('An error occurred while sending the message.');
                        }
                    }
                }

                if (count($this->errors) > 1) {
                    array_unique($this->errors);
                } elseif (!count($this->errors)) {
                    $this->context->smarty->assign('confirmation', 1);
                }
            }
        }
    }


    /**
    * Assign template vars related to order list and product list ordered by the customer
    */
    protected function assignOrderList()
    {
        if ($this->context->customer->isLogged()) {
            $this->context->smarty->assign('isLogged', 1);

            $products = array();
            $result = Db::getInstance()->executeS('
			SELECT id_order
			FROM '._DB_PREFIX_.'orders
			WHERE id_customer = '.(int)$this->context->customer->id.Shop::addSqlRestriction(Shop::SHARE_ORDER).' ORDER BY date_add');

            $orders = array();

            foreach ($result as $row) {
                $order = new Order($row['id_order']);
                $date = explode(' ', $order->date_add);
                $tmp = $order->getProducts();
                foreach ($tmp as $key => $val) {
                    $products[$row['id_order']][$val['product_id']] = array('value' => $val['product_id'], 'label' => $val['product_name']);
                }

                $orders[] = array('value' => $order->id, 'label' => $order->getUniqReference().' - '.Tools::displayDate($date[0], null) , 'selected' => (int)$this->getOrder() == $order->id);
            }

            $this->context->smarty->assign('orderList', $orders);
            $this->context->smarty->assign('orderedProductList', $products);
        }
    }

    protected function getOrder()
    {
        $id_order = false;
        if (!is_numeric($reference = Tools::getValue('id_order'))) {
            $reference = ltrim($reference, '#');
            $orders = Order::getByReference($reference);
            if ($orders) {
                foreach ($orders as $order) {
                    $id_order = (int)$order->id;
                    break;
                }
            }
        } elseif (Order::getCartIdStatic((int)Tools::getValue('id_order'))) {
            $id_order = (int)Tools::getValue('id_order');
        }
        return (int)$id_order;
    }
}



=============================================================

/* AdminController */
/* employer creation on manufacturer and supplier */
    /**
     * Object creation
     *
     * @return ObjectModel|false
     * @throws PrestaShopException
     */
    public function processAdd()
    {
        if (!isset($this->className) || empty($this->className)) {
            return false;
        }

        $this->validateRules();
        if (count($this->errors) <= 0) {
            $this->object = new $this->className();  
            $this->copyFromPost($this->object, $this->table);
            $this->beforeAdd($this->object);
            if (method_exists($this->object, 'add') && !$this->object->add()) {
                $this->errors[] = Tools::displayError('An error occurred while creating an object.').
                    ' <b>'.$this->table.' ('.Db::getInstance()->getMsgError().')</b>';
            } elseif (($_POST[$this->identifier] = $this->object->id /* voluntary do affectation here */) && $this->postImage($this->object->id) 
																										  && !count($this->errors) && $this->_redirect) {
                PrestaShopLogger::addLog(sprintf($this->l('%s addition', 'AdminTab', false, false), $this->className), 1, null, $this->className, 
																						(int)$this->object->id, true, (int)$this->context->employee->id);
                $parent_id = (int)Tools::getValue('id_parent', 1);
                $this->afterAdd($this->object);
                $this->updateAssoShop($this->object->id);
				/**
				 * create an employee for the manfacturer 
				 */		
				$currClassName = get_class($this->object); 
				if(($currClassName == 'Manufacturer') || ($currClassName == 'Supplier')){ 
					$employee = new Employee((int)Tools::getValue('id_employee'));  
					if(strstr($_POST['name'], ' ')){ 
						$names = explode(' ', $_POST['name'], 2); 
						$employee->lastname = $names[1];
						$employee->firstname = $names[0];
					}else{
						$employee->lastname = $_POST['name'];
						$employee->firstname = $_POST['name'];
					}
					//remove special characters from name
					$email_namestring = preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['name']); 
					if( $currClassName == 'Manufacturer' ){				
						$employee->email = strtolower('m').'_'.strtolower($email_namestring).'@contactplus.com'; 
					} elseif ( $currClassName == 'Supplier' ){
						$employee->email = strtolower('s').'_'.strtolower($email_namestring).'@contactplus.com';
					}
					$employee->passwd = Tools::encrypt('password1234'); 
					$employee->id_lang = 1; $employee->id_profile = 4; $employee->default_tab = 1; 
					$employee->add(); 
					//var_dump($_POST); var_dump($employee); exit;			
				}

                // Save and stay on same form
                if (empty($this->redirect_after) && $this->redirect_after !== false && Tools::isSubmit('submitAdd'.$this->table.'AndStay')) {
                    $this->redirect_after = self::$currentIndex.'&'.$this->identifier.'='.$this->object->id.'&conf=3&update'.$this->table.'&token='.$this->token;
                }
                // Save and back to parent
                if (empty($this->redirect_after) && $this->redirect_after !== false && Tools::isSubmit('submitAdd'.$this->table.'AndBackToParent')) {
                    $this->redirect_after = self::$currentIndex.'&'.$this->identifier.'='.$parent_id.'&conf=3&token='.$this->token;
                }
                // Default behavior (save and back)
                if (empty($this->redirect_after) && $this->redirect_after !== false) {
                    $this->redirect_after = self::$currentIndex.($parent_id ? '&'.$this->identifier.'='.$this->object->id : '').'&conf=3&token='.$this->token;
                }
            }
        }

        $this->errors = array_unique($this->errors);
        if (!empty($this->errors)) {
            // if we have errors, we stay on the form instead of going back to the list
            $this->display = 'edit';
            return false;
        }

        return $this->object;
    }





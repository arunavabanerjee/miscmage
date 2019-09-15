
/* template for uploading prescriptions and display */
// -- uploadprescription.tpl

{capture name=path}
    <a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}">{l s='My account'}</a>
    <span class="navigation-pipe">{$navigationPipe}</span>
    <span class="navigation_page">{l s='Upload Prescription'}</span>
{/capture}
<div class="row justify-content-center">
<div class="col-sm-12">
<div class="create_acc mab-60 pall-40">
    <h1 class="logintitle font-even-18 text-uppercase text-black mab-10">
        {l s='Your personal information'}
    </h1>

    {include file="$tpl_dir./errors.tpl"}

    {if isset($confirmation) && $confirmation}
        <div class="alert alert-success">
            {l s='Your personal information has been successfully updated.'}
            {if isset($pwd_changed)}<br />{l s='Your password has been sent to your email:'} {$email}{/if}
        </div>
    {else}
        <p class="info-title">
            {l s='Please be sure to update your personal information if it has changed.'}
        </p>
        
        <form action="{$request_uri}" method="post" class="" enctype="multipart/form-data">
            <fieldset>
                <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2">
					<div class="form-group">
						<label class="font-even-16 f-w-700" for="fileUpload">{l s='Upload A Prescription'}</label>
						<input type="hidden" name="MAX_FILE_SIZE" value="{if isset($max_upload_size) && $max_upload_size}{$max_upload_size|intval}{else}2000000{/if}" />
						<input type="file" name="fileUpload" id="fileUpload" class="form-control" />
                    	<button type="submit" name="submitIdentity" class="btn btn-default button button-medium">
							<span>{l s='Save'}<i class="icon-chevron-right right"></i></span>
                    	</button>
					</div>
				</div>
				</div>
        	</fieldset>
        </form> <!-- .std -->
		
		<div class="row">
		<div class="col-sm-6 col-md-6 col-lg-3 col-xl-2">
		{if $threads && count($threads)}
		<table id="thread-list" class="table table-bordered footab">
			<thead>
				<tr>
					<th class="first_item" data-sort-ignore="true">{l s='ID Reference'}</th>
					<th class="item">{l s='Date Uploaded'}</th>
					<th class="item">{l s='Message'}</th>
					<th class="item">{l s='FileName'}</th>
					<th class="last_item">View/Download</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$threads item=thread name=myLoop}
					<tr class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if} {if $smarty.foreach.myLoop.index % 2}alternate_item{/if}">

						<td class="history_price" data-value="{$thread.id_customer_thread}">
							<span class="price">{$thread.id_customer_thread}</span>
						</td>
						<td data-value="{$thread.date_add|regex_replace:"/[\-\:\ ]/":""}" class="history_date bold"> 
							{dateFormat date=$thread.date_add full=0} 
						</td>

						<td class="history_price" data-value="{$thread.id_customer_thread}">
							<span class="price">{$thread.message}</span>
						</td>

						<td class="history_price" data-value="{$thread.file_name}">
							<span class="price">{$thread.file_name}</span>
						</td>

						<td class="history_link bold">
							<img class="icon" src="{$img_dir}icon/download_product.gif"	alt="{l s='Products to download'}" title="{l s='View or Download'}" />
							<a class="color-myaccount" href="{$pic_dir}{$thread.file_name}" target="__blank">{$thread.file_name}</a>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
		{else}
			<p class="alert alert-warning">{l s='No Messages Yet.'}</p>
		{/if}						
	</div>
	</div>
    {/if}
</div>
</div>
</div>

================================================================

// -- upload prescription controller
//-------------------------------------
class UploadPrescriptionController extends IdentityController
{
    public $auth = true;
    public $php_self = 'uploadprescription';
    public $authRedirection = 'uploadprescription';
    public $ssl = true;

    public function init()
    {
        parent::init();
        $this->customer = $this->context->customer;
    }

    /**
     * Start forms process
     * @see FrontController::postProcess()
     */
    public function postProcess()
    {

		if (Tools::isSubmit('submitIdentity')) { 

			$extension = array('.txt', '.rtf', '.doc', '.docx', '.pdf', '.zip', '.png', '.jpeg', '.gif', '.jpg');
        	$file_attachment = Tools::fileAttachment('fileUpload'); //var_dump($file_attachment); exit;

			if ( empty($file_attachment['mime']) ) { $this->errors[] = Tools::displayError('Invalid file extension'); }

			if ( $file_attachment['size'] > 2000000 ) { $this->errors[] = Tools::displayError('The file size is too big.'); }

			if ( !count($this->errors) ) {

            	if (!copy($file_attachment['tmp_name'], _PS_UPLOAD_DIR_.$file_attachment['rename'])) { 
					$this->errors[] = Tools::displayError('File copy failed.');          
            	}

				if (!count($this->errors)) {
					/*insert details into database - customer message */
					$customerThread = new CustomerThread(); 
					$customerThread->id_lang = $this->context->language->id; 
					$customerThread->id_contact = 0;
					$customerThread->id_customer = $this->context->customer->id;
					$customerThread->id_shop = $this->context->customer->id_shop;
					$customerThread->email = $this->customer->email; 
					$customerThread->token = sha1(microtime());
					$customerThread->status = 'closed';
					$customerThread->date_add = date('Y-m-d H:i:s');	
					$threadId = $customerThread->save();
	
					//generate a customer message
					$customerMessage =  new CustomerMessage();
					$customerMessage->id_customer_thread = $threadId; 
					$customerMessage->id_employee = 0;
					$customerMessage->message = 'Prescription Uploaded On'.date('Y-m-d H:i:s'); 
					$customerMessage->file_name = $file_attachment['rename']; 
					$customerMessage->private = 1; 
					$customerMessage->date_add = date('Y-m-d H:i:s');
					$customerMessage->read = 1;
					$messageId = $customerMessage->save();

					//confirmation 
					$this->context->smarty->assign('confirmation', 1);
				}

			} else{
            	@unlink($file_attachment['tmp_name']);	
										
			}

            if (count($this->errors) > 1) {
            	array_unique($this->errors);
            } elseif (!count($this->errors)) {
            	$this->context->smarty->assign('confirmation', 1);
            }
		}
        return $this->customer;
    }

    /**
     * Assign template vars related to page content
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

		$threads = CustomerThread::getCustomerMessages($this->context->customer->id);
		//var_dump($threads); 

        // Assign vars
        $this->context->smarty->assign(array(
            'threads' => $threads,
        ));
        $this->setTemplate(_PS_THEME_DIR_.'uploadprescription.tpl');
    }

    public function setMedia()
    {
        parent::setMedia();
        $this->addCSS(_THEME_CSS_DIR_.'identity.css');
        $this->addJS(_PS_JS_DIR_.'validate.js');
    }
}

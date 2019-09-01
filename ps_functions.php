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





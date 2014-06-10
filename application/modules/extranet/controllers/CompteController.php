<?php
class Extranet_CompteController extends Core_Controller
{

/**************************************************************************************************	
	Page Inscription : 
**************************************************************************************************/        

    public function indexAction()
    {    
    $form_cfg               =            new Zend_Config_Xml(APPLICATION_PATH.'/modules/extranet/forms/client.xml','production');
    $form                   =            new Zend_Form($form_cfg->client);      
    
    foreach($form->getElements() as $element) {$element->setDecorators(array('Visualisation'));}
    
    $form->populate((array) $this->model_clients->client($this->infos_client->id_client));    
    $this->view->form       =            $form;
    }    
    
/**************************************************************************************************	
	Page Inscription : 
**************************************************************************************************/        

    public function modifierAction()
    {    
    $form_cfg               =            new Zend_Config_Xml(APPLICATION_PATH.'/modules/extranet/forms/client.xml','production');
    $form                   =            new Zend_Form($form_cfg->client);    
    $form->populate((array) $this->model_clients->client($this->infos_client->id_client));    

    $formData               =          ($this->getRequest()->isPost() ) ? $this->getRequest()->getPost() : '';
    $formValues             =          $form->getValidValues($formData);
    $this->view->form       =            $form;

        
    if ($this->getRequest()->isPost() && $form->isValid($formData))
    {   
    $this->model_clients->modification($this->infos_client->id_client,$formValues);
    $this->_flashMessenger->addMessage("Votre compte a été modifié avec succès.");
    $this->_redirector->setGotoSimple('index','compte','extranet');
    }   
    }        

}

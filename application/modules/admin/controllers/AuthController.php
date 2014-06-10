<?php
class Admin_AuthController extends Core_Controller {

/**************************************************************************************************
	Page Index :
**************************************************************************************************/

    public function indexAction()
    {
    $form_cfg               =            new Zend_Config_Xml(APPLICATION_PATH.'/modules/admin/forms/login.xml','production');
    $form                   =            new Zend_Form($form_cfg->login);
    
    
    $formData               =          ($this->getRequest()->isPost() ) ? $this->getRequest()->getPost() : '';
    $formValues             =          $form->getValidValues($formData);
    
    if ($this->getRequest()->isPost() && $form->isValid($formData))
    {   
    $adapter                =           new Zend_Auth_Adapter_DbTable($this->db,'liste_admins','email','password','actif = 1');
    $adapter->setIdentity($form->getValue('email'));
    $adapter->setCredential(md5($form->getValue('password')));
 
    $auth                   =           Zend_Auth::getInstance();
    $result                 =           $auth->authenticate($adapter);
    
    if ($result->isValid()) 
    {     
    $id_session = $this->GenPassword();
    $this->_helper->FlashMessenger("Vous vous êtes connecté avec succès.");
    
    
    $storage = $this->_auth->getStorage();
    $result = $adapter->getResultRowObject(array('id_admin','nom','prenom','email'));
    $result->id_session = $id_session;
    $this->model_admins->generersession($result->id_admin,$id_session);

    $storage->write($result);
    $this->_redirect('/admin');
    }        
    else
    {
    $this->_helper->FlashMessenger("Le couple identifiant / mot de passe que vous avez saisi est inccorect.");   
    }
    }
    
    $this->view->form       =            $form;
    }   

/**************************************************************************************************
	Page Déconnexion 
**************************************************************************************************/

    public function deconnexionAction()
    {
    $this->getHelper('layout')->disableLayout();
    $this->getHelper('viewRenderer')->setNoRender();
        
    $this->_auth->clearIdentity();
    $this->model_admins->generersession($this->_infos_admin->id_admin,'DECONNECTE-'.$this->GenPassword());
 
    $this->_flashMessenger->addMessage("Vous avez été déconnecté avec succès.");
    $this->_redirector->setGotoSimple('index','admin');    
    }
    
}

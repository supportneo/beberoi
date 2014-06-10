<?php
class Auth_IndexController extends Core_Controller {

/**************************************************************************************************
	Page Index :
**************************************************************************************************/

    public function indexAction()
    {
    $form_cfg               =            new Zend_Config_Xml(APPLICATION_PATH.'/modules/default/forms/login.xml','production');
    $form                   =            new Zend_Form($form_cfg->login);
    
    
    $formData               =          ($this->getRequest()->isPost() ) ? $this->getRequest()->getPost() : '';
    $formValues             =          $form->getValidValues($formData);
    
    if ($this->getRequest()->isPost() && $form->isValid($formData))
    {   
    $adapter                =           new Zend_Auth_Adapter_DbTable($this->db,'liste_clients','email','password','actif = 1');
    $adapter->setIdentity($form->getValue('email'));
    $adapter->setCredential(md5($form->getValue('password')));
 
    $auth                   =           Zend_Auth::getInstance();
    $result                 =           $auth->authenticate($adapter);

    if ($result->isValid()) 
    {     
    $id_session = $this->GenPassword();
    $this->_helper->FlashMessenger("Vous vous êtes connecté avec succès.");
    
    
    $storage = $this->_auth->getStorage();
    $result = $adapter->getResultRowObject(array('id_client','nom','prenom','email'));
    $result->id_session = $id_session;
    $this->model_clients->generersession($result->id_client,$id_session);

    $storage->write($result);
    $this->_redirector->setGotoSimple('index','index','extranet');
    }        
    else
    {
    $this->_helper->FlashMessenger("Le couple identifiant / mot de passe que vous avez saisi est inccorect.");   
    }
    }
    
    $this->view->form       =            $form;
    }   
    
/**************************************************************************************************	
	Page Inscription : 
**************************************************************************************************/        

    public function inscriptionAction()
    {    
    $form_cfg               =            new Zend_Config_Xml(APPLICATION_PATH.'/modules/auth/forms/client.xml','production');
    $form                   =            new Zend_Form($form_cfg->client);    
    
    
    $formData               =          ($this->getRequest()->isPost() ) ? $this->getRequest()->getPost() : '';
    $formValues             =          $form->getValidValues($formData);
    
    if ($this->getRequest()->isPost() && $form->isValid($formData))
    {   
    $formValues['code_activation'] = $this->GenPassword();
    $id_client              =           $this->model_clients->inscription($formValues);
    
    mail($formValues['email'],"Activation de votre compte","Bonjour, Veuillez activer votre compte .... : http://liste-naissance.prado-creation.net/auth/index/activation/id_client/".$id_client."/code_activation/".$formValues['code_activation']);
    
    $this->_flashMessenger->addMessage("Votre compte a été créé avec succès.");
    $this->_redirector->setGotoSimple('index','index','default');
    }   
    $this->view->form       =            $form;
    }    

/**************************************************************************************************	
	Page Inscription : 
**************************************************************************************************/        

    public function activationAction()
    {    
    $this->id_client        =           (int) $this->_getParam('id_client',''); 
    $this->code_activation  =           (preg_match('#([A-Za-z0-9])#',$this->_getParam('id_client'))) ? $this->_getParam('code_activation') : '';
        
    if($this->model_clients->activerbycode($this->id_client,$this->code_activation))
    {
    $client                 =           $this->model_clients->client($this->id_client);
    $adapter                =           new Zend_Auth_Adapter_DbTable($this->db,'liste_clients','email','password','actif = 1');
    $adapter->setIdentity($client->email);
    $adapter->setCredential($client->password);
 
    $auth                   =           Zend_Auth::getInstance();
    $result                 =           $auth->authenticate($adapter);
    
    $this->_helper->FlashMessenger("<p>Votre compte a été activé avec succès.</p><p>Vous êtes désormais connecté à votre espace client.</p>");
    
    $storage                =           $this->_auth->getStorage();
    $result                 =           $adapter->getResultRowObject(array('id_client','nom','prenom','email'));
    $id_session             =           $this->GenPassword();
    $result->id_session     =           $id_session;
    $this->model_clients->generersession($result->id_client,$id_session);
    $storage->write($result);  
    $this->_redirector->setGotoSimple('index','index','extranet');        
    }
    }
    
/**************************************************************************************************
	Page Déconnexion 
**************************************************************************************************/

    public function deconnexionAction()
    {
    $this->getHelper('layout')->disableLayout();
    $this->getHelper('viewRenderer')->setNoRender();
    $id_session             =           $this->GenPassword();        
    $this->_auth->clearIdentity();
    $this->model_clients->generersession($this->infos_client->id_client,$id_session);
    
 
    $this->_flashMessenger->addMessage("Vous avez été déconnecté avec succès.");
    $this->_redirector->setGotoSimple('index','index');    
    }
    
}

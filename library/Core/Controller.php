<?php

class Core_Controller extends Zend_Controller_Action
{
/**************************************************************************************************
	Initialisation  :
**************************************************************************************************/
    
    public function init()
    {
    // session :
    $this->_auth                        =       Zend_Auth::getInstance();
    $this->_session                     =       Zend_Registry::get('session');    
    $this->infos_auth                   =       $this->_auth->getIdentity();   
    
    $this->_flashMessenger              =       $this->_helper->getHelper('FlashMessenger');
    $this->_redirector                  =       $this->_helper->getHelper('Redirector');    
    $this->view->messages               =       $this->_flashMessenger->getMessages();    
    
    $this->config                       =       new Zend_Config_Ini(APPLICATION_PATH.'/configs/application.ini', 'production');
    $this->db                           =       Zend_Registry::get('db');
    $this->db->setFetchMode(Zend_Db::FETCH_OBJ);
    
    $this->tools                        =       new Application_Plugin_Tools();      
    $this->view->euros_xpf              =       $this->config->params->monnaie->euros_xpf;
    
    // Session client : 
    $this->model_clients                =       new Application_Model_Clients();   
    $this->model_admins                 =       new Application_Model_Admins();   
    $this->model_liste_naiss            =       new Application_Model_ListeNaissance();
    $this->infos_client                 =       $this->model_clients->clientbysession($this->infos_auth->id_session);
    $this->id_client                    =       $this->infos_client->id_client;
    
    $this->infos_admin                  =       $this->model_admins->adminbysession($this->infos_auth->id_session);
    $this->id_admin                     =       $this->infos_admin->id_admin;
    
    $this->view->id_admin               =       $this->id_admin;    
    $this->view->id_client              =       $this->id_client;    
    
    $this->view->infos_client           =       $this->infos_client;
    $this->view->infos_admin            =       $this->infos_admin;
    
    $this->page                         =       (int) $this->_getParam('page',1);
    $this->id_liste                     =       (int) $this->_getParam('id_liste','');
    $this->id_panier                    =       (int) $this->_getParam('id_panier','');
    
    $this->nom_famille                  =       $this->_getParam('nom_famille','');    
    $this->code_acces                   =       $this->_getParam('code_acces','');
    
    $this->view->page                   =       $this->page;
    $this->view->id_liste               =       $this->id_liste;
    $this->view->id_panier              =       $this->id_panier;
    $locale                             =       new Zend_Locale('fr_FR');
    Zend_Registry::set('Zend_Locale', $locale);    
    
    
    
    
    $module                             =           $this->_request->getModuleName();
    $controller                         =           $this->_request->getControllerName();
        
    if($module == 'extranet' && !$this->infos_client->id_client)
    {
    $this->_flashMessenger->addMessage("<p>Vous devez être connecté pour accéder à l'extranet.</p>");
    $this->_redirector->setGotoSimple('index','index','auth');        
    }
    
    if($module == 'admin' && !$this->infos_admin->id_admin && $controller != 'auth')
    {
    $this->_flashMessenger->addMessage("<p>Vous devez être connecté pour accéder à l'administration.</p>");
    $this->_redirector->setGotoSimple('index','auth','admin');        
    }    
    
    }
    

/**************************************************************************************************
	Initialisation session : 
**************************************************************************************************/  
   
    protected function GenPassword($length=32)
    {
    $ranges = array(range('a', 'z'), range('A', 'Z'), range(1, 9));
        $code = '';
        for($i = 0; $i < $length; $i++){
            $rkey = array_rand($ranges);
            $vkey = array_rand($ranges[$rkey]);
            $code .= $ranges[$rkey][$vkey];
        }
        return $code;    
    }
    
/**************************************************************************************************	
        Gestion monnaie locale :
**************************************************************************************************/    

    public function convertir_xpf_euros($valeur_xpf)
    {
    return new Zend_Currency(array('value' => $valeur_xpf/$this->config->params->monnaie->euros_xpf, 'currency'  => 'EUR','precision' => 2));
    }        
    
}
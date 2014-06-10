<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    

    
/**************************************************************************************************
		Initialisation diverses : 
**************************************************************************************************/       

protected function _initTranslate() {

    
        $translateValidators = array(
            Zend_Validate_NotEmpty::IS_EMPTY => 'Champ obligatoire',
            Zend_Validate_Regex::NOT_MATCH => 'Valeur saisie inccorrect',
            Zend_Validate_EmailAddress::INVALID => 'E-mail inccorect'
        );
        $translator = new Zend_Translate('array', $translateValidators);
        Zend_Validate_Abstract::setDefaultTranslator($translator);
    }
    protected function _initView() 
    {
        $view = new Zend_View(array(
                    'lfiProtectionOn' => false,
                    'scriptPath' => APPLICATION_PATH,
                    'helperDirs' => array(
                        'Custom/View/Helper' => 'Custom_View_Helper_',
                        'Zend/View/Helper' => 'Zend_View_Helper_'
                    )
                ));
        $view->getHelper('Doctype')->setDocType('XHTML1_TRANSITIONAL');
        // View Renderer
        Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer')
                ->setViewScriptPathSpec('modules/:module/views/scripts/:controller/:action.:suffix')
                ->setViewSuffix('php')
                ->setView($view);
        // Zend Layout
        $view->layout = Zend_Layout::startMvc(array(
                    'layout' => 'layout',
                    'viewSuffix' => 'php'
                ))->setView($view);
    }
    
/**************************************************************************************************
		Initialisation de la connexion à la base de données :
**************************************************************************************************/   
        protected function _initDb()
    {
     $config            =               new Zend_Config($this->getOptions());
      
      // On essaye si c'est OK ?
      try
      {
      $db = Zend_Db::factory($config->resources->db);
      $db->getConnection();
      }
       
       // On attrape l'erreur ?
       
       catch ( Exception $e ) 
       {
       exit("Une erreur est apparue lors de la connexion à la base de données : ". $e -> getMessage());
       }
       // on stock notre dbAdapter dans le registre
       
       Zend_Db_Table_Abstract::setDefaultAdapter($db);
       Zend_Registry::set( 'db', $db );
       return $db;
    }
     
/**************************************************************************************************
		Initialisation de la session :
**************************************************************************************************/   
    
    protected function _initSession() 
    {
    Zend_Session::start();
    
    if(!Zend_Registry::isRegistered('session'))
    {
       $session = new Zend_Session_Namespace('session');
       Zend_Registry::set('session', $session);
    }
    }
}
<?php
class Extranet_IndexController extends Core_Controller 
{

/**************************************************************************************************
	Page Index :
**************************************************************************************************/

    public function indexAction()
    {
    $form_cfg               =            new Zend_Config_Xml(APPLICATION_PATH.'/modules/extranet/forms/liste_demande_acces.xml','production');
    $form                   =            new Zend_Form($form_cfg->liste_demande_acces);    
    $this->view->form       =            $form;               
    }   
}

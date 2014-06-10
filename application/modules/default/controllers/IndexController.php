<?php
class Default_IndexController extends Core_Controller
{
    
/**************************************************************************************************
	Page Index :
**************************************************************************************************/

    public function indexAction()
    {
    $form_cfg               =            new Zend_Config_Xml(APPLICATION_PATH.'/modules/default/forms/acces_code.xml','production');
    $form                   =            new Zend_Form($form_cfg->acces_code);
    
    
    $formData               =           ($this->getRequest()->isPost() ) ? $this->getRequest()->getPost() : '';
    $formValues             =           $form->getValidValues($formData);
    
    $this->view->form       =            $form;

    
    if ($this->getRequest()->isPost() && $form->isValid($formData))
    {   
    $result                 =           $this->model_liste_naiss->listebycode($formValues['nom_famille'],$formValues['code_acces']);
    
    if($result->statut == 'OK')
    {
    $this->_redirector->setGotoSimple('index','liste','default',array('nom_famille' => $formValues['nom_famille'], 'code_acces' => $formValues['code_acces']));            
    }
    
    }
    
    }
}

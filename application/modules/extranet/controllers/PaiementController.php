<?php
class Extranet_PaiementController extends Core_Controller {

/**************************************************************************************************
	Page Index :
**************************************************************************************************/

    public function indexAction()
    {
        
    $this->select                       =           $this->db->select()->from('liste_paiements');
    $this->liste                        =           $this->db->fetchAll($this->select);

    // Paginator :

    $paginator                          =           Zend_Paginator::factory($this->liste);
    $paginator->setItemCountPerPage(100);
    $paginator->setCurrentPageNumber($this->page);
    $this->view->paginator              =           $paginator;        
    }   

/**************************************************************************************************
	Page Liste des achats : 
**************************************************************************************************/

    public function achatsAction()
    {
    $this->select                       =           $this->db->select()->from('liste_paniers_det',array('prix_paye','date_insert'));
    $this->select->join('liste_naissances_det','liste_naissances_det.id_produit =  liste_paniers_det.id_produit',array('ref_produit','nom_produit','prix_vente'));
    
    $this->select->where("liste_paniers_det.id_client = '".$this->infos_client->id_client."'");
    $this->select->where("liste_paniers_det.statut = '1'");    
    if($this->id_panier) {$this->select->where("liste_paniers_det.id_panier = '$this->id_panier'");}
    
    $this->liste                        =           $this->db->fetchAll($this->select);
    
    // Paginator :

    $paginator                          =           Zend_Paginator::factory($this->liste);
    $paginator->setItemCountPerPage(100);
    $paginator->setCurrentPageNumber($this->page);
    $this->view->paginator              =           $paginator;        
    }    
    
/**************************************************************************************************
	Page Retour paybox : 
**************************************************************************************************/

    public function retourpayboxAction()
    {
    if($this->_getParam('step','') == 'paye') 
    {
    $infos_panier = $this->model_liste_naiss->panier_infos($this->id_panier);
    
    $this->model_liste_naiss->panier_payer($this->infos_client->id_client,'paybox',$infos_panier->id_panier);
    $this->_redirector->setGotoSimple('paiementvalide','paiement','extranet',array('id_panier' => $this->id_panier));
    }
    else
    {
    $this->_redirector->setGotoSimple('paiementnonvalide','paiement','extranet',array('id_panier' => $this->id_panier));
    }
    
    }     
       
/**************************************************************************************************
	Page Valider le paiement : 
**************************************************************************************************/

    public function validerAction()
    {  
    // Création du formulaire  

    $form_cfg               =            new Zend_Config_Xml(APPLICATION_PATH.'/modules/extranet/forms/valider_panier.xml','production');
    $form                   =            new Zend_Form($form_cfg->valider_panier);

    $formData               =          ($this->getRequest()->isPost() ) ? $this->getRequest()->getPost() : '';
    $formValues             =          $form->getValidValues($formData);
    
    if ($this->getRequest()->isPost() && $form->isValid($formData) && $formValues['message'])
    {   
    $this->model_liste_naiss->message($this->infos_client->id_client,$this->id_panier,$formValues['message']);
    } 
    $this->_redirector->setGotoSimple('simuler','paiement','extranet',array('id_panier' => $this->id_panier));    
    
    }  
    
/**************************************************************************************************
	Page Simulation paiement : 
**************************************************************************************************/

    public function simulerAction()
    {  
        
    }    
        
    
/**************************************************************************************************
	Page Retour Client Paiement valide : 
**************************************************************************************************/

    public function paiementvalideAction()
    {
    $this->view->infos              =       $this->model_liste_naiss->panier_infos($this->id_panier);
    $this->view->liste              =       $this->model_liste_naiss->panier_liste($this->id_panier);
    }    
    
/**************************************************************************************************
	Page Retour Client Paiement refusé : 
**************************************************************************************************/

    public function paiementnonvalideAction()
    {
        
    }     
    
}

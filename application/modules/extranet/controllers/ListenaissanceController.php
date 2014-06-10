<?php
class Extranet_ListenaissanceController extends Core_Controller {

/**************************************************************************************************
	Page Index :
**************************************************************************************************/

    public function indexAction()
    {
    $this->select                       =           $this->db->select()->from('liste_naissances');
    $this->select->join('liste_acces','liste_naissances.id_liste = liste_acces.id_liste',array('actif'))->where("actif = '1'");

    $this->liste                        =           $this->db->fetchAll($this->select);

    // Paginator :

    $paginator                          =           Zend_Paginator::factory($this->liste);
    $paginator->setItemCountPerPage(100);
    $paginator->setCurrentPageNumber($page);
    $this->view->paginator              =           $paginator;
    }

/**************************************************************************************************
	Page Détails d'une liste :
**************************************************************************************************/

    public function detailsAction()
    {
    
    $this->view->infos      =           $this->model_liste_naiss->liste_details($this->id_liste);
    
    // Liste des articles : 
        
    $this->select           =           $this->db->select()->from('liste_naissances_det');
    $this->select->join('liste_naissances','liste_naissances.id_liste =  liste_naissances_det.id_liste');
    $this->view->liste      =           $this->db->fetchAll($this->select);

    // Création du formulaire  

    $form_cfg               =            new Zend_Config_Xml(APPLICATION_PATH.'/modules/extranet/forms/liste_paiement.xml','production');
    $form                   =            new Zend_Form($form_cfg->liste_paiement);
    $this->view->form       =            $form;


    $formData               =          ($this->getRequest()->isPost() ) ? $this->getRequest()->getPost() : '';
    $formValues             =          $form->getValidValues($formData);

    // Traitement du formulaire : 
    
    if ($this->getRequest()->isPost() && $form->isValid($formData))
    {

    // foreach pour validation panier :

    foreach($formValues['id_produit'] as $no => $id_produit)
    {
    if($formValues['montant_paye'][$no] > 0)
    {
    $array[] = array('id_produit' => $formValues['id_produit'][$no], 'montant_paye' => $formValues['montant_paye'][$no]);
    }
    }

    if(count($array))
    {
    // Foreach sur le panier validé :
    $id_panier              =           $this->model_liste_naiss->panier_creer($this->infos_client->id_client, $formValues['id_liste']);

    foreach($array as $row)
    {
    $this->model_liste_naiss->panier_ajout($this->infos_client->id_client, $formValues['id_liste'],$id_panier, $row['id_produit'], $row['montant_paye']);
    }
    $this->model_liste_naiss->panier_total($this->infos_client->id_client,$formValues['id_liste'],$id_panier);
    $this->_flashMessenger->addMessage("<p>Votre panier a bien été validé</p>");
    $this->_redirector->setGotoSimple('panier','listenaissance','extranet',array('id_panier' => $id_panier));
    }
    else
    {
    $this->_flashMessenger->addMessage("<p>Votre panier n'est pas valide, vous devez saisir au moins un montant à payer...</p>");
    $this->_redirector->setGotoSimple('index','listenaissance','extranet');
    }
    }
    }

/**************************************************************************************************
	Page Création d'une liste :
**************************************************************************************************/

    public function creationAction()
    {
    $form_cfg               =            new Zend_Config_Xml(APPLICATION_PATH.'/modules/extranet/forms/liste_creation.xml','production');
    $form                   =            new Zend_Form($form_cfg->liste_creation);

    $formData               =          ($this->getRequest()->isPost() ) ? $this->getRequest()->getPost() : '';
    $formValues             =          $form->getValidValues($formData);
    $this->view->form       =            $form;

    if ($this->getRequest()->isPost() && $form->isValid($formData))
    {
    $this->model_clients->inscription($formValues);

    $this->_flashMessenger->addMessage("Votre compte a été créé avec succès.");
    $this->_redirector->setGotoSimple('index','index','default');
    }
    }

/**************************************************************************************************
	Page Demander l'accès à une liste :
**************************************************************************************************/

    public function demandeaccesAction()
    {
    $this->getHelper('layout')->disableLayout();
    $this->getHelper('viewRenderer')->setNoRender();

    $form_cfg               =            new Zend_Config_Xml(APPLICATION_PATH.'/modules/extranet/forms/liste_demande_acces.xml','production');
    $form                   =            new Zend_Form($form_cfg->liste_demande_acces);


    $formData               =          ($this->getRequest()->isPost() ) ? $this->getRequest()->getPost() : '';
    $formValues             =          $form->getValidValues($formData);
    $this->view->form       =            $form;



    if ($this->getRequest()->isPost() && $form->isValid($formData))
    {
    $demande_acces          =           $this->model_liste_naiss->demande_acces($formValues['identifiant_liste'],$formValues['code_acces']);
    if($demande_acces)
    {
    $verif_acces            =           $this->model_liste_naiss->verifier_acces($this->infos_client->id_client,$formValues['identifiant_liste']);

    if($verif_acces)
    {
    $this->_flashMessenger->addMessage("<p>Vous avez déjà accès à cette liste de naissance...</p>");
    $this->_redirector->setGotoSimple('index','listenaissance','extranet');

    }
    else
    {
    $this->model_liste_naiss->autoriser_acces($this->infos_client->id_client,$formValues['identifiant_liste']);
    $this->_flashMessenger->addMessage("<p>Vous avez désormais accès à la liste de naissance.</p>");
    $this->_redirector->setGotoSimple('index','listenaissance','extranet');
    }

    }
    else
    {
    $this->_flashMessenger->addMessage("<p>Votre accès à la liste de naissance à été refusé.</p><p>Merci de bien vouloir recommencer.</p>");
    $this->_redirector->setGotoSimple('index','index','extranet');
    }

    }
    }

/**************************************************************************************************
	Page Supprimer accès :
**************************************************************************************************/

    public function supprimerAction()
    {
    $this->getHelper('layout')->disableLayout();
    $this->getHelper('viewRenderer')->setNoRender();

    $this->model_liste_naiss->supprimer_acces($this->infos_client->id_client,$this->id_liste);
    $this->_flashMessenger->addMessage("<p>Votre accès à la liste de naissance a été supprimé.</p>");
    $this->_redirector->setGotoSimple('index','listenaissance','extranet');
    }

/**************************************************************************************************
	Page Panier :
**************************************************************************************************/

    public function panierAction()
    {   
    $this->view->liste                  =           $this->model_liste_naiss->panier_liste($this->id_panier);
    $this->view->infos                  =           $this->model_liste_naiss->panier_infos($this->id_panier);
    
    // Création du formulaire  

    $form_cfg               =            new Zend_Config_Xml(APPLICATION_PATH.'/modules/extranet/forms/valider_panier.xml','production');
    $form                   =            new Zend_Form($form_cfg->valider_panier);
    $form->populate(array('id_panier' => $this->id_panier));    
    $this->view->form       =            $form;
    }

}

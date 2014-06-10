<?php
class Admin_ListenaissanceController extends Core_Controller {

/**************************************************************************************************
	Page Index :
**************************************************************************************************/

    public function indexAction()
    {
    $this->select                       =           $this->db->select()->from('liste_naissances');

    $this->liste                        =           $this->db->fetchAll($this->select);

    // Paginator :

    $paginator                          =           Zend_Paginator::factory($this->liste);
    $paginator->setItemCountPerPage(100);
    $paginator->setCurrentPageNumber($this->page);
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
    }
    

/**************************************************************************************************
	Page Panier :
**************************************************************************************************/

    public function panierAction()
    {
       
    // Sélection du contenu du panier :     
    $this->select                       =           $this->db->select()->from('liste_paniers_det',array('id_produit','prix_paye','id_liste'));
    $this->select->join('liste_paniers','liste_paniers.id_panier = liste_paniers_det.id_panier');
    $this->select->join('liste_naissances_det','liste_paniers_det.id_produit = liste_naissances_det.id_produit',array('ref_produit','nom_produit','prix_vente'));
    $this->select->where("liste_paniers.id_panier = '".$this->id_panier."'");
    
    $this->view->liste                  =           $this->db->fetchAll($this->select);
    $this->view->infos                  =           $this->model_liste_naiss->panier_infos($this->id_panier);
    }    
}

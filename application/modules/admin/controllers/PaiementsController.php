<?php
class Admin_PaiementsController extends Core_Controller {

/**************************************************************************************************
	Page Index :
**************************************************************************************************/

    public function indexAction()
    {       
    $this->select                       =           $this->db->select()->from('liste_paiements');
    $this->select->join('liste_clients','liste_paiements.id_client = liste_clients.id_client');
    $this->select->join('liste_paniers','liste_paniers.id_panier = liste_paiements.id_panier',array('id_liste'));
    $this->select->join('liste_naissances','liste_naissances.id_liste =liste_paniers.id_liste',array('id_liste','nom_famille','prenom_enfant'));

    $this->liste                        =           $this->db->fetchAll($this->select);

    // Paginator :

    $paginator                          =           Zend_Paginator::factory($this->liste);
    
    $paginator->setItemCountPerPage(100);
    $paginator->setCurrentPageNumber($this->page);
    $this->view->paginator              =           $paginator;        
    }  

}

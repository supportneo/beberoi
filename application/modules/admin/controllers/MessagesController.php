<?php
class Admin_MessagesController extends Core_Controller {

/**************************************************************************************************	
	Page Index : 
**************************************************************************************************/    
    
    public function indexAction()
    {  
    $this->select                       =           $this->db->select()->from('messages_felicitations');
    $this->select->join('liste_clients','messages_felicitations.id_client = liste_clients.id_client');
    $this->select->join('liste_paniers','messages_felicitations.id_panier = liste_paniers.id_panier');
    $this->select->join('liste_naissances','liste_paniers.id_liste =  liste_naissances.id_liste');
    $this->liste                        =           $this->db->fetchAll($this->select);

    $paginator                          =           Zend_Paginator::factory($this->liste);
    $paginator->setItemCountPerPage(100);
    $paginator->setCurrentPageNumber($this->page);
    $this->view->paginator              =           $paginator;        
    }  
    
}

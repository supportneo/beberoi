<?php
class Admin_ClientsController extends Core_Controller {

/**************************************************************************************************	
	Page Index : 
**************************************************************************************************/    
    
    public function indexAction()
    {  
    $this->select                       =           $this->db->select()->from('liste_clients');

    $this->liste                        =           $this->db->fetchAll($this->select);

    // Paginator :

    $paginator                          =           Zend_Paginator::factory($this->liste);
    $paginator->setItemCountPerPage(100);
    $paginator->setCurrentPageNumber($this->page);
    $this->view->paginator              =           $paginator;        
    }  
    
}

<?php

class Application_Model_Membres
{
/**************************************************************************************************	
        Constructeur : 
**************************************************************************************************/    

    public function __construct() 
    {
    $this->db                   =       Zend_Registry::get('db');
    $this->db->setFetchMode(Zend_Db::FETCH_OBJ);
    }

/**************************************************************************************************	
        Genpassword : 
***************************************************************************************************/    
    
    public function liste()
    {
    return $this->db->fetchAll($this->db->select()->from('membres'));    
    }      

/**************************************************************************************************	
        Membres : 
***************************************************************************************************/    
    
    public function membre($id_membre)
    {
    return $this->db->fetchRow($this->db->select()->from('membres')->where('id_membre = '.(int) $id_membre));    
    }       
    
/**************************************************************************************************	
        Membres : 
***************************************************************************************************/    
    
    public function membrebysession($id_session)
    {
    return $this->db->fetchRow($this->db->select()->from('membres')->where('id_session = '.(int) $id_session));    
    }      
    
/**************************************************************************************************	
        Création Membre : 
***************************************************************************************************/    
    
    public function inscription($valeurs)
    {
    $this->db->insert('membres',array_merge($valeurs,array('password' => md5($valeurs['password']), 'actif' => 0,'date_insert' => new Zend_Db_Expr('NOW()'))));
    }      
    
/**************************************************************************************************	
        Activer Membre : 
***************************************************************************************************/    
    
    public function activer($id_membre)
    {
    return $this->db->update('membres',array('actif' => 1),"id_membre = ".(int) $id_membre);
    }     
    
/**************************************************************************************************	
        Désactiver Membre : 
***************************************************************************************************/    
    
    public function desactiver($id_membre)
    {
    return $this->db->update('membres',array('actif' => 0),"id_membre = ".(int) $id_membre);
    }     
        
/**************************************************************************************************	
        Supprimer Membre : 
***************************************************************************************************/    
    
    public function supprimer($id_membre)
    {
    return $this->db->delete('membres',"id_membre = ".(int) $id_membre);
    }       

/**************************************************************************************************	
        Générer session : 
***************************************************************************************************/    
    
    public function generersession($id_membre,$id_session)
    {       
    return $this->db->update('membres',array('id_session' => $id_session),"id_membre = ".(int) $id_membre);
    }     
    
}// fin class
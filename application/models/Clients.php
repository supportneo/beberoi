<?php

class Application_Model_Clients
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
    return $this->db->fetchAll($this->db->select()->from('liste_clients'));    
    }      

/**************************************************************************************************	
        Clients : 
***************************************************************************************************/    
    
    public function client($id_client)
    {
    return $this->db->fetchRow($this->db->select()->from('liste_clients')->where('id_client = '.(int) $id_client));    
    }       
    
/**************************************************************************************************	
        Clients : 
***************************************************************************************************/    
    
    public function clientbysession($id_session)
    {
    return $this->db->fetchRow($this->db->select()->from('liste_clients')->where("id_session != '' && id_session = '".$id_session."'"));    
    }      
    
/**************************************************************************************************	
        Création Client : 
***************************************************************************************************/    
    
    public function inscription($valeurs)
    {
    $this->db->insert('liste_clients',array_merge($valeurs,array('password' => md5($valeurs['password']), 'actif' => 0,'date_insert' => new Zend_Db_Expr('NOW()'))));
    return $this->db->lastInsertId();
    }  

/************************************************************************************************** 
        Modifier Client : 
***************************************************************************************************/    
    
    public function modification($id_client,$form)
    {
    return $this->db->update('liste_clients',$form,"id_client = ".(int) $id_client);
    }    
    
/**************************************************************************************************	
        Activer Client : 
***************************************************************************************************/    
    
    public function activer($id_client)
    {
    return $this->db->update('liste_clients',array('actif' => 1),"id_client = ".(int) $id_client);
    }     
    
/**************************************************************************************************	
        Activer Client by code : 
***************************************************************************************************/    
    
    public function activerbycode($id_client,$code_activation)
    {
    return $this->db->update('liste_clients',array('actif' => 1),"id_client = ".(int) $id_client." && code_activation = '".$code_activation."'");
    }      
    
/**************************************************************************************************	
        Désactiver Client : 
***************************************************************************************************/    
    
    public function desactiver($id_client)
    {
    return $this->db->update('liste_clients',array('actif' => 0),"id_client = ".(int) $id_client);
    }     
        
/**************************************************************************************************	
        Supprimer Client : 
***************************************************************************************************/    
    
    public function supprimer($id_client)
    {
    return $this->db->delete('liste_clients',"id_client = ".(int) $id_client);
    }       

/**************************************************************************************************	
        Générer session : 
***************************************************************************************************/    
    
    public function generersession($id_client,$id_session)
    {       
    return $this->db->update('liste_clients',array('id_session' => $id_session),"id_client = ".(int) $id_client);
    }     
    
}// fin class
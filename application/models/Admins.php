<?php

class Application_Model_Admins
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
    return $this->db->fetchAll($this->db->select()->from('liste_admins'));    
    }      

/**************************************************************************************************	
        admins : 
***************************************************************************************************/    
    
    public function admin($id_admin)
    {
    return $this->db->fetchRow($this->db->select()->from('liste_admins')->where('id_admin = '.(int) $id_admin));    
    }       
    
/**************************************************************************************************	
        admins : 
***************************************************************************************************/    
    
    public function adminbysession($id_session)
    {
    return $this->db->fetchRow($this->db->select()->from('liste_admins')->where("id_session != '' && id_session = '".$id_session."'"));    
    }      
    
/**************************************************************************************************	
        Création admin : 
***************************************************************************************************/    
    
    public function inscription($valeurs)
    {
    $this->db->insert('liste_admins',array_merge($valeurs,array('password' => md5($valeurs['password']), 'actif' => 0,'date_insert' => new Zend_Db_Expr('NOW()'))));
    return $this->db->lastInsertId();
    }      
    
/**************************************************************************************************	
        Activer admin : 
***************************************************************************************************/    
    
    public function activer($id_admin)
    {
    return $this->db->update('liste_admins',array('actif' => 1),"id_admin = ".(int) $id_admin);
    }     
    
/**************************************************************************************************	
        Activer admin by code : 
***************************************************************************************************/    
    
    public function activerbycode($id_admin,$code_activation)
    {
    return $this->db->update('liste_admins',array('actif' => 1),"id_admin = ".(int) $id_admin." && code_activation = '".$code_activation."'");
    }      
    
/**************************************************************************************************	
        Désactiver admin : 
***************************************************************************************************/    
    
    public function desactiver($id_admin)
    {
    return $this->db->update('liste_admins',array('actif' => 0),"id_admin = ".(int) $id_admin);
    }     
        
/**************************************************************************************************	
        Supprimer admin : 
***************************************************************************************************/    
    
    public function supprimer($id_admin)
    {
    return $this->db->delete('liste_admins',"id_admin = ".(int) $id_admin);
    }       

/**************************************************************************************************	
        Générer session : 
***************************************************************************************************/    
    
    public function generersession($id_admin,$id_session)
    {       
    return $this->db->update('liste_admins',array('id_session' => $id_session),"id_admin = ".(int) $id_admin);
    }     
    
}// fin class
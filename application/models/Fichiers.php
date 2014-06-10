<?php

class Application_Model_Fichiers
{
/**************************************************************************************************	
        Constructeur : 
**************************************************************************************************/    

    public function __construct() 
    {
    $this->db                   =       Zend_Registry::get('db');
    $this->rep_fichiers         =      $_SERVER['DOCUMENT_ROOT'].'/../uploads/';
    }

/**************************************************************************************************	
        Genpassword : 
***************************************************************************************************/    
    
    public function GenPassword()
    {
    $length = 10;
    $ranges = array(range('a', 'z'), range('A', 'Z'), range(1, 9));
        $code = '';
        for($i = 0; $i < $length; $i++){
            $rkey = array_rand($ranges);
            $vkey = array_rand($ranges[$rkey]);
            $code .= $ranges[$rkey][$vkey];
        }
        return $code;    
    }
    
/**************************************************************************************************	
        Get Fichier By id : 
***************************************************************************************************/    
    
    public function GetFichierByRandFile($rand_file,$statut)
    {
    $this->db->setFetchMode(Zend_Db::FETCH_OBJ);
    $this->req = $this->db->select()->from('fichiers')->where("rand_file='$rand_file'");
    if($statut != 'admin') {$this->req->where("actif='1'");}
    return $this->db->fetchRow($this->req);
    }     
    
/**************************************************************************************************	
        Get Fichier By id : 
***************************************************************************************************/    
    
    public function GetFichierByIdFile($id_fichier)
    {
    $this->db->setFetchMode(Zend_Db::FETCH_OBJ);
    return $this->db->fetchRow($this->db->select()->from('fichiers')->where("id_fichier='$id_fichier'"));
    }     
    
/**************************************************************************************************	
        Get Nom fichier : 
***************************************************************************************************/    
    
    public function GetFichier($id_fichier)
    {
    $this->db->setFetchMode(Zend_Db::FETCH_OBJ);
    $return                         =       $this->db->fetchRow($this->db->select()->from('fichiers',array('fichier'))->where("id_fichier='$id_fichier'"));
    return $return->fichier;
    }     
        
    
/**************************************************************************************************	
        Modifier rand file : 
***************************************************************************************************/    
    
    public function ModifierRandFile($id_fichier,$rand_file)
    {
    $this->db->setFetchMode(Zend_Db::FETCH_OBJ);
    return $this->db->update('fichiers',array('rand_file' => $rand_file),'id_fichier = '.(int) $id_fichier);
    }     
 
/**************************************************************************************************	
        Get liste fichiers membres : 
***************************************************************************************************/    
    
    public function liste($id_membre='')
    {
    $this->db->setFetchMode(Zend_Db::FETCH_OBJ);
   
    $this->req                          =       $this->db->select()->from('fichiers');
    if($id_membre)                        {$this->req->where("id_membre=".(int) $id_membre);}
    return $this->db->fetchAll($this->req);
    }    
    
/**************************************************************************************************	
        Envoi fichier : 
***************************************************************************************************/    

    public function EnvoiFichier($id_membre, $fichier)
    {
     if($fichier['name']) 
        {
        
        $datas                         =           array('actif' => 1, 'id_membre' => $id_membre, 'nom_fichier' => $fichier['name'], 'size' => $fichier['size'],'type' => $fichier['type']);
        $this->db->insert('fichiers',$datas);

        $id_fichier                    =            $this->db->lastInsertId();       
        $extension                     =            pathinfo($fichier['name'], PATHINFO_EXTENSION); 
        $rand                          =            $this->GenPassword().$id_fichier;
        $nom_fichier                   =            'fichier-'.$id_fichier.'-'.$id_membre.'.'.$extension;
        
        $this->db->update('fichiers',array('rand_file' => $rand,'fichier' => $nom_fichier, 'date_insert' => new Zend_Db_Expr('NOW()')),"id_fichier = '$id_fichier'");        
        rename($fichier['tmp_name'],$this->rep_fichiers.$nom_fichier);
        return $rand;
        }    
        
    }      
   
    
/**************************************************************************************************	
        Activer fichier : 
***************************************************************************************************/    
    
    public function activer($id_fichier)
    {
    return $this->db->update('fichiers',array('actif' => 1),"id_fichier = ".(int) $id_fichier);
    }     
    
/**************************************************************************************************	
        Désactiver fichier : 
***************************************************************************************************/    
    
    public function desactiver($id_fichier)
    {
    return $this->db->update('fichiers',array('actif' => 0),"id_fichier = ".(int) $id_fichier);
    }     
        
/**************************************************************************************************	
        Supprimer fichier : 
***************************************************************************************************/    
    
    public function supprimer($id_fichier)
    {       
    $fichier                    =       $this->GetFichier($id_fichier);
    @unlink($this->rep_fichiers.$fichier) or die("Impossible de supprimer le fichier $id_fichier");
    return $this->db->delete('fichiers',"id_fichier = ".(int) $id_fichier);
    }       
    
    
}// fin class
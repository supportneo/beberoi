<?php
class Application_Model_ListeNaissance
{
/**************************************************************************************************	
        Constructeur : 
**************************************************************************************************/    

    public function __construct() 
    {
    $this->db                   =       Zend_Registry::get('db');
    $this->db->setFetchMode(Zend_Db::FETCH_OBJ);
    }

/***************************************************************************************************	
        Listes by identifiant : 
***************************************************************************************************/    
    
    public function listebyidentifiant($identifiant)
    {
    return $this->db->fetchRow($this->db->select()->from('liste_naissances')->where("identifiant = '".$identifiant."'"));    
    }    
    
/**************************************************************************************************	
        Accès liste by code : 
***************************************************************************************************/        
    
    public function listebycode($identifiant,$code)
    {
     $this->select                       =           $this->db->select()->from('liste_naissances');
     $this->select->where("identifiant = '$identifiant'");
     $this->select->where("code_acces  = '$code'");
     $row                                =           $this->db->fetchRow($this->select);
     
     if(count($row))
     {
     $this->liste                        =           (object) array();
     $this->liste->statut                =           'OK';
     $this->liste->infos                 =           $this->liste_infos($row->id_liste);
     $this->liste->details               =           $this->liste_details($row->id_liste);
     return $this->liste;
     }
     else
     {
     return 'NOK';
     }  
     }
    
/**************************************************************************************************	
        Détails liste
***************************************************************************************************/    
    
    public function liste_infos($id_liste)
    {
    $this->select                       =           $this->db->select()->from('liste_naissances');
    $this->select->where('liste_naissances.id_liste = '.$id_liste);
    return $this->db->fetchRow($this->select);     
    }
    
/**************************************************************************************************	
        Détails liste
***************************************************************************************************/    
    
    public function liste_details($id_liste)
    {
    $this->select           =           $this->db->select()->from('liste_naissances_det');
    $this->select->join('liste_naissances','liste_naissances.id_liste =  liste_naissances_det.id_liste');
    $this->select->where('liste_naissances.id_liste = '.$id_liste);
    return $this->db->fetchAll($this->select);  
    }      
    

/**************************************************************************************************	
        Mettre à jour le panier : 
***************************************************************************************************/    
    
    public function liste_maj($id_liste)
    {     
    $data               =       $this->db->fetchAll($this->db->select()->from('liste_paniers_det',array('id_liste','id_produit', 'prix_paye_tot' => new Zend_Db_Expr('SUM(prix_paye)')))->where("id_liste='$id_liste'")->group('id_produit'));     
    foreach($data as $row)
    {
    $this->db->update('liste_naissances_det',array('prix_paye' => $row->prix_paye_tot,'date_modif' => new Zend_Db_Expr('NOW()')), "id_liste = '$row->id_liste' && id_produit = '$row->id_produit'");
    }
   
    $infos_liste        =       $this->db->fetchRow($this->db->select()->from('liste_paniers_det',array('id_liste','id_produit', 'prix_paye_tot' => new Zend_Db_Expr('SUM(prix_paye)')))->where("id_liste='$id_liste'")->group('id_liste'));      
    $this->db->update('liste_naissances',array('total_paye' => $infos_liste->prix_paye_tot,'date_modif' => new Zend_Db_Expr('NOW()')), "id_liste = '$row->id_liste'");
    }    
    
/**************************************************************************************************	
        Création Liste : 
***************************************************************************************************/    
    
    public function creer($valeurs)
    {
    $this->db->insert('liste_naissances',array_merge($valeurs,array('password' => md5($valeurs['password']), 'actif' => 0,'date_insert' => new Zend_Db_Expr('NOW()'))));
    }      
    
/**************************************************************************************************	
        Activer Liste : 
***************************************************************************************************/    
    
    public function activer($id_liste)
    {
    return $this->db->update('liste_naissances',array('actif' => 1),"id_liste = ".(int) $id_liste);
    }     

/**************************************************************************************************	
        Désactiver Liste : 
***************************************************************************************************/    
    
    public function desactiver($id_liste)
    {
    return $this->db->update('liste_naissances',array('actif' => 0),"id_liste = ".(int) $id_liste);
    }     
        
/**************************************************************************************************	
        Supprimer Liste : 
***************************************************************************************************/    
    
    public function supprimer($id_liste)
    {
    return $this->db->delete('liste_naissances',"id_liste = ".(int) $id_liste);
    }       

/**************************************************************************************************	
        demande accès : 
***************************************************************************************************/    
    
    public function demande_acces($identifiant,$code)
    {
    return $this->db->fetchRow($this->db->select()->from('liste_naissances')->where("identifiant = '".$identifiant."' && code_acces = '".$code."'"));    
    }  
    
/**************************************************************************************************	
        vérifier accès : 
***************************************************************************************************/    
    
    public function verifier_acces($id_client,$identifiant)
    {
    $infos_liste                =           $this->listebyidentifiant($identifiant);            
    $id_liste                   =           $infos_liste->id_liste;
    return $this->db->fetchRow($this->db->select()->from('liste_acces')->where("id_liste = '".(int) $id_liste."' && id_client = '".$id_client."'"));    
    }      
    
/**************************************************************************************************	
        autoriser accès : 
***************************************************************************************************/    
    
    public function autoriser_acces($id_client,$identifiant)
    {     
    if(!$this->verifier_acces($identifiant,$id_client))
    {
    $infos_liste                =           $this->listebyidentifiant($identifiant);            
    $id_liste                   =           $infos_liste->id_liste;
    return $this->db->insert('liste_acces',array('id_client' => $id_client,'id_liste' => $id_liste,'actif' => '1','date_insert' => new Zend_Db_Expr('NOW()')));
    }
    else 
    {
    return false;    
    }
    }      

/**************************************************************************************************	
        Supprimer Acces Liste : 
***************************************************************************************************/    
    
    public function supprimer_acces($id_client, $id_liste)
    {
    return $this->db->delete('liste_acces',"id_client = '". (int) $id_client. "' && id_liste = '".(int) $id_liste."'");
    }      
               
/**************************************************************************************************	
        Infos sur un panier :  
***************************************************************************************************/    
   
    public function panier_infos($id_panier)
    {
    $this->panier_total($id_panier);
    $this->select                       =           $this->db->select()->from('liste_paniers')->where("id_panier = '$id_panier'");
    return $this->db->fetchRow($this->select);    
    }      
    
/**************************************************************************************************	
        Liste des produit du panier :  
***************************************************************************************************/    
    
    public function panier_liste($id_panier)
    {
    $this->select                       =           $this->db->select()->from('liste_paniers_det',array('id_produit','prix_paye','id_liste'));
    $this->select->join('liste_paniers','liste_paniers.id_panier = liste_paniers_det.id_panier');
    $this->select->join('liste_naissances_det','liste_paniers_det.id_produit = liste_naissances_det.id_produit',array('ref_produit','nom_produit','prix_vente'));
    $this->select->where("liste_paniers.id_panier = '".$id_panier."'");

    return $this->db->fetchAll($this->select);    
    }         
    
/**************************************************************************************************	
        Créer un panier :  
***************************************************************************************************/    
    
    public function panier_creer($id_client,$id_liste)
    {
    $this->db->insert('liste_paniers',array('id_client' => $id_client,'id_liste' => $id_liste, 'statut' => '0','date_insert' => new Zend_Db_Expr('NOW()')));
    return $this->db->lastInsertId();
    }     
    
/**************************************************************************************************	
        Ajouter au panier : 
***************************************************************************************************/    
    
    public function panier_ajout($id_client,$id_liste,$id_panier,$id_produit,$prix_paye)
    {
    return $this->db->insert('liste_paniers_det',array('id_client' => $id_client,'id_panier' => $id_panier, 'id_liste' => $id_liste, 'id_produit' => $id_produit, 'prix_paye' => $prix_paye, 'statut' => '0','date_insert' => new Zend_Db_Expr('NOW()')));
    }    
    
/**************************************************************************************************	
        Calculer le total du panier :
***************************************************************************************************/    
    
    public function panier_total($id_panier)
    {
    $infos_panier               =           $this->db->fetchRow($this->db->select()->from('liste_paniers_det',array('total' => new Zend_Db_Expr('SUM(prix_paye)')))->where("id_panier = '$id_panier'"));
    $this->db->update('liste_paniers',array('total_paye' => $infos_panier->total, 'statut' => '1','date_modif' => new Zend_Db_Expr('NOW()')),"id_panier = '$id_panier'");    
    return $infos_panier->total;
    }      

    /**************************************************************************************************	
        Valider le panier : 
***************************************************************************************************/    
    
    public function panier_payer($id_client,$mode_paiement,$id_panier)
    {    
    $total_paye                 =       $this->panier_total($id_panier);        
    $this->db->insert('liste_paiements',array('id_client' => $id_client, 'id_panier' => $id_panier, 'mode_paiement' => $mode_paiement, 'statut_paiement' => '1', 'date_insert' => new Zend_Db_Expr('NOW()'),'prix_paye' => $total_paye, 'date_modif' => new Zend_Db_Expr('NOW()')));
    $this->db->update('liste_paniers',array('total_paye' => $total_paye, 'statut' => '1','date_modif' => new Zend_Db_Expr('NOW()')),"id_panier = '$id_panier'");    
    $this->db->update('liste_paniers_det',array('statut' => '1','date_modif' => new Zend_Db_Expr('NOW()')),"id_panier = '$id_panier'");    
    }

/**************************************************************************************************	
        liste messages : 
***************************************************************************************************/    
    
    public function liste_messages()
    {  
    return $this->db->fetchAll($this->db->select()->from('messages_felicitations')->where("id_liste='$id_liste'"));     
    //$this->select->join('liste_naissances_det','liste_naissances_det.id_liste = liste_naissances.id_liste');
    }     

/**************************************************************************************************	
        Mettre à jour le panier : 
***************************************************************************************************/    
    
    public function message($id_client,$id_panier,$message)
    {  
    $this->db->insert('messages_felicitations',array('id_client' => $id_client,'id_panier' => $id_panier, 'message' => $message, 'statut' => '0', 'date_insert' => new Zend_Db_Expr('NOW()')));
    }    
    
}// fin class
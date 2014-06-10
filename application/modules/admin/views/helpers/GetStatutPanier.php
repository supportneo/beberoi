<?php
class Zend_View_Helper_GetStatutPanier extends Zend_View_Helper_Abstract 
{
    public function GetStatutPanier($statut)
    {
    if($statut == '0')   {return '<span class="label label-info">En attente de paiement</span>';}
    if($statut == '1')   {return '<span class="label label-success">Paiement validé</span>';}
    }
    
    }
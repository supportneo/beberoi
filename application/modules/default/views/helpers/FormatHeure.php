<?php
class Zend_View_Helper_FormatHeure extends Zend_View_Helper_Abstract 
{
    public function FormatHeure($nb_min)
    {
    if(preg_match('#([0-9]{2,2}):([0-9]{2,2}):([0-9]{2,2})#',$nb_min)) {return preg_replace('#([0-9]{2,2}):([0-9]{2,2}):([0-9]{2,2})#','$1:$2',$nb_min);}
    else 
    {        
    $total = $nb_min*60;
    $heure = intval(abs($total / 3600)); 
    $total2 = $total - ($heure * 3600); 
    $minute = intval(abs($total2 / 60)); 
    return str_pad($heure,2,'0',STR_PAD_LEFT)."h".str_pad($minute,2,'0',STR_PAD_LEFT); 
    }
    }
}
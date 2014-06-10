<?php
class Application_Plugin_Tools extends Zend_Controller_Plugin_Abstract 
{
    
/**************************************************************************************************	
        Formater une date format fr => SQL :
**************************************************************************************************/    
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
    
/**************************************************************************************************	
        Formater une heure :! 
**************************************************************************************************/    
    
    public function format_date_fr_sql($date)
    {
    return preg_replace('#([0-9]{2,2})/([0-9]{2,2})/([0-9]{4,4})#','$3-$2-$1',$date);
    }    

/**************************************************************************************************	
        Formater une date format SQL => fr :
**************************************************************************************************/        
    public function format_date_sql_fr($date)
    {
    return preg_replace('#([0-9]{4,4})-([0-9]{2,2})-([0-9]{2,2})#','$3/$2/$1',$date);
    }  
    
/**************************************************************************************************	
        Générer un mot de pass aléatoire : 
**************************************************************************************************/    
    
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
        Gestion monnaie locale :
**************************************************************************************************/    

    public function format_monnaie($valeur,$monnaie = 'XFP')
    {
    return new Zend_Currency(array('value' => $valeur, 'currency'  => $monnaie,'precision' => 2));
    }                  
    
}
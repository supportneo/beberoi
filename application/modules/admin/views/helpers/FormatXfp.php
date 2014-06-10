<?php
class Zend_View_Helper_FormatXfp extends Zend_View_Helper_Abstract 
{
    public function FormatXfp($valeur_xpf)
    {      
    return new Zend_Currency(array('value' => $valeur_xpf, 'currency'  => 'XFP','precision' => 0, 'symbol' => 'XFP'));
    }
}
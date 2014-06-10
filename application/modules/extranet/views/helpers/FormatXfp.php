<?php
class Zend_View_Helper_FormatXfp extends Zend_View_Helper_Abstract 
{
    public function FormatXfp($valeur_xpf)
    {
    $prix = new Zend_Currency(array('value' => $valeur_xpf, 'currency'  => 'XPF','precision' => 0, 'symbol' => 'XPF'));
    $prix .= ' ('.new Zend_Currency(array('value' => round($valeur_xpf/119,3317), 'currency'  => 'EUR','precision' => 2, 'symbol' => '€')).')';
    
    return $prix;
    }
}
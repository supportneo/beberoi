<?php
class Zend_View_Helper_FormatNumber extends Zend_View_Helper_Abstract 
{
    public function FormatNumber($number)
    {
    return number_format($number, 2, ',', ' ');
    }
}
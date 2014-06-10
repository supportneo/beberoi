<?php
class Zend_View_Helper_FormatDate extends Zend_View_Helper_Abstract 
{
    public function FormatDate($date)
    {
    if(preg_match('#([0-9]{4,4})-([0-9]{2,2})-([0-9]{2,2}) ([0-9]{2,2}):([0-9]{2,2}):([0-9]{2,2})#',$date)) {return preg_replace('#([0-9]{4,4})-([0-9]{2,2})-([0-9]{2,2}) ([0-9]{2,2}):([0-9]{2,2}):([0-9]{2,2})#','$3/$2/$1',$date);}
    if(preg_match('#([0-9]{4,4})-([0-9]{2,2})-([0-9]{2,2})#',$date)) {return preg_replace('#([0-9]{4,4})-([0-9]{2,2})-([0-9]{2,2})#','$3/$2/$1',$date);}
    }
}
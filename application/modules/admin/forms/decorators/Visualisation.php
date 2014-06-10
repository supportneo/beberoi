<?php
class Form_Decorators_Visualisation extends Zend_Form_Decorator_Abstract {
    public function render($content) {
        $element = $this->getElement();
        $helper = $element->helper;
        if (!$element instanceof Zend_Form_Element) {
            return $content;
        }
        if (null === $element->getView()) {
            return $content;
        }

                $this->tools = new Application_Plugin_Tools();

        $valeur = (preg_match('#date_#',$element->getName())) ? $this->tools->format_date_sql_fr($element->getValue()) : $element->getValue();
if($element->getName() == 'cumul_heure') {$valeur=$valeur/60;}
        
if($helper == 'formSubmit')         {return '';}
elseif($helper == 'formSelect')     {return "\n".'<p><label for="' . $element->getName() . '">' . $element->getLabel() .  ' </label> '.$element->options[$element->GetValue()].'</p>'; }
elseif($helper == 'formTextarea')   {return "\n".'<div class="alert alert-info" style="width:95%;padding:5px auto 5px auto;margin:10px auto 10px auto;">'. $valeur . '</div>';}
else                                {return "\n".'<p><label for="' . $element->getName() . '">' . $element->getLabel() .  ' </label> '. $valeur . '</p>';}
    
    }
}
//fin class
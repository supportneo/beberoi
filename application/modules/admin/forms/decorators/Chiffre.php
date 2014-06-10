<?php
class Form_Decorators_Chiffre extends Zend_Form_Decorator_Abstract {
    public function render($content) {
        $element = $this->getElement();
        $helper = $element->helper;
        if (!$element instanceof Zend_Form_Element) {
            return $content;
        }
        if (null === $element->getView()) {
            return $content;
        }
                
return '<strong>'.$element->GetValue().' €</strong>';
    }
}
//fin class
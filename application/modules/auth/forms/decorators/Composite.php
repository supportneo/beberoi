<?php
class Form_Decorators_Composite extends Zend_Form_Decorator_Abstract {
    public function _construct()
    {
    }
    public function buildLabel() {
        $element = $this->getElement();
        $helper = $element->helper;
        $label = $element->getLabel();
        if ($element->isRequired()) {
            $label .= '*';
        }
        if($label)  {return '<label for="' . $element->getName() . '">' . $label . '</label>';}
    }
    public function buildInput() {
        $element = $this->getElement();
        $helper = $element->helper;
        $atrr = $element->getAttribs();
        unset($atrr['helper']);
        
        $valeur = $element->getValue();
        return $element->getView()->$helper($element->getName(), $valeur, $atrr, $element->options);      
    }
    public function buildErrors() {
        $element = $this->getElement();
        $messages = $element->getMessages();
        foreach ($messages as $key => $msg) {
            $view = $this->getElement()->getView();
            $view->jquery_msg_error .= "\n" . '<script>$("#' . $element->GetId() . '").addClass("error"); $("#' . $element->GetId() . '-error").html("' . $msg . '");</script>';
        }
    }
    public function buildDescription() {
        $element = $this->getElement();
        $desc = $element->getDescription();
        if (empty($desc)) {
            return '';
        }
        return '<span class="description">' . $desc . '</span>';
    }
    public function render($content) {
        $element = $this->getElement();
        if (!$element instanceof Zend_Form_Element) {
            return $content;
        }
        if (null === $element->getView()) {
            return $content;
        }
        $helper = $element->helper;
        $separator = $this->getSeparator();
        $placement = $this->getPlacement();
        $label = $this->buildLabel();

        $errors = $this->buildErrors();
        $desc = $this->buildDescription();
        $class = ($helper == 'formSubmit') ? 'submit' : 'element';
        if ($helper == 'formSubmit'){$output = '<button type="submit" name="' . $element->GetName() . '" class="btn btn-primary">Valider</button>';}
        elseif ($helper == 'formRadio')
        {
        $output='';
        foreach($element->options as $name => $value)
        {
        $selected        =           ($element->GetValue() == $name) ? 'checked="checked"' : '';
        $output         .=           '<blockquote><input type="radio" name="'.$element->getName().'" id="radio" value="'.$name.'" '.$selected.' /> '.$value.'</blockquote>';
        }
        }
        elseif ($helper == 'formHidden') {$output = $this->buildInput();}
        else
        {
        $input = $this->buildInput();
        $input .= ($element->getMessages()) ? '<div class="alert alert-error" id="' . $element->GetId() . '-error"></div>' : '';

        $output = '<br />'.$label . $input. $desc. $errors;
        }
        switch ($placement) {
            case (self::PREPEND):
                return $output . $separator . $content;
            case (self::APPEND):
            default:
                return $content . ' ' . $separator . ' ' . $output;
        }
    }
}
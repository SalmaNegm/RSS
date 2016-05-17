<?php

class Application_Form_Rss extends Zend_Form
{

    public function init()
    {
        $path = new Zend_Form_Element_Text('path');
        $path->setRequired();
        $path->setLabel('path');
        $path->setAttrib('class','form-control col-1g-2');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('ADD');
        $submit->setAttrib('class', 'btn btn-primary col-sm-offset-3 col-sm-5');

        $this->addElements(array($path,$submit));
    }

    



}


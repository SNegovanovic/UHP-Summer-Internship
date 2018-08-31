<?php

namespace Forms;

use Forms\Element\SubmitElement;

abstract class BaseForm {

    public function __construct()
    {
        echo "<form action='' method='post'>";
        $this->init();
        echo "</form>";
    }

    abstract function init();


    public function createSubmitButton()
    {
        $submit = new SubmitElement('submit');
        $submit->setValue('SUBMIT');
        $submit->completeElement();

    }

}
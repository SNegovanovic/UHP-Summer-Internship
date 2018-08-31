<?php

namespace Forms;

use Forms\Element\BaseElement;
use Forms\Element\PasswordElement;
use Forms\Element\TextElement;

abstract class LoginRegisterBaseForm extends BaseForm {

    function createEmailField()
    {
        $email = new TextElement('email');
        $email->setPlaceholder('Please enter email');
//        $email->setValue('*@gmail.com');
        $email->completeElement();
    }

    function createPasswordField()
    {
        $password = new PasswordElement('password');
        $password->setPlaceholder('Enter password please');
        $password->completeElement();
    }

}
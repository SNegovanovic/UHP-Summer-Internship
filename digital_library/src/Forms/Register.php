<?php

namespace Forms;

use Forms\Element\PasswordElement;
use Models\User;
use Repository\UserRepository;

class Register extends LoginRegisterBaseForm {

    public function init()
    {
        $this->createEmailField();
        $this->createPasswordField();

        $password = new PasswordElement('confirm_password');
        $password->setPlaceholder('Please enter password again');
        $password->completeElement();

        $this->createSubmitButton();
    }

    public function save($postData)
    {
        $user = new User();
        $user->setEmail($postData['email']);
        $user->setPassword($postData['password']);
        // DZ
        $user->setDateRegistered((new \DateTime())->format('Y-m-d'));

        $userRepository = new UserRepository();
        $userRepository->saveUser($user);

        // echo "<pre>";
        // var_dump($user);
        // die();
        // snimi usera u bazu
    }
}
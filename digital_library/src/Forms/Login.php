<?php

namespace Forms;

use Forms\Element\PasswordElement;
use Models\User;
use Repository\UserRepository;

class Login extends LoginRegisterBaseForm {

    public function init()
    {
        $this->createEmailField();
        $this->createPasswordField();
        $this->createSubmitButton();
    }

    public function auth($postData)
    {
        $user = new User();
        $user->setEmail($postData['email']);
        $user->setPasswordBasic($postData['password']);

        $userrepo = new UserRepository();

        if ($userrepo->authUser($user)) {
            $array = array('email' => $user->getEmail());
            $user2 = $userrepo->getOneBy($array);
            $_SESSION['userId'] = $user2->getId();
        }

        echo "<pre>";
        var_dump($_SESSION);
        die();
    }

    /*
     public function loginVerification($postData){

        $userRepository = new UserRepository();
        $emailInput = $postData['email'];
        $passwordInput = $postData['password'];
        $user = $userRepository->getOneBy(array('email' => $emailInput));
        if($user != null){
            $passwordInput .= $user->getSalt();
            $passwordInput = md5($passwordInput) . $user->getSalt();
            if($passwordInput === $user->getPassword())
            {
                echo "Uspjesna prijava!";
                $_SESSION['userId'] = $user->getId();
            }
            else{
                echo "Reka sam NE MOŽE! Lozinka nije valjana!";
            }
        }
        else{
            echo "Neispravan mail!";
        }
    }
    /*
    public function checkLogin()
    {
        $loginRepository = new UserRepository();
        $loginRepository->check();
    }
    */
}
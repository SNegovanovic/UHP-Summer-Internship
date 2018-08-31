<?php

namespace Controllers;

use Forms\Login;
use Forms\Register;
use Models\User;
use Repository\UserRepository;

class UserController extends \BaseController
{

    // da overridea constructor u base controleru, da mozemo pristupiti prijavi i registraciji
    /**
     * UserController constructor.
     */
    public function __construct()
    {

    }

    public function create()
    {
        if (!isset($_SESSION['userId'])) {
            die('ne mozes ovdje bez authorizacije');
        }

        if ($this->isHttpGet()) {
            return $this->render('user:create', array());
        }

        if ($this->isHttpPost()) {

            $userData = array(
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'date_registered' => $_POST['date_registered']
            );

            $user = new User();

            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);
            $user->setDateRegistered($userData['date_registered']);

            $userRepository = new UserRepository();
            $lastInsertId = $userRepository->saveUser($user);

            header("Location: /user/show?id={$lastInsertId}");
        }
    }

    public function update()
    {
        if($this->isHttpGet()){

            $userRepository = new UserRepository();
            $user = $userRepository->getById($_GET['id']);
            return $this->render('user:update', $user);
        }

        if($this->isHttpPost()){

            $user = new User();

            $user->setEmail($_POST['email']);
            $user->setDateRegistered($_POST['date_registered']);

            if($_GET['id'])
            {
                $user->setId($_GET['id']);
            }

            $userRepository = new UserRepository();
            $userId = $userRepository->saveUser($user);

            header("Location: /user/show?id={$userId}");
        }
    }

    public function show()
    {
        if (!isset($_SESSION['userId'])) {
            die('ne mozes ovdje bez authorizacije');
        }

        $id = $_GET['id'];

        $userRepository = new UserRepository();

        $user = $userRepository->getById($id);

        return $this->render('user:show', $user);
    }

    public function showAll()
    {
        if (!isset($_SESSION['userId'])) {
            die('ne mozes ovdje bez authorizacije');
        }

        $userRepository = new UserRepository();

        $user = new User();

        $user = $userRepository->getAll();

        return $this->render('user:showAll', $user);
    }

    public function delete()
    {
        $id = $_GET['id'];

        $userRepository = new UserRepository();

        $userRepository->deleteById($id);

        $this->render('user:delete', array());
    }

    public function index()
    {
        $form = new Login();
        $this->render('user:index', $form);
    }

    public function register()
    {
        $form = new Register();

        if ($_POST) {
            // snimimo registraciju
            $form->save($_POST);
            header('Location: /user/login');
        }

        $this->render('user:register', $form);
    }

    public function login()
    {

        $form = new Login();

        if ($_POST) {
            $form->auth($_POST);
        }

        $this->render('user:login', $form);
    }

    public function logout()
    {
        if(isset($_SESSION['userId'])){
            unset($_SESSION['userId']);
            session_destroy();
        }
    }
}
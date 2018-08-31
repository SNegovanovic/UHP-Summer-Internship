<?php

namespace Models;

class User
{
    private $id;
    private $email;
    private $password;
    private $salt;
    private $date_registered;
    private $is_admin;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->setSalt();
        $this->password = md5($password . $this->getSalt()) . $this->getSalt();
    }
    /*
    public function setPasswordWithSalt($password, $salt)
    {
        return md5($password, $salt) . $salt;
    }
    */
    public function setPasswordBasic($password)
    {
        $this->password = $password;
    }

    public function setPasswordWithSalt($password, $salt)
    {
        $this->password = md5($password . $salt) . $salt;
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param mixed $salt
     */
    public function setSalt()
    {
        $this->salt = sha1(rand(0, 9999999));
    }

    /**
     * @return mixed
     */
    public function getDateRegistered()
    {
        return $this->date_registered;
    }

    /**
     * @param mixed $date_registered
     */
    public function setDateRegistered($date_registered)
    {
        $this->date_registered = $date_registered;
    }

    /**
     * @return mixed
     */
    public function getisAdmin()
    {
        return $this->is_admin;
    }

    /**
     * @param mixed $is_admin
     */
    public function setIsAdmin($is_admin)
    {
        $this->is_admin = $is_admin;
    }
}
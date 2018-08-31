<?php

namespace Repository;

use Models\User;

class UserRepository extends BaseRepository
{
    /*
    public function insertUser(\Models\User $user)
    {
        $userEmail = $user->getEmail();
        $userPassword = $user->getPassword();
        $userDateRegistered = $user->getDateRegistered();

        $statement = $this->pdoConnection->prepare(
            "INSERT INTO user(email, password, date_registered) 
                       VALUES (:email, :password, :date_registered)
                       ");

        $statement->bindParam(':email', $userEmail);
        $statement->bindParam(':password', $userPassword);
        $statement->bindParam(':date_registered', $userDateRegistered);

        $statement->execute();

        return $this->pdoConnection->lastInsertid('user');
    }
    */

    public function saveUser(User $user)
    {

        if($user->getId() === null)
        {
            $statement = $this->pdoConnection->prepare
            ("INSERT INTO user (email, password, salt, date_registered) VALUES (:email, :password, :salt, :date_registered)");
        }
        else
        {
            $statement = $this->pdoConnection->prepare
            ("UPDATE user SET email=:email, date_registered=:date_registered WHERE id={$user->getId()}");
        }

        if($user->getId() === null)
        {
            $statement->bindParam(':password', $user->getPassword());
            $statement->bindParam(':salt', $user->getSalt());
        }
        $statement->bindParam(':email', $user->getEmail());
        $statement->bindParam(':date_registered', $user->getDateRegistered());
        $statement->execute();

        if($user->getId() !== null)
        {
            return $user->getId();
        }

        return $this->pdoConnection->lastInsertId('user');
    }


    public function authUser(User $user)
    {
        $array = array('email' => $user->getEmail());
        $user2 = $this->getOneBy($array);

        if (is_null($user2)) {
            return false;
        }

        $user->setPasswordWithSalt($user->getPassword(), $user2->getSalt());
        if($user2->getPassword() === $user->getPassword()){
            return true;
        }  else {
            return false;
        }
    }
}
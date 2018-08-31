<?php

namespace Repository;

use PDO;
use Models\Author;

class AuthorRepository extends BaseRepository {

    public function getAllAuthors(){
        $statement = $this->pdoConnection->query("SELECT * FROM author");
//        $dbAuthor = $statement->fetchAll(PDO::FETCH_OBJ);
        $allAuthors = $this->pdoConnection->query("SELECT * FROM author")->fetchAll(PDO::FETCH_CLASS, \Models\Author::class);
//        foreach ($dbAuthor as $author){
//
//            array_push($allAuthors, $author);
//        }
//        echo "<pre>";
//        var_dump($allAuthors);die();
        return $allAuthors;
    }

    public function getAuthorById($authorId){

        $statement = $this->pdoConnection->prepare("SELECT * FROM author WHERE id=:authorId");

        $statement->bindParam(':authorId', $authorId);

        $statement->execute();

        $author = $statement->fetchObject(\Models\Author::class);

        return $author;
    }

    public function saveAuthor(\Models\Author $author)
    {
        if ($author->getId() != null) {
            // radi se o editu autora
            $statement = $this->pdoConnection->prepare(
                'UPDATE author SET first_name = :first_name, last_name = :last_name WHERE id=' . $author->getId());
        } else {
            // kreiraj novog autora
            $statement = $this->pdoConnection->prepare(
                "INSERT INTO author (first_name, last_name) VALUES (:first_name, :last_name)");
        }

        $first_name = $author->getFirstName();
        $last_name = $author->getLastName();
        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':last_name', $last_name);
        $statement->execute();

        if($author->getId() != null)
        {
            return $author->getId();
        }
        return $this->pdoConnection->lastInsertId('author');
    }

    /*
    public function insertAuthor(\Models\Author $author)
    {
        $authorFirstName = $author->getFirstName();
        $authorLastName = $author->getLastName();

        $statement = $this->pdoConnection->prepare(
            "INSERT INTO author(first_name, last_name) 
                       VALUES (:authorFirstName, :authorLastName)
                       ");

        $statement->bindParam(':authorFirstName', $authorFirstName);
        $statement->bindParam(':authorLastName', $authorLastName);

        $statement->execute();

        return $this->pdoConnection->lastInsertid('author');
    }
    */
}
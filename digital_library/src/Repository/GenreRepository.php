<?php

namespace Repository;
use PDO;
use Models\Genre;

class GenreRepository extends BaseRepository
{
    public function getAllGenres(){
        $statement = $this->pdoConnection->query("SELECT * FROM genre");
        $allGenres = $this->pdoConnection->query("SELECT * FROM genre")->fetchAll(PDO::FETCH_CLASS, \Models\Genre::class);
        return $allGenres;
    }

    public function saveGenre(Genre $genre)
    {
        if($genre->getId() === null)
        {
            $statement = $this->pdoConnection->prepare("INSERT INTO genre (name) VALUES (:name)");

        }
        else
        {
            $statement = $this->pdoConnection->prepare("UPDATE genre SET name=:name WHERE id={$genre->getId()}");
        }

        $statement->bindParam(':name', $genre->getName());
        $statement->execute();

        if($genre->getId() !== null)
        {
            return $genre->getId();
        }
        return $this->pdoConnection->lastInsertId('genre');
    }

    public function getGenreId($genreId){

        $statement = $this->pdoConnection->prepare("SELECT * FROM genre WHERE id=:genreId");

        $statement->bindParam(':genreId', $genreId);

        $statement->execute();

        $author = $statement->fetchObject(\Models\Genre::class);

        return $author;
    }

    /*
    public function insertGenre(\Models\Genre $genre)
    {
        $genreName = $genre->getName();

        $statement = $this->pdoConnection->prepare(
            "INSERT INTO genre(name) 
                       VALUES (:name)
                       ");

        $statement->bindParam(':name', $genreName);

        $statement->execute();

        return $this->pdoConnection->lastInsertid('genre');
    }
    */
}
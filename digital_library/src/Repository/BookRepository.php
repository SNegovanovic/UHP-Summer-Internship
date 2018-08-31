<?php

namespace Repository;

use Models\Book;

class BookRepository extends BaseRepository {

    public function saveBook(Book $book)
    {
        if($book->getId() === null)
        {
            $statement = $this->pdoConnection->prepare
            ("INSERT INTO book (title, year_published, author_id, genre_id) VALUES (:title, :year_published, :author_id, :genre_id)");
        }
        else
        {
            $statement = $this->pdoConnection->prepare
            ("UPDATE book SET title=:title, year_published=:year_published, author_id=:author_id, genre_id=:genre_id WHERE id={$book->getId()}");
        }


        $title = $book->getTitle();
        $yearPublished = $book->getYearPublished();
        $authorId = $book->getAuthorId();
        $genreId = $book->getGenreId();

        $statement->bindParam(':title',$title );
        $statement->bindParam(':year_published', $yearPublished);
        $statement->bindParam(':author_id', $authorId);
        $statement->bindParam(':genre_id', $genreId);
        $statement->execute();

        if($book->getId() !== null)
        {
            return $book->getId();
        }

        return $this->pdoConnection->lastInsertId('book');
    }

    /*
    public function insertBook(\Models\Book $book)
    {
        $bookTitle = $book->getTitle();
        $bookYearPublished = $book->getYearPublished();

        $statement = $this->pdoConnection->prepare(
            "INSERT INTO book(title, year_published) 
                       VALUES (:title, :year_published)
                       ");

        $statement->bindParam(':title', $bookTitle);
        $statement->bindParam(':year_published', $bookYearPublished);

        $statement->execute();

        return $this->pdoConnection->lastInsertid('book');
    }
    */
}
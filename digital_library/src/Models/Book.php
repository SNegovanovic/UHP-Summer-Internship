<?php

namespace Models;

use Repository\AuthorRepository;
use Repository\GenreRepository;

class Book
{
    private $id;
    private $title;
    private $year_published;
    private $genre_id;
    private $author_id;

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getYearPublished()
    {
        return $this->year_published;
    }

    /**
     * @param mixed $year_published
     */
    public function setYearPublished($year_published)
    {
        $this->year_published = $year_published;
    }

    /**
     * @return mixed
     */
    public function getGenreId()
    {
        return $this->genre_id;
    }

    public function getGenreObj()
    {
        $genreRepo = new GenreRepository();
        $genre = $genreRepo->getById($this->getGenreId());
        // $genre = $genreRepo->getById($this->genre_id);

        return $genre;
    }

    /**
     * @param mixed $genre_id
     */
    public function setGenreId($genre_id)
    {
        $this->genre_id = $genre_id;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    public function getAuthorObj()
    {
        $authorRepo = new AuthorRepository();
        $author = $authorRepo->getById($this->getAuthorId());
        // $author = $authorRepo->getById($this->author_id);

        return $author;
    }

    /**
     * @param mixed $author_id
     */
    public function setAuthorId($author_id)
    {
        $this->author_id = $author_id;
    }
}
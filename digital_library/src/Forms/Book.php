<?php

namespace Forms;

use Forms\Element\SelectElement;
use Forms\Element\TextElement;
use Repository\AuthorRepository;
use Repository\BookRepository;
use Repository\GenreRepository;

class Book extends BaseForm {

    /** @var \Models\Book|null $book */
    private $book;

    public function __construct($book = null)
    {
        $this->book = $book;
        parent::__construct();
    }

    public function init()
    {
        $bookTitle = new TextElement('title');
        $bookTitle->setPlaceholder('Please enter book title');
        if ($this->book) {
            $bookTitle->setValue($this->book->getTitle());
        }
        $bookTitle->completeElement();

        $authors = new SelectElement('authors');

        $authorRepo = new AuthorRepository();
        $allAuthors = $authorRepo->getAllAuthors();

        $authors->addOption(null, 'Izaberi vrijednost');
        foreach ($allAuthors as $singleAuthor) {
            $bool = false;
            if ($this->book && $singleAuthor->getId() == $this->book->getAuthorId()) {
                $bool = true;
            }
            $authors->addOption($singleAuthor->getId(), $singleAuthor->getFirstName() . " " . $singleAuthor->getLastName(), $bool);
        }

        $authors->completeElement();

        $genre = new SelectElement('genre');
        $genreRepo = new GenreRepository();
        $allGenres = $genreRepo->getAllGenres();
        $genre->addOption(null, 'Izaberi vrijendost');
        foreach ($allGenres as $singleGenre) {
            $bool = false;
            if ($this->book && $singleGenre->getId() == $this->book->getGenreId()) {
                $bool = true;
            }
            $genre->addOption($singleGenre->getId(), $singleGenre->getName(), $bool);
        }

        $genre->completeElement();

        $yearPublished = new TextElement('yearpublished');
        $yearPublished->setPlaceholder('Please enter year');
        if ($this->book) {
            $yearPublished->setValue($this->book->getYearPublished());
        }
        $yearPublished->completeElement();
        $this->createSubmitButton();
    }

    public function save($postData)
    {
        $book = new \Models\Book();
        $book->setTitle($postData['title']);
        $book->setAuthorId($postData['authors']);
        $book->setGenreId($postData['genre']);
        $book->setYearPublished($postData['yearpublished']);

        $bookRepo = new BookRepository();
        return $bookRepo->saveBook($book);
    }

}
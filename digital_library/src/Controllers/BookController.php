<?php

namespace Controllers;

use Forms\Book;
use Repository\BookRepository;

class BookController extends \BaseController
{
    /**
     * BookController constructor.
     */
    public function __construct()
    {
        // tu ide tvoj kod novi
        parent::__construct();
    }

    public function create()
    {
        $form = new Book(null);

       if($this->isHttpGet())
        {
            $this->render('book:create', $form);
        }
        if($this->isHttpPost())
        {
            $bookId = $form->save($_POST);

            header("Location: /book/show?id={$bookId}");
        }
    }

    public function update()
    {
        $id = $_GET['id'];

        $bookRepository = new BookRepository();

        $book = $bookRepository->getById($id);

        $form = new Book($book);

        if($this->isHttpGet())
        {
            return $this->render('book:update', $book);
        }

        if($this->isHttpPost())
        {
            $form->save($_POST);

            /*
            $book = new \Models\Book();

            $book->setTitle($_POST['title']);
            $book->setYearPublished($_POST['year_published']);
            $book->setAuthorId($_POST['author']);
            $book->setGenreId($_POST['genre']);

            if($_GET['id'])
            {
                $book->setId($_GET['id']);
            }

            $bookRepository = new \Repository\BookRepository();
            $bookId = $bookRepository->saveBook($book);

            header("Location: /book/show?id={$bookId}");
            */
        }
    }

    public function show()
    {
        $id = $_GET['id'];

        $bookRepository = new BookRepository();

        $book = $bookRepository->getById($id);

        return $this->render('book:show', $book);
    }

    public function showAll()
    {
        $bookRepository = new BookRepository();

        $book = $bookRepository->getAll();

        return $this->render('book:showAll', $book);
    }

    public function delete()
    {
        $id = $_GET['id'];

        $bookRepository = new BookRepository();

        $bookRepository->deleteById($id);

        $this->render("book:delete", array());
    }
}
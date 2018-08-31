<?php

namespace Controllers;

use Forms\Genre;
use Repository\GenreRepository;

class GenreController extends \BaseController
{
    public function create()
    {
        $form = new Genre();

        if ($this->isHttpGet()) {
            return $this->render('genre:create', $form);
        }

        if ($this->isHttpPost()) {
            $lastInsertId = $form->save($_POST);
            header("Location: /genre/show?id={$lastInsertId}");
            /*
            $genreData = array(
                'name' => $_POST['name']
            );


            $genre = new Genre();
            $genre->setName($genreData['name']);

            $genreRepository = new GenreRepository();
            $lastInsertId = $genreRepository->saveGenre($genre);

            header("Location: /genre/show?id={$lastInsertId}"); */
        }
        return null;
    }

    public function update()
    {
        if($this->isHttpGet())
        {

            $genreRepository = new GenreRepository();
            $genre = $genreRepository->getById($_GET['id']);
            return $this->render('genre:update', $genre);
        }

        if($this->isHttpPost())
        {
            $genre = new \Models\Genre();

            $genre->setName($_POST['name']);

            if($_GET['id'])
            {
                $genre->setId($_GET['id']);
            }
            $genreRepository = new GenreRepository();
            $genreId = $genreRepository->saveGenre($genre);
            header("Location: /genre/show?id={$genreId}");
        }
    }

    public function show()
    {
        $id = $_GET['id'];

        $genreRepository = new GenreRepository();

        $genre = $genreRepository->getById($id);

        return $this->render('genre:show', $genre);
    }

    public function showAll()
    {
        $genreRepository = new GenreRepository();

        $genre = $genreRepository->getAll();

        return $this->render('genre:showAll', $genre);
    }

    public function delete()
    {
        $id = $_GET['id'];

        $genreRepository = new GenreRepository();

        $genreRepository->deleteById($id);

        $this->render('genre:delete', array());
    }

}
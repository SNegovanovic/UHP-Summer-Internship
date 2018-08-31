<?php

namespace Controllers;

use Models\Author;
use Repository\AuthorRepository;

class AuthorController extends \BaseController
{
    public function create()
    {
        $form = new \Forms\Author();
        if ($this->isHttpGet()) {
            return $this->render('author:create', $form);
        }

        if ($this->isHttpPost()) {
            $lastInsertId = $form->save($_POST);
            header("Location: /authors/show?id={$lastInsertId}");
        }
        return null;
    }

    public function update()
    {
        $id = $_GET['id'];

        $authorRepository = new AuthorRepository();

        $author = $authorRepository->getById($id);

        if($this->isHttpGet()){
            return $this->render('author:update', $author);
        }

        if($this->isHttpPost()){

            $authorData = array(
                'first_name' => $_POST['first_name'],
                'last_name'  => $_POST['last_name']
            );

            $authorRepository = new AuthorRepository();

            if (!$author) {
                $author = new Author();
            }

            $author->setFirstName($authorData['first_name']);
            $author->setLastName($authorData['last_name']);

            $lastId = $authorRepository->saveAuthor($author);

            header("Location: /authors/show?id={$lastId}");
            /*
            $author = new Author();

            $author->setFirstName($_POST['first_name']);
            $author->setLastName($_POST['last_name']);

            if($_GET['id'])
            {
                $author->setId($_GET['id']);
            }

            $authorRepository = new AuthorRepository();
            $authorId = $authorRepository->saveAuthor($author);

            header("Location: /authors/show?id={$authorId}");
            */
        }
    }

    public function show()
    {
        $id = $_GET['id'];

        $authorRepository = new AuthorRepository();

        $author = $authorRepository->getById($id);

        return $this->render('author:show', $author);
    }

    public function showAll()
    {
        $authorRepository = new AuthorRepository();

        $authors = $authorRepository->getAll();

        return $this->render('author:showAll', $authors);
    }

    public function delete()
    {
        $id = $_GET['id'];

        $authorRepository = new AuthorRepository();

        $authorRepository->deleteById($id);

        $this->render('author:delete', array());
    }

    public function getBy()
    {
        $authorRepository = new AuthorRepository();
        $author = array (
            'first_name' => 'Hrvoje'
        );
        $authors = $authorRepository->getBy($author);
        return $this->render('author:getBy', $authors);
    }

    public function showAllAsJson ()
    {
        $files_data = $this->getAuthorsFromJsonFiles();

        return $this->json($files_data);
    }

    public function getAuthorsFromJsonFiles() {
        // get & prepare files
        $dataDir = scandir("data");
        $dataDirFiles = array_diff($dataDir, array('.', '..'));
        $dataDirFiles_fixed = array();

        foreach($dataDirFiles as $data) { array_push($dataDirFiles_fixed, $data); }

        // extract JSON data from files
        $files_data = array();
        foreach($dataDirFiles_fixed as $data) {
            $file_data = json_decode(file_get_contents("data/" . $data), 1);
            array_push($files_data, $file_data);
        }

        return $files_data;
    }
}
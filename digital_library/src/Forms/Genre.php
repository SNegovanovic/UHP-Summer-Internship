<?php

namespace Forms;

use Forms\Element\TextElement;
use Repository\GenreRepository;

class Genre extends BaseForm {

    const INPUT_NAME = 'name';

    public function init()
    {
        $firstName = new TextElement(self::INPUT_NAME);
        $firstName->setPlaceholder('Please enter name');
        $firstName->completeElement();

        $this->createSubmitButton();
    }

    public function save($postData)
    {
        $genreData = array(
            'name' => $_POST['name']
        );
        $genreRepository = new GenreRepository();

        $genre = new \Models\Genre();

        $genre->setName($genreData['name']);

        return $genreRepository->saveGenre($genre);
    }

}
<?php

namespace Forms;

use Forms\Element\TextElement;
use Repository\AuthorRepository;

class Author extends BaseForm {

    const INPUT_FIRST_NAME = 'firstname';

    public function init()
    {
        $firstName = new TextElement(self::INPUT_FIRST_NAME);
        $firstName->setPlaceholder('Please enter firstname');
        $firstName->completeElement();

        $lastName = new TextElement('lastname');
        $lastName->setPlaceholder('Please enter lastname');
        $lastName->completeElement();

        $this->createSubmitButton();
    }

    public function save($postData)
    {
        $authorData = array(
            'first_name' => $_POST['firstname'],
            'last_name' => $_POST['lastname']
        );

        $authorRepository = new AuthorRepository();

        $author = new \Models\Author();

        $author->setFirstName($authorData['first_name']);
        $author->setLastName($authorData['last_name']);

        return $authorRepository->saveAuthor($author);
    }

}
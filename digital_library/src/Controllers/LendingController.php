<?php

namespace Controllers;

use Models\Lending;
use Repository\BookRepository;
use Repository\LendingRepository;

class LendingController extends \BaseController
{
    public function create()
    {
        if($this->isHttpGet())
        {
            $lending = new Lending();
            $lending->setBookId($_GET['book_id']);
            $lending->setStartDate(new \DateTime());
            $lending->setUserId($_SESSION['userId']);

            $lendingRepository = new LendingRepository();
            $lendingID = $lendingRepository->createOrUpdateLending($lending);

            header("Location: /lending/show?id={$lendingID}");
        }

        if($this->isHttpPost())
        {
            $lending = new Lending();
            $lending->setBookId($_POST['book']);
            $lending->setStartDate($_POST['start_date']);
            $lending->setUserId($_POST['user']);

            $lendingRepository = new LendingRepository();
            $lendingID = $lendingRepository->createOrUpdateLending($lending);

            header("Location: /lending/show?id={$lendingID}");
        }
    }

    /*
    public function create()
    {
        $bookId = $_GET['id'];

        $bookRepo = new BookRepository();
        $book = $bookRepo->getById($bookId);

        $lending = new Lending();
        $lending->setBookId((int) $bookId);
        $lending->setUserId((int) $_SESSION['userId']);

        $datetime = new \DateTime();

        $lending->setStartDate($datetime);

        $lendingRepo = new LendingRepository();
        $lendingRepo->createOrUpdateLending($lending);


        $this->render('book:create', array());
    }
    */
    public function update()
    {
        if($this->isHttpGet())
        {
            $array = array(
                'user_id' => $_SESSION['userId'],
                'book_id' => $_GET['book_id'],
                'end_date' => null
            );
            $lendingRepository = new LendingRepository();
            $lending = $lendingRepository->getOneBy($array);
            $lending->setEndDate(new \DateTime());
            $lending_id = $lendingRepository->createOrUpdateLending($lending);
            header("Location: /lending/show?id={$lending_id}");
        }
        if($this->isHttpPost())
        {
            $lending = new Lending();
            $lending->setBookId($_POST['book']);
            $lending->setStartDate(new \DateTime());
            $lending->setUserId($_SESSION['userId']);
            if($_GET['id'])
            {
                $lending->setId($_GET['id']);
            }
            $lendingRepository = new LendingRepository();
            $lendingID = $lendingRepository->createOrUpdateLending($lending);
            header("Location: /lending/show?id={$lendingID}");
        }
    }

    /*
    public function create()
    {
        if ($this->isHttpGet()) {
            return $this->render('lending:create', array());
        }

        if ($this->isHttpPost()) {

            $lendingData = array(
                'start_date' => $_POST['start_date'],
                'end_date'  => $_POST['end_date']
            );


            $lending = new Lending();
            $lending->setStartDate($lendingData['start_date']);
            $lending->setEndDate($lendingData['end_date']);

            // $lending->setBookId($_POST['book']);
            // $lending->setStartDate($_POST['start_date']);
            // $lending->setEndDate($_POST['end_date']);
            // $lending->setUserId($_POST['user']);


            $lendingRepository = new LendingRepository();
            $lastInsertId = $lendingRepository->saveLending($lending);

            header("Location: /lending/show?id={$lastInsertId}");
        }
    } */

    /*
    public function update()
    {
        if($this->isHttpGet())
        {
            $array = array(
                'book_id' => $_GET['book_id'],
                'user_id' => $_SESSION['userId'],
                'end_date' => null
            );

            $lendingRepository = new LendingRepository();
            $lending = $lendingRepository->getById($_GET['book_id']);

            echo "<pre>";
            var_dump($lending);
            die();

            return $this->render('lending:update', $lending);
        }

        if($this->isHttpPost())
        {
            $lending = new Lending();
            $lending->setBookId($_POST['book']);
            $lending->setStartDate($_POST['start_date']);
            $lending->setEndDate($_POST['end_date']);
            $lending->setUserId($_POST['user']);

            if($_GET['id'])
            {
                $lending->setId($_GET['id']);
            }

            $lendingRepository = new LendingRepository();
            $lendingID = $lendingRepository->createOrUpdateLending($lending);

            header("Location: /lending/show?id={$lendingID}");
        }
    }
*/
    public function show()
    {
        if (!isset($_SESSION['userId'])) {
            die('ne mozes ovdje bez authorizacije');
        }

        $id = $_GET['id'];

        $lendingRepository = new LendingRepository();

        $lending = $lendingRepository->getById($id);

        return $this->render('lending:show', $lending);
    }

    public function showAll()
    {
        $lendingRepository = new LendingRepository();

        $lending = $lendingRepository->getAll();

        return $this->render('lending:showAll', $lending);
    }

    public function delete()
    {
        $id = $_GET['id'];

        $lendingRepository = new LendingRepository();

        $lendingRepository->deleteById($id);

        $this->render('lending:delete', array());
    }
}
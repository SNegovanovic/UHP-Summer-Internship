<?php

namespace Repository;

use PDO;
use Models\Lending;

class LendingRepository extends BaseRepository
{
    public function createOrUpdateLending(\Models\Lending $lending)
    {

        if ($lending->getStartDate() === null) {
//            // radi se o editu autora
            $statement = $this->pdoConnection->prepare(
                "UPDATE lending SET end_date = :end_date WHERE book_id=" . $lending->getBookId() . " AND user_id=" . $lending->getUserId());
            $endDate = $lending->getEndDate();
            $statement->bindParam(':end_date', $endDate);

        } else {
            // kreiraj novog autora
            $statement = $this->pdoConnection->prepare(
                "INSERT INTO lending (user_id, book_id, start_date) VALUES (:user_id, :book_id, :start_date)");
            $user_id = (int) $lending->getUserId();
            $statement->bindParam(':user_id', $user_id);
            $bookId = (int) $lending->getBookId();
            $statement->bindParam(':book_id', $bookId);
            $startDate = $lending->getStartDate();
            $statement->bindParam(':start_date', $startDate);

        }
//            var_dump($statement);die();
        $statement->execute();
        if($lending->getId() != null)
        {
            return $lending->getId();
        }
        return $this->pdoConnection->lastInsertId('lending');
    }


    /*
    public function saveLending(Lending $lending)
    {
        if($lending->getId() === null)
        {
            $statement = $this->pdoConnection->prepare
            ("INSERT INTO lending (book_id, start_date, end_date, user_id) VALUES (:book_id, :start_date, :end_date, :user_id)");
        }
        else
        {
            $statement = $this->pdoConnection->prepare
            ("UPDATE lending SET book_id=:book_id, start_date=:start_date, end_date=:end_date, user_id=:user_id WHERE id={$lending->getId()}");
        }

        $bookId = $lending->getBookId();
        $startDate = $lending->getStartDate();
        $endDate = $lending->getEndDate();
        $userId = $lending->getUserId();

        $statement->bindParam(':book_id', $bookId);
        $statement->bindParam('start_date', $startDate);
        $statement->bindParam('end_date', $endDate);
        $statement->bindParam('user_id', $userId);
        $statement->execute();

        if($lending->getId() !== null)
        {
            return $lending->getId();
        }

        return $this->pdoConnection->lastInsertId('lending');
    }


    public function insertLending(\Models\Lending $lending)
    {
        $lendingStart = $lending->getStartDate();
        $lendingEnd = $lending->getEndDate();

        $statement = $this->pdoConnection->prepare(
            "INSERT INTO lending(start_date, end_date) 
                       VALUES (:start_date, :end_date)
                       ");

        $statement->bindParam(':start_date', $lendingStart);
        $statement->bindParam(':end_date', $lendingEnd);

        $statement->execute();

        return $this->pdoConnection->lastInsertid('lending');
    }
    */
}
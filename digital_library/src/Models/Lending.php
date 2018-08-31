<?php

namespace Models;

class Lending
{
    const DATETIME_FORMAT = 'Y-m-d h:i';

    private $id;
    private $book_id;
    private $start_date;
    private $end_date;
    private $user_id;

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
    public function getBookId()
    {
        return $this->book_id;
    }

    /**
     * @param mixed $book_id
     */
    public function setBookId($book_id)
    {
        $this->book_id = $book_id;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
//        $date = \DateTime::createFromFormat(self::DATETIME_FORMAT, $this->start_date);

        return  $this->start_date;
    }

    /**
     * @param \DateTime|null $start_date
     */
    public function setStartDate($start_date = null)
    {
        if (!$start_date) {
            return;
        }

        $start_date = $start_date->format(self::DATETIME_FORMAT);

        $this->start_date = $start_date;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        $date = \DateTime::createFromFormat(self::DATETIME_FORMAT, $this->end_date);

        return $date;
    }

    /**
     * @param mixed $end_date
     */
    public function setEndDate($end_date)
    {
        if(!$end_date) {
            return;
        }
        $end_date = $end_date->format(self::DATETIME_FORMAT);
        $this->end_date = $end_date;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
}
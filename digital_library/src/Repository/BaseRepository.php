<?php

namespace Repository;

abstract class BaseRepository {

    protected $pdoConnection;

    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        $this->pdoConnection = \Connection::getInstance()->getPdoConnection();
    }

    private function getOriginalClassName()
    {
        $class = get_class($this);
        $originalClassname = str_replace('Repository', '', $class);
        $originalClassname = str_replace('\\', '', $originalClassname);

        return $originalClassname;
    }

    public function getById($id) {

        $originalClassname = $this->getOriginalClassName();

        $classnameLowerCase = strtolower($originalClassname);

        $statement = $this->pdoConnection->prepare("SELECT * FROM $classnameLowerCase WHERE id=:id");

        $statement->bindParam(':id', $id);

        $statement->execute();

        $object = $statement->fetchObject("Models\\" . $originalClassname);

        return $object;
    }

    public function getAll() {

        $originalClassname = $this->getOriginalClassName();

        $classnameLowerCase = strtolower($originalClassname);

        $statement = $this->pdoConnection->prepare(
            "SELECT * FROM " . $classnameLowerCase);

        $statement->execute();

        $objects = $statement->fetchAll(\PDO::FETCH_CLASS,"Models\\" . $originalClassname);

        return $objects;
    }

    public function getBy($array)
    {
        $originalClassName = $this->getOriginalClassName();
        $classNameLowerCase = strtolower($originalClassName);

        $queryString = "SELECT * FROM " . $classNameLowerCase;

        if(count($array) > 0) {
            $queryString .= " WHERE ";

            $i = 0;

            foreach ($array as $key => $value) {
                if($i != 0) {
                    $queryString .= " AND ";
                }
                else
                {
                    $queryString .= " WHERE ";
                }
                // $queryString .= strtolower($key) . " LIKE = :value" . $i;
                $queryString .= strtolower($key) . "= :value" . $i;
                $i++;
            }
        }

        $statement = $this->pdoConnection->prepare($queryString);

        $j = 0;

        foreach ($array as $value) {
            // $variable23 = '&' . $value . '&';
            $statement->bindParam(':value' . $j, $value);
            $j++;
        }

        $statement->execute();

        $objects = $statement->fetchAll(\PDO::FETCH_CLASS, "\Models\\" . $originalClassName);

        return $objects;
    }

    /*
    public function getOneBy($array)
    {
        $originalClassName = $this->getOriginalClassName();
        $classNameLowerCase = strtolower($originalClassName);

        $queryString = "SELECT * FROM " . $classNameLowerCase;
        if (count($array)  > 0) {
            $queryString .= " WHERE ";

            // dodati counter
            foreach ($array as $key => $value) {
                $queryString .= strtolower($key) . " = :value";
            }

            $queryString .= " LIMIT 1";

            $statement = $this->pdoConnection->prepare($queryString);

            foreach ($array as $value) {
                $statement->bindParam(':value', $value);
            }

            $statement->execute();
            $object = $statement->fetchObject("\Models\\" . $originalClassName);
            return $object;
        } else{
            echo "One element only";
            return null;
        }
    }
    */

    public function getOneBy($array)
    {
        $originalClassName = $this->getOriginalClassName();
        $classNameLowerCase = strtolower($originalClassName);
        $queryString = "SELECT * FROM " . $classNameLowerCase;
        if (count($array)  > 0) {
            // dodati counter
            $i = 0;
            foreach ($array as $key => $value) {
                if ($i == 0) {
                    $queryString .= " WHERE ";
                } else {
                    $queryString .= " AND ";
                }
                if ($value == null) {
                    $queryString .= strtolower($key) . " IS NULL";
                } else {
                    $queryString .= strtolower($key) . " = :value" . $i;
                }
                $i++;
            }
            $queryString .= " LIMIT 1";
            $statement = $this->pdoConnection->prepare($queryString);
            $j = 0;
            foreach ($array as $key => $value) {
                if ($value != null) {
                    $statement->bindValue(':value' . $j, $value);
                }
                $j++;
            }
            $statement->execute();
            $object = $statement->fetchObject("\Models\\" . $originalClassName);
            return $object;
        } else{
            echo "One element only";
            return null;
        }
    }

    public function deleteById($id) {

        $originalClassname = $this->getOriginalClassName();

        $classnameLowerCase = strtolower($originalClassname);

        $statement = $this->pdoConnection->prepare("DELETE FROM $classnameLowerCase WHERE id=:id");

        $statement->bindParam(':id', $id);

        $statement->execute();

        return;
    }
}
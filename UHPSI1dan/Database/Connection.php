<?php

namespace Database;

use Model\Ucenik;
use PDO;

class Connection
{

    const SERVER_NAME = '127.0.0.1';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DATABASE_NAME = 'uhpday1';


    private $pdoConnection;


    public static function getInstance()
    {
        static $instanca = null;
        if ($instanca === null) {
//            $instanca = new self();
            $instanca = new Connection();
        }

        return $instanca;
    }

    /**
     * Connection constructor.
     */
    private function __construct()
    {
        $this->pdoConnection = new PDO("mysql:host=" . self::SERVER_NAME . ";dbname=" . self::DATABASE_NAME, self::USERNAME, self::PASSWORD);
        $this->pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "<h1>Instanca</h1><br>";
    }

    /**
     * @return PDO
     */
    public function getPdoConnection()
    {
        return $this->pdoConnection;
    }


    public function getAllUcenici()
    {

    }

    public function getUcenikById($ucenikId)
    {
        $statement = $this->getPdoConnection()->query(
            "SELECT * FROM ucenici WHERE id=" . $ucenikId);
        $dbUcenik = $statement->fetch();

        $ucenik = $this->dbRowToModelUcenik($dbUcenik);

        return $ucenik;
    }

    private function dbRowToModelUcenik($dbRow)
    {
        $ucenik = new Ucenik();
        $ucenik->setId($dbRow['id']);
        $ucenik->setIme($dbRow['ime']);
        $ucenik->setPrezime($dbRow['prezime']);

        return $ucenik;
    }


    public function saveUcenik(Ucenik $ucenik)
    {
        if ($ucenik->getId() != null) {
            // radi se o editu ucenik
            $statement = $this->pdoConnection->prepare(
                'UPDATE ucenici SET ime = :ime, prezime = :prezime WHERE id=' . $ucenik->getId());
        } else {
            // kreiraj novog ucenika
            $statement = $this->pdoConnection->prepare(
                'INSERT INTO ucenici (ime, prezime) VALUES (:ime, :prezime)');
        }


        $ime = $ucenik->getIme();
        $prezime = $ucenik->getPrezime();
        $statement->bindParam(':ime', $ime);
        $statement->bindParam(':prezime', $prezime);
        $statement->execute();
    }

}

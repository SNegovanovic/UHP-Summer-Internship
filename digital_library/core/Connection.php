<?php

class Connection
{
    const SERVER_NAME = '127.0.0.1';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DATABASE_NAME = 'knjiznica';
    /** @var PDO $pdoConnection */
    private $pdoConnection;

    public static function getInstance() {
        static $instanca = null;
        if($instanca === null)
        {
            $instanca = new Connection();
            // $instanca = new self();
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
    }

    /**
     * @return PDO
     */
    public function getPdoConnection()
    {
        return $this->pdoConnection;
    }

}
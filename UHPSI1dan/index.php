<?php

spl_autoload_register(function ($className) {
    require_once ($className . '.php');
});


//$connection = Database\Connection::getInstance();
//$pdoConnection = $connection->getPdoConnection();
echo "<pre>";
$salt = md5(rand(0, 20));
var_dump($salt);
var_dump(md5("password" . $salt) . $salt);
die('kraj razreda');


$ucenik = new Model\Ucenik();
$ucenik->setIme('Pero');
$ucenik->setPrezime('Bezprezimeni4');

echo "<pre>";
var_dump($ucenik);
die('kraj');

//$ucenik = $connection->getUcenikById(9);
//$ucenik->setIme('mirko');
//$connection->saveUcenik($ucenik);




//echo "Ime ucenika je: " . $ucenik->getIme() . " a prezime ucenika je: " . $ucenik->getPrezime();
<?php

abstract class BaseController
{
    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->checkAndForbid();
    }

    public function checkAndForbid()
    {
        if(!isset($_SESSION['userId'])){
            die("Ne moze bez autorizacije!");
        }
    }

    public function render($viewString, $vars)
    {
        // $vars = array() je nesto kao default parameter
        $path = __DIR__ . "/Views";

        $path = str_replace('core', 'src', $path);

        $render = explode(":", $viewString);

        foreach($render as $bind) {
            $path = $path . "/" . $bind;
        }

        $path = $path . ".view.php";
        return require_once $path;

        /*
        $path = explode(':', $viewString);

        $path = __DIR__ . "\\Views\\". $path[0] ."\\". $path[1] .".view.php ";
        $path = str_replace('core', 'src', $path);

        return require_once $path;
        */
    }

    public function json($input)
    {
        // sa header funkcijom zna da je json a ne html, onako kad ispisemo samo json, on ne zna
        header('Content-Type: application/json ');

        echo json_encode($input);

        return true;
    }

    public function isHttpGet() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return true;
        }

        return false;
    }

    public function isHttpPost() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return true;
        }

        return false;
    }
}
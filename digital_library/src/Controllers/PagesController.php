<?php
namespace Controllers;

class PagesController extends \BaseController
{
    public function index()
    {
        return $this->render('pages:index', array());
    }
}
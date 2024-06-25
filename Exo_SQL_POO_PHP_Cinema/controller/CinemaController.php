<?php
// CinemaController.php
namespace Controller;
use Model\CinemaModel;
use View\CinemaView;

class CinemaController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new CinemaModel();
        $this->view = new CinemaView();
    }

    public function listFilms(){
        $films = $this->model->getFilms();
        $this->view->listFilms($films);
    }

    public function listActeurs(){
        $acteurs = $this->model->getActeurs();
        $this->view->listActeurs($acteurs);
    }
}

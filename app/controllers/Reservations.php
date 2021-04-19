<?php
class Reservations extends Controller
{
    private $reservationModel;

    public function __construct()
    {
        $this->reservationModel = $this->model('Reservation');
    }
    public function index()
    {
        $data = $this->reservationModel->readAll();
        $this->view('index/index',$data);

    }

    public function add()
    {
    }
}

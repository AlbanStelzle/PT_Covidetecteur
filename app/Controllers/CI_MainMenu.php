<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class CI_MainMenu extends Controller{
    public function __construct()
    {
    }
    public function index(){
        echo('page d\'accueil');
    }
}
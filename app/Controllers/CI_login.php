<?php
namespace App\Controllers;

/**
 * Class CI_login
 *
 * CI_login provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends CI_login
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class CI_login extends Controller{

    public function index(){
        echo "Hello world";

    }
    public function login(){
        $validation =  \Config\Services::validation();

        helper(['form', 'url']);
        if(!$this->validate()){
            $validation->setRules([
                'email'        => 'required|valid_email',
                'password'     => 'required|min_length[8]|max_length[25]',
            ]);
            //Pas connecté donc page de login ici
        }else{
            // Connexion réussie.
        }
    }
    public function register(){
        $validation =  \Config\Services::validation();

        if(!$this->validate()){
            //Pas encore inscris.
            $validation->setRules([
                'email'        => 'required|valid_email',
                'password'     => 'required|min_length[8]|max_length[25]|alpha_numeric',
                'pass_confirm' => 'required|matches[password]'
            ]);

        }else{
            $email = $this->input->post('Email');
            $password = password_hash($this->input->post('Pwd'),PASSWORD_DEFAULT);
            //Inscription réussie.
        }
    }
}
?>
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

use App\Models\CI_Model_connection;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class CI_login extends Controller{
    public function __construct()
    {
        $this->helpers(['form','session','url']);

    }


    public function index(){
        echo "Hello world";

    }
    public function login(){
        $validation =  \Config\Services::validation();

        if(!$this->validate()){
            $validation->setRules([
                'email'        => 'required|valid_email',
                'password'     => 'required|min_length[8]|max_length[25]',
            ]);
            //Pas connecté donc page de login ici
        }else{

            $data['email'] = $this->request->getPost('Email');
            $data['password'] = password_hash($this->request->getPost('Pwd'),PASSWORD_DEFAULT);
            $modelConnection = new CI_Model_connection();
            if($modelConnection->login($data)){
                $session = session();

                $data_session = ['email'=> $data['email'],
                                    'logged'=> true];
                $session->set($data_session);
                // Connexion réussie.
                return redirect()->to('CI_MainMenu');
            }
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
            $data['email']= $this->request->getPost('email');
            $data['nom']= $this->request->getPost('nom');
            $date['password'] = password_hash($this->request->getPost('password'),PASSWORD_DEFAULT);
            $modelConnection = new CI_Model_connection();
            $modelConnection->register($data);
            //Inscription réussie.
        }
    }
    public function disconnect(){
        $session = session();

        $session->destroy();
    }
}
?>
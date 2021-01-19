<?php
class Accueil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
			$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('Model_connexion');

	}

	public function index()
	{
		//$this->session->sess_destroy();
		$this->homePage();
	}
	function homePage() //affiche la page d'accueil
	{
		$this->load->view('template/View_template');
		$this->load->view('View_Covidetecteur');
	}


	public function login() //Affiche la page de connexion

	{

	 	$this->form_validation->set_rules('Email', 'Email', 'valid_email|required|callback_validate_email');
		$this->form_validation->set_rules('Pwd', 'Mot de passe', 'required|alpha_numeric');
	 	$this->form_validation->set_message('validate_email', '{field} existe pas dans la base.');

	 	if ($this->form_validation->run()) {
	 		$email = $this->input->post('Email');
	 		$password = $this->input->post('Pwd');
	 		if ($this->Model_connexion->getCount($email)>0){
	 			$datadb = $this->Model_connexion->getAll($email);

	 			if (password_verify($password, $datadb->password)) {
	 				session_start();
	 				$session_data = array(
	 					'login' => $datadb->login,
	 					'email' => $email,
	 					'id' => $datadb->id
	 				);
	 				$this->session->set_userdata($session_data);
	 				sleep(1); //anti force brute
	 				redirect(MenuPrincipal);

	 			} else {
	 				$this->load->view('template/View_template');

	 				$this->load->view('errors/View_login_error');
	 			}
	 	}else{

	 			$this->load->view('template/View_template');
	 		}
	 	} else {
	 		if ($this->form_validation->error_array() == null) {
	 			$this->load->view('template/View_template');
	 			$this->load->view('View_connexion');
	 		} else {
	 			$this->load->view('template/View_template');
				$this->load->view('View_connexion');

	 		}
	 	}
	}

	public function register() //Affiche la page d'inscription
	{


		$this->form_validation->set_rules('firstname', 'firstname', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('name', 'name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required|is_unique[user.email]|is_unique[user_waiting.email]');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required|alpha_numeric|min_length[8]');
		$this->form_validation->set_rules('password_confirm', 'Mot de passe de confirmation', 'required|alpha_numeric|matches[Pwd]');

		$this->form_validation->set_message('is_unique', '{field} est déjà présent dans la base.');


		if ($this->form_validation->run()) {

			$firstname = ($this->input->post('firstname'));
			$name = ($this->input->post('name'));

			$email = $this->input->post('Email');
			$password = $this->input->post('Pwd');
			$pwdhash = password_hash($password, PASSWORD_DEFAULT);

			$data = array(
				'firstname' => $firstname,
				'name'=>$name,
				'email' => $email,
				'password' => $pwdhash,
			);
		$this->Model_connexion->createNewUser($data);
		}else {
			if($this->form_validation->error_array() == null){
				$this->load->view('template/View_template');
				$this->load->view('View_inscription');
			}else{
				$this->load->view('template/View_template');

				//$this->load->view('errors/View_inscription_error');

			}

			}
		}

}

?>

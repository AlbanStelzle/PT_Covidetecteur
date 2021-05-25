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
		if($this->session->has_userdata('nom')) { //Si une session existe alors renvoie au menu
			redirect('MenuPrincipal');
		}

	}

	public function index()
	{

		$this->homePage();
	}
	function homePage() //affiche la page d'accueil
	{
		$this->load->view('template/View_template');
		$this->load->view('View_Covidetecteur');
	}

	public function validate_email($email)	{ // règle qui renvoie si oui ou non l'email est dans la BD

		if ($this->Model_connexion->getCount($email)>0)
		{
			return TRUE;
		}
		else
		{

			return FALSE;
		}
	}
	public function login() //Affiche la page de connexion

	{

	 	$this->form_validation->set_rules('email', 'Email', 'valid_email|required|callback_validate_email');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required|alpha_numeric');
	 	$this->form_validation->set_message('validate_email', 'L\'adresse mail n\'existe pas est incorrecte.');
	 	if ($this->form_validation->run()) {
	 		$data['email'] = $this->input->post('email');
	 		$data['password'] = $this->input->post('password');
			$data_result=$this->Model_connexion->login($data);
	 		if ($data_result){
	 			session_start();
	 			$session_data = array(
						'email' => $data_result['email'],
						'name' => $data_result['name'],
						'firstname' => $data_result['firstname'],
						'logged'=> true
	 				);
	 				/*if($this->input->post('staylogged')!=null ){
						$this->config->sess_expiration= 5;

					}*/
	 				$this->session->set_userdata($session_data);
				sleep(1); //anti force brute
	 				redirect(MenuPrincipal);

	 			} else {
	 				$this->load->view('template/View_template');
					$this->load->view('errors/View_connexion');

			}

	 	} else {
	 		if ($this->form_validation->error_array() == null) {
	 			$this->load->view('template/View_template');
	 			$this->load->view('View_connexion');
	 		} else {
	 			$this->load->view('template/View_template');
				$this->load->view('errors/View_connexion');

	 		}
	 	}
	}
  
  	public function confirmation() //Affiche la page de confirmation
	{
		$this->load->view('template/View_template');
		$this->load->view('View_confirmation');
	}
  
  	public function graphiques() //Affiche la page des graphiques
	{
		$this->load->view('template/View_template');
		$this->load->view('View_graphiques');
	}

	public function register() //Affiche la page d'inscription
	{

		$this->form_validation->set_rules('firstname', 'firstname', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('name', 'name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required|is_unique[PT_user.email]');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required|alpha_numeric|min_length[8]');
		$this->form_validation->set_rules('password_confirm', 'Mot de passe de confirmation', 'required|alpha_numeric|matches[password]|min_length[8]');

		$this->form_validation->set_message('is_unique', '{field} est déjà présent dans la base.');
		$this->form_validation->set_message('matches', 'Les mots de passes doivent être les mêmes.');
		$this->form_validation->set_message('min_length', 'Les mots de passes doivent avoir au minimum 8 caractères.');


		if ($this->form_validation->run()) {

			$firstname = ($this->input->post('firstname'));
			$name = ($this->input->post('name'));
			$email = $this->input->post('email');
			$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);

			$data = array(
				'firstname' => $firstname,
				'name'=>$name,
				'email' => $email,
				'password' => $password,
			);
		$this->Model_connexion->createNewUser($data);
		}else {
			if($this->form_validation->error_array() == null){
				$this->load->view('template/View_template');
				$this->load->view('View_inscription');
			}else{
				$this->load->view('template/View_template');
				$this->load->view('errors/View_inscription');

			}

			}
		}

}

?>

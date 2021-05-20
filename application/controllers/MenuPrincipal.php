<?php
class MenuPrincipal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('Model_connexion');
		if(($this->session->has_userdata('blablbl'))) { //Si aucune session existe alors renvoie à l'accueil
			redirect('Accueil');
		}
		$this->load->model('Model_detector');
	}

	public function index()
	{
		$detecteur = $this->Model_detector->getAllDetector($this->session->email);
		$this->load->view('template/View_template');
		//$this->load->view('View_ajout_appareil');
		$this->load->view('View_menu',$detecteur);
		}
	public function add_detector(){


		$this->form_validation->set_rules('name', 'name', 'required|max_length[25]');
		$this->form_validation->set_rules('id', 'id', 'required|max_length[25]');

		$this->form_validation->set_message('is_unique', '{field} est déjà présent dans la base.');


		if ($this->form_validation->run()) {

			$data['name'] = $this->input->post('name');
			$data['id'] = $this->input->post('id');
			$data['email']=$this->session->email;
			$this->Model_detector->addDetector($data);
			redirect('MenuPrincipal');
		}else {
			if($this->form_validation->error_array() == null){
				$this->load->view('template/View_template');
				$this->load->view('View_ajout_appareil');
			}else{
				$this->load->view('template/View_template');
				$this->load->view('errors/View_ajout_appareil');

			}

		}

	}
	public function delete($key){
		$this->Model_detector->delete($key);
		redirect('MenuPrincipal','refresh');
	}
}

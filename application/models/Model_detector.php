<?php
class Model_detector extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('string');
	}
	public function getAllDetector($email){
		$this->db->select('*');
		$this->db->where(['email'=>$email]);
		$query=$this->db->get('PT_list_detector');
		foreach ($query->result_array() as $array);
		return $array;

	}
}

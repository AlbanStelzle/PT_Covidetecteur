<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class CI_Model_connection extends Model
{
    protected $table      = 'PT_login';
    protected $primaryKey = 'email';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['email', 'password'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function register($data){
        $data =[
            'email'=> $data['email'],
            'password' =>$data['password']
        ];
        $query = $this->db->select()
            ->$this->where(['email' => $data['email'],'nom'=> $data['nom'],'prenom'=>$data['prenom'], 'password' => $data['password']])
            ->get()->result();

        if(empty($query)){
            $this->insert($data);
            return true;

        }else{
            return false;
        }
    }
    public function login($data){
        $query = $this->db->select()
                ->$this->where(['email' => $data['email'], 'password' => $data['password']])
                ->get()->result();

        return !empty($query); //Si une ligne est retournée alors le compte existe
    }
}
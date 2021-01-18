<?php namespace App\Models;

use CodeIgniter\Model;

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



    public function register($email,$password){
        $data =[
            'email'=> $email,
            'password' =>$password
        ];
        $query = $this->db->select()
            ->$this->where(['email' => $email, 'password' => $password])
            ->get()->result();

        if(empty($query)){
            $this->insert($data);
            return true;

        }else{
            return false;
        }
    }
    public function login($email,$password){
        $query = $this->db->select()
                ->$this->where(['email' => $email, 'password' => $password])
                ->get()->result();

        return !empty($query); //Si une ligne est retournée alors le compte existe
    }
}
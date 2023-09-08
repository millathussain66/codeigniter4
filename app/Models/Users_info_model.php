<?php

namespace App\Models;

use CodeIgniter\Model;

class Users_info_model extends Model
{
    protected $table = 'users_info';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email_address', 'password'];

    public function get_parameter_data($table, $orderby, $where = NULL)
    {
        $builder = $this->db->table($table);
        $builder->select('*');
        if (!empty($where)) {
            $builder->where($where);
        }
        $builder->orderBy($orderby);
        $query = $builder->get();
        return $query->getResult();
    }
}

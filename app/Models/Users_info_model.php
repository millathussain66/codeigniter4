<?php 
namespace App\Models;
use CodeIgniter\Model;

class Users_info_model extends Model
{
    protected $table = 'users_info';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email','password_log'];
}
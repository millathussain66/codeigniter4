<?php 
namespace App\Models;
use CodeIgniter\Model;
class Home_model extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email'];
}
<?php
namespace App\Models;
use CodeIgniter\Model;
class TaskModelData extends Model
{
 protected $table ="task";
 /*Specifies the database table that this model primarily works with.
 This only applies to the built-in CRUD methods. 
 You are not restricted to using only this table in your own queries.*/
protected $primarykey ="task_id";


protected $allowedFields=[ "task_title", "task_mission","task_check"];

protected $useAutoIncrement     = true;

protected $validationRules      = [];
protected $validationMessages   = [];
protected $skipValidation       = false;
protected $cleanValidationRules = true;
}
<?php
namespace App\Models;
use CodeIgniter\Model;
class TaskModel extends Model
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

//protected $returnType =\App\Entities\Article::class;
/*
protected $validationRules = [
 "title" => "required|max_length[128]",
 "content" => "required"

];

protected $validationMessages = [
    "title" =>[
        "required" => "Please enter a title",
        "max_length" => "{param} maximum characters for the {field}"
    ],
    "content" => [
        "required" => "Please enter a content"
    ]



];*/


public function updateBymodel($id,$data){ 

    return $this->db->table('task')
    
    ->where('task_id', [$id])
    ->update($data);


}	
}
<?php

namespace App\Controllers;
use App\Models\TaskModel;
class Task extends BaseController
{
    //private TaskModel $model;
   /* public function __construct(){
        $this->model=new TaskModel;
    }*/

    private TaskModel $model;
    public function __construct(){
        $this->model=new TaskModel;
    }


    public function index()
    {



        return view('Home/index.html');
        
    }

    public function addTask(){

        $rules=[
                "task_title" => "required",
				"task_mission" => "required",
				"task_check" => "required"
               

        ];
        if(!$this->validate($rules)){
            $response = [
                'success' => false,
                'msg' => "There are some validation errors",
            ];
        
        return $this->response->setJSON($response);
    } 
    else 
    {
        
      
        $model=new TaskModel;
        $data=[
        'task_title' => $this->request->getPost('task_title'),
        'task_mission' => $this->request->getPost('task_mission'),
        'task_check' => $this->request->getPost('task_check'),
        'task_notchecked' => $this->request->getPost('task_notchecked')
         ];
         
         if($model->insert($data)){
            $response = [
                'success' => true,
                'msg' => "Task created",
            ];
        } else {
            $response = [
                'success' => true,
                'msg' => "Failed to create Task",
            ];
        }
        return $this->response->setJSON($response);
         }
        
     }

    public function show(){
        
     
     $data =$this->model->findAll();
     
     
     


        return view("Home/show.php",["task" => $data]);
    }



}









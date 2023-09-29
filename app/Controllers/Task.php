<?php

namespace App\Controllers;
use App\Models\TaskModel;
class Task extends BaseController
{
    //private TaskModel $model;
   /* public function __construct(){
        $this->model=new TaskModel;
    }*/


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
        'task_check' => $this->request->getPost('task_check')
         ];
         
         if($model->insert($data)){
            $response = [
                'success' => true,
                'msg' => "User created",
            ];
        } else {
            $response = [
                'success' => true,
                'msg' => "Failed to create user",
            ];
        }
        return $this->response->setJSON($response);
         }
      
      
     
     
     



       /* $task = new TaskModel;
       $id= $this->model->insert($task);
     
        return redirect() ->to("Task/$id")
                          ->with("message","Task saved");*/
        
        
       
        

    }

    public function new(){
        return view("Task/new",[
            "task" =>new TaskModel
            ]
        );
    }



}









<?php

namespace App\Controllers;

use App\Models\TaskModelData;

class DatatableController extends BaseController
{
    private TaskModelData $model;
    public function __construct(){
        $this->model=new TaskModelData;
    }

    public function index()
    {
        return view('Home/datatable.php');
        
    }
    public function showdata(){
        
        
        $data =$this->model->findAll();
        return view("Home/datatable.php",["taskdata" => $data]);
    }

    public function addTaskData(){

        $rules=[
                "task_title" => "required",
				"task_mission" => "required"
	
               

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
        
      
        $model=new TaskModelData;
        $data=[
        'task_title' => $this->request->getPost('task_title'),
        'task_mission' => $this->request->getPost('task_mission'),
        'task_check' => $this->request->getPost('task_check')
         ];
        print_r($data);
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



}
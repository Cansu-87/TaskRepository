<?php

namespace App\Controllers;
use App\Models\TaskModel;
class Task extends BaseController
{
    
    private TaskModel $model;
    public function __construct(){
        $this->model=new TaskModel;
    }


    public function index()
    {



        return view('Home/show.php');
        
    }

    public function addTask(){

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
        
      
        $model=new TaskModel;
        $data=[
        'task_title' => $this->request->getPost('task_title'),
        'task_mission' => $this->request->getPost('task_mission'),
        'task_check' => $this->request->getPost('task_check')
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

    public function update(){
        $taskid		         = $this->request->getPost('task_id');
        $task_title		= $this->request->getPost('task_title');
		$task_mission	= $this->request->getPost('task_mission');
		$task_check	= $this->request->getPost('task_check');
       

        $data = [
            'task_id'           =>$taskid,
 			'task_title'		=> $task_title,
			'task_mission'		=> $task_mission,
			'task_check'	    => $task_check,
		];
        
        $result = $this->model->updateBymodel($taskid, $data);
        
        if($result) {
			echo "Task details are updated successfully.";
		} else {
			echo "Something went wrong";
		}
        //return $result;
    }

    public function delete(){
        /*
        $id= $this->request->getPost('task_id');
        print_r($id);
        $model=new TaskModel;
        $model->deletebyid($id);
        print_r($id);
        return redirect()->with('status','Deleted successfully!!');*/
        $model=new TaskModel;
        $taskid= $this->request->getPost('id');
       
        

        $result = $this->model->deletebyid($taskid);


        
		if($result) {
			echo "task is deleted successfully.";
		} else {
			echo "Something went wrong";
		}
    }



}





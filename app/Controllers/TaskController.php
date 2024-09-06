<?php 

class TaskController{

    public function index()  {
        $completed = Requset::get("completed");
        if ($completed != null) {
            $tasks = QueryBuilder::get("tasks", ['completed', '=', $completed]);
        }else{
          $tasks = QueryBuilder::get("tasks");
        }
        view('index', [
            'tasks' => $tasks
        ]);

        // require "resources/index.view.php";
        
    }
    
    public function create()  {
        $description = Requset::get('description');

        QueryBuilder::insert("tasks",[
            "description"=> $description,
            // "completed"=> 0,
        ]);
        back();
        // header("location: $_SERVER[HTTP_REFERE]");         
    }
    public function update()  {
        $id = Requset::get('id');
        $completed = Requset::get('completed');

        QueryBuilder::update("tasks",$id,[
            "completed"=> $completed,
        ]);
        back();
        // header("location: $_SERVER[HTTP_REFERER]");         
       
    }

    public function delete()  {
        
        if($id = Requset::get('id')){
            QueryBuilder::delete("tasks", $id);
            back();
            // header("location: $_SERVER[HTTP_REFERER]");         
        }
         
    }
}
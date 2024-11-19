<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function create(Request $request)
    {
        $insert = DB::table('project_tb')->insert([
            'todo_name' => $request->todo_name,
            'todo_desc' => $request->todo_desc,
        ]);

        $resp = [];
        if ($insert) {
            $resp['status'] = true;
            $resp['message'] = 'Todo added successfully';
        } else {
            $resp['status'] = false;
            $resp['message'] = 'Failed to add Todo';
        }

        return response()->json($resp);
    }

    public function read()
    {
        $todos = DB::table('project_tb')->get();

        $resp = [];
        if ($todos) {
            $resp['status'] = true;
            $resp['message'] = 'Todos retrieved successfully';
            $resp['data'] = $todos;
        } else {
            $resp['status'] = false;
            $resp['message'] = 'Failed to retrieve Todos';
        }

        return response()->json($resp);
    }

    public function delete($user_id){
        $todo = DB::table("project_tb")->where("user_id", $user_id)->delete();
       
        $resp = [];
        if ($todo) {
            $resp['status'] = true;
            $resp['message'] = 'Todos delete successfully';
            $resp['data'] = $todo;
        } else {
            $resp['status'] = false;
            $resp['message'] = 'Failed to delete Todos';
        }

        return response()->json($resp);
    }

    public function edit($user_id){
        $todo = DB::table("project_tb")->where("user_id", $user_id)->first( );
       
        $resp = [];
        if ($todo) {
            $resp['status'] = true;
            $resp['message'] = 'Todos get successfully';
            $resp['data'] = $todo;
        } else {
            $resp['status'] = false;
            $resp['message'] = 'Failed to get Todos';
        }

        return response()->json($resp);
    }

    public function update(Request $request, $user_id){
        $todoUpdate = DB::table("project_tb")->where("user_id", $user_id)->update
        ([
            "todo_name" => $request->todo_name,
            "todo_desc" => $request->todo_desc,
        ]);

        $resp = [];
        if ($todoUpdate) {
            $resp['status'] = true;
            $resp['message'] = 'Todo updated successfully';
            $resp['data'] = $todoUpdate;

        } else {
            $resp['status'] = false;
            $resp['message'] = 'Failed to update TodoList';
        }

        return response()->json($resp);
     }
}

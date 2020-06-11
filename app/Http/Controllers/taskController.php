<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\task;

class taskController extends Controller
{
    function add(Request $request){
        $title = $request->input('title');
        $status = $request->input('status');
        $date = $request->input('date');

        $task = new task();

        $task->title = $title;
        $task->status = $status;
        $task->date = $date;

        $task->save();

        return $task;
    }

    function get(){
        $records = task::all();
        return response()->json($records);
    }

    function delete(Request $request){

        $id = $request->input('id');

        $record = DB::delete("Delete from tasks where id='$id'");

        $response = array('id' => $id);
        return $response;
    }

    function getone(Request $request){
        $id = $request->input('id');

        $record = task::find($id);
        return response()->json($record);
    }
}

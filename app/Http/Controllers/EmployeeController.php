<?php

namespace App\Http\Controllers;

use App\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
 //get
    public function index()
    {
        $emps = employee::all();
        return $emps; 
    }

//post 
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|string",
            "salary"=>"required|numeric",

        ]);
        $emp=employee::create([
            "name" =>$request->name,
            "salary" => $request->salary,
        ]);
        $response=[
             "employee"=>$emp,
             "message"=>"Insert Done",
        ];
        return response($response,201);
    }

    public function show($id)
    { 
        return employee::find($id);
    }

//put
    public function update(Request $request, $id)
    {
        $request->validate([
            "name"=>"required|string",
            "salary"=>"required|numeric",

        ]);
        $employees = employee::find($id);
        $employees->update($request->all());
        return $employees;
    }

  //delete
    public function destroy($id)
    {
        return employee::destroy($id);
    }
}

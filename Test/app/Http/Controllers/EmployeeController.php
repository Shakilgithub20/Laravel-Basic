<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index (){
        //GET all employees data 
        // send results to view
        $employees = Employee::all();
        return view('employees', ['employees' => $employees]);
        // return view('employees', compact('employees'));
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $age = $request->age;
        $salary = $request->salary;
        // $password = $request->password;
        // echo 'Name is: ' .$name;
        // echo '<br>';
        // echo 'Email is: ' .$email;
        // echo '<br>';
        // echo 'Age is: ' .$age;
        // echo '<br>';
        // echo 'Salary is: ' .$salary;
        // echo '<br>';
        // echo 'Password is: ' .$password;
        // echo '<br>';
        $obj = new Employee();
        $obj ->name = $name; 
        $obj ->email = $email;
        $obj ->age = $age;
        $obj ->salary = $salary;
        // $obj ->password = $password;
        if($obj->save()){
            return redirect('employees');
        }
        
    }
    public function edit($id){
        // $employee = Employee::where('id', $id)->get();
        $employee = Employee::find($id);
        return view('edit', compact('employee'));
    }
    public function update(Request $request, $id){
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->salary = $request->salary;
        if($employee->save()){
            return redirect('employees');
        }
    }
    public function delete($id){
        $obj = Employee::find($id);
        if($obj->delete()){
            return redirect('employees');
        }
    }

}

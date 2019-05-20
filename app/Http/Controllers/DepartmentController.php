<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 20/05/2019
 * Time: 10:12
 */

namespace App\Http\Controllers;


use App\Department;
use App\Http\Requests\CreateDepartment;
use App\Position;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::all();
        return view('department/index',['departments' => $departments]);
    }

    public function departmentCreatePost(CreateDepartment $request)
    {
        $department = new Department();

        $department->name = $request['name'];
        $department->address = $request['address'];
        $department->phone = $request['phone'];
        $department->description = $request['description'];
        //$department->active = $request['active'];


        $department->save();

        return back()->with('success','Подразделение '.$department->name.' успешно отправлено');
    }

    public function departmentCreate(){
        return view('department/new');
    }

}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartmentRequest;
use App\Models\Department;
use App\Models\UserDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function postCreateClub(CreateDepartmentRequest $request){
        DB::transaction(function () use ($request){
            try {
                $department_model = new Department();
                $department_model->name = $request->name;
                $department_model->parent_id = 0;
                $department_model->save();

                $user_dep_model = new UserDepartment();
                $user_dep_model->user_id = Auth::user()->id;
                $user_dep_model->department_id = $department_model->id;
                $user_dep_model->role = 0;
                $user_dep_model->save();
            }catch (Exception $exception){
                DB::rollBack();
            }
        });
    }

    public function postCreate(CreateDepartmentRequest $request){
        DB::transaction(function () use ($request){
            try {
                $department_model = new Department();
                $department_model->name = $request->name;
                $department_model->parent_id = 0;
                $department_model->save();

                $user_dep_model = new UserDepartment();
                $user_dep_model->user_id = Auth::user()->id;
                $user_dep_model->department_id = $department_model->id;
                $user_dep_model->role = 0;
                $user_dep_model->save();
            }catch (Exception $exception){
                DB::rollBack();
            }
        });

        dd(Department::all());
    }

    public function postUpdate(CreateDepartmentRequest $request, $department_id){
        $department_model = Department::find($department_id);
        $department_model->name = $request->name;
        $department_model->save();

        dd($department_model);
    }
}

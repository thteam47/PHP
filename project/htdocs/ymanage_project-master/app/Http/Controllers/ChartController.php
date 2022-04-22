<?php

namespace App\Http\Controllers;

use App\Models\UserDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index(){
        $user_dep_models = UserDepartment::where('user_id', Auth::user()->id)->get();
        return view('manage.chart.index',[
            'user_dep_models' => $user_dep_models
        ]);
    }
}

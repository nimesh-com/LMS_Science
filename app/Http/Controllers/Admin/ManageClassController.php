<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageClassController extends Controller
{
    public function index(){
        return view('backend.courseManage');
    }
}

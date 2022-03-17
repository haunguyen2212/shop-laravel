<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view('layout.admin');
    }
}

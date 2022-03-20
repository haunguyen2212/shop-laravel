<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view('backend.home');
    }
    
    public function getAccount(){
        $accounts = User::all();
        return view('backend.account', compact('accounts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ControllerUsers extends Controller
{
    public function __construct() {
        
    }

    public function index()
    {


        return view('user.index');
    }

    public function store(Request $request) 
    {

        
        $user = new User();
        $user->name = $request->reg_name;
        $user->password = $request->reg_password;
        $user->email = "viniPohla" . mb_substr($user->password, 58, 2) . "@gmail.com";
        $user->remember_token = 'Mel';
        $user->save();

        return view('user.index');
    }
}

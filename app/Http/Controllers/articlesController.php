<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Articlepp\User;
use App\Http\Requests;

use App\Http\Requests\Request;
use App\Article;
class articlesController extends Controller
{
    //
    public function show()
    {
    	//return User::all();
    	return view('welcome');
    }
}

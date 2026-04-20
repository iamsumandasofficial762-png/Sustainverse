<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class AdminController extends Controller
{
    public function index() {

        if (session()->has('jwt_token')) {

            return view('admin.index');

        } else {

            return view('login');

        }
        
    }
}

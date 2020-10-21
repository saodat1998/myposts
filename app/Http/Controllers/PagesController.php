<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('home');
    }

    public function posts(){
        return view('pages.posts');
    }

    public function login(){
        return view('auth.login');
    }
}

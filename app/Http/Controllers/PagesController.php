<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function index(){
        $title = 'Index';
        return view('index')->with('title',$title);
    }

    public function about(){
        $title = 'About us';
        return view('about')->with('title',$title);
    }

    public function service(){
        $data = array(
            'title' => 'Services',
            'services' => ['web designing','programming','database'],
        );
        return view('service')->with($data);
    }

}

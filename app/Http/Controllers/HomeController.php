<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    function __construct()
    {
    }

    function index()
    {
        $student = literal(
            ID: '1',
            Name: 'Tung',
            ClassCode: 'Web05',
        );

        return view('home', compact('student'));
    }

    function show($id)
    {
        dd($id);
    }
}

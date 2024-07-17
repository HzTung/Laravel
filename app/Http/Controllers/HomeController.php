<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    function __construct()
    {
    }

    public function lab1()
    {
        $student = literal(
            ID: '1',
            Name: 'Tung',
            ClassCode: 'Web05',
        );

        return view('welcome', compact('student'));
    }

    public function lab2($id)
    {
        dd($id);
    }

    function index()
    {

        $pro = Products::all();
        $cate = Category::all();
        return view('index', [
            'proAll' => $pro,
            'cate' => $cate,
        ]);
    }

    function show($id)
    {
        dd($id);
    }

    public function pro_detail($id)
    {
        $pro = Products::find($id);
        $cate = Category::all();
        return view('product.detail', [
            'product' => $pro,
            'cate' => $cate,
        ]);
    }
}

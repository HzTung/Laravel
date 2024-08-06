<?php

namespace App\Http\Controllers;

use App\Http\ViewModels\ProductViewModel;
use App\Infrastructure\Models\Category;
use App\Infrastructure\Models\Products;
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
        $productViewModel = new ProductViewModel();
        return view('index', compact('productViewModel'));
    }

    function show($id)
    {
        dd($id);
    }

    public function pro_detail($id)
    {
        $product = Products::find($id);
        $productViewModel = new ProductViewModel($product);
        return view('product.detail', compact('productViewModel'));
    }
}

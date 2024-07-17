<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pro = Products::all();
        $cate = Category::all();
        return view('product.index', [
            'listProduct' => $pro,
            'cate' => $cate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $cate = Category::all();
        return view('product.add', [
            'cate' => $cate,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cate = Category::all();
        $pro = Products::find($id);
        return view('product.edit', [
            'cate' => $cate,
            'pro' => $pro,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

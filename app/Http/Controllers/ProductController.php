<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name_sp' => 'required|unique:product',
            'soluong' => 'required',
            'price' => 'required',
            'mota' => 'required',
            'img' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $validatedData = $validator->validated();
            $fileName = $request->file('img')->getClientOriginalName();
            $request->img->move('uploads/', $fileName);
            $validatedData['img'] = $fileName;
            try {
                Products::create($validatedData);
            } catch (\Throwable $th) {
                //throw $th;
            }
            return redirect()->route('product.index');
        }
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
        $validator = Validator::make($request->all(), [
            'name_sp' => 'required',
            'soluong' => 'required',
            'price' => 'required',
            'mota' => 'required',
            'img' => '',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return  back()->withInput()->withErrors($validator);
        } else {
            $validatedData = $validator->validated();
            if ($request->hasFile('img')) {
                $fileName = $request->file('img')->getClientOriginalName();
                $request->img->move('uploads/', $fileName);
                $validatedData['img'] = $fileName;
            }
            try {
                Products::where('id', $id)->update($validatedData);
            } catch (\Throwable $th) {
                //throw $th;
            }
            return redirect()->route('product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Products::destroy($id);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('product.index');
    }
}

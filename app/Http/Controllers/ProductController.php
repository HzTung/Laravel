<?php

namespace App\Http\Controllers;

use App\Http\ViewModels\ProductViewModel;
use App\Infrastructure\Models\Category;
use App\Infrastructure\Models\Products;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productViewModel = new ProductViewModel();
        return view('product.index', compact('productViewModel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productViewModel = new ProductViewModel();
        return view('product.add', compact('productViewModel'));
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
            // return back()->withInput()->withErrors($validator);
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        } else {
            $validatedData = $validator->validated();
            $fileName = $request->file('img')->getClientOriginalName();
            $request->img->move('uploads/', $fileName);
            $validatedData['img'] = $fileName;
            try {
                Products::create($validatedData);
                return response()->json([
                    'success' => true,
                ], 201);
                // return redirect()->route('product.index');
            } catch (\Throwable $th) {
                return response()->json([
                    'success' => false,
                    'errors' => $th->getMessage(),
                ], 500);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Products::find($id);
        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pro = Products::find($id);
        $productViewModel = new ProductViewModel($pro);

        return view('product.edit', compact('productViewModel'));
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

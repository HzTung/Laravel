<?php

namespace App\Http\ViewModels;

use App\Infrastructure\Models\Category;
use App\Infrastructure\Models\Products;
use Illuminate\Support\Collection;

class ProductViewModel
{
    public $product;
    public  function __construct(Products $products = null)
    {
        $this->product = $products;
    }

    public function product(): Collection
    {
        return Products::all();
    }

    public function categories(): Collection
    {
        return Category::all();
    }
}

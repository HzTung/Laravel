@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/prodetail.css') }}">
@endsection

@section('main')
    <div class="product-details">
        <div class="container">
            <div class="text-heading">
                <a href="{{ route('home') }}">Trang Chủ</a> /
                <a href="">Products</a> /
                {{ $productViewModel->product->name_sp }}
            </div>
            <div class="product-main">
                <img src="{{ asset('uploads/' . $productViewModel->product->img) }}" alt="">
                <div class="product-content">
                    <p class="name-product">{{ $productViewModel->product->name_sp }}</p>
                    <div class="price-product">
                        {{ $productViewModel->product->price }} đ
                    </div>

                    <form action="" method="post">
                        <div class="variant-sizguide">
                            <div class="size-product">
                                <label for="">Kích Thước</label>
                                <select class="select-size" name="size">
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">Xl</option>
                                </select>
                            </div>
                            <div class="quantity-product">
                                <label for="">Số Lượng</label>
                                <select name="soluong" id="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn-buy" type="submit" name="add-product">Thêm Vào Giỏ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

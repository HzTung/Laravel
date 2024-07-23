@extends('layout.layout')


@section('main')
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                            <input type="text" name="name_sp" class="form-control w-25" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="" value="{{ old('name_sp') }}">
                            @error('name_sp')
                                <span style="color:red">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số Lượng</label>
                            <input type="text" name="soluong" class="form-control w-25" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="" value="{{ old('soluong') }}">
                            @error('quantity')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giá</label>
                            <input type="text" name="price" class="form-control w-25" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="" value="{{ old('price') }}">
                            @error('price')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả</label>
                            <input type="text" name="mota" class="form-control w-25" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="" value="{{ old('mota') }}">
                            @error('mota')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình Ảnh</label>
                            <img id="imgEdit" src="" alt="" style="width:10rem ; display:block">
                            <input type="file" name="img" class="form-control w-25" id="editImgInput"
                                style="display:inline-block">
                            <span id="fileName"></span>
                            @error('img')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputPassword1">Danh Mục</label>
                            <select class="form-select w-25" aria-label="Default select example" name="category_id">
                                <option selected value="{{ old('category_id') }}">Open this select menu</option>
                                @foreach ($cate as $item)
                                    <option value="{{ $item->id }}">{{ $item->name_category }}</option>
                                @endforeach
                            </select>
                            @error('cate')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

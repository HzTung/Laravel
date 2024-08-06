@extends('layout.layout')

@section('main')
    <div class="content">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-1">
                    <a href="{{ route('product.create') }}" class="btn btn-success m-2  float-right">ADD</a>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Danh Mục</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productViewModel->product() as $product => $row)
                            <tr>
                                <th scope='row'>{{ $product + 1 }}</th>
                                <td>{{ $row->name_sp }}</td>
                                <td>{{ $row->soluong }}</td>
                                <td>{{ $row->price }}</td>
                                <td>{{ $row->mota }}</td>
                                <td><img style="width:4rem;" src="{{ asset('uploads/' . $row->img) }}"></td>
                                <td>
                                    @if (isset($row->category_id))
                                        {{ $productViewModel->categories()->where('id', $row->category_id)->first()->name_category }}
                                    @else
                                        {{ 'NULL' }}
                                    @endif

                                    {{-- @if (isset($row->name_cate))
                                {{$row->name_cate}}
                            @else
                                {{'NULL'}}
                            @endif --}}
                                </td>
                                <td class="row " style="height:83px">
                                    <a class='col-6 btn btn-defautl mr-2'
                                        href='{{ route('product.edit', $row->id) }} '>Edit</a>
                                    <form action="{{ route('product.destroy', $row->id) }}" method="post" class="col-6 ">
                                        @method('delete')
                                        @csrf
                                        <button class='btn btn-danger ' type="submit"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Delete</button>

                                    </form>
                                    {{-- <a href="{{ route('product.destroy', $row->id) }}" class="col-6 btn btn-danger"
                                        data-confirm-delete="true">Delete</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

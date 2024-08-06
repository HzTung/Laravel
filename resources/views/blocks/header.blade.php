<div id="header">
    <div class="container-nav">
        <div class="container-fluid row">
            <div class="d-flex justify-content-between align-items-center p-3 mb-4">
                <div class="">
                    <img src=" {{ asset('assets/imgs/flag-vie2.png') }}" alt="">
                    <img src=" {{ asset('assets/imgs/flag-en2.png') }}" alt="">
                </div>
                <div style="width:12rem">
                    <a href="{{ route('home') }}"> <img class="w-100" src="{{ asset('assets/imgs/logo (1).png') }}"
                            alt=""></a>
                </div>
                <div class="d-flex justify-content-around">
                    @if (Auth::check())
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary " style="border: unset">Đăng xuất</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary mx-2 ">Đăng Nhập</a>
                        <a href="{{ route('register') }}" class="btn btn-primary  ">Đăng Ký</a>
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-center navbar navbar-expand">
                <ul class="d-flex justify-content-around w-75">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><a href="">Về chúng tôi</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="" data-toggle="dropdown" data-bs-toggle="dropdown">
                            Cửa hàng
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($productViewModel->categories() as $category)
                                <li class=""> <a class="dropdown-item d-flex justify-content-between"
                                        href="">{{ $category->name_category }}
                                        <i class="ti-angle-right"></i></a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="">Bộ Sưu Tập</a></li>
                    <li><a href="">Bộ phối</a></li>
                    <li><a href="">Bài viết</a></li>
                    <li><a href="{{ route('product.index') }}">Quản lý sản phẩm</a></li>
                    <li><a href="{{ route('profile.edit') }}">Thông tin tài khoản</a></li>
                    <li><a href="">Liên hệ</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>

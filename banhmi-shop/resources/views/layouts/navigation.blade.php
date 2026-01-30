{{-- Thanh top nhỏ với hotline --}}
<div class="bg-brown text-white py-1">
    <div class="container d-flex justify-content-between align-items-center small">
        <span>Bánh Mì Shop - Hotline: <strong>0844825565</strong></span>
        <span>🥖 Bánh Mì Shop</span>
    </div>
</div>

{{-- Header chính: Logo | Tìm kiếm | Tài khoản | Giỏ hàng (luôn hiển thị, không nằm trong nút 3 gạch) --}}
<header class="bg-white border-bottom py-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center gap-3">
            {{-- Logo --}}
            <a class="navbar-brand fw-bold text-brown mb-0 me-3" href="{{ route('home') }}">
                Bánh Mì Shop
            </a>

            {{-- Thanh tìm kiếm (ngay bên cạnh / dưới logo) --}}
            <form action="{{ route('home') }}" method="GET" class="d-flex flex-grow-1 flex-lg-grow-0 flex-xl-grow-1" style="min-width: 200px; max-width: 420px;" role="search">
                <input
                    class="form-control rounded-0 rounded-start"
                    type="search"
                    name="search"
                    placeholder="Tìm kiếm sản phẩm..."
                    aria-label="Search"
                    value="{{ request('search') }}"
                >
                <button class="btn btn-brown text-white rounded-0 rounded-end px-3" type="submit" aria-label="Tìm kiếm">
                    🔍
                </button>
            </form>

            {{-- Tài khoản + Giỏ hàng (luôn bên cạnh) --}}
            <div class="d-flex align-items-center gap-2 ms-auto">
                @guest
                    <a class="btn btn-outline-brown btn-sm text-nowrap" href="{{ route('login') }}">
                        👤 Đăng nhập / Đăng ký
                    </a>
                @else
                    <div class="dropdown">
                        <button class="btn btn-outline-brown btn-sm dropdown-toggle text-nowrap" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            👤 {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Tài khoản của tôi</a></li>
                            <li><a class="dropdown-item" href="{{ route('order.history') }}">Đơn hàng</a></li>
                            @if(auth()->user()->isAdmin())
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest

                <a class="btn btn-brown btn-sm text-white position-relative text-nowrap" href="{{ route('cart.index') }}">
                    🛒 Giỏ hàng
                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </a>
            </div>
        </div>
    </div>
</header>

{{-- Thanh menu: Trang chủ, Bánh mì, ... (trên mobile có thể gập bằng nút 3 gạch) --}}
<div class="bg-light border-bottom">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light py-2 px-0">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Mở menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav gap-2 gap-lg-4 small">
                    <li class="nav-item">
                        <a class="nav-link text-brown" href="{{ route('home') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-brown" href="{{ route('home') }}#breads">Bánh mì</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-brown" href="#">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-brown" href="#">Tin tức &amp; Khuyến mại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-brown" href="#">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

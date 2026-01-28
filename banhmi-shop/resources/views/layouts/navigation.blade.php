<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">🥖 Bánh Mì Shop</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        🛒 Giỏ hàng 
                        @if(session('cart'))
                            <span class="badge bg-danger">{{ count(session('cart')) }}</span>
                        @endif
                    </a>
                </li>
                
                @auth
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Quản trị</a>
                        </li>
                    @endif
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('order.history') }}">Đơn hàng</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Hồ sơ</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
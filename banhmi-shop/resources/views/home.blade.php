<x-app-layout>
    <div class="container py-4">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sản phẩm mới</li>
            </ol>
        </nav>

        <div class="d-flex align-items-center mb-3">
            {{-- Nút mở thanh bên trái --}}
            <button class="btn btn-outline-secondary me-3" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#categorySidebar" aria-controls="categorySidebar">
                ☰ Danh mục
            </button>
            <h1 class="h4 mb-0">Sản phẩm mới</h1>
        </div>

        {{-- Thanh bên trái dạng offcanvas --}}
        <div class="offcanvas offcanvas-start" tabindex="-1" id="categorySidebar"
            aria-labelledby="categorySidebarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="categorySidebarLabel">Danh mục sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{ route('home') }}" class="text-decoration-none text-dark">Sản phẩm mới</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="text-decoration-none text-dark">Sản phẩm bán chạy</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="text-decoration-none text-dark">Tất cả sản phẩm</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="text-decoration-none text-dark">Tin tức &amp; Khuyến mại</a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Danh sách sản phẩm --}}
        @if($breads->count() > 0)
            <div class="row" id="breads">
                @foreach($breads as $bread)
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            @if($bread->image_url)
                                <img src="{{ $bread->image_url }}" class="card-img-top bg-white p-2"
                                     alt="{{ $bread->name }}" style="height: 180px; object-fit: contain;">
                            @else
                                <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center"
                                     style="height: 180px;">
                                    <span class="text-white">Không có ảnh</span>
                                </div>
                            @endif

                            <div class="card-body text-center">
                                <h6 class="card-title mb-2">{{ $bread->name }}</h6>
                                <p class="mb-1 text-danger fw-bold">{{ number_format($bread->price) }} đ</p>
                            </div>

                            <div class="card-footer bg-white border-0 text-center pb-3">
                                <a href="{{ route('bread.show', $bread->id) }}"
                                   class="btn btn-outline-secondary btn-sm me-2">Chi tiết</a>

                                @if($bread->stock > 0)
                                    <form action="{{ route('cart.add', $bread->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-brown btn-sm text-white">Thêm vào giỏ</button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary btn-sm" disabled>Hết hàng</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $breads->links() }}
            </div>
        @else
            <div class="alert alert-info text-center">
                <h5>Không tìm thấy bánh mì nào</h5>
                <p class="mb-0">
                    Hiện tại chưa có bánh mì nào trong cửa hàng.
                </p>
            </div>
        @endif
    </div>
</x-app-layout>
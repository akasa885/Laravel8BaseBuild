<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">
            {{ $title }}
        </span>
    </h2>
    <div class="row px-xl-5">
        @if ($products->count() == 0)
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    No products found!
                </div>
            </div>
        @else
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="w-100 object-fit-contain" style="height: 300px" src="{{ $product->image }}"
                                alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addToCartModal" data-product-name="{{ $product->name }}" data-product-stock="{{ $product->stock }}" data-product-key="{{ $product->getrouteKey() }}">
                                    <i class="fa fa-shopping-cart"></i></a>
                                {{-- <a class="btn btn-outline-dark btn-square" href="javascript:void(0);"><i
                                        class="far fa-heart"></i></a> --}}
                                <a class="btn btn-outline-dark btn-square" href="{{ route('front.product.show', $product) }}"><i
                                        class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4 d-flex flex-column p-3" style="cursor: pointer; text-wrap: wrap" onclick="window.location='{{ route('front.product.show', $product) }}'">
                            <a class="h6 text-decoration-none text-truncate" href="{{ route('front.product.show', $product) }}">{{ $product->name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                @if ($product->discount_price > 0)
                                    <h5>{{ makeCurrency($product->discount_price, false, true) }}</h5>
                                    <h6 class="text-muted ml-2"><del>{{ makeCurrency($product->price, false, true) }}</del></h6>
                                @else
                                    <h5>{{ makeCurrency($product->price, false, true) }}</h5>
                                @endif
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                @php
                                    $star = $productRating($product);
                                @endphp
                                <span class="fs-7 me-1">{{ $star }}</span>
                                <small class="fa fa-star @if ($star >= 1) text-primary @else text-muted @endif mr-1"></small>
                                <small>( {{ $productRatedTimes($product) }} )</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>

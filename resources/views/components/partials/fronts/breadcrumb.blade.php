@props([
    'main' => [
        'name' => 'Home',
        'url' => '/'
    ],
    'menu' => null,
    'active' => 'NaN'

])

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ $main['url'] }}">{{ $main['name'] }}</a>
                @if ($menu)
                <a class="breadcrumb-item text-dark" href="{{ $menu['url'] }}">{{ $menu['name'] }}</a>
                @endif
                <span class="breadcrumb-item active">{{ $active }}</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
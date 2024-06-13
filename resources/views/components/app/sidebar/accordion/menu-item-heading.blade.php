@props([
    'class' => '',
    'title' => 'Title',
    'icon' => '',
    'checkroute' => null,
])

<!--begin:Menu item-->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion @if($checkroute!= null && Request::routeIs($checkroute)) here show @endif">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <x-util.icon.base>
                <x-util.icon.list :type="$icon" />
            </x-util.icon.base>
        </span>
        <span class="menu-title">{{ $title }}</span>
        <span class="menu-arrow"></span>
    </span>
    <!--end:Menu link-->
    <!--begin:Menu sub-->
    <div class="menu-sub menu-sub-accordion">
       {{ $subLink }}
    </div>
    <!--end:Menu sub-->
</div>
<!--end:Menu item-->
<div>
    <!--begin::Navs-->
    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder" id="{{ $component_id }}">
        {{-- @php
        dd($menu_list);
        @endphp --}}
        @foreach ($menu_list as $item)
        <!--begin::Nav item-->
            <li class="nav-item mt-2">
                @if ($parameterCheck)
                @php
                    $isTrueParameter = Route::isWith([$item['route'], $parameter]);
                @endphp
                <a class="nav-link fs-7 text-active-primary ms-0 me-10 py-5 {{$isTrueParameter && url()->current() == $item['link'] ? 'active' : ''}}" id="{{$id_menu}}" href="{{$item['link']}}">{{$item['title']}}</a>
                @else
                <a class="nav-link fs-7 text-active-primary ms-0 me-10 py-5 {{Route::currentRouteName() == $item['route'] ? 'active' : ''}}" id="{{$id_menu}}" href="{{$item['link']}}">{{$item['title']}}</a>
                @endif
            </li>
        <!--end::Nav item-->
        @endforeach
    </ul>
    <!--begin::Navs-->
</div>
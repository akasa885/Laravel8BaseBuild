@props([
    'class' => '',
    'activeClass' => 'active',
    'title' => 'Title',
    'href' => '#',
    'nameActive' => false,
    'linkActive' => true,
    'icon' => ''
 ])

 <!--begin:Menu item-->
 <div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link @if ($linkActive)
        @if (Request::url() == $href)
            {{ $activeClass }}
        @endif
    @endif" href="{{ $href }}">
        <span class="menu-icon">
            <x-util.icon.base>
                <x-util.icon.list :type="$icon" />
            </x-util.icon.base>
        </span>
        <span class="menu-title">{{ $title }}</span>
    </a>
    <!--end:Menu link-->
</div>
<!--end:Menu item-->
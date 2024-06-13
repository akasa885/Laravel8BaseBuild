@auth('admin')
    <a href="{{ route('admin.auth.logout') }}" class="menu-link px-5"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
    <form id="logout-form" action="{{ route('admin.auth.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@else
    <a href="{{ route('logout') }}" class="menu-link px-5"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endauth


@push('scripts_down_custom')
@endpush

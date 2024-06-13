<a href="{{ $href }}"
    @if ($tooltip) data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $tooltip }}" @endif
    @if ($onClick || $onClickScript) onclick="@if($onClick) {{ $onClick }} @elseif ($onClickScript) {!! $onClickScript !!} @endif" @endif
    class="btn btn-icon btn-bg-light btn-{{ $btnColor }} btn-sm me-1">
    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
    <x-util.icon.base>
        <x-util.icon.list :type="$btnType" />
    </x-util.icon.base>
    <!--end::Svg Icon-->
</a>

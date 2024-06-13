<button type="submit" id="{{ $id }}" @if($value) value="{{ $value }}" @endif 
    @if ($onclick) onclick="{{ $onclick }}" @endif
    {{ $attributes->merge(['class' => 'btn btn-' . $type]) }}>
    <span class="indicator-label">
        {{ $label }}
    </span>
    <span class="indicator-progress">
        {{ $labelLoading }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
    </span>
</button>
@push('scripts_down_custom')
    <!--begin:: script button-with-indicator-->
    <script>
        var {{ $id }} = document.getElementById('{{ $id }}');
        var miliseconds = {{ $timeLoading }};
        {{ $id }}.addEventListener('click', function() {
            // var label = this.querySelector('.indicator-label');
            // var progress = this.querySelector('.indicator-progress');
            // label.classList.add('d-none');
            // progress.classList.remove('d-none');
            // this.disabled = true;
            // Activate indicator
            {{ $id }}.setAttribute("data-kt-indicator", "on");
            setTimeout(function() {
                {{ $id }}.disabled = !0;
            }, 50)
            // Disable indicator after 3 seconds
            setTimeout(function() {
                {{ $id }}.removeAttribute("data-kt-indicator");
                {{ $id }}.disabled = !1;
            }, miliseconds);
        });
    </script>
    <!--end:: script button-with-indicator-->
@endpush

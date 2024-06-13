@props([
    'formId' => null,
    'buttonId' => null,
    'pushScript' => 'bottom-body-scripts'
])
@push($pushScript)
<script>
    const formRegister = document.getElementById('{{ $formId }}');
    const formSubmit = formRegister.querySelector('button[type="submit"]');

    formRegister.addEventListener('submit', function(e) {
        e.preventDefault();
        formSubmit.setAttribute('disabled', 'disabled');
        formSubmit.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Sending...';
        this.submit();
    });
</script>
@endpush
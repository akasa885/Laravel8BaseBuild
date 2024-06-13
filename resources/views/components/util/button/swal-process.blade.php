@props([
    'label' => 'Link Button',
    'inputLabel' => 'Kode Undangan!',
    'placeholder' => 'Masukkan kode undangan!',
    'onclickFn' => 'formsubmit()',
    'attrSend' => 'data',
])
<a href="javascript:void(0);" {{ $attributes->merge(['class' => 'btn']) }} onclick="{{ $onclickFn }}">
    {{ $label }}
</a>

@push('scripts_down_custom')
    <x-util.swal-for-feedback />
    <script>
        function {{ $onclickFn }} {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            Swal.fire({
                title: 'Join Organisasi!',
                input: 'text',
                inputLabel: "{{ $inputLabel }}",
                inputPlaceholder: "{{ $placeholder }}",
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Kirim',
                showLoaderOnConfirm: true,
                preConfirm: (invitation) => {
                    return fetch(`{{ route('admin.staff.invitation.join') }}`, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                                "X-CSRF-TOKEN": token
                            },
                            body: JSON.stringify({
                                {{ $attrSend }}: invitation
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json()
                            }
                            return response.json()
                        })
                        .then((data) => {
                            if (!data.status) {
                                throw new Error(data.message)
                            }
                            return data
                        })
                        .catch((error) => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    alertForSuccess(result.value.message, "{{ $label }}");
                }
            })
        }
    </script>
@endpush

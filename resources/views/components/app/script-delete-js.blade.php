@push('scripts_down_custom')
<x-util.swal-for-feedback successReload="true" />
    <script>
        var alertMessage = "{{ $alertMessage ?? 'Ingin menghapus data ini' }}";
        var deleteAction = (url, messageSw = null) => {
            if (!messageSw) {
                messageSw = alertMessage;
            }
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            Swal.fire({
                title: 'Anda yakin ?',
                text: messageSw,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch(url, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                                "X-CSRF-TOKEN": token
                            },
                            body: JSON.stringify({_method: 'delete'})
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json()
                            }
                            return response.json()
                        })
                        .then((data) => {
                            if (!data.success) {
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
                    // check result value has redirect
                    if (result.value.redirect) {
                        window.location.href = result.value.redirect.url;
                    }
                    alertForSuccess(result.value.message);
                }
            })
        }
    </script>
@endpush

@props([
    'successReload' => false,
])
 <script>
    function alertForError(message = "Response server error", title = "Permintaan"){
        Swal.fire({
            title: title,
            text: message,
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Oke",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
    }

    function alertForSuccess(message, title = "Permintaan") {
        Swal.fire({
            title: title,
            text: message,
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Oke",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        })
        .then((result) => {
            if (result.isConfirmed) {
                if ({{ $successReload }}) {
                    location.reload();
                }
            }
        })
    }

</script>

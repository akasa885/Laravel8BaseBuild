@props([
    'modalId' => 'modal',
    'modalTitle' => 'Modal Title',
    'centered' => false,
])
<!-- Modal -->
<div class="modal fade" tabindex="-1" id="{{ $modalId }}">
    <div class="modal-dialog @if($centered) modal-dialog-centered @endif">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ $modalTitle }}</h3>

                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                {{ $modalBody }}
            </div>

            @if ($modalFooter ?? false)
                <div class="modal-footer">
                    {{ $modalFooter }}
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Modal -->


@props(['status', 'message', 'icon'])
@if (session()->has('success') || session()->has('error') || session()->has('info') || $errors->isNotEmpty() || !empty($status) || session()->has('status') || session()->has('warning'))
    @php
        if (session()->has('success') || (!empty($status) && $status == 'success')) {
            $response = 'success';
            $type = 'success';
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"> <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" /> <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" /> </svg>';
            $title = 'Success';
        } elseif (session()->has('error') || $errors->isNotEmpty() || (!empty($status) && $status == 'error')) {
            $response = 'error';
            $type = 'danger';
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"> <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" /> <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" /> <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" /> </svg>';
            $title = 'Error';
        } elseif (session()->has('info') || (!empty($status) && $status == 'info')) {
            $response = 'info';
            $type = 'primary';
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"> <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" /> <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" /> </svg>';
            $title = 'Info';
        } elseif (session()->has('warning') || (!empty($status) && $status == 'warning')) {
            $response = 'warning';
            $type = 'warning';
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"> <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" /> <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" /> </svg>';
            $title = 'Warning';
        } elseif (session()->has('status')) {
            $response = 'status';
            $type = 'primary';
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"> <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" /> <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" /> </svg>';
            $title = 'Info';
        } else {
            $type = 'primary';
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"> <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" /> <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" /> </svg>';
        }
    @endphp
    <!--begin::Alert-->
    <div class="alert alert-dismissible alert-{{ $type }} d-flex fade show" role="alert">
        <!--begin::Icon-->
        <span class="me-3 my-0">
            {!! $icon !!}
        </span>
        <!--end::Icon-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-column">
            <!--begin::Content-->
            @if ($errors->isEmpty())
                <span>{!! $message ?? Session::get($response) !!}</span>
            @else
                @foreach ($errors->all() as $error)
                    <li class="d-flex align-items-center py-1">
                        <svg width="5" height="5" fill="currentColor" class="bi bi-info-circle-fill me-2" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="50" />
                        </svg> {{ $error }}
                    </li>
                @endforeach
            @endif
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Close-->
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-2x svg-icon-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M6 19.7C5.7 19.7 5.5 19.6 5.3 19.4C4.9 19 4.9 18.4 5.3 18L18 5.3C18.4 4.9 19 4.9 19.4 5.3C19.8 5.7 19.8 6.29999 19.4 6.69999L6.7 19.4C6.5 19.6 6.3 19.7 6 19.7Z" fill="currentColor"/>
                    <path d="M18.8 19.7C18.5 19.7 18.3 19.6 18.1 19.4L5.40001 6.69999C5.00001 6.29999 5.00001 5.7 5.40001 5.3C5.80001 4.9 6.40001 4.9 6.80001 5.3L19.5 18C19.9 18.4 19.9 19 19.5 19.4C19.3 19.6 19 19.7 18.8 19.7Z" fill="currentColor"/>
                </svg>
            </span>
        </button>
        <!--end::Close-->
    </div>
    <!--end::Alert-->
@endif
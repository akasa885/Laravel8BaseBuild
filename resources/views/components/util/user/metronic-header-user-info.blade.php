<!--begin::Avatar-->
<div class="symbol symbol-50px me-5">
    <img alt="avatar" src="{{ $user->avatar->url ?? asset('vendor/admin/media/avatars/300-1.jpg') }}">
</div>
<!--end::Avatar-->
<!--begin::Username-->
<div class="d-flex flex-column">
    <div class="fw-bold d-flex align-items-center fs-5">{{ $user->name }}
        @if ($user->email_verified_at)
            <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Verified</span>
        @else
            <span class="badge badge-light-danger fw-bold fs-8 px-2 py-1 ms-2">Not Verified</span>
        @endif
    </div>
    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ $user->email }}</a>
</div>
<!--end::Username-->

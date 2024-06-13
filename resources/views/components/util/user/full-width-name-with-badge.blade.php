<!--begin::Name-->
<div class="d-flex align-items-center mb-2">
    <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $user->full_name }}</a>
    @if($user->hasVerifiedEmail())
    <a href="#">
        <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
        <span class="svg-icon svg-icon-1 svg-icon-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="currentColor"></path>
                <path d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"></path>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </a>
    @else
    <a href="#">
        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
        <span class="svg-icon svg-icon-1 svg-icon-danger">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"/>
                <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"/>
            </svg>
        </span>
        <!--end::Svg Icon-->
    <a href="#" class="btn btn-sm btn-light-info fw-bold ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Resend Verification Mail</a>
    @endif
</div>
<!--end::Name-->
<!--begin::Info-->
@if ($withInfo)
    <x-util.user.info-width-user :user="$user" />
@endif
<!--end::Info-->
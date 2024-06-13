<!--begin::sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <x-app.sidebar.logo-wrapper />
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <x-app.sidebar.menu-item-stand-alone title="Dasboards" icon="window" href="{{ route('admin.dashboard') }}" />
                <x-app.sidebar.menu-content-heading title="Master">

                    <x-app.sidebar.accordion.menu-item-heading title="Products" icon="clover" checkroute="admin.product*">
                        <x-slot name="subLink">
                            <x-app.sidebar.accordion.menu-item-link title="Categories" href="{{ route('admin.product.category.index') }}" />
                            <x-app.sidebar.accordion.menu-item-link title="Products" href="{{ route('admin.product.index') }}" />
                        </x-slot>
                    </x-app.sidebar.accordion.menu-item-heading>
                    <x-app.sidebar.accordion.menu-item-heading title="Transaction" icon="box-side" checkroute="admin.transaction*">
                        <x-slot name="subLink">
                            <x-app.sidebar.accordion.menu-item-link title="Transactions" href="{{ route('admin.transaction.index') }}" />
                        </x-slot>
                    </x-app.sidebar.accordion.menu-item-heading>
                    <x-app.sidebar.accordion.menu-item-heading title="Users" icon="people" checkroute="admin.users*">
                        <x-slot name="subLink">
                            <x-app.sidebar.accordion.menu-item-link title="Manage User" href="{{ route('admin.users.index') }}" />
                        </x-slot>
                    </x-app.sidebar.accordion.menu-item-heading>

                </x-app.sidebar.menu-content-heading>
                <x-app.sidebar.menu-content-heading title="Setting">
                    <x-app.sidebar.accordion.menu-item-heading title="Contacts" icon="window-circle" checkroute="admin.contact*">
                        <x-slot name="subLink">
                            <x-app.sidebar.accordion.menu-item-link title="Site" href="{{ route('admin.contact.siteview') }}" />
                            <x-app.sidebar.accordion.menu-item-link title="Contact Person" href="{{ route('admin.contact.contactpersonview') }}" />
                        </x-slot>
                    </x-app.sidebar.accordion.menu-item-heading>
                    <x-app.sidebar.accordion.menu-item-heading title="Help Page" icon="window-circle" checkroute="admin.help*">
                        <x-slot name="subLink">
                            <x-app.sidebar.accordion.menu-item-link title="List" href="{{ route('admin.help.index') }}" />
                        </x-slot>
                    </x-app.sidebar.accordion.menu-item-heading>
                    <x-app.sidebar.accordion.menu-item-heading title="Settings" icon="setting" checkroute="admin.setting*">
                        <x-slot name="subLink">
                            <x-app.sidebar.accordion.menu-item-link title="Site" href="https://facebook.com" />
                        </x-slot>
                    </x-app.sidebar.accordion.menu-item-heading>
                </x-app.sidebar.menu-content-heading>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="#" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">
            <span class="btn-label">Support</span>
            <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
            <span class="svg-icon btn-icon svg-icon-2 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="currentColor" />
                    <rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor" />
                    <rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor" />
                    <rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor" />
                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a>
    </div>
    <!--end::Footer-->
</div>
<!--end::sidebar-->
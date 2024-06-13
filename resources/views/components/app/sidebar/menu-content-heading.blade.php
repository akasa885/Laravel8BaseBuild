@props([
    'class' => '',
    'title' => 'Title',
])
<!--begin::menu item content heading-->
<div class="menu-item pt-5">
    <!--begin:Menu content-->
    <div class="menu-content">
        <span class="menu-heading fw-bold text-uppercase fs-7">{{ $title }}</span>
    </div>
    <!--end:Menu content-->
</div>
<!--end::menu item content heading-->
<!--begin::slot after menu content heading-->
{{ $slot }}
<!--end::slot after menu content heading-->
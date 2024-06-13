<!--begin::Lists Widget A-01-->
<div class="card card-flush h-xl-100">
    <!--begin::Heading-->
    <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px"
        style="background-image:url('{{ asset('vendor/media/svg/shapes/top-green.png') }}')" data-theme="light">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column pt-15">
            <span class="fw-bold fs-2x mb-3 text-gray-700">{!! $greeting !!}</span>
        </h3>
        <!--end::Title-->
        <!--begin::Toolbar-->
        <div class="card-toolbar pt-5">

        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Heading-->
    <x-card.card-body class="mt-n20">
        <x-widget.admin.welcome_counter.admin-stats
            :data1="$getDataMemberCount()"
            :data2="$getDataTransactionCount()"
            :data3="$getDataProductCount()"
        />
    </x-card.card-body>
</div>
<!--end::Lists Widget A-01-->

@props([
    'data1' => null,
    'data2' => 0,
    'data3' => 0,
    'data4' => 0,
])
<!--begin::Stats-->
<div class="mt-n20 position-relative">
    <!--begin::Row-->
    <div class="row g-3 g-lg-6">
        <!--begin::Col-->
        <div class="col-6">
            <!--begin::Items-->
            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                <!--begin::Symbol-->
                <div class="symbol symbol-30px me-5 mb-8">
                    <span class="symbol-label">
                        <x-util.icon.base type='1' class="svg-icon-primary">
                            <x-util.icon.list type="people" />
                        </x-util.icon.base>
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Stats-->
                <div class="m-0">
                    <!--begin::Number-->
                    <span
                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $data1 }}</span>
                    <!--end::Number-->
                    <!--begin::Desc-->
                    <span class="text-gray-500 fw-semibold fs-6">User Accounts</span>
                    <!--end::Desc-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Items-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-6">
            <!--begin::Items-->
            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                <!--begin::Symbol-->
                <div class="symbol symbol-30px me-5 mb-8">
                    <span class="symbol-label">
                        <x-util.icon.base type='1' class="svg-icon-primary">
                            <x-util.icon.list type="govern" />
                        </x-util.icon.base>
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Stats-->
                <div class="m-0">
                    <!--begin::Number-->
                    <span
                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $data2 }}</span>
                    <!--end::Number-->
                    <!--begin::Desc-->
                    <span class="text-gray-500 fw-semibold fs-6">Transactions</span>
                    <!--end::Desc-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Items-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-6">
            <!--begin::Items-->
            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                <!--begin::Symbol-->
                <div class="symbol symbol-30px me-5 mb-8">
                    <span class="symbol-label">
                        <x-util.icon.base type='1' class="svg-icon-primary">
                            <x-util.icon.list type="lantern" />
                        </x-util.icon.base>
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Stats-->
                <div class="m-0">
                    <!--begin::Number-->
                    <span
                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $data3 }}</span>
                    <!--end::Number-->
                    <!--begin::Desc-->
                    <span class="text-gray-500 fw-semibold fs-6">Product Total</span>
                    <!--end::Desc-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Items-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
<!--end::Stats-->
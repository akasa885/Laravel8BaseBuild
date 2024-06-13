<div class="col-xl-4 mb-xl-10">
    <!--begin::Lists Widget U-01-->
    <div class="card card-flush h-xl-100">
        <x-card.card-header :title="$title" sub-title="{{ 'Welcome Dashboard, '.auth()->user()->name}}" class="bg-secondary">
        </x-card.card-header>
        <x-card.card-body class="position-relative w-100 px-5 py-5">
            <div class="d-flex align-items-center mb-5">
                <!--begin::Chart-->
                <div class="w-100px flex-shrink-0 me-2">
                    <div class="min-h-auto ms-n3" id="kt_apex_profile_completion" style="height: 100px"></div>
                </div>
                <!--end::Chart-->
                <!--begin::Info-->
                <div class="m-0">
                    @if ($getPercentage() == 100)
                        <h4 class="text-success fs-5 fw-bold">Profile Completed</h4>
                    @else
                        <!--begin::Subtitle-->
                        <h4 class="fw-bold text-gray-800 mb-3">Almost There, {{ auth()->user()->name }} !</h4>
                        <!--end::Subtitle-->
                    @endif
                    <!--begin::Items-->
                    <div class="d-flex d-grid gap-5">
                        @foreach ($allStep as $keyTem => $item)
                            <!--begin::Item-->
                            <div class="d-flex flex-column flex-shrink-0 @if (count($allStep) - 1 != $keyTem) me-4 @endif">
                                @foreach ($item as $section)
                                    <!--begin::Section-->
                                    <span
                                        class="d-flex align-items-center fs-7 fw-bold @if (($loop->parent->first && $loop->first) || $completeCheck[$section]) text-success @else text-gray-400 @endif mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                        <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                    rx="5" fill="currentColor"></rect>
                                                <path
                                                    d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->{{ $renameStepName($section) }}
                                    </span>
                                    <!--end::Section-->
                                @endforeach
                            </div>
                            <!--end::Item-->
                        @endforeach
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Info-->
            </div>
        </x-card.card-body>
    </div>
</div>

@push('scripts_down_custom')
    <script>
        var options_{{ $component_uid }} = {
            series: [{{ $getPercentage() }}],
            chart: {
                height: 125,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        show: false,
                    },
                    hollow: {
                        size: '30%',
                    }
                },
            },
            labels: ['2 / 3'],
        };

        var chart = new ApexCharts(document.querySelector("#kt_apex_profile_completion"), options_{{ $component_uid }});
        chart.render();
    </script>
@endpush

@extends('layouts.front')
@section('title', $title)

@push('scripts_top')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endpush

@section('content')
    <section id="quiz-result" class="quiz-result">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>{{ $title }}</h2>
                <p>{{ $quiz->description }}</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="quiz-content">
                        <div class="quiz-result-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="quiz-result">
                                        <h3>Your Result</h3>
                                        <p>{{ $resultPoint }} / {{ $answerLabeling }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="quiz-result">
                                        <h3>Stress Level</h3>
                                        <div class="gauge-stress-level">
                                            <div id="chartGauge"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--begin::referensi-->
                            <div class="quiz-referensi">
                                <h4><strong>Referensi</strong></h4>
                                <p>PERCEIVED STRESS SCALE by Sheldon Cohen, Ph.D.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@php
    function stressPointToPercentage($point) {
        $maxPoint = 40;

        if ($point <= 0) {
            return 0;
        } elseif ($point >= $maxPoint) {
            return 100;
        } else {
            return ($point / $maxPoint) * 100;
        }
    }
@endphp

@push('scripts_bottom')
    <script>
        const componentChartGauge = function() {
            var valueChart = {{ stressPointToPercentage($resultPoint) }};
            var colorStops;
            var options;

            _calculateMidleRangeColor = function(value, low, high) {
                if (low % 5 == 0 && high % 5 == 0) {
                    valueCalc = Math.round(value / 5);
                    lowCalc = Math.round(low / 5);
                    highCalc = Math.round(high / 5);
                    median = Math.round((highCalc - lowCalc) / 2);
                    console.log('value calc ' + valueCalc, 'value ' + value);
                    console.log('median ' + median, 'lowcalc + median ' + (lowCalc + median));
                    if (valueCalc <= (lowCalc + median)) {
                        return ((value - 40) / 6) * 100
                    } else {
                        return ((value - 40) / 18) * 100
                    }
                }
            }

            _getColorStops = function(value) {
                if (value <= 40) {
                    colorStops = [{
                            offset: 0,
                            color: '#00FF00',
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: '#00FF00',
                            opacity: 1
                        }
                    ];
                } else if (value > 40 && value <= 80) {
                    colorStops = [{
                            offset: 0,
                            color: '#00FF00',
                            opacity: 1
                        },
                        {
                            offset: _calculateMidleRangeColor(value, 40, 80),
                            color: '#FFA500',
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: '#C7592E',
                            opacity: 1
                        }
                    ];
                } else {
                    colorStops = [{
                            offset: 0,
                            color: '#00FF00',
                            opacity: 1
                        },
                        {
                            offset: 50,
                            color: '#FFA500',
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: '#FF0000',
                            opacity: 1
                        }
                    ];
                }

                return colorStops;
            }

            _setChartOptions = function(value = null) {
                options = {
                    chart: {
                        type: 'radialBar',
                        offsetY: -20,
                        sparkline: {
                            enabled: true
                        }
                    },
                    plotOptions: {
                        radialBar: {
                            startAngle: -90,
                            endAngle: 90,
                            track: {
                                background: "#e7e7e7",
                                strokeWidth: '97%',
                                margin: 5, // margin is in pixels
                                dropShadow: {
                                    enabled: true,
                                    top: 2,
                                    left: 0,
                                    color: '#999',
                                    opacity: 1,
                                    blur: 2
                                }
                            },
                            dataLabels: {
                                name: {
                                    show: true,
                                    fontSize: '22px',
                                },
                                value: {
                                    show: true,
                                    fontSize: '28px',
                                    offsetY: -50,
                                    formatter: function(val) {
                                        return val + 'pts';
                                    }
                                }
                            },
                        }
                    },
                    grid: {
                        padding: {
                            top: -10
                        }
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            type: 'horizontal',
                            shadeIntensity: 0.5,
                            // gradient colors, green ,orange, red
                            gradientToColors: ['#FF4560'],
                            inverseColors: true,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 30, 80, 100],
                            colorStops: _getColorStops(value ?? valueChart)
                        }
                    },
                    labels: ['Stress Level'],
                    series: [value],
                };
            }

            return {
                init: function() {
                    _setChartOptions(valueChart);
                    var chart = new ApexCharts(document.querySelector("#chartGauge"), options);
                    chart.render();
                },
            }
        }();

        document.addEventListener('DOMContentLoaded', function() {
            componentChartGauge.init();
        });
    </script>
@endpush

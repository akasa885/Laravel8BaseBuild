@extends('layouts.front')

@push('scripts_top')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endpush

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <img src="assets/img/hero-img.svg" class="img-fluid animated" alt="">
            <h1>Welcome to <span>HeroBiz</span></h1>
            <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
            <div class="d-flex">
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                    class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch
                        Video</span></a>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Gauge stress level view start test button -->
    <section id="stress-gauge" class="start-test section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-12 mb-3">
                    <div class="gauge-stress-level">
                        <div id="chartGauge"></div>
                    </div>
                </div>

            </div>

            <div class="row gy-4">

                <div class="col-lg-12 mb-3">
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('quiz.quiz.open', ['token' => 's39o3n']) }}" class="btn btn-primary">Start
                            Test</a>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- /Gauge stress level view start test button -->
@endsection

@push('scripts_bottom')
    <script>
        const componentChartGauge = function() {
            var valueChart = 80; // Example value
            var colorStops;
            var options;

            _calculateMidleRangeColor = function(value, low, high) {
                if (low % 5 == 0 && high % 5 == 0) {
                    valueCalc = Math.round(value / 5);
                    lowCalc = Math.round(low / 5);
                    highCalc = Math.round(high / 5);
                    median = Math.round((highCalc - lowCalc) / 2);
                    if (valueCalc <= (lowCalc + median)) {
                        return ((value - 40) / 16) * 100
                    } else {
                        return ((value - 40) / 20) * 100
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
                update: function(value) {
                    _setChartOptions(value);
                    document.querySelector("#chartGauge").innerHTML = '';
                    var chart = new ApexCharts(document.querySelector("#chartGauge"), options);
                    chart.render();
                }
            }
        }();

        // ready
        document.addEventListener('DOMContentLoaded', function() {
            componentChartGauge.init();
            setInterval(function() {
                var value = Math.floor(Math.random() * 100);
                componentChartGauge.update(value);
            }, 3000);
        });
    </script>
@endpush

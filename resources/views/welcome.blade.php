<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - HeroBiz Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <style>
        #chartGauge {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">{{ config('app.name', 'Laravel') }}</h1>
                <span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home<br></a></li>
                    {{-- <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li> --}}
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            {{-- <a class="btn-getstarted" href="index.html#about">Get Started</a> --}}
        </div>
    </header>

    <main class="main">

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
                        class="glightbox btn-watch-video d-flex align-items-center"><i
                            class="bi bi-play-circle"></i><span>Watch Video</span></a>
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
                            <a href="#" class="btn btn-primary">Start Test</a>
                        </div>
                    </div>

                </div>

            </div>

        </section>
        <!-- /Gauge stress level view start test button -->

    </main>

    <footer id="footer" class="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <span class="sitename">Upquality</span>
                        </a>
                        <div class="footer-contact pt-3">
                            <p>Jl. Sarirogo Ruko Citra City Resident R-12</p>
                            <p>Sidoarjo, Sidoarjo 61234</p>
                            <p class="mt-3"><strong>Phone:</strong> <span>62 8512 3456 789</span></p>
                            <p><strong>Email:</strong> <span>admin@upquality.id</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div>
                        © Copyright <strong><span>Upquality</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        Designed by <a href="https://bootstrapmade.com/">Bootstrap</a>
                    </div>
                </div>

            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        const componentChartGauge = function() {
            var valueChart = 80; // Example value
            var colorStops;
            var options;

            _getColorStops = function(value) {
                if (value <= 50) {
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
                } else if (value > 50 && value <= 80) {
                    colorStops = [{
                            offset: 0,
                            color: '#00FF00',
                            opacity: 1
                        },
                        {
                            offset: ((value - 50) / 30) * 60,
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

</body>

</html>

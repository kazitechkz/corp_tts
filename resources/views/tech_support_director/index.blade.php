@extends('layout-cto')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="page-title-box">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <h4 class="page-title mb-1">Главная для руководителя Тех. поддержки</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Добро пожаловать!</li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <!-- end page-content-wrapper -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->
    <!-- end main content-->
@endsection
@push("scripts")
    <script src="/js/apexcharts.min.js"></script>
    <script>
        const invites = @json(\App\Models\Invite::count());
        const results = @json(\App\Models\Result::count());
        var optionsChart = {
            series: [invites,results],
            chart: {
                width: "100%",
                height:"350px",
                type: 'pie',
            },
            labels: ["Приглашения","Результаты"],
            responsive: [{
                breakpoint: 300,
                options: {
                    chart: {
                        width: 300
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        (new ApexCharts(document.querySelector("#chart"), optionsChart)).render();


    </script>
@endpush

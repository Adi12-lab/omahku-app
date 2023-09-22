@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Appzia</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h4 class="card-title text-muted">Jumlah Properti</h4>
                        <h2 class="mt-3 mb-2"><b>{{ array_sum($categoryPropertyCounts)}}</b>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-center">
                    <div class="card-body p-t-10">
                        <h4 class="card-title text-muted mb-0">Jumlah Agen</h4>
                        <h2 class="mt-3 mb-2"><b>{{$agentsCount}}</b></h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-center">
                    <div class="card-body p-t-10">
                        <h4 class="card-title text-muted mb-0">Jumlah Pengguna</h4>
                        <h2 class="mt-3 mb-2"><b>{{$usersCount}}</b></h2>
                    </div>
                </div>
            </div>

           
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Jumlah Kategori Properti</h4>

                        <div id="bar_chart" class="apex-charts" dir="ltr"></div>
                    </div>
                </div><!--end card-->
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Kategori Favorit</h4>

                        <div id="pie_chart" class="apex-charts" dir="ltr"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
  
        <!-- end row -->
    </div>
@endsection

@section('scripts')
    <!-- apexcharts -->
    <script src="{{ asset('admin/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        const categories = {!! json_encode($categories) !!}
        const categoryPropertyCounts = {!! json_encode($categoryPropertyCounts) !!}

        options = {
            chart: {
                height: 350,
                type: "bar",
                toolbar: {
                    show: !1
                }
            },
            plotOptions: {
                bar: {
                    horizontal: !0
                }
            },
            dataLabels: {
                enabled: !1
            },
            series: [{
                data: categoryPropertyCounts
            }],
            colors: ["#1cbb8c"],
            grid: {
                borderColor: "#f1f1f1",
                padding: {
                    bottom: 5
                }
            },
            xaxis: {
                categories: categories,
            },
            legend: {
                offsetY: 5
            },
        };
        (chart = new ApexCharts(
            document.querySelector("#bar_chart"),
            options
        )).render();


        const categoryFavoriteNames = {!! json_encode($categoryFavoriteNames) !!}
        const categoryFavoritePercentages = {!! json_encode($categoryFavoritePercentages) !!}
        const categoryFavoriteColors = {!! json_encode($categoryFavoriteColors) !!}
        options = {
            chart: {
                height: 320,
                type: "pie"
            },
            series: categoryFavoritePercentages,
            labels: categoryFavoriteNames,
            colors: categoryFavoriteColors,
            legend: {
                show: !0,
                position: "bottom",
                horizontalAlign: "center",
                verticalAlign: "middle",
                floating: !1,
                fontSize: "14px",
                offsetX: 0,
                offsetY: 5,
            },
            responsive: [{
                breakpoint: 600,
                options: {
                    chart: {
                        height: 240
                    },
                    legend: {
                        show: !1
                    }
                },
            }, ],
        };
        (chart = new ApexCharts(
            document.querySelector("#pie_chart"),
            options
        )).render();
    </script>
@endsection

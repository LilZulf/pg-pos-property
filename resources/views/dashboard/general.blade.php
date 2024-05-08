@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-16 mb-1">Good Morning, Anna!</h4>
                                    <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                                </div>
                                <div class="mt-3 mt-lg-0">
                                    <form action="javascript:void(0);">
                                        <div class="row g-3 mb-0 align-items-center">
                                            <div class="col-sm-auto">
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control border-0 minimal-border dash-filter-picker shadow flatpickr-input"
                                                        data-provider="flatpickr" data-range-date="true"
                                                        data-date-format="d M, Y"
                                                        data-deafult-date="01 Jan 2022 to 31 Jan 2022" readonly="readonly">
                                                    <div class="input-group-text bg-primary border-primary text-white">
                                                        <i class="ri-calendar-2-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-soft-success material-shadow-none"><i
                                                        class="ri-add-circle-line align-middle me-1"></i> Add
                                                    Product</button>
                                            </div>
                                            <!--end col-->
                                            <div class="col-auto">
                                                <button type="button"
                                                    class="btn btn-soft-info btn-icon waves-effect material-shadow-none waves-light layout-rightside-btn"><i
                                                        class="ri-pulse-line"></i></button>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div><!-- end card header -->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total
                                                Transactions</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-success fs-14 mb-0">
                                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="559.25">559.25</span></h4>
                                            <a href="" class="text-decoration-underline">View transactions</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-success-subtle rounded fs-3">
                                                <i class="ri-wallet-3-fill text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Transaction
                                                Success</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-success fs-14 mb-0">
                                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +3.57 %
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="36894">36,894</span></h4>
                                            <a href="" class="text-decoration-underline">View transactions
                                                success</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                <i class=" ri-checkbox-circle-fill text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Transactions
                                                Failed</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-danger fs-14 mb-0">
                                                <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -29.08 %
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="18.35">18.35</span></h4>
                                            <a href="" class="text-decoration-underline">View transactions failed</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                <i class=" ri-close-circle-fill text-danger"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Transactions
                                                Pending</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-muted fs-14 mb-0">
                                                +0.00 %
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="165.89">165.89</span></h4>
                                            <a href="" class="text-decoration-underline">View transactions
                                                pending</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                <i class=" ri-time-fill text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div> <!-- end row-->
                    <div class="col-xl-16">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Transactions Status Overview</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-line" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end .rightbar-->
            </div> <!-- end col -->
        </div>

    </div>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                chart: {
                    type: 'line',
                    height: 400
                },
                series: [{
                        name: 'pending',
                        data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
                    },
                    {
                        name: 'failed',
                        data: [10, 20, 10, 10, 5, 15, 20, 25, 30]
                    },
                    {
                        name: 'success',
                        data: [20, 35, 25, 45, 60, 70, 75, 90, 100]
                    }
                ],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
                },
                grid: {
                    row: {
                        colors: ['#f3f4f5', 'transparent'],
                        opacity: 0.5
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#858d98'
                        }
                    }
                },
                colors: ['#3c4ccf', '#ff7f0e', '#2ca02c'],
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: true,
                    labels: {
                        colors: '#333'
                    }
                },
                tooltip: {
                    enabled: true
                }
            };

            var chartDom = document.getElementById('chart-line');
            var chart = new ApexCharts(chartDom, options);
            chart.render();
        });
    </script>
@endsection

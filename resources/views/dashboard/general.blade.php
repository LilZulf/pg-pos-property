@extends('layouts.app')

@section('breadcrumb')
    <h4 class="mb-sm-0">Dashboard</h4>
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-16 mb-1">Good Morning, Admin!</h4>
                                    <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                                </div>
                                <div class="mt-3 mt-lg-0">
                                    <form action="{{ route('dashboard.general') }}" method="GET" id="filter-form">
                                        <div class="row g-3 mb-0 align-items-center">
                                            <div class="col-sm-auto">
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control border-0 minimal-border dash-filter-picker shadow flatpickr-input"
                                                        data-provider="flatpickr" data-range-date="true"
                                                        data-date-format="d M, Y" data-default-date="{{ $now }}"
                                                        name="date_range" readonly="readonly">
                                                    <div class="input-group-text bg-primary border-primary text-white">
                                                        <i class="ri-calendar-2-line"></i>
                                                    </div>
                                                    <a type="button" href="{{ route('dashboard.general') }}"
                                                        class="btn btn-danger" id="reset-date"><i
                                                            class="ri-delete-bin-6-line"></i></a>
                                                </div>
                                            </div>
                                        </div>
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
                                            {{-- <h5 class="text-success fs-14 mb-0">
                                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                                            </h5> --}}
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span id="counter-value"
                                                    class="counter-value"
                                                    data-target="{{ $total_transactions }}">{{ $total_transactions }}</span>
                                            </h4>
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
                                                Completed</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            {{-- <h5 class="text-success fs-14 mb-0">
                                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +3.57 %
                                            </h5> --}}
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="{{ $completed }}">{{ $completed }}</span></h4>
                                            <a href="" class="text-decoration-underline">View transactions
                                                completed</a>
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
                                            {{-- <h5 class="text-danger fs-14 mb-0">
                                                <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -29.08 %
                                            </h5> --}}
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="{{ $failed }}">{{ $failed }}</span></h4>
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
                                            {{-- <h5 class="text-muted fs-14 mb-0">
                                                +0.00 %
                                            </h5> --}}
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="{{ $pending }}">{{ $pending }}</span></h4>
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
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Transactions Status Overview</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-line" style="width: 100%; height: 90%;"></div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                        <div class="col-xl-4">
                            <div class="row">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Latest transactions</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Ref</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($latest_transactions as $item)
                                                    <tr>
                                                        <td>{{ $item->ref }}</td>
                                                        @if ($item->status === 'pending')
                                                            <td><span class="badge bg-warning">Pendng</span>
                                                            @elseif($item->status === 'failed')
                                                            <td><span class="badge bg-danger">Failed</span>
                                                            @elseif($item->status === 'completed')
                                                            <td><span class="badge bg-success">Completed</span>
                                                        @endif

                                                        </td>
                                                        <td>Rp. {{ number_format($item->amount) }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Transactions by Method</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="donut-chart" style="width: 100%; height: 100%;"></div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-->
                    </div>

                </div> <!-- end .rightbar-->
            </div> <!-- end col -->
        </div>

    </div>
@endsection
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var startDateSelected = false;
            var endDateSelected = false;

            flatpickr(".dash-filter-picker", {
                mode: "range",
                onChange: function(selectedDates, dateStr, instance) {
                    var dateRange = dateStr.split(" to ");

                    // Periksa apakah kedua tanggal sudah dipilih
                    if (dateRange.length === 2) {
                        startDateSelected = true;
                        endDateSelected = true;
                    } else {
                        startDateSelected = false;
                        endDateSelected = false;
                    }

                    // Jika kedua tanggal sudah dipilih, submit form
                    if (startDateSelected && endDateSelected) {
                        document.getElementById('filter-form').submit();
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fungsi untuk membuat animasi perubahan nilai dari 0 ke target
            function animateValue(obj, start, end, duration) {
                var range = end - start;
                var current = start;
                var increment = end > start ? 1 : -1;
                var stepTime = Math.abs(Math.floor(duration / range));
                var timer = setInterval(function() {
                    current += increment;
                    obj.textContent = current
                        .toLocaleString(); // Menggunakan toLocaleString() untuk memformat angka dengan tanda baca ribuan
                    if (current == end) {
                        clearInterval(timer);
                    }
                }, stepTime);
            }

            // Panggil fungsi animateValue untuk setiap elemen dengan kelas yang sama
            var elements = document.getElementsByClassName("counter-value");
            var startValue = 0; // Nilai awal
            var duration = 2000; // Durasi animasi dalam milidetik

            for (var i = 0; i < elements.length; i++) {
                // Mendapatkan nilai akhir dari elemen
                var endValue = parseInt(elements[i].getAttribute("data-target"));
                if (endValue !== 0) {
                    animateValue(elements[i], startValue, endValue, duration);
                }
            }
        });
    </script>
    <script></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                chart: {
                    type: 'area',
                    height: 450
                },
                series: [{
                        name: 'pending',
                        data: {{ json_encode($pending_data) }} // Menggunakan data pending dari controller
                    },
                    {
                        name: 'failed',
                        data: {{ json_encode($failed_data) }} // Menggunakan data failed dari controller
                    },
                    {
                        name: 'success',
                        data: {{ json_encode($completed_data) }} // Menggunakan data success dari controller
                    }
                ],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug',
                        'Sep'
                    ] // Menggunakan data bulan dari controller
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

            var donut = {
                series: [{{ $qris }}, {{ $va }}],
                chart: {
                    type: 'donut',
                },
                labels: ['Qris', 'Virtual Account'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var donutDom = document.getElementById('donut-chart');
            var donutChart = new ApexCharts(donutDom, donut);

            donutChart.render();

            var chartDom = document.getElementById('chart-line');
            var chart = new ApexCharts(chartDom, options);
            chart.render();

        });
    </script>
@endpush
